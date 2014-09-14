$(document).ready(function()
{
    var note = new Notifier();
	$('#wizard').wizard({
                locale: 'es',
                onCancel: function(){
                    window.location.href ="/";
                },
                onHelp: function(){
                    $.Dialog({
                        title: 'Wizard',
                        content: 'Help button clicked',
                        shadow: true,
                        padding: 10
                    });
                },
                onNext: function(page, wizard)
                {
                	if(page == 2)
                	{
                		//TODO:alert("Check Passes");
                        loadCities();
                	}
                    
                	return validatePage(page);
                },
                onFinish: function(){
                    
                    var data = {};
                    var savedFields = [];
                    var field;

                    data.email = $("#email").val();
                    data.password = $("#password").val();
                    data.passconfirm = $("#passconfirm").val();
                    
                    data.name = $("#name").val();
                    data.firstSurname = $("#firstSurname").val();
                    data.secondSurname = $("#secondSurname").val();
                    data.birthday = $("#birthday").val();
                    data.gender = $("#gender").val();

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
                    
                    $.post('saveUserProfile/-1', data, function(data, status)
                    {
                        if(data == 23000)
                        {
                            note.showAlert("Atención", "Ese correo electronico no esta disponible, por favor selecciona otro")
                        }
                        else
                        {
                            if(data.type == "error")
                            {
                                note.showError(data.caption, data.content);
                            }
                            else if (data.type == "alert")
                            {
                                note.showAlert(data.caption, data.content);
                            }
                            else if(data.type == "validation")
                            {
                                $.each(data.content, function(index, val) {
                                     /* iterate through array or object */
                                     note.showError(data.caption, val);
                                });
                            }
                            else
                            {
                                note.showSuccess(data.caption, data.content, function()
                                {
                                    window.location="{{URL::to('login')}}";
                                })
                            }
                        }

                    });
                }
            });

            function validatePage(page)
            {
                var error = false;
                var message ="";

                switch(page)
                {
                    case 1:
                        var mail = $("#email").val()
                        , password = $("#password").val()
                        , passconfirm = $("#passconfirm").val();
                        var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                        if(mail != "" && password != "" && passconfirm != "")
                        {
                           if(!reg.test(mail))
                            {
                                message = "La cuenta de correo no es válida.";
                                error = true;
                            }
                            else if(password.length < 6)
                            {
                                message = "La contraseña debe de ser igual o mayor a 6 caracteres.";
                                error = true;
                            }
                            else if(password != passconfirm)
                            {
                                message = "Las contraseñas no coinciden.";
                                error = true;
                            }
                        }
                        else
                        {
                            message = "Los campos son obligatorios";
                            error = true;
                        }
                        
                        break;
                    case 2:
                        var nombre = $("#name").val()
                            ,firstSurname = $("#firstSurname").val()
                            , secondSurname = $("#secondSurname").val()
                            , birthday = $("#birthday").val()

                        if(nombre == "" || firstSurname == ""  || birthday == "")
                        {
                            message = "Los campos son obligatorios";
                            error = true;
                        }
                        break;
                    default:
                        break;
                }

                if(error)
                {
                    /*$.Notify({
                        style:
                            {
                                background: "red",
                                color: "white"
                            },
                        caption: "Error!",
                        content: message
                        });*/
                    note.showError("Error!", message);

                }

                return !error;
            }

    

});