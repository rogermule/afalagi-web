<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 9/10/2015
 * Time: 8:28 PM
 */

class Sefer {

	private $Sefer;
	private $Sefer_Amharic;

	function __construct($sefer,$sefer_amharic){
		$this->Sefer = $sefer;
		$this->Sefer_Amharic = $sefer_amharic;
	}

	/**
	 * @return mixed
	 */
	public function getSefer()
	{
		return $this->Sefer;
	}

	/**
	 * @param mixed $Sefer
	 */
	public function setSefer($Sefer)
	{
		$this->Sefer = $Sefer;
	}

	/**
	 * @return mixed
	 */
	public function getSeferAmharic()
	{
		return $this->Sefer_Amharic;
	}

	/**
	 * @param mixed $Sefer_Amharic
	 */
	public function setSeferAmharic($Sefer_Amharic)
	{
		$this->Sefer_Amharic = $Sefer_Amharic;
	}


} 