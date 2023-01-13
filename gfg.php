<?php
echo("hello");	
if($_SERVER['REQUEST_METHOD'] == 'POST') {
				
	function get_data() {
		$name = $_POST['name'];
		$file_name='StudentsData'. '.json';

		if(file_exists("$file_name")) {
			$current_data=file_get_contents("$file_name");
			$array_data=json_decode($current_data, true);
							
			$extra=array(
				'Name' => $_POST['name'],
				'Branch' => $_POST['branch'],
				'Year' => $_POST['year'],
			);
			$array_data[]=$extra;
			echo "file exist<br/>";
			return json_encode($array_data);
		}
		else {
			$datae=array();
			$datae[]=array(
				'Name' => $_POST['name'],
				'Branch' => $_POST['branch'],
				'Year' => $_POST['year'],
			);
			echo "file not exist<br/>";
			return json_encode($datae);
		}
	}

	$file_name='StudentsData'. '.json';
	
	if(file_put_contents("$file_name", get_data())) {
		echo 'success';
	}				
	else {
		echo 'There is some error';				
	}
}
	
?>
