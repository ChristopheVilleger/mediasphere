<?php

$table_name = $wpdb->base_prefix."mediasphere";

$sql = "Select * FROM ".$table_name.";";
$results = $wpdb->get_results($sql, ARRAY_N);

echo "<table><tr>";
foreach ($elements as $name => $type) {
	echo "<th>$name</th>";
}
  echo "<th>Actions</th></tr>";
foreach ($results as $key => $value) {
	echo "<tr data-id='".array_shift($value)."'>";
	foreach($value as $val) {
		echo "<td>$val</td>";
	}
  echo " <td><a class='edit' href='#'>Edit</a> - <a class='delete' href='#'>Delete</a> </td></tr>";
}


echo "</table>";
?>

<script>
$('.edit').on('click', function() {
  $('#elementId').remove();
  $('#mediasphereForm').append('<input type="hidden" name="id" id="elementId" value="' + $(this).parents('tr').attr('data-id') + '">');

  elements = $(this).parents('tr').find('td');
  table_attributes = $(this).parents('table').find('th');
  // Remove actions td
  elements.splice(-1,1);

  $.each(elements , function(i, val) { 
    $("input[id="+table_attributes[i].innerHTML+"]").val(val.innerHTML);
  });
   
  elementId = $('#elementId');
});
</script>