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

    submitHandler: function (form) {
        let $submitBtn = $(form).find(':submit');

        $submitBtn
            .prop('disabled', true)
            .css('cursor', 'not-allowed')
            .text('Submitting...');

        $.ajax({
            url: customActionUrl, // define this globally
            method: 'POST',
            data: $(form).serialize(),
            success: function (response) {
                console.log(response);

                $('#responseMsg').html('<p style="color:green;">' + response.message + '</p>');

                if (response.flag != 'update') {
                    form.reset();
                }
            },
            error: function (xhr) {
                $('#loader').hide();

                // 🛑 Check if session expired or logged out
                if (xhr.status === 419 || xhr.status === 401) {
                    alert('Session expired. Please login again.');
                    window.location.href = '/logout'; // redirect to logout/login page
                    return;
                }

                let res = xhr.responseJSON;
                let messages = '';

                if (res) {
                    // Validation errors (422)
                    if (res.errors) {
                        $.each(res.errors, function (key, val) {
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
            complete: function () {
                $submitBtn
                    .prop('disabled', false)
                    .css('cursor', 'pointer')
                    .text('Submit');
            }
        });
    }
});
