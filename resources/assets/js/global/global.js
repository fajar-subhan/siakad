$('a.menu-link').click(function()
{
    $('a.menu-link').removeClass('active');
    $(this).addClass('active');
});