<div class="col-sm-12 row margin_top_30 operator_search">

      <div class="row ">

                        <h2 class="afalagi_text"><?php echo $name ?> </h2>
                        </br>
      </div>


      <div class="row afalagi_search ">

           <div class="col-lg-3 btn-info margin_top_10">
               <h4>Desctiption: </h4>
           </div>

           <div class="col-lg-9">
                    <h3><?php
                        if($desc==""){
                            echo "<span class='btn-danger'>Unknown</span>";
                        }

                        else{
                            echo $desc;
                        }
                        ?>
                    </h3>
           </div>

      </div>



      <div class="row afalagi_search ">

            <div class="col-lg-3 btn-info margin_top_10">
                <h4>Company Type: </h4>
            </div>

            <div class="col-lg-9">
                <h3><?php
                    if($type==""){
                        echo "<span class='btn-danger'>Unknown</span>";
                    }

                    else{
                        echo $type;
                    }
                    ?>
                </h3>
            </div>

      </div>


    <div class="row afalagi_search ">

        <div class="col-lg-3 btn-info margin_top_10">
            <h4>Region: </h4>
        </div>

        <div class="col-lg-9">
            <h3><?php
                if($region==""){
                    echo "<span class='btn-danger'>Unknown</span>";
                }

                else{
                    echo $region;
                }
                ?>
            </h3>
        </div>

    </div>

    <div class="row afalagi_search ">

        <div class="col-lg-3 btn-info margin_top_10">
            <h4>City: </h4>
        </div>

        <div class="col-lg-9">
            <h3><?php
                if($city==""){
                    echo "<span class='btn-danger'>Unknown</span>";
                }

                else{
                    echo $city;
                }
                ?>
            </h3>
        </div>

    </div>

    <div class="row afalagi_search ">

        <div class="col-lg-3 btn-info margin_top_10">
            <h4>Sub-City: </h4>
        </div>

        <div class="col-lg-9">
            <h3><?php
                if($subcity==""){
                    echo "<span class='btn-danger'>Unknown</span>";
                }

                else{
                    echo $subcity;
                }
                ?></h3>
        </div>

    </div>

    <div class="row afalagi_search ">

        <div class="col-lg-3 btn-info margin_top_10">
            <h4>Sefer: </h4>
        </div>

        <div class="col-lg-9">
            <h3><?php
                    if($sefer==""){
                        echo "<span class='btn-danger'>Unknown</span>";
                    }

                    else{
                        echo $sefer;
                    }
                ?>
            </h3>
        </div>

    </div>

    <div class="row afalagi_search ">

        <div class="col-lg-3 btn-info margin_top_10">
            <h4>Phone Number: </h4>
        </div>

        <div class="col-lg-9">
            <h3><?php
                if($phone==""){
                    echo "<span class='btn-danger'>Unknown</span>";
                }

                else{
                    echo $phone;
                }
                ?>
            </h3>
        </div>

    </div>

</div>

</div>