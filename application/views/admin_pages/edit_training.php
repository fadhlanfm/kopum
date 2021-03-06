<?php
foreach($query->result_array() as $t){ 
    $id=$t['id'];
    $topic=$t['topic'];
    $city=$t['city'];
    $venue=$t['venue'];
    $format=$t['format'];
    $discipline_1=$t['discipline_1'];
    $discipline_2=$t['discipline_2'];
    $discipline_3=$t['discipline_3'];
    $start_date=$t['start_date'];
    $end_date=$t['end_date'];
    $fee_for_member=$t['fee_for_member'];
    $fee_for_nonmember=$t['fee_for_nonmember'];
    $synopsis=$t['synopsis'];
    $reservation_link=$t['reservation_link'];
    $contact_person_1=$t['contact_person_1'];
    $telephone_1=$t['telephone_1'];
    $contact_person_2=$t['contact_person_2'];
    $telephone_2=$t['telephone_2'];
    $additional_information=$t['additional_information'];
    $proposal=$t['proposal'];
    $flyer=$t['flyer'];
}
?>

    <!--==========================
      Schedule Section
    ============================-->
    <br><br>
    
<section id="schedule" class="section-with-bg">
    <div class="container wow fadeInUp">
        
        <div class="section-header">
            
            <h2>Edit <?php echo $topic.' (ID='.$id.')'; ?></h2>
            <small class="text-muted">(*) is a required field</small>
        </div>
        

        <div class="container wow fadeInUp" style="text-align: right">
            <span>
                <button type="button" class="btn btn-info btn-sm"  onclick="window.location.href = '<?php echo base_url('admin/showTrainings'); ?>';">
                    <i class="fas fa-list"></i>
                </button><br><br>
            </span>
        </div>


        <div class="container wow fadeInUp" style="text-align: left">
            <form id="myForm" enctype="multipart/form-data" method="post" action="<?php echo base_url().'admin/editTrainingProcess/'.$id; ?>" onsubmit="return valthis()">
                <label for="topic">Topic*</label>
                <div class="form-group">
                <div class="form-row">
                        <input type="text" class="form-control" placeholder="Main Topic" name="topic" required value="<?php echo $topic; ?>">
                </div>
                </div>

                <div class="form-group">
                <div class="form-row">

                    <div class="col">
                    <label for="city">City*</label>
                    <input type="text" class="form-control" id="city" placeholder="e.g., Jakarta" name="city" required value="<?php echo $city; ?>">
                    </div>

                    <div class="col">
                    <label for="venue">Venue</label>
                    <input type="text" class="form-control" id="venue" placeholder="e.g., JCC" name="venue" value="<?php echo $venue; ?>">
                    </div>

                </div>
                </div>

                <fieldset class="form-group">
                    <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Instructor*<br><small class="text-muted">(select max 5)</small></legend>
                    <div class="col-sm-10" >
                    <textarea class="form-control" rows="1" disabled id="selectedInstructors" style="height:38px"></textarea>
                    <input type="text" id="search_instructor" placeholder="Search instructor" class="form-control col-sm-10">
                    <div class="col-sm-10" style="overflow:scroll; height: 140px">
                    <?php foreach($query_instructors->result_array() as $i){ 
                                $instructor=$i['name'];
                                $id_instructor=$i['id']; 
                                
                                
                                    
                    ?>
                        <div class="form-check" >
                        <input class="form-check-input checkInstructor limit_instructor" type="checkbox" name="instructor[]" value="<?php echo $id_instructor; ?>" id="<?php echo 'instructor'.$id_instructor; ?>" <?php foreach($query_trainings_and_instructors->result_array() as $tai){ 
                                    $id_tai=$tai['id'];
                                    $id_instructor_tai=$tai['id_instructor']; if($id_instructor==$id_instructor_tai){echo 'checked';} }?>>
                        <label class="form-check-label instructors" for="<?php echo 'instructor'.$id_instructor; ?>">
                            <?php echo $instructor; ?>
                        </label>
                        </div>
                    <?php } ?>
                    </div>
                    </div>
                </fieldset>

                <fieldset class="form-group">
                    <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Discipline*<br><small class="text-muted">(select max 3)</small></legend>
                    <div class="col-sm-10" style="overflow:scroll; height: 140px">
                    <?php foreach($query_disciplines->result_array() as $d){ 
                                $checkDiscipline=$d['discipline'];
                                $id_discipline=$d['id']; ?>
                        <div class="form-check">
                        <input class="form-check-input checkDiscipline limit_discipline" type="checkbox" name="discipline[]" value="<?php echo $id_discipline; ?>" id="<?php echo 'discipline'.$id_discipline; ?>" <?php if($discipline_1==$id_discipline || $discipline_2==$id_discipline || $discipline_3==$id_discipline){echo 'checked';} ?>>
                        <label class="form-check-label discipline" for="<?php echo 'discipline'.$id_discipline; ?>">
                            <?php echo $checkDiscipline; ?>
                        </label>
                        </div>
                    <?php } ?>
                    </div>
                    </div>
                </fieldset>

                <fieldset class="form-group">
                    <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Format*<br><small class="text-muted">(select 1)</small></legend>
                    <div class="col-sm-10" style="overflow:scroll; height: 140px">
                    <?php foreach($query_formats->result_array() as $f){ 
                                $checkFormat=$f['format'];
                                $id_format=$f['id']; ?>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="format" value="<?php echo $id_format; ?>" id="<?php echo 'format'.$id_format; ?>" required <?php if($format == $id_format){echo 'checked';} ?>>
                        <label class="form-check-label format" for="<?php echo 'format'.$id_format; ?>">
                            <?php echo $checkFormat; ?>
                        </label>
                        </div>
                    <?php } ?>
                    </div>
                    </div>
                </fieldset>

                <div class="form-group">
                <div class="form-row">
                <div class="col">
                    <label for="startDate">Start Date*</label>
                    <input type="date" class="form-control" id="startDate" placeholder="e.g., Jakarta" name="startDate" required value="<?php echo $start_date; ?>">
                    </div>

                    <div class="col">
                    <label for="endDate">End Date*</label>
                    <input type="date" class="form-control" id="endDate" placeholder="e.g., JCC" name="endDate" required value="<?php echo $end_date; ?>">
                    </div>
                </div>
                </div>

                <div class="form-group">
                <div class="form-row">

                    <div class="col">
                    <label for="inlineFormInputGroup">Fee for Member*</label>
                    <div class="input-group">
                    <input type="text" class="form-control uang" id="feeMember" name="feeMember" required value="<?php echo $fee_for_member; ?>">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Rupiah</div>
                        </div>
                    </div>
                    </div>

                    <div class="col">
                    <label for="inlineFormInputGroup">Fee for Non-Member*</label>
                    <div class="input-group">
                    <input type="text" class="form-control uang" id="feeNonMember" name="feeNonMember" required value="<?php echo $fee_for_nonmember; ?>">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Rupiah</div>
                        </div>
                    </div>
                    </div>

                </div>
                </div>

                <div class="form-group">
                    <label for="synopsis">Synopsis</label>
                    <textarea class="form-control" id="synopsis" rows="5" name="synopsis" maxlength="1000" aria-describedby="synopsisHelper" ><?php echo $synopsis; ?></textarea>
                    <small id="synopsisHelper" class="form-text text-muted">
                    Max: 1000 chars.
                    </small>
                </div>

                <div class="form-group">
                <label for="reservationLink">Reservation Link</label>
                <div class="input-group">
                    <input type="url" class="form-control" id="reservationLink" placeholder="http://" name="reservationLink" aria-describedby="reservationLink" value="<?php echo $reservation_link; ?>">
                </div>
                <small id="reservationLink" class="form-text text-muted">
                    Link to the reservation form.
                </small>
                </div>

                <div class="form-group">
                <div class="form-row">

                    <div class="col">
                    <label for="contactPerson1">Contact Person 1*</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                        </div>
                    <input type="text" class="form-control" id="contactPerson1" value="<?php echo $contact_person_1; ?>" name="contactPerson1" required>
                    </div>
                    </div>

                    <div class="col">
                    <label for="telephone1">Telephone Number 1*</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-phone"></i></div>
                        </div>
                    <input type="tel" class="form-control" id="telephone1" value="<?php echo $telephone_1; ?>" name="telephone1" required pattern="[0-9]{10,12}">
                    </div>
                    </div>

                </div>
                </div>

                <div class="form-group">
                <div class="form-row">

                    <div class="col">
                    <label for="contactPerson2">Contact Person 2*</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                        </div>
                    <input type="text" class="form-control" id="contactPerson2" value="<?php echo $contact_person_2 ?>" name="contactPerson2" required>
                    </div>
                    </div>

                    <div class="col">
                    <label for="telephone2">Telephone Number 2*</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-phone"></i></div>
                        </div>
                    <input type="tel" class="form-control" id="telephone2" value="<?php echo $telephone_2; ?>" name="telephone2" required pattern="[0-9]{10,12}">
                    </div>
                    </div>

                </div>
                </div>

                <div class="form-group">
                    <label for="additionalInformation">Additional Information About This Training</label>
                    <textarea class="form-control" id="additionalInformation" rows="5" name="additionalInformation" maxlength="1000" aria-describedby="infoHelper"><?php echo $additional_information; ?></textarea>
                    <small id="infoHelper" class="form-text text-muted">
                    Max: 1000 chars.
                    </small>
                </div>

                <div class="form-group">
                <div class="form-row">

                    <div class="col">
                    <label for="flyer">Flyer</label>
                    <div class="input-group">
                    
                        <div class="input-group-prepend">
                        
                        <div class="input-group-text"><i class="far fa-image"></i></div>
                        
                        </div>
                        
                    <input type="file" class="form-control" id="flyer" name="flyer" accept="image/jpeg" aria-describedby="flyerHelper">
                    
                    </div>
                    <small id="flyerHelper" class="form-text text-muted">
                    Only jpg/jpeg. Maximum size: 300 kb.
                    </small>
                    <?php if($flyer!=''){ ?>
                        <object width="auto" height="200" data="<?php echo base_url().'uploads/flyers/'.$flyer;?>" type="image/jpg"></object>
                        <a class="btn btn-sm btn-warning" href="<?php echo site_url('admin/processDeleteFlyer/'.$id.''); ?>"><i class="fas fa-edit"></i> Remove flyer</a>
                    <?php } ?>
                    </div>

                    <div class="col">
                    <label for="proposal">Proposal</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="far fa-file-alt"></i></div>
                        </div>
                    <input type="file" class="form-control" id="proposal" name="proposal" accept="application/pdf" aria-describedby="proposalHelper">
                    </div>
                    <small id="docHelper" class="form-text text-muted">
                    Only pdf. Maximum size: 10 mb.
                    </small>
                    <?php if($proposal!=''){ ?>
                        <object width="auto" height="400" data="<?php echo base_url().'uploads/proposals/'.$proposal;?>" type="application/pdf"></object>
                        <a class="btn btn-sm btn-warning" href="<?php echo site_url('admin/processDeleteProposal/'.$id.''); ?>"><i class="fas fa-edit"></i> Remove proposal</a>
                    <?php } ?>
                    </div>


                </div>
                </div>

