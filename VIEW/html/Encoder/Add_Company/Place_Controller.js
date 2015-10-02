
$(document).ready( function(){

    $("#Building").change( function(){
        var selected = $(this).val();
        if(selected == "NOT_FILLED"){
            Enable_Place_Forms();
        }
        else{
            Disable_Place_Forms();
        }
    });



});

//this will enable the place forms
function Enable_Place_Forms(){
    $(".place").removeAttr('disabled');
}

//this will enable place forms
function Disable_Place_Forms(){
    $(".place").attr('disabled','disabled');
}




