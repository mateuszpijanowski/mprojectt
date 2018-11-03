jQuery(function($)
{
    $.scrollTo(0);

    $('.scrollup').click(function() { $.scrollTo($('main'), 500); });
}
);

$(window).scroll(function()
{
    if($(this).scrollTop()>500) $('.scrollup').fadeIn();
    else $('.scrollup').fadeOut();
}
);
