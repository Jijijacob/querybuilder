<?php
session_start();
 require('connect.php');
if (isset($_POST['text']))
{
 $text= $_POST['text'];
 echo "$text";
}
$i=0;
$result  = mysqli_query($conn,"SELECT * FROM words ") or die(mysqli_error($conn)) ;
while($row=mysqli_fetch_array($result))
{


    $words[$i]=$row['word'];
    $i++;
}



echo $words[0]."pppp";

$text="get all name";

 $t=explode(" ",$text);
// input misspelled word
 foreach($t as $r)
 { 





// input misspelled word
$input = $r;

// array of words to check against


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

echo "Input word: $input\n";
if ($shortest == 0) {
    echo "Exact match found: $closest\n";
} else {
    echo "Did you mean: $closest?\n";
}
echo "<br><br>";

}