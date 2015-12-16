<?php
/* 杨哲 人工智能实验 2015.12*/

class AiAction extends Action {
	public function index(){
		$m=M('property');
		$propertyList = $m->select();
		$this->assign('propertyList',$propertyList);
		$this->display();
	}


	public function addInfo(){
		$m=M('property');
		$propertyList = $m->select();
		$this->assign('propertyList',$propertyList);

		$mm=M('Rules');
		$rulesList = $mm->select();
		$this->assign('rulesList',$rulesList);
		$this->display();
	}


	public function addProperty(){
		$property = $_POST['property'];
		$m = M('Property');
		$data['name'] =$property;
		$map['name']=$property;
		if ($m->where($map)->find()) {
			$this->ajaxReturn(0);
			
		}elseif($m->add($data)){
			$this->ajaxReturn(1);

		}
	}

	public function addRules(){
		$name=$_POST['rulename'];
		$propertys=$_POST['propertys'];
		$m=M('Rules');
		$data['name']=$name;
		$data['property']=$propertys;
		$map['property']=$propertys;
		if ($m->where($map)->find()) {
			$this->ajaxReturn(0);
			
		}elseif($m->add($data)){
			$this->ajaxReturn(1);

		}

	}

	public function doRecognition(){

		$propertys = $_POST['propertys'];
		$strlen = strlen($propertys);

		$m=M('Rules');
		if ($strlen>1) {
			//处理数组
			$property = explode(',',$propertys);
			$length = count($property);
			for($i=0;$i<count($length)+1;$i++){
				$map['fact']=$property[$i];
				if($m->where($map)->find()){
					$conclusion=$m->where($map)->getField('conclusion');
					$property[$i]=$conclusion;
				}
			}
			sort($property);
			$str=implode(',',$property);		
		}else{
			$str = $propertys;
		}

		$map2['fact']=$str;
		if ($m->where($map2)->find()) {
			$name_id=$m->where($map2)->getField('conclusion');
			$where['id']=$name_id;
			$name = M('Property')->where($where)->getField('name');
			$this->ajaxReturn($name,"",1);
		}else{
			$this->ajaxReturn("不存在该动物","",0);
		}

	}
   
}