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
            if($this->session->flashdata('message')=='delete_success'){
                echo '<div class="alert alert-info alert-dismissible fade show mb-3" role="alert"><small>'.$this->session->flashdata('object').' (ID='.$this->session->flashdata('id').') deleted</small>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }
        ?>
            <h2>List of Instructors</h2>
        </div>
        

        <div class="container wow fadeInUp" style="text-align: right">
        <span>
            <button type="button" class="btn btn-success btn-sm" onclick="window.location.href = '<?php echo base_url('admin/addInstructor'); ?>';">
                <i class="fas fa-plus"></i>
            </button><br><br>
        </span>
        
            <table class="table table-striped" id="mydata" style="text-align: left">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Title</td>
                        <td>Company</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($query->result_array() as $i){ 
                        $id=$i['id'];
                        $name=$i['name'];
                        $job_title=$i['job_title'];
                        $company=$i['company'];
                        ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $job_title; ?></td>
                        <td><?php echo $company; ?></td>
                        <td>
                        <a class="btn btn-sm btn-info" href="<?php echo site_url('admin/editInstructor/'.$id.''); ?>"> <i style="color: black" class="far fa-edit"></i></a>
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
    $fullName=$i['name'];
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
    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/deleteInstructorProcess'?>">
        <div class="modal-body">
            <p>Are you sure want to permanently delete <b><?php echo $fullName;?></b> ?</p>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="hidden" name="fullName" value="<?php echo $fullName;?>">
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