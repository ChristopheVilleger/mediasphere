<?php
echo '<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>';
global $wpdb;
include('helpers/get_elements.php');
include('helpers/form_validator.php');
include('helpers/delete_element.php');
?>
<style>
th {
  font: bold 11px "Trebuchet MS", Verdana, Arial, Helvetica,
  sans-serif;
  color: #6D929B;
  border-right: 1px solid #C1DAD7;
  border-bottom: 1px solid #C1DAD7;
  border-top: 1px solid #C1DAD7;
  letter-spacing: 2px;
  text-transform: uppercase;
  text-align: left;
  padding: 6px 6px 6px 12px;
  background: #CAE8EA url(images/bg_header.jpg) no-repeat;
}
td {
  border-right: 1px solid #C1DAD7;
  border-bottom: 1px solid #C1DAD7;
  background: #fff;
  padding: 6px 6px 6px 12px;
  color: #777;
}
td.even {
  background: #a5dede;
}
</style>
<h1 class='mediasphereTitle'>Add a film</h1>
<br />

<div style="width: 40%; float: left">
	<form id="mediasphereForm" method='post' action='<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>'>
		<table>
			<?php
      $even = true;
			foreach ($elements as $name => $type) {
        $even = !$even;
				echo "<tr>
				<td class=".($even == true ? 'even' : 'odd').">
					$name:
				</td>
        <td class=".($even == true ? 'even' : 'odd').">
					".get_field($name, $type)."
				</td>
			</tr>";

			foreach ($messages as $message => $value) {
				if ($message == $name) {
					echo "<tr><td colspan = '2'>$value</td></tr>";
				}
			}
		}

		function get_field($name, $type) {
			return "<input size='30' type='$type' id='$name' name='$name' value='$_POST[$name]' placeholder='Entrez une valeur pour $name'>";
		}

		?>
	</table>
	<input type="submit" value="Envoyer" />
</form>

<?php include('helpers/index.php'); ?>

</div>
<div id='preview' style="width: 50%; float: right">

</div>

<script>
  function addYoutubeVideo(id) {
    $('#preview').empty();
    $('#preview').append('<iframe width="560" height="315" src="http://www.youtube.com/embed/' + id + '" frameborder="0"></iframe>');
  }
	$("input[name='youtube_link']").on('input', function() {
		if ($(this).val().match('youtube.com/') || $(this).val().match('youtu.be/') ) {
			id = $(this).val().split('=')[1];
      addYoutubeVideo(id);
		}
		else {
			alert('Error: Bad Youtube link');
			$(this).val('');
		}
	});

</script>