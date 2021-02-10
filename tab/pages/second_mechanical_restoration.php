<?php
require 'classes/CounterParty.php';
require 'classes/SecondMechanical.php';
require '../database/Database.php';


use CastingFunctionality\SecondMechanical;
use CastingFunctionality\CounterParty;

$mechanical = new SecondMechanical();
$mechanical_data = $mechanical->GetData();

$counterparty = new CounterParty();
$counterparty_data = $counterparty->GetData();
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mechanical_2</title>
    <link rel="stylesheet" href="../../style/css.css">
</head>
<body>

<?php
include '../module/header.php';
?>


<div class="table">
    <table>
        <caption>Механічна обробка 2</caption>
        <thead>
        <tr>
            <th><p class="table_items_p">Номер відливка</p></th>
            <th><p class="table_items_p">Назва відливка</p></th>
            <th><p class="table_items_p">Кількість</p></th>
            <th><p class="table_items_p">Контрагент</p></th>
            <th><p class="table_items_p">Дата початку</p></th>
            <th><p class="table_items_p">Дата закінчення</p></th>
            <th><p class="table_items_p">Перейти до обробки №1</p></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($mechanical_data as $mechanical_item)
        {
            $mechanical_casting_id = $mechanical_item['id_casting'];
            $mechanical_counterparty_title = $mechanical->GetCounterpartyTitle($mechanical_item['id_counterparty']);
            $mechanical_quantity = $mechanical_item['quantity'];
            $mechanical_start_date = $mechanical_item['start_performing'];
            $mechanical_end_date = $mechanical_item['end_performing'];
            $casting_title = $mechanical->GetCastingTitle($mechanical_casting_id);
            $casting_title = $casting_title[0][0];
            $mechanical_counterparty_title = $mechanical_counterparty_title[0][0];
            $id_mech_2 = $mechanical_item['id'];
            echo "
            <tr>
                <td><p class='table_items_p'>$mechanical_casting_id</p></td>
                <td><p class='table_items_p'>$casting_title</p></td>
                <td><p class='table_items_p'>$mechanical_quantity</p></td>
                <td><p class='table_items_p'>$mechanical_counterparty_title</p></td>
                <td><p class='table_items_p'>$mechanical_start_date</p></td>
                <td><p class='table_items_p'>$mechanical_end_date</p></td>
                <td><p class='table_items_p'><a data-id_mech_2 = '$id_mech_2' id='button_transfer' class='aad'>Перейти</a></p></td>
            </tr>
            ";
        }
        ?>
        </tbody>
    </table>
</div>

<div class="table">
    <table>
        <caption>Контрагент</caption>
        <thead>
        <tr>
            <th><p class="table_items_p">Номер контрагента</p></th>
            <th><p class="table_items_p">Назва контрагента</p></th>
        </tr>
        </thead>
        <?php
        foreach ($counterparty_data as $counterparty_item){
            $counterparty_id = $counterparty_item['id'];
            $counterparty_title = $counterparty_item['title'];
            echo "
            <tr>
                <td><p class='table_items_p'>$counterparty_id</p></td>
                <td><p class='table_items_p'>$counterparty_title</p></td>
            </tr>
            ";
        }
        ?>
        </tbody>
    </table>
</div>
<div class="new_item_box">
    <p class="new_item_text">Створити контрагента: </p>
    <form action="data_treatment/new_counterparty.php" method="post">
        <input type="text" name="counterparty_title">
        <input type="submit">
    </form>
</div>

<div id="myModalTransfer" class="modal_transfer">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="pop_up_chose" style="margin-left: 0; display: flex; justify-content: center">
            <form action="additional_actions/transfer_to_first_mech.php" method="post">
                <input type="hidden" id="hidden_id_transfer" name="hidden_id_transfer">
                <input type="submit">
            </form>
        </div>
    </div>

</div>
<?php
include '../module/footer.php';
?>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src = '../../assets/open_modal_transfer.js'></script>
</body>
</html>
