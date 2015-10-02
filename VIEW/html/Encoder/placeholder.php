<?php
if(empty($errors)){


//then lets make a class from what we have right now to sth object oriented

//first lets make a building object
$Building_C = new Building($Building_Name,$Building_Name_Amharic,$Building_Description,$Building_Description_Amharic,$Parking_Area);


//first lets check if the building is registered before

if($encoder_con->Building_Exists($Building_C)){
encoder_place_redirect(Error_Type::SAME_REGISTERED_DATA);
}


//if the building is not registered before, add it to the database
$result = $encoder_con->Add_Building($Building_C);

//this will hold the id of last added building
$added_building_id = $encoder_con->getDb()->get_last_id();

//make the address class
$Address_C = new Address($Street_ID,$Direction,$Direction_Amharic,null,$added_building_id);
//add the address to the database
$result_address = $encoder_con->Add_Address($Address_C);
//this will hold the id of the address
$added_address_id = $encoder_con->getDb()->get_last_id();

//make the place class
$Place_C = new Place($added_address_id,$Region_ID,$City_ID,$Sub_City_ID,$Wereda_ID,$Sefer_ID);
//add the place to the database
$result_place = $encoder_con->Add_Place($Place_C);


if($result_place){
encoder_redirect_success($Building_C);
}
else{
encoder_place_redirect(Error_Type::DATA_BASE);
}

}
else{

encoder_place_redirect(Error_Type::FORM);
}