<!--
                <div class="container1">
                    <button class="add_form_field">Add New Field &nbsp; 
                    <span style="font-size:16px; font-weight:bold;">+ </span>
                    </button>
                    <div><input type="text" name="mytext[]"></div>
                </div>
-->

                <button type="submit" class="btn btn-primary">Submit</button>
                
            </form>


        </div>
    
        <div class="tab-content row justify-content-center">
        </div>

    </div>

</section>

<script src="<?php echo base_url().'assets/AreYouSure/jquery.are-you-sure.js' ?>"></script>
<script src="<?php echo base_url().'assets/AreYouSure/ays-beforeunload-shim.js' ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
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

    $(function() {
        var scntDiv = $('#p_scents');
        var i = $('#p_scents p').size() + 1;
        
        $('#addScnt').live('click', function() {
                $('<p><label for="p_scnts"><input type="text" id="p_scnt" size="20" name="p_scnt_' + i +'" value="" placeholder="Input Value '+i+'" /></label> <a href="#" id="remScnt">Remove</a></p>').appendTo(scntDiv);
                i++;
                return false;
        });
        
        $('#remScnt').live('click', function() { 
                if( i > 2 ) {
                        $(this).parents('p').remove();
                        i--;
                }
                return false;
        });
});

    var uploadField1 = document.getElementById("flyer");
    var uploadField2 = document.getElementById("proposal");

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
        var ext = $('#flyer').val().split('.').pop().toLowerCase();
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
        var ext = $('#proposal').val().split('.').pop().toLowerCase();
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

