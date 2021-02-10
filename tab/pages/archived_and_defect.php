<?php
require 'classes/Archive.php';
require 'classes/Defect.php';
require '../database/Database.php';

use CastingFunctionality\Archive;
use CastingFunctionality\Defect;

$archive = new Archive();
$archive_data = $archive->GetData();

$defect = new Defect();
$defect_data = $defect->GetData();


?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Archived</title>
    <link rel="stylesheet" href="../../style/css.css">
</head>
<body>

<?php
include '../module/header.php';
?>


<div class="table">
    <table>
        <caption>Архів</caption>
        <thead>
        <tr>
            <th><p class="table_items_p">Номер відливка</p></th>
            <th><p class="table_items_p">Назва відливка</p></th>
            <th><p class="table_items_p">Кількість</p></th>
            <th><p class="table_items_p">Дата архівування</p></th>
            <th><p class="table_items_p">Видалити</p></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($archive_data as $archive_item)
        {
            $archive_casting_id = $archive_item['id_casting'];
            $archive_quantity = $archive_item['quantity'];
            $archive_date = $archive_item['archived_time'];
            $casting_title = $archive->GetCastingTitle($archive_casting_id);
            $casting_title = $casting_title[0][0];
            $id = $archive_item['id'];
            echo "
            <tr>
                <td><p class='table_items_p'>$archive_casting_id</p></td>
                <td><p class='table_items_p'>$casting_title</p></td>
                <td><p class='table_items_p'>$archive_quantity</p></td>
                <td><p class='table_items_p'>$archive_date</p></td>
                <td><p class='table_items_p'><a class='aad' id='button_delete' data-id='$id' data-tablename = 'archive'>&times;</a></p></td>
            </tr>
            ";
        }
        ?>
        </tbody>
    </table>
</div>
<div class="table">
    <table>
        <caption>Брак</caption>
        <thead>
        <tr>
            <th><p class="table_items_p">Номер відливка</p></th>
            <th><p class="table_items_p">Назва відливка</p></th>
            <th><p class="table_items_p">Кількість</p></th>
            <th><p class="table_items_p">Дата списання</p></th>
            <th><p class="table_items_p">Видалити</p></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($defect_data as $defect_item)
        {
            $defect_casting_id = $defect_item['id_casting'];
            $defect_quantity = $defect_item['quantity'];
            $defect_date = $defect_item['discard_time'];
            $casting_title = $archive->GetCastingTitle($defect_casting_id);
            $casting_title = $casting_title[0][0];
            $id = $defect_item['id'];

            echo "
            <tr>
                <td><p class='table_items_p'>$defect_casting_id</p></td>
                <td><p class='table_items_p'>$casting_title</p></td>
                <td><p class='table_items_p'>$defect_quantity</p></td>
                <td><p class='table_items_p'>$defect_date</p></td>
                <td><p class='table_items_p'><a class='aad' id='button_delete' data-id='$id' data-tablename = 'defect'>&times;</a></p></td>
            </tr>
            ";
        }
        ?>
        </tbody>
    </table>
</div>
<div id="myModalDelete" class="modal_delete">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="pop_up_chose" style="margin-left: 0; display: flex; justify-content: center">
            <form action="additional_actions/remove_archive_defect.php" method="post">
                <input type="hidden" id="hidden_table_delete" name="hidden_table_delete">
                <input type="hidden" id="hidden_id_delete" name="hidden_id_delete">
                <input type="submit">
            </form>
        </div>
    </div>

</div>
<?php
include '../module/footer.php';
?>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src = '../../assets/open_modal_remove.js'></script>
</body>
</html>
