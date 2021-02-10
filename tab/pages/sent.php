<?php
require 'classes/SentCastings.php';
require '../database/Database.php';

use CastingFunctionality\SentCastings;

$sent_castings = new SentCastings();
$sent_castings_data = $sent_castings->GetData();

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
        <caption>Відправленні</caption>
        <thead>
        <tr>
            <th><p class="table_items_p">Номер відливка</p></th>
            <th><p class="table_items_p">Назва відливка</p></th>
            <th><p class="table_items_p">Кількість</p></th>
            <th><p class="table_items_p">Дата відправки</p></th>
            <th><p class="table_items_p">Статус</p></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($sent_castings_data as $sent_castings_item)
        {
            $sent_castings_casting_id = $sent_castings_item['id_castings'];
            $sent_castings_quantity = $sent_castings_item['quantity'];
            $sent_castings_date = $sent_castings_item['send_date'];
            $sent_castings_status = $sent_castings_item['delivery_status'];
            $casting_title = $sent_castings->GetCastingTitle($sent_castings_casting_id);
            $casting_title = $casting_title[0][0];

            echo "
            <tr>
                <td><p class='table_items_p'>$sent_castings_casting_id</p></td>
                <td><p class='table_items_p'>$casting_title</p></td>
                <td><p class='table_items_p'>$sent_castings_quantity</p></td>
                <td><p class='table_items_p'>$sent_castings_date</p></td>
                <td><p class='table_items_p'>$sent_castings_status</p></td>
            </tr>
            ";
        }
        ?>
        </tbody>
    </table>
</div>
<?php
include '../module/footer.php';
?>
</body>
</html>