<?php

// +----------------------------------------------------------------------
namespace User\Model;
use Think\Model\RelationModel;
/**
 * 会员模型
 */
class UcenterMemberModel extends RelationModel{
	/**
	 * 数据表前缀
	 * @var string
	 */
	protected $tablePrefix = UC_TABLE_PREFIX;
	protected $_link = array(
		'Role' => array(
		'mapping_type'      =>  self::HAS_MANY,
		'class_name'        =>  'Role_admin',
		'mapping_name'      =>  'role-admin',
		'foreign_key'       =>  'id'
    ));
	/**
	 * 数据库连接
	 * @var string
	 */
	protected $connection = UC_DB_DSN;
	/* 用户模型自动验证 */
	protected $_validate = array(
		/* 验证用户名 */
		array('username', '6,30', "用户名长度不合法", self::EXISTS_VALIDATE, 'length'), //用户名长度不合法
		array('username', 'checkDenyMember', "用户名禁止注册", self::EXISTS_VALIDATE, 'callback'), //用户名禁止注册
		array('username', '', "用户名被占用", self::EXISTS_VALIDATE, 'unique'), //用户名被占用
		/* 验证weixin*/
		array('weixin', 'checkDenyMember', "微信号禁止注册", self::EXISTS_VALIDATE, 'callback'), //用户名禁止注册
		/* 验证邮箱 */
		array('email', '6,64', "邮箱长度不合法", self::EXISTS_VALIDATE, 'length'), //邮箱长度不合法
		array('email', 'email', "邮箱格式不正确", self::EXISTS_VALIDATE), //邮箱格式不正确
		array('email', 'checkDenyEmail',"邮箱禁止注册", self::EXISTS_VALIDATE, 'callback'), //邮箱禁止注册
		array('email', '',"邮箱被占用", self::EXISTS_VALIDATE, 'unique'), //邮箱被占用

		/* 验证手机号码 */
		array('mobile', '11', "手机号长度不合法", self::EXISTS_VALIDATE, 'length'), //用户名长度不合法
		array('mobile', 'checkDenyMobile', "手机禁止注册", self::EXISTS_VALIDATE, 'callback'), //手机禁止注册
		array('mobile', '', "手机号被占用", self::EXISTS_VALIDATE, 'unique'), //手机号被占用
		/* 验证密码 */
		array('password', '6,30', "密码长度不合法", 2, 'length'), //密码长度不合法
        // 确认密码不一致
        array('password', 'rpassword', '确认密码不一致！', 2, 'confirm', 3),
		//基本信息
		/* 验证qq*/
		array('qq', 'checkDenyMember', "微信号禁止注册", self::EXISTS_VALIDATE, 'callback'), //用户名长度不合法
	);

	/* 用户模型自动完成 */
	protected $_auto = array(
		// password
        array('password', 'think_ucenter_md5', 3, 'function',array(UC_AUTH_KEY)),
        // 创建时间
        array('created_at', 'time', 1, 'function'),
        // 更新时间
        array('updated_at', 'time', 3, 'function'),
		// 最后登录IP
		array('last_login_ip', 'get_client_ip', 1, 'function')
	);
	/**
	 * 检测用户名是不是被禁止注册
	 * @param  string $username 用户名
	 * @return boolean          ture - 未禁用，false - 禁止注册
	 */
	protected function checkDenyMember($username){
		return true; //TODO: 暂不限制，下一个版本完善
	}

	/**
	 * 检测邮箱是不是被禁止注册
	 * @param  string $email 邮箱
	 * @return boolean       ture - 未禁用，false - 禁止注册
	 */
	protected function checkDenyEmail($email){
		return true; //TODO: 暂不限制，下一个版本完善
	}

	/**
	 * 检测手机是不是被禁止注册
	 * @param  string $mobile 手机
	 * @return boolean        ture - 未禁用，false - 禁止注册
	 */
	protected function checkDenyMobile($mobile){
		return true; //TODO: 暂不限制，下一个版本完善
	}

	/**
	 * 根据配置指定用户状态
	 * @return integer 用户状态
	 */
	protected function getStatus(){
		return true; //TODO: 暂不限制，下一个版本完善
	}

