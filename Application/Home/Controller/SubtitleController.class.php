<?php
namespace Home\Controller;
use Think\Controller;
class SubtitleController extends Controller{
	public function debt(){
		$this->display('Subtitle:debt');
	}

	public function log(){
		$this->display('Subtitle:log');
	}

	public function on_doing(){
		$this->display('Subtitle:on_doing');
	}

	public function physical_index(){
		$this->display('Subtitle:physical_index');
	}

	public function go_doing(){
		$this->display('Subtitle:go_doing');
	}

	public function LBS_running(){
		$this->display('Subtitle:LBS_running');
	}
}