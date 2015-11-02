<?php

class Sub_Encoder_Controller extends User_Controller{



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




		$query = "SELECT * FROM Company WHERE Name='$Company_Name'";

		$result = mysqli_query($this->getDbc(),$query);

		if(mysqli_num_rows($result) >= 1){
			return TRUE;
		}
		else if(mysqli_num_rows($result) == 0){
			return FALSE;
		}


	}


	function Company_Exists_For_Edit(Company $Company,$Company_ID){

		$Company_Name = $Company->getCompanyName();

		$query = "select * from company where name='$Company_Name' and ID != '$Company_ID'";

		$result = mysqli_query($this->getDbc(),$query);

		if(mysqli_num_rows($result) >= 1){
			return TRUE;
		}
		else if(mysqli_num_rows($result) >= 1){
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
		$Event_Start = $event->getEventStart();
		$Event_End = $event->getEventEnd();




		$query = "INSERT INTO Event (Name,Name_Amharic,About_Event,About_Event_Amharic,Event_Start,Event_End) VALUES('$Name','$Name_Amharic','$About_Event','$About_Event_Amharic','$Event_Start','$Event_End')";

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
		$query = "select E.ID, E.Name,E.Name_Amharic,E.About_Event,E.About_Event_Amharic,E.Event_Start,E.Event_End,if(E.Event_End<CURDATE(),'EXPIRED','NOT_EXPIRED') as Event_Status from event as E";

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




	function Add_Company_With_Building(
		$Company_Name,$Company_Name_Amharic,
		$Category_ID,
		$Company_Type_ID,
		$Branch,$Branch_Amharic,$Working_Hours,$Working_Hours_Amharic,
		$Product_Service,$Product_Service_Amharic,
		$Registration_Expiration_Date,$Registration_Type,
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

	function Edit_Company_With_Building(
		$Company_Name,$Company_Name_Amharic,
		$Category_ID,
		$Company_Type_ID,
		$Branch,$Branch_Amharic,$Working_Hours,$Working_Hours_Amharic,
		$Product_Service,$Product_Service_Amharic,
		$Registration_Expiration_Date,$Registration_Type,
		$Building_ID,$Floor,
		Contact $Contact,
 		$Company_ID,$About_Company_ID,$Payment_Status_ID,$Company_Service_ID,
		$Company_Ownership_ID,$Company_Category_ID,$Contact_ID,
		$Address_Building_Floor_ID
	){

		//contacts
		$Email = $Contact->getEmail();
		$House_No = $Contact->getHouseNo();
		$FAX = $Contact->getFAX();
		$POBOX = $Contact->getPOBOX();
		$Telephone = $Contact->getTelephone();


		//start transaction
		$query = "START TRANSACTION";
		mysqli_query($this->getDbc(),$query);


		//1 update the company
		$query1 = "update company
					set name='$Company_Name',name_amharic='$Company_Name_Amharic'
					where ID='$Company_ID'";

		$result1 = mysqli_query($this->getDbc(),$query1);

		//2 udate the about company
		$query2 = "update about_company
					set branch='$Branch',branch_amharic='$Branch_Amharic',
					working_hours='$Working_Hours',working_hours_amharic='$Working_Hours_Amharic'
					where ID='$About_Company_ID'";

		$result2 = mysqli_query($this->getDbc(),$query2);


		//3 update the payment status
		$query3 = "update payment_status
					set Expiration_Date='$Registration_Expiration_Date',Registration_Type='$Registration_Type'
					where ID='$Payment_Status_ID'";
		$result3 = mysqli_query($this->getDbc(),$query3);

		//4 update the company service
		$query4 = "update company_product_service
				set Product_Service='$Product_Service',Product_Service_Amharic='$Product_Service_Amharic'
				where ID='$Company_Service_ID'";
		$result4 = mysqli_query($this->getDbc(),$query4);

		//5 update company ownership
		$query5 = "update company_ownership
					set Ownership_ID='$Company_Type_ID'
					where ID='$Company_Ownership_ID'";
		$result5 = mysqli_query($this->getDbc(),$query5);



		//update company category
		$query6 = "update company_category
					set Category_ID='$Category_ID'
					where ID='$Company_Category_ID'";
		$result6 = mysqli_query($this->getDbc(),$query6);

		//update the contact
		$query7 = "update contact
					set Email='$Email',House_No='$House_No',FAX='$FAX',
					POBOX='$POBOX',Telephone='$Telephone'
					where ID='$Contact_ID'";
		$result7 = mysqli_query($this->getDbc(),$query7);

		//update the address building floor

		$query8 = "update address_building_floor
					set Building_ID='$Building_ID',Floor='$Floor'
					where ID='$Address_Building_Floor_ID'";

		$result8 = mysqli_query($this->getDbc(),$query8);


		//commit the transaction
		$query_last = "COMMIT";
		mysqli_query($this->getDbc(),$query_last);
		return TRUE;

	}


	//gets the address id

	function Get_Company_Address($Company_ID){
		$query = "select COM_ADDR.Address_ID
					from company_address as COM_ADDR
					where COM_ADDR.Company_ID='$Company_ID'";

		$address_id = mysqli_query($this->getDbc(),$query);

		$address_id = mysqli_fetch_array($address_id,MYSQLI_ASSOC);

		$address_id = $address_id['Address_ID'];

		if($address_id){
			return $address_id;
		}
		else{
			return null;
		}
 	}

	function Get_Company_Address_ID($Company_ID){
		$query = "select  COM_ADDR.ID
					from Company_Address as COM_ADDR
					where COM_ADDR.Company_ID = '$Company_ID'";

		$Company_Address_ID = mysqli_query($this->getDbc(),$query);

		$Company_Address_ID = mysqli_fetch_array($Company_Address_ID,MYSQLI_ASSOC);

		$Company_Address_ID=  $Company_Address_ID['ID'];
		if($Company_Address_ID){
			return $Company_Address_ID;
		}
		else{
			return null;
		}

	}

	function Get_Address_Direction_ID($Address_ID){

		$query = "select  ADDR_DIR.ID
					from address_direction as ADDR_DIR
					where ADDR_DIR.Address_ID = '$Address_ID'";

		$Address_Direction_ID = mysqli_query($this->getDbc(),$query);

		$Address_Direction_ID = mysqli_fetch_array($Address_Direction_ID,MYSQLI_ASSOC);

		$Address_Direction_ID = $Address_Direction_ID['ID'];

		if($Address_Direction_ID){
			return $Address_Direction_ID;
		}
		else{
			return null;
		}

	}

	function Get_Address_Place_ID($Address_ID){

		$query = "select ADDR_P.ID
					from Address_Place as ADDR_P
					where ADDR_P.Address_ID='$Address_ID'";

		$Address_Place_ID = mysqli_query($this->getDbc(),$query);

		$Address_Place_ID = mysqli_fetch_array($Address_Place_ID,MYSQLI_ASSOC);

		$Address_Place_ID = $Address_Place_ID['ID'];

		if($Address_Place_ID){
			return $Address_Place_ID;
		}
		else{
			return null;
		}


	}


	//gets the address id from building address
	function Get_Address_ID_From_Building_Address($Building_ID){

		$query = "select Address_ID as ID from building_address
					where Building_ID = '$Building_ID'";

		$Address_ID  = mysqli_query($this->getDbc(),$query);
		$Address_ID = mysqli_fetch_array($Address_ID,MYSQLI_ASSOC);
		$Address_ID = $Address_ID['ID'];

		if($Address_ID){
			return $Address_ID;
		}
		else{
			return null;
		}
	}

	//get the building address id
	function Get_Building_Address_ID($Building_ID){

		$query = "select ID from building_address
					where Building_ID = '$Building_ID'";

		$Address_Bul_ID  = mysqli_query($this->getDbc(),$query);
 		$Address_Bul_ID = mysqli_fetch_array($Address_Bul_ID,MYSQLI_ASSOC);
		$Address_Bul_ID = $Address_Bul_ID['ID'];

		if($Address_Bul_ID){
			return $Address_Bul_ID;
		}
		else{
			return null;
		}

	}


	function Get_Address_Building_Floor_ID($Address_ID){

		$query = "select ADDR_BUL_F.ID
					from address_building_floor as ADDR_BUL_F
					where ADDR_BUL_F.Address_ID = '$Address_ID'";

		$Address_Bul_F  = mysqli_query($this->getDbc(),$query);

		$Address_Bul_F = mysqli_fetch_array($Address_Bul_F,MYSQLI_ASSOC);

		$Address_Bul_F_ID = $Address_Bul_F['ID'];

		if($Address_Bul_F_ID){
			return $Address_Bul_F_ID;
		}
		else{
			return null;
		}


	}

	function Get_Address_Contact_ID($Address_ID){

		$query = "SELECT ADDR_CON_ID.ID
				from Address_Contact as ADDR_CON_ID
				where ADDR_CON_ID.Address_ID = '$Address_ID'";

		$Address_Contact_ID = mysqli_query($this->getDbc(),$query);

		$Address_Contact_ID = mysqli_fetch_array($Address_Contact_ID,MYSQLI_ASSOC);

		$Address_Contact_ID = $Address_Contact_ID['ID'];

		if($Address_Contact_ID){
			return $Address_Contact_ID;
		}
		else {
			return null;
		}

	}

	function Update_Address($belongs,$Address_ID){


		$query = "";

		if($belongs == Belong::COMPANY_WITH_BUILDING){
			$query="update address
					set Belong_To='COMPANY_WITH_BUILDING'
					where ID='$Address_ID';";
		}

		else if($belongs == Belong::COMPANY_WITH_OUT_BUILDING){
			$query="update address
					set Belong_To='COMPANY_WITH_OUT_BUILDING'
					where ID='$Address_ID';";
		}

		$updated = mysqli_query($this->getDbc(),$query);

		return TRUE;

	}



	function Edit_Company_With_Out_Building_To_Building(
		$Company_Name,$Company_Name_Amharic,
		$Category_ID,
		$Company_Type_ID,
		$Branch,$Branch_Amharic,$Working_Hours,$Working_Hours_Amharic,
		$Product_Service,$Product_Service_Amharic,
		$Registration_Expiration_Date,$Registration_Type,
		$Building_ID,$Floor,
		Contact $Contact,
		$Company_ID,$About_Company_ID,$Payment_Status_ID,$Company_Service_ID,
		$Company_Ownership_ID,$Company_Category_ID,$Contact_ID,
		$Direction_ID,$Place_ID
	){
		//contacts
		$Email = $Contact->getEmail();
		$House_No = $Contact->getHouseNo();
		$FAX = $Contact->getFAX();
		$POBOX = $Contact->getPOBOX();
		$Telephone = $Contact->getTelephone();


		//start transaction
		$query = "START TRANSACTION";
		mysqli_query($this->getDbc(),$query);


		//1 update the company
		$query1 = "update company
					set name='$Company_Name',name_amharic='$Company_Name_Amharic'
					where ID='$Company_ID'";

		$result1 = mysqli_query($this->getDbc(),$query1);

		//2 udate the about company
		$query2 = "update about_company
					set branch='$Branch',branch_amharic='$Branch_Amharic',
					working_hours='$Working_Hours',working_hours_amharic='$Working_Hours_Amharic'
					where ID='$About_Company_ID'";

		$result2 = mysqli_query($this->getDbc(),$query2);


		//3 update the payment status
		$query3 = "update payment_status
					set Expiration_Date='$Registration_Expiration_Date',Registration_Type='$Registration_Type'
					where ID='$Payment_Status_ID'";
		$result3 = mysqli_query($this->getDbc(),$query3);

		//4 update the company service
		$query4 = "update company_product_service
				set Product_Service='$Product_Service',Product_Service_Amharic='$Product_Service_Amharic'
				where ID='$Company_Service_ID'";
		$result4 = mysqli_query($this->getDbc(),$query4);

		//5 update company ownership
		$query5 = "update company_ownership
					set Ownership_ID='$Company_Type_ID'
					where ID='$Company_Ownership_ID'";
		$result5 = mysqli_query($this->getDbc(),$query5);



		//update company category
		$query6 = "update company_category
					set Category_ID='$Category_ID'
					where ID='$Company_Category_ID'";
		$result6 = mysqli_query($this->getDbc(),$query6);

		//update the contact
		$query7 = "update contact
					set Email='$Email',House_No='$House_No',FAX='$FAX',
					POBOX='$POBOX',Telephone='$Telephone'
					where ID='$Contact_ID'";
		$result7 = mysqli_query($this->getDbc(),$query7);


		//get the address id
 		$Address_ID = $this->Get_Company_Address($Company_ID);
		echo($Address_ID);

		//update the address to Company_With_Building

		 $this->Update_Address(Belong::COMPANY_WITH_BUILDING,$Address_ID);


		//add the building on address building floor
 		$query8 = "INSERT INTO Address_Building_Floor(Address_ID,Building_ID,Floor) VALUES('$Address_ID','$Building_ID','$Floor')";
		$result8 = mysqli_query($this->getDbc(),$query8);

		//get address_direction_ID
 		$Address_Direction_ID = $this->Get_Address_Direction_ID($Address_ID);
		echo($Address_Direction_ID);


 		//delete address direction
 		$query9  = "DELETE from address_direction where ID ='$Address_Direction_ID'";
		$result9 = mysqli_query($this->getDbc(),$query9);

		//delete the direction
		$query10 = "Delete from Direction where ID='$Direction_ID'";
		$result10 = mysqli_query($this->getDbc(),$query10);


		//get Address_Place_ID
		$Address_Place_ID = $this->Get_Address_Place_ID($Address_ID);
		echo($Address_Place_ID);

 		//delete the address place
		$query11 = "Delete from Address_Place where ID='$Address_Place_ID'";
		$result11 = mysqli_query($this->getDbc(),$query11);

		//delete the place
		$query12 = "Delete from Place where ID='$Place_ID'";
		$result12 = mysqli_query($this->getDbc(),$query12);

		$query = "COMMIT";
		mysqli_query($this->getDbc(),$query);
		return TRUE;


	}



	function Edit_Company_With_Building_To_Not_Building(
		$Company_Name,$Company_Name_Amharic,
		$Category_ID,
		$Company_Type_ID,
		$Branch,$Branch_Amharic,$Working_Hours,$Working_Hours_Amharic,
		$Product_Service,$Product_Service_Amharic,
		$Registration_Expiration_Date,$Registration_Type,
 		Contact $Contact,
		Place $place,$Direction,$Direction_Amharic,
		$Company_ID,$About_Company_ID,$Payment_Status_ID,$Company_Service_ID,
		$Company_Ownership_ID,$Company_Category_ID,$Contact_ID

	){

		//contacts
		$Email = $Contact->getEmail();
		$House_No = $Contact->getHouseNo();
		$FAX = $Contact->getFAX();
		$POBOX = $Contact->getPOBOX();
		$Telephone = $Contact->getTelephone();


		//start transaction
		$query = "START TRANSACTION";
		mysqli_query($this->getDbc(),$query);


		//1 update the company
		$query1 = "update company
					set name='$Company_Name',name_amharic='$Company_Name_Amharic'
					where ID='$Company_ID'";

		$result1 = mysqli_query($this->getDbc(),$query1);

		//2 About the about company
		$query2 = "update about_company
					set branch='$Branch',branch_amharic='$Branch_Amharic',
					working_hours='$Working_Hours',working_hours_amharic='$Working_Hours_Amharic'
					where ID='$About_Company_ID'";

		$result2 = mysqli_query($this->getDbc(),$query2);


		//3 update the payment status
		$query3 = "update payment_status
					set Expiration_Date='$Registration_Expiration_Date',Registration_Type='$Registration_Type'
					where ID='$Payment_Status_ID'";
		$result3 = mysqli_query($this->getDbc(),$query3);

		//4 update the company service
		$query4 = "update company_product_service
				set Product_Service='$Product_Service',Product_Service_Amharic='$Product_Service_Amharic'
				where ID='$Company_Service_ID'";
		$result4 = mysqli_query($this->getDbc(),$query4);

		//5 update company ownership
		$query5 = "update company_ownership
					set Ownership_ID='$Company_Type_ID'
					where ID='$Company_Ownership_ID'";
		$result5 = mysqli_query($this->getDbc(),$query5);



		//update company category
		$query6 = "update company_category
					set Category_ID='$Category_ID'
					where ID='$Company_Category_ID'";
		$result6 = mysqli_query($this->getDbc(),$query6);

		//update the contact
		$query7 = "update contact
					set Email='$Email',House_No='$House_No',FAX='$FAX',
					POBOX='$POBOX',Telephone='$Telephone'
					where ID='$Contact_ID'";
		$result7 = mysqli_query($this->getDbc(),$query7);



		//get the address id
		$Address_ID = $this->Get_Company_Address($Company_ID);

		//update the address to company with out building

		$this->Update_Address(Belong::COMPANY_WITH_OUT_BUILDING,$Address_ID);


		//add the place

		//add place
		$Region_ID = $place->getRegionID();
		$City_ID =$place->getCityID();
		$SubCity_ID =$place->getSubCityID();
		$Wereda_ID = $place->getWeredaID();
		$Sefer_ID =$place->getSeferID();
		$Street_ID = $place->getStreetID();

 		$query8 = "INSERT INTO Place (Region,City,Sub_City,Wereda,Sefer,Street)
 				VALUE ('$Region_ID','$City_ID','$SubCity_ID','$Wereda_ID','$Sefer_ID','$Street_ID')";
 		$result8 = mysqli_query($this->getDbc(),$query8);
 		//get the id of the added place
		$added_place_id = $this->getDb()->get_last_id();
 		//add address place relation
		$query9 = "INSERT INTO Address_Place (Address_ID,Place_ID) VALUES('$Address_ID','$added_place_id')";
		$result9 = mysqli_query($this->getDbc(),$query9);


		 	//add direction
		$query = "INSERT INTO Direction (Direction,Direction_Amharic) VALUES('$Direction','$Direction_Amharic')";
		$result12 = mysqli_query($this->getDbc(),$query);

		$added_direction_id = $this->getDb()->get_last_id();

		//add address direction
		$query = "INSERT INTO Address_Direction (Address_ID,Direction_ID) VALUES('$Address_ID',
						'$added_direction_id')";

		$result13 = mysqli_query($this->getDbc(),$query);


		//get the id of the address_building_floor_id
		$Address_Building_Floor_ID = $this->Get_Address_Building_Floor_ID($Address_ID);


		//delete the address_building_floor
		$query13 = "DELETE from address_building_floor where ID='$Address_Building_Floor_ID'";
		$result13 = mysqli_query($this->getDbc(),$query13);


		$query = "COMMIT";
		mysqli_query($this->getDbc(),$query);
		return TRUE;



	}


	function Add_Company_With_Out_Building(
		$Company_Name,$Company_Name_Amharic,
		$Category_ID,
		$Company_Type_ID,
		$Branch,$Branch_Amharic,$Working_Hours,$Working_Hours_Amharic,
		$Product_Service,$Product_Service_Amharic,
		$Registration_Expiration_Date,$Registration_Type,
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
		$query = "INSERT INTO Payment_Status(Company_ID,Expiration_Date,Registration_Type) VALUES ('$added_company_id','$Registration_Expiration_Date','$Registration_Type')";
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



	function Edit_Company_With_Out_Building(
		$Company_Name,$Company_Name_Amharic,
		$Category_ID,
		$Company_Type_ID,
		$Branch,$Branch_Amharic,$Working_Hours,$Working_Hours_Amharic,
		$Product_Service,$Product_Service_Amharic,
		$Registration_Expiration_Date,$Registration_Type,
		Contact $Contact,
		Place $place,
		$Direction,
		$Direction_Amharic,
		$Company_ID,$About_Company_ID,$Payment_Status_ID,$Company_Service_ID,
		$Company_Ownership_ID,$Company_Category_ID,$Contact_ID,
		$Direction_ID,$Place_ID
	){

		//contacts
		$Email = $Contact->getEmail();
		$House_No = $Contact->getHouseNo();
		$FAX = $Contact->getFAX();
		$POBOX = $Contact->getPOBOX();
		$Telephone = $Contact->getTelephone();

		//places
		$Region = $place->getRegionID();
		$City = $place->getCityID();
		$Sub_City = $place->getSubCityID();
		$Wereda = $place->getWeredaID();
		$Sefer = $place->getSeferID();
		$Street = $place->getStreetID();



		//start transaction
		$query = "START TRANSACTION";
		mysqli_query($this->getDbc(),$query);


		//1 update the company
 		$query1 = "update company
					set name='$Company_Name',name_amharic='$Company_Name_Amharic'
					where ID='$Company_ID'";

		$result1 = mysqli_query($this->getDbc(),$query1);

		//2 udate the about company
		$query2 = "update about_company
					set branch='$Branch',branch_amharic='$Branch_Amharic',
					working_hours='$Working_Hours',working_hours_amharic='$Working_Hours_Amharic'
					where ID='$About_Company_ID'";

		$result2 = mysqli_query($this->getDbc(),$query2);


		//3 update the payment status
		$query3 = "update payment_status
					set Expiration_Date='$Registration_Expiration_Date',Registration_Type='$Registration_Type'
					where ID='$Payment_Status_ID'";
		$result3 = mysqli_query($this->getDbc(),$query3);

		//4 update the company service
		$query4 = "update company_product_service
				set Product_Service='$Product_Service',Product_Service_Amharic='$Product_Service_Amharic'
				where ID='$Company_Service_ID'";
		$result4 = mysqli_query($this->getDbc(),$query4);

		//5 update company ownership
		$query5 = "update company_ownership
					set Ownership_ID='$Company_Type_ID'
					where ID='$Company_Ownership_ID'";
		$result5 = mysqli_query($this->getDbc(),$query5);



		//update company category
		$query6 = "update company_category
					set Category_ID='$Category_ID'
					where ID='$Company_Category_ID'";
		$result6 = mysqli_query($this->getDbc(),$query6);


		//update the contact
		$query7 = "update contact
					set Email='$Email',House_No='$House_No',FAX='$FAX',
					POBOX='$POBOX',Telephone='$Telephone'
					where ID='$Contact_ID'";
		$result3 = mysqli_query($this->getDbc(),$query7);


		//update the direction
 		$query8 = "update Direction
					set Direction='$Direction',Direction_Amharic='$Direction_Amharic'
					where ID='$Direction_ID'";
		$result8 = mysqli_query($this->getDbc(),$query8);

		//update the place

		$query9 = "update Place
					set Region='$Region',City='$City',Sub_City='$Sub_City',
						Wereda='$Wereda',Sefer='$Sefer',Street='$Street'
					where ID='$Place_ID'";

		$result9 = mysqli_query($this->getDbc(),$query9);

		//commit the transaction
		$query_last = "COMMIT";
		mysqli_query($this->getDbc(),$query_last);
		return TRUE;

		 echo($Registration_Type);
		exit();



	}

	function Delete_Company_With_Out_Building($Company_ID,
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


		//delete the company
		$query14 = "DELETE from Company WHERE ID='$Company_ID'";
		$result14 = mysqli_query($this->getDbc(),$query14);


		if($result1 AND $result2 AND $result3 AND $result4 AND $result5 AND $result6
			AND $result7 AND $result8 AND $result9 AND $result10 AND $result11 AND $result12 AND
			$result13 AND $result14){
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


	function Delete_Company_With_Building($Company_ID,
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


		//delete the company
		$query11 = "DELETE from Company WHERE ID='$Company_ID'";
		$result11 =mysqli_query($this->getDbc(),$query11);

		if($result1 AND $result2 AND $result3 AND $result4 AND $result5 AND $result6
			AND $result7 AND $result8 AND $result9 AND $result10 AND $result11 ){
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



	function Get_Company_With_Out_Building( $company_id){

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


	function Get_Company_With_Building($company_id){

		$query = "select *
from
		(select  C.ID as Company_ID,C.Name as Company_Name,C.Name_Amharic as Company_Name_Amharic,C.Registration_Date
		 from company as C
		 where ID = '$company_id')as com_spec
 		inner join
 		(select   ABT_COM.ID as About_Company_ID,ABT_COM.Branch as Branch,ABT_COM.Branch_Amharic as Branch_Amharic,ABT_COM.Working_Hours ,ABT_COM.Working_Hours_Amharic
		 from about_company as ABT_COM
		 where Company_ID='$company_id') as abt_spec
 		inner join
		(select  COM_PRO_SER.ID as Company_Service_ID,COM_PRO_SER.Product_Service,COM_PRO_SER.Product_Service_Amharic
		from company_product_service as COM_PRO_SER
		where COM_PRO_SER.Company_ID = '$company_id'
 		)as pro_ser_spec
 		inner join
 		(select PS.ID as Payment_Status_ID, PS.Expiration_Date,PS.Registration_Type
		from payment_status as PS
		where PS.Company_ID = '$company_id') as pay_spec
 		inner join
		(select C_CAT.ID as Company_Category_ID, C_CAT.Category_ID
						from company_category as C_CAT
						where C_CAT.Company_ID = '$company_id') as cat_spec

		inner join
		(select COM_OWN.ID as Company_Ownership_ID, COM_OWN.Ownership_ID as Company_Type_ID
							from company_ownership as COM_OWN
							where COM_OWN.Company_ID = '$company_id'
							) as com_type_spec
 		inner join
 				(select CON.ID as Contact_ID,CON.Email,CON.House_No,CON.FAX,CON.POBOX,CON.Telephone
	  from contact as CON
	  where CON.ID = ( select ADDR_CON.Contact_ID
						from address_contact as ADDR_CON
					    where ADDR_CON.Address_ID = ( select COM_ADDR.Address_ID
													  from company_address as COM_ADDR
													  where COM_ADDR.Company_ID = '$company_id'
 									))) as con_spec
 		inner join
				(select ADDR_BUL_FLOOR.ID Address_Building_Floor_ID, ADDR_BUL_FLOOR.Floor,ADDR_BUL_FLOOR.Building_ID as Building_ID
				from address_building_floor as ADDR_BUL_FLOOR
				where ADDR_BUL_FLOOR.Address_ID = (select COM_ADDR.Address_ID
													  from company_address as COM_ADDR
													  where COM_ADDR.Company_ID = '$company_id')) as bul_floor_spec";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return null;
		}
	}


	function Get_Company_For_Delete($Company_ID){


		$query = "select *
from (select COM.Name as Company_Name, COM.Name_Amharic as Company_Name_Amharic
 		from company as COM
		where COM.ID = '$Company_ID') as com_spec

	inner join

	(select ABT_COM.Branch,ABT_COM.Branch_Amharic,ABT_COM.Working_Hours,ABT_COM.Working_Hours_Amharic
	from about_company as ABT_COM
	where ABT_COM.Company_ID = '$Company_ID') as abt_spec

	inner join

	(select PS.Expiration_Date
	from payment_status as PS
	where PS.Company_ID = '$Company_ID') as pay_spec

	inner join

	(select COM_PRO_SER.Product_Service,COM_PRO_SER.Product_Service_Amharic
	from company_product_service as COM_PRO_SER
	where COM_PRO_SER.Company_ID = '$Company_ID') as com_pro_ser

	inner join

	(select CAT.Name as Category,CAT.Name_Amharic as Category_Amharic
	from category as CAT
	where CAT.ID = (select COM_CAT.Category_ID
					from company_category as COM_CAT
					where COM_CAT.Company_ID = '$Company_ID')) as cat_spec


";

		$result = mysqli_query($this->getDbc(),$query);

		if($result){
			return $result;
		}
		else{
			return null;
		}

	}
































    /* ---------------- For operators -------------------- */




    //this will return the company list from company table
    function Get_Company_For_Search_Listing($Name_Start = null){

        $Word_Start = "A";

        if($Name_Start != null){
            $Word_Start = $Name_Start;
        }
        $query = "select COM_ID as company_id,COM_NAME as company_name,COM_Name_Amharic as company_name_amharic, COM_REG_DATE as registration_date
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








    /* --------------- for search ------------------ */

    function Get_Company_For_Search( $company_id){

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

		(select PS.ID as Payment_Status_ID,PS.Expiration_Date
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



    function getBuilding($building_id){
        $building = "Unknown";
        $query = "SELECT *
                    FROM building
                    WHERE id ='$building_id'";

        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            while($results = mysqli_fetch_array($result,MYSQL_ASSOC)){
                $building = $results['Name'];
            }
        }
        else{
            $building = "Error getting info";
        }
        return $building;
    }

    function getStreet($street_id){
        $street = "Unknown";
        $query = "SELECT *
                    FROM street
                    WHERE id ='$street_id'";

        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            while($results = mysqli_fetch_array($result,MYSQL_ASSOC)){
                $street = $results['Name'];
            }
        }
        else{
            $street = "Error getting info";
        }
        return $street;
    }


    function getCategory($category_id){
        $category = "Unknown";
        $query = "SELECT *
                    FROM category
                    WHERE id ='$category_id'";

        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            while($results = mysqli_fetch_array($result,MYSQL_ASSOC)){
                $category = $results['Name'];
            }
        }
        else{
            $category = "Error getting info";
        }
        return $category;
    }



    function getOwnershipType($type_id){
        $owner = "Unknown";
        $query = "SELECT *
                    FROM ownership
                    WHERE id ='$type_id'";

        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            while($results = mysqli_fetch_array($result,MYSQL_ASSOC)){
                $owner = $results['Name'];
            }
        }
        else{
            $owner = "Error getting info";
        }
        return $owner;
    }

    function getPlaceID($address_id){
        $placeid = "Unknown";
        $query = "SELECT *
                    FROM address_place
                    WHERE Address_ID ='$address_id'";

        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            while($results = mysqli_fetch_array($result,MYSQL_ASSOC)){
                $placeid = $results['Place_ID'];
            }
        }
        else{
            $placeid = "Error getting info";
        }
        return $placeid;
    }

    function getPlace($place_id){
        $query = "SELECT *
                    FROM place
                    WHERE ID ='$place_id'";

        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            return $result;
        }
        return "Error";
    }



    function getDirectionID($address_id){
        $directionid = "Unknown";
        $query = "SELECT *
                    FROM address_direction
                    WHERE Address_ID ='$address_id'";

        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            while($results = mysqli_fetch_array($result,MYSQL_ASSOC)){
                $directionid = $results['Direction_ID'];
            }
        }
        else{
            $directionid = "Error getting info";
        }
        return $directionid;
    }

    function getDirection($direction_id){
        $query = "SELECT *
                    FROM direction
                    WHERE ID ='$direction_id'";

        $result = mysqli_query($this->getDbc(),$query);

        if($result){
            return $result;
        }
        return "Error";
    }
}
