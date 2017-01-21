<div id="slider">
    <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 600px; height: 200px; overflow: hidden; visibility: hidden;">
<!-- Loading Screen -->
    <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
        <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
        <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
    </div>
    <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 600px; height: 200px; overflow: hidden;">
        <?php

        include "admin/connection.php";

        $stmt=$con->prepare("SELECT slide_image,orderSlide FROM tbl_slide ORDER BY orderSlide ASC ");
        $stmt->execute();
        $rows=$stmt->fetchAll();
       foreach ($rows as $row){
           echo '
             <div data-p="112.50">
                        <img data-u="image" src="img/slide/'.$row['slide_image'].'" />
                        
             </div>
            
            ';
       }

        ?>
    </div>
        <!--<span data-u="arrowleft" class="jssora08l" style="top:8px;left:8px;width:50px;height:50px;" data-autocenter="1"></span>
        <span data-u="arrowright" class="jssora08r" style="bottom:8px;right:8px;width:50px;height:50px;" data-autocenter="1"></span>-->
    </div>
  </div>
</div>