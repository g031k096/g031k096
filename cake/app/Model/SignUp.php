<?php
class SignUp extends Model{
	public $name = 'SignUp';
	public $useTable = false;
	
	// var $validate = array(
 //        'login' => array(
 //        );
	// );


	public function judge($info){
		if(!empty($info['Touroku'])){
			if($info['Touroku']['grade'] == '0'){
				$data['level'] = '学部1年';
			}elseif($info['Touroku']['grade'] == '1'){
				$data['level'] = '学部2年';
			}elseif ($info['Touroku']['grade'] == '2') {
				$data['level'] = '学部3年';
			}elseif($info['Touroku']['grade'] == '3'){
				$data['level'] = '学部4年';
			}else{
				$data['level'] = '※選択されていません※';
			}

			if($info['Touroku']['sex'] == '1'){
				$data['sex'] = '女';
			}else{
				$data['sex'] = '男';	
			}

			$i = 0;
			foreach ($info['Touroku']['like'] as $value) {
				if($value != '0'){
					$data['like'][$i] = $value;
					$i++;
				}
			}
			$data['name'] = $info['Touroku']["l_name"]." ".$info['Touroku']["f_name"];
			$data['comment'] = $info['Touroku']["comment"];
			$data['password'] = $info['Touroku']["password"];
			$data['time'] = $info['Touroku']["time"];
		return $data;
		}
	}
}
?>