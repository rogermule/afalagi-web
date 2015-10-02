

function ajaxFunction(choice)
{

    var httpxml;
    try
    {
        // Firefox, Opera 8.0+, Safari
        httpxml=new XMLHttpRequest();
    }
    catch (e)
    {
        // Internet Explorer
        try
        {
            httpxml=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e)
        {
            try
            {
                httpxml=new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e)
            {
                alert("Your browser does not support AJAX!");
                return false;
            }
        }
    }
    function stateChanged()
    {
        if(httpxml.readyState==4)
        {
            //alert(httpxml.responseText);
            var myObject = JSON.parse(httpxml.responseText);

            for(j=document.myForm.state.options.length-1;j>=0;j--)
            {
                document.myForm.state.remove(j);
            }

            var state1=myObject.value.state1;

            var optn = document.createElement("OPTION");
            optn.text = 'Select State';
            optn.value = '';
            document.myForm.state.options.add(optn);
            for (i=0;i<myObject.state.length;i++)
            {
                var optn = document.createElement("OPTION");
                optn.text = myObject.state[i];
                optn.value = myObject.state[i];
                document.myForm.state.options.add(optn);

                if(optn.value==state1){
                    var k= i+1;
                    document.myForm.state.options[k].selected=true;
                }
            }

            //////////////////////////
            for(j=document.myForm.city.options.length-1;j>=0;j--)
            {
                document.myForm.city.remove(j);
            }
            var city1=myObject.value.city1;
            //alert(city1);
            for (i=0;i<myObject.city.length;i++)
            {
                var optn = document.createElement("OPTION");
                optn.text = myObject.city[i];
                optn.value = myObject.city[i];
                document.myForm.city.options.add(optn);
                if(optn.value==city1){
                    document.myForm.city.options[i].selected=true;
                }

            }


            ///////////////////////////
            document.getElementById("txtHint").style.background='#00f040';
            document.getElementById("txtHint").innerHTML='done';
            //setTimeout("document.getElementById('txtHint').style.display='none'",3000)
        }
    }

    var url="ajax-dd3ck.php";
    var country=myForm.country.value;
    if(choice != 's1'){
        var state=myForm.state.value;
        var city=myForm.city.value;
    }else{
        var state='';
        var city='';
    }
    url=url+"?country="+country;
    url=url+"&state="+state;
    url=url+"&city="+city;
    url=url+"&id="+Math.random();
    myForm.st.value=state;
    //alert(url);
    document.getElementById("txtHint2").innerHTML=url;
    httpxml.onreadystatechange=stateChanged;
    httpxml.open("GET",url,true);
    httpxml.send(null);
    document.getElementById("txtHint").innerHTML="Please Wait....";
    document.getElementById("txtHint").style.background='#f1f1f1';
}
