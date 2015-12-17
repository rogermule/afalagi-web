<?php

class Operator_Controller extends User_Controller {

	function Get_Category(){
		$query = 'SELECT * FROM category';

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return FALSE;
		}
	}

	function Get_Ownerships(){

		$query ="SELECT * FROM OwnerShip";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return FALSE;
		}
	}

	function Get_Regions(){

		$query = "SELECT * FROM region";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return null;
		}

	}

	function Get_City(){
		$query = "SELECT * FROM city";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return False;
		}
	}

	function Get_Sub_City(){

		$query = "SELECT * FROM Sub_City";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return False;
		}
	}

	function Get_Wereda(){
		$query = "SELECT * FROM wereda";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return null;
		}
	}

	function Get_Sefer(){
		$query = "SELECT * FROM sefer";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return False;
		}
	}

	function Get_Streets(){

		$query = "SELECT * FROM Street";

		$result  =  mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return FALSE;
		}
	}


	//this will get more information about the company with out building
	//and it returns names not id
	function Get_More_Info_With_Out_Building($company_id){

		$query = "select *
from
		(select  C.ID as C_ID,C.Name as company_name,C.Name_Amharic as company_name_amharic,C.Registration_Date
		 from company as C
		 where ID = '$company_id')as com_spec

		inner join


		(select   ABT_COM.Company_ID as ABT_COM_C_ID,ABT_COM.Branch,ABT_COM.Branch_Amharic,ABT_COM.Working_Hours,ABT_COM.Working_Hours_Amharic
		 from about_company as ABT_COM
		 where Company_ID='$company_id') as abt_spec
 		inner join
		(select COM_PRO_SER.company_id as COM_PRO_SER_C_ID, COM_PRO_SER.Product_Service,COM_PRO_SER.Product_Service_Amharic
		from company_product_service as COM_PRO_SER
		where COM_PRO_SER.Company_ID = '$company_id'

		)as pro_ser_spec
 		inner join

		(select PS.Company_ID as PS_C_ID,PS.Expiration_Date
		from payment_status as PS
		where PS.Company_ID = '$company_id') as pay_spec
 		inner join

		(select CAT.Name as category_name,CAT.Name_Amharic as category_name_amharic
		from category as CAT
		where CAT.ID = (select C_CAT.Category_ID
						from company_category as C_CAT
						where C_CAT.Company_ID = '$company_id')) as cat_spec

		inner join

			(select OWN.Name as company_type,OWN.Name_Amharic as company_type_amharic
			from ownership as OWN
			where OWN.ID = (select COM_OWN.Ownership_ID
								from company_ownership as COM_OWN
								where COM_OWN.Company_ID = '$company_id'
								)) as com_type_spec

		inner join

				(select CON.ID as CON_ID,CON.Email,CON.House_No,CON.FAX,CON.POBOX,CON.Telephone
	  from contact as CON
	  where CON.ID = ( select ADDR_CON.Contact_ID
						from address_contact as ADDR_CON
					    where ADDR_CON.Address_ID = ( select COM_ADDR.Address_ID
													  from company_address as COM_ADDR
													  where COM_ADDR.Company_ID = '$company_id'

									))) as con_spec

		inner join

			(select DIR.Direction,DIR.Direction_Amharic
			from direction as DIR
			where DIR.ID = (select ADDR_DIR.Direction_ID
						    from address_direction as ADDR_DIR
							where ADDR_DIR.Address_ID = ( select COM_ADDR.Address_ID
													  from company_address as COM_ADDR
													  where COM_ADDR.Company_ID = '$company_id'

									))) as dir_spec

		inner join

			(select P.ID as P_ID,
				R.Name as Region,R.Name_Amharic as Region_Amharic,
				C.Name as City,C.Name_Amharic as City_Amharic,
				SC.Name as Sub_City,SC.Name_Amharic as Sub_City_Amharic,
				W.Name as Wereda,W.Name_Amharic as Wereda_Amharic,
				SEF.Name as Sefer,SEF.Name_Amharic as Sefer_Amharic,
				STR.Name as Street,STR.Name_Amharic as Street_Amharic,
				STR.ID as Street_ID
			from Place as P inner join Region as R
				on P.Region =  R.ID
				inner join City as C
				on P.City = C.ID
				inner join Sub_City as SC
				on P.Sub_City = SC.ID
				inner join sefer as SEF
				on P.Sefer = SEF.ID
				inner join wereda as W
				on P.Wereda = W.ID
				inner join street as STR
				on P.Street = STR.ID
		where P.ID  = (select ADDR_P.Place_ID
						from address_place as ADDR_P
						where ADDR_P.Address_ID = ( select COM_ADDR.Address_ID
													  from company_address as COM_ADDR
													  where COM_ADDR.Company_ID = '$company_id'
													))) as place_spec";

		$result  = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return FALSE;
		}
	}


	//this function will get more information for companies on buildings
	function Get_More_Info_With_Building($company_id){


		$query = "select *
from
		(select  C.ID as Company_ID,C.Name as Company_Name,C.Name_Amharic as Company_Name_Amharic,C.Registration_Date
		 from company as C
		 where ID = '$company_id')as com_spec
 		inner join
 		(select   ABT_COM.Branch as Branch,ABT_COM.Branch_Amharic as Branch_Amharic,ABT_COM.Working_Hours ,ABT_COM.Working_Hours_Amharic
		 from about_company as ABT_COM
		 where Company_ID='$company_id') as abt_spec
 		inner join
		(select  COM_PRO_SER.Product_Service,COM_PRO_SER.Product_Service_Amharic
		from company_product_service as COM_PRO_SER
		where COM_PRO_SER.Company_ID = '$company_id'
 		)as pro_ser_spec
 		inner join
 		(select PS.Expiration_Date
		from payment_status as PS
		where PS.Company_ID = '$company_id') as pay_spec
 		inner join
		(select Name as category_name ,Name_Amharic as category_name_amharic
		from category
			where ID = (select Category_ID
						from company_category
						where Company_ID = '$company_id')) as cat_spec

		inner join
		(select Name as company_type,Name_Amharic  as company_type_amharic
		from ownership
			where ID = (select Ownership_ID
						from company_ownership
						where Company_ID='$company_id')) as com_type_spec
 		inner join
 				(select CON.Email,CON.House_No,CON.FAX,CON.POBOX,CON.Telephone
	  from contact as CON
	  where CON.ID = ( select ADDR_CON.Contact_ID
						from address_contact as ADDR_CON
					    where ADDR_CON.Address_ID = ( select COM_ADDR.Address_ID
													  from company_address as COM_ADDR
													  where COM_ADDR.Company_ID = '$company_id'

									))) as con_spec


		inner join

				((select ADDR_BUL_FLOOR.Floor,ADDR_BUL_FLOOR.Building_ID as Building_ID
				from address_building_floor as ADDR_BUL_FLOOR
				where ADDR_BUL_FLOOR.Address_ID = (select COM_ADDR.Address_ID
													  from company_address as COM_ADDR
													  where COM_ADDR.Company_ID = '$company_id')) as bul_floor_spec
				inner join
						(select ID as Real_Bul_ID, Name as Building_Name,Name_Amharic as Building_Name_Amharic
						from building ) as building on Building_ID = Real_Bul_ID)";


		$result  = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return FALSE;
		}


	}




	//this is the search query queries in 0.015 sec which is not that much bad
	function Search($category = null,$ownership = null,$region = null,$city = null,$subcity = null,$wereda = null,$sefer = null,$street = null){




		$query = "select Company_ID,Name,Name_Amharic,Registration_Type,Expiration_Stat,Registration_Type_Word,Product_Service,Product_Service_Amharic, '1' as On_Building
from

	((select C.ID as Company_ID,C.Name,C.Name_Amharic,C.Registration_Date,
			C_P_S.Company_ID as CPS_C_ID,C_P_S.Product_Service,C_P_S.Product_Service_Amharic,
		P_S.Company_ID as P_S_C_ID,if(P_S.Expiration_Date<CURDATE(),'EXPIRED','NOT_EXPIRED') as Expiration_Stat,
		(case 	 when P_S.Registration_Type = 'GOLD' THEN 1
											 when P_S.Registration_Type = 'SILVER' THEN 2
											 when P_S.Registration_Type =  'BRONZE' THEN 3
											 ELSE 4
											 end) as Registration_Type,
											 P_S.Registration_Type as Registration_Type_Word,
											 C_A.Address_ID as C_A_Address_ID
 	from
	company as C
	inner join company_product_service as C_P_S
	on C.ID = C_P_S.Company_ID
	inner join payment_status as P_S
	on C.ID = P_S.Company_ID
	inner join company_address as C_A
	on C.ID = C_A.Company_ID) as first_group) inner join

	(select C_CAT.Company_ID as C_CAT_Company_ID,C_CAT.Category_ID
	from company_category as C_CAT";

		if($category != null){
			$query.= " where Category_ID = ".$category." ) as Category_Spec
 	on Company_ID = C_CAT_Company_ID
 	inner join
	(select C_OWN.Company_ID As C_OWN_Company_ID,C_OWN.Ownership_ID
	from company_ownership as C_OWN ";

		}
		else {
			$query.=" ) as Category_Spec

	on Company_ID = C_CAT_Company_ID
 	inner join
	(select C_OWN.Company_ID As C_OWN_Company_ID,C_OWN.Ownership_ID
	from company_ownership as C_OWN ";

		}

		if($ownership != null){
			$query.= " where Ownership_ID =".$ownership.") as Ownership_Spec ";
		}
		else{
			$query.= ") as Ownership_Spec ";
		}

		$query.=" on Company_ID = C_OWN_Company_ID


		inner join


			(select ADDR_BUL_F.Address_ID as ADDR_BUL_F_A_ID, ADDR_BUL_F.Building_ID as ADDR_BUL_F_BUL_ID,
			BUL.ID as Building_ID, BUL.Name as BUL_Name,BUL_ADDR.ID as BUL_ADDR_ID,BUL_ADDR.Building_ID as BUL_ADDR_BUL_ID,
			BUL_ADDR.Address_ID as BUL_ADDR_ADDR_ID,ADDR_P.Place_ID as ADDR_P_P_ID,ADDR_P.Address_ID as ADDR_P_A_ID
			from Address_Building_Floor as ADDR_BUL_F
			inner join
			Building as BUL
			on ADDR_BUL_F.Building_ID = BUL.ID
			inner join
			Building_Address as BUL_ADDR
			on BUL_ADDR.Building_ID = BUL.ID
			inner join Address_place as ADDR_P
			on BUL_ADDR.Address_ID = ADDR_P.Address_ID

			 ) as bul_spec
		on C_A_Address_ID = ADDR_BUL_F_A_ID

			inner join
			(select P.ID as Place_ID
			from place as P ";


		//this will hold a flag to prepend and or not to prepend it
		$previous = false;
		$first_taken = false;

		if($region != null){
			$query.= " where region = ".$region;
			$previous = true;
			$first_taken = true;
		}

		if($city != null){
			if(!$first_taken){
				$query.=" where ";
				$first_taken = true;
			}
			if($previous){
				$query.= " and city = ".$city;

			}
			else{
				$query.=" city= ".$city;
				$previous = true;
			}
		}

		if($subcity != null){
			if(!$first_taken){
				$query.=" where ";
				$first_taken = true;
			}
			if($previous){
				$query.= " and sub_city = ".$subcity;

			}
			else{
				$query.= " sub_city= ".$subcity;
				$previous = true;
			}
		}

		if($wereda != null){
			if(!$first_taken){
				$query.=" where ";
				$first_taken = true;
			}
			if($previous){
				$query.=" and wereda = ".$wereda;

			}
			else{
				$query.=" wereda = ".$wereda;
				$previous = true;
			}
		}

		if($sefer != null){
			if(!$first_taken){
				$query.=" where ";
				$first_taken = true;
			}
			if($previous){
				$query.=" and sefer = ".$sefer;
			}
			else{
				$query.=" sefer = ".$sefer;
				$previous = true;
			}
		}

		if($street != null){
			if(!$first_taken){
				$query.=" where ";

			}
			if($previous){
				$query.=" and street = ".$street;
			}
			else{
				$query.=" street = ".$street;

			}
		}


		$query.=" ) as place_spec
			on ADDR_P_P_ID = Place_ID

 UNION ";

		$query .= " select Company_ID,Name,Name_Amharic,Registration_Type,Expiration_Stat,Registration_Type_Word,Product_Service,Product_Service_Amharic, '0' as On_Building
from

	((select C.ID as Company_ID,C.Name,C.Name_Amharic,C.Registration_Date,
			C_P_S.Company_ID as CPS_C_ID,C_P_S.Product_Service,C_P_S.Product_Service_Amharic,
			P_S.Company_ID as P_S_C_ID,if(P_S.Expiration_Date<CURDATE(),'EXPIRED','NOT_EXPIRED') as Expiration_Stat,

									(case 	 when P_S.Registration_Type = 'GOLD' THEN 1
											 when P_S.Registration_Type = 'SILVER' THEN 2
											 when P_S.Registration_Type =  'BRONZE' THEN 3
											 ELSE 4
											 end) as Registration_Type,
											 P_S.Registration_Type as Registration_Type_Word
 	from
	company as C
	inner join company_product_service as C_P_S
	on C.ID = C_P_S.Company_ID
	inner join payment_status as P_S
	on C.ID = P_S.Company_ID) as first_group) inner join

	(select C_CAT.Company_ID as C_CAT_Company_ID,C_CAT.Category_ID
	from company_category as C_CAT";

		if($category != null){
			$query.= " where Category_ID = ".$category." ) as Category_Spec
 	on Company_ID = C_CAT_Company_ID
 	inner join
	(select C_OWN.Company_ID As C_OWN_Company_ID,C_OWN.Ownership_ID
	from company_ownership as C_OWN ";

		}
		else {
			$query.=" ) as Category_Spec

	on Company_ID = C_CAT_Company_ID
 	inner join
	(select C_OWN.Company_ID As C_OWN_Company_ID,C_OWN.Ownership_ID
	from company_ownership as C_OWN ";

		}

		if($ownership != null){
			$query.= " where Ownership_ID =".$ownership.") as Ownership_Spec";
		}
		else{
			$query.= ") as Ownership_Spec";
		}

		$query.= " on Company_ID = C_OWN_Company_ID
			        inner join
			        ((select Company_ID as C_A_C_ID,Address_ID as C_A_A_ID from
						company_address ) as com_add_spec
						inner join

						 (select Address_ID,Place_ID as A_P_P_ID from
							address_place)
							as add_spec
							on C_A_A_ID = Address_ID
							inner join
				    (select P.ID as Place_ID
						from place as P ";


		//this will hold a flag to prepend and or not to prepend it
		$previous2 = false;
		$first_taken2 = false;

		if($region != null){
			$query.= " where region = ".$region;
			$previous2 = true;
			$first_taken2 = true;
		}

		if($city != null){
			if(!$first_taken2){
				$query.=" where ";
				$first_taken2 = true;
			}
			if($previous2){
				$query.= " and city = ".$city;

			}
			else{
				$query.=" city= ".$city;
				$previous2 = true;
			}
		}

		if($subcity != null){
			if(!$first_taken2){
				$query.=" where ";
				$first_taken2 = true;
			}
			if($previous2){
				$query.= " and sub_city = ".$subcity;

			}
			else{
				$query.= " sub_city= ".$subcity;
				$previous2 = true;
			}
		}

		if($wereda != null){
			if(!$first_taken2){
				$query.=" where ";
				$first_taken2 = true;
			}
			if($previous2){
				$query.=" and wereda = ".$wereda;
			}
			else{
				$query.=" wereda = ".$wereda;
				$previous2 = true;
			}
		}

		if($sefer != null){
			if(!$first_taken2){
				$query.=" where ";
				$first_taken2 = true;
			}
			if($previous2){
				$query.=" and sefer = ".$sefer;
			}
			else{
				$query.=" sefer = ".$sefer;
				$previous2 = true;
			}
		}

		if($street != null){
			if(!$first_taken2){
				$query.=" where ";

			}
			if($previous2){
				$query.=" and street = ".$street;
			}
			else{
				$query.=" street = ".$street;
			}
		}

		$query.=" ) as place_spec on A_P_P_ID = Place_ID) on Company_ID = C_A_C_ID

order by Expiration_Stat desc , Registration_Type;";



		$result = mysqli_query($this->getDbc(),$query);
		if($result){
			return $result;
		}
		else{
			return FALSE;
		}
	}




	function Search_With_Specialization($category = null,$ownership = null,$specialization = null,$region = null,$city = null,$subcity = null,$wereda = null,$sefer = null,$street = null){

		$query = "select Company_ID,Name,Name_Amharic,Registration_Type,Expiration_Stat,Registration_Type_Word,Product_Service,Product_Service_Amharic, '1' as On_Building
from

	((select C.ID as Company_ID,C.Name,C.Name_Amharic,C.Registration_Date,
			C_P_S.Company_ID as CPS_C_ID,C_P_S.Product_Service,C_P_S.Product_Service_Amharic,
		P_S.Company_ID as P_S_C_ID,if(P_S.Expiration_Date < CURDATE(),'EXPIRED','NOT_EXPIRED') as Expiration_Stat,
		(case 	 when P_S.Registration_Type = 'GOLD' THEN 1
											 when P_S.Registration_Type = 'SILVER' THEN 2
											 when P_S.Registration_Type =  'BRONZE' THEN 3
											 ELSE 4
											 end) as Registration_Type,
											 P_S.Registration_Type as Registration_Type_Word,
											 C_A.Address_ID as C_A_Address_ID
 	from
	company as C
	inner join company_product_service as C_P_S
	on C.ID = C_P_S.Company_ID
	inner join payment_status as P_S
	on C.ID = P_S.Company_ID
	inner join company_address as C_A
	on C.ID = C_A.Company_ID) as first_group) inner join

	(select C_CAT.Company_ID as C_CAT_Company_ID,C_CAT.Category_ID
	from company_category as C_CAT";

		if($category != null){
			$query.= " where Category_ID = ".$category." ) as Category_Spec
 	on Company_ID = C_CAT_Company_ID
 	inner join
	(select COM_SPEC.Company_ID as COM_SPEC_COM_ID
	from company_specialization as COM_SPEC ";

		}
		else {
			$query.=" ) as Category_Spec

	on Company_ID = C_CAT_Company_ID
 	inner join

	(select COM_SPEC.Company_ID as COM_SPEC_COM_ID
	from company_specialization as COM_SPEC ";

		}

		if($specialization != null){
			$query.=" where Spec_1 = ".$specialization." or Spec_2 = ".$specialization." or Spec_3 = ".$specialization." or Spec_4 = ".$specialization." or Spec_5 = ".$specialization." ) as Com_Spec ON Company_ID = COM_SPEC_COM_ID inner join
 	( select C_OWN.Company_ID As C_OWN_Company_ID,C_OWN.Ownership_ID
	from company_ownership as C_OWN ";
		}
		else{
			$query.=" ) as Com_Spec ON Company_ID = COM_SPEC_COM_ID
		inner join
 	( select C_OWN.Company_ID As C_OWN_Company_ID,C_OWN.Ownership_ID
	from company_ownership as C_OWN ";
		}




		if($ownership != null){
			$query.= " where Ownership_ID =".$ownership.") as Ownership_Spec ";
		}
		else{
			$query.= ") as Ownership_Spec ";
		}

		$query.=" on Company_ID = C_OWN_Company_ID


		inner join


			(select ADDR_BUL_F.Address_ID as ADDR_BUL_F_A_ID, ADDR_BUL_F.Building_ID as ADDR_BUL_F_BUL_ID,
			BUL.ID as Building_ID, BUL.Name as BUL_Name,BUL_ADDR.ID as BUL_ADDR_ID,BUL_ADDR.Building_ID as BUL_ADDR_BUL_ID,
			BUL_ADDR.Address_ID as BUL_ADDR_ADDR_ID,ADDR_P.Place_ID as ADDR_P_P_ID,ADDR_P.Address_ID as ADDR_P_A_ID
			from Address_Building_Floor as ADDR_BUL_F
			inner join
			Building as BUL
			on ADDR_BUL_F.Building_ID = BUL.ID
			inner join
			Building_Address as BUL_ADDR
			on BUL_ADDR.Building_ID = BUL.ID
			inner join Address_place as ADDR_P
			on BUL_ADDR.Address_ID = ADDR_P.Address_ID

			 ) as bul_spec
		on C_A_Address_ID = ADDR_BUL_F_A_ID

			inner join
			(select P.ID as Place_ID
			from place as P ";


		//this will hold a flag to prepend and or not to prepend it
		$previous = false;
		$first_taken = false;

		if($region != null){
			$query.= " where region = ".$region;
			$previous = true;
			$first_taken = true;
		}

		if($city != null){
			if(!$first_taken){
				$query.=" where ";
				$first_taken = true;
			}
			if($previous){
				$query.= " and city = ".$city;

			}
			else{
				$query.=" city= ".$city;
				$previous = true;
			}
		}

		if($subcity != null){
			if(!$first_taken){
				$query.=" where ";
				$first_taken = true;
			}
			if($previous){
				$query.= " and sub_city = ".$subcity;

			}
			else{
				$query.= " sub_city= ".$subcity;
				$previous = true;
			}
		}

		if($wereda != null){
			if(!$first_taken){
				$query.=" where ";
				$first_taken = true;
			}
			if($previous){
				$query.=" and wereda = ".$wereda;

			}
			else{
				$query.=" wereda = ".$wereda;
				$previous = true;
			}
		}

		if($sefer != null){
			if(!$first_taken){
				$query.=" where ";
				$first_taken = true;
			}
			if($previous){
				$query.=" and sefer = ".$sefer;
			}
			else{
				$query.=" sefer = ".$sefer;
				$previous = true;
			}
		}

		if($street != null){
			if(!$first_taken){
				$query.=" where ";

			}
			if($previous){
				$query.=" and street = ".$street;
			}
			else{
				$query.=" street = ".$street;

			}
		}


		$query.=" ) as place_spec
			on ADDR_P_P_ID = Place_ID

 UNION ";

		$query .= " select Company_ID,Name,Name_Amharic,Registration_Type,Expiration_Stat,Registration_Type_Word,Product_Service,Product_Service_Amharic, '0' as On_Building
from

	((select C.ID as Company_ID,C.Name,C.Name_Amharic,C.Registration_Date,
			C_P_S.Company_ID as CPS_C_ID,C_P_S.Product_Service,C_P_S.Product_Service_Amharic,
			P_S.Company_ID as P_S_C_ID,if(P_S.Expiration_Date < CURDATE(),'EXPIRED','NOT_EXPIRED') as Expiration_Stat,

									(case 	 when P_S.Registration_Type = 'GOLD' THEN 1
											 when P_S.Registration_Type = 'SILVER' THEN 2
											 when P_S.Registration_Type =  'BRONZE' THEN 3
											 ELSE 4
											 end) as Registration_Type,
											 P_S.Registration_Type as Registration_Type_Word
 	from
	company as C
	inner join company_product_service as C_P_S
	on C.ID = C_P_S.Company_ID
	inner join payment_status as P_S
	on C.ID = P_S.Company_ID) as first_group) inner join

	(select C_CAT.Company_ID as C_CAT_Company_ID,C_CAT.Category_ID
	from company_category as C_CAT";

		if($category != null){
			$query.= " where Category_ID = ".$category." ) as Category_Spec
 	on Company_ID = C_CAT_Company_ID
 	inner join
	(select C_OWN.Company_ID As C_OWN_Company_ID,C_OWN.Ownership_ID
	from company_ownership as C_OWN ";

		}
		else {
			$query.=" ) as Category_Spec

	on Company_ID = C_CAT_Company_ID
 	inner join
	(select C_OWN.Company_ID As C_OWN_Company_ID,C_OWN.Ownership_ID
	from company_ownership as C_OWN ";

		}

		if($ownership != null){
			$query.= " where Ownership_ID =".$ownership.") as Ownership_Spec";
		}
		else{
			$query.= ") as Ownership_Spec";
		}

		$query.= " on Company_ID = C_OWN_Company_ID
			        inner join
			        ((select Company_ID as C_A_C_ID,Address_ID as C_A_A_ID from
						company_address ) as com_add_spec
						inner join

						 (select Address_ID,Place_ID as A_P_P_ID from
							address_place)
							as add_spec
							on C_A_A_ID = Address_ID
							inner join
				    (select P.ID as Place_ID
						from place as P ";


		//this will hold a flag to prepend and or not to prepend it
		$previous2 = false;
		$first_taken2 = false;

		if($region != null){
			$query.= " where region = ".$region;
			$previous2 = true;
			$first_taken2 = true;
		}

		if($city != null){
			if(!$first_taken2){
				$query.=" where ";
				$first_taken2 = true;
			}
			if($previous2){
				$query.= " and city = ".$city;

			}
			else{
				$query.=" city= ".$city;
				$previous2 = true;
			}
		}

		if($subcity != null){
			if(!$first_taken2){
				$query.=" where ";
				$first_taken2 = true;
			}
			if($previous2){
				$query.= " and sub_city = ".$subcity;

			}
			else{
				$query.= " sub_city= ".$subcity;
				$previous2 = true;
			}
		}

		if($wereda != null){
			if(!$first_taken2){
				$query.=" where ";
				$first_taken2 = true;
			}
			if($previous2){
				$query.=" and wereda = ".$wereda;
			}
			else{
				$query.=" wereda = ".$wereda;
				$previous2 = true;
			}
		}

		if($sefer != null){
			if(!$first_taken2){
				$query.=" where ";
				$first_taken2 = true;
			}
			if($previous2){
				$query.=" and sefer = ".$sefer;
			}
			else{
				$query.=" sefer = ".$sefer;
				$previous2 = true;
			}
		}

		if($street != null){
			if(!$first_taken2){
				$query.=" where ";

			}
			if($previous2){
				$query.=" and street = ".$street;
			}
			else{
				$query.=" street = ".$street;
			}
		}

		$query.=" ) as place_spec on A_P_P_ID = Place_ID) on Company_ID = C_A_C_ID

order by Expiration_Stat desc , Registration_Type;";



		$result = mysqli_query($this->getDbc(),$query);
		if($result){
			return $result;
		}
		else{
			return FALSE;
		}


	}








	//this will Search Company names
	function Name_Search($Name,$Language){

		if($Language == 'English'){

		$query = "select C_ID as Company_ID,Name ,Name_Amharic ,
			Registration_Type as Registration_Type_Word,if(PS.Expiration_Date<CURDATE(),'EXPIRED','NOT_EXPIRED') as Expiration_Stat,(case 	 when PS.Registration_Type = 'GOLD' THEN 1
							 when PS.Registration_Type = 'SILVER' THEN 2
							 when PS.Registration_Type =  'BRONZE' THEN 3
							 ELSE 4
							 end) as Registration_Type,
			Product_Service_Amharic,if(ADDR.Belong_to = 'COMPANY_WITH_BUILDING','1','0') AS On_Building
			from
					(select ID as C_ID,Name,Name_Amharic
					from  company
					where Name LIKE '%$Name%') as Com_Spec
					inner join
					payment_status as PS
					on C_ID = PS.Company_ID
					inner join
					Company_Product_Service as C_P_S
					on C_ID = C_P_S.Company_ID
					inner join
					company_address as COM_ADDR
					on C_ID = COM_ADDR.Company_ID
					inner join
					Address as ADDR
					on COM_ADDR.Address_ID = ADDR.ID

				order by if(Name LIKE '$Name%','0',if(Name LIKE '%$Name',1,2));";

		}
		else if($Language == 'Amharic'){
			$query = "select C_ID as Company_ID,Name ,Name_Amharic ,
			Registration_Type as Registration_Type_Word,if(PS.Expiration_Date<CURDATE(),'EXPIRED','NOT_EXPIRED') as Expiration_Stat,(case 	 when PS.Registration_Type = 'GOLD' THEN 1
							 when PS.Registration_Type = 'SILVER' THEN 2
							 when PS.Registration_Type =  'BRONZE' THEN 3
							 ELSE 4
							 end) as Registration_Type,
			Product_Service_Amharic,if(ADDR.Belong_to = 'COMPANY_WITH_BUILDING','1','0') AS On_Building
			from
					(select ID as C_ID,Name,Name_Amharic
					from  company
					where Name_Amharic LIKE '%$Name%') as Com_Spec
					inner join
					payment_status as PS
					on C_ID = PS.Company_ID
					inner join
					Company_Product_Service as C_P_S
					on C_ID = C_P_S.Company_ID
					inner join
					company_address as COM_ADDR
					on C_ID = COM_ADDR.Company_ID
					inner join
					Address as ADDR
					on COM_ADDR.Address_ID = ADDR.ID

				order by if(Name_Amharic LIKE '$Name%','0',if(Name_Amharic LIKE '%$Name',1,2));";
		}


		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return False;
		}


	}

	//this functions will find names of generic search requirements

	function Get_Category_Name($Category_ID){
		$query = "select * from Category where id='$Category_ID'";

		$result = mysqli_query($this->getDbc(),$query);
		$result = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$name = $result['Name_Amharic'];

		if($name){
			return $name;
		}
		else{
			return false;
		}
	}


	function Get_Ownership_Name($Ownership_ID){
		$query = "select * from Ownership where id='$Ownership_ID'";

		$result = mysqli_query($this->getDbc(),$query);
		$result = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$name = $result['Name_Amharic'];

		if($name){
			return $name;
		}
		else{
			return false;
		}
	}

	//get the specialization name
	function Get_Specialization_Name($Specialization_ID){
		$query = "select * from specialization where ID = '$Specialization_ID'";

		$result = mysqli_query($this->getDbc(),$query);
		$result = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$name = $result['Name_Amharic'];

		if($name){
			return $name;
		}
		else{
			return false;
		}
	}

	function Get_Region_Name($Region_ID){
		$query = "select * from region where id='$Region_ID'";

		$result = mysqli_query($this->getDbc(),$query);
		$result = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$name = $result['Name_Amharic'];

		if($name){
			return $name;
		}
		else{
			return false;
		}
	}

	function Get_City_Name($City_ID){
		$query = "select * from city where id='$City_ID'";

		$result = mysqli_query($this->getDbc(),$query);
		$result = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$name = $result['Name_Amharic'];

		if($name){
			return $name;
		}
		else{
			return false;
		}
	}

	function Get_SubCity_Name($SubCity_ID){
		$query = "select * from sub_city where id='$SubCity_ID'";

		$result = mysqli_query($this->getDbc(),$query);
		$result = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$name = $result['Name_Amharic'];

		if($name){
			return $name;
		}
		else{
			return false;
		}
	}

	function Get_Wereda_Name($Wereda_Name){
		$query = "select * from wereda where id='$Wereda_Name'";

		$result = mysqli_query($this->getDbc(),$query);
		$result = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$name = $result['Name_Amharic'];

		if($name){
			return $name;
		}
		else{
			return false;
		}
	}

	function Get_Sefer_Name($Sefer_ID){
		$query = "select * from sefer where id='$Sefer_ID'";

		$result = mysqli_query($this->getDbc(),$query);
		$result = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$name = $result['Name_Amharic'];

		if($name){
			return $name;
		}
		else{
			return false;
		}
	}

	function Get_Street_Name($Street_ID){
		$query = "select * from street where id='$Street_ID'";

		$result = mysqli_query($this->getDbc(),$query);
		$result = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$name = $result['Name_Amharic'];

		if($name){
			return $name;
		}
		else{
			return false;
		}
	}




	function Search_Building($Name,$Language){


		if($Language == 'English'){
			$query = "select * from building
					where Name LIKE '%$Name%'
					order by if(Name LIKE '$Name%','0',if(Name LIKE '%g$Name',1,2));";

		}
		else if($Language == 'Amharic'){
			$query = "select * from building
					where Name_Amharic LIKE '%$Name%'
					order by if(Name_Amharic LIKE '$Name%','0',if(Name LIKE '%g$Name',1,2));";
		}

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return False;
		}

	}


	function Search_Street($Name,$Language){


		if($Language == 'English'){
			$query = "select * from street
					where Name LIKE '%$Name%'
					order by if(Name LIKE '$Name%','0',if(Name LIKE '%g$Name',1,2));";

		}
		else if($Language == 'Amharic'){
			$query = "select * from street
					where Name_Amharic LIKE '%$Name%'
					order by if(Name_Amharic LIKE '$Name%','0',if(Name LIKE '%g$Name',1,2));";
		}

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return False;
		}

	}


	function Search_Phone($Number){


		$query = "select * from famous_phones
				where Phone LIKE '%$Number%'
				order by if(Phone LIKE '$Number%','0',if(Phone LIKE '%g$Number',1,2));";


		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return False;
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

	function Get_Famous_Phones(){
		$query = "SELECT * FROM Famous_Phones";

		$result = mysqli_query($this->getDbc(),$query);
		if($result){
			return $result;
		}
		else{
			return null;
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


	//get building for editing
	function Get_Building_Info($Building_ID){

		$query = "select *
from  (select BUL.ID as BUL_ID,BUL.Name as BUL_Name,BUL.Name_Amharic as BUL_Name_Amharic,
				BUL.Building_Description as BUL_DESC,BUL.Building_Description_Amharic as BUL_DESC_AMH,BUL.Parking_Area,
				if( BUL.Parking_Area = '1','yes','no' ) as Parking_Area_English,if( BUL.Parking_Area = '1','አለው','የለውም' ) as Parking_Area_Amharic
		from building as BUL
		where BUL.ID = '$Building_ID') as bul_spec

		inner join

		(
		select P.ID as P_ID,
				R.Name as Region,R.Name_Amharic as Region_Amharic,
				C.Name as City,C.Name_Amharic as City_Amharic,
				SC.Name as Sub_City,SC.Name_Amharic as Sub_City_Amharic,
				W.Name as Wereda,W.Name_Amharic as Wereda_Amharic,
				SEF.Name as Sefer,SEF.Name_Amharic as Sefer_Amharic,
				STR.Name as Street,STR.Name_Amharic as Street_Amharic,STR.ID as Street_ID
			from Place as P inner join Region as R
				on P.Region =  R.ID
				inner join City as C
				on P.City = C.ID
				inner join Sub_City as SC
				on P.Sub_City = SC.ID
				inner join sefer as SEF
				on P.Sefer = SEF.ID
				inner join wereda as W
				on P.Wereda = W.ID
				inner join street as STR
				on P.Street = STR.ID
		where P.ID = (select ADDR_P.Place_ID
						from address_place as ADDR_P
						where ADDR_P.Address_ID = (select BUL_ADDR.Address_ID
													from building_address as BUL_ADDR
													where BUL_ADDR.Building_ID = '$Building_ID') )


		) as place_spec

		inner join

		(select DIR.Direction,DIR.Direction_Amharic
		from direction as DIR
		where DIR.ID = (select ADDR_DIR.Direction_ID
						from address_direction as ADDR_DIR
						where ADDR_DIR.Address_ID = (select BUL_ADDR.Address_ID
													from building_address as BUL_ADDR
													where BUL_ADDR.Building_ID = '$Building_ID'))) as dir_spec





;";
		$result = mysqli_query($this->getDbc(),$query);
		if($result){
			return $result;
		}
		else{
			return null;
		}
	}

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



	//this are connected with events
	function Get_Events(){
		$query = "select E.ID, E.Name,E.Name_Amharic,E.About_Event,E.About_Event_Amharic,E.Event_Start,E.Event_End,if(E.Event_End<CURDATE(),'EXPIRED','NOT_EXPIRED') as Event_Status from event as E order by Event_Start";

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
				where ( (E.Event_Start - curdate() < 15)  AND (E.Event_Start - curdate() >0)) order by Days_Left";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return null;
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

	//will fetch the specialization of the company
	function Get_Company_Specializations($Company_ID){


		$query = "select Name,Name_Amharic from (
	select ID as Com_Spec_ID,Company_ID,Spec_1,Spec_2,Spec_3,Spec_4,Spec_5 from company_specialization
	where Company_ID = '$Company_ID' ) as com_spec inner join
	( select ID as Spec_ID, Name, Name_Amharic,General_Category from specialization ) as spec
	where Spec_1 = Spec_ID or Spec_2 = Spec_ID or Spec_3 = Spec_ID or Spec_4 = Spec_ID or Spec_5 = Spec_ID ";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return null;
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

//get all building for listing
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





}
































