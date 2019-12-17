    <!--==========================
      Schedule Section
    ============================-->

    <div class="position-absolute w-100 d-flex flex-column p-4">
    <div class="toast ml-auto" role="alert" data-delay="700" data-autohide="false" style="position: absolute; top: 0; right: 0;">
        <div class="toast-header">
            <strong class="mr-auto text-primary">Toast</strong>
            <small class="text-muted">3 mins ago</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="toast-body"> Hey, there! This is a Bootstrap 4 toast. </div>
    </div>
    <div class="toast ml-auto" role="alert" data-delay="700" data-autohide="false">
        <div class="toast-header">
            <strong class="mr-auto text-primary">Another Toast</strong>
            <small class="text-muted">8 mins ago</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="toast-body"> Hey, there! This is a Bootstrap 4 toast. </div>
    </div>
</div>
    <br><br>
    
<section id="schedule" class="section-with-bg">
    <div class="container wow fadeInUp">
        
        <div class="section-header">
            
            <h2>Add New Instructor</h2>
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
            <form id="myForm" enctype="multipart/form-data" method="post" action="<?php echo base_url().'admin/addInstructorProcess'?>" onsubmit="setFormSubmitting()">
                <label for="fullName">Full Name* <small class="text-muted">(academic titles are optional)</small></label>
                <div class="form-group">
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Front title—e.g., Prof. Dr." name="frontAcademic">
                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control" placeholder="Full Name *" required name="fullName">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Back title—e.g., S.T. M.T." name="backAcademic">
                    </div>
                </div>
                </div>

                <div class="form-group">
                <div class="form-row">

                    <div class="col">
                    <label for="jobTitle">Job Title*</label>
                    <input type="text" class="form-control" id="jobTitle" placeholder="e.g., Marketing Director" name="jobTitle" required aria-describedby="titleHelper">
                    <small id="titleHelper" class="form-text text-muted">
                    e.g., Marketing Director at Pertamina
                    </small>
                    </div>

                    <div class="col">
                    <label for="jobTitle">Company/Institution*</label>
                    <input type="text" class="form-control" id="jobTitle" placeholder="e.g., Pertamina" name="company" required>
                    </div>

                </div>
                </div>

                <script type="text/javascript">
                    function showfield(name){
                        if (name=='B') {
                        //  block of code to be executed if condition1 is true
                        document.getElementById('div1').innerHTML='<label for="fullName" style="text-indent: 40px">Bachelor Degree</label><div class="form-group"><div class="form-row"><div class="col" style="margin-left: 40px"><input type="text" class="form-control" placeholder="Major—e.g., Petroleum Engineering" name="bachelorMajor"></div><div class="col"><input type="text" class="form-control" placeholder="University—e.g., Bandung Institute of Technology" name="bachelorUniversity"></div></div></div>';
                        } else if (name=='M') {
                        //  block of code to be executed if the condition1 is false and condition2 is true
                        document.getElementById('div1').innerHTML='<label for="fullName" style="text-indent: 40px">Bachelor Degree</label><div class="form-group"><div class="form-row"><div class="col" style="margin-left: 40px"><input type="text" class="form-control" placeholder="Major—e.g., Petroleum Engineering" name="bachelorMajor"></div><div class="col"><input type="text" class="form-control" placeholder="University—e.g., Bandung Institute of Technology" name="bachelorUniversity"></div></div></div><label for="fullName" style="text-indent: 40px">Master Degree</label><div class="form-group"><div class="form-row"><div class="col" style="margin-left: 40px"><input type="text" class="form-control" placeholder="Major—e.g., Petroleum Engineering" name="masterMajor"></div><div class="col"><input type="text" class="form-control" placeholder="University—e.g., Bandung Institute of Technology" name="masterUniversity"></div></div></div>';
                        } else if (name=='D') {
                        //  block of code to be executed if the condition1 is false and condition2 is false
                        document.getElementById('div1').innerHTML='<label for="fullName" style="text-indent: 40px">Bachelor Degree</label><div class="form-group"><div class="form-row"><div class="col" style="margin-left: 40px"><input type="text" class="form-control" placeholder="Major—e.g., Petroleum Engineering" name="bachelorMajor"></div><div class="col"><input type="text" class="form-control" placeholder="University—e.g., Bandung Institute of Technology" name="bachelorUniversity"></div></div></div><label for="fullName" style="text-indent: 40px">Master Degree</label><div class="form-group"><div class="form-row"><div class="col" style="margin-left: 40px"><input type="text" class="form-control" placeholder="Major—e.g., Petroleum Engineering" name="masterMajor"></div><div class="col"><input type="text" class="form-control" placeholder="University—e.g., Bandung Institute of Technology" name="masterUniversity"></div></div></div><label for="fullName" style="text-indent: 40px">Doctoral Degree </label><div class="form-group"><div class="form-row"><div class="col" style="margin-left: 40px"><input type="text" class="form-control" placeholder="Major—e.g., Petroleum Engineering" name="doctorMajor"></div><div class="col"><input type="text" class="form-control" placeholder="University—e.g., Bandung Institute of Technology" name="doctorUniversity"></div></div></div>';
                        } else{
                            document.getElementById('div1').innerHTML='';
                        }
                    }
                </script>


                <div class="form-group">
                    <label for="latestDegree">Latest Degree</label>
                    <select class="form-control" id="latestDegree" onchange="showfield(this.options[this.selectedIndex].value)">
                        <option value="" selected disabled>Select degree</option>
                        <option value="B">Bachelor</option>
                        <option value="M">Master</option>
                        <option value="D">Doctor</option>
                    </select>
                </div>
                <div id="div1"></div>

                <div class="form-group">
                    <label for="specialization">Specialization</label>
                    <input type="text" class="form-control" id="specialization" placeholder="e.g., Reservoir or Well Log Analysis" name="specialization">
                </div>

                <div class="form-group">
                <div class="form-row">

                    <div class="col">
                    <label for="jobTitle">City Address</label>
                    <input type="text" class="form-control" id="cityAddress" placeholder="e.g., Jakarta" name="cityAddress">
                    </div>

                    <div class="col">
                    <label for="jobTitle">Nationality</label>
                    <input type="text" class="form-control" id="nationality" placeholder="e.g., Indonesia" name="nationality">
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
                        <input type="url" class="form-control" id="inlineFormInputGroup" placeholder="http://" name="linkedin">
                    </div>
                    </div>

                    <div class="col">
                    <label for="inlineFormInputGroup">Facebook</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fab fa-facebook-f"></i></div>
                        </div>
                        <input type="url" class="form-control" id="inlineFormInputGroup" placeholder="http://" name="facebook">
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
                        <input type="url" class="form-control" id="inlineFormInputGroup" placeholder="http://" name="twitter">
                    </div>
                    </div>

                    <div class="col">
                    <label for="inlineFormInputGroup">Instagram</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fab fa-instagram"></i></div>
                        </div>
                        <input type="url" class="form-control" id="inlineFormInputGroup" placeholder="http://" name="instagram">
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
                        <input type="url" class="form-control" id="inlineFormInputGroup" placeholder="http://" name="google_plus">
                    </div>
                    </div>

                    <div class="col">
                    <label for="inlineFormInputGroup">Blog/Website</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fab fa-blogger-b"></i></div>
                        </div>
                        <input type="url" class="form-control" id="inlineFormInputGroup" placeholder="http://" name="web">
                    </div>
                    </div>

                </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="instructor@gmail.com" name="email">
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

/*
    function validate(file) {
        var ext = file.split(".");
        ext = ext[ext.length-1].toLowerCase();      
        var arrayExtensions = ["jpg" , "jpeg", "png", "bmp", "gif"];

        if (arrayExtensions.lastIndexOf(ext) == -1) {
            alert("Wrong extension type.");
            $("#photo").val("");
        }
    }

    $('#photo').change(function () {
        $this = $(this);
        var file = $this[0].files[0];
        if(file.type==="image/jpg" || file.type==="image/jpeg"){
            //valid
            if(file.size <= 300000){
                //valid
            }else{
                //invalid
                showError("maximum 300kb");
                this.value = "";
            }
        }else{
            //invalid
            showError("ga bisa, file type jpg | jpeg");
            this.value = "";
        }
    });

    function showError(message){
        $.toast({ 
            text : message, 
            heading : Warning,
            icon : warning
        })
    }
*/
</script>

<script>
    $('#myForm').areYouSure(
          {
            message: "Did you forget to save your standard coffee order?"
          }
        );

       
</script>