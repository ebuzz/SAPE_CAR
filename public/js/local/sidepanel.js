var progressInfo;
var progressBar;

var totalQuestions;
var answeredQuestions;

$(document).ready(function()
{
    progressInfo = $("#progress-data");
    progressBar = $("#progress-bar").progressbar();
    progressBar.progressbar('color', '#A3A3A3'); 
    
    initializeSideMenu();
    totalQuestions = $("div[id^='question-container-']").size();
    showProgress();
    
    $("input[id^='question-']").click(function()
    {
        showProgress();
    });
});

function showProgress()
{
     answeredQuestions = $("input[type='radio']:checked").size();
    
     var info = answeredQuestions.toString() + "/" + totalQuestions.toString();
     var progress = (answeredQuestions / totalQuestions) * 100;
    
     $(progressInfo).html(info);
     progressBar.progressbar('value', progress);
}

function initializeSideMenu() 
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
}