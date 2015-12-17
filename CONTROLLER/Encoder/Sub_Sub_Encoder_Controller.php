<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 12/13/2015
 * Time: 4:59 AM
 */

class Sub_Sub_Encoder_Controller extends User_Controller{


	//get specialization with the corresponding general category
	function GetSpecialization($general_category){
 		$query = "select * from specialization where General_Category = '$general_category'";
 		$result = mysqli_query($this->getDbc(),$query);
 		if($result){
			return $result;
		}

		else{
			return null;
		}
 	}


	//get category based on their general category
	function GetGeneralCategory($general_category){
		$query = "select * from category where General_Category = '$general_category'";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return null;
		}
	}

	function Increment_Address($belong){

		$type = "ADDRESS";
		if($belong == Belong::BUILDING){
			$type = "BUILDING";
		}
		else if($belong == Belong::COMPANY_WITH_OUT_BUILDING){
			$type = "COMPANY_WITH_OUT_BUILDING";
		}
		else if($belong == Belong::COMPANY_WITH_BUILDING){
			$type = "COMPANY_WITH_BUILDING";
		}

		$query = "INSERT INTO Address (Belong_To) VALUES('$type')";
		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}


	//add companies with socialization and with building
	function Add_Company_With_Building_With_Specialization(
		$Company_Name,$Company_Name_Amharic,
		$Category_ID,
		$Company_Type_ID,
		$Branch,$Branch_Amharic,$Working_Hours,$Working_Hours_Amharic,
		$Product_Service,$Product_Service_Amharic,
		$Registration_Expiration_Date,$Registration_Type,
		$Building_ID,$Building_Floor,
		Contact $Contact,
		$specialization

	){

		$query = "START TRANSACTION";

		mysqli_query($this->getDbc(),$query);

		//First add the company
		$query = "INSERT INTO Company (Name,Name_Amharic,Registration_Date) VALUES ('$Company_Name','$Company_Name_Amharic', Now())";
		$result1 = mysqli_query($this->getDbc(),$query);

		//get the company id
		$added_company_id = $this->getDb()->get_last_id();

		//add company category relation
		$query = "INSERT INTO Company_Category (Company_ID,Category_ID) VALUES('$added_company_id','$Category_ID')";
		$result2 = mysqli_query($this->getDbc(),$query);

		//add company ownership
		$query = "INSERT INTO Company_Ownership(Company_ID,Ownership_ID)VALUES('$added_company_id','$Company_Type_ID')";
		$result3 = mysqli_query($this->getDbc(),$query);

		//add about company
		$query = "INSERT INTO About_Company(Company_ID,Branch,Branch_Amharic,Working_Hours,Working_Hours_Amharic) VALUES('$added_company_id','$Branch','$Branch_Amharic','$Working_Hours',
'$Working_Hours_Amharic')";
		$result4 = mysqli_query($this->getDbc(),$query);

		//add company service
		$query = "INSERT INTO company_product_service(Company_ID,Product_Service,Product_Service_Amharic) VALUES('$added_company_id','$Product_Service','$Product_Service_Amharic')";
		$result5 = mysqli_query($this->getDbc(),$query);

		//add payment status
		$query = "INSERT INTO Payment_Status(Company_ID,Expiration_Date,Registration_Type) VALUES ('$added_company_id','$Registration_Expiration_Date','$Registration_Type')";
		$result6 = mysqli_query($this->getDbc(),$query);

		//increment address
		$this->Increment_Address(Belong::COMPANY_WITH_BUILDING);

		//get the address id
		$added_address_id = $this->getDb()->get_last_id();

		//add company address relationship
		$query = "INSERT INTO Company_Address (Company_ID,Address_ID) VALUES('$added_company_id','$added_address_id')";
		$result7 = mysqli_query($this->getDbc(),$query);

		//add address building floor
		$query = "INSERT INTO Address_Building_Floor(Address_ID,Building_ID,Floor) VALUES('$added_address_id','$Building_ID','$Building_Floor')";
		$result8 = mysqli_query($this->getDbc(),$query);


		//add contact
		$Email = $Contact->getEmail();
		$House_No = $Contact->getHouseNo();
		$FAX = $Contact->getFAX();
		$POBOX = $Contact->getPOBOX();
		$Telephone = $Contact->getTelephone();
		$query = "INSERT INTO Contact (Email,House_No,FAX,POBOX,Telephone) VALUES('$Email','$House_No','$FAX','$POBOX','$Telephone')";
		$result9 = mysqli_query($this->getDbc(),$query);

		//get the contact id
		$added_contact_id = $this->getDb()->get_last_id();

		//add address contact relation

		$query = "INSERT INTO Address_Contact (Address_ID,Contact_ID) VALUES('$added_address_id','$added_contact_id')";
		$result10 = mysqli_query($this->getDbc(),$query);

		$query = "insert into  company_specialization(Company_ID,Spec_1,Spec_2,Spec_3,Spec_4,Spec_5) values('$added_company_id',$specialization[0],$specialization[1],$specialization[2],$specialization[3],
