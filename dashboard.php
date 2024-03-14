<?php
session_start();
include "header.php";
?>

<div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
        <!-- Start Editing -->
        <br>
        <div class="row">

            <br>
            <div class="col-lg-2 col-lg-push-10">

                <div id="current_que" style="float:left">0</div>
                <div style="float:left">/</div>
                <div id="total_que" style="float:left">0</div>
            </div>

            <div class="row" style="margin-top: 30px">
                <div class="row">
                    <div class="col-lg-10 col-lg-push-1" style="min-height: 300px; background-color: white" id="load_questions">
                    
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 10px">
                
                <div class="col-lg-6 col-lg-push-3" style="min-height: 300px">
                    
                    <div class="col-lg-12 text-center">
                        <input type="button" class="btn btn-warning" value="Previous" onclick="load_previous();">&nbsp; 
                        <input type="button" class="btn btn-success" value="Previous" onclick="load_next();"> 
                    </div>

                </div>
                
            </div>

        </div>
        <!-- End Here Editing -->
    </div>  
</div>

<script type="text/javascript">
    function load_total_que()
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("total_que.php").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","forajax/load_total_que.php",true);
        xmlhttp.send(null);
    }
</script>


<?php
include "footer.php";
?>