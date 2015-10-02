<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 9/22/2015
 * Time: 3:07 AM
 */

class Direction {

	private $Direction;
	private $Direction_Amharic;

	function __construct($direction,$direction_amharic){

		$this->Direction = $direction;
		$this->Direction_Amharic =$direction_amharic;

	}

	/**
	 * @return mixed
	 */
	public function getDirection()
	{
		return $this->Direction;
	}

	/**
	 * @param mixed $Direction
	 */
	public function setDirection($Direction)
	{
		$this->Direction = $Direction;
	}

	/**
	 * @return mixed
	 */
	public function getDirectionAmharic()
	{
		return $this->Direction_Amharic;
	}

	/**
	 * @param mixed $Direction_Amharic
	 */
	public function setDirectionAmharic($Direction_Amharic)
	{
		$this->Direction_Amharic = $Direction_Amharic;
	}


} 