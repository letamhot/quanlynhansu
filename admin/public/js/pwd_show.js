$(document).ready(function(){
    
    $('.show_pwd').click(function(event) 
    {
        $(this).toggleClass('mdi-eye-off');
        var attr = $('#pwd').attr("type");
        if(attr == "password")
        {   
            $('#pwd').attr("type", "text");
        }
        else
        {
            $('#pwd').attr("type", "password");
        }
    });
});