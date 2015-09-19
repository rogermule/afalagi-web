<!--start of frequently asked questions menu-->


    <div class="list-group border_raduis_0">


        <p class="btn btn-info" > Frequently Asked Questions </p>
        <?php
        $dir= '<a href="Operator_Home_Page.php?faq=building" class="list-group-item left_menu ';
        if($active_menu=="Building"){
            $dir.='active">';
        }
        else {
            $dir.='">';
        }
        echo $dir;

        ?>
            <span class="glyphicon glyphicon-home m_r_10"></span>
            Building
        </a>

        <?php
            $dir= '<a href="Operator_Home_Page.php?faq=company" class="list-group-item left_menu ';
            if($active_menu=="company"){
                $dir.='active">';
            }
            else {
                $dir.='">';
            }
            echo $dir;

        ?>

            <span class="glyphicon glyphicon-cloud m_r_10"></span>
            Company

            </a>


        <?php
        $dir= '<a href="Operator_Specific_Search.php" class="list-group-item left_menu ';
        if($active_menu=="hotel"){
            $dir.='active">';
        }
        else {
            $dir.='">';
        }
        echo $dir;

        ?>

        <span class="glyphicon glyphicon-heart m_r_10"></span>
        Hotel

        </a>

        <?php
        $dir= '<a href="Operator_Specific_Search.php" class="list-group-item left_menu ';
        if($active_menu=="telephone"){
            $dir.='active">';
        }
        else {
            $dir.='">';
        }
        echo $dir;

        ?>

        <span class="glyphicon glyphicon-phone m_r_10"></span>
        Telephone

        </a>

        <?php
        $dir= '<a href="Operator_Specific_Search.php" class="list-group-item left_menu ';
        if($active_menu=="event"){
            $dir.='active">';
        }
        else {
            $dir.='">';
        }
        echo $dir;

        ?>

        <span class="glyphicon glyphicon-pencil m_r_10"></span>
        Event

        </a>



        <?php
        $dir= '<a href="Operator_Specific_Search.php" class="list-group-item left_menu ';
        if($active_menu=="hospital"){
            $dir.='active">';
        }
        else {
            $dir.='">';
        }
        echo $dir;

        ?>

        <span class="glyphicon glyphicon-heart m_r_10"></span>
        Hospital

        </a>



        <?php
        $dir= '<a href="Operator_Specific_Search.php" class="list-group-item left_menu ';
        if($active_menu=="school"){
            $dir.='active">';
        }
        else {
            $dir.='">';
        }
        echo $dir;

        ?>

        <span class="glyphicon glyphicon-search m_r_10"></span>
        School

        </a>


        <?php
        $dir= '<a href="Operator_Specific_Search.php" class="list-group-item left_menu ';
        if($active_menu=="street"){
            $dir.='active">';
        }
        else {
            $dir.='">';
        }
        echo $dir;

        ?>

        <span class="glyphicon glyphicon-step-forward m_r_10"></span>
        Streets

        </a>



        <?php
        $dir= '<a href="Operator_Specific_Search.php" class="list-group-item left_menu ';
        if($active_menu=="bank"){
            $dir.='active">';
        }
        else {
            $dir.='">';
        }
        echo $dir;

        ?>

        <span class="glyphicon glyphicon-book m_r_10"></span>
        Banks

        </a>



        <?php
        $dir= '<a href="Operator_Specific_Search.php" class="list-group-item left_menu ';
        if($active_menu=="cinema"){
            $dir.='active">';
        }
        else {
            $dir.='">';
        }
        echo $dir;

        ?>

        <span class="glyphicon glyphicon-move m_r_10"></span>
        Cinema

        </a>
    </div>

<!--end of the left side menu-->