<?php

    require(__DIR__ . "/../includes/config.php");

    // numerically indexed array of places
    $places = [];

    <?php
 
    require(__DIR__ . "/../includes/config.php");
    require(__DIR__ . "/../includes/functions.php");
 
    // numerically indexed array of places
    $places = [];
 
    // TODO: search database for places matching $_GET["geo"]
   
    //is_readable vs fil_exists:is_readable() checks whether you can do file_get_contents() or similar calls, no more, no less.
     //If the location given returns a 500 or 403 error, you can still read() that (you'll simply get the error page), but it's still read()able.
      //Using is_readable to check the validity of a URL is simply the wrong function.
    
    $q="SELECT * FROM places WHERE MATCH(comma,separated,column,names) AGAINST('urlencode($_GET["geo"])' IN NATURAL LANGUAGE MODE)";
    $places=query($q);
 
    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($places, JSON_PRETTY_PRINT));
 
?>

    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($places, JSON_PRETTY_PRINT));

?>
