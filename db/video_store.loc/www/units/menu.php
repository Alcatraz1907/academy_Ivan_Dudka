
<?php

$number_of_directs = count ( $directs );

for($i = 2; $i < $number_of_directs; $i ++) {
	$direct = $directs [$i];

	$class = "lab";

	if ($direct == $dir_for_contents) {
		$class = $class . " selected";
	} else {
		$class = $class . " not_selected";
	}

	$onclick = "load('" . $direct . "')";
	?>
<div class="<?php echo $class; ?>" onclick="<?php echo $onclick;?>">
			<?php echo $direct;?></div>
<br>
<?php
}
?>