<?php
$messages = array();
if ( isset ( $_POST ) && !empty($_POST)) {

  foreach ($elements as $name => $type) {

    if ( (isset($_POST[$name] )) && empty($_POST[$name] ) ) {

      $messages[$name] = "<span style='color: red;'>The value for $name is missing</span>";

    }
  }


}

?>