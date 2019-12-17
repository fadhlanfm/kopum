<?php
foreach($query_trainings->result_array() as $t){ 
    $topic=$t['topic'];
    $id_t=$t['id'];
    $start_date_t=$t['start_date'];
    $abs_start_date_t=strtotime($start_date_t);
    $end_date_t=$t['end_date'];
    $abs_end_date_t=strtotime($end_date_t);

    $day_difference = abs($abs_end_date_t-$abs_start_date_t);
    $totalDays=1+ round($day_difference / (60 * 60 * 24));

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
            if($this->session->flashdata('message')=='add_success'){
                echo '<div class="alert alert-info alert-dismissible fade show mb-3" role="alert"><small>'.$this->session->flashdata('object').' (ID='.$this->session->flashdata('id').') inserted</small>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }
        ?>

        <?php
            if($this->session->flashdata('message')=='edit_success'){
                echo '<div class="alert alert-info alert-dismissible fade show mb-3" role="alert"><small>'.$this->session->flashdata('object').' (ID='.$this->session->flashdata('id').') edited</small>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }
        ?>

        <?php
            if($this->session->flashdata('message')=='delete_success'){
                echo '<div class="alert alert-info alert-dismissible fade show mb-3" role="alert"><small>'.$this->session->flashdata('object').' (ID='.$this->session->flashdata('id').') deleted</small>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }
        ?>
            <h2>Syllabuses of <i><?php echo $topic; ?></i></h2>
        </div>
        

        <div class="container wow fadeInUp" style="text-align: right">
        <span>
            <button type="button" class="btn btn-info btn-sm"  onclick="window.location.href = '<?php echo base_url('admin/showSyllabuses'); ?>';">
                <i class="fas fa-list"></i>
            </button>
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#add_modal" data-whatever="@mdo">
                <i class="fas fa-plus"></i>
            </button>
            <br><br>
        </span>
        
            <table class="table table-striped" id="mydata" style="text-align: left">
                <thead>
                    <tr>
                        <td></td>
                        <td>Day</td>
                        <td>Syllabus</td>
                        <td>Instructor</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($query_syllabuses->result_array() as $s){ 
                        $id=$s['id'];
                        $syllabus=$s['syllabus'];
                        $instructor=$s['instructor'];
                        $training=$s['training'];
                        $day=$s['day'];
                        $date=$abs_start_date_t + (86400 * ($day-1));
                        $date = date("d F Y",$date);
                        ?>
                    <tr>
                        <td>#</td>
                        <td><?php echo 'Day '.$day.' ('.$date.')'; ?></td>
                        <td><?php echo $syllabus; ?></td>
                        <td>
                        <?php 
                            $query = $this->Mysql->read('instructors', array('id'=>$instructor), null, 'ASC', null, null);
                            if($query->num_rows()>0){
                                foreach($query->result() as $result){
                                    $name = $result->name;
                                    }
                                }
                                echo $name;
                        ?>
                        </td>
                        <td>
                        <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_edit<?php echo $id;?>"><i class="far fa-edit"></i></a>
                        <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal_delete<?php echo $id;?>"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    
        <div class="tab-content row justify-content-center">
        </div>

    </div>

</section>


<!-- ============ START MODAL EDIT FORMAT =============== -->
    <?php 
        foreach($query_syllabuses->result_array() as $s_edit):
            $id=$s_edit['id'];
            $day=$s_edit['day'];
            $syllabus=$s_edit['syllabus'];
            $instructor=$s_edit['instructor'];
        ?>
        <div class="modal fade" id="modal_edit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Edit syllabus</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/editSyllabusProcess'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <div class="col-xs-8">
                            <input name="id" value="<?php echo $id;?>" class="form-control" type="text" placeholder="Format ID" hidden>
                            <input name="training" value="<?php echo $id_t;?>" class="form-control" type="text" placeholder="Format ID" hidden>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Day</label>
                        <div class="col-xs-8">
                        <select class="form-control" name="day" required>
                        <option disabled>Select day</option>
                            <?php 
                            for ($x = 1; $x <= $totalDays; $x++) {
                                $value=$abs_start_date_t + (86400 * ($x-1));
                                $value = date("Y-m-d",$value);
                                if($x==$day){echo '<option value="'.$x.'" selected>Day '.$x.' ('.$value.')</option>';}else{
                                    echo '<option value="'.$x.'">Day '.$x.' ('.$value.')</option>';
                                }
                            } 
                            ?>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Syllabus</label>
                        <div class="col-xs-8">
                            <input name="syllabus" value="<?php echo $syllabus;?>" class="form-control" type="text" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Instructor</label>
                        <div class="col-xs-8">
                        <select class="form-control" name="instructor" required>
                            <option disabled selected>Select instructor</option>
                            <?php 
                                foreach($query_trainings_and_instructors->result_array() as $tai){ 
                                    $id_instructor_tai=$tai['id_instructor'];
                                    $id_training_tai=$tai['id_training'];
                                    if($id_t==$id_training_tai){
                                        foreach($query_instructors->result_array() as $i){
                                            $id_i=$i['id'];
                                            $name_i=$i['name'];
                                            if($id_i==$id_instructor_tai){
                                                if($id_instructor_tai==$instructor){
                                                    echo '<option value="'.$id_instructor_tai.'" selected>'.$name_i.'</option>';
                                                }else{
                                                    echo '<option value="'.$id_instructor_tai.'">'.$name_i.'</option>';
                                                }
                                                
                                            }
                                        }
                                    }
                                }
                            ?>
                        </select>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
            </div>
            </div>
        </div>

    <?php endforeach;?>
    <!-- ============ END MODAL EDIT FORMAT =============== -->




<!-- ============ START MODAL ADD FORMAT =============== -->
<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Insert syllabus</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/insertSyllabusProcess'?>">
                <div class="modal-body">

                    <input name="training" value="<?php echo $id_t;?>" class="form-control" type="text" hidden>
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3">Day</label>
                        <div class="col-xs-8">
                        <select class="form-control" name="day" required>
                        <option disabled value="" selected>Select day</option>
                            <?php 
                            for ($x = 1; $x <= $totalDays; $x++) {
                                $value=$abs_start_date_t + (86400 * ($x-1));
                                $value = date("Y-m-d",$value);
                                echo '<option value="'.$x.'">Day '.$x.' ('.$value.')</option>';
                            } 
                            ?>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Syllabus</label>
                        <div class="col-xs-8">
                            <input name="syllabus" class="form-control" type="text" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Instructor</label>
                        <div class="col-xs-8">
                        <select class="form-control" name="instructor" required>
                            <option disabled selected value="">Select instructor</option>
                            <?php 
                                foreach($query_trainings_and_instructors->result_array() as $tai){ 
                                    $id_instructor_tai=$tai['id_instructor'];
                                    $id_training_tai=$tai['id_training'];
                                    if($id_t==$id_training_tai){
                                        foreach($query_instructors->result_array() as $i){
                                            $id_i=$i['id'];
                                            $name_i=$i['name'];
                                            if($id_i==$id_instructor_tai){
                                                echo '<option value="'.$id_instructor_tai.'">'.$name_i.'</option>';
                                            }
                                        }
                                    }
                                }
                            ?>
                        </select>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button type="submit" class="btn btn-primary">Insert</button>
                </div>
            </form>
            </div>
            </div>
        </div>
<!-- ============ END MODAL ADD FORMAT =============== -->

<!-- ============ START MODAL DELETE FORMAT =============== -->
<?php 
foreach($query_syllabuses->result_array() as $s_delete):
    $id=$s_delete['id'];
    $syllabus=$s_delete['syllabus'];
?>
<div class="modal fade" id="modal_delete<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title" id="exampleModalLabel">Remove syllabus</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/deleteSyllabusProcess'?>">
        <div class="modal-body">
            <p>Are you sure want to remove <b><?php echo $syllabus;?></b> ?</p>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="hidden" name="syllabus" value="<?php echo $syllabus;?>">
            <input type="hidden" name="training" value="<?php echo $training;?>">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Close</button>
            <button type="submit" class="btn btn-warning">Remove</button>
        </div>
    </form>
    </div>
    </div>
</div>
<?php endforeach; ?>
<!-- ============ END MODAL DELETE FORMAT =============== -->




<script type="text/javascript">
  function form_submit() {
    document.getElementById("search_form").submit();
   }    
</script>

<script type="text/javascript">
    
    $(document).ready(function() {
    var t = $('#mydata').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
</script>