<?php
/**
 * Created by PhpStorm.
 * User: odin
 * Date: 7/29/15
 * Time: 9:09 AM
 */

$db = "chipset";
$conn = mysql_connect("localhost", "odin", "") or die("cannot connect");
mysql_select_db($db) or die("cannot select DB");

?>