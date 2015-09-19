<?php
/**
 * Created by PhpStorm.
 * User: rog
 * Date: 9/15/15
 * Time: 10:11 PM
 */

include("../../../MODEL/DataBase.php");

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


    function genericSearch($company){
        $query = "";

        $query = "SELECT *
                   FROM company
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

    function getCompanyType($id){
        $company_type = "Unknown";
        $query = "SELECT *
                    FROM company_type
                    WHERE id ='$id'";

        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            while($results = mysqli_fetch_array($result,MYSQL_ASSOC)){
                $company_type = $results['Type'];
            }
        }
        else{
            $company_type = "Error getting info";
        }
        return $company_type;
    }


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

    function getRegion($id){
        $company_region = "Unknown";
        $query = "SELECT *
                    FROM region
                    WHERE id ='$id'";

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

    function getCity($id){
        $company_city = "Unknown";
        $query = "SELECT *
                    FROM city
                    WHERE id ='$id'";

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

    function getSubCity($id){
        $company_sub_city = "Unknown";
        $query = "SELECT *
                    FROM sub_city
                    WHERE id ='$id'";

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

    function getSefer($id){
        $company_sefer = "Unknown";
        $query = "SELECT *
                    FROM sefer
                    WHERE id ='$id'";

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



/* Frequently asked Questions   */

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

}


?>