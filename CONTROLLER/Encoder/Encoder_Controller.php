<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 10/12/2015
 * Time: 3:55 AM
 */



class Encoder_Controller extends Sub_Encoder_Controller {


	//gets the region for edit
	function Region_Exists_For_Edit(Region $region,$Region_ID){

		$Region_Name = $region->getRegionName();

		$query = "select * from Region where name='$Region_Name' and ID != '$Region_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if(mysqli_num_rows($result) >= 1){
			return TRUE;
		}
		else if(mysqli_num_rows($result) >= 1){
			return FALSE;
		}

	}

	//gets single region
	function Get_Single_Region($Region_ID){

		$query = "select * from region where id='$Region_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return null;
		}

	}

	//delete the region
	function Delete_Region($Region_ID){

		$query = "DELETE FROM Region where ID='$Region_ID'";


		$result = mysqli_query($this->getDbc(),$query);


		//if the region is deleted return true
		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}

	}

	//edit the region
	function Edit_Region(Region $region,$Region_ID){


		$Name = $region->getRegionName();
		$Name_Amharic = $region->getRegionNameAmharic();

		$query = "UPDATE Region set Name='$Name',Name_Amharic='$Name_Amharic' where ID='$Region_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		//if the company is deleted return true
		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}




	//gets the city for the city
	function City_Exists_For_Edit(City $City,$City_ID){

		$City_Name = $City->getCity();

		$query = "select * from City where name='$City_Name' and ID != '$City_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if(mysqli_num_rows($result) >= 1){
			return TRUE;
		}
		else if(mysqli_num_rows($result) >= 1){
			return FALSE;
		}

	}

	//get single city
	function Get_Single_City($City_ID){

		$query = "select * from city where id='$City_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return null;
		}
	}

	//delete the city
	function Delete_City($City_ID){

		$query = "DELETE FROM City where ID='$City_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;

		}
		else{
			return FALSE;
		}
 	}

	//edit the city
	function Edit_City(City $City, $City_ID){

		$Name = $City->getCity();
		$Name_Amharic = $City->getCityAmharic();

		$query = "UPDATE City set Name='$Name',Name_Amharic='$Name_Amharic' where ID='$City_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		//if the city is edited return true else return false
		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}






	//checks the sub city for edit
	function Sub_City_Exists_For_Edit(Sub_City $Sub_City,$Sub_City_ID){
		$Sub_City_Name = $Sub_City->getSubCity();

		$query = "select * from sub_city where name='$Sub_City_Name' and ID != '$Sub_City_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if(mysqli_num_rows($result) >= 1){
			return TRUE;
		}
		else if(mysqli_num_rows($result) >= 1){
			return FALSE;
		}
	}

	//get single sub city
	function Get_Single_Sub_City($Sub_City_ID){

		$query = "select * from sub_city where id='$Sub_City_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return null;
		}

	}

	//delete sub city
	function Delete_Sub_City($Sub_City_ID){
		$query = "DELETE FROM Sub_City where ID='$Sub_City_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	//function edit subcity
 	function Edit_Sub_City(Sub_City $Sub_City,$Sub_City_ID){


		$Name = $Sub_City->getSubCity();
		$Name_Amharic = $Sub_City->getSubCityAmharic();

		$query = "UPDATE Sub_City set Name='$Name',Name_Amharic='$Name_Amharic' where ID='$Sub_City_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}



	//check the wereda for edit

	function Wereda_Exists_For_Edit(Wereda $Wereda,$Wereda_ID){

		$Wereda_Name = $Wereda->getWereda();

		$query = "select * from wereda where name='$Wereda_Name' and ID != '$Wereda_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if(mysqli_num_rows($result) >= 1){
			return TRUE;
		}
		else if(mysqli_num_rows($result) >= 1){
			return FALSE;
		}

	}

	//get single wereda
	function Get_Single_Wereda($Wereda_ID){
		$query = "select * from wereda where id='$Wereda_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return null;
		}
	}

	//delete kebele
 	function Delete_Wereda($Wereda_ID){


		$query ="DELETE FROM Wereda where ID='$Wereda_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	//edit kebele or wereda
	function Edit_Wereda(Wereda $Wereda,$Wereda_ID){


		$Name = $Wereda->getWereda();
		$Name_Amharic = $Wereda->getWeredaAmharic();

		$query = "UPDATE Wereda set Name='$Name',Name_Amharic='$Name_Amharic' where ID='$Wereda_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}


	//check sefer for edit
	function Sefer_Exists_For_Edit(Sefer $Sefer,$Sefer_ID){

		$Sefer_Name = $Sefer->getSefer();

		$query = "select * from sefer where name='$Sefer_Name' and ID != '$Sefer_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if(mysqli_num_rows($result) >= 1){
			return TRUE;
		}
		else if(mysqli_num_rows($result) >= 1){
			return FALSE;
		}

	}

	//get sefer for edit

	function Get_Single_Sefer($Sefer_ID){
		$query = "select * from sefer where id='$Sefer_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return null;
		}
	}

	//delete sefer
 	function Delete_Sefer($Sefer_ID){

		$query ="DELETE FROM Sefer where ID='$Sefer_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	//edit sefer
 	function Edit_Sefer(Sefer $Sefer,$Sefer_ID){

		$Name = $Sefer->getSefer();
		$Name_Amharic = $Sefer->getSeferAmharic();

		$query ="UPDATE Wereda set Name='$Name',Name_Amharic='$Name_Amharic' where ID='$Sefer_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}

	}

    //check for sefer edit

	function Street_Exists_For_Edit(Street $street,$Street_ID){


		$Street_Name = $street->getStreetName();

		$query = "select * from street where name='$Street_Name' and ID != '$Street_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if(mysqli_num_rows($result) >= 1){
			return TRUE;
		}
		else if(mysqli_num_rows($result) >= 1){
			return FALSE;
		}

	}



	//get single street
	function Get_Single_Street($Street_ID){

		$query = "select * from street where id='$Street_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return null;
		}

 	}


	//delete the street
	function Delete_Street($Street_ID){

		$query = "DELETE FROM Street where ID='$Street_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}


	}

	//edit the street
 	function Edit_Street(Street $Street,$Street_ID){

		$Street_Name = $Street->getStreetName();
		$Street_Name_Amharic = $Street->getStreetNameAmharic();
		$About_Street = $Street->getStreetName();
		$About_Street_Amharic = $Street->getStreetNameAmharic();

		$query = "UPDATE street
					set Name='$Street_Name',Name_Amharic='$Street_Name_Amharic',
					About_Street='$About_Street',About_Street_Amharic='$About_Street_Amharic'
					where ID='$Street_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}

		else{
			return FALSE;
		}

	}

	//delete event

	function Delete_Event($Event_ID){


		$query  = "DELETE FROM Event where ID='$Event_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}


	}

	//update event


}





























