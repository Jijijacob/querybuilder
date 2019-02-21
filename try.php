
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="bootstrap.min.css">
<!-- jQuery library -->
<script src="jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="bootstrap.min.js"></script>
     
  <link rel="stylesheet" type="text/css" href="style.css">
    
    <div class="container">
     <div class="col-sm-6">
    <form method="POST" class = "sign" >

    <div class="form-group">
<label for="inputText" class="sr-only">Text</label>
      <input type="text" name="text" class="form-control" placeholder="Text"  required>
         </div>

     

  <div class="form-group">

  <button class="btn btn-primary"  type="submit">submit</button>
  

</div>
</form>
</div>
<div class="col-sm-6">

<?php
session_start();
error_reporting(0);
 require('connect.php');
if (isset($_POST['text']))
{
 $text= $_POST['text'];
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


 if($shortest>0 && $shortest<4){

    $data=$data." ". $closest;
    
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
	if($dtype=="query")
	$query=$row['query_word'];
	if($dtype=="table")
	$table=$row['query_word'];
	if($dtype=="field")
	$field=$row['query_word'];
	if($dtype=="attr")
	$attr=$row['query_word'];
 
}




//$a = 'How are you?';








if($attr=="")
$attr="*";




 }


if (strpos($text, 'with') !== false) {
    echo 'true';
	$start=explode("with",$text);
}

$cond2=$start[1];
$cond=explode(" ",$cond2);
$cond=$cond[1];


echo "Query -- ".$query."Table --".$table." Attr :: $field *** $cond **** $cond2";
echo "<div class='alert alert-warning'> Query Generated :: ";
if($query=="select")
{
if($cond!="")
echo "select $field from $table where $field like '% $cond' ";
elseif($field!="")
echo "select $field from $table ";
else
echo "select * from $table ";


}
if($query=="delete")
echo "delete from $table ";

if($query=="insert")
echo "insert into $table($field) values ('$cond2')";

if($query=="update")
echo "UPDATE $table SET $field = '$cond2' WHERE $field = $cond1";



echo "</div>";





?>
</div>



<?php
if($query=="insert")
include("form.php");

if($query=="select")
include("select.php");


if($query=="update")
include("up.php");


if($query=="delete")
include("del.php");


?>


</div>
