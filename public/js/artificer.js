$(function(){
    $('[data-toggle="filter"]').click(function() {
        var $this = $(this);

        $this.toggleClass('active');
        $('.filters').slideToggle();
    });

    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
});
