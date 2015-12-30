<?php

class Encoder_Controller extends Sub_Encoder_Controller {



	//gets the number of not expired companies
	function Get_Not_Expired_Companies_Num(){
		$query = "select count(id) as number from payment_status
					where Expiration_Date > curdate()";
		$result = mysqli_query($this->getDbc(),$query);
		$res = mysqli_fetch_array($result,MYSQLI_ASSOC);

		$number = $res['number'];

		if($result){
			return $number;
		}
		else{
			return 0;
		}
	}


	//gets the number of expired companies
	function Get_Expired_Companies_Num(){

		$query = "select count(id) as number from payment_status
					where Expiration_Date < curdate()";
		$result = mysqli_query($this->getDbc(),$query);
		$res = mysqli_fetch_array($result,MYSQLI_ASSOC);

		$number = $res['number'];

		if($result){
			return $number;
		}
		else{
			return 0;
		}


	}
	//get officially registered companies

	function Get_Not_Officially_Registered_Companies(){
		$query = "select count(id) as number from payment_status
				where Registration_Type = 'NOT_OFFICIAL'";

		$result = mysqli_query($this->getDbc(),$query);
		$res = mysqli_fetch_array($result,MYSQLI_ASSOC);

		$number = $res['number'];

		if($result){
			return $number;
		}
		else{
			return 0;
		}
	}


	//get companies that are registerd officially
	function Get_Officially_Registered_Companies(){
		$query = "select count(id) as number from payment_status
				where Registration_Type != 'NOT_OFFICIAL'";

		$result = mysqli_query($this->getDbc(),$query);
		$res = mysqli_fetch_array($result,MYSQLI_ASSOC);

		$number = $res['number'];

		if($result){
			return $number;
		}
		else{
			return 0;
		}

	}


	//gets the total number of company
	function Get_Total_Company(){

		$query = "select count(id) as number from company";
		$result = mysqli_query($this->getDbc(),$query);
		$res = mysqli_fetch_array($result,MYSQLI_ASSOC);

		$number = $res['number'];

		if($result){
			return $number;
		}
		else{
			return 0;
		}
	}
	//get companies for summary
	function Get_Companies_For_Summary($Registration_Type){

		$query = "SELECT COUNT(*) as number  from payment_status
					where Registration_type = '$Registration_Type'";

		$result = mysqli_query($this->getDbc(),$query);
		$res = mysqli_fetch_array($result,MYSQLI_ASSOC);

		$number = $res['number'];

		if($result){
			return $number;
		}
		else{
			return 0;
		}

	}

	//get expired companies for summary
	function Get_Expired_Companies_For_Summary($Registration_Type){
		$query = "SELECT count(*) number  from payment_status
					where Registration_type = '$Registration_Type' AND Expiration_Date < curdate()";

		$result = mysqli_query($this->getDbc(),$query);
		$res = mysqli_fetch_array($result,MYSQLI_ASSOC);

		$number = $res['number'];

		if($result){
			return $number;
		}
		else{
			return 0;
		}
	}

	//get not expired companies for summary
	function Get_Not_Expired_Companies_For_Summary($Registration_Type){
		$query = "SELECT count(*) number  from payment_status
					where Registration_type = '$Registration_Type' AND Expiration_Date > curdate()";

		$result = mysqli_query($this->getDbc(),$query);
		$res = mysqli_fetch_array($result,MYSQLI_ASSOC);

		$number = $res['number'];

		if($result){
			return $number;
		}
		else{
			return 0;
		}
	}


