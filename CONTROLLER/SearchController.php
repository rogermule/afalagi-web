<?php
/**
 * Created by PhpStorm.
 * User: rog
 * Date: 9/15/15
 * Time: 10:11 PM
 */

include("../../../MODEL/DataBase.php");
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

        $companyType = "";
        $region = "";
        $city = "";
        $subcity = "";
        $sefer = "";

        $q = "select
              from (select )";
        $Word_Start = "A";

        if($Name_Start != null){
            $Word_Start = $Name_Start;
        }
        $query = "select *
from (

select COM_ID as company_id,COM_NAME as company_name,COM_Name_Amharic as company_name_amharic,
        COM_REG_DATE as registration_date
		,CAT_Name as category,CAT_Name_Amharic as category_amharic,ADDR_ID as address_id,Belong_to as belong_to
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
  ORDER by company_name

  ) as company_details
 inner join
 on

  ";

        $result  = mysqli_query($this->getDbc(),$query);

        if($result){
            return $result;
        }
        else{
            return FALSE;
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