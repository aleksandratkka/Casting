<?php
require '../classes/CounterParty.php';
require '../../database/Database.php';

use CastingFunctionality\CounterParty;

$counterparty = new CounterParty();
$counterparty->CreateCounterparty($_POST['counterparty_title']);
header('Location: ../second_mechanical_restoration.php');
exit();