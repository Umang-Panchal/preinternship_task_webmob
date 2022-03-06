$(document).ready(function () {
    $('#add_book_form').validate({
        rules: {
            b_title: {
                required: true
            },
            b_pages: {
                required: true,
                number: true
            },
            b_lang: {
                required: true
            },
            b_author: {
                required: true
            },
            b_img: {
                required: true
            },
            b_isbn: {
                required: true,
                maxlength: 13
            },
            b_desc: {
                required: true
            },
            b_price:{
                required: true,
                number: true
            },
        },
        messages: {
            b_title: {
                required: 'Please Enter Book Title'
            },
            b_pages: {
                required: 'Please Enter Number of Pages in Book',
                number: 'Pages Should be in numbers only'
            },
            b_lang: {
                required: 'Please Enter Book Language'
            },
            b_author: {
                required: 'Please select Author Name of Book'
            },
            b_img: {
                required: 'Please Select Cover Image of Book'
            },
            b_isbn: {
                required: 'Please Enter ISBN Number of Book',
                maxlength: 'Length of ISBN number should be 13 digit'
            },
            b_desc: {
                required: 'Please Enter Description of Book'
            },
            b_price:{
                required:'Please Enter Book Price',
                number: 'Book Price Should be in number only'  
            },
        },
        
        submitHandler: function (form) {
            form.submit();
        }
    });

});