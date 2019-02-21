<style>
body
{
margin:0px auto;	
}


</style>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="bootstrap.min.css">
<!-- jQuery library -->
<script src="jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="bootstrap.min.js"></script>
     
      <div style="background:#06C;height:100px;margin:0px;">
      <br /><br /><center>
    <span style="color:#FFF;font-size:24px;">QUERY BASED SQL GENERATION
    </span></center>
    </div>
     <br /><br />
  <link rel="stylesheet" type="text/css" href="style.css">
    
   
    <div class="container">
     <div class="col-sm-6">
     
     <div class="alert alert-danger col-sm-10">
Your Description
</div>
     
     
     
    <form method="POST" class = "sign" >

    <div class="form-group col-sm-12">
<label for="inputText" class="sr-only">Text</label>
      <input type="text" name="text" class="form-control" placeholder="Text" id="note-textarea"  required>
         </div>

     

  <div class="form-group">

  <button class="btn btn-primary"  type="submit">Generate SQL Query</button>
  </div>
</form>
</div>
<div class="col-sm-6">
<?php
session_start();
error_reporting(0);
$f=0;
 require('connect.php');
if (isset($_POST['text']))
{
 $text= $_POST['text'];
 
 $text=str_replace(","," ",$text);
  $text=str_replace("?"," ",$text);
 
 echo "Entered Query :: $text";
}
$i=0; $dd='';$data='';$flag='';$cc='';

$result  = mysqli_query($conn,"SELECT * FROM words ") or die(mysqli_error($conn)) ;
while($row=mysqli_fetch_array($result))
{
    $words[$i]=$row['word'];
	//echo $row['word']."<br>";
    $i++;
}

 $t=explode(" ",$text);
// input misspelled word
//levenshtein algorithm
 foreach($t as $r)
 { 
$input = $r;
// array of words to check against
// no shortest distance found, yet
$shortest = -1;

// loop through words to find the closest
foreach ($words as $word) {

    
    $lev = levenshtein($input, $word);

    // check for an exact match
    if ($lev == 0) {

        // closest word is this one (exact match)
        $closest = $word;
        $shortest = 0;

        // break out of the loop; we've found an exact match
        break;
    }

    // if this distance is less than the next found shortest
    // distance, OR if a next shortest word has not yet been found
    if ($lev <= $shortest || $shortest < 0) {
        // set the closest match, and shortest distance
        $closest  = $word;
        $shortest = $lev;
    }
}


 if($shortest>0 && $shortest<2){

    $data=$data."  ". $closest;
    
}
else
{
   $data=$data." ".$r; 
   // $dd=$dd." ".$data; 
}
//echo "<br>-----<br>".$dd;
// echo "****".$closest."**** $r $shortest ****<br>";
}  
//echo $data;echo "<div class='alert alert-warning'>";
echo "<br><div class='alert alert-info'>Entered  :: ".$text."</div>";
echo "<br><div class='alert alert-success'>Final :: ".$data."</div><br>";
 $t=explode(" ",$data);
//echo "hghghghjghjg".$t;

 foreach($t as $r)
 { 
$result  = mysqli_query($conn,"SELECT * FROM train where word='$r' ") or die(mysqli_error($conn)) ;
while($row=mysqli_fetch_array($result))
{
    $dtype=$row['dtype'];
///	echo $r."****** $row[dtype] **".$row['query_word']."<br>";
    if($dtype=="logic")
	$logic=$row['query_word'];
	if($dtype=="query")
	$query=$row['query_word'];
	if($dtype=="table")
	$table=$row['query_word'];
	if($dtype=="field")
	{
		
	$field[$f]=$row['query_word'];
	$f++;
	$ff2=$row['query_word'];
	//echo "kkk $r ";
	}
	if($dtype=="attr")
	$attr=$row['query_word'];
 
}




//$a = 'How are you?';








if($attr=="")
$attr="*";




 }

for($ii=0;$ii<count($field);$ii++)
{
	if($ff=="")
	$ff1=$field[$ii];
$ff=$field[$ii].",".$ff;	
	$field_count=5;
}
$ff=rtrim($ff,",");
//echo "<br>".$ff;
//echo "<br>count ".count($field);


echo "<div class='alert alert-warning'> Query Generated :: ";
?>
</div>

