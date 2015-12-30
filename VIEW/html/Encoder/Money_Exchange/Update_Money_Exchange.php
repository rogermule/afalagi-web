
<?php

require("../../../../CONFIGURATION/Config.php");//this file contains configurations files
require(DB);//this will make the database class included
require("../../../../MODEL/User.php");//user object will be created so it should be included in here
require("../../../../MODEL/City.php");
require("../../../../CONTROLLER/User_Controller.php");
require("../../../../CONTROLLER/Encoder/All_Controllers.php");
require("../../../../CONTROLLER/Controller_Secure_Access.php");//this will prevent this file from being accessed easily
require("../../../../MODEL/User_Type.php");
require("../../../../MODEL/Error_Type.php");

$user = $_SESSION['Logged_In_User'];

$updater = new Encoder_Controller($user);

//check connection
$connected = @fsockopen("www.google.com", 80);
if(!$connected){
    $_SESSION["update_status"] = "fail";
    header("Location: View_Exchange.php");
}
else{
    $buying = "";
    $selling = "";

    $xml = ("http://www.nbe.gov.et/xml/rss.php");
    $xmlDoc = new DOMDocument();
    $xmlDoc->load($xml);

    //get elements from "<channel>"
    $channel=$xmlDoc->getElementsByTagName('channel')->item(0);
    $channel_title = $channel->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
    $channel_link = $channel->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;
    $channel_desc = $channel->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue;

    //output elements from "<channel>"
    echo("<p><a href='" . $channel_link
        . "'>" . $channel_title . "</a>");
    echo("<br>");
    echo($channel_desc . "</p>");

    //get and output "<item>" elements
    $x=$xmlDoc->getElementsByTagName('item');
    for ($i=0; $i<=17; $i++) {
        $item_title=$x->item($i)->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
        $item_link=$x->item($i)->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;
        $item_desc=$x->item($i)->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue;
        $item_date = $x->item($i)->getElementsByTagName('pubDate')->item(0)->childNodes->item(0)->nodeValue;

        //US DOLLAR
        if($item_title == "USD"){
            $main_delimeter = strpos($item_desc,",");
            $buying_sub_string = substr($item_desc,0,$main_delimeter);
            $selling_sub_string = substr($item_desc,$main_delimeter + 3);

            $price_delimeter = strpos($buying_sub_string,":");

            $buying = substr($buying_sub_string,$price_delimeter + 2);
            $selling = substr($selling_sub_string,$price_delimeter + 2);

            $updater->Update_Money_Exchange(1,$buying,$selling,$item_date);

        }
        //BRITISH POUND
        else if($item_title == "GBP"){
            $main_delimeter = strpos($item_desc,",");
            $buying_sub_string = substr($item_desc,0,$main_delimeter);
            $selling_sub_string = substr($item_desc,$main_delimeter + 3);

            $price_delimeter = strpos($buying_sub_string,":");

            $buying = substr($buying_sub_string,$price_delimeter + 2);
            $selling = substr($selling_sub_string,$price_delimeter + 2);

            $updater->Update_Money_Exchange(2,$buying,$selling,$item_date);


        }
        //Euro
        else if($item_title == "EUR"){
            $main_delimeter = strpos($item_desc,",");
            $buying_sub_string = substr($item_desc,0,$main_delimeter);
            $selling_sub_string = substr($item_desc,$main_delimeter + 3);

            $price_delimeter = strpos($buying_sub_string,":");

            $buying = substr($buying_sub_string,$price_delimeter + 2);
            $selling = substr($selling_sub_string,$price_delimeter + 2);

            $updater->Update_Money_Exchange(9,$buying,$selling,$item_date);

        }
        //United Arab Emirates Dirham
        else if($item_title == "AED"){
            $main_delimeter = strpos($item_desc,",");
            $buying_sub_string = substr($item_desc,0,$main_delimeter);
            $selling_sub_string = substr($item_desc,$main_delimeter + 3);

            $price_delimeter = strpos($buying_sub_string,":");

            $buying = substr($buying_sub_string,$price_delimeter + 2);
            $selling = substr($selling_sub_string,$price_delimeter + 2);

            $updater->Update_Money_Exchange(3,$buying,$selling,$item_date);


        }

        //Saudi Rial SAR
        else if($item_title == "SAR"){
            $main_delimeter = strpos($item_desc,",");
            $buying_sub_string = substr($item_desc,0,$main_delimeter);
            $selling_sub_string = substr($item_desc,$main_delimeter + 3);

            $price_delimeter = strpos($buying_sub_string,":");

            $buying = substr($buying_sub_string,$price_delimeter + 2);
            $selling = substr($selling_sub_string,$price_delimeter + 2);

            $updater->Update_Money_Exchange(4,$buying,$selling,$item_date);


        }
        //Swiss Franc
        else if($item_title == "CHF"){
            $main_delimeter = strpos($item_desc,",");
            $buying_sub_string = substr($item_desc,0,$main_delimeter);
            $selling_sub_string = substr($item_desc,$main_delimeter + 3);

            $price_delimeter = strpos($buying_sub_string,":");

            $buying = substr($buying_sub_string,$price_delimeter + 2);
            $selling = substr($selling_sub_string,$price_delimeter + 2);

            $updater->Update_Money_Exchange(5,$buying,$selling,$item_date);

        }
        //Japanese Yen
        else if($item_title == "JPY"){
            $main_delimeter = strpos($item_desc,",");
            $buying_sub_string = substr($item_desc,0,$main_delimeter);
            $selling_sub_string = substr($item_desc,$main_delimeter + 3);

            $price_delimeter = strpos($buying_sub_string,":");

            $buying = substr($buying_sub_string,$price_delimeter + 2);
            $selling = substr($selling_sub_string,$price_delimeter + 2);

            $updater->Update_Money_Exchange(6,$buying,$selling,$item_date);


        }
        //Indian Rupee
        else if($item_title == "INR"){
            $main_delimeter = strpos($item_desc,",");
            $buying_sub_string = substr($item_desc,0,$main_delimeter);
            $selling_sub_string = substr($item_desc,$main_delimeter + 3);

            $price_delimeter = strpos($buying_sub_string,":");

            $buying = substr($buying_sub_string,$price_delimeter + 2);
            $selling = substr($selling_sub_string,$price_delimeter + 2);

            $updater->Update_Money_Exchange(7,$buying,$selling,$item_date);

        }
        //CHINESE YUAN
        else if($item_title == "CHINESE YUAN"){
            $main_delimeter = strpos($item_desc,",");
            $buying_sub_string = substr($item_desc,0,$main_delimeter);
            $selling_sub_string = substr($item_desc,$main_delimeter + 3);

            $price_delimeter = strpos($buying_sub_string,":");

            $buying = substr($buying_sub_string,$price_delimeter + 2);
            $selling = substr($selling_sub_string,$price_delimeter + 2);

            $updater->Update_Money_Exchange(8,$buying,$selling,$item_date);

        }

    }

    $_SESSION["update_status"] = "success";
    header("Location: View_Exchange.php");
}

?>
