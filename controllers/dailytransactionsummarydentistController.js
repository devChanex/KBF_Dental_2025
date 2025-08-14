changeDateToday("from");
getclientdata();
function getclientdata() {
    //  document.getElementById("content-table").style.zoom = "70%";
    //alert("G");
    var dentist = document.getElementById("sdentist").value;
    var group = document.getElementById("group").value;
    var from = document.getElementById("from").value;
    document.getElementById("h3id").innerHTML = "DATE: " + from;
    $("#loading").fadeIn();
    var fd = new FormData();
    fd.append("from", from);
    fd.append("sdentist", dentist);
    fd.append("group", group);
    $.ajax({
        url: "services/dailytransactionsummarydentistservice.php",
        data: fd,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (result) {

            document.getElementById("responseBody").innerHTML = result;

        },
        complete: function () {

            $("#loading").fadeOut();

        }

    });
    document.getElementById("content-table").style.zoom = "60%";
}
