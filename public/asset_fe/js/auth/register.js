function register(route) {
    let name = $("#lname").val();
    let email = $("#lemail").val();
    let password = $("#password1").val();
    let password2 = $("#password2").val();
    let _token = $("input[name=_token]").val();
    $('.errors_child').remove();
    $.ajax({
        url: route,
        type: "POST",
        data: {
            name: name,
            email: email,
            password: password,
            password2: password2,
            _token: _token,
        },
        success: function (response) {
            // console.log(response);
            $('#message_register').css('display', 'none');
            swal("Bạn đã đăng thành công thành công!", {
                icon: "success",
                timer: 1300,
            });
            $("#register")[0].reset();
            $("#login")[0].reset();
            $("#exampleModal2").modal("hide");
            $("#exampleModal").modal("show");
        },
        error: function (data) {

            var errors = data.responseJSON;

            function error(error) {
                let message = "<li class='errors_child'>" + error + "</li>";
                return message;
            };
            $('#message_register').css('display', 'block');
            if (errors.errors.name != undefined) {
                $('#errors').prepend(error(errors.errors.name[0]));
            }
            if (errors.errors.email != undefined) {
                $('#errors').prepend(error(errors.errors.email[0]));
            }
            if (errors.errors.password != undefined) {
                $('#errors').prepend(error(errors.errors.password[0]));
            }



        },
    });
}
