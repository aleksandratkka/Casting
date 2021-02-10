$("a[id='button_back']").click(function(event) {

    var modal = document.getElementById("myModalBack");

// Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
// When the user clicks on the button, open the modal
    modal.style.display = "block";

    var hidden_table = document.getElementById("hidden_table_back");
    var hidden_id = document.getElementById("hidden_id_back");
    hidden_table.value = event.target.dataset.tablename_back;
    hidden_id.value = event.target.dataset.id_back;
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
