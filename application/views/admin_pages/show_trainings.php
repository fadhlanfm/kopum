    <!--==========================
      Schedule Section
    ============================-->
    <br><br>
    
<section id="schedule" class="section-with-bg">
    <div class="container wow fadeInUp">
        
        <div class="section-header">
        <?php
            if($this->session->flashdata('message')=='add_success'){
                echo '<div class="alert alert-info alert-dismissible fade show mb-3" role="alert"><small>'.$this->session->flashdata('object').' (ID='.$this->session->flashdata('id').') added</small>
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
            <h2>List of Trainings</h2>
        </div>
        

        <div class="container wow fadeInUp" style="text-align: right">
        <span>
            <button type="button" class="btn btn-success btn-sm" onclick="window.location.href = '<?php echo base_url('admin/addTraining'); ?>';">
                <i class="fas fa-plus"></i>
            </button><br><br>
        </span>
        
            <table class="table table-striped" id="mydata" style="text-align: left">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Topic</td>
                        <td>City</td>
                        <td>Date</td>
                        <td>Instructor</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    foreach($query->result_array() as $i){ 
                        $id=$i['id'];
                        $topic=$i['topic'];
                        $city=$i['city'];
                        $start_date=$i['start_date'];
                        $end_date=$i['end_date'];
                        $x=0;
                        ?>
                        <?php foreach($query_tai->result_array() as $tai){
                            $id_tai=$tai['id'];
                            $id_instructor_tai=$tai['id_instructor'];
                            $id_training_tai=$tai['id_training'];
                            if($id==$id_training_tai){
                                $this_training_instructor_id[$x]=$id_instructor_tai;
                                $x++;
                            }
                        }
                        ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $topic; ?></td>
                        <td><?php echo $city; ?></td>
                        <td><?php echo $start_date.' to '.$end_date; ?></td>
                        <td><?php $total_instructors=sizeof($this_training_instructor_id);
                        for($y=0; $y<$total_instructors; $y++){
                                foreach($query_instructors->result_array() as $ins){
                                    $id_ins=$ins['id'];
                                    $name_ins=$ins['name'];
                                    if($id_ins==$this_training_instructor_id[$y]){
                                        echo $name_ins; echo '<br>';
                                    }
                            }
                            
                        }
                         ?></td>
                        <td>
                        <a class="btn btn-sm btn-info" href="<?php echo site_url('admin/editTraining/'.$id.''); ?>"><i style="color: black" class="far fa-edit"></i></a>
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

<!-- ============ START MODAL DELETE INSTRUCTOR =============== -->
<?php 
foreach($query->result_array() as $i):
    $id=$i['id'];
    $topic=$i['topic'];
?>
<div class="modal fade" id="modal_delete<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title" id="exampleModalLabel">Delete category</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/deleteTrainingProcess'?>">
        <div class="modal-body">
            <p>Are you sure want to permanently delete <b><?php echo $topic;?></b> ?</p>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Close</button>
            <button type="submit" class="btn btn-warning">Delete</button>
        </div>
    </form>
    </div>
    </div>
</div>
<?php endforeach; ?>
<!-- ============ END MODAL DELETE INSTRUCTOR =============== -->




<script type="text/javascript">
  function form_submit() {
    document.getElementById("search_form").submit();
   }    
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#mydata').DataTable(
            {
                responsive: true
            }
        );
	});
</script>