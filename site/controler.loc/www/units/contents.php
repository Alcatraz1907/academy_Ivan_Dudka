<?php
// якщо параметр, €кий ми отримали з адресного р€дка ≥снуЇ (коректний),
// то в≥дображаЇмо його вм≥ст в контент≥ (вм≥ст папки, на €ку в≥н вказуЇ).
if (array_search ( $dir_for_contents, $directs ) !== false) {
	$name = $dir_lab . "/" . $dir_for_contents . "/index.php";
	include $name;
} else {
	include 'default.php';
}
?>