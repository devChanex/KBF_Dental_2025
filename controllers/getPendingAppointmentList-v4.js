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

$(document).on('click', '.book-btn', function () {
    $('#book-clientid').val($(this).data('clientid'));
    $('#book-fullname').val($(this).data('fullname'));
    $('#book-email').val($(this).data('email'));

});
function approve() {

    var clientid = document.getElementById("book-clientid").value;
    var fname = document.getElementById("book-fullname").value;
    var email = document.getElementById("book-email").value;
    var approveDate = document.getElementById("book-date").value;
    var approveTime = document.getElementById("book-time").value;
    const approveTimeAMPM = formatTimeToAMPM(approveTime);
    if (approveDate === "" || approveTime === "") {
        toastError("Please select a date and time for the appointment.");
        return;
    }
    var fd = new FormData();
    fd.append('clientid', clientid);
    fd.append('date', approveDate);
    fd.append('time', approveTime);
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
<p style="margin: 0 0 8px 0;">Hello! This email confirms your upcoming appointment with <strong>KBF Dental Care</strong> on <strong>${approveDate}</strong> at <strong>${approveTimeAMPM}</strong> has been <strong>approved</strong>.</p>

<h4 style="margin: 4px 0;">📍 How to get here:</h4>
<p style="margin: 0 0 8px 0;">KBF Bldg, Brgy. Ibaba, Sta. Rosa, Laguna<br>
(In front of De Lima Subd.)</p>

<h4 style="margin: 4px 0;">⏰ When to arrive:</h4>
<p style="margin: 0 0 8px 0;"><strong>15 minutes before your appointment time</strong></p>

<h4 style="margin: 4px 0;">📌 Cancellation Policy (for patients with reservation):</h4>
<p style="margin: 0 0 8px 0;">Life happens, we get it! If you need to cancel, just let us know <strong>at least 3 days before</strong> your appointment date and your reservation fee won’t be forfeited.</p>
<p style="margin: 0 0 8px 0;">If you cancel <strong>less than 3 days</strong> before your appointment, your reservation fee will be <strong>automatically forfeited</strong>.</p>

<h4 style="margin: 4px 0;">📲 Contact us:</h4>
<p style="margin: 0;">0947-102-7111</p>
`;
            console.log(msg);
            sendMail(email, subject, greetings, msg);
            toastReload("successToast", "Appointment Approved Successfully");
            // location.reload();

        }


    });






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
                toastReload("successToast", "Appointment declined Successfully");


            }


        });
    }


}


function formatTimeToAMPM(timeStr) {
    const [hourStr, minute] = timeStr.split(':');
    let hour = parseInt(hourStr, 10);
    const ampm = hour >= 12 ? 'PM' : 'AM';
    hour = hour % 12;
    if (hour === 0) hour = 12;
    return `${hour}:${minute} ${ampm}`;
}