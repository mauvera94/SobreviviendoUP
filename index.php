<?php
include("db.php");
session_start();

$msg='';
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$recaptcha=$_POST['g-recaptcha-response'];
if(!empty($recaptcha))
{
include("getCurlData.php");
$google_url="https://www.google.com/recaptcha/api/siteverify";
$secret='6LcENRETAAAAAHRjOveQm7BUqpMVJ-h4SMYRMLNa';
$ip=$_SERVER['REMOTE_ADDR'];
$url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
$res=getCurlData($url);
$res= json_decode($res, true);
//reCaptcha success check 
if($res['success'])
{
//Include login check code
}
else
{
$msg="Please re-enter your reCAPTCHA.";
}

}
else
{
$msg="Please re-enter your reCAPTCHA.";
}

}
?>