<?php
require '../classes/Archive.php';
require '../../database/Database.php';

use CastingFunctionality\Archive;

$archive = new Archive();
$archive->NewArchiveItems($_POST['casting_id_archive'],$_POST['quantity'],date("Y-m-d H:i:s"));
$archive->UpdateQuantity($_POST['hidden_table_archive'],$_POST['quantity'],$_POST['hidden_id_archive']);
header("Location: ../archived_and_defect.php");
exit();
