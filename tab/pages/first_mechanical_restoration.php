<?php
require 'classes/FirstMechanical.php';
require '../database/Database.php';

use CastingFunctionality\FirstMechanical;

$mechanical = new FirstMechanical();
$mechanical_data = $mechanical->GetData();

?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mechanical_1</title>
    <link rel="stylesheet" href="../../style/css.css">
</head>
<body>

<?php
include '../module/header.php';
?>


<div class="table">
    <table>
        <caption>Механічна обробка 1</caption>
        <thead>
            <tr>
                <th><p class="table_items_p">Номер відливка</p></th>
                <th><p class="table_items_p">Назва відливка</p></th>
                <th><p class="table_items_p">Кількість</p></th>
                <th><p class="table_items_p">Дата початку</p></th>
                <th><p class="table_items_p">Дата закінчення</p></th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($mechanical_data as $mechanical_item)
        {
            $mechanical_casting_id = $mechanical_item['id_casting'];
            $mechanical_quantity = $mechanical_item['quantity'];
            $mechanical_start_date = $mechanical_item['start_performing'];
            $mechanical_end_date = $mechanical_item['end_performing'];
            $casting_title = $mechanical->GetCastingTitle($mechanical_casting_id);
            $casting_title = $casting_title[0][0];

            echo "
            <tr>
                <td><p class='table_items_p'>$mechanical_casting_id</p></td>
                <td><p class='table_items_p'>$casting_title</p></td>
                <td><p class='table_items_p'>$mechanical_quantity</p></td>
                <td><p class='table_items_p'>$mechanical_start_date</p></td>
                <td><p class='table_items_p'>$mechanical_end_date</p></td>
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