<?php 
    namespace Home\Controller; 
    use Think\Controller; 
    // header("Content-type:text/html;charset=utf-8");  
    class IndexController extends Controller {    
        public function hello(){        
            echo 'hello,thinkphp!';    
        }
    public function test(){        
        echo '这是一个测试方法!';    
    }
    protected function hello2(){        
        echo '只是protected方法!';    
    }
    private function hello3(){        
        echo '这是private方法!';    
    } 
}