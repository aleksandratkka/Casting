
$("a[id='button']").click(function(event) {


    var modal = document.getElementById("myModalDefect");

// Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
// When the user clicks on the button, open the modal
    modal.style.display = "block";

    var hidden_input = document.getElementById("hidden_casting_id");
    var hidden_table = document.getElementById("hidden_table");
    var hidden_id = document.getElementById("hidden_id");
    hidden_input.value = event.target.dataset.casting_id;
    hidden_table.value = event.target.dataset.tablename;
    hidden_id.value = event.target.dataset.id;
// When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

});
