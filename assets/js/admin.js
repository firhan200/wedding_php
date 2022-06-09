$(document).ready(function(){
    var toast = new bootstrap.Toast($("#liveToast"))

    $('#guest_table').DataTable();

    $(document).on("click", ".copy-text", function(){
        var TempText = document.createElement("input");
        TempText.value = $(this).data('value');
        document.body.appendChild(TempText);
        TempText.select();
        
        document.execCommand("copy");
        document.body.removeChild(TempText);

        $("#liveToast-body").text($(this).data('text'));

        toast.show();
    })
})