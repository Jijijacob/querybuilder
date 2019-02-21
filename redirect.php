<?php
session_start();
include('db/connection.php');
//$db_name="music"; // Database name 
$tbl_name="user_details"; // Table name 

// Connect to server and select databse.


// username and password sent from form 
$myusername=$_POST['UserName']; 
$mypassword=$_POST['Password']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
	
if(isset($_POST['login']))
{
//echo "teacher";

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1)
{
// Register $myusername, $mypassword and redirect to file "login_success.php"
 $result = mysql_query("SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'") or die('Could not connect: ' . mysql_error());

while($row = mysql_fetch_array($result))
  {
$type=$row['type'];
 $permission=$row['privilage'];
$_SESSION['name'] =$row['name'];
  $_SESSION['exam_id'] =$row['exam_id'];
$_SESSION['user'] =$myusername;
$_SESSION['permission'] =$permission;
//echo $_SESSION['user'];
//echo $_SESSION['pass'];
//session_register("myusername");
//session_register("mypassword"); 
//echo "sucess";
date_default_timezone_set("Asia/Calcutta");

$d=date('Y:m:d H:i:s');

$ip=$_SERVER['REMOTE_ADDR'];
$_SESSION['login_user']=$myusername;
//mysql_query("insert into log_in (user_name,date1,ip) values ('$myusername','$d','$ip')") or die ("Error ".mysql_error());
	
	header("location:dashboard.php");
  }
}


else
{

header("location:login.php?a=1");

}





}

?>
 
 



