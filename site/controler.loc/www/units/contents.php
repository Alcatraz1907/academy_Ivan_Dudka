<?php

if (array_search ( $dir_for_contents, $directs ) !== false) {
	$name = $dir_lab . "/" . $dir_for_contents . "/index.php";
	include $name;
} else {
	include 'default.php';
}
?>