<?php

require '../../database/Database.php';
require '../classes/FirstMechanical.php';
require '../classes/Lathe.php';
use CastingFunctionality\Lathe;
use DataBaseFunctionality\Database;
use CastingFunctionality\FirstMechanical;
$mech = new FirstMechanical();
$db = new Database();
$data = $db->QuerySelect('SELECT * FROM `mechanical_restoration_2` WHERE `id` = ?',array($_POST['hidden_id_transfer']));
$mech->NewMechanicalProcess($data[0]['id_casting'],$data[0]['quantity'],$data[0]['start_performing'],$data[0]['end_performing']);
$lathe = new Lathe();
$lathe->NewLatheProcess(1,$data[0]['id_casting'],$data[0]['quantity'],$data[0]['start_performing'],$data[0]['end_performing']);
$db->Query('DELETE FROM `mechanical_restoration_2` WHERE `id` = ?',array($_POST['hidden_id_transfer']));
header("Location: ../first_mechanical_restoration.php");
exit();