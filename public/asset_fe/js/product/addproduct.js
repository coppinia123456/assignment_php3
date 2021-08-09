function addproduct(route,id,token) {

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
            id: id,
            _token: token,
           
        },
        success: function (response) {
            let id = response.id;
            console.log(response);
            // $('#message_error').remove();
            if (response["success"]) {
                console.log(response["success"]);
                swal(response["success"], {
                            icon: "success",
                            timer: 1000,
                        });
            }
            else {
                swal(response["errors"], {
                    icon: "error",
                    timer: 1300,
                });
            
            }

        },

    });


};