jQuery(function($)
{
    $.scrollTo(0);

    $('.scrollup').click(function()
    {
        $.scrollTo($('#red-line'), 500);
    });
}
);

$(window).scroll(function()
{
    if ($(this).scrollTop()>800) $('.scrollup').fadeIn();
    else $('.scrollup').fadeOut();
});
