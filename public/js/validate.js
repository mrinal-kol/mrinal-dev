

    $("#reg_form").validate({
        
         rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                message: {
                    required: true,
                    minlength: 10
                }
            },
            messages: {
                name: {
                    required: "Please enter your full name.",
                    minlength: "Your name must be at least 3 characters long."
                },
                email: {
                    required: "Please enter your email address.",
                    email: "Please enter a valid email address."
                },
                password: {
                    required: "Please create a password.",
                    minlength: "Your password must be at least 6 characters long."
                },
                message: {
                    required: "Please write a message.",
                    minlength: "Your message must be at least 10 characters long."
                }
            },
            // Handle form submission programmatically after validation
            submitHandler: function(form) {
            //alert();
            //$(form).attr('action', customActionUrl);
            //form.submit();
               // submitHandler: function(form) {
            $.ajax({
                url: customActionUrl ,
                method: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    //alert();
                    $('#responseMsg').html('<p style="color:green;">' + response.message + '</p>');
                    form.reset();
                },
                error: function(xhr) {
                    let res = xhr.responseJSON;
                    if (res && res.errors) {
                        let messages = '';
                        $.each(res.errors, function(key, val) {
                            messages += '<p style="color:red;">' + val + '</p>';
                        });
                        $('#responseMsg').html(messages);
                    }
                }
            });
        }
    });
     