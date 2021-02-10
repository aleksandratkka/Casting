<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

require '../classes/Lathe.php';
require '../classes/Hardening.php';
require '../classes/Locksmith.php';
require '../classes/FinishedCastings.php';
require '../../database/Database.php';
use CastingFunctionality\Lathe;
use CastingFunctionality\Hardening;
use CastingFunctionality\Locksmith;
use CastingFunctionality\FinishedCastings;

switch ($_POST['hidden_table_back']){
    case 'lathe_2':
        $lathe = new Lathe();
        $lathe->SecondGoToBack($_POST['hidden_id_back'],$_POST['quantity_back']);
        header('Location: ../lathe.php');
        break;
    case 'lathe_3':
        $lathe = new Lathe();
        $lathe->ThirdGoToBack($_POST['hidden_id_back'],$_POST['quantity_back']);
        header('Location: ../hardening.php');
        break;
    case 'hardening':
        $hardening = new Hardening();
        $hardening->GoToBack($_POST['hidden_id_back'],$_POST['quantity_back']);
        header('Location: ../lathe.php');
        break;
    case 'locksmith':
        $locksmith = new Locksmith();
        $locksmith->GoToBack($_POST['hidden_id_back'],$_POST['quantity_back']);
        header('Location: ../lathe.php');
        break;
    case 'finished_castings':
        $finished_castings = new FinishedCastings();
        $finished_castings->GoToBack($_POST['hidden_id_back'],$_POST['quantity_back']);
        header('Location: ../locksmith.php');
        break;
}
