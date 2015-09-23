<?php
	namespace Home\Controller;
	use Think\Controller;
	class AdminController extends Controller{
		public function index(){
			/*echo 'hello';*/
			$this->display('Admin:verify');
		}

		public function verify(){

		}
	}