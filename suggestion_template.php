<?php

// load the session information
require("session.php");

// Maximum number of suggestions to return
$SUGGESTION_MAX = 10;

// get data source from memory of session
$current_data_array = $_SESSION['autocomplete_data'];

// query term
$term = $_POST['name'];

// construct JSON array, format is [ "xx", "yy", "zz" ]
?>
[

<?php

$count = 0;
foreach ($current_data_array as $key => $val) {
  // Write code to match term to suggestions using case-insensitive matching
  // Retrieve a maximum of 10 suggestions and create JSON
  /** WRITE CODE HERE, REMOVE THIS LINE AFTER COMPLETION **/
}

?>

]
