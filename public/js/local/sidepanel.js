$(document).ready(function()
{
    var pb = $("#progress").progressbar();
    pb.progressbar('color', '#A3A3A3');
    pb.progressbar('value', 33);
});

$(function() 
{
    var side_menu = $('#panel');

    var windowTop = $(window).scrollTop;
    var fixblock_pos = side_menu.position().top;

    $(window).scroll(function()
    {
        if ($(window).scrollTop() + 65 > fixblock_pos)
        {
            side_menu.css({'position': 'fixed', 'top':'65px', 'z-index':'1000'});
        } 
        else 
        {
            side_menu.css({'position': 'relative', 'top':'95px'});
        }
    });
});