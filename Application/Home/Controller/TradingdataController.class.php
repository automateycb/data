<?php
//交易数据
namespace Home\Controller;
use Think\Controller;
class TradingdataController extends Controller {
	//大盘行情
    public function index(){
       
       $model=D('Index');
       $res=$model->search_index();
       // dump($res);
       $this->assign('res',$res);
       $this->display();
    }
    
    //实时新闻
    public function news(){

       $model=D('New');
       $res=$model->search_news();
       // dump($res);
       $this->assign('res',$res);
       $this->display();
    }

    //自选实时行情
    public function realtime(){

    	$model=D('Realtime');
    	$res=$model->search_realtime();
    	 // dump($res);
        $this->assign('res',$res);
        $this->display();
    }

}