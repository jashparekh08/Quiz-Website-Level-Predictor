<?php
include "header.php";
include "../connection.php";
$id=$_GET["id"];
$exam_category='';
$res=mysqli_query($link,"select * from exam_category where id=$id");
while($row=mysqli_fetch_array($res))
{
    $exam_category=$row["category"];
}
?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Add Question inside <?php echo "<font color='red'>" .$exam_category. "</font>"; ?></h1>
            </div>
        </div>
    </div>    
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <div class="col-lg-8">
                        <form name="form1" action="" method="post">
                    <div class="card">
                        <div class="card-header"><strong>Add New Questions</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">Add Question</label><input type="text" name="question" placeholder="Add Question" class="form-control"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">Add Opt1</label><input type="text" name="opt1" placeholder="Add Opt1" class="form-control"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">Add Opt2</label><input type="text" name="opt2" placeholder="Add Opt2" class="form-control"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">Add Opt3</label><input type="text" name="opt3" placeholder="Add Opt3" class="form-control"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">Add Opt4</label><input type="text" name="opt4" placeholder="Add Opt4" class="form-control"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">Add Answer</label><input type="text" name="answer" placeholder="Add answer" class="form-control"></div>
                                       
<!------------------------------------------------------------------------- || My Edit || ----------------------------------------------------------------->
                                <div class="form-group"><label for="company" class=" form-control-label">Blooms</label>
                                       
                                    <select id="Bloom" name="blooms" placeholder="Blooms" class="form-control"required>
                                        <option value="Evaluate">Evaluate</option>
                                        <option value="Analyze">Analyze</option>
                                        <option value="Apply">Apply</option>
                                        <option value="Understand">Understand</option>
                                        <option value="Remember">Remember</option>
                                    </select>
                                </div>
<!---------------------------------------------------------------------------------------------------------------------------------------------------------->
                                        <input type="submit" name="submit1" value="Add Question" class="btn btn-success">
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>                           
                    </div>
                </div> 
            </div>
                    <!--/.col-->                                     
        </div>              
    </div><!-- .animated -->
</div><!-- .content -->


<!-- Insert Query -->
<?php
if(isset($_POST["submit1"]))
{
// Code for missing element in question_no if missing then update the question_no
$loop = 0;

$count=0;
$res=mysqli_query($link,"select * from questions where category='$exam_category' order by id asc") or die(mysqli_error($link));
$count=mysqli_num_rows($res);
if($count==0)
{

}
else{
    while($row=mysqli_fetch_array($res))
    {
        $loop=$loop+1;
        mysqli_query($link,"update questions set question_no='$loop' where id=$row[id]");
    }
}
$loop=$loop+1;
mysqli_query($link,"insert into questions values(NULL,'$loop','$_POST[question]','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$_POST[answer]','$exam_category','$_POST[blooms]')") or die(mysqli_error($link));

// for refreshing page 
?>
<script type="text/javascript">
    alert("question added successfully");
    window.location.href=window.location.href;
</script>
<?php

}
?>
<?php
include "footer.php";
?>

