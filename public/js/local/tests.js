var notifier;

$(document).ready(function()
{
    $("#save").hide();
    $("#cancel").hide();
    
    notifier = new Notifier();
    
    initializeSelectsEvents();
    initializeSaveCallback();
    initializeContinueCancelCallbacks();
});

function initializeSelectsEvents()
{
    $('select').change(function()
    {
        $("#continue").hide();
        $("#save").show();
        $("#cancel").show();
    });
}

function initializeSaveCallback()
{
    var callback = function()
    {
        $("#profile" ).fadeOut(800, function() 
        {
            $("#questions").fadeIn(800, function()
            {
                notifier.showInfo("Aviso", "Se han guardado exitosamente tus cambios en el perfil!");
            });
              
            $("#panel").fadeIn(800);
            $("html, body").animate({ scrollTop: 0 }, 800);
        });
    };
    
    $('#save').click(function(event)
    {
        $(event.target).attr('disabled', true);
        $('#cancel').attr('disabled', true);
        
        saveProfile(callback);
    });
}

function initializeContinueCancelCallbacks()
{
    var callback = function()
    {
        $("#profile" ).fadeOut(800, function() 
        {
            $("#questions").fadeIn(800);
            $("#panel").fadeIn(800);
            $("html, body").animate({ scrollTop: 0 }, 800); 
        });
    };
    
    $('#continue').click(function()
    {
        callback();
    });
    
    $('#cancel').click(function()
    {
        callback();
    });
}