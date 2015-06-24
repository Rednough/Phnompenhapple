


$("#loginForm").submit(function(event)
{ /* LOGIN  */
        event.preventDefault();
        $.post("handler.php",
               {min:$("#min").val(),
               max:$("#max").val(),
               location:$("#loc").val(),
               job:$('#company').val(),
               comp_details:$('#com_details').val(),
               app:$('#app_details').val(),
               request:"signin"},

               function(data,status)
               {
                    if(!data.ok)
                    {
                        var message=data.message;
                        $('#error').text(message).fadeIn(500);
                        //$("#signin-email").val("");
                        //$('#signin-password').val("");
                        $("#min").focus(function(){
                            fadeError(message);
                        });
                        $("#max").focus(function(){
                            fadeError(message);
                        });
                        $("#loc").focus(function(){
                            fadeError(message);
                        });
                        $("#company").focus(function(){
                            fadeError(message);
                        });
                        $("#com_details").focus(function(){
                            fadeError(message);
                        });
                        $("#app_details").focus(function(){
                            fadeError(message);
                        });
                    }
            },
            "json");
});

$("#login-button").click(function(){
     clearSignin();
});

function clearSignin()
{
    $('#min').val("");
    $('#max').val("");
    $('#loc').val("");
    $('#company').val("");
    $('#com_details').val("");
    $('#app_details').val("");
    
}

function fadeError(message)
{
    if($('#error').text()!="")
        $('#error').text(message).fadeOut(500);
}