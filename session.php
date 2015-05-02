<?php

$DATA_SOURCE_FILE = "country.txt"; // text file containing suggestions
$SESSION_TIMEOUT = 3600;

// server keep session data
ini_set('session.gc_maxlifetime', $SESSION_TIMEOUT);

// client remember session id
session_set_cookie_params($SESSION_TIMEOUT);

// start session handler
session_start();

// if data source not in memory, read from file, line by line
if (! isset($_SESSION['autocomplete_data'])) {
  $local_array = array();
  // open file
  $handle = @fopen($DATA_SOURCE_FILE, "r");
    while(!feof($handle)){
      $tmp = fgets($handle);
      array_push($local_array, substr($tmp, 0, strlen($tmp)-1));
    }
    
    fclose($handle);
  
  $_SESSION['autocomplete_data'] = $local_array;
}

# CLEAR ALL SESSION VARIABLES, IF NEEDED
#session_unset();
#session_destroy();

?>
