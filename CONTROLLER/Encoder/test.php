<?php
/**
 * Created by PhpStorm.
 * User: Natnael Zeleke
 * Date: 12/13/2015
 * Time: 9:07 AM
 */

class test extends User_Controller{



	//add companies with socialization and with building
	function Add_Company_With_Building_With_Specialization($specialization )
	{


		$query = "insert into company_specialization(Company_ID,Spec_1,spec_2,Spec_3,Spec_4,Spec_5) values('1',$specialization[0],$specialization[1],$specialization[2],'$specialization[3]',$specialization[4])";
		$result_spec = mysqli_query($this->getDbc(), $query);

		if ($result_spec) {
			echo("The specilization is added");
		} else {
			echo("The specliation is not added");

			echo($specialization[0]);
			echo("->");
			echo($specialization[1]);
			echo("->");
			echo($specialization[2]);
			echo("->");
			echo($specialization[3]);
			echo("->");
			echo($specialization[4]);
			echo("->");

		}


		if ( $result_spec) {

			$query = "COMMIT";
			mysqli_query($this->getDbc(), $query);
			return TRUE;


		} else {
			$query = "ROLLBACK";
			mysqli_query($this->getDbc(), $query);
			echo("Rolled back");
//			return FALSE;
			exit();

		}
	}

	}