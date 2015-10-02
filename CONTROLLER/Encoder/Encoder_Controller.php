<?php

class Encoder_Controller extends User_Controller{



	//about region

	/**
	 * @param Region $region
	 * @return bool
	 * this function takes region as a parameter and checks if the region exits in the database
	 * if the region exists before it will return true
	 * else it will return false
	 */
	function Region_Exists(Region $region){
		$Region = $region->getRegionName();

		//check if the region exits and if it does return true else return false

		$query = "SELECT * FROM region where Name='$Region'";

		$result = mysqli_query($this->getDbc(),$query);

		if(mysqli_num_rows($result) >= 1){
			return TRUE;
		}
		else if(mysqli_num_rows($result) == 0){
			return FALSE;
		}


	}

	/**
	 * @param Region $region
	 * @return bool
	 * this function will add the region to the data base
	 * takes region parameter
	 */
	function Add_Region(Region $region){

		$Region_Name = $region->getRegionName();
		$Region_Name_Amharic = $region->getRegionNameAmharic();


		//add the region to the region database

		$query = "INSERT INTO region (Name,Name_Amharic) VALUES('$Region_Name','$Region_Name_Amharic')";

		$result = mysqli_query($this->getDbc(),$query);


		if($result){
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	/**
	 * @return bool|mysqli_result
	 * this will return all the regions
	 */
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


	//about city


	/**
	 * @param City $city
	 * @return bool
	 * this function takes a city object parameter and checks if the city exists
	 * if the city exists it wil return true
	 * else it will return false
	 */
	function City_Exists(City $city){

		$City = $city->getCity();

		$query = "SELECT * FROM city where Name= '$City'";

		$result = mysqli_query($this->getDbc(),$query);

		if(mysqli_num_rows($result) >= 1){
			return TRUE;
		}
		else if(mysqli_num_rows($result) == 0){
			return FALSE;
		}
	}

	/**
	 * @param City $city
	 * @return bool
	 * this function takes city as a parameter and add the city to the data base
	 * if the city is added to the database it will return true
	 * else it will return false
	 */
	function Add_City(City $city){

		$City_Name = $city->getCity();
		$City_Name_Amharic = $city->getCityAmharic();

		$query = "INSERT INTO city (Name,Name_Amharic) VALUES('$City_Name','$City_Name_Amharic')";

		$result = mysqli_query($this->getDbc(),$query);


		if($result){
			return TRUE;
		}
		else {
			return FALSE;
		}

	}

	/**
	 * @return bool|mysqli_result
	 * this will return all the city
	 */
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



	//about sub city


	/**
	 * @param Sub_City $sub_city
	 * @return bool
	 * this function checks if the sub city exists before
	 * returns true if the sub_city exists
	 * else returns false
	 */
	function Sub_City_Exists(Sub_City $sub_city){

		$Sub_City = $sub_city->getSubCity();

		$query = "SELECT *  FROM sub_city where Name= '$Sub_City'";

		$result = mysqli_query($this->getDbc(),$query);

		if(mysqli_num_rows($result) >= 1){
			return TRUE;
		}
		else if(mysqli_num_rows($result) == 0){
			return FALSE;
		}

	}

	/**
	 * @param Sub_City $sub_city
	 * @return bool
	 * this function adds subcity to the database
	 * if the subcity is added to the database it will return true
	 * else it will return false
	 */
	function Add_Sub_City(Sub_City $sub_city){
		$Sub_City_Name = $sub_city->getSubCity();
		$Sub_City_Name_Amharic = $sub_city->getSubCityAmharic();

		$query = "INSERT INTO sub_city (Name,Name_Amharic) VALUES('$Sub_City_Name','$Sub_City_Name_Amharic')";

		$result = mysqli_query($this->getDbc(),$query);


		if($result){
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	/**
	 * @return bool|mysqli_result
	 * this will retur all the subcity
	 */
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


	//about wereda


	/**
	 * @param Wereda $wereda
	 * @return bool
	 * this function checks if the wereda exists
	 * if the wereda exists it will return true
	 * else it will return false
	 */
	function Wereda_Exits(Wereda $wereda){
		$Wereda = $wereda->getWereda();


		$query = "SELECT * FROM wereda where Name= '$Wereda'";

		$result = mysqli_query($this->getDbc(),$query);

		if(mysqli_num_rows($result) >= 1){
			return TRUE;
		}
		else if(mysqli_num_rows($result) == 0){
			return FALSE;
		}

	}

	/**
	 * @param Wereda $wereda
	 * @return bool
	 * this function takes wereda object as a parameter to add it to the database
	 * if the wereda is added it will return true
	 * else it will return false
	 */
	function Add_Wereda(Wereda $wereda){
		$Wereda_Name = $wereda->getWereda();
		$Wereda_Name_Amharic = $wereda->getWeredaAmharic();

		$query = "INSERT INTO wereda (Name,Name_Amharic) VALUES('$Wereda_Name','$Wereda_Name_Amharic')";

		$result = mysqli_query($this->getDbc(),$query);


		if($result){
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	/**
	 * @return bool|mysqli_result
	 * this will return all the wereda
	 */
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


	//about sefer

	/**
	 * @param Sefer $sefer
	 * @return bool
	 * this function checks if the sefer exits
	 * if the sefer exits it will return true
	 * else it will return false
	 */
	function Sefer_Exists(Sefer $sefer){
		$Sefer = $sefer->getSefer();

		$query = "SELECT * FROM sefer where Name= '$Sefer'";

		$result = mysqli_query($this->getDbc(),$query);

		if(mysqli_num_rows($result) >= 1){
			return TRUE;
		}
		else if(mysqli_num_rows($result) == 0){
			return FALSE;
		}

	}

	/**
	 * @param Sefer $sefer
	 * @return bool
	 * this function takes sefer object
	 * if the sefer is added to the data base it will return true
	 * else it will return false
	 */
	function Add_Sefer(Sefer $sefer){
		$Sefer_Name = $sefer->getSefer();
		$Sefer_Name_Amharic = $sefer->getSeferAmharic();

		$query = "INSERT INTO sefer (Name,Name_Amharic) VALUES('$Sefer_Name','$Sefer_Name_Amharic')";

		$result = mysqli_query($this->getDbc(),$query);


		if($result){
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	/**
	 * @return bool|mysqli_result
	 * this will return all sefer from the database
	 */
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


	//about category


	/**
	 * @param Category $category
	 * @return bool
	 * this function checks if the category exists before
	 * if the category exists before it will return true
	 * else it will return false
	 */
	function Category_Exists(Category $category){
		$category_name = $category->getCategoryName();

		$query = "SELECT * FROM Category where Name = '$category_name'";

		$result = mysqli_query($this->getDbc(),$query);

		if(mysqli_num_rows($result) >= 1){
			return TRUE;
		}
		else if(mysqli_num_rows($result) == 0){
			return FALSE;
		}
	}


	/**
	 * @param Category $category
	 * @return bool
	 * this function will add a category to the database
	 * it takes q category object
	 */
	function Add_Category(Category $category){

		$category_name = $category->getCategoryName();
		$category_name_amharic = $category->getCategoryNameAmharic();

		$query = "INSERT INTO category (Name,Name_Amharic) VALUES ('$category_name','$category_name_amharic')";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}


	/**
	 * @return bool|mysqli_result
	 * this function returns all the categories in the database
	 */
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






	//about street

	/**
	 * @param Street $street
	 * @return bool
	 * this function takes in street as a parameter and checks if the street exists in the
	 * database
	 */
	function Street_Exists(Street $street){

		$street_name = $street->getStreetName();

		$query = "SELECT * FROM street WHERE Name = '$street_name'";

		$result = mysqli_query($this->getDbc(),$query);
		if(mysqli_num_rows($result) >= 1){
			return TRUE;

		}
		else if(mysqli_num_rows($result) == 0){
			return FALSE;
		}

	}


	/**
	 * @param Street $street
	 * @return bool
	 * this function takes a street object
	 * parameter and adds it to the database
	 */
	function Add_Street(Street $street){

		$street_name = $street->getStreetName();
		$street_name_amharic = $street->getStreetNameAmharic();
		$about_street = $street->getAboutStreet();
		$about_street_amharic = $street->getAboutStreetAmharic();

		$query = "INSERT INTO Street (Name,Name_Amharic,About_Street,About_Street_Amharic) VALUE ('$street_name','$street_name_amharic','$about_street','$about_street_amharic')";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return False;
		}

	}


	/**
	 * @return bool|mysqli_result
	 * this function returns streets
	 */
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


	//connected with company type


	/**
	 * @param Company_Type $company_type
	 * @return bool
	 * this function takes in company type and adds it to the database
	 */
	function Add_Company_Type(Company_Type $company_type){

		$Type = $company_type->getCompanyType();
		$Type_Amharic = $company_type->getCompanyTypeAmharic();

		$query =  "INSERT INTO Company_Type (Type,Type_Amharic) VALUES('$Type','$Type_Amharic')";

		$result = mysqli_query($this->getDbc(),$query);

		if($result ){
			return TRUE;
		}
		else{
			return FALSE;
		}

	}

	/**
	 * @return bool
	 * this function will return all the company types
	 */
	function Get_Company_Type(){
		$query = "SELECT * FROM Company_Type";

		$result =mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return FALSE;
		}
	}

	/**
	 * @param Company_Type $company_type
	 * @return bool
	 * this function returns true if the company_type exists
	 * else it will return false
	 */
	function Company_Type_Exists(Company_Type $company_type){
		$Type = $company_type->getCompanyType();

		$query = "SELECT * FROM Company_Type WHERE Type='$Type'";

		$result = mysqli_query($this->getDbc(),$query);

		if(mysqli_num_rows($result) >= 1){
			return TRUE;
		}
		else if(mysqli_num_rows($result) == 0){
			return FALSE;
		}
	}


	//connected with ownership

	function Add_Ownership(Ownership $ownership){

		$Name = $ownership->getName();
		$Name_Amharic = $ownership->getNameAmharic();

		$query = "INSERT INTO Ownership (Name,Name_Amharic) VALUES ('$Name','$Name_Amharic')";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	function Ownership_Exist(Ownership $ownership){

		$Name = $ownership->getName();
 		$query = "SELECT * FROM Ownership WHERE Name='$Name'";
 		$result = mysqli_query($this->getDbc(),$query);

		if(mysqli_num_rows($result) >= 1){
			return TRUE;
		}
		else if(mysqli_num_rows($result) == 0){
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

	//about building


    function Add_Building(Building $building){

		$name = $building->getName();
		$name_amharic = $building->getNameAmharic();
		$building_description = $building->getBuildingDescription();
		$building_description_amharic =$building->getBuildingDescriptionAmharic();
		$parking_area = $building->getParkingArea();

		$query = "INSERT INTO building(Name,Name_Amharic,Building_Description,Building_Description_Amharic,Parking_Area) VALUES('$name','$name_amharic','$building_description','$building_description_amharic',
'$parking_area')";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}

	}



	function Building_Exists(Building $building){
		$name = $building->getName();
		$query = "SELECT * FROM Building WHERE Name='$name'";

		$result = mysqli_query($this->getDbc(),$query);

		if(mysqli_num_rows($result) >= 1){
			return TRUE;
		}
		else if(mysqli_num_rows($result) == 0){
			return FALSE;
		}
	}


	function Get_Buildings(){
		$query = "SELECT * FROM Building";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return FALSE;
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


  	function Add_Building_Address(Building_Address $building_address){

		$Address_ID = $building_address->getAddressID();

		$Building_ID = $building_address->getBuildingID();

		$query = "INSERT INTO Building_Address (Address_ID,Building_ID) VALUES('$Address_ID','$Building_ID')";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}


	//connected with building for listing

	function Get_Building_For_Listing(){

		$query = "SELECT * FROM Building";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return FALSE;
		}

	}



	//connected with place and address
 	function Add_Place(Place $place){

		$Region_ID = $place->getRegionID();
		$City_ID =$place->getCityID();
		$SubCity_ID =$place->getSubCityID();
		$Wereda_ID = $place->getWeredaID();
		$Sefer_ID =$place->getSeferID();
		$Street_ID = $place->getStreetID();

		$query = "INSERT INTO Place (Region,City,Sub_City,Wereda,Sefer,Street)
 				VALUE ('$Region_ID','$City_ID','$SubCity_ID','$Wereda_ID','$Sefer_ID','$Street_ID')";


		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}


	function Add_Address_Place(Address_Place $address_Place){

		$Address_ID = $address_Place->getAddressID();
		$Place_ID = $address_Place->getPlaceID();
		$query = "INSERT INTO Address_Place (Address_ID,Place_ID) VALUES('$Address_ID','$Place_ID')";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	//connected with direction and address
 	function Add_Direction(Direction $direction){

		$Direction = $direction->getDirection();
		$Direction_Amharic = $direction->getDirectionAmharic();

		$query = "INSERT INTO Direction (Direction,Direction_Amharic) VALUES('$Direction','$Direction_Amharic')";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}

	}

	function Add_Address_Direction(Address_Direction $address_direction){

		$Address_Id = $address_direction->getAddressID();
		$Direction_ID = $address_direction->getDirectionID();

		$query = "INSERT INTO Address_Direction (Address_ID,Direction_ID) VALUES('$Address_Id','$Direction_ID')";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}

	}

	//connected to company
  	function Company_Exists(Company $company){
		$Company_Name =$company->getCompanyName();


		$query = "SELECT * FROM Company WHERE Company_Name='$Company_Name'";

		$result = mysqli_query($this->getDbc(),$query);

		if(mysqli_num_rows($result) >= 1){
			return TRUE;
		}
		else if(mysqli_num_rows($result) == 0){
			return FALSE;
		}


	}


	function Add_Company(Company $company){
		$Company_Name = $company->getCompanyName();
		$Company_Name_Amharic = $company->getCompanyNameAmharic();


		$query = "INSERT INTO Company (Name,Name_Amharic,Registration_Date) VALUES ('$Company_Name','$Company_Name_Amharic', Now())";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}



	//this will return the company list from company table
	function Get_Company_For_Listing(){

		$query = "select C.ID,C.Name,C.Name_Amharic,CS.Product_Service_Amharic
			      from Company as C Inner join Company_Product_Service As CS
                  on C.ID = CS.Company_ID";

		$result  = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return FALSE;
		}
	}

	//connected with company and category
 	function Add_Company_Category(Company_Category $company_category){

		$Company_ID = $company_category->getCompanyID();
		$Category_ID = $company_category->getCategoryID();

		$query = "INSERT INTO Company_Category (Company_ID,Category_ID) VALUES('$Company_ID','$Category_ID')";

		$result  = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}


	}

	//connected with company and ownership
 	function Add_Company_Ownership(Company_Ownership $company_ownership){

		$Company_ID = $company_ownership->getCompanyID();
		$Ownership_ID = $company_ownership->getOwnershipID();

		$query = "INSERT INTO Company_Ownership(Company_ID,Ownership_ID)VALUES('$Company_ID','$Ownership_ID')";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}


	}

	//connected to about company

	function Add_About_Company(About_Company $about_company){

		$Company_ID = $about_company->getCompanyID();
		$Branch = $about_company->getBranch();
		$Branch_Amharic = $about_company->getBranchAmharic();
		$Working_Hours = $about_company->getWorkingHours();
		$Working_Hours_Amharic = $about_company->getWorkingHoursAmharic();


		$query = "INSERT INTO About_Company(Company_ID,Branch,Branch_Amharic,Working_Hours,Working_Hours_Amharic) VALUES('$Company_ID','$Branch','$Branch_Amharic','$Working_Hours',
'$Working_Hours_Amharic')";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	//connected with company service

	function Add_Company_Service(Company_Service $company_service){

		$Company_ID = $company_service->getCompanyID();
		$Company_Service = $company_service->getCompanyService();
		$Company_Service_Amharic = $company_service->getCompanyServiceAmharic();


		$query = "INSERT INTO company_product_service(Company_ID,Product_Service,Product_Service_Amharic) VALUES('$Company_ID','$Company_Service','$Company_Service_Amharic')";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}

	}

	//connected with company payment status

	function Add_Payment_Status(Payment_Status $payment_Status){
		$Company_ID = $payment_Status->getCompanyID();

		$Expiration_Date = $payment_Status->getExpirationDate();

		$query = "INSERT INTO Payment_Status(Company_ID,Expiration_Date) VALUES ('$Company_ID','$Expiration_Date')";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	//connected with Address_Company

	function Add_Address_Company(Address_Building $address_building){
		$Address_ID = $address_building->getAddressID();
		$Building_Id = $address_building->getBuildingID();
		$Floor = $address_building->getFloor();

		$query = "INSERT INTO Address_Building (Address_ID,Building_ID,Floor) VALUES('$Address_ID','$Building_Id','$Floor')";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	//connected with company address
	function Add_Company_Address( Company_Address $company_address){

		$Company_ID =$company_address->getCompanyID();
		$Address_ID = $company_address->getAddressID();

		$query = "INSERT INTO Company_Address (Company_ID,Address_ID) VALUES('$Company_ID','$Address_ID')";


		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}

	}


	//connected with address building
	function Add_Address_Building(Address_Building $address_building){

		$Address_ID = $address_building->getAddressID();
		$Building_ID = $address_building->getBuildingID();
		$Floor = $address_building->getFloor();

		$query = "INSERT INTO Address_Building_Floor(Address_ID,Building_ID,Floor) VALUES('$Address_ID','$Building_ID','$Floor')";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	//connected with contact
	function Add_Contact(Contact $contact){
		$Email = $contact->getEmail();
		$House_No = $contact->getHouseNo();
		$FAX = $contact->getFAX();
		$POBOX = $contact->getPOBOX();
		$Telephone = $contact->getTelephone();


		$query = "INSERT INTO Contact (Email,House_No,FAX,POBOX,Telephone) VALUES('$Email','$House_No','$FAX','$POBOX','$Telephone')";
		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	//connected with address_contact relation
	function Add_Address_Contact(Address_Contact $address_contact){
		$Address_ID = $address_contact->getAddressID();
		$Contact_ID = $address_contact->getContactID();

		$query = "INSERT INTO Address_Contact (Address_ID,Contact_ID) VALUES('$Address_ID','$Contact_ID')";

		$result  = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}


	//connected with famous phone numbers
 	function Add_Famous_Phones(Famous_Phone $famous_phone){

		$Phone = $famous_phone->getPhone();
		$Description = $famous_phone->getDescription();
		$Description_Amharic = $famous_phone->getDescriptionAmharic();

		$query = "INSERT INTO Famous_Phones (Phone,Description,Description_Amharic) VALUES('$Phone','$Description','$Description_Amharic')";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}
 	}

	function Famous_Phone_Exists(Famous_Phone $famous_phone){
		$Phone = $famous_phone->getPhone();
		$query = "SELECT * FROM Famous_Phones WHERE Phone = '$Phone'";


		$result = mysqli_query($this->getDbc(),$query);

		if(mysqli_num_rows($result) >= 1){
			return TRUE;
		}
		else{
			return FALSE;
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


	//connected with event

	function Add_Event(Event $event){
		$Name = $event->getName();
		$Name_Amharic = $event->getNameAmharic();
		$About_Event = $event->getAboutEvent();
		$About_Event_Amharic = $event->getAboutEventAmharic();


		$query = "INSERT INTO Event (Name,Name_Amharic,About_Event,About_Event_Amharic) VALUES('$Name','$Name_Amharic','$About_Event','$About_Event_Amharic')";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return TRUE;
		}
		else{
			return FALSE;
		}

	}


	function Event_Exists(Event $event){

		$Name =$event->getName();

		$query ="SELECT * from Event WHERE Name='$Name'";

		$result = mysqli_query($this->getDbc(),$query);

		if(mysqli_num_rows($result) >= 1){
			return TRUE;
		}
		else if(mysqli_num_rows($result) == 0){
			return FALSE;
		}

	}


	function Get_Events(){
		$query = "SELECT * FROM Event";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return null;
		}
	}


	//add building new with Transaction
	function Add_Building_New($Building_Name,$Building_Name_Amharic,$Building_Description,$Building_Description_Amharic,$Parking_Area,Place $place,$Direction,$Direction_Amharic){


		$query_start = "START TRANSACTION";

		mysqli_query($this->getDbc(),$query_start);

		//insert the building
		$query = "INSERT INTO building(Name,Name_Amharic,Building_Description,Building_Description_Amharic,Parking_Area) VALUES ('$Building_Name','$Building_Name_Amharic','$Building_Description',
'$Building_Description_Amharic','$Parking_Area')";

		$result1 = mysqli_query($this->getDbc(),$query);
		//get the id of the building
  		$added_building_id = $this->getDb()->get_last_id();

		//increment the address
		$this->Increment_Address(Belong::BUILDING);

 		//get the id of the address
		$added_address_id = $this->getDb()->get_last_id();

		//make the building and the address relationship
 		$query = "INSERT INTO Building_Address (Address_ID,Building_ID) VALUES('$added_address_id','$added_building_id')";

		$result2 = mysqli_query($this->getDbc(),$query);

		//add the place
		$Region_ID = $place->getRegionID();
		$City_ID = $place->getCityID();
		$SubCity_ID = $place->getSubCityID();
		$Wereda_ID = $place->getWeredaID();
		$Sefer_ID = $place->getSeferID();
		$Street_ID = $place->getStreetID();

		//add place query
		$query = "INSERT INTO Place (Region,City,Sub_City,Wereda,Sefer,Street)
 				VALUE ('$Region_ID','$City_ID','$SubCity_ID','$Wereda_ID','$Sefer_ID','$Street_ID')";

		$result3 = mysqli_query($this->getDbc(),$query);
 		$added_place_id = $this->getDb()->get_last_id();



		//add place address relation ship
 		$query = "INSERT INTO Address_Place (Address_ID,Place_ID) VALUES('$added_address_id','$added_place_id')";

		$result4 = mysqli_query($this->getDbc(),$query);

 		//add direction
		$query = "INSERT INTO Direction (Direction,Direction_Amharic) VALUES('$Direction','$Direction_Amharic')";

		$result5 = mysqli_query($this->getDbc(),$query);

		$added_direction_id = $this->getDb()->get_last_id();
		//add address direction relation

		$query = "INSERT INTO Address_Direction (Address_ID,Direction_ID) VALUES('$added_address_id','$added_direction_id')";

		$result6 = mysqli_query($this->getDbc(),$query);

		if($result1 and $result3 and $result4 and $result5){
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



	//add company building with one stroke if we can lets try
	function Add_Company_With_Building(
		$Company_Name,$Company_Name_Amharic,
		$Category_ID,
		$Company_Type_ID,
		$Branch,$Branch_Amharic,$Working_Hours,$Working_Hours_Amharic,
		$Product_Service,$Product_Service_Amharic,
		$Registration_Expiration_Date,
		$Building_ID,$Building_Floor,
		Contact $Contact

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
		$query = "INSERT INTO Payment_Status(Company_ID,Expiration_Date) VALUES ('$added_company_id','$Registration_Expiration_Date')";
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

		if($result1 and $result2 and $result3 and $result4 and $result5 and $result6 and $result7 and $result8 and $result9 and $result10){

			$query = "COMMIT";
			mysqli_query($this->getDbc(),$query);
			return TRUE;


		}
		else{
			$query = "ROLLBACK";
			mysqli_query($this->getDbc(),$query);
			echo("Rolled back");
			return FALSE;

		}



	}


	function Add_Company_With_Out_Building(
		$Company_Name,$Company_Name_Amharic,
		$Category_ID,
		$Company_Type_ID,
		$Branch,$Branch_Amharic,$Working_Hours,$Working_Hours_Amharic,
		$Product_Service,$Product_Service_Amharic,
		$Registration_Expiration_Date,
		Contact $Contact,
		Place $place,
		$Direction,
		$Direction_Amharic
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
		$query = "INSERT INTO Payment_Status(Company_ID,Expiration_Date) VALUES ('$added_company_id','$Registration_Expiration_Date')";
		$result6 = mysqli_query($this->getDbc(),$query);



		//increment address
		$this->Increment_Address(Belong::COMPANY_WITH_OUT_BUILDING);

		//get the address id
		$added_address_id = $this->getDb()->get_last_id();

		//add company address relationship
		$query = "INSERT INTO Company_Address (Company_ID,Address_ID) VALUES('$added_company_id','$added_address_id')";
		$result7 = mysqli_query($this->getDbc(),$query);




		//add contact
		$Email = $Contact->getEmail();
		$House_No = $Contact->getHouseNo();
		$FAX = $Contact->getFAX();
		$POBOX = $Contact->getPOBOX();
		$Telephone = $Contact->getTelephone();
		$query = "INSERT INTO Contact (Email,House_No,FAX,POBOX,Telephone) VALUES('$Email','$House_No','$FAX','$POBOX','$Telephone')";
		$result8 = mysqli_query($this->getDbc(),$query);



		//get the contact id
		$added_contact_id = $this->getDb()->get_last_id();


		//add address contact relation

		$query = "INSERT INTO Address_Contact (Address_ID,Contact_ID) VALUES('$added_address_id','$added_contact_id')";
		$result9 = mysqli_query($this->getDbc(),$query);



		//add place
		$Region_ID = $place->getRegionID();
		$City_ID =$place->getCityID();
		$SubCity_ID =$place->getSubCityID();
		$Wereda_ID = $place->getWeredaID();
		$Sefer_ID =$place->getSeferID();
		$Street_ID = $place->getStreetID();

		$query = "INSERT INTO Place (Region,City,Sub_City,Wereda,Sefer,Street)
 				VALUE ('$Region_ID','$City_ID','$SubCity_ID','$Wereda_ID','$Sefer_ID','$Street_ID')";


		$result10 = mysqli_query($this->getDbc(),$query);



		//get the id of the added place
		$added_place_id = $this->getDb()->get_last_id();


		//add address place relation
		$query = "INSERT INTO Address_Place (Address_ID,Place_ID) VALUES('$added_address_id','$added_place_id')";
 		$result11 = mysqli_query($this->getDbc(),$query);



		//add direction
 		$query = "INSERT INTO Direction (Direction,Direction_Amharic) VALUES('$Direction','$Direction_Amharic')";
 		$result12 = mysqli_query($this->getDbc(),$query);

		$added_direction_id = $this->getDb()->get_last_id();

		//add address direction
		$query = "INSERT INTO Address_Direction (Address_ID,Direction_ID) VALUES('$added_address_id','$added_direction_id')";

		$result13 = mysqli_query($this->getDbc(),$query);



		if($result1 and $result2 and $result3 and $result4 and $result5 and $result6 and $result7 and $result8 and $result9 and $result10 and $result11 and $result12 and $result13){

			$query = "COMMIT";
			mysqli_query($this->getDbc(),$query);
			return TRUE;


		}
		else{
			$query = "ROLLBACK";
			mysqli_query($this->getDbc(),$query);
			echo("Rolled back");
			return FALSE;

		}
	}

}
