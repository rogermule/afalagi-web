<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 9/15/2015
 * Time: 10:07 PM
 */

class Category {

	private $Category_Name;
	private $Category_Name_Amharic;
	private $General_Category;

	function __construct($category_name,$category_name_amharic,$general_category = null){

		$this->Category_Name = $category_name;
		$this->Category_Name_Amharic = $category_name_amharic;
 		$this->General_Category = $general_category;

	}

	/**
	 * @return null
	 */
	public function getGeneralCategory()
	{
		return $this->General_Category;
	}

	/**
	 * @param null $General_Category
	 */
	public function setGeneralCategory($General_Category)
	{
		$this->General_Category = $General_Category;
	}

	/**
	 * @return mixed
	 */
	public function getCategoryName()
	{
		return $this->Category_Name;
	}

	/**
	 * @param mixed $Category_Name
	 */
	public function setCategoryName($Category_Name)
	{
		$this->Category_Name = $Category_Name;
	}

	/**
	 * @return mixed
	 */
	public function getCategoryNameAmharic()
	{
		return $this->Category_Name_Amharic;
	}

	/**
	 * @param mixed $Category_Name_Amharic
	 */
	public function setCategoryNameAmharic($Category_Name_Amharic)
	{
		$this->Category_Name_Amharic = $Category_Name_Amharic;
	}


} 