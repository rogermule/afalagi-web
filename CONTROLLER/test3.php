<?php




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