<script type="text/javascript">
            $(document).ready(function(){

                // Format mata uang.
                $( '.uang' ).mask('000.000.000.000', {reverse: true});

            })

    $(document).on("checkbox", "#instructors", function(){
    $(this).add(this.nextSibling)
        .add(this.nextSibling.nextSibling)
        .wrapAll("<label class='instructors'></label>")
    })


    $("#search_instructor").keyup(function () {
        var re = new RegExp($(this).val(), "i")
        $('.instructors').each(function () {
            var text = $(this).text(),
                matches = !! text.match(re);
            $(this).toggle(matches)
        })
    })

    $("#endDate").change(function () {
    var startDate = document.getElementById("startDate").value;
    var endDate = document.getElementById("endDate").value;

    if ((Date.parse(startDate) >= Date.parse(endDate))) {
            alert("End date should be greater than Start date");
            document.getElementById("endDate").value = "";
        }
    });

    function valthis() {
    var checkInstructor = document.getElementsByClassName( 'checkInstructor' );
    var checkDiscipline = document.getElementsByClassName( 'checkDiscipline' );
    var isCheckedInstructor = false;
    var isCheckedDiscipline = false;
        for (var i = 0; i < checkInstructor.length; i++) {
                if ( checkInstructor[i].checked ) {
                    isCheckedInstructor = true;
                };
            };

        for (var i = 0; i < checkDiscipline.length; i++) {
            if ( checkDiscipline[i].checked ) {
                isCheckedDiscipline = true;
            };
        };

        if ( !isCheckedDiscipline ) {
            alert( 'Please, check at least one discipline' );
            return false;
        }

        if ( !isCheckedInstructor ) {
            alert( 'Please, check at least one instructor' );
            return false;
        }
    }

    $('.limit_discipline').on('change', function() {
        if($('.limit_discipline:checked').length > 3) {
            this.checked = false;
        }
    });

    $('.limit_instructor').on('change', function() {
        if($('.limit_instructor:checked').length > 5) {
            this.checked = false;
        }
    });

    var checkboxes = $(".checkInstructor");
    checkboxes.on('change', function() {
        $('#selectedInstructors').val(
            checkboxes.filter(':checked').map(function(item) {
                var checkID=this.value;
                <?php 
                    foreach($query_instructors->result_array() as $i){ 
                        $instructor=$i['name'];
                        $id=$i['id'];
                ?>
                
                if(checkID==<?php echo $id; ?>){
                    var name='<?php echo $instructor ?>';
                }
                
                <?php } ?>
                return name;
            }).get().join(', ')
        );
    });

    $('#selectedInstructors').val(
            checkboxes.filter(':checked').map(function(item) {
                var checkID=this.value;
                <?php 
                    foreach($query_instructors->result_array() as $i){ 
                        $instructor=$i['name'];
                        $id=$i['id'];
                ?>
                
                if(checkID==<?php echo $id; ?>){
                    var name='<?php echo $instructor ?>';
                }
                
                <?php } ?>
                return name;
            }).get().join(', ')
        );
</script>