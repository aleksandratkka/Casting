<?php
require '../../database/Database.php';
require '../classes/FirstMechanical.php';
require '../classes/SecondMechanical.php';
require '../classes/Lathe.php';

use CastingFunctionality\FirstMechanical;
use CastingFunctionality\SecondMechanical;
use CastingFunctionality\Lathe;
$start_date = date("Y-m-d H:i:s");
$end_date = date("Y-m-d H:i:s", strtotime("+7 day"));
if ($_POST['mech_id'] == 1){
$mech = new FirstMechanical();
$mech->NewMechanicalProcess($_POST['casting_id'],$_POST['quantity'],$start_date,$end_date);
$lathe = new Lathe();
$lathe->NewLatheProcess(1,$_POST['casting_id'],$_POST['quantity'],$start_date,$end_date);
header('Location: ../first_mechanical_restoration.php');
exit();
}
if ($_POST['mech_id'] == 2){

    $mech = new SecondMechanical();
    $mech->NewMechanicalProcess($_POST['casting_id'],$_POST['quantity'],$start_date,$end_date,$_POST['counterparty_id']);
    header('Location: ../second_mechanical_restoration.php');
    exit();
}
