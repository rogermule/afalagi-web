<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 9/24/2015
 * Time: 1:07 AM
 */

class Event {

	private $Name;
	private $Name_Amharic;
	private $About_Event;
	private $About_Event_Amharic;
	private $Event_Start;
	private $Event_End;


	function __construct($name,$name_amharic,$about_event,$about_event_amharic,$event_start,$event_end){

		$this->Name = $name;
		$this->Name_Amharic = $name_amharic;
		$this->About_Event = $about_event;
		$this->About_Event_Amharic = $about_event_amharic;
		$this->Event_Start = $event_start;
		$this->Event_End = $event_end;

	}

	/**
	 * @return mixed
	 */
	public function getAboutEvent()
	{
		return $this->About_Event;
	}

	/**
	 * @param mixed $About_Event
	 */
	public function setAboutEvent($About_Event)
	{
		$this->About_Event = $About_Event;
	}

	/**
	 * @return mixed
	 */
	public function getAboutEventAmharic()
	{
		return $this->About_Event_Amharic;
	}

	/**
	 * @param mixed $About_Event_Amharic
	 */
	public function setAboutEventAmharic($About_Event_Amharic)
	{
		$this->About_Event_Amharic = $About_Event_Amharic;
	}



	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->Name;
	}

	/**
	 * @param mixed $Name
	 */
	public function setName($Name)
	{
		$this->Name = $Name;
	}

	/**
	 * @return mixed
	 */
	public function getNameAmharic()
	{
		return $this->Name_Amharic;
	}

	/**
	 * @param mixed $Name_Amharic
	 */
	public function setNameAmharic($Name_Amharic)
	{
		$this->Name_Amharic = $Name_Amharic;
	}

	/**
	 * @return mixed
	 */
	public function getEventStart()
	{
		return $this->Event_Start;
	}

	/**
	 * @param mixed $Event_Start
	 */
	public function setEventStart($Event_Start)
	{
		$this->Event_Start = $Event_Start;
	}

	/**
	 * @return mixed
	 */
	public function getEventEnd()
	{
		return $this->Event_End;
	}

	/**
	 * @param mixed $Event_End
	 */
	public function setEventEnd($Event_End)
	{
		$this->Event_End = $Event_End;
	}






} 