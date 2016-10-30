<?php
session_start();
header("Content-type:text/html; charset=utf-8"); 
$phoneRecommend = $_SESSION["phone"];
$reName = $_POST["reName"];
$rePhone = $_POST["rePhone"];
$reInfo = $_POST["reInfo"];
$sqldb = new mysqli("localhost", "root", "", "project");
if (mysqli_connect_errno())
{
	printf("Connect failed:%s\n", mysqli_connect_error());
	exit();
}
mysqli_query($sqldb, "set names utf8");
$sql = "INSERT INTO recommend(`phoneRecommend`, `recommendPhone`, `recommendName`, `recommendInfo`, `recommendStatus`, `createDate`, `updateDate`) values('".$phoneRecommend."','".$rePhone."','".$reName."','".$reInfo."',0,now(),now())";
mysqli_query($sqldb, $sql);
mysqli_close($sqldb);
?>
