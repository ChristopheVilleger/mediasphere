
<iframe width="560" height="315" src="//www.youtube.com/embed/zxdA9XnC120" frameborder="0" allowfullscreen></iframe>
<div id="cinematheque_thumbnails">
    <?php
        $array = array('zxdA9XnC120','OcB-FreSnG8','GnT8jVCyh_E','d1tNOYcYfJQ','FqTzOpzuLpE','3AGbyUZgJpw');
        echo '<ul>';
        foreach($array as $value) {
            echo "<li class='thumbnail' data-value='$value'><img alt='Video thumbnail' src='http://img.youtube.com/vi/" . $value . "/mqdefault.jpg'></li>";
        }
        echo '</ul>';
    ?>
</div>