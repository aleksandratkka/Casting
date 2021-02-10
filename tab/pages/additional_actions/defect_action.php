<?php
require '../classes/Defect.php';
require '../../database/Database.php';

use CastingFunctionality\Defect;

$defect = new Defect();
$defect->NewDefectItems($_POST['casting_id'],$_POST['quantity'],date("Y-m-d H:i:s"));
$defect->UpdateQuantity($_POST['hidden_table'],$_POST['quantity'],$_POST['hidden_id']);
header("Location: ../archived_and_defect.php");
exit();