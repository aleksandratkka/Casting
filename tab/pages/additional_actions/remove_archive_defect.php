<?php
require '../../database/Database.php';
use DataBaseFunctionality\Database;
$db = new Database();
$db->Query('DELETE FROM ' .$_POST['hidden_table_delete']. ' WHERE `id` = ?',array($_POST['hidden_id_delete']));
header("Location: ../archived_and_defect.php");
exit();