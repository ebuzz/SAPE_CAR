$(document).ready(function()
{
    $('#save').click(function()
    {
        var callback = function()
        {
            alert('Guardado');
        };

        saveProfile(callback);
    });
});