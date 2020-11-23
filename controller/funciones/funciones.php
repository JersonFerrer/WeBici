<?php 
	
	function isEmail($email){
		if (filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
		}else{
			return false;
		}
	}
	

	function validaPassword($var1, $var2){
		if (strcmp($var1, $var2) !== 0){
			return false;
		}else{
			return true;
		}
	}
	
	function generateToken(){
		$gen = md5(uniqid(mt_rand(), false));	
		return $gen;
	}
	
	function resultBlock($errors){
		if(count($errors) > 0){
			echo "<div id='error' class='alert alert-danger' role='alert'>
			<a href='#' onclick=\"showHide('error');\">[X]</a>
			<ul>";
			foreach($errors as $error){
				echo "<li>".$error."</li>";
			}
			echo "</ul>";
			echo "</div>";
		}
	}

    
?>