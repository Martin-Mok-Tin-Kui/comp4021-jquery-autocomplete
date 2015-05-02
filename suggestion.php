<?php

// load the session information
require("session.php");

// Maximum number of suggestions to return
$SUGGESTION_MAX = 10;

// get data source from memory of session
$current_data_array = $_SESSION['autocomplete_data'];

// query term
$term = trim($_GET['term']);

// construct JSON array, format is [ "xx", "yy", "zz" ]
?>
[

<?php

$count = 0;

foreach ($current_data_array as $key => $val) {
  // Write code to match term to suggestions using case-insensitive matching
  // Retrieve a maximum of 10 suggestions and create JSON
  if (stripos($val, $term) !== false ){
    if ($count == $SUGGESTION_MAX)
      break;
    $position = stripos($val, $term);
    $label = "<b>" . substr($val,0, $position) . "</b>";
    $label .= substr($val, $position, strlen($term)) . "<b>". substr($val, $position + strlen($term), strlen($val)) . "</b>";
    
    if ($count++ == 0)
      echo "{\"label\":\"$label\", \"value\":\"$val\"}";
    else
      echo ",{\"label\":\"$label\", \"value\":\"$val\"}";
  }
  
}


?>

]
