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
      $table_name = $wpdb->base_prefix."mediasphere";

      $sql = "INSERT INTO ".$table_name."(";

      foreach ($elements as $name => $type) {
        $sql = $sql."$name,";
      }

      $sql = substr_replace($sql, "", -1).") VALUES (";
        
      foreach ($elements as $name => $type) {
        $sql = $sql."'$_POST[$name]',";
      }

      $sql = substr_replace($sql, "", -2)."');";

      $wpdb -> query($sql);
      echo "<br /><h1 style='color: green'>La configuration a bien été mise à jour</h1></br />";

  }


}

?>