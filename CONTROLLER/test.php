<?php

//checks if the value exists in the specialization array
function exists($value,$array){

	for($i = 0; $i < 5; $i++) {

		if($value == $array[$i]){
			return true;
		}

	}
	return false;

}


$Spec_Arr = array();
$Spec_Arr[] = '1';
$Spec_Arr[] = '2';
$Spec_Arr[] = NULL;
$Spec_Arr[] = NULL;
$Spec_Arr[] = NULL;
$value = 2;
if(exists($value,$Spec_Arr)){
	echo("found");
}






