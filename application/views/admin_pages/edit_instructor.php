<?php
foreach($query->result_array() as $i){ 
    $id=$i['id'];
    $frontAcademic=$i['academic_title_front'];
    $fullName=$i['name'];
    $backAcademic=$i['academic_title_back'];
    $jobTitle=$i['job_title'];
    $company=$i['company'];
    $specialization=$i['specialization'];
    $cityAddress=$i['city_address'];
    $nationality=$i['nationality'];
    $bachelorMajor=$i['bachelor_major'];
    $bachelorUniversity=$i['bachelor_university'];
    $masterMajor=$i['master_major'];
    $masterUniversity=$i['master_university'];
    $doctorMajor=$i['doctor_major'];
    $doctorUniversity=$i['doctor_university'];
    $linkedin=$i['linkedin'];
    $facebook=$i['facebook'];
    $twitter=$i['twitter'];
    $instagram=$i['instagram'];
    $google_plus=$i['google_plus'];
    $email=$i['email'];
    $web=$i['blog'];
    $photoPath=$i['photo'];
    $docPath=$i['cv'];
}
?>
    <!--==========================
      Schedule Section
    ============================-->
    <br><br>
    
<section id="schedule" class="section-with-bg">
    <div class="container wow fadeInUp">
        
        <div class="section-header">
        <?php
            if($this->session->flashdata('message')=='edit_success'){
                echo '<div class="alert alert-info alert-dismissible fade show mb-3" role="alert"><small>'.$this->session->flashdata('object').' (ID='.$this->session->flashdata('id').') edited</small>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }
        ?>
            
            <h2>Edit <?php echo $fullName.' (ID='.$id.')'; ?></h2>
            <small class="text-muted">(*) is a required field</small>
        </div>
        

        <div class="container wow fadeInUp" style="text-align: right">
            <span>
                <button type="button" class="btn btn-info btn-sm"  onclick="window.location.href = '<?php echo base_url('admin/showInstructors'); ?>';">
                    <i class="fas fa-list"></i>
                </button><br><br>
            </span>
        </div>


        <div class="container wow fadeInUp" style="text-align: left">
            <form id="myForm" enctype="multipart/form-data" method="post" action="<?php echo base_url().'admin/editInstructorProcess/'.$id; ?>" onsubmit="setFormSubmitting()">
                <label for="fullName">Full Name* <small class="text-muted">(academic titles are optional)</small></label>
                <div class="form-group">
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" value="<?php echo $frontAcademic; ?>" name="frontAcademic">
                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control" value="<?php echo $fullName; ?>" required name="fullName">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" value="<?php echo $backAcademic; ?>" name="backAcademic">
                    </div>
                </div>
                </div>

                <div class="form-group">
                <div class="form-row">

                    <div class="col">
                    <label for="jobTitle">Job Title*</label>
                    <input type="text" class="form-control" id="jobTitle" value="<?php echo $jobTitle; ?>" name="jobTitle" required aria-describedby="titleHelper">
                    <small id="titleHelper" class="form-text text-muted">
                    e.g., Marketing Director at Pertamina
                    </small>
                    </div>

                    <div class="col">
                    <label for="jobTitle">Company/Institution*</label>
                    <input type="text" class="form-control" id="jobTitle" value="<?php echo $company; ?>" name="company" required>
                    </div>

                </div>
                </div>


                <?php
                    if($bachelorMajor!='' && !isset($masterMajor)){
                        echo '<div class="form-group">
                        <label for="latestDegree">Latest Degree*</label>
                        <select class="form-control" id="latestDegree" required onchange="showfield1(this.options[this.selectedIndex].value)">
                            <option value="" disabled>Select degree</option>
                            <option value="B" selected>Bachelor</option>
                            <option value="M">Master</option>
                            <option value="D">Doctor</option>
                        </select>
                    </div>
                    <label for="fullName" style="text-indent: 40px">Bachelor Degree</label><div class="form-group"><div class="form-row"><div class="col" style="margin-left: 40px"><input type="text" class="form-control" value='.$bachelorMajor.' name="bachelorMajor"></div><div class="col"><input type="text" class="form-control" value="'.$bachelorUniversity.'" name="bachelorUniversity"></div></div></div><div id="div1"></div>';
                    }
                    elseif($masterMajor=='' && $doctorMajor!=''){
                        echo '<div class="form-group">
                        <label for="latestDegree">Latest Degree*</label>
                        <select class="form-control" id="latestDegree" required onchange="showfield(this.options[this.selectedIndex].value)">
                            <option value="" disabled>Select degree</option>
                            <option value="B">Bachelor</option>
                            <option value="M" selected>Master</option>
                            <option value="D">Doctor</option>
                        </select>
                    </div>
                    <label for="fullName" style="text-indent: 40px">Bachelor Degree</label><div class="form-group"><div class="form-row"><div class="col" style="margin-left: 40px"><input type="text" class="form-control" value='.$bachelorMajor.' name="bachelorMajor"></div><div class="col"><input type="text" class="form-control" value="'.$bachelorUniversity.'" name="bachelorUniversity"></div></div></div><label for="fullName" style="text-indent: 40px">Bachelor Degree</label><div class="form-group"><div class="form-row"><div class="col" style="margin-left: 40px"><input type="text" class="form-control" value='.$masterMajor.' name="masterMajor"></div><div class="col"><input type="text" class="form-control" value="'.$masterUniversity.'" name="masterUniversity"></div></div></div><div id="div2"></div>';
                    }
                    elseif(isset($doctorMajor) || isset($doctorUniversity)){
                        echo '<div class="form-group">
                        <label for="latestDegree">Latest Degree*</label>
                        <select class="form-control" id="latestDegree" required onchange="showfield(this.options[this.selectedIndex].value)">
                            <option value="" disabled>Select degree</option>
                            <option value="B">Bachelor</option>
                            <option value="M">Master</option>
                            <option value="D" selected>Doctor</option>
                        </select>
                    </div>
                    <div id="div1"></div>';
                    }

                ?>

                <script type="text/javascript">
                    function showfield1(name){
                        if (name=='M') {
                        //  block of code to be executed if the condition1 is false and condition2 is true
                        document.getElementById('div1').innerHTML='<label for="fullName" style="text-indent: 40px">Master Degree</label><div class="form-group"><div class="form-row"><div class="col" style="margin-left: 40px"><input type="text" class="form-control" placeholder="Major—e.g., Petroleum Engineering" name="masterMajor"></div><div class="col"><input type="text" class="form-control" placeholder="University—e.g., Bandung Institute of Technology" name="masterUniversity"></div></div></div>';
                        } else if (name=='D') {
                        //  block of code to be executed if the condition1 is false and condition2 is false
                        document.getElementById('div1').innerHTML='<label for="fullName" style="text-indent: 40px">Master Degree</label><div class="form-group"><div class="form-row"><div class="col" style="margin-left: 40px"><input type="text" class="form-control" placeholder="Major—e.g., Petroleum Engineering" name="masterMajor"></div><div class="col"><input type="text" class="form-control" placeholder="University—e.g., Bandung Institute of Technology" name="masterUniversity"></div></div></div><label for="fullName" style="text-indent: 40px">Doctoral Degree </label><div class="form-group"><div class="form-row"><div class="col" style="margin-left: 40px"><input type="text" class="form-control" placeholder="Major—e.g., Petroleum Engineering" name="doctorMajor"></div><div class="col"><input type="text" class="form-control" placeholder="University—e.g., Bandung Institute of Technology" name="doctorUniversity"></div></div></div>';
                        } else{
                            document.getElementById('div1').innerHTML='';
                        }
                    }

                    function showfield2(name){
                        if (name=='D') {
                        //  block of code to be executed if the condition1 is false and condition2 is false
                        document.getElementById('div2').innerHTML='<label for="fullName" style="text-indent: 40px">Master Degree</label><div class="form-group"><div class="form-row"><div class="col" style="margin-left: 40px"><input type="text" class="form-control" placeholder="Major—e.g., Petroleum Engineering" name="masterMajor"></div><div class="col"><input type="text" class="form-control" placeholder="University—e.g., Bandung Institute of Technology" name="masterUniversity"></div></div></div><label for="fullName" style="text-indent: 40px">Doctoral Degree </label><div class="form-group"><div class="form-row"><div class="col" style="margin-left: 40px"><input type="text" class="form-control" placeholder="Major—e.g., Petroleum Engineering" name="doctorMajor"></div><div class="col"><input type="text" class="form-control" placeholder="University—e.g., Bandung Institute of Technology" name="doctorUniversity"></div></div></div>';
                        } else{
                            document.getElementById('div2').innerHTML='';
                        }
                    }
                </script>

                <div class="form-group">
                    <label for="specialization">Specialization</label>
                    <input type="text" class="form-control" id="specialization" value="<?php echo $specialization; ?>" name="specialization">
                </div>

                <div class="form-group">
                <div class="form-row">

                    <div class="col">
                    <label for="jobTitle">City Address</label>
                    <input type="text" class="form-control" id="cityAddress" value="<?php echo $cityAddress; ?>" name="cityAddress">
                    </div>

                    <div class="col">
                    <label for="jobTitle">Nationality</label>
                    <input type="text" class="form-control" id="nationality" value="<?php echo $nationality; ?>" name="nationality">
                    </div>

                </div>
                </div>

                <div class="form-group">
                <div class="form-row">

                    <div class="col">
                    <label for="inlineFormInputGroup">LinkedIn</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fab fa-linkedin-in"></i></div>
                        </div>
                        <input type="http://" class="form-control" id="inlineFormInputGroup" value="<?php echo $linkedin; ?>" name="linkedin">
                    </div>
                    </div>

                    <div class="col">
                    <label for="inlineFormInputGroup">Facebook</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fab fa-facebook-f"></i></div>
                        </div>
                        <input type="http://" class="form-control" id="inlineFormInputGroup" value="<?php echo $facebook; ?>" name="facebook">
                    </div>
                    </div>

                </div>
                </div>

                <div class="form-group">
                <div class="form-row">

                    <div class="col">
                    <label for="inlineFormInputGroup">Twitter</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fab fa-twitter"></i></div>
                        </div>
                        <input type="http://" class="form-control" id="inlineFormInputGroup" value="<?php echo $twitter; ?>" name="twitter">
                    </div>
                    </div>

                    <div class="col">
                    <label for="inlineFormInputGroup">Instagram</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fab fa-instagram"></i></div>
                        </div>
                        <input type="http://" class="form-control" id="inlineFormInputGroup" value="<?php echo $instagram; ?>" name="instagram">
                    </div>
                    </div>

                </div>
                </div>

                <div class="form-group">
                <div class="form-row">

                    <div class="col">
                    <label for="inlineFormInputGroup">Google+</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fab fa-google-plus-g"></i></div>
                        </div>
                        <input type="http://" class="form-control" id="inlineFormInputGroup" value="<?php echo $google_plus; ?>" name="google_plus">
                    </div>
                    </div>

                    <div class="col">
                    <label for="inlineFormInputGroup">Blog/Website</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fab fa-blogger-b"></i></div>
                        </div>
                        <input type="http://" class="form-control" id="inlineFormInputGroup" value="<?php echo $web; ?>" name="web">
                    </div>
                    </div>

                </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" value="<?php echo $email; ?>" name="email">
                </div>

                <div class="form-group">
                <div class="form-row">

                    <div class="col">
                    <label for="cv">Profile Picture</label>
                    <div class="input-group">
                    
                        <div class="input-group-prepend">
                        
                        <div class="input-group-text"><i class="fas fa-portrait"></i></div>
                        
                        </div>
                        
                    <input type="file" class="form-control" id="photo" placeholder="instructor@gmail.com" name="photo" accept="image/jpeg" aria-describedby="photoHelper">
                    
                    </div>
                    <small id="photoHelper" class="form-text text-muted">
                    Only jpg/jpeg. Maximum size: 300 kb.
                    </small>
                    <?php if($photoPath!=''){ ?>
                        <object width="auto" height="200" data="<?php echo base_url().'uploads/img/'.$photoPath;?>" type="image/jpg"></object>
                        <a class="btn btn-sm btn-warning" href="<?php echo site_url('admin/processDeletePhoto/'.$id.''); ?>"><i class="fas fa-edit"></i> Remove photo</a>
                    <?php } ?>
                    </div>

                    <div class="col">
                    <label for="cv">CV/Portofolio</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="far fa-file-alt"></i></div>
                        </div>
                    <input type="file" class="form-control" id="cv" placeholder="instructor@gmail.com" name="cv" accept="application/pdf" aria-describedby="docHelper">
                    </div>
                    <small id="docHelper" class="form-text text-muted">
                    Only pdf. Maximum size: 1 mb.
                    </small>
                    <?php if($docPath!=''){ ?>
                        <object width="auto" height="400" data="<?php echo base_url().'uploads/doc/'.$docPath;?>" type="application/pdf"></object>
                        <a class="btn btn-sm btn-warning" href="<?php echo site_url('admin/processDeleteCV/'.$id.''); ?>"><i class="fas fa-edit"></i> Remove CV</a>
                    <?php } ?>
                    </div>


                </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                

            </form>


        </div>
    
        <div class="tab-content row justify-content-center">
        </div>

    </div>

</section>


<script src="<?php echo base_url().'assets/AreYouSure/jquery.are-you-sure.js' ?>"></script>
<script src="<?php echo base_url().'assets/AreYouSure/ays-beforeunload-shim.js' ?>"></script>
<script type="text/javascript">
  function form_submit() {
    document.getElementById("search_form").submit();
   }    

	$(document).ready(function(){
		$('#mydata').DataTable(
            {
                responsive: true
            }
        );
	});

    /*window.onbeforeunload = function(){
        myfun();
        return 'You have not finished the form. Are you sure you want to leave?';
    };

    function myfun(){
        // Write your business logic here
        console.log('hello');
    }

    window.onunload = function() {
    myfun();
    alert('Bye.');
    }*/

    var uploadField1 = document.getElementById("photo");
    var uploadField2 = document.getElementById("cv");

    uploadField1.onchange = function() {
        if(this.files[0].size > 314572){
             this.value = "";
             $.toast({
                 heading: 'Warning',
                 text: 'Maximum size of Profile Picture is 300 kb',
                 icon: 'warning',
                 hideAfter: 4000
             })
        };
        var ext = $('#photo').val().split('.').pop().toLowerCase();
        if($.inArray(ext, ['jpg','jpeg']) == -1) {
            $.toast({
                 heading: 'Warning',
                 text: 'Only .jpg files are allowed for Profile Picture',
                 icon: 'warning',
                 hideAfter: 4000
             })
             this.value = "";
        }
    };

    uploadField2.onchange = function() {
        if(this.files[0].size > 1048576){
            $.toast({
                 heading: 'Warning',
                 text: 'Maximum size of CV/Portofolio is 1 mb',
                 icon: 'warning',
                 hideAfter: 4000
             })
        this.value = "";
        };
        var ext = $('#cv').val().split('.').pop().toLowerCase();
        if($.inArray(ext, ['pdf']) == -1) {
            $.toast({
                 heading: 'Warning',
                 text: 'Only .pdf files are allowed for CV/Portofolio',
                 icon: 'warning',
                 hideAfter: 4000
             })
             this.value = "";
        }
    };
</script>

<script>
    $('#myForm').areYouSure(
          {
            message: "Did you forget to save your standard coffee order?"
          }
        );
</script>