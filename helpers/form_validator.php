<?php

$messages = array();

if ( isset ( $_POST ) && !empty($_POST)) {
 // Check for errors
	foreach ($elements as $name => $type) {
		if ( (isset($_POST[$name] )) && empty($_POST[$name] ) ) {
			$messages[$name] = "<span style='color: red;'>The value for $name is missing</span>";
		}
	}

	// Save data
	if (empty($messages)) {

    // If insert
    if ($_POST['id'] == '') {
      include('insert-config.php');
    }
    // If update
    else {
      include('update-config.php');
    }
    echo "<br /><h1 style='color: green'>La configuration a bien été mise à jour</h1></br />";
	}


}

?>