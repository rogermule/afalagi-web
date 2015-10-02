<?php


class Street {

	private $Street_Name;
	private $Street_Name_Amharic;
	private $About_Street;
	private $About_Street_Amharic;

	function __construct($street_name,$street_name_amharic,$about_street = null,$about_street_amharic = null){

		$this->Street_Name = $street_name;
		$this->Street_Name_Amharic = $street_name_amharic;
 		$this->About_Street = $about_street;
        $this->About_Street_Amharic = $about_street_amharic;

	}

	/**
	 * @return null
	 */
	public function getAboutStreet()
	{
		return $this->About_Street;
	}

	/**
	 * @param null $About_Street
	 */
	public function setAboutStreet($About_Street)
	{
		$this->About_Street = $About_Street;
	}

	/**
	 * @return null
	 */
	public function getAboutStreetAmharic()
	{
		return $this->About_Street_Amharic;
	}

	/**
	 * @param null $About_Street_Amharic
	 */
	public function setAboutStreetAmharic($About_Street_Amharic)
	{
		$this->About_Street_Amharic = $About_Street_Amharic;
	}

	/**
	 * @return mixed
	 */
	public function getStreetName()
	{
		return $this->Street_Name;
	}

	/**
	 * @param mixed $Street_Name
	 */
	public function setStreetName($Street_Name)
	{
		$this->Street_Name = $Street_Name;
	}

	/**
	 * @return mixed
	 */
	public function getStreetNameAmharic()
	{
		return $this->Street_Name_Amharic;
	}

	/**
	 * @param mixed $Street_Name_Amharic
	 */
	public function setStreetNameAmharic($Street_Name_Amharic)
	{
		$this->Street_Name_Amharic = $Street_Name_Amharic;
	}




} 