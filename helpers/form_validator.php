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
    include('send_form.php');
  }


}

?>