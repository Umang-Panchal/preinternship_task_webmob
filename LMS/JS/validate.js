$(document).ready(function () {
    $('#form').validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            pswd: {
                required: true,
                minlength: 3
            },
        },
        messages: {
            email: {
                required: 'Please enter Email Address.',
                email: 'Please enter a valid Email Address.',
            },
            pswd: {
                required: 'Please enter Password.',
                minlength: 'Password must be at least 3 characters long.',
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});