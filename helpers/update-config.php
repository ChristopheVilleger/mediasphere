<?php

$table_name = $wpdb->base_prefix."mediasphere";


$update_query = "UPDATE ".$table_name." SET ";

	foreach ($elements as $name => $type) {
		$update_query = $update_query."$name='$_POST[$name]',";
	}

	$update_query = substr_replace($update_query, "", -1)." WHERE ".$table_name.".id = ".$_POST['id'].";";
  $wpdb -> query($update_query);

?>
