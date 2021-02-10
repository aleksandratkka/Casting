<?php
require 'tab/database/Database.php';
require 'tab/pages/classes/Casting.php';
require 'tab/pages/classes/CounterParty.php';

use CastingFunctionality\Casting;
use CastingFunctionality\CounterParty;
$counterparty = new CounterParty();
$counterparty_data = $counterparty->GetData();
$casting = new Casting();
$casting_data = $casting->GetData();

?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Casting</title>
    <link rel="stylesheet" href="style/css.css">
</head>
<body>

<?php
include 'tab/module/header.php';
?>


<div class="table">
    <table>
        <caption>Відливка</caption>
        <thead>
        <tr>
            <th><p class="table_items_p">Номер відливка</p></th>
            <th><p class="table_items_p">Назва відливка</p></th>
            <th><p class="table_items_p">Розпочати обробку</p></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($casting_data as $casting_item){
            $casting_id = $casting_item['id'];
            $casting_title = $casting_item['title'];
            echo "
            <tr>
                <td><p class='table_items_p'>$casting_id</p></td>
                <td><p class='table_items_p'>$casting_title</p></td>
                <td><p class='table_items_p'><a onclick='OpenModal($casting_id);' >+</a></p></td>
            </tr>
            ";

        }
        ?>
        </tbody>
    </table>
</div>
<div class="new_item_box">
    <p class="new_item_text">Створити відливок: </p>
    <form action="tab/pages/data_treatment/new_casting.php" method="post">
        <input type="text" name="casting_title">
        <input type="submit">
    </form>
</div>
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="pop_up_chose">
            <form action="tab/pages/data_treatment/new_casting_treatment.php" method="post">
                <select name="mech_id" id="mech_id">
                    <option value="0">Механічна обробка №</option>
                    <option value="1">Механічна обробка 1</option>
                    <option value="2">Механічна обробка 2</option>
                </select>
                <input type="text" style="width: 35px" placeholder="Кі-сть" name="quantity">
                <select name="counterparty_id" id="counterparty_id" style="display: none"><br>
                    <option value="0">Контрагент №</option>
                    <?php
                    foreach ($counterparty_data as $counterparty_item){
                        $title = $counterparty_item['title'];
                        $id = $counterparty_item['id'];
                        echo "<option value='$id'>$title</option>";
                    }
                    ?>
                </select>
                <input type="hidden" id="hidden_casting_id" name="casting_id">
                <input type="submit">
            </form>
        </div>


    </div>

</div>

<?php
include 'tab/module/footer.php';
?>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="assets/open_modal.js"></script>
<script>
    $('#mech_id').change(function (){
        var select_val = $('#mech_id option:selected').val();
        if (select_val === '2'){
            console.log(1);
            $('#counterparty_id').show();
        }else{
            $('#counterparty_id').hide();
        }
    })
</script>
</body>
</html>
