<?php
error_reporting(0);
 require('connect.php');
$table=$_REQUEST['table'];
$id=$_REQUEST[id];
$result = mysql_query("SHOW FIELDS FROM $table");

$i = 0;

while ($row = mysql_fetch_array($result))
 {
 // echo $row['Field'] . ' ' . $row['Type']."<br>";
  $name=$row['Field'];
  //echo $name."<br>";
  $post_values[]=$_POST[$name];
  $field_name[]=$name;
  $data_type[]=$row['Type'];
 // echo $post_values[$i];
  $i++;
 }
$j=$i;
//echo "<br>";
for($k=1;$k<$i;$k++)
{
	if($fields=="")
	$fields=$field_name[$k];
	else
	$fields=$fields.",".$field_name[$k];
	
	
	$type=$data_type[$k];
	$type = explode("(", $type);
    $type_only=$type[0];
	
	

  if($type_only=='tinytext')
  {
	
$target_path = "uploads/";

$target_path = $target_path.basename($_FILES[$field_name[$k]]['name']); 
//echo "<br>tsets".basename($_FILES[$field_name[$k]]['name']);
$path_null=move_uploaded_file($_FILES[$field_name[$k]]['tmp_name'], $target_path);


if($path_null=="")
{
$result2 = mysql_query("SELECT * FROM $table where id=$id") or die("error".mysql_error());
$row2= mysql_fetch_array($result2);
$target_path=$row2[$field_name[$k]];
}


	if($datas=="")
	{
	$datas="$field_name[$k]='".$target_path."'";
	//echo $field_name[$k];
	}
	else
	{
	$datas=$datas.",$field_name[$k]='".$target_path."'";
//	echo $field_name[$k];
	}
	
  }
  
  
  else
	 {
	if($datas=="")
	$datas="$field_name[$k]='".$post_values[$k]."'";
	else
	$datas=$datas.",$field_name[$k]='".$post_values[$k]."'";
	
  }
	
	
	
	
	$sqls="UPDATE $table SET $datas  WHERE id='$id'";
}
//echo $datas."<br>";
if(mysql_query($sqls))
{


?>
<script>
var r = confirm("Update Sucessfully \n <?php echo $sqls; ?>");
if (r == true) {
    window.location="try60.php";
} else {
    txt = "You pressed Cancel!";
}

</script>
<?php
mysql_close();
//header("location:update.php?id=$id&table=$table");
}









mysql_free_result($result);

















?>
