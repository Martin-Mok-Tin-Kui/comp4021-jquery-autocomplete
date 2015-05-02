<?php

// load the session information
require("session.php");

// Maximum number of suggestions to return
$SUGGESTION_MAX = 10;

// get data source from memory of session
$current_data_array = $_SESSION['autocomplete_data'];
$count_data_array = $_SESSION['autocomplete_count_data'];

// query term
$term = trim($_GET['term']);

// construct JSON array, format is [ "xx", "yy", "zz" ]
?>
[

<?php

$count = 0;
$result_array = array();

foreach ($current_data_array as $key => $val) {
  // Write code to match term to suggestions using case-insensitive matching
  // Retrieve a maximum of 10 suggestions and create JSON
  if (stripos($val, $term) !== false ){
    if ($count == $SUGGESTION_MAX)
      break;
    
    $total_count = 0;
    if (array_key_exists($val, $count_data_array))
      $total_count = $count_data_array[$val];
    
    //for handling bold font
    $position = stripos($val, $term);
    $label = "<b>" . substr($val,0, $position) . "</b>";
    $label .= substr($val, $position, strlen($term)) . "<b>". substr($val, $position + strlen($term), strlen($val)) . "</b>";
    
    $tmp_array = array();
    $tmp_array[0] = "{\"label\":\"$label\", \"value\":\"$val\", \"count\":\"$total_count\"}";
    $tmp_array[1] = $total_count;
    
    $result_array[$count++] = $tmp_array;
  }
}

//selection sort  
for ($i=0;$i<$count-1;$i++){
  $max = $i;
  for ($j=$i+1;$j<$count;$j++){
    if ($result_array[$max][1] < $result_array[$j][1]){
      $max = $j;
    }
  }
  if ($max!=$i){
    $tmp_array = $result_array[$i];
    $result_array[$i] = $result_array[$max];       
    $result_array[$max] = $tmp_array;
  }
}

echo $result_array[0][0];
for ($i=1;$i<$count;$i++)
  echo ",".$result_array[$i][0];

?>

]
