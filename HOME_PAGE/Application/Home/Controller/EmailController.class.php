<?php
	namespace Home\Controller;
	use Think\Controller;
	class EmailController extends Controller{
		public function index(){
			echo 'this is shown to Email';
		}

		public function email(){
			
			
			$Verify = new \Think\Verify();
			// $Verify->fontttf = '5.ttf';
			$Verify->useZh = true; 
			$Verify->entry();
		}
	}