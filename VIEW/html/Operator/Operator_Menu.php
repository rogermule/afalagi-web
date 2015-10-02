<!--start of left side menu-->


<div class="col-sm-3">

    <div class="list-group border_raduis_0">

        <p class="btn btn-info" > Search Types </p>

        <?php
        $dir= '<a href="Operator_Home_Page.php" class="list-group-item left_menu ';
        if($active_menu=="generic"){
            $dir.='active">';
        }
        else {
            $dir.='">';
        }
        echo $dir;

        ?>
            <span class="glyphicon glyphicon-search m_r_10"></span>
            Generic Search
        </a>

        <?php
            $dir= '<a href="Operator_Specific_Search.php" class="list-group-item left_menu ';
            if($active_menu=="specific"){
                $dir.='active">';
            }
            else {
                $dir.='">';
            }
            echo $dir;

        ?>

            <span class="glyphicon glyphicon-move m_r_10"></span>
            Specific Search

            </a>



    </div>

<?php
    include("Operator_Menu_Frequent.php");

?>


</div>

<!--end of the left side menu-->