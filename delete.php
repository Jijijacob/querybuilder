<?php

 require('connect.php');
$table=$_REQUEST['table'];
?>

<br>
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


<style>
div
{
text-transform:capitalize;
margin-bottom:5px;	
}

</style>


<?php
$id=$_REQUEST['id'];
$result = mysql_query("SHOW FIELDS FROM $table");

$i = 0;
//echo "<form action='delete_data.php?id=$id' method='post' enctype='multipart/form-data'>";
while ($row = mysql_fetch_array($result))
 {

  $name=$row['Field'];
  $type=$row['Type'];
  $type = explode("(", $type);
  $type_only=$type[0];
$i++;

$result2 = mysql_query("SELECT * FROM $table where id='$id'") or die(mysql_error());
$row2= mysql_fetch_array($result2);

$datas=$row2[$name];
//echo $datas;

if($i==1)
{
	
	// echo "<div class='col-sm-2'>".str_replace('_', ' ', $name)."</div><div class='col-sm-4'> <input type='text' name='$name' value='$datas' readonly></div>";
}
  elseif($type_only=="varchar" || $type_only=="int" || $type_only=="int" || $type_only=="tinyint"  )
  {
	  echo "<div class='col-sm-2'>".str_replace('_', ' ', $name)."</div><div class='col-sm-4'> <input type='text' name='$name' value='$datas' class='form-control'></div>";
  }
  
  
    elseif($type_only=="date" )
  {
	  echo "<div class='col-sm-2'>".str_replace('_', ' ', $name)."</div><div class='col-sm-4'> <input type='text' name='$name' id='t$k' value='$datas' class='form-control'></div>";
	  
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
	 echo "<div class='col-sm-2'>".str_replace('_', ' ', $name)."</div><div class='col-sm-4'><input type='file' name='$name' class='form-control'> $datas</div>";
  }
  if($type_only=="text" )
  {
	 echo "<div class='col-sm-2'>".str_replace('_', ' ', $name)."</div><div class='col-sm-4'><textarea name='$name' class='form-control'>$datas</textarea></div>";
  }
  
  

  
  
}



echo "<div class='col-sm-2'><input type='submit' value='Update' name='submit' class='form-control btn-success'></div>";



echo "
<input type='hidden' name='table' value='$table' class='form-control'>


</form>";




echo "<div class='col-sm-2' style='float:right;margin-bottom:10px;'><form action='try60.php' method='post'><input type='submit' name='view' value='<<<< BACK' class='form-control btn-danger'></form></div>";


mysql_free_result($result);

















mysql_close();
?>
