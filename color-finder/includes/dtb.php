<?php
/**
 * This is the file that enables a connection to the color-finder database

 *
 *@author Lightsyde (Titar Awua-Imande) <taimande@gmail.com>
 *@copyright 2012 Titar Awua Imande
 *@licence BSD-3-Clause <https://github.com/Lightsyde/web-app/blob/master/color-finder/licence.txt>
 *@version 1.0.0
 *@package Color Finder
*/

$user = getenv('MYSQL_USERNAME');
$pass = getenv('MYSQL_PASSWORD');
$host = getenv('MYSQL_DB_HOST');
$dbname = getenv('MYSQL_DB_NAME');

$data_source = sprintf('mysql:host=%s;dbname=%s', $host, $dbname);



$db = new PDO($data_source,$user,$pass);

$db->exec('SET NAMES utf8');