$specialization[4])";
		$result_spec = mysqli_query($this->getDbc(),$query);

		if($result_spec){
			echo("The specilization is added");
		}
		else{
			echo("The specliation is not added");

			echo($specialization[0]);
			echo("-> ");
			echo($specialization[1]);
			echo("-> ");
			echo($specialization[2]);
			echo("-> ");
			echo($specialization[3]);


		}


		if($result1 and $result2 and $result3 and $result4 and $result5 and $result6 and $result7 and $result8 and $result9 and $result10 and $result_spec){

			$query = "COMMIT";
			mysqli_query($this->getDbc(),$query);
			return TRUE;


		}
		else{
			$query = "ROLLBACK";
			mysqli_query($this->getDbc(),$query);
			echo("Rolled back");
//			return FALSE;
			exit();

		}



	}



	//this will get companies with there generic categories for listing

	function Get_All_Companies_With_Specialization($generic_category){

		$query = "select
    COM_ID as company_id,
    COM_NAME as company_name,
    COM_Name_Amharic as company_name_amharic,
    COM_REG_DATE as registration_date,
    CAT_Name as category,
    CAT_Name_Amharic as category_amharic,
    ADDR_ID as address_id,
    Belong_to as belong_to,
    PAY_STAT.Registration_Type,
    if(PAY_STAT.Expiration_Date < CURDATE(),
        'EXPIRED',
        'NOT_EXPIRED') as Expiration_Date
from
    (select
        COM.ID as COM_ID,
            COM.Name as COM_NAME,
            COM.Name_Amharic as COM_Name_Amharic,
            COM.Registration_date as COM_REG_DATE,
            COM_ADDR.company_id as COM_ADDR_COM_ID,
            COM_ADDR.address_id as COM_ADDR_ADDR_ID,
            ADDR.ID as ADDR_ID,
            ADDR.Belong_to
    from
        company as COM
    inner join company_address as COM_ADDR ON COM.ID = COM_ADDR.company_id
    inner join address as ADDR ON ADDR.ID = COM_ADDR.address_id) as com_addr_spec
        inner join
    (select
        COM_CAT.company_id as COM_CAT_COM_ID,
            COM_CAT.category_id as COM_CAT_CAT_ID,
            CAT.ID as CAT_ID,
            CAT.Name as CAT_Name,
            CAT.Name_Amharic as CAT_Name_Amharic
    from
        company_category as COM_CAT
    inner join category as CAT ON COM_CAT.category_id = CAT.id

	where CAT.General_Category = '$generic_category') as cat_spec ON COM_ID = COM_CAT_COM_ID
        inner join
    payment_status as PAY_STAT ON COM_ID = PAY_STAT.ID
ORDER by company_name";

		$result  = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return FALSE;
		}
	}


	//get the specialization of a single company

	function Get_Company_Specialization($Company_ID){
 		$query = "select * from company_specialization where Company_ID = '$Company_ID'";
 		$result = mysqli_query($this->getDbc(),$query);
 		if($result){

			return mysqli_fetch_array($result,MYSQLI_ASSOC);
		}
 		else{
			return null;
		}
	}


	//gets the company specialization id
	function Get_Company_Specialization_ID($Company_ID){

		$query = "select ID from company_specialization where Company_ID = '$Company_ID'";
		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			$result = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$ID = $result['ID'];
			return $ID;
		}
		else{
			return null;
		}

	}

	//edit the company specialization

	function Edit_Company_Specialization($ID,$Specialization){


		$query = "update company_specialization set Spec_1=$Specialization[0],Spec_2= $Specialization[1],Spec_3=$Specialization[2],Spec_4=$Specialization[3],Spec_5=$Specialization[4] where ID = '$ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}


	//delete the company with out  building with specialization
	function Delete_Company_With_Out_Building_With_Specialization($Company_ID,
	                                          $About_Company_ID,
	                                          $Payment_Status_ID,
	                                          $Company_Service_ID,
	                                          $Company_Ownership_ID,
	                                          $Company_Category_ID,
	                                          $Contact_ID,
	                                          $Direction_ID,
	                                          $Place_ID){

		$query = "START TRANSACTION";

		mysqli_query($this->getDbc(),$query);

		//delete the about company
		$query1 =   "DELETE FROM about_company where ID='$About_Company_ID'";
		$result1 = mysqli_query($this->getDbc(),$query1);

		//delete the payment status
		$query2 = "DELETE FROM payment_status where ID='$Payment_Status_ID'";
		$result2 = mysqli_query($this->getDbc(),$query2);

		//delete the company product service
		$query3 = "DELETE FROM company_product_service where ID='$Company_Service_ID'";
		$result3 = mysqli_query($this->getDbc(),$query3);

		//delete the company category
		$query4 = "DELETE FROM company_category where ID='$Company_Category_ID'";
		$result4 = mysqli_query($this->getDbc(),$query4);

		//delete the company ownership
		$query5 = "DELETE FROM company_ownership where ID='$Company_Ownership_ID'";
		$result5 = mysqli_query($this->getDbc(),$query5);

		//6 get the  address id
		$Address_ID = $this->Get_Company_Address($Company_ID);

		//7  get the address contact id
		$Address_Contact_ID = $this->Get_Address_Contact_ID($Address_ID);

		//8 delete the address contact
		$query6 = "DELETE from Address_Contact WHERE ID='$Address_Contact_ID'";
		$result6 = mysqli_query($this->getDbc(),$query6);

		//9 delete the contact
		$query7 = "DELETE from contact WHERE ID='$Contact_ID'";
		$result7 = mysqli_query($this->getDbc(),$query7);

		//10 get the address_direction_id
		$Address_Direction_ID = $this->Get_Address_Direction_ID($Address_ID);

		//delete the address Direction
		$query8 = "DELETE from Address_Direction WHERE ID='$Address_Direction_ID'";
		$result8 = mysqli_query($this->getDbc(),$query8);


		//delete the direction
		$query9 = "DELETE from Direction WHERE ID='$Direction_ID'";
		$result9 = mysqli_query($this->getDbc(),$query9);

		//get the address_place_iD
		$Address_Place_ID = $this->Get_Address_Place_ID($Address_ID);

		//delete the address place
		$query10 = "DELETE from Address_Place WHERE ID='$Address_Place_ID'";
		$result10 = mysqli_query($this->getDbc(),$query10);

		//delete the place

		$query11 = "DELETE from Place WHERE ID='$Place_ID'";
		$result11 = mysqli_query($this->getDbc(),$query11);


		//get the company address id
		$Company_Address_ID = $this->Get_Company_Address_ID($Company_ID);

		//delete the company address rel
		$query13  = "DELETE from Company_Address WHERE ID='$Company_Address_ID'";
		$result13 = mysqli_query($this->getDbc(),$query13);

		//delete the address
		$query12 = "DELETE from Address WHERE ID='$Address_ID'";
		$result12 = mysqli_query($this->getDbc(),$query12);


		//delete the specialization before deleting the company this is because the company specialization
		//has a reference to the company id

		//check if the company has specialization
		if($this->Company_Has_Specialization($Company_ID)){
			$spec_ID =  $this->Get_Company_Specialization_ID($Company_ID);
			$query_spec = "DELETE from company_specialization where ID = '$spec_ID'";

			$result_speci = mysqli_query($this->getDbc(),$query_spec);

		}
		else{
			$result_speci = TRUE;
		}



		//delete the company
		$query14 = "DELETE from Company WHERE ID='$Company_ID'";
		$result14 = mysqli_query($this->getDbc(),$query14);


		if($result1 AND $result2 AND $result3 AND $result4 AND $result5 AND $result6
			AND $result7 AND $result8 AND $result9 AND $result10 AND $result11 AND $result12 AND
			$result13 AND $result14 AND $result_speci){
			$query = "COMMIT";
			mysqli_query($this->getDbc(),$query);

			return TRUE;
		}
		else{
			$query = "ROLLBACK";
			mysqli_query($this->getDbc(),$query);
			return FALSE;

		}


	}



	function Delete_Company_With_Building_With_Specialization($Company_ID,
	                                      $About_Company_ID,
	                                      $Payment_Status_ID,
	                                      $Company_Service_ID,
	                                      $Company_Ownership_ID,
	                                      $Company_Category_ID,
	                                      $Contact_ID,
	                                      $Address_Building_Floor_ID){
		$query = "START TRANSACTION";

		mysqli_query($this->getDbc(),$query);

		//delete the about company
		$query1 =   "DELETE FROM about_company where ID='$About_Company_ID'";
		$result1 = mysqli_query($this->getDbc(),$query1);

		//delete the payment status
		$query2 = "DELETE FROM payment_status where ID='$Payment_Status_ID'";
		$result2 = mysqli_query($this->getDbc(),$query2);

		//delete the company product service
		$query3 = "DELETE FROM company_product_service where ID='$Company_Service_ID'";
		$result3 = mysqli_query($this->getDbc(),$query3);

		//delete the company category
		$query4 = "DELETE FROM company_category where ID='$Company_Category_ID'";
		$result4 = mysqli_query($this->getDbc(),$query4);

		//delete the company ownership
		$query5 = "DELETE FROM company_ownership where ID='$Company_Ownership_ID'";
		$result5 = mysqli_query($this->getDbc(),$query5);

		//6 get the  address id
		$Address_ID = $this->Get_Company_Address($Company_ID);

		//7  get the address contact id
		$Address_Contact_ID = $this->Get_Address_Contact_ID($Address_ID);

		//8 delete the address contact
		$query6 = "DELETE from Address_Contact WHERE ID='$Address_Contact_ID'";
		$result6 = mysqli_query($this->getDbc(),$query6);

		//9 delete the contact
		$query7 = "DELETE from contact WHERE ID='$Contact_ID'";
		$result7 =mysqli_query($this->getDbc(),$query7);

		//delete the address_building_floor
		$query8 = "DELETE from address_building_floor WHERE ID = '$Address_Building_Floor_ID'";
		$result8 =mysqli_query($this->getDbc(),$query8);

		//get the company address id
		$Company_Address_ID = $this->Get_Company_Address_ID($Company_ID);

		//delete the company address rel
		$query9  = "DELETE from Company_Address WHERE ID='$Company_Address_ID'";
		$result9 =mysqli_query($this->getDbc(),$query9);

		//delete the address
		$query10 = "DELETE from Address WHERE ID='$Address_ID'";
		$result10 =mysqli_query($this->getDbc(),$query10);

		//delete the specialization before deleting the company this is because the company specialization
		//has a reference to the company id

		$spec_ID =  $this->Get_Company_Specialization_ID($Company_ID);
		$query_spec = "DELETE from company_specialization where ID = '$spec_ID'";

		$result_speci = mysqli_query($this->getDbc(),$query_spec);
		//delete the company
		$query11 = "DELETE from Company WHERE ID='$Company_ID'";
		$result11 =mysqli_query($this->getDbc(),$query11);

		if($result1 AND $result2 AND $result3 AND $result4 AND $result5 AND $result6
			AND $result7 AND $result8 AND $result9 AND $result10 AND $result11 AND $result_speci ){
			$query = "COMMIT";
			mysqli_query($this->getDbc(),$query);

			echo('commited');
			return TRUE;
		}
		else{
			$query = "ROLLBACK";
			mysqli_query($this->getDbc(),$query);
			echo("Rolled back");
			return FALSE;

		}
	}



	//check if the company has specialization
	function Company_Has_Specialization($Company_ID){

		$query = "select * from company_specialization where Company_ID = '$Company_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			if(mysqli_num_rows($result)  > 0){
				return TRUE;
			}

		}
		return FALSE;

	}







} 