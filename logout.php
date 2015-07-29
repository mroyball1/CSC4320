<?php
/**
 * Created by PhpStorm.
 * User: odin
 * Date: 7/29/15
 * Time: 9:21 AM
 */


session_start();
session_destroy();
include_once("includes/functions.php");
redirectTo("login.php");

?>