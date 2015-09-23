<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		$this->display();        
    }

    public function _initialize(){
        // echo '这是一个初始化_initialize';
    }

    public function head(){
    	$this->display('/Public/head/head.html');
    }
    public function hello($name='lalalaphp'){        
     	$this->assign('name',$name);
     	$assign('APP_PATH',$APP_PATH);       
      	$this->display();    
 	}

 	public function image(){
 		// $image = new \Think\Image(\Think\Image::IMAGE_GD,'./1.png');
	 		$image = new \Think\Image(); 
	 		$image->open('./1.jpg');
 	}

 	public function DB(){
 		$Data     = M('Data');// 实例化Data数据模型        
 		$result     = $Data->find(1);        
 		$this->assign('result',$result);        
 		$this->display(hello);
 	}
}

