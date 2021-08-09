



function login(route) {

    let email = $('#email').val();
    let password = $('#password').val();
    let remember = "";
    let _token = $('input[name=_token]').val();
    if ($('#customControlAutosizing').prop('checked')) {
        remember = "1";
    }
    $.ajax({
        url: route,
        type: "POST",
        data: {
            email: email,
            password: password,
            remember_token: remember,
            _token: _token,
        },
        success: function (response) {
            let id = response.id;
            console.log(response);
            $('#message_error').remove();
            if (response["error"]) {
                
                let message = "<div class='alert alert-danger alert-dismissible fade show' id='message_error' role='alert'><strong>" + response["error"] + "</strong> <button type='button' class='close' data-dismiss='alert' aria-label='Close' style='color:black; opacity: 01;'><span aria-hidden='true' style='color:black'>&times;</span></button></div>";
                $('#message').prepend(message);
            }
            else{
               swal("Bạn đã đăng nhập thành công!", {
                icon: "success",
                timer: 2000,
            }
            ); 
            $('#login')[0].reset();
            $('#exampleModal').modal('hide');
            location.reload()
            }

        },

    });


};