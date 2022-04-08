$(document).ready(function() {
    // $('#part-1').on('click', function(event) {
    // 	event.preventDefault();

    // 	$('html, body').animate({scrollTop: 1500},400);
    // });

    $('.col-md-6 a').click(function(event) {
        event.preventDefault();

        part = $(this).attr('href'); // lấy id của thẻ h2 tương ứng
        // console.log(part);

        position = $(part).offset().top; // tìm vị trí thẻ h2

        // $('#part-1').offset().top;
        // hiệu ứng
        $('html, body').animate({ scrollTop: position }, 1400, 'easeInOutSine');
    });
});

$("#contact-form").validator().on("submit", function(event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});
//SubmitForm
function submitForm() {
    // Initiate Variables With Form Content
    var name = $("#name").val();
    var email = $("#email").val();
    var subject = $("#subject").val();
    var message = $("#message").val();

    $.ajax({
        type: "POST",
        url: "process.php",
        data: "name=" + name + "&email=" + email + "&subject=" + subject + "&message=" + message,
        success: function(text) {
            if (text == "success") {
                formSuccess();
            }
        }
    });
}

function formSuccess() {
    $("#msgSubmit").removeClass("hidden");
}