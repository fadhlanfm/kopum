<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>


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
            <h2>Gallery</h2>
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
                        <td>Title</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($query_gallery->result_array() as $g){
                    $id=$g['id'];
                    $id_training=$g['id_training'];
                    $url=$g['url'];
                    $title=$g['title'];
                ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php
                            foreach($query_trainings->result_array() as $t){
                                $id_t=$t['id'];
                                $topic_t=$t['topic'];
                                if($id_training==$id_t){
                                    echo $topic_t;;
                                }
                            }
                        ?></td>
                        <td><?php echo $title; ?></td>
                        <td>
                        <a class="btn btn-sm btn-info" href="<?php echo $url; ?> " style="color: black;"><i class="far fa-eye"></i></a>
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

<!-- ============ START MODAL EDIT GALLERY =============== -->
        <?php
        foreach($query_gallery->result_array() as $g1):
            $id_g1=$g1['id'];
            $id_training_g1=$g1['id_training'];
            $url_g1=$g1['url'];
            $title_g1=$g1['title'];
        ?>
        <div class="modal fade" id="modal_edit<?php echo $id_g1;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Edit gallery</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url().'admin/editGalleryProcess/'.$id_g1;?>">
                <div class="modal-body">

                    <div class="form-group">
                        <div class="col-xs-8">
                            <input name="id_gallery" value="<?php echo $id_g1;?>" class="form-control" type="text" placeholder="Gallery ID" readonly hidden>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Training</label>
                        <div class="col-xs-8">
                            <input name="id_training" value="<?php echo $id_training_g1;?>" class="form-control" type="text" placeholder="File name" required readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >URL</label>
                        <div class="col-xs-8">
                        <input name="url" value="<?php echo $url_g1;?>" class="form-control" type="text" placeholder="e.g., https://i.imgur.com/jsgYqj1.jpg" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Title</label>
                        <div class="col-xs-8">
                        <input name="title" value="<?php echo $title_g1;?>" class="form-control" type="text" placeholder="Image title" required>
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
    <!-- ============ END MODAL EDIT GALLERY =============== -->

<!-- ============ START MODAL ADD GALLERY =============== -->

<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Add image to gallery</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url().'admin/addGalleryProcess'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Training Topic</label>
                        <div class="col-xs-8">
                            <select class="js-example-basic-single" name="state">
                                <?php
                                foreach($query_trainings->result_array() as $t){
                                    $id_t=$t['id'];
                                    $topic_t=$t['topic'];
                                ?>
                                    <option value="<?php echo $id_t; ?>"><?php echo $topic_t; ?></option>
                                <?php } ?>
                            </select>
                            <input name="id_training" class="form-control" type="hidden" value="<?php echo $id_t; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Image URL</label>
                        <div class="col-xs-8">
                            <input name="url" class="form-control" type="text" placeholder="e.g., https://i.imgur.com/jsgYqj1.jpg" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Title</label>
                        <div class="col-xs-8">
                            <input name="title" class="form-control" type="text" placeholder="Image title" required>
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
<!-- ============ END MODAL ADD GALLERY =============== -->

<!-- ============ START MODAL DELETE GALLERY =============== -->
<?php 
foreach($query_gallery->result_array() as $g):
    $id=$g['id'];
    $title=$g['title'];
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

            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/deleteGalleryProcess'?>">
                <div class="modal-body">
                    <p>Are you sure want to permanently delete <b><?php echo $title;?></b> ?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="hidden" name="name" value="<?php echo $title;?>">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button type="submit" class="btn btn-warning">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>
<!-- ============ END MODAL DELETE GALLERY =============== -->




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
