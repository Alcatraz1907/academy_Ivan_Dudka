<!-- Формуємо пункти меню -->
<?php
// Рахуємо кількість папок (файлів) у директорії.
$number_of_directs = count ( $directs );
// Починаємо з 2, бо перші два елементи це "." і "..".
for($i = 2; $i < $number_of_directs; $i ++) {
	$direct = $directs [$i];
	// Перелік класів для пунктів меню (для стилів).
	$class = "lab";
	// Якщо отриманий параметр $dir_for_contents відповідає поточному пункту меню,
	// то робимо цей пункт вибраним (активним).
	if ($direct == $dir_for_contents) {
		$class = $class . " selected";
	} else {
		// інакше - неактивним.
		$class = $class . " not_selected";
	}
	// Для кожного пункту меню задаємо подію натиснення миші (onclick) для
	// переходу до відповідного контенту.
	$onclick = "load('" . $direct . "')";
	?>
<div class="<?php echo $class; ?>" onclick="<?php echo $onclick;?>">
			<?php echo $direct;?></div>
<br>
<?php
}
?>