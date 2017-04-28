<?php
// +----------------------------------------------------------------------
// | Freze [ Free ourselves ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.freze.cn All rights reserved.
// +----------------------------------------------------------------------
// | Project: www --- MemberModel.php
// +----------------------------------------------------------------------
// | Author: Dashuai <496041341@.qq.com>
// +----------------------------------------------------------------------


namespace User\Model;
use Think\Model\RelationModel;

/*
 * 会员操作
 *
 * */
class MemberModel extends RelationModel
{
    protected $connection = UC_DB_DSN;//数据库连接配置
    protected $tablePrefix = UC_TABLE_PREFIX;
    /* 查询所有上级
     * */
    public function selectallpid($id){
        $source_allpid =  $this->query("SELECT getParentLst(".$id.") AS allpid");
        return $source_allpid[0]["allpid"];
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
        return $this->join("freze_ucenter_member on freze_ucenter_member.id=freze_member.id","LEFT")->where(array('freze_member.pid'=>$id))->order($order)->field($fields)->limit($start_position,$page_num)->select();
    }
    /*
     * int id 用户id
     * int level 层级
     * */
    public function selectallchildrenid($id,$level){
        $source_all_children_id =  $this->query("SELECT getChildLst( ".$id.", ".$level." ) as allchildrenid");
        return $source_all_children_id[0]['allchildrenid'];
    }
    /*
     * int id 用户id
     * string fields 返回字段
     * */
    public function getinfo($id,$fields){
        return $this->field($fields)->where(array("freze_member.id"=>$id))->join("freze_file on freze_member.icon = freze_file.id")->find();
    }
    /*更新一个用户积分
    * int id 用户id
    * int score 积分
    * */
    public function updateonescore($id,$score){
        return $this->execute("update ".$this->tablePrefix."member set score=score".$score." where id=".$id.";");
    }
    /* 获取用户积分相关值
     * int $id 用户id
     * array $status 用户变化积分积分(带正负)
     * return status,info
     * */
    public function getonepoint($id,$status){
        $map["member_id"] = $id;
        $map["status"] = $status;
        return $this->table("freze_apply")
            ->where($map)->sum("exchange_score");
    }
    /* 获取用户下级数量
     * int $id 用户id
     * return int
     * */
    public function getnum($id){
        return $this->join("freze_ucenter_member on freze_ucenter_member.id=freze_member.id","LEFT")->where(array('freze_member.pid'=>$id))->count("freze_member.id");
    }
}