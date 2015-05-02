<?php

// load the session information
require('session.php');

// get data source from memory of session
$current_data_array = $_SESSION['autocomplete_data'];

// query term
$query = $_GET['q'];

// if query exists in data source of suggestion
// For bonus part, you should write code to update access count
// and maintain suggestions in descending order of access count
if (! isset($_SESSION['autocomplete_count_data']))
  $count_data_array = array();
else
  $count_data_array = $_SESSION['autocomplete_count_data'];

if (array_key_exists($query, $count_data_array))
  $count_data_array[$query]++;
else
  $count_data_array[$query] = 1;


$_SESSION['autocomplete_count_data'] = $count_data_array;

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
 You searched this country <?php echo $count_data_array[$query] ?> time(s).
 </div>
 </body>
</html>
