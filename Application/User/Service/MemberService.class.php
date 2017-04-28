<?php
// +----------------------------------------------------------------------
// | Freze [ Free ourselves ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.freze.cn All rights reserved.
// +----------------------------------------------------------------------
// | Project: www --- MemberService.php
// +----------------------------------------------------------------------
// | Author: Dashuai <496041341@.qq.com>
// +----------------------------------------------------------------------

namespace User\Service;
use User\Model\MemberModel;

class MemberService extends Service{
    protected $tablePrefix = UC_TABLE_PREFIX;//数据库前缀
    public function __construct(){
        $this->Member = new MemberModel();
    }
    /*
     * @id 输入用户id
     * */
    //查询所有上级
    public function selectallpid($id){
        //查询返回字段

        $select_all_pid = $this->Member->selectallpid($id);//查询上级所有id
        $select_all_pid = ltrim($select_all_pid,",");//去除字符串首部“，”
        $select_all_pid_arr = str2arr($select_all_pid);//字符串转数组
        $select_all_pid_arr[0] = null;
        unset($select_all_pid_arr[0]);//去除自身
        return $select_all_pid_arr;
    }
    /* 查询id的所有直接下级
     * int $id 用户id
     * string $order 排序
     * array $fields
     * int $start_position
     * int $page_num
     * return 用户数组
     * */
    public function selectdirectchildreninfo($id,$order,$fields,$start_position,$page_num)
    {
        return $this->Member->selectdirectchildreninfo($id,$order,$fields,$start_position,$page_num);
    }
    /*
     * int id 用户id
     * int level 层级
     * return 数组
     * */
    public function selectallchildrenid($id,$level){
        $source_all_children_id =  $this->Member->selectallchildrenid($id,$level);
        $source_all_children_id = ltrim($source_all_children_id,",");//去除字符串首部“，”
        $select_all_children_arr = str2arr($source_all_children_id);//字符串转数组
        $select_all_children_arr[0] = null;
        unset($select_all_children_arr[0]);//去除自身
        return $select_all_children_arr;
    }
    /* 获取某用户信息
     * int $id 用户id
     * string $fields 返回字段
     * return 用户数组
     * */
    public function getinfo($id,$fields = "*"){
        return $this->Member->getinfo($id,$fields);
    }
    //获取用户信息
    public function getoneinfo($id,$fields){
        return $this->Member->getoneinfo($id,$fields);
    }
    /* 更新用户上级积分
     * int $id 用户id
     * array $level_all_score 所有层级积分
     * return status,info
     * */
    public function updateaddpidscore($id,$level_all_score){
        $all_ok = true;
        $select_all_pid_arr = $this->selectallpid($id);//数组返回用户上级
        $this->Member->startTrans();
        foreach ($select_all_pid_arr as $k => &$v) {
            //遍历所有上级用户
            if($v == 0||empty($level_all_score[$k]))break;//顶级0，未设置积分时跳出；
            if($this->Member->updateonescore($v,"+".$level_all_score[$k]) < 0){//更改某用户
                $all_ok = false;
            }
        }
        if($all_ok){$this->Member->commit();return array('status'=>1,'info'=>"该用户上级积分更新成功！");}
        else{ $this->rollback();return array('status'=>(-1),'info'=>"该用户上级积分更新失败");}

    }
    /* 更新单个用户积分
     * int $id 用户id
     * array $score 积分(带正负)
     * return status,info
     * */
    public function updateonescore($id,$score){
        $this->Member->startTrans();
        $return_id=$this->Member->updateonescore($id,$score);
        if($return_id > 0){
            $this->Member->commit();
            return array('status'=>1,'info'=>"该用户积分更新成功！");
        }
        else{
            $this->Member->rollback();
           return array('status'=>(-1),'info'=>"该用户积分更新成功！");
        }
    }
    /* 获取用户积分相关值
     * int $id 用户id
     * array $status 用户变化积分积分(带正负)
     * return status,info
     * */
    public function getonepoint($id,$status){
        return $this->Member->getonepoint($id,$status);
    }
    /* 获取用户下级数量
     * int $id 用户id
     * return int
     * */
    public function getnum($id){
        return $this->Member->getnum($id);
    }
    /*开启事务
     * */
    public function startTrans(){
        $this->Member->startTrans();

    }
    /*回滚事务
     * */
    public function rollback(){
        $this->Member->rollback();
    }
    /*执行事务
     * */
    public function commit(){
        $this->Member->commit();

    }

}