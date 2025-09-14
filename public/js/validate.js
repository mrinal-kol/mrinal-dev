

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
            let $submitBtn = $(form).find(':submit'); // find submit button
            //$submitBtn.prop('disabled', true).text('Submitting...'); 
             $submitBtn
                .prop('disabled', true)
                .css('cursor', 'not-allowed')
                .text('Submitting...');
            //$(form).attr('action', customActionUrl);
            //form.submit();
               // submitHandler: function(form) {
            $.ajax({
                url: customActionUrl ,
                method: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    console.log(response);
                    //alert();
                    $('#responseMsg').html('<p style="color:green;">' + response.message + '</p>');

                    if(response.flag!='update'){
                        form.reset();
                    }
                },
                error: function(xhr) {
                    $('#loader').hide();

                    let res = xhr.responseJSON;
                    let messages = '';

                    if (res) {
                        // Validation errors (422)
                        if (res.errors) {
                            $.each(res.errors, function(key, val) {
                                messages += '<p class="text-danger">' + val + '</p>';
                            });
                        }

                        // Runtime exception (500)
                        if (res.message) {
                            messages += '<p class="text-danger">' + res.message + '</p>';
                        }

                        // Optional: show trace in small text (for debugging)
                        if (res.trace) {
                            messages += '<pre class="text-muted">' + res.trace + '</pre>';
                        }
                    } else {
                        messages = '<p class="text-danger">An unknown error occurred.</p>';
                    }

                    $('#responseMsg').html(messages);
                },
                complete: function() {
                    // ✅ Always re-enable submit button after request
                    $submitBtn
                        .prop('disabled', false)
                        .css('cursor', 'pointer')
                        .text('Submit');
                }
            });
        }
    });
     