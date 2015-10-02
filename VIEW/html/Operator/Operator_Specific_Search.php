<?php

require_once("../../../CONFIGURATION/Config.php");
require_once("../../../MODEL/User.php");
require_once("../../../MODEL/User_Type.php");
require_once("../../../CONTROLLER/User_Controller.php");
require_once("../../../CONTROLLER/Controller_Secure_Access.php");
require_once("../../../CONTROLLER/SearchController.php");


$title="Operator";
$active_menu = "specific";

include "Operator_Header.html";

$controller = new SearchController();

$type = $controller->getCompanyTypeDrop();
$region = $controller->getRegionDrop();

?>


	<div class="margin_top_70">
		<?php
		include('Operator_Navigation.html');
		?>

        <div class="row">
        <?php

           include('Operator_Menu.php');

        ?>

		<div class="col-sm-7 col-sm-offset-1">

		<div class="row col-sm-12 operator_search">

				<h2 class="afalagi_text">Afalagi Specific Search</h2>

            <br />

            <div class="droop">

            </div>

            <form class="specific_search" name="myForm" role="form" action="Operator_Specific_Search.php" method="GET">

                <input type=hidden name=st value=0>

                <div class="form-group">
                    <div class="">
                        <label for="labelsearchfor" class="col-sm-4 control-label" id="labelsearchfor">Search Type: </label>
                    </div>
                    <div class="dropdown">
                        <select name="searchfor">
                            <option value="none">--select one--</option>
                           <?php
                                $options ="";
                                while($results = mysqli_fetch_array($type,MYSQL_ASSOC)){
                                        $options="<option value='".$results['Type']."'>".$results['Type']."</option>";
                                }
                            echo $options;
                            ?>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="">
                        <label for="region" class="col-sm-4 control-label">Region</label>
                    </div>
                    <div class="dropdown">
                        <select name="region">
                            <option value="none">--select one--</option>
                            <?php
                                $options ="";
                                while($results = mysqli_fetch_array($region,MYSQL_ASSOC)){
                                    $options="<option value='".$results['ID']."'>".$results['Name']."</option>";
                                }
                                echo $options;
                            ?>


                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="">
                        <label for="city" class="col-sm-4 control-label">City</label>
                    </div>
                     <div class="dropdown">
                        <select class="" name="city"  onchange="">
                            <option value="none">--select one-</option>

                        </select>
                    </div>

            </div>

            <div class="form-group">
                <div class="">
                    <label for="region" class="col-sm-4 control-label">Sub City</label>
                 </div>
                 <div class="dropdown">
                        <select name="subcity" onchange="">
                            <option value="none">--select one--</option>
                            <option value="volvo">Arada</option>

                        </select>
                 </div>
            </div>

            <div class="form-group">
                <div class="">
                    <label for="region" class="col-sm-4 control-label">Sefer</label>
                </div>
                <div class="dropdown">
                        <select name="sefer" onchange="">
                            <option value="none">--select one--</option>
                            <option value="volvo">Volvo</option>
                            <option value="saab">Saab</option>

                        </select>
                </div>


            </div>

                <div class="form-group margin_top_20">
                    <div class="col-sm-offset-1 col-sm-5">
                        <button type="submit" class="btn btn-primary btn-block bt_specific_search"><strong>Search</strong></button>
                    </div>
                </div>


                <label name="txtHint" ></label>
                <label name="txtHint2" ></label>


            </form>

        </div>
        </div>
		</div>
	</div>



<script type="text/javascript">

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

                for(j=document.myForm.subcity.options.length-1;j>=0;j--)
                {
                    document.myForm.subcity.remove(j);
                }

                var city1=myObject.value.city1;

                var optn = document.createElement("OPTION");
                optn.text = 'Select City';
                optn.value = '';
                document.myForm.city.options.add(optn);
                for (i=0;i<myObject.city.length;i++)
                {
                    var optn = document.createElement("OPTION");
                    optn.text = myObject.city[i];
                    optn.value = myObject.city[i];
                    document.myForm.city.options.add(optn);

                    if(optn.value==city1){
                        var k= i+1;
                        document.myForm.city.options[k].selected=true;
                    }
                }

                //////////////////////////
                for(j=document.myForm.city.options.length-1;j>=0;j--)
                {
                    document.myForm.city.remove(j);
                }

                var subcity1=myObject.value.subcity1;

                //alert(city1);
                for (i=0;i<myObject.city.length;i++)
                {
                    var optn = document.createElement("OPTION");
                    optn.text = myObject.city[i];
                    optn.value = myObject.city[i];
                    document.myForm.city.options.add(optn);
                    if(optn.value==subcity1){
                        document.myForm.city.options[i].selected=true;
                    }
                }

                ///////////////////////////
                document.getElementById("txtHint").style.background='#00f040';
                document.getElementById("txtHint").innerHTML='done';
            }
        }

        var url="drop_down.php";
        var region = myForm.region.value;
        if(choice != 's1'){
            var city=myForm.city.value;
            var subcity=myForm.subcity.value;
        }else{
            var city='';
            var subcity='';
        }
        url=url+"?country="+country;
        url=url+"&city="+city;
        url=url+"&subcity="+subcity;

        myForm.st.value=city;

        document.getElementById("txtHint2").innerHTML=url;
        httpxml.onreadystatechange=stateChanged;
        httpxml.open("GET",url,true);
        httpxml.send(null);
        document.getElementById("txtHint").innerHTML="Please Wait....";
        document.getElementById("txtHint").style.background='#f1f1f1';

    }

</script>

<script type="text/javascript">

    $("document").ready(function(){

    });

</script>


<?php

include "../Includable/Footer.php";

?>