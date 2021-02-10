<?php
require 'classes/FinishedCastings.php';
require '../database/Database.php';

use CastingFunctionality\FinishedCastings;

$finished_castings = new FinishedCastings();
$finished_castings_data = $finished_castings->GetData();

?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Finished</title>
    <link rel="stylesheet" href="../../style/css.css">
</head>
<body>

<?php
include '../module/header.php';
?>


<div class="table">
    <table>
        <caption>Готові</caption>
        <thead>
        <tr>
            <th><p class="table_items_p">Номер відливка</p></th>
            <th><p class="table_items_p">Назва відливка</p></th>
            <th><p class="table_items_p">Кількість</p></th>
            <th><p class="table_items_p">Додаткові функції</p></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($finished_castings_data as $finished_castings_item)
        {
            $finished_castings_casting_id = $finished_castings_item['id_casting'];
            $finished_castings_quantity = $finished_castings_item['quantity'];
            $casting_title = $finished_castings->GetCastingTitle($finished_castings_casting_id);
            $casting_title = $casting_title[0][0];
            $finished_castings_id = $finished_castings_item['id'];

            echo "
            <tr>
                <td><p class='table_items_p'>$finished_castings_casting_id</p></td>
                <td><p class='table_items_p'>$casting_title</p></td>
                <td><p class='table_items_p'>$finished_castings_quantity</p></td>
                <td>
                <p class='table_items_multi_p'><a data-tablename_next='finished_castings' data-id_next = '$finished_castings_id' id='button_next' class='aad'>Перевести на наступний процес</a></p>
                <p class='table_items_multi_p'><a data-tablename_back='finished_castings' data-id_back = '$finished_castings_id' id='button_back' class='aad'>Повернути на попередній процес</a></p>
                <p class='table_items_multi_p'><a id='button' data-id = '$finished_castings_id' data-casting_id = '$finished_castings_casting_id' data-tablename='finished_castings'>Списати</a></p>
                <p class='table_items_multi_p'><a id='button_archive' data-id = '$finished_castings_id' data-casting_id = '$finished_castings_casting_id' data-tablename='finished_castings'>Заархівувати</a></p>
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
<script src = '../../assets/open_modal_next_process.js'></script>
<script src = '../../assets/open_modal_back_process.js'></script>
<script src = '../../assets/open_modal_archive.js'></script>
</body>
</html>