	function Get_Companies_For_Different_Listing_All($Registration_Type){
		$query = "select COM_ID as company_id,COM_NAME as company_name,COM_Name_Amharic as company_name_amharic, COM_REG_DATE as registration_date
		,CAT_Name as category,CAT_Name_Amharic as category_amharic,ADDR_ID as address_id,Belong_to as belong_to,PAY_STAT.Registration_Type,
if(PAY_STAT.Expiration_Date<CURDATE(),'EXPIRED','NOT_EXPIRED') as Expiration_Date
from (select COM.ID as COM_ID,COM.Name as COM_NAME,COM.Name_Amharic as COM_Name_Amharic,COM.Registration_date as COM_REG_DATE,
			 COM_ADDR.company_id as COM_ADDR_COM_ID, COM_ADDR.address_id as COM_ADDR_ADDR_ID,
			 ADDR.ID as ADDR_ID,ADDR.Belong_to
		from company as COM
		inner join company_address as COM_ADDR
		on COM.ID = COM_ADDR.company_id
		inner join address as ADDR
		on ADDR.ID = COM_ADDR.address_id) as com_addr_spec

		inner join
		(select COM_CAT.company_id as COM_CAT_COM_ID, COM_CAT.category_id as COM_CAT_CAT_ID,
				CAT.ID as CAT_ID,CAT.Name as CAT_Name,CAT.Name_Amharic as CAT_Name_Amharic
		from company_category as COM_CAT
		inner join category as CAT
		on COM_CAT.category_id = CAT.id) as cat_spec

		on COM_ID = COM_CAT_COM_ID

		inner join
		(select * from
		payment_status
		where Registration_Type='$Registration_Type') as PAY_STAT
 		on COM_ID = PAY_STAT.ID


ORDER by company_name";


		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return FALSE;
		}
	}

	function Get_Companies_For_Different_Listings($Registration_Type,$Name_Start = null){

		$Word_Start = "A";
		if($Name_Start != null){
			$Word_Start = $Name_Start;
		}

		$query = "select COM_ID as company_id,COM_NAME as company_name,COM_Name_Amharic as company_name_amharic, COM_REG_DATE as registration_date
		,CAT_Name as category,CAT_Name_Amharic as category_amharic,ADDR_ID as address_id,Belong_to as belong_to,PAY_STAT.Registration_Type,
if(PAY_STAT.Expiration_Date<CURDATE(),'EXPIRED','NOT_EXPIRED') as Expiration_Date
from (select COM.ID as COM_ID,COM.Name as COM_NAME,COM.Name_Amharic as COM_Name_Amharic,COM.Registration_date as COM_REG_DATE,
			 COM_ADDR.company_id as COM_ADDR_COM_ID, COM_ADDR.address_id as COM_ADDR_ADDR_ID,
			 ADDR.ID as ADDR_ID,ADDR.Belong_to
		from company as COM
		inner join company_address as COM_ADDR
		on COM.ID = COM_ADDR.company_id
		inner join address as ADDR
		on ADDR.ID = COM_ADDR.address_id) as com_addr_spec

		inner join
		(select COM_CAT.company_id as COM_CAT_COM_ID, COM_CAT.category_id as COM_CAT_CAT_ID,
				CAT.ID as CAT_ID,CAT.Name as CAT_Name,CAT.Name_Amharic as CAT_Name_Amharic
		from company_category as COM_CAT
		inner join category as CAT
		on COM_CAT.category_id = CAT.id) as cat_spec

		on COM_ID = COM_CAT_COM_ID

		inner join
		(select * from
		payment_status
		where Registration_Type='$Registration_Type') as PAY_STAT
 		on COM_ID = PAY_STAT.ID

where COM_Name like '$Word_Start%'
ORDER by company_name;";


		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return FALSE;
		}
	}

	function Get_Building_For_Listing_All(){



		$query = "select * from building as BUL ORDER BY Name";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return FALSE;
		}

	}

	//connected with building for listing
 	function Get_Building_For_Listing($Name_Start = null){

		$Word_Start = "A";
		if($Name_Start != null){
			$Word_Start = $Name_Start;
		}


		$query = "select * from building as BUL where Name like '$Word_Start%' ORDER BY Name";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return FALSE;
		}

	}

	function Get_Not_Expired_Companies_All(){

		$query = "select COM_ID as company_id,COM_NAME as company_name,COM_Name_Amharic as company_name_amharic, COM_REG_DATE as registration_date
		,CAT_Name as category,CAT_Name_Amharic as category_amharic,ADDR_ID as address_id,Belong_to as belong_to,PAY_STAT.Registration_Type,if(PAY_STAT.Expiration_Date<CURDATE(),'EXPIRED','NOT_EXPIRED') as Expiration_Date
from (select COM.ID as COM_ID,COM.Name as COM_NAME,COM.Name_Amharic as COM_Name_Amharic,COM.Registration_date as COM_REG_DATE,
			 COM_ADDR.company_id as COM_ADDR_COM_ID, COM_ADDR.address_id as COM_ADDR_ADDR_ID,
			 ADDR.ID as ADDR_ID,ADDR.Belong_to
		from company as COM
		inner join company_address as COM_ADDR
		on COM.ID = COM_ADDR.company_id
		inner join address as ADDR
		on ADDR.ID = COM_ADDR.address_id) as com_addr_spec

		inner join
		(select COM_CAT.company_id as COM_CAT_COM_ID, COM_CAT.category_id as COM_CAT_CAT_ID,
				CAT.ID as CAT_ID,CAT.Name as CAT_Name,CAT.Name_Amharic as CAT_Name_Amharic
		from company_category as COM_CAT
		inner join category as CAT
		on COM_CAT.category_id = CAT.id) as cat_spec

		on COM_ID = COM_CAT_COM_ID

		inner join
		payment_status as PAY_STAT
		on COM_ID = PAY_STAT.ID
where  CURDATE() < PAY_STAT.Expiration_Date
ORDER by company_name";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return FALSE;
		}

	}

	//this will return companies that are not expired
	function Get_Not_Expired_Companies($Name_Start = null){

		$Word_Start = "A";
		if($Name_Start != null){
			$Word_Start = $Name_Start;
		}

		$query = "select COM_ID as company_id,COM_NAME as company_name,COM_Name_Amharic as company_name_amharic, COM_REG_DATE as registration_date
		,CAT_Name as category,CAT_Name_Amharic as category_amharic,ADDR_ID as address_id,Belong_to as belong_to,PAY_STAT.Registration_Type,if(PAY_STAT.Expiration_Date<CURDATE(),'EXPIRED','NOT_EXPIRED') as Expiration_Date
from (select COM.ID as COM_ID,COM.Name as COM_NAME,COM.Name_Amharic as COM_Name_Amharic,COM.Registration_date as COM_REG_DATE,
			 COM_ADDR.company_id as COM_ADDR_COM_ID, COM_ADDR.address_id as COM_ADDR_ADDR_ID,
			 ADDR.ID as ADDR_ID,ADDR.Belong_to
		from company as COM
		inner join company_address as COM_ADDR
		on COM.ID = COM_ADDR.company_id
		inner join address as ADDR
		on ADDR.ID = COM_ADDR.address_id) as com_addr_spec

		inner join
		(select COM_CAT.company_id as COM_CAT_COM_ID, COM_CAT.category_id as COM_CAT_CAT_ID,
				CAT.ID as CAT_ID,CAT.Name as CAT_Name,CAT.Name_Amharic as CAT_Name_Amharic
		from company_category as COM_CAT
		inner join category as CAT
		on COM_CAT.category_id = CAT.id) as cat_spec

		on COM_ID = COM_CAT_COM_ID

		inner join
		payment_status as PAY_STAT
		on COM_ID = PAY_STAT.ID
where COM_Name like '$Word_Start%' and  CURDATE() < PAY_STAT.Expiration_Date
ORDER by company_name";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return FALSE;
		}

	}

	function Get_Expired_Companies_All(){
		$query = "select COM_ID as company_id,COM_NAME as company_name,COM_Name_Amharic as company_name_amharic, COM_REG_DATE as registration_date
		,CAT_Name as category,CAT_Name_Amharic as category_amharic,ADDR_ID as address_id,Belong_to as belong_to,PAY_STAT.Registration_Type,if(PAY_STAT.Expiration_Date<CURDATE(),'EXPIRED','NOT_EXPIRED') as Expiration_Date
from (select COM.ID as COM_ID,COM.Name as COM_NAME,COM.Name_Amharic as COM_Name_Amharic,COM.Registration_date as COM_REG_DATE,
			 COM_ADDR.company_id as COM_ADDR_COM_ID, COM_ADDR.address_id as COM_ADDR_ADDR_ID,
			 ADDR.ID as ADDR_ID,ADDR.Belong_to
		from company as COM
		inner join company_address as COM_ADDR
		on COM.ID = COM_ADDR.company_id
		inner join address as ADDR
		on ADDR.ID = COM_ADDR.address_id) as com_addr_spec

		inner join
		(select COM_CAT.company_id as COM_CAT_COM_ID, COM_CAT.category_id as COM_CAT_CAT_ID,
				CAT.ID as CAT_ID,CAT.Name as CAT_Name,CAT.Name_Amharic as CAT_Name_Amharic
		from company_category as COM_CAT
		inner join category as CAT
		on COM_CAT.category_id = CAT.id) as cat_spec

		on COM_ID = COM_CAT_COM_ID

		inner join
		payment_status as PAY_STAT
		on COM_ID = PAY_STAT.ID
where PAY_STAT.Expiration_Date < CURDATE()
ORDER by company_name";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return FALSE;
		}
	}

	//this will return compnies that are expired
	function Get_Expired_Companies($Name_Start = null){

		$Word_Start = "A";
		if($Name_Start != null){
			$Word_Start = $Name_Start;
		}

		$query = "select COM_ID as company_id,COM_NAME as company_name,COM_Name_Amharic as company_name_amharic, COM_REG_DATE as registration_date
		,CAT_Name as category,CAT_Name_Amharic as category_amharic,ADDR_ID as address_id,Belong_to as belong_to,PAY_STAT.Registration_Type,if(PAY_STAT.Expiration_Date<CURDATE(),'EXPIRED','NOT_EXPIRED') as Expiration_Date
from (select COM.ID as COM_ID,COM.Name as COM_NAME,COM.Name_Amharic as COM_Name_Amharic,COM.Registration_date as COM_REG_DATE,
			 COM_ADDR.company_id as COM_ADDR_COM_ID, COM_ADDR.address_id as COM_ADDR_ADDR_ID,
			 ADDR.ID as ADDR_ID,ADDR.Belong_to
		from company as COM
		inner join company_address as COM_ADDR
		on COM.ID = COM_ADDR.company_id
		inner join address as ADDR
		on ADDR.ID = COM_ADDR.address_id) as com_addr_spec

		inner join
		(select COM_CAT.company_id as COM_CAT_COM_ID, COM_CAT.category_id as COM_CAT_CAT_ID,
				CAT.ID as CAT_ID,CAT.Name as CAT_Name,CAT.Name_Amharic as CAT_Name_Amharic
		from company_category as COM_CAT
		inner join category as CAT
		on COM_CAT.category_id = CAT.id) as cat_spec

		on COM_ID = COM_CAT_COM_ID

		inner join
		payment_status as PAY_STAT
		on COM_ID = PAY_STAT.ID
where COM_Name like '$Word_Start%' and PAY_STAT.Expiration_Date < CURDATE()
ORDER by company_name";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return FALSE;
		}

	}

	function Get_All_Companies(){

		$query = "select COM_ID as company_id,COM_NAME as company_name,COM_Name_Amharic as company_name_amharic, COM_REG_DATE as registration_date
		,CAT_Name as category,CAT_Name_Amharic as category_amharic,ADDR_ID as address_id,Belong_to as belong_to,PAY_STAT.Registration_Type,if(PAY_STAT.Expiration_Date<CURDATE(),'EXPIRED','NOT_EXPIRED') as Expiration_Date
from (select COM.ID as COM_ID,COM.Name as COM_NAME,COM.Name_Amharic as COM_Name_Amharic,COM.Registration_date as COM_REG_DATE,
			 COM_ADDR.company_id as COM_ADDR_COM_ID, COM_ADDR.address_id as COM_ADDR_ADDR_ID,
			 ADDR.ID as ADDR_ID,ADDR.Belong_to
		from company as COM
		inner join company_address as COM_ADDR
		on COM.ID = COM_ADDR.company_id
		inner join address as ADDR
		on ADDR.ID = COM_ADDR.address_id) as com_addr_spec

		inner join
		(select COM_CAT.company_id as COM_CAT_COM_ID, COM_CAT.category_id as COM_CAT_CAT_ID,
				CAT.ID as CAT_ID,CAT.Name as CAT_Name,CAT.Name_Amharic as CAT_Name_Amharic
		from company_category as COM_CAT
		inner join category as CAT
		on COM_CAT.category_id = CAT.id) as cat_spec

		on COM_ID = COM_CAT_COM_ID

		inner join
		payment_status as PAY_STAT
		on COM_ID = PAY_STAT.ID
 		ORDER by company_name";

		$result  = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return FALSE;
		}
	}

	//this will return the company list from company table
	function Get_Company_For_Listing($Name_Start = null){

		$Word_Start = "A";

		if($Name_Start != null){
			$Word_Start = $Name_Start;
		}
		$query = "select COM_ID as company_id,COM_NAME as company_name,COM_Name_Amharic as company_name_amharic, COM_REG_DATE as registration_date
		,CAT_Name as category,CAT_Name_Amharic as category_amharic,ADDR_ID as address_id,Belong_to as belong_to,PAY_STAT.Registration_Type,if(PAY_STAT.Expiration_Date<CURDATE(),'EXPIRED','NOT_EXPIRED') as Expiration_Date
from (select COM.ID as COM_ID,COM.Name as COM_NAME,COM.Name_Amharic as COM_Name_Amharic,COM.Registration_date as COM_REG_DATE,
			 COM_ADDR.company_id as COM_ADDR_COM_ID, COM_ADDR.address_id as COM_ADDR_ADDR_ID,
			 ADDR.ID as ADDR_ID,ADDR.Belong_to
		from company as COM
		inner join company_address as COM_ADDR
		on COM.ID = COM_ADDR.company_id
		inner join address as ADDR
		on ADDR.ID = COM_ADDR.address_id) as com_addr_spec

		inner join
		(select COM_CAT.company_id as COM_CAT_COM_ID, COM_CAT.category_id as COM_CAT_CAT_ID,
				CAT.ID as CAT_ID,CAT.Name as CAT_Name,CAT.Name_Amharic as CAT_Name_Amharic
		from company_category as COM_CAT
		inner join category as CAT
		on COM_CAT.category_id = CAT.id) as cat_spec

		on COM_ID = COM_CAT_COM_ID

		inner join
		payment_status as PAY_STAT
		on COM_ID = PAY_STAT.ID
where COM_Name like '$Word_Start%'
ORDER by company_name";

		$result  = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return FALSE;
		}
	}

	//checks if the building name is held by other
	function Building_Exists_For_Edit(Building $Building,$Building_ID){

		$Building_Name = $Building->getName();
		$query = "select * from Building where name='$Building_Name' and ID != '$Building_ID'";
		$result = mysqli_query($this->getDbc(),$query);
		if(mysqli_num_rows($result) >= 1){
			return TRUE;
		}
		else if(mysqli_num_rows($result) >= 1){
			return FALSE;
		}
	}

	//get building for editing
	function Get_Building_For_Edit($Building_ID){

		$query = "select *
from  (select BUL.ID as BUL_ID, BUL.Name as Building_Name,BUL.Name_Amharic as Building_Name_Amharic,BUL.Building_Description as Building_Description,
BUL.Building_Description_Amharic as Building_Description_Amharic,BUL.Parking_Area
		from building as BUL
		where BUL.ID = '$Building_ID') as bul_spec

		inner join

		(
		select P.ID Place_ID, P.Region,P.City,P.Sub_City,P.Wereda,P.Sefer,P.Street
		from Place as P
		where P.ID = (select ADDR_P.Place_ID
						from address_place as ADDR_P
						where ADDR_P.Address_ID = (select BUL_ADDR.Address_ID
													from building_address as BUL_ADDR
													where BUL_ADDR.Building_ID = '$Building_ID') )


		) as place_spec

		inner join

		(select DIR.ID as DIR_ID,DIR.Direction,DIR.Direction_Amharic
		from direction as DIR
		where DIR.ID = (select ADDR_DIR.Direction_ID
						from address_direction as ADDR_DIR
						where ADDR_DIR.Address_ID = (select BUL_ADDR.Address_ID
													from building_address as BUL_ADDR
													where BUL_ADDR.Building_ID = '$Building_ID'))) as dir_spec";
 		$result = mysqli_query($this->getDbc(),$query);
 		if($result){
			return $result;
		}
		else{
			return null;
		}
	}



	//edit building
	function Edit_Building(Building $Building,$BUL_ID,Place $Place, $Place_ID,Direction $Dir, $Direction_ID){

		//start the transaction
		$query1 = "START TRANSACTION";
		$result1 = mysqli_query($this->getDbc(),$query1);

		$Building_Name = $Building->getName();
		$Building_Name_Amharic =$Building->getNameAmharic();
		$Building_Description = $Building->getBuildingDescription();
		$Building_Description_Amharic = $Building->getBuildingDescriptionAmharic();
		$Parking_Area = $Building->getParkingArea();
		$Building_ID = $BUL_ID;

		//now edit the company;
		$query2 = "Update Building set
		Name='$Building_Name',Name_Amharic = '$Building_Name_Amharic'
		,Building_Description='$Building_Description'
		,Building_Description_Amharic='$Building_Description_Amharic',
		Parking_Area='$Parking_Area' where ID='$Building_ID'";
 		$result2 = mysqli_query($this->getDbc(),$query2);

		if($result2){
			echo("result 2");
		}

		//edit the place
		$Region_ID = $Place->getRegionID();
		$City_ID = $Place->getCityID();
		$Sub_City_ID = $Place->getSubCityID();
		$Wereda_ID = $Place->getWeredaID();
		$Sefer_ID = $Place->getSeferID();
		$Street_ID = $Place->getStreetID();


		$query3 = "update place set
				Region='$Region_ID',City='$City_ID',Sub_City='$Sub_City_ID',Wereda='$Wereda_ID',Sefer='$Sefer_ID',Street='$Street_ID'
				where ID='$Place_ID'";

		$result3 = mysqli_query($this->getDbc(),$query3);

		if($result3){
			echo("result 3");
		}

		//update direction
		$Direction = $Dir->getDirection();
		$Direction_Amharic = $Dir->getDirectionAmharic();
 		$query4 = "update direction set
					Direction='$Direction',Direction_Amharic='$Direction_Amharic'
					where ID='$Direction_ID'";
 		$result4 = mysqli_query($this->getDbc(),$query4);
 		if($result4){
			echo("result 4");
		}
 		if($result1 AND $result2 AND $result3 AND $result4){
			$query_last = "COMMIT";
 			mysqli_query($this->getDbc(),$query_last);
			return TRUE;
 		}
		else{
			$query_last = "ROLLBACK";
			mysqli_query($this->getDbc(),$query_last);
			return FALSE;
 		}
 	}


	function Delete_Building($Building_ID,$Place_ID,$Direction_ID){

		//here we are going to get the id of the building address id
		$Building_Address_ID = $this->Get_Building_Address_ID($Building_ID);

		//we are going to get the address id
		$Address_ID = $this->Get_Address_ID_From_Building_Address($Building_ID);

		//get address direction id
		$Address_Direction_ID = $this->Get_Address_Direction_ID($Address_ID);

		//get the address place id
		$Address_Place_ID = $this->Get_Address_Place_ID($Address_ID);

		$query_first = "START TRANSACTION";
		$result_first = mysqli_query($this->getDbc(),$query_first);

		//delete the address direction id
 		$query1 = "DELETE  from Address_Direction where ID = '$Address_Direction_ID'";
		$result1 = mysqli_query($this->getDbc(),$query1);

		if($result1){
			echo("result 1");
		}

		//delete the direction
		$query2 = "DELETE  from Direction where ID = '$Direction_ID'";
		$result2 = mysqli_query($this->getDbc(),$query2);
		if($result2){
			echo("result 2");
		}

		//delete the address place
		$query3 = "DELETE  from Address_Place where ID = '$Address_Place_ID'";
		$result3 = mysqli_query($this->getDbc(),$query3);

		if($result3){
			echo("result 3");
		}

		//delete the place
		$query4 = "DELETE  from Place where ID = '$Place_ID'";
		$result4 = mysqli_query($this->getDbc(),$query4);

		if($result4){
			echo("result 4");
		}

		//delete the building address
		$query5 = "DELETE  from Building_Address where ID = '$Building_Address_ID'";
		$result5 = mysqli_query($this->getDbc(),$query5);

		if($result5){
			echo("result 5");
		}

		//delete the address
		$query6 = "DELETE  from Address where ID = '$Address_ID'";
		$result6 = mysqli_query($this->getDbc(),$query6);

		if($result6){
			echo("result 6");
		}

		$query7 = "DELETE  from Building where ID = '$Building_ID'";
		$result7 = mysqli_query($this->getDbc(),$query7);

		if($result7){
			echo("result 7");
		}


		if($result_first AND $result1 AND $result2 AND $result3 AND $result4 AND $result5 AND $result6 AND $result7){
			$query_last = "COMMIT";
			$result_last = mysqli_query($this->getDbc(),$query_last);
			return TRUE;
		}
		else{
			$query_last = "ROLLBACK";
			$result_last = mysqli_query($this->getDbc(),$query_last);
			return FALSE;
		}


	}

	//check company type for edit
	function Ownership_Exists_For_Edit(Ownership $Ownership,$Ownership_ID){

		$Ownership_Name = $Ownership->getName();
 		$query = "select * from Ownership where name='$Ownership_Name' and ID != '$Ownership_ID'";
 		$result = mysqli_query($this->getDbc(),$query);
 		if(mysqli_num_rows($result) >= 1){
			return TRUE;
		}
		else if(mysqli_num_rows($result) >= 1){
			return FALSE;
		}

	}

	//get single ownership
	function Get_Single_Ownership($Ownership_ID){

		$query = "select * from Ownership where id='$Ownership_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return null;
		}

	}


	//delete ownership
 	function Delete_Ownership($Ownership_ID){
		$query = "DELETE FROM Ownership where ID='$Ownership_ID'";
		$result = mysqli_query($this->getDbc(),$query);
		//if the region is deleted return true
		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	//edit ownership
	function Edit_Ownership(Ownership $Ownership,$Ownership_ID){

		$Name = $Ownership->getName();
		$Name_Amharic = $Ownership->getNameAmharic();
		$query = "UPDATE Ownership set Name='$Name',Name_Amharic='$Name_Amharic' where ID='$Ownership_ID'";
		$result = mysqli_query($this->getDbc(),$query);
		//if the company is deleted return true
		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}


	//check for category edit
	function Category_Exists_For_Edit(Category $Category,$Category_ID){

		$Category_Name = $Category->getCategoryName();

		$query = "select * from Category where name='$Category_Name' and ID != '$Category_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if(mysqli_num_rows($result) >= 1){
			return TRUE;
		}
		else if(mysqli_num_rows($result) >= 1){
			return FALSE;
		}

	}

	//get single category
	function Get_Single_Category($Category_ID){

		$query = "select * from Category where id='$Category_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return null;
		}

	}

	//delete category
	function Delete_Category($Category_Id){

		$query = "DELETE FROM Category where ID='$Category_Id'";
		$result = mysqli_query($this->getDbc(),$query);
		//if the region is deleted return true
		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	//edit category
 	function Edit_Category(Category $Category,$Category_ID){

		$Name = $Category->getCategoryName();
		$Name_Amharic = $Category->getCategoryNameAmharic();
	    $General_Category = $Category->getGeneralCategory();
 		$query = "UPDATE Category set Name='$Name',Name_Amharic='$Name_Amharic',General_Category='$General_Category' where ID='$Category_ID'";
		$result = mysqli_query($this->getDbc(),$query);
		//if the company is deleted return true
		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}

 	}

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

	//About Phone Number
	function Phone_Number_Exists_For_Edit(Famous_Phone $Phone,$Phone_ID){

		$Phone = $Phone->getPhone();
 		$query = "select * from famous_phones where phone='$Phone' and ID != '$Phone_ID';";
 		$result = mysqli_query($this->getDbc(),$query);
 		if(mysqli_num_rows($result) >= 1){
			return TRUE;
		}
		else if(mysqli_num_rows($result) >= 1){
			return FALSE;
		}

	}

	//get single phone
	function Get_Single_Phone($Phone_ID){
		$query = "select * from famous_phones where id='$Phone_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return null;
		}
	}

	//delete region
	function Delete_Phone($Phone_ID){
		$query = "DELETE FROM famous_phones where ID='$Phone_ID'";
		$result = mysqli_query($this->getDbc(),$query);
		//if the region is deleted return true
		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	//edit phone
	function Edit_Phone(Famous_Phone $Phone,$Phone_ID){

		$Phone_Number = $Phone->getPhone();
		$Phone_Description = $Phone->getDescription();
		$Phone_Description_Amharic = $Phone->getDescriptionAmharic();

		$query = "update famous_phones
					set phone='$Phone_Number',Description='$Phone_Description',
					Description_Amharic='$Phone_Description_Amharic'
					where ID='$Phone_ID'";

		$result = mysqli_query($this->getDbc(),$query);

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

	//update event


	//checks if the event exists before
	function Event_Exists_For_Edit(Event $event,$Event_ID){

		$Event_Name = $event->getName();
		$query = "select * from event where name='$Event_Name' and ID != '$Event_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if(mysqli_num_rows($result) >= 1){
			return TRUE;
		}
		else if(mysqli_num_rows($result) >= 1){
			return FALSE;
		}


	}

	//gets single event
	function Get_Single_Event($Event_ID){

		$query = "select * from event where id='$Event_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return null;
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

	//edit event
	function Edit_Event(Event $Event,$Event_ID){

		$Event_Name = $Event->getName();
		$Event_Name_Amharic = $Event->getNameAmharic();
		$About_Event = $Event->getAboutEvent();
		$About_Event_Amharic = $Event->getAboutEventAmharic();
		$Event_Start_Date = $Event->getEventStart();
		$Event_End_Date = $Event->getEventEnd();

 		$query = "UPDATE event
					set Name='$Event_Name',Name_Amharic='$Event_Name_Amharic',
								About_Event='$About_Event',About_Event_Amharic='$About_Event_Amharic'
								,Event_Start='$Event_Start_Date',Event_End='$Event_End_Date'
					where ID='$Event_ID'";

		$result = mysqli_query($this->getDbc(),$query);
		if($result){
			return TRUE;
		}
 		else{
			return FALSE;
		}

	}

	//will get events that are expired
	function Get_Expired_Event(){
 		$query = "select * from event where Event_End < CURDATE()";
 		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return null;
 		}
 	}

	//will get events of today
	function Get_TODAY_Events(){

		$query = "select * from event where  (Event_Start <= CURDATE() AND Event_End >= CURDATE())";
		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return null;
		}
	}

	//get upcoming events
 	function Get_Upcoming_Events(){
		$query = "select E.ID,E.Name,E.Name_Amharic,E.About_Event,E.About_Event_Amharic,
				E.Event_Start,E.Event_End,(E.Event_Start - curdate()) as Days_Left from event as E
				where ( (E.Event_Start - curdate() < 15)  AND (E.Event_Start - curdate() >0))";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return null;
		}
	}



    //
    function Get_Money_Exchange($id){
        $query = "select * from money_exchange where id='$id'";

        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            return $result;
        }
        else{
            return null;
        }

    }

    function Update_Money_Exchange($id, $buying_price, $selling_price,$date){
        $query = "update money_exchange
                   set buying = '$buying_price', selling = '$selling_price' , pubDate = '$date'
                   where id = '$id'";

        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            return 1;
        }
        else{
            return 0;
        }
    }

    function Get_Money_Exchange_Date(){
        $date = "";
        $query = "select * from money_exchange where id='1'";

        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            while($results = mysqli_fetch_array($result,MYSQL_ASSOC)){
                $date = $results['pubDate'];
            }
            return $date;
        }
        else{
            $date = "Unknown";
            return $date;
        }

    }



}





























