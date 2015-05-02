<?php

// load the session information
require('session.php');

// get data source from memory of session
$current_data_array = $_SESSION['autocomplete_data'];

// query term
$query = $_GET['q'];

// if query exists in data source of suggestion
if (array_key_exists($query, $current_data_array)) {
  // For bonus part, you should write code to update access count
  // and maintain suggestions in descending order of access count
  /** WRITE CODE HERE, REMOVE THIS LINE AFTER COMPLETION **/
}

?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="utf-8">
  <title>Result Page</title>
 </head>
 <body>
 <div>
 Submitted Query: <?php echo '<b>'.$query.'</b>'; ?>
 </div>
 </body>
</html>