	/**
	 * 注册一个新用户
	 uc_data
	 * @param  string $username 用户名
	 * @param  string $password 用户密码
	 * @param  string $email    用户邮箱
	 * @param  string $mobile   用户手机号码
	 member_data
	 * @param  string $qq   qq号
	 * @param  string $weixin   微信号
	 * @return integer          注册成功-用户信息，注册失败-错误编号
	 */
	public function register($uc_data,$member_data,$is_admin){

		//验证注册用户注册方式
		$enum=0;
		//var_dump($uc_data);die();
		if(empty($uc_data['username'])){$enum++;unset($uc_data['username']);}
		if(empty($uc_data['mobile'])){$enum++;unset($uc_data['mobile']);}
		if(empty($uc_data['email'])){$enum++;unset($uc_data['email']);}
		if($enum == 3)return array('status'=>(-1),'info'=>"登录名不能为空！");
		if(empty($uc_data['realname'])){return array('status'=>(-1),'info'=>"姓名不能为空！");}
		if(empty($uc_data['password'])){return array('status'=>(-1),'info'=>"密码不能为空！");}
		if(empty($uc_data['safepw'])){return array('status'=>(-1),'info'=>"兑换密码不能为空！");}
		/* 添加用户 */
		if (false === ($uc_data2 = $this->create($uc_data))||false === ($this->create($member_data))) {
				return array('status'=>(-1),'info'=>$this->getError()); //错误详情见自动验证注释
		}else{
			unset($uc_data['rpassword']);
			$uc_data = array_merge($uc_data,$uc_data2);
		}
		 $this->startTrans();
		 $uid = $this->data($uc_data)->add();
		 if($is_admin == true){
			 $this->table($this->tablePrefix.'role_admin')->data(array(
				'role_id' => $uc_data['role_id'],
				'member_id' => $uid ))->add();
		}else{$ruid = true; }
		$mid = $this->table($this->tablePrefix.'member')->data(array_merge(array('id'=>$uid),$member_data))->add();
		if(false === $ruid || false === $uid || false === $mid){
			$this->rollback();
            return array('status'=>(-1),'info'=>"系统出错了！错误号:".$ruid.' '.$uid."请联系管理员解决!");
		} else {
			$this->commit();
			return array('status'=>$uid,'info'=>"注册成功!");
		}
	}

	/**
	 * 用户登录认证
	 * @param  string  $username 用户名
	 * @param  string  $password 用户密码
	 * @param  integer $type     用户名类型 （1-用户名|手机号|邮箱，2-UID）
	 * @param  integer $is_admin  (1-管理员登录)
	 * @return array           登录成功-用户ID，登录失败-错误编号
	 */
	public function login($username, $password, $type = 1,$is_admin = false){
		$map = array();
		switch ($type) {
			case 1:
				$map['mobile|username|email'] = $username;
				break;
			case 2:
				$map[$this->tablePrefix.'ucenter_member.id'] = $username;
				break;
			default:
				return 0; //参数错误
		}

		/* 获取用户数据 */
		$user = $this->where($map)
				->join($this->tablePrefix."member ON ".$this->tablePrefix."ucenter_member.id = ".$this->tablePrefix."member.id")
				->join($this->tablePrefix."file ON ".$this->tablePrefix."member.icon = ".$this->tablePrefix."file.id")
				->field("* ,".$this->tablePrefix."ucenter_member.id , ".$this->tablePrefix."ucenter_member.status")->find();
		if(is_array($user) && $user['status']){
			/* 验证用户密码 */
			if(think_ucenter_md5($password) === $user['password'] ||(isset($map['id'])&&$map['id'] >0)){
				if($user["status"] == 2)return array('status'=>9,'info'=>"用户已注册，但未审核！");//密码错误
				 // 权限认证
				if (C('USER_AUTH_ON')) {
					$loginMarked = C('LOGIN_MARKED');
					$shell = $this->genShell($user['id'], $user['password']);
					// 生成登录session
					init_session();
					session(array('id'=>session_id(),'expire'=>3600*24*7));
					session($loginMarked,$shell);
				 // 生成登录cookie
					cookie($loginMarked,$shell.'/'.session_id(),array('expire'=>3600*24*7));
					session('current_account' , $user);
					session(C('USER_AUTH_KEY'), $user['id']);
					$this->where($map)->data(array('login'=>$user['login']+1))->save();
					if($is_admin){
						if ($user['id'] == 1) {
							// 超级管理员无需认证
							session(C('ADMIN_AUTH_KEY') , true);
						}
						// 缓存访问权限
						\Org\Util\Rbac::saveAccessList();
					}
				}
				$this->updateLogin($user['id']); //更新用户登录信息

				return array('status'=>1,'info'=>"登录成功"); //登录成功，返回用户ID
			} else {
				return array('status'=>(-2),'info'=>"密码错误");//密码错误
			}
		} else {
			return array('status'=>(-1),'info'=>"用户不存在或被禁用"); //用户不存在或被禁用
		}
	}

