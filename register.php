<?php
/**
 * Created by PhpStorm.
 * User: odin
 * Date: 7/29/15
 * Time: 10:18 AM
 */

session_start();
include_once("includes/connection.php");
include_once("includes/functions.php");

//redirect to profile if the user is already authenticated
if (isset($_SESSION['username'])) {
    redirectTo("profile.php");
}

if (isset($_POST['submit']) && isset($_POST['username'])) {
    //create user

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $billto = $_POST['billto'];

    $query = "insert into USER (name, billto, username, password) values ('$name', '$billto', '$username', '$password');";
    $result = mysql_query($query);
    //set user session
    if ($result) {
        $_SESSION['username'] = $username;
        //redirect to inventory
        redirectTo("inventory.php");
    }


}

?>




<!--

<?php
/*
session_start();
include_once("includes/functions.php");

// redirect to profile if user is already authenticated
if (isset($_SESSION['username'])) {
    redirectTo("profile.php");
}

//Page setup
$errorMessageType = "hidden";
$errorMessageValue = "";
//End page setup

//$db = "mroyball1";
//database connection
include_once("includes/connection.php");

if(isset($_POST["username"])) {
    //$conn = mysql_connect("localhost", "mroyball1", "mroyball1") or die("cannot connect");
    //mysql_select_db($db) or die("cannot select DB");

    //validate that the given username/password is in our database
    //if wrong go back to this page otherwise go back to menu.php

    //get list of usernames from DB and compare it to 'username'
    $getUsernames = "select USERNAME, PASSWORD from USER;";
    $result = mysql_query($getUsernames);

    while ($row = mysql_fetch_assoc($result)) {
        //check each item in the list if it matches with the provided username
        if ($row["USERNAME"] == $_POST["username"]) {
            //if so check the password
            if ($row["PASSWORD"] == $_POST["password"]) {
                //go to home page... how?
                //$errorMessageType = "text";
                //$errorMessageValue = "success";
                //redirect back to menu.php
                $passUser = $row["USERNAME"];
                $_SESSION['username'] = $passUser;
                header("Location: menu.php?username=$passUser" );
                exit;
            } else {
                //password doesn't match
                $errorMessageType = "text";
                $errorMessageValue = "password incorrect";
            }
        } else {
            //no match
            $errorMessageType = "text";
            $errorMessageValue = "user not found";

        }
    }
}

*/?>

-->
<!DOCTYPE html>
<html>
<head>
    <title>Project 3</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div class="header">
    <p> Title Area </p>
</div>

<div id="nav">
    <ul>
        <li class = "detail"><a href = "menu.php">Home</a></li>
    </ul>
</div>

<div class="content">
    <p> Page Content </p>
    <form action="register.php" method="POST">
        <table>
            <tr>
                <td>Enter Name: </td>
                <td> <input type="text" name="name"> </td>
            </tr>
            <tr>
                <td>Enter Username: </td>
                <td> <input type="text" name="username"> </td>
            </tr>
            <tr>
                <td>Enter Password: </td>
                <td> <input type="password" name="password"> </td>
            </tr>
            <tr>
                <td>Enter Address: </td>
                <td> <input type="text" name="billto"> </td>
            </tr>
        </table>
        <br>
        <input type="<?php echo $errorMessageType; ?>" name="errorMessage" value="<?php echo $errorMessageValue; ?>" readonly="true">
        <br>
        <input type="submit" value="Submit" name="submit">
    </form>
</div>
</body>

</html>