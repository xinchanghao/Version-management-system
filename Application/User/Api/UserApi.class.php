<?php
// +----------------------------------------------------------------------
// | Freze [ Free ourselves ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.freze.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 大帅 <496041341@.qq.com>
// +----------------------------------------------------------------------

namespace User\Api;
use User\Api\Api;
use User\Model\UcenterMemberModel;

class UserApi extends Api{
    /**
     * 构造方法，实例化操作模型
     */
    protected function _init(){
        $this->model = new UcenterMemberModel();
        setconfig();
    }

    /**
     * 注册一个新用户
       uc_data
     * @param  string $username 用户名
     * @param  string $password 用户密码
     * @param  string $email    用户邮箱
     * @param  string $mobile   用户手机号码
     * @param  string $weixin   用户weixin
       member_data
     * @param  string $qq   用户qq
     * @return integer          注册成功-用户信息，注册失败-错误编号
     */
    public function register($uc_data ,$member_data = array(), $is_admin = false){

        /* 在当前应用中注册用户 */
        return $this->model->register($uc_data ,$member_data, $is_admin);
    }

    /**
     * 用户登录认证
     * @param  string  $username|mobile|email 用户名
     * @param  string  $password 用户密码
     * @param  integer $type     用户名类型 （1-用户名|邮箱|手机| ，2-UID）
     * @param  integer $is_admin     管理员登录 （1-是）
     * @return array  status 1成功,2未审核           登录成功-用户ID，登录失败-错误编号
     */
    public function login($username, $password, $type = 1,$is_admin =false){

        return $this->model->login($username, $password, $type,$is_admin);
    }

    /**
     * 获取用户信息
     * @param  string  $uid         用户ID或用户名
     * @param  string  $fields      用户返回字段
     * @param  boolean $is_username 是否使用用户名查询
     * @return array                用户信息
     */
    public function info($uid,$fields="*", $is_username = true){
        return $this->model->info($uid,$fields, $is_username);
    }
    //检测某字段
    public function checkField($field,$type){
        return $this->model->checkreField($field,$type);
    }
    /**
     * 检测用户名
     * @param  string  $field  用户名
     * @return integer         错误编号
     */
    public function checkUsername($username){
        return $this->model->checkField($username, 1);
    }

    /**
     * 检测邮箱
     * @param  string  $email  邮箱
     * @return integer         错误编号
     */
    public function checkEmail($email){
        return $this->model->checkField($email, 2);
    }

    /**
     * 检测手机
     * @param  string  $mobile  手机
     * @return integer         错误编号
     */
    public function checkMobile($mobile){
        return $this->model->checkField($mobile, 3);
    }

    /**
     * 更新用户信息
     * @param int $uid 用户id
     * @param string $password 密码，用来验证
     * @param array $data 修改的字段数组
     * @return true 修改成功，false 修改失败
     * @author huajie <banhuajie@163.com>
     */
    public function updateInfo($uid, $password, $data){
        if($this->model->updateUserFields($uid, $password, $data) !== false){
            $return['status'] = true;
        }else{
            $return['status'] = false;
            $return['info'] = $this->model->getError();
        }
        return $return;
    }
     public function update($uid, $data){
        if($this->model->updateUser($uid, $data) !== false){
            $return['status'] = true;
        }else{
            $return['status'] = false;
            $return['info'] = $this->model->getError();
        }
        return $return;
    }
    /*password*/
    public function updatePw($uid,$pw,$rnewpw,$newpw){
        $return['status']=false;
        if($this->model->verifyUser($uid,$pw)&&$rnewpw==$newpw&&!empty($newpw)){
            $data['password']=think_ucenter_md5($newpw);
            if($this->model->where(array('id'=>$uid))->data($data)->save() > 0){
            $return['status']=true;$return["info"]="密码修改成功！";
            return $return; }else {$return['info']="未知错误！"; return $return;}
        }else{$return['info']="用户密码错误或新密码两次不一致";
            return $return;
        }
    }
    /*password*/
    public function forgetpw($uid,$rnewpw,$newpw){
        $return['status']=false;
        if($rnewpw==$newpw){
            $data['password']=think_ucenter_md5($newpw, UC_AUTH_KEY);
            if($this->model->where(array('id'=>$uid))->data($data)->save() > 0){
                $return['status']=true;
                return $return;
            }else {
                $return['info']="未知错误！"; return $return;}
        }else{
            $return['info']="或新密码两次输入不一致";
            return $return;
        }
    }
    /*获取用户信息
     *
     * */
    public function findinfo($id,$field){
        return $this->model->findinfo($id,$field);
    }
    
    //验证兑换密码
    public function verifySafepw($id,$safepw){
         $flag = $this->model->verifySafepw($id ,$safepw)>0?true:false;
         if($flag){
            $result = array(
                               "status" => 1,
                               "info" => "密码输入成功"
                           );
         }else{
            $result = array(
                                "status" => -1,
                                "info" => "密码输入错误,请重新输入"
                           );
         }
         return $result;
    }
}