	/**
	 * 获取用户信息
	 * @param  string  $uid         用户ID或用户名
	 * @param  string  $fields      用户返回字段
	 * @param  boolean $is_username 是否使用用户名查询
	 * @return array                用户信息
	 */
	public function info($uid,$fields ,$is_username){
		$map = array();
		if($is_username == true){ //通过用户名获取
			$map['mobile|username|email'] = $uid;
		} else {
			$map[$this->tablePrefix.'ucenter_member.id'] = $uid;
		}
		$user = $this->where($map)->join($this->tablePrefix."member on ".$this->tablePrefix."ucenter_member.id = ".$this->tablePrefix."member.id",'left')->field($fields)->find();
		if(is_array($user) && $user['status'] = 1){
			return array("status"=>1,"info"=>$user);
		} else {
			return array("status"=>(-1),"info"=>"用户不存在或被禁用"); //用户不存在或被禁用
		}
	}
	//检测重复
	public function checkreField($field,$type){
		$map = array();
		switch($type){
				case 1:{$map['username'] =$field; break;}
				case 2:{$map['email'] = $field;break;}
				case 3:{$map['mobile'] = $field;break;}
		}
		$return = $this->field('id')->where($map)->find();
		return $return['id'];
	}
	/**
	 * 检测用户信息
	 * @param  string  $field  用户名
	 * @param  integer $type   用户名类型 1-用户名，2-用户邮箱，3-用户电话
	 * @return integer         错误编号
	 */
	public function checkField($field, $type = 1){
		$data = array();
		switch ($type) {
			case 1:
				$data['username'] = $field;
				break;
			case 2:
				$data['email'] = $field;
				break;
			case 3:
				$data['mobile'] = $field;
				break;
			default:
				return 0; //参数错误
		}

		return $this->create($data) ? 1 : $this->getError();
	}

	/**
	 * 更新用户登录信息
	 * @param  integer $uid 用户ID
	 */
	protected function updateLogin($uid){
		$data = array(
			'id'              => $uid,
			'last_login_time' => NOW_TIME,
			'last_login_ip'   => get_client_ip()
		);
		M('UcenterMember')->save($data);
	}

	/**
	 * 更新用户信息
	 * @param int $uid 用户id
	 * @param string $password 密码，用来验证
	 * @param array $data 修改的字段数组
	 * @return true 修改成功，false 修改失败
	 * @author huajie <banhuajie@163.com>
	 */
	public function updateUserFields($uid, $password, $data){
		if(empty($uid) || empty($password) || empty($data)){
			$this->error = '参数错误！';
			return false;
		}

		//更新前检查用户密码
		if(!$this->verifyUser($uid, $password)){
			$this->error = '验证出错：密码不正确！';
			return false;
		}

		//更新用户信息
		$data = $this->create($data);
		if($data){
			return $this->where(array('id'=>$uid))->save($data);
		}
		return false;
	}
	/*update,更新用户信息*/
	public function updateUser($uid, $data){
		if(empty($uid) || empty($data)){
			$this->error = '参数错误！';
			return false;
		}
		//更新用户信息
		if($data){
			return $this->where(array('id'=>$uid))->data($data)->save();
		}
		return false;
	}
	  /**
     * 生成登录shell
     * @param  int    $id       shell的id
     * @param  string $password shell的密码
     * @return string
     */
	    private function genShell($id, $password) {
        return md5($password . C('AUTH_TOKEN')) . $id;
    }
	/*密码加密*/
    public function encryptPassword($password){
		return think_ucenter_md5($password, UC_AUTH_KEY);
	}
	
    /*验证密码*/
    public function verifyUser($uid ,$pw){
		$return = $this->field('password')->where(array('id'=>$uid))->find();
		return think_ucenter_md5($pw) == $return['password']?true:false;
	}
	/*
	 *获取用户信息
	 * $id 用户id
	 * $fields 返回字段
	 * */
	public function findinfo($id,$field){
		$map["id"] = $id;
		return $this->field($field)->where($map)->find();
	}

	//验证兑换密码
    public function verifySafepw($id,$safepw){
    	$map["id"] = $id;
    	$map["safepw"] = $safepw;
        return $this->where($map)->count("id");
    }
}
