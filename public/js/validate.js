

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
            
            $(form).attr('action', customActionUrl);
            form.submit();
        }
    });
     