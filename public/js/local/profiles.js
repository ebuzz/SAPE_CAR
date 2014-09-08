/******************************************************************************
*
* Carga de datos asíncrona de información de perfil
*
******************************************************************************/

$(document).ready(function()
{
    $('#state').change(loadCities);
    $('#city').change(loadSports);
    $('#sport').change(loadFields);
    
    initializeFieldValuesChangeEvent();
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
            
            $.each(data, function(index, field)
            {
                var selectDiv = $('<div class="input-control select"></div>');
                var label = $('<label></label>'); 
                var select = $('<select class="input-control select"></select>');
                
                $(label).html(field.name);          
                $(select).attr('id', 'valueOf-' + field.idSportField + '-0');
                select.empty();
                
                $.each(field.values, function(index, value)
                {
                    if (value.parent.length === 0)
                    {
                        select.append(new Option(value.description, value.idFieldValue));
                    }
                });
                
                selectDiv.append(label);
                selectDiv.append(select);
                div.append(selectDiv);
            });
            
            initializeFieldValuesChangeEvent();
        });
}

function initializeFieldValuesChangeEvent()
{
    $("select[id^='valueOf-']").change(function(event)
    {
        loadChildValues(event.target);
    });
}

function loadChildValues(select)
{
    var parentValue = $(select).val();
    var parentIndex = getIndex(select);
    
    var callback = function(data)
    {
        removeChildsSelects(select);
        var div = $('#fields');

        if (data.length > 0)
        {
            var selectDiv = $('<div class="input-control select"></div>');
            var newSelect = $('<select></select>');

            $.each(data, function(index, value)
            {
                newSelect.append(new Option(value.description, value.idFieldValue));
                $(newSelect).attr('id', 'valueOf-' + value.idSportField + '-' + (parentIndex + 1));
            });

            selectDiv.append(newSelect);
            $(select).parent().after(selectDiv);
        }
    };
    
    $.get('profile/getchildvalues/' + parentValue)
        .done(callback);
}

function removeChildsSelects(select)
{
    var prefix = getPrefix(select);
    var parentIndex = getIndex(select);
    var index;
    
    $("select[id^='" + prefix + "']").each(function (index, childSelect)
    {
        index = getIndex(childSelect);
        
        if (index > parentIndex)
        {
            $(childSelect).parent().remove();
        }
    });
}

function getPrefix(select)
{
    var to = select.id.lastIndexOf('-') + 1;
    
    return select.id.substring(0, to);
}

function getIndex(select)
{
    var from = select.id.lastIndexOf('-') + 1;
    var to = select.id.length;
    
    return parseInt(select.id.substring(from, to));
}

/******************************************************************************
*
* Guardado de perfil
*
******************************************************************************/

function saveProfile(callback)
{
    var data = {};
    var savedFields = [];
    var field;
    
    data.role = $('#role').val();
    data.city = $('#city').val();
    data.sport = $('#sport').val();
    data.values = [];
    
    $("select[id^='valueOf-']").each(function (index, select)
    {
        field = getPrefix(select);
        
        if (savedFields.indexOf(field) == -1)
        {
            savedFields.push(field);
            data.values.push($(getLowerLevelSelect(field)).val());
        }
    });
    
    $.post('profile/saveProfile', data)
        .done(callback);
}

function getLowerLevelSelect(prefix)
{
    var lowerSelect = null;
    var lowerIndex;
    var currentIndex;
    
    $("select[id^='" + prefix + "']").each(function (index, select)
    {
        if (lowerSelect == null)
        {
            lowerSelect = select;
        }
        else
        {
            lowerIndex = getIndex(lowerSelect);
            currentIndex = getIndex(select);
            
            if (currentIndex > lowerIndex)
            {
                lowerSelect = select;
            }
        }
    });
    
    return lowerSelect;
}