<?php

$table_name = $wpdb->base_prefix."mediasphere";

$insert_query = "INSERT INTO ".$table_name."(";

	foreach ($elements as $name => $type) {
		$insert_query = $insert_query."$name,";
	}

	$insert_query = substr_replace($insert_query, "", -1).") VALUES (";

	foreach ($elements as $name => $type) {
		$insert_query = $insert_query."'$_POST[$name]',";
	}

	$insert_query = substr_replace($insert_query, "", -2)."');";

$wpdb -> query($insert_query);

?>