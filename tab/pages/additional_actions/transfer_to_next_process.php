<?php
require '../classes/Lathe.php';
require '../classes/Hardening.php';
require '../classes/Locksmith.php';
require '../classes/FinishedCastings.php';
require '../../database/Database.php';
use CastingFunctionality\Lathe;
use CastingFunctionality\Hardening;
use CastingFunctionality\Locksmith;
use CastingFunctionality\FinishedCastings;
switch ($_POST['hidden_table_next']){
    case 'lathe_1':
        $lathe = new Lathe();
        $lathe->FirstGoToNext($_POST['hidden_id_next'],$_POST['quantity_next']);
        header('Location: ../lathe.php');
        break;
    case 'lathe_2':
        $lathe = new Lathe();
        $lathe->SecondGoToNext($_POST['hidden_id_next'],$_POST['quantity_next']);
        header('Location: ../hardening.php');
        break;
    case 'lathe_3':
        $lathe = new Lathe();
        $lathe->ThirdGoToNext($_POST['hidden_id_next'],$_POST['quantity_next']);
        header('Location: ../locksmith.php');
        break;
    case 'hardening':
        $hardening = new Hardening();
        $hardening->GoToNext($_POST['hidden_id_next'],$_POST['quantity_next']);
        header('Location: ../lathe.php');
        break;
    case 'locksmith':
        $locksmith = new Locksmith();
        $locksmith->GoToNext($_POST['hidden_id_next'],$_POST['quantity_next']);
        header('Location: ../ready.php');
        break;
    case 'finished_castings':
        $finished_castings = new FinishedCastings();
        $finished_castings->GoToNext($_POST['hidden_id_next'],$_POST['quantity_next']);
        header('Location: ../sent.php');
        break;
}