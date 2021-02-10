<?php
require 'classes/Locksmith.php';
require '../database/Database.php';

use CastingFunctionality\Locksmith;

$locksmith = new Locksmith();
$locksmith_data = $locksmith->GetData();

?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Locksmith</title>
    <link rel="stylesheet" href="../../style/css.css">
</head>
<body>

<?php
include '../module/header.php';
?>


<div class="table">
    <table>
        <caption>Слюсарня</caption>
        <thead>
        <tr>
            <th><p class="table_items_p">Номер відливка</p></th>
            <th><p class="table_items_p">Назва відливка</p></th>
            <th><p class="table_items_p">Кількість</p></th>
            <th><p class="table_items_p">Дата початку</p></th>
            <th><p class="table_items_p">Дата закінчення</p></th>
            <th><p class="table_items_p">Додаткові функції</p></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($locksmith_data as $locksmith_item)
        {
            $locksmith_casting_id = $locksmith_item['id_casting'];
            $locksmith_quantity = $locksmith_item['quantity'];
            $locksmith_start_date = $locksmith_item['start_time'];
            $locksmith_end_date = $locksmith_item['end_time'];
            $casting_title = $locksmith->GetCastingTitle($locksmith_casting_id);
            $casting_title = $casting_title[0][0];
            $locksmith_id = $locksmith_item['id'];

            echo "
            <tr>
                <td><p class='table_items_p'>$locksmith_casting_id</p></td>
                <td><p class='table_items_p'>$casting_title</p></td>
                <td><p class='table_items_p'>$locksmith_quantity</p></td>
                <td><p class='table_items_p'>$locksmith_start_date</p></td>
                <td><p class='table_items_p'>$locksmith_end_date</p></td>
                <td>
                <p class='table_items_multi_p'><a data-tablename_next='locksmith' data-id_next = '$locksmith_id' id='button_next' class='aad'>Перевести на наступний процес</a></p>
                <p class='table_items_multi_p'><a data-tablename_back='locksmith' data-id_back = '$locksmith_id' id='button_back' class='aad'>Повернути на попередній процес</a></p>
                <p class='table_items_multi_p'><a id='button' data-id = '$locksmith_id' data-casting_id = '$locksmith_casting_id' data-tablename='locksmith'>Списати</a></p>
                <p class='table_items_multi_p'><a id='button_archive' data-id = '$locksmith_id' data-casting_id = '$locksmith_casting_id' data-tablename='locksmith'>Заархівувати</a></p>
                </td>
            </tr>
            ";
        }
        ?>
        </tbody>
    </table>
</div>
<div id="myModalDefect" class="modal_defect">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="pop_up_chose" style="margin-left: 0; display: flex; justify-content: center">
            <form action="additional_actions/defect_action.php" method="post">
                <input type="text" style="width: 45px" placeholder="Кі-сть" name="quantity">
                <input type="hidden" id="hidden_casting_id" name="casting_id">
                <input type="hidden" id="hidden_table" name="hidden_table">
                <input type="hidden" id="hidden_id" name="hidden_id">
                <input type="submit">
            </form>
        </div>
    </div>

</div>
<div id="myModalArchive" class="modal_archive">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="pop_up_chose" style="margin-left: 0; display: flex; justify-content: center">
            <form action="additional_actions/archive_action.php" method="post">
                <input type="text" style="width: 45px" placeholder="Кі-сть" name="quantity">
                <input type="hidden" id="hidden_casting_id_archive" name="casting_id_archive">
                <input type="hidden" id="hidden_table_archive" name="hidden_table_archive">
                <input type="hidden" id="hidden_id_archive" name="hidden_id_archive">
                <input type="submit">
            </form>
        </div>
    </div>

</div>
<div id="myModalNext" class="modal_next">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="pop_up_chose" style="margin-left: 0; display: flex; justify-content: center">
            <form action="additional_actions/transfer_to_next_process.php" method="post">
                <input type="text" style="width: 45px" placeholder="Кі-сть" name="quantity_next">
                <input type="hidden" id="hidden_table_next" name="hidden_table_next">
                <input type="hidden" id="hidden_id_next" name="hidden_id_next">
                <input type="submit">
            </form>
        </div>
    </div>

</div>
<div id="myModalBack" class="modal_back">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="pop_up_chose" style="margin-left: 0; display: flex; justify-content: center">
            <form action="additional_actions/revert_to_previous_process.php" method="post">
                <input type="text" style="width: 45px" placeholder="Кі-сть" name="quantity_back">
                <input type="hidden" id="hidden_table_back" name="hidden_table_back">
                <input type="hidden" id="hidden_id_back" name="hidden_id_back">
                <input type="submit">
            </form>
        </div>
    </div>

</div>
<?php
include '../module/footer.php';
?>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src = '../../assets/open_modal_defect.js'></script>
<script src = '../../assets/open_modal_archive.js'></script>
<script src = '../../assets/open_modal_next_process.js'></script>
<script src = '../../assets/open_modal_back_process.js'></script>
</body>
</html>