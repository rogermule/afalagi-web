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


    /* ------------ Company Category -------------- */
    function getCompanyCategoryeId($company_id){
        $company_category_id = "Unknown";
        $query = "SELECT *
                    FROM company_category
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
        $query = "SELECT *
                   FROM category
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
                  FROM region
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
                  FROM city
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
                  FROM sub_city
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