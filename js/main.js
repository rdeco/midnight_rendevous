$( document ).ready(function() {
    $('.thumbnail img').hover(function () {
        var url = $(this).attr('src');
        console.log("Img src:", url);
        $('div.productDetail img').first().attr('src', url);
    });
});