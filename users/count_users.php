<?php
require_once '../User.php';

$user = new User();
$countUsers = $user->readAll();
$output = "";
$output .= "<span class='box-count'>".count($countUsers)."</span>";
echo 'All Users: '.$output;

?>