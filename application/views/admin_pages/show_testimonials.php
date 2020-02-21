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
            <h2>Testimonials</h2>
        </div>
        

        <div class="container wow fadeInUp" style="text-align: right">
        <span>
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_add" data-whatever="@mdo">
                <i class="fas fa-plus"></i>
            </button><br><br>
        </span>
        
            <table class="table table-striped" id="mydata" style="text-align: left">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Training</td>
                        <td>Commenter</td>
                        <td>Company</td>
                        <td>Overall</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($query_testimonials->result_array() as $t){
                    $id=$t['id'];
                    $id_training=$t['id_training'];
                    $commenter_name=$t['commenter_name'];
                    $commenter_title=$t['commenter_title'];
                    $commenter_company=$t['commenter_company'];
                    $overall=$t['overall'];
                ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php
                            foreach($query_trainings->result_array() as $tr){
                                $id_tr=$tr['id'];
                                $topic_tr=$tr['topic'];
                                if($id_training==$id_tr){
                                    echo $topic_tr;;
                                }
                            }
                        ?></td>
                        <td><?php echo $commenter_name; echo ' - '; echo $commenter_title; ?></td>
                        <td><?php echo $commenter_company; ?></td>
                        <td><?php echo $overall; ?></td>
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

<!-- ============ START MODAL EDIT TESTIMONY =============== -->
        <?php
        foreach($query_testimonials->result_array() as $t1):
            $id_t1=$t1['id'];
            $id_training_t1=$t1['id_training'];
            $commenter_name_t1=$t1['commenter_name'];
            $commenter_title_t1=$t1['commenter_title'];
            $commenter_company_t1=$t1['commenter_company'];
            $comment_t1=$t1['comment'];
            $overall_t1=$t1['overall'];
        ?>
        <div class="modal fade" id="modal_edit<?php echo $id_t1;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Edit testimony</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url().'admin/editTestiProcess/'.$id_t1;?>">
                <div class="modal-body">

                    <div class="form-group">
                        <div class="col-xs-8">
                            <input name="id_testimony" value="<?php echo $id_t1;?>" class="form-control" type="text" placeholder="Testimony ID" readonly hidden>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Training</label>
                        <div class="col-xs-8">
                            <input name="id_training" value="<?php
                            foreach($query_trainings->result_array() as $tr){
                                $id_tr=$tr['id'];
                                $topic_tr=$tr['topic'];
                                if($id_training_t1==$id_tr){
                                    echo $topic_tr;;
                                }
                            }
                        ?>" class="form-control" type="text" placeholder="File name" required readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Name</label>
                        <div class="col-xs-8">
                            <input name="name" class="form-control" type="text" value="<?php echo $commenter_name_t1;?>" placeholder="Who gives the testimony" required readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Title</label>
                        <div class="col-xs-8">
                            <input name="title" class="form-control" type="text" value="<?php echo $commenter_title_t1;?>" placeholder="His/Her job title" required readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Company</label>
                        <div class="col-xs-8">
                            <input name="company" class="form-control" type="text" value="<?php echo $commenter_company_t1;?>" placeholder="His/Her company" required readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Testimony</label>
                        <div class="col-xs-8">
                        <textarea class="form-control" id="testimony" rows="2" name="testimony" maxlength="350" aria-describedby="testimonyHelper"><?php echo $comment_t1; ?></textarea>
                        <small id="testimonyHelper" class="form-text text-muted">
                        Max: 350 chars.
                        </small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Overall</label>
                        <div class="col-xs-8">
                            <input name="overall" class="form-control" type="number" min="0" max="5" step="0.5" required aria-describedby="overallHelper" value="<?php echo $overall_t1; ?>">
                            <small id="overallHelper" class="form-text text-muted">
                            From 0 to 5. Interval: 0.5
                            </small>
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
    <!-- ============ END MODAL EDIT TESTIMONY =============== -->

<!-- ============ START MODAL ADD TESTIMONY =============== -->
<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Add image to gallery</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url().'admin/addTestiProcess'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Training Topic</label>
                        <div class="col-xs-8">
                            <select class="form-control" name="id_training">
                                <?php
                                    foreach($query_trainings->result_array() as $tt){
                                        $id_tt=$tt['id'];
                                        $topic_tt=$tt['topic'];
                                        echo '<option value="'.$id_tt.'">'.$topic_tt.'</option>'; 
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Name</label>
                        <div class="col-xs-8">
                            <input name="name" class="form-control" type="text" placeholder="Who gives the testimony" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Title</label>
                        <div class="col-xs-8">
                            <input name="title" class="form-control" type="text" placeholder="His/Her job title" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Company</label>
                        <div class="col-xs-8">
                            <input name="company" class="form-control" type="text" placeholder="His/Her company" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Testimony</label>
                        <div class="col-xs-8">
                        <textarea class="form-control" id="testimony" rows="2" name="testimony" maxlength="350" aria-describedby="testimonyHelper"></textarea>
                        <small id="testimonyHelper" class="form-text text-muted">
                        Max: 350 chars.
                        </small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Overall</label>
                        <div class="col-xs-8">
                            <input name="overall" class="form-control" type="number" min="0" max="5" step="0.5" required aria-describedby="overallHelper">
                            <small id="overallHelper" class="form-text text-muted">
                            From 0 to 5. Interval: 0.5
                            </small>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
            </div>
            </div>
        </div>
<!-- ============ END MODAL ADD TESTIMONY =============== -->

<!-- ============ START MODAL DELETE TESTIMONY =============== -->
<?php 
foreach($query_testimonials->result_array() as $g):
    $id=$g['id'];
    $comment=$g['comment'];
?>
<div class="modal fade" id="modal_delete<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Delete document</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/deleteTestiProcess'?>">
                <div class="modal-body">
                    <p>Are you sure want to permanently delete <b><?php echo $comment;?></b> ?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="hidden" name="testimony" value="<?php echo $comment;?>">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button type="submit" class="btn btn-warning">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>
<!-- ============ END MODAL DELETE TESTIMONY =============== -->




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


    var uploadField1 = document.getElementById("document");
    uploadField1.onchange = function() {
        if(this.files[0].size > 1048576){
             this.value = "";
             $.toast({
                 heading: 'Warning',
                 text: 'Maximum size of Document is 10 mb',
                 icon: 'warning',
                 hideAfter: 4000
             })
        };
        var ext = $('#document').val().split('.').pop().toLowerCase();
        if($.inArray(ext, ['jpg','jpeg', 'pdf', 'xls', 'xlsx', 'doc', 'docx', 'ppt', 'ppsx', 'pptx', 'txt']) == -1) {
            $.toast({
                 heading: 'Warning',
                 text: 'This file type is not allowed',
                 icon: 'warning',
                 hideAfter: 4000
             })
             this.value = "";
        }
    };

    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
