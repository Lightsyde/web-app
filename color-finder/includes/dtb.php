<?php
/**
 *Small description of this file: This is the file that enables a connection to the color-finder database
 *Lists all the dinosaurs in the database
 *
 *@author Lightsyde (Titar Awua-Imande) <taimande@gmail.com>
 *@copyright 2012 Titar Awua Imande
 *@licence BSD-3-Clause <http://github.com/..../licence.txt>
 *@version 1.0.0
 *@package Dinosaurs\Controllers
*/

$user = getenv('MYSQL_USERNAME');
$pass = getenv('MYSQL_PASSWORD');
$host = getenv('MYSQL_DB_HOST');
$dbname = getenv('MYSQL_DB_NAME');

$data_source = sprintf('mysql:host=%s;dbname=%s', $host, $dbname);



$db = new PDO($data_source,$user,$pass);

$db->exec('SET NAMES utf8');