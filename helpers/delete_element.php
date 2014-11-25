<?php

  if (isset ( $_GET['delete_id'] ) && !empty($_GET['delete_id'])) {
    $table_name = $wpdb->base_prefix."mediasphere";

    $delete_query = "DELETE FROM $table_name WHERE $table_name.id =".$_GET['delete_id'];
    $wpdb -> query($delete_query);

  }

?>
