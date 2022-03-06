$(document).ready(function () {
    $('#add_author_form').validate({
        rules: {
            a_fname: {
                required: true
            },
            a_lname: {
                required: true,
            },
            a_dob: {
                required: true,
            },
            a_gen:{
                required: true
            },
            a_address:{
                required: true
            },
            a_mobile_no:{
                required: true,
                number: true
            },
            a_desc:{
                required: true
            }
        },
        messages: {
            a_fname: {
                required: 'Please Enter Authors First Name',
            },
            a_lname: {
                required: 'Please Enter Authors last Name',
            },
            a_dob: {
                required: 'Please Select Authors Date of Birth',
            },
            a_gen:{
                required: 'Please Select Gender of Author'
            },
            a_address:{
                required: 'Please Enter Address of Author'
            },
            a_mobile_no:{
                required: 'Please Enter Mobile no of Author',
                number: 'Mobile no should be in numbers only' 
            },
            a_desc:{
                required: 'Please Enter Description about author'
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});