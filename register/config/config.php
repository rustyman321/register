<?php

$svname = "localhost";
$uname = "root";
$pass = "";
$dbname = "exam";

try
{

    $conn = new PDO("mysql:host={$svname}", $uname, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
	$conn->query("use $dbname");
	$conn->query("CREATE TABLE IF NOT EXISTS guest_registration(
    	personal_id bigint(7) NOT NULL,
    	PRIMARY KEY (personal_id), 
    	title varchar(5), 
    	first_name varchar (50) not null, 
    	last_name varchar (50) not null, 
    	country_code   varchar(3) not null,
    	sex varchar(1) not null,
    	comments varchar(500)
    	)");
	$conn->query("CREATE TABLE IF NOT EXISTS country(
    	id int NOT NULL AUTO_INCREMENT,
    	PRIMARY KEY (id),
    	country_code   varchar(3) not null, 
    	country_name varchar( 255 ) not null
    	)");
 	$conn->query("INSERT INTO `country`(`id`,`country_code`, `country_name`)
    	VALUES 
    	('1','PHL','PHILIPPINES'),
    	('2','USA', 'UNITED STATES OF AMERICA'),
    	('3','JPN', 'JAPAN') ON DUPLICATE KEY UPDATE country_name = country_name"); 
   
}
catch(PDOException $e)
{

    echo $e->getMessage();

}

include_once 'db_action.php';
$act = new ACT ($conn);