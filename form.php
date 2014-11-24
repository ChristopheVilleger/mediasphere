<?php
global $wpdb;
include('helpers/get_elements.php');
include('helpers/form_validator.php');
?>

<h1>Ajouter un Film</h1>
<br />

<div style="width: 40%; border: 1px solid red; float: left">
	<form method='post' action='<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>'>
		<table>
			<?php
			foreach ($elements as $name => $type) {

				echo "<tr>
				<td>
					$name:
				</td>
				<td>
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
			return "<input size='30' type='$type' name='$name' value='$_POST[$name]' placeholder='Entrez une valeur pour $name'>";
		}

		?>
	</table>
	<input type="submit" value="Envoyer" />
</form>

<?php include('helpers/index.php'); ?>

</div>
<div id='preview' style="width: 55%; border: 1px solid red; float: right">

</div>



<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

<script>
	$("input[name='youtube_link']").on('change', function() {
		if ($(this).val().match('youtube.com/') || $(this).val().match('youtu.be/') ) {
			id = $(this).val().split('=')[1];
			$('#preview').append('<iframe width="560" height="315" src="http://www.youtube.com/embed/' + id + '" frameborder="0"></iframe>');
		}
		else {
			alert('Error: Bad Youtube link');
			$(this).val('');
		}
	});

</script>