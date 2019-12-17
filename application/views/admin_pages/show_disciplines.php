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
            <h2>List of Disciplines</h2>
        </div>
        

        <div class="container wow fadeInUp" style="text-align: right">
        <span>
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#add_modal" data-whatever="@mdo">
                <i class="fas fa-plus"></i>
            </button><br><br>
        </span>
        
            <table class="table table-striped" id="mydata" style="text-align: left">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Discipline</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($query->result_array() as $i){ 
                        $id=$i['id'];
                        $discipline=$i['discipline'];
                        ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $discipline; ?></td>
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


<!-- ============ START MODAL EDIT DISCIPLINE =============== -->
    <?php 
        foreach($query->result_array() as $i):
            $id=$i['id'];
            $discipline=$i['discipline'];
        ?>
        <div class="modal fade" id="modal_edit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Edit discipline</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/editDisciplineProcess'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >ID</label>
                        <div class="col-xs-8">
                            <input name="id" value="<?php echo $id;?>" class="form-control" type="text" placeholder="Discipline ID" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Discipline</label>
                        <div class="col-xs-8">
                            <input name="discipline" value="<?php echo $discipline;?>" class="form-control" type="text" placeholder="Discipline" required>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
            </div>
            </div>
        </div>

    <?php endforeach;?>
    <!-- ============ END MODAL EDIT DISCIPLINE =============== -->




<!-- ============ START MODAL ADD DISCIPLINE =============== -->
<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Add discipline</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/addDisciplineProcess'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Discipline</label>
                        <div class="col-xs-8">
                            <input name="discipline" class="form-control" type="text" placeholder="Discipline" required>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
            </div>
            </div>
        </div>
<!-- ============ END MODAL ADD DISCIPLINE =============== -->

<!-- ============ START MODAL DELETE DISCIPLINE =============== -->
<?php 
foreach($query->result_array() as $i):
    $id=$i['id'];
    $discipline=$i['discipline'];
?>
<div class="modal fade" id="modal_delete<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title" id="exampleModalLabel">Delete discipline</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/deleteDisciplineProcess'?>">
        <div class="modal-body">
            <p>Are you sure want to permanently delete <b><?php echo $discipline;?></b> ?</p>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="hidden" name="discipline" value="<?php echo $discipline;?>">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Close</button>
            <button type="submit" class="btn btn-warning">Delete</button>
        </div>
    </form>
    </div>
    </div>
</div>
<?php endforeach; ?>
<!-- ============ END MODAL DELETE DISCIPLINE =============== -->




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