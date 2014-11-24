<?php

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

?>