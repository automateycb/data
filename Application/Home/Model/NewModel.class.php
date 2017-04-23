<?php
// 大盘指数
namespace Home\Model;
use Think\Model;

Class NewModel extends Model{

	 // //插入之前
  //   protected function _before_insert(&$data, $option){
  //   }
    
  //     //插入之前
  //   protected function _before_insert(&$data, $option){
  //   }
    
  //   //插入之后
  //   protected function _after_insert($data, $option){
        
  //   }    

  //   //更新之前
  //   protected function _before_update(&$data, $option){
        
  //   }        
    
  //   //更新之后
  //   protected function _after_update($data, $option){
        
  //   } 

  //   // 删除之前
  //   protected function _before_delete($option){

  //   }       

  //   // 删除之后
  //   protected function _after_delete($option){

  //   }    

    //实现 搜索 分页
    public function search_news(){
    	$where=array();
    	// 查询满足要求的总记录数
        $count = $this->where($where)->count();// 查询满足要求的总记录数
        $Page  = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数
                //设置
        $Page->setConfig('first','首页');
        $Page->setConfig('last','尾页');    
        $Page->setConfig('next','下一页');
        $Page->setConfig('prev','上一页');
        
        $page  = $Page->show();// 分页显示输出    
        $limit=$Page->firstRow.','.$Page->listRows;
        
        $res=$this->where($where)
 //               ->order('index asc')
                ->limit($limit)
                ->select();
        return array(
            'page'  =>  $page,
            'res'   =>  $res
        );

    }
}