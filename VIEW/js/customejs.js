
function loadDropDownData(){
$.ajax({
    type: "POST",
    url: "loadData.php",
    data: dataString,
    cache: false,
    success: function(result){
        $(".dropdownsample").innerHTML(result);
    }
});

}