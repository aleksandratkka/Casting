<?php
require '../classes/Casting.php';
require '../../database/Database.php';

use CastingFunctionality\Casting;

$casting = new Casting();
$casting->CreateCasting($_POST['casting_title']);
header('Location: ../../../index.php');
exit();