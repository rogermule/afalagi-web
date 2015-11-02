<?php
/**
 * Created by PhpStorm.
 * User: rog
 * Date: 9/15/15
 * Time: 10:11 PM
 */

require(DB);
define('PAGE_PER_NO',6); // number of results per page.


class SearchController{

    protected $db;
    protected $dbc;
    private $name;
    private $id;
    private $description;

    function __construct(){
        $this->db = new DataBase();
        $this->dbc = $this->db->connect();
    }

    public function getDbc()
    {
        return $this->dbc;
    }


    function getPagination($count){
        $paginationCount= floor($count / PAGE_PER_NO);
        $paginationModCount= $count % PAGE_PER_NO;
        if(!empty($paginationModCount)){
            $paginationCount++;
        }
        return $paginationCount;
    }


    /////////generic search

    function genericSearch($company,$option){
        $query = "";

        $query = "SELECT *
                   FROM $option
                   WHERE Company_Name LIKE '%$company%'
                   ";

        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            return $result;
        }
        else{
            0;
        }
    }

    function Get_Generic_Company($Name_Start = null){

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
where COM_Name like '%$Word_Start%'
ORDER by company_name";;

        $result  = mysqli_query($this->getDbc(),$query);

        if($result){
            return $result;
        }
        else{
            return FALSE;
        }
    }


    function Get_Company_For_Search($company_id){
        $query ="select *
from
		(select  C.ID as Company_ID,C.Name as Company_Name,C.Name_Amharic as Company_Name_Amharic,C.Registration_Date
		 from company as C
		 where ID = '$company_id')as com_spec
 		inner join
 		(select ABT_COM.ID as About_Company_ID, ABT_COM.Branch,ABT_COM.Branch_Amharic,ABT_COM.Working_Hours,ABT_COM.Working_Hours_Amharic
		 from about_company as ABT_COM
		 where Company_ID='$company_id') as abt_spec

		inner join
		(select COM_PRO_SER.ID as Company_Service_ID,Product_Service,COM_PRO_SER.Product_Service_Amharic
		from company_product_service as COM_PRO_SER
		where COM_PRO_SER.Company_ID = '$company_id'

		)as pro_ser_spec

		inner join

		(select PS.ID as Payment_Status_ID,PS.Expiration_Date,PS.Registration_Type
		from payment_status as PS
		where PS.Company_ID = '$company_id') as pay_spec

		inner join



		(select C_CAT.ID as Company_Category_ID,C_CAT.Category_ID as Category_ID
						from company_category as C_CAT
						where C_CAT.Company_ID = '$company_id') as cat_spec
 		inner join

		(select COM_OWN.ID as Company_Ownership_ID,COM_OWN.Ownership_ID Company_Type_ID
						from company_ownership as COM_OWN
						where COM_OWN.Company_ID = '$company_id'
						) as com_type_spec

		inner join

			(select CON.ID as Contact_ID, CON.Email,CON.House_No,CON.FAX,CON.POBOX,CON.Telephone
		  from contact as CON
		  where CON.ID = ( select ADDR_CON.Contact_ID
							from address_contact as ADDR_CON
							where ADDR_CON.Address_ID = ( select COM_ADDR.Address_ID
														  from company_address as COM_ADDR
														  where COM_ADDR.Company_ID = '$company_id'
 									))) as con_spec
 		inner join

			(select DIR.ID as Direction_ID,DIR.Direction,DIR.Direction_Amharic
			from direction as DIR
			where DIR.ID = (select ADDR_DIR.Direction_ID
						    from address_direction as ADDR_DIR
							where ADDR_DIR.Address_ID = ( select COM_ADDR.Address_ID
													  from company_address as COM_ADDR
													  where COM_ADDR.Company_ID = '$company_id'
 									))) as dir_spec
 		inner join

			(select P.ID as Place_ID, P.Region,P.City,P.Sub_City,P.Sefer,P.Wereda,P.Street
 			from Place as P
			where P.ID  = (select ADDR_P.Place_ID
						from address_place as ADDR_P
						where ADDR_P.Address_ID = ( select COM_ADDR.Address_ID
													  from company_address as COM_ADDR
													  where COM_ADDR.Company_ID = '$company_id'
													))) as place_spec



";



        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            return $result;
        }
        else{
            return null;
        }
    }


    /* ------------ Company Category -------------- */
    function getCompanyCategoryeId($company_id){
        $company_category_id = "Unknown";
        $query = "SELECT *
                    FROM category
                    WHERE Company_ID ='$company_id'";

        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            while($results = mysqli_fetch_array($result,MYSQL_ASSOC)){
                $company_category_id = $results['Category_ID'];
            }
        }
        else{
            $company_category_id = "Error getting info";
        }
        return $company_category_id;
    }

    function  getCompanyCatagory($category_id){
        $company_cataegory = "Unknown";
        $query = "SELECT *
                    FROM category
                    WHERE ID ='$category_id'";

        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            while($results = mysqli_fetch_array($result,MYSQL_ASSOC)){
                $company_cataegory = $results['Name'];
            }
        }
        else{
            $company_cataegory = "Error getting info";
        }
        return $company_cataegory;
    }

    function getCompanyTypeAll(){
        $query = "SELECT ID,Name
                   FROM category
                   order by Name
                   ";

        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            return $result;
        }
        else{
            0;
        }
    }

  /* -------------- Company Address ----------*/
    function getCompanyAddressId($company_id){
        $company_address_id = "Unknown";
        $query = "SELECT *
                    FROM category
                    WHERE ID ='$company_id'";

        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            while($results = mysqli_fetch_array($result,MYSQL_ASSOC)){
                $company_address_id = $results['Name'];
            }
        }
        else{
            $company_address_id = "Error getting info";
        }
        return $company_address_id;
    }


    function getCompanyBuilding($company_address_id){

    }
    function getCompanyBuildingAll(){

    }

  /* ---------------- Place ----------------- */

    function getPlaceId($id){
        $place_id = 0;
        $query = "SELECT *
                    FROM address
                    WHERE id ='$id'";

        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            while($results = mysqli_fetch_array($result,MYSQL_ASSOC)){
                $place_id = $results['Place_ID'];
            }
        }
        else{
            $company_type = "Error getting info";
        }
        return $place_id;
    }
    function getPlace($place_id){

    }



 /*--------------- Region  ---------------------------------- */
    function getRegionId($place_id){
        $region_id = 0;
        $query = "SELECT *
                    FROM place
                    WHERE id ='$place_id'";

        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            while($results = mysqli_fetch_array($result,MYSQL_ASSOC)){
                $region_id = $results['Region'];
            }
        }
        else{
            $region_id = "Error getting info";
        }
        return $region_id;
    }


    function getRegion($region_id){
        $company_region = "Unknown";
        $query = "SELECT *
                    FROM region
                    WHERE id ='$region_id'";

        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            while($results = mysqli_fetch_array($result,MYSQL_ASSOC)){
                $company_region = $results['Name'];
            }
        }
        else{
            $company_region = "Error getting info";
        }
        return $company_region;

    }


    function getRegionAll(){
        $query = "SELECT *
                  FROM region order by Name
                    ";
        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            return $result;
        }
        else{
            0;
        }
    }


    /*--------------- City  ---------------------------------- */

    function getCityId($place_id){
        $city_id = 0;
        $query = "SELECT *
                    FROM place
                    WHERE id ='$place_id'";

        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            while($results = mysqli_fetch_array($result,MYSQL_ASSOC)){
                $city_id = $results['City'];
            }
        }
        else{
            $city_id = "Error getting info";
        }
        return $city_id;
    }

    function getCity($city_id){
        $company_city = "Unknown";
        $query = "SELECT *
                    FROM city
                    WHERE id ='$city_id'";

        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            while($results = mysqli_fetch_array($result,MYSQL_ASSOC)){
                $company_city = $results['Name'];
            }
        }
        else{
            $company_city = "Error getting info";
        }
        return $company_city;

    }


    function getCityAll(){
        $query = "SELECT ID,Name
                  FROM city order by Name
                    ";
        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            return $result;
        }
        else{
            0;
        }
    }

    /*--------------- Sub-City  ---------------------------------- */

    function getSubCityId($place_id){
        $sub_city_id = 0;
        $query = "SELECT *
                    FROM place
                    WHERE id ='$place_id'";

        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            while($results = mysqli_fetch_array($result,MYSQL_ASSOC)){
                $sub_city_id = $results['Sub_City'];
            }
        }
        else{
            $sub_city_id = "Error getting info";
        }
        return $sub_city_id;
    }


    function getSubCity($subcity_id){
        $company_sub_city = "Unknown";
        $query = "SELECT *
                    FROM sub_city
                    WHERE id ='$subcity_id'";

        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            while($results = mysqli_fetch_array($result,MYSQL_ASSOC)){
                $company_sub_city = $results['Name'];
            }
        }
        else{
            $company_sub_city = "Error getting info";
        }
        return $company_sub_city;
    }

    function getSubCityAll(){
        $query = "SELECT *
                  FROM sub_city order by Name
                    ";
        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            return $result;
        }
        else{
            0;
        }
    }


    /*--------------- Sefer  ---------------------------------- */

    function getSeferId($place_id){
        $sefer_id = 0;
        $query = "SELECT *
                    FROM place
                    WHERE id ='$place_id'";

        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            while($results = mysqli_fetch_array($result,MYSQL_ASSOC)){
                $sefer_id = $results['Sefer'];
            }
        }
        else{
            $sefer_id = "Error getting info";
        }
        return $sefer_id;
    }

    function getSefer($sefer_id){
        $company_sefer = "Unknown";
        $query = "SELECT *
                    FROM sefer
                    WHERE id ='$sefer_id'";

        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            while($results = mysqli_fetch_array($result,MYSQL_ASSOC)){
                $company_sefer = $results['Name'];
            }
        }
        else{
            $company_sefer = "Error getting info";
        }
        return $company_sefer;
    }

    function getSeferAll(){
        $query = "SELECT *
                  FROM sefer order by Name
                    ";
        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            return $result;
        }
        else{
            0;
        }
    }

    /*--------------- Phone Numbers  ---------------------------------- */

    function getPhoneNumberId($phoneNum){

    }
    function getPhoneNumber($id){
        $company_phone_num = "Unknown";
        $query = "SELECT *
                    FROM telephone
                    WHERE id ='$id'";

        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            while($results = mysqli_fetch_array($result,MYSQL_ASSOC)){
                $company_phone_num = $results['Telephone'];
            }
        }
        else{
            $company_phone_num = "Error getting info";
        }
        return $company_phone_num;
    }



/*----------------- Frequently asked Questions  -----------------------*/

    function getFaqBuilding(){
        $query = "";

        $query = "SELECT *
                   FROM faqBuilding
                   ";

        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            return $result;
        }
        else{
            0;
        }

    }

    function getFaqHotel(){

    }
    function getFaqSchool(){

    }
    function getFaqStreet(){

    }
    function getFaqCompany(){

    }
    function getFaqCinema(){

    }






}


?>