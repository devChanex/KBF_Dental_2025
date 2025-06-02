getclientdata();
function getclientdata() {
    //  document.getElementById("content-table").style.zoom = "70%";
    var fd = new FormData();
    $.ajax({
        url: "services/pendingAppointmentListService.php",
        data: fd,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (result) {
            $('#dataTable').DataTable().destroy();
            $('#dataTable').find('tbody').append(result);
            $('#dataTable').DataTable().draw();

        }


    });
    document.getElementById("content-table").style.zoom = "60%";


}
function approve(clientid, email, fname) {
    var approveDate = prompt("Please enter Date (YYYY-MM-DD)");
    if (approveDate.length != 10) {
        alert("Invalid Date Format");

    } else {
        var fd = new FormData();
        fd.append('clientid', clientid);
        fd.append('date', approveDate);
        $.ajax({

            url: "services/pendingApproveDateUpdateService.php",
            data: fd,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (result) {
                const subject = "Appointment Status - Approved";
                const greetings = "Dear " + fname;
                const msg = `
Hello! This email confirms your upcoming appointment with KBF Dental Care on <strong>${approveDate}</strong> has been <strong>approved</strong>.

<h4 style="margin-top:1em;">📍 How to get here:</h4>
<p>KBF Bldg, Brgy. Ibaba, Sta. Rosa, Laguna<br>
(In front of De Lima Subd.)</p>

<h4>⏰ When to arrive:</h4>
<p><strong>15 minutes before your appointment time</strong></p>

<h4>📌 Cancellation Policy (for patients with reservation):</h4>
<p>Life happens, we get it! If you need to cancel, just let us know <strong>at least 3 days before</strong> your appointment date and your reservation fee won’t be forfeited.</p>
<p>If you cancel <strong>less than 3 days</strong> before your appointment, your reservation fee will be <strong>automatically forfeited</strong>.</p>

<h4>📲 Contact us:</h4>
<p>0947 102 7122</p>
                `.trim();

                sendMail(email, subject, greetings, msg);
                toastReload("successToast", "Appointment Approved Successfully");
                // location.reload();

            }


        });
    }





}


function decline(clientid, email, fname) {
    var x = confirm("Do you want to decline this Appointment?");
    if (x) {
        var fd = new FormData();
        fd.append('clientid', clientid);

        $.ajax({

            url: "services/pendingDeclineDateUpdateService.php",
            data: fd,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (result) {
                sendMail(email, "Appointment Status - Declined", "Dear " + fname, "Sorry, this email confirms that your upcoming appointment with KBF Dental Care has been declined. If you need to reschedule an appointment, please call us.");

                location.reload();

            }


        });
    }


}


