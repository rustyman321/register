<?php

class ACT
{
	private $db;
	public $cntrs;

	function __construct($conn)
	{
		$this->db = $conn;
	}

	public function register($pin, $fname, $lname, $title, $citizenship, $gender, $comment)
	{
		try
		{
			$reg_query = $this->db->prepare("INSERT INTO `guest_registration` (
			`personal_id`, 
			`title`, 
			`first_name`, 
			`last_name`, 
			`country_code`, 
			`sex`, 
			`comments`) 
			VALUES 
			(:pin,
			 :title,
			 :fname,
			 :lname,
			 :citizenship,
			 :gender,
			 :comment)");
			  
              
			$reg_query->bindparam(":pin", $pin);
			$reg_query->bindparam(":title", $title);
			$reg_query->bindparam(":fname", $fname);
			$reg_query->bindparam(":lname", $lname);
			$reg_query->bindparam(":citizenship", $citizenship);
			$reg_query->bindparam(":gender", $gender);
			$reg_query->bindparam(":comment", $comment);
			$reg_query->execute();

			return $reg_query;

		}

		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

	}

	public function validate($pin)
	{

		try
		{
			$validate_query = $this->db->prepare("SELECT * FROM `guest_registration` where personal_id = :pin");
			$validate_query->bindparam(":pin", $pin);
			$validate_query->execute();
			if($validate_query->rowCount() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		catch(PDOException $e)
		{
			echo $e->getMessage();
		}

	}

	public function get_countries()
	{
		try
		{
			$get_countries_query = $this->db->prepare("SELECT * from country");
			$get_countries_query->execute();
			$cntrs_row=$get_countries_query->fetchAll(PDO::FETCH_ASSOC);
			$this->cntrs = $cntrs_row;
			return $get_countries_query;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}




}

