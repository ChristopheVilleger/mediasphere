<?php require_once('../../../../wp-load.php'); ?>
<div id="mediatheque_iframe"><iframe width="560" height="315" src="//www.youtube.com/embed/zxdA9XnC120" frameborder="0" allowfullscreen></iframe></div>
<div id="cinematheque_thumbnails">
    <?php
        global $wpdb;
        $results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix. "mediasphere");
        $medias_array = array();
        //var_dump($results);
        foreach($results as $media_object){
            //echo $media_object->title ;
            //echo $media_object->release_date ;
            //echo $media_object->category ;
            $youtube_link = $media_object->youtube_link;
            $medias_array[] = $youtube_link;
        }
        
        //$array = array('zxdA9XnC120','OcB-FreSnG8','GnT8jVCyh_E','d1tNOYcYfJQ','FqTzOpzuLpE','3AGbyUZgJpw');
        echo '<ul>';
        foreach($medias_array as $value) {
            echo "<li class='thumbnail' data-value='$value'><img alt='Video thumbnail' src='http://img.youtube.com/vi/" . $value . "/mqdefault.jpg'></li>";
        }
        echo '</ul>';
    ?>
</div>
<script>
    $( ".thumbnail" ).click(function() {
            var youtube_value = $(this).data('value');
            var youtube_object = "<iframe width='560' height='315' src='//www.youtube.com/embed/" + youtube_value + "' frameborder='0' allowfullscreen></iframe>";
            $('#mediatheque_iframe').html(youtube_object);
        });
</script>