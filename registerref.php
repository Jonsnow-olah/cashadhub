<?php
require_once 'config/config.php';

if(isset($_GET["ref"])){
	$refUserId = $_GET["ref"];
}
$redirect = "signup?ref=".$refUserId;
$secRef = "SELECT userid, name from cashad_hub_users where userid = '$refUserId' ";
$secRefRes = $conn->query($secRef)or
die(mysqli_error($conn));

if($secRefRes->num_rows > 0){
	$secRefRs = $secRefRes->fetch_assoc();

	$_SESSION["referral"] = $secRefRs["userid"];
	$refId = $_SESSION["referral"];
	header("location: ".$redirect);
}
?>