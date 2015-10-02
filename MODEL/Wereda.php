<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 9/10/2015
 * Time: 7:46 PM
 */

class Wereda {

	private $Wereda;
	private $Wereda_Amharic;

	function __construct($wereda,$wereda_amharic){
		$this->Wereda = $wereda;
		$this->Wereda_Amharic = $wereda_amharic;
	}

	/**
	 * @return mixed
	 */
	public function getWereda()
	{
		return $this->Wereda;
	}

	/**
	 * @param mixed $Wereda
	 */
	public function setWereda($Wereda)
	{
		$this->Wereda = $Wereda;
	}

	/**
	 * @return mixed
	 */
	public function getWeredaAmharic()
	{
		return $this->Wereda_Amharic;
	}

	/**
	 * @param mixed $Wereda_Amharic
	 */
	public function setWeredaAmharic($Wereda_Amharic)
	{
		$this->Wereda_Amharic = $Wereda_Amharic;
	}


} 