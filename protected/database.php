<?php

// This is the database connection configuration.
return array(
	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'mysql:host=localhost;dbname=limiteds_ct490',
	'emulatePrepare' => true,
	'username' => 'limiteds_ct490',
	'password' => '049567727',
	'charset' => 'utf8',
	
);