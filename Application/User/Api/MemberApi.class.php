<?php
// +----------------------------------------------------------------------
// | Freze [ Free ourselves ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.freze.cn All rights reserved.
// +----------------------------------------------------------------------
// | Project: www >>
// +----------------------------------------------------------------------
// | Author: Dashuai <496041341@.qq.com>
// +----------------------------------------------------------------------


namespace User\Api;
use User\Api\Api;
use User\Service\MemberService;

class MemberApi extends Api{
    /**
     * 构造方法，实例化操作模型
     */
    protected function _init(){
        $this->service = new MemberService();
        setconfig();
    }
    /* 查询所有上级id
     * int $id 用户id
     * return 用户数组
     * */
    public function selectallpid($id)
    {
        return $this->service->selectallpid($id);
    }
    /* 查询id的所有直接下级
     * int $id 用户id
     * string $order 排序
     * array $fields
     * int $start_position
     * int $page_num
     * return 用户数组
     * */
    public function selectdirectchildreninfo($id,$order = "id asc",$fields = "*",$start_position = 0,$page_num=10){
        return $this->service->selectdirectchildreninfo($id,$order,$fields,$start_position,$page_num);
    }
    /* 查询所有下级id
     * int $id 用户id
     * int $level 返回层级
     * return 用户数组
     * */
    public function selectallchildrenid($id,$level)
    {
        return $this->service->selectallchildrenid($id,$level);
    }
    /* 获取某用户信息
     * int $id 用户id
     * string $fields 返回字段
     * return 用户数组
     * */
    public function getinfo($id,$fields){
        return $this->service->getinfo($id,$fields);
    }

    /* 更新用户上级积分
     * int $id 用户id
     * array $level_all_score 所有层级积分
     * return status,info
     * */
    public function updateaddpidscore($id,$level_all_score){
        return $this->service->updateaddpidscore($id,$level_all_score);
    }
    /* 更新单个用户积分
     * int $id 用户id
     * array $score 用户变化积分积分(带正负)
     * return status,info
     * */
    public function  updateonescore($id,$score){
        return $this->service->updateonescore($id,$score);
    }

    /* 获取用户积分相关值
     * int $id 用户id
     * array $status 用户变化积分积分(带正负)
     * return int
     * */
    public function getonepoint($id,$status){
        return $this->service->getonepoint($id,$status);
    }
    /* 获取用户积分相关值
    * int $id 用户id
    * array $status 获取用户下级总数
    * return int
    * */
    public function getnum($id){
        return $this->service->getnum($id);
    }
    /*开启事务
     * */
    public function startTrans(){
        $this->service->startTrans();

    }
    /*回滚事务
     * */
    public function rollback(){
        $this->service->rollback();
    }
    /*执行事务
     * */
    public function commit(){
        $this->service->commit();

    }
    
}