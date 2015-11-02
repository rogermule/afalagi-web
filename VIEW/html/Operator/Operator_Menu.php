<!--start of left side menu-->


<div class="col-sm-2">

    <div class="list-group border_raduis_0">

        <p class="btn btn-info" > Search Types </p>

        <?php
        $dir= '<a href="Company_Specific_Search.php" class="list-group-item left_menu ';
        if($active_menu=="company"){
            $dir.='active">';
        }
        else {
            $dir.='">';
        }
        echo $dir;

        ?>
            <span class="glyphicon glyphicon-search m_r_10"></span>
            Company
        </a>

        <?php
            $dir= '<a href="Event_Search_Specific.php" class="list-group-item left_menu ';
            if($active_menu=="event"){
                $dir.='active">';
            }
            else {
                $dir.='">';
            }
            echo $dir;

        ?>

            <span class="glyphicon glyphicon-move m_r_10"></span>
            Event

            </a>



        <?php
        $dir= '<a href="Building_Specific_Search.php" class="list-group-item left_menu ';
        if($active_menu=="building"){
            $dir.='active">';
        }
        else {
            $dir.='">';
        }
        echo $dir;

        ?>

        <span class="glyphicon glyphicon-move m_r_10"></span>
        Building

        </a>



        <?php
        $dir= '<a href="Phone_Specific_Search.php" class="list-group-item left_menu ';
        if($active_menu=="phonenumber"){
            $dir.='active">';
        }
        else {
            $dir.='">';
        }
        echo $dir;

        ?>

        <span class="glyphicon glyphicon-move m_r_10"></span>
        Phone Number

        </a>


        <?php

        $dir= '<a href="Frequently_Asked_Home.php" class="list-group-item left_menu ';
        if($active_menu=="faq"){
            $dir.='active">';
        }
        else {
            $dir.='">';
        }
        echo $dir;

        ?>

        <span class="glyphicon glyphicon-move m_r_10"></span>
         Frequently Asked
        </a>
    </div>



</div>

<!--end of the left side menu-->