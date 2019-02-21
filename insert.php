<?php
error_reporting(0);
 require('connect.php');
$table=$_REQUEST['table'];
$result = mysql_query("SHOW FIELDS FROM $table");
$i = 0;
while ($row = mysql_fetch_array($result))
 {
 // echo $row['Field'] . ' ' . $row['Type']."<br>";
  $name=$row['Field'];
  //echo $name."<br>";
  $post_values[]=addslashes($_POST[$name]);
  $field_name[]=$name;
  $data_type[]=$row['Type'];
 // echo $post_values[$i];
  $i++;
 }
$j=$i;
//echo "<br>";
for($k=0;$k<$i;$k++)
{
	if($fields=="")
	$fields=$field_name[$k];
	else
	$fields=$fields.",".$field_name[$k];
	
	
	$type=$data_type[$k];
	//$data_type[$k];
	$type = explode("(", $type);
  $type_only=$type[0];
	
	

  if($type_only=='tinytext')
  {
	
$target_path = "uploads/";
$date=date("Y-m-d-h-i-s");
$target_path = $target_path.$date.basename($_FILES[$field_name[$k]]['name']); 
//echo $target_path;
move_uploaded_file($_FILES[$field_name[$k]]['tmp_name'], $target_path);





	if($datas=="")
	{
	$datas="'".$target_path."'";
	//echo $field_name[$k];
	}
	else
	{
	$datas=$datas.",'".$target_path."'";
//	echo $field_name[$k];
	}
	
  }
  
  
  else
	 {
	if($datas=="")
	$datas="'".$post_values[$k]."'";
	else
	$datas=$datas.",'".$post_values[$k]."'";
	
  }
}
//echo $datas;
$sqls="INSERT INTO $table($fields) VALUES ($datas)";
if(mysql_query($sqls) )
{

?>
<script>
var r = confirm("Inserted Sucessfully \n <?php echo $sqls; ?>");
if (r == true) {
    window.location="try60.php";
} else {
    txt = "You pressed Cancel!";
}

</script>
<?php
mysql_close();
}


//header("location:try.php?a=1");
?>
