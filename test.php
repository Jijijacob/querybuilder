<?php
$conn=mysql_connect("localhost","root","");
mysql_select_db("sql_generator",$conn);
$table="student";
$result = mysql_query("SHOW FIELDS FROM $table");


while ($row = mysql_fetch_array($result))
 {
  $name=$row['Field'];
	 echo $name."---";
	 
	 $var_1 = $name; 
$var_2 = 'names'; 

similar_text($var_1, $var_2, $percent); 

echo $percent."<br>"; 
	 
	 $words[]=$name;
	 
 }











// input misspelled word
$input = 'depffartments';

// array of words to check against
//$words  = array('apple','pineapple','banana','orange',
        //        'radish','carrot','pea','bean','potato');

// no shortest distance found, yet
$shortest = -1;

// loop through words to find the closest
foreach ($words as $word) {

    // calculate the distance between the input word,
    // and the current word
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

echo "Input word: $input<br>";
if ($shortest == 0) {
    echo "Exact match found: $closest<br>";
} else {
    echo "Did you mean: $closest?\n";
}

?>






