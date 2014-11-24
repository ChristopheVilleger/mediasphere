<?php

  $table_name = $wpdb->base_prefix."mediasphere";

  $sql = "Select * FROM ".$table_name.";";
  $results = $wpdb->get_results($sql, ARRAY_N);

  echo "<table><tr>";
  foreach ($elements as $name => $type) {
    echo "<th>$name</th>";
  }
  echo "</tr>";
  foreach ($results as $key => $value) {
    echo "<tr data-id='".array_shift($value)."'>";
    foreach($value as $val) {
      echo "<td>$val</td>";
    }
    echo" </tr>";
  }

  echo "</table>";
?>