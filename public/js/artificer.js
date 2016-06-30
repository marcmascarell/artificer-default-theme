$(function(){
    $('[data-toggle="filter"]').click(function() {
        var $this = $(this);

        $this.toggleClass('active');
        $('.filters').slideToggle();
    })
});