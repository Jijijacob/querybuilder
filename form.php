<?php
include("../header.php");
?><!DOCTYPE html>
<html lang="en">
<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
</head>
<body>
<style>
div
{
text-transform:capitalize;
margin-bottom:5px;	
}

</style>
<?php


$g=0;

$result = mysql_query("SHOW FIELDS FROM $table");

$i = 0;

echo "<div class='col-sm-10'>";
echo "<form action='insert.php' method='post' enctype='multipart/form-data' name='register_form' id='register_form'>";
while ($row = mysql_fetch_array($result))
 {

  $name=$row['Field'];
  $type=$row['Type'];
  $type = explode("(", $type);
  $type_only=$type[0];
$i++;

$g++;


//echo " <div ><div >";



if($i==1)
{
	
	//echo "<td>Male <input type='radio' name='$name'> </td>";
	
}



else
{

  if($type_only=="varchar" || $type_only=="int" || $type_only=="int" || $type_only=="tinyint" )
  {
	  echo "<div class='col-sm-2'>".str_replace('_', ' ', $name)."</div><div class='col-sm-4'><input type='text' name='$name'class='form-control' ></div>";
	
      
    
  }
  
  
   if($type_only=="date" )
  {
	  $date=date("Y-m-d");
	  echo "<div class='col-sm-2'>".str_replace('_', ' ', $name)."</div><div class='col-sm-4'><input type='date' name='$name'  class='form-control' value='$date'></div>";
	  
	  ?>
	  
	    <script type="text/javascript">
$(function() {
	$('#t<?php echo $k;?>').datepick();
	
});

function showDate(date) {
	alert('The date chosen is ' + date);
}
</script>
      <?php
	  $k++;
  }
  
  
  if($type_only=="tinytext" )
  {
	  echo "<div class='col-sm-2'>".str_replace('_', ' ', $name)."</div><div class='col-sm-4'><input type='file' name='$name' class='form-control'></div>";
  }
  if($type_only=="text" )
  {
	  echo "<div class='col-sm-2'>".str_replace('_', ' ', $name)."</div><div class='col-sm-4'><textarea name='$name' class='form-control'></textarea></div>";
  }
  
  
  

}
  


//echo "</div></div><br>";

  
 
 
 
 
 
  
}



echo "
<input type='hidden' name='table' value='$table' class='form-control'>
<div class='col-sm-2'><input type='submit' value='Add New' name='submit' class='form-control btn-success'></div>";



echo "</form>";



echo "<div class='col-sm-2' style='float:left'></div>
<div class='clearfix'></div>
";



mysql_free_result($result);

















mysql_close();

include("../footer.php");

?>
