<?php
session_start();
header("Content-type:text/html; charset=utf-8"); 

if (empty($_POST))
{
	echo "error!!!";
	exit;
}
$phone = "";
$password = "";
if (isset($_POST["account"]))
{
	$phone = $_POST["account"];
}
else
{
	echo "not account!!!";
	exit();
}
if (isset($_POST["password"]))
{
	$password = $_POST["password"];
}
else
{
	echo "not password!!!";
	exit();
}
$sqldb = new mysqli("localhost", "root", "", "project");
if (mysqli_connect_errno())
{
	printf("Connect failed:%s\n", mysqli_connect_error());
	exit();
}
mysqli_query($sqldb, "set names utf8");
$sql = "select count(*) from accounts  where `userPhone` = '".$phone."' and `password` = '".$password."'";
$result = mysqli_query($sqldb, $sql);
$row = mysqli_fetch_row($result);
mysqli_free_result($result);
mysqli_close($sqldb);
if ($row[0] == 1)
{
	$_SESSION["phone"] = $phone;
	header('Location:index.html');
	exit();
}
else
{
	echo "no exit";
}
?>
