<?php

session_start();


function check_encoder_status(){
	if(isset($_SESSION['Logged_In_User'])){
		//if the user is logged in return true
		return true;
	}
	else{
		//if the user is not logged in return false
		return false;
	}
}

function get_encoder_type(){

	$user = $_SESSION['Logged_In_User'];
	$user_type = $user->getUserType();
	return $user_type;
}


//this will redirect the user to the login page
function redirect_to_index(){
	$dir = "VIEW/html/Login/Login.php";//this is the login directory

	$url = BASE_URL.$dir;

	header("Location:$url");
	exit();
}

//if the user is not logged in redirect it to index
//if the user is not also encoder redirect it to the index
if(check_encoder_status()){
	if( User_Type::OPERATOR != get_encoder_type()){
		redirect_to_index();
	}
}
else{
	redirect_to_index();
}