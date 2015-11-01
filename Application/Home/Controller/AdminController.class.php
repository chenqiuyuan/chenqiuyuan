<?php
	namespace Home\Controller;
	use Think\Controller;
	class AdminController extends Controller{
		 
	
		public function index(){
			// echo 'hello';
			$this->display('Admin:login');
		}

		public function adminlogin(){
			// echo 'hello';
			$this->display('Admin:index');
		}

		//on_doing_insert的增删查改
		public function on_doing_insert_interface(){
			$this->display();
		}

		public function login(){
			// 判断提交方式
	        if (IS_POST) {
	            // 实例化Login对象
	            $adminlogin = D('adminlogin');
	            // 自动验证 创建数据集
	            if (!$data = $adminlogin->create()) {
	                // 防止输出中文乱码
	                header("Content-type: text/html; charset=utf-8");
	                exit($adminlogin->getError());
	            }
	            // 组合查询条件
	            $condition = array();
	            $condition['username'] = $data['username'];
	            $result = $adminlogin->where($condition)->field('username,password')->find();
	            // 验证用户名 对比 密码
	            if ($result && $result['password'] == $data['password']) {
	                $this->success('登录成功,正跳转至管理器...', U('Admin/adminlogin'));
	            } else {
	                $this->error('登录失败,用户名或密码不正确!');
	            }
	        } else {
	        	echo "不是pause";
	            $this->display();
	        }
		}

		public function on_doing_edit($title=0){
		    $On_doing = M('On_doing');
		    $this->assign('vo',$On_doing->find($title));
		    $this->display();
		 }
		 public function on_doing_update(){
		    $On_doing   =   D('On_doing');
		    if($On_doing->create()) {
		        $result =   $On_doing->save();
		        if($result) {
		            $this->success('操作成功！');
		        }else{
		            $this->error('写入错误！');
		        }
		    }else{
		        $this->error($On_doing->getError());
		    }
		 }

		public function on_doing_insert(){
			$On_doing = D('On_doing');
			if($On_doing->create()){
				$result = $On_doing->add();
				if($result){
					$this->success("操作成功");
				}else{
					$this->error("写入失败");
				}
			}else{
				$this->error("create 错了！".$On_doing->geterror());
			}
		}

		public function on_doing_read(){

			$On_doing = M('On_doing');
			// $data = $On_doing->find('2');
			$data = $On_doing->select();
			if($data){
				$this->assign('data', $data);
			}else{
				$this->error("没数据了","on_doing");
			}
			$this->display('on_doing');
		}
		public function on_doing_delete($title=0)
        {
	        $On_doing=M('On_doing');
	        // if(!$data = $On_doing->create()){
         //        // 防止输出中文乱码
	        //     header("Content-type: text/html; charset=utf-8");
	        // 	exit($On_doing->getError());
	        // }
	        // $title = I('post.title');
	        
	      	$title = strtr($title,"+"," ");

	        $condition['title'] = $title;
	        $result = $On_doing->where($condition)->delete();
	        if ($result)
	        {
	        	$this->success("删除成功");
	        }
	        else{
	        	echo $title;
	        	$this->error("删除失败");
	        }
        }
			

		public function verify(){
			echo '验证函数';
		}
	}