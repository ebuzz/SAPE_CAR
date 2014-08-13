$(document).ready(function()
{
    $('#state').change(loadCities);
    $('#city').change(loadSports);
    $('#sport').change(loadFields);
});

function loadCities()
{
    var state = $('#state').val();

    $.get('profile/getcities/' + state)
        .done(function(data)
        {
            var select = $('#city');
            select.empty();

            $.each(data, function(index, item)
            {
                select.append(new Option(item.description, item.idCity));
            });
            
            loadSports();
        });
}

function loadSports()
{
    var city = $('#city').val();

    $.get('profile/getsports/' + city)
        .done(function(data)
        {
            var select = $('#sport');
            select.empty();

            $.each(data, function(index, item)
            {
                select.append(new Option(item.description, item.idSport));
            });
            
            loadFields();
        });
}

function loadFields()
{
    var sport = $('#sport').val();
    
    $.get('profile/getfields/' + sport)
        .done(function(data)
        {
             var div = $('#fields');
             div.empty();
            
            $.each(data, function(index, item)
            {
                
            });
        });
}