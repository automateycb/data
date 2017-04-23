<?php
// 大盘指数
namespace Home\Model;
use Think\Model;
include "function.php";

Class RealtimeModel extends Model{

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
    public function search_realtime(){
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
        //        ->order('ratio asc')
                ->limit($limit)
                ->select();
        $class_mail= new \PHPMailer();     //PHPMailer对象
        foreach ($res as $key => $value) {
            
            $res[$key]['volume']=($res[$key]['volume'])/100;                       //转化为手
            $res[$key]['amount']=round(($res[$key]['amount'])/10000,2);            //成交额转化为万
            //计算涨跌幅
            $offset = ($res[$key]['price'])-($res[$key]['pre_close']) ;
            $res[$key]['ratio']= round($offset/($res[$key]['pre_close'])*100,2);
            //dump($value);
            if(abs($res[$key]['ratio'])>3){
               //涨幅
               if($res[$key]['ratio']>0){
                  $mail_this_rise=$res[$key]['name'].$res[$key]['code'];
                  $mail_text_rise=$mail_last_rise.$mail_this_rise;
                  $mail_last_rise=$mail_text_rise;
               }
               //跌幅
               else{
                  $mail_this_fall=$res[$key]['name'].$res[$key]['code'];
                  $mail_text_fall=$mail_last_fall.$mail_this_fall;
                  $mail_last_fall=$mail_text_fall;
               }
            }

        }
        $mail='1150756674@qq.com';
        //涨幅提醒
        if(!($mail_text_rise==null)){
          think_send_mail($class_mail,$mail,'严超彬','涨幅自动提醒',$mail_text_rise.'涨幅超过3%！');
        }
        //跌幅提醒
        if(!($mail_text_fall==null)){
          think_send_mail($class_mail,$mail,'严超彬','跌幅自动提醒',$mail_text_fall.'跌幅超过3%！');
        }
        //排序
        foreach ($res as $key1 => $value2) {
          $ratio[$key1]= $value2['ratio'];  
        }
        //降序
        array_multisort($ratio,SORT_DESC,$res);    
        //升序 
        //array_multisort($ratio,SORT_ASC,$res);      
        return array(
            'page'  =>  $page,
            'res'   =>  $res
        );

    }
}