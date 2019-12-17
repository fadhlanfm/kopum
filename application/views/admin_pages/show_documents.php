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
            <h2>List of Documents</h2>
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
                        <td>Name</td>
                        <td>Type</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($query->result_array() as $d){ 
                        $id=$d['id'];
                        $name=$d['name'];
                        ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $name; ?></td>
                        <td>
                        <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal_edit<?php echo $id;?>"><i class="far fa-edit"></i></a>
                        <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal_delete<?php echo $id;?>"><i class="far fa-trash-alt"></i></a>
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
        foreach($query->result_array() as $i):
            $id=$i['id'];
            $format=$i['format'];
        ?>
        <div class="modal fade" id="modal_edit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Edit format</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/editFormatProcess'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <div class="col-xs-8">
                            <input name="id" value="<?php echo $id;?>" class="form-control" type="text" placeholder="Format ID" readonly hidden>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Format</label>
                        <div class="col-xs-8">
                            <input name="format" value="<?php echo $format;?>" class="form-control" type="text" placeholder="Format" required>
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
    <!-- ============ END MODAL EDIT FORMAT =============== -->




<!-- ============ START MODAL ADD FORMAT =============== -->
<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Add document</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url().'admin/addDocumentProcess'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >File name</label>
                        <div class="col-xs-8">
                            <input name="name" class="form-control" type="text" placeholder="e.g., Timeline 2019" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >File</label>
                        <div class="col-xs-8">
                            <input type="file" class="form-control" id="document" name="doc" accept="application/pdf, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.ms-powerpoint, application/vnd.openxmlformats-officedocument.presentationml.slideshow, application/vnd.openxmlformats-officedocument.presentationml.presentation, text/plain, image/jpeg" aria-describedby="docHelper" required>
                        </div>
                        <small id="docHelper" class="form-text text-muted">
                        Accept image (jpg) or document (pdf, xls, doc, ppt, txt). Maximum size: 10 mb.
                        </small>
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
foreach($query->result_array() as $i):
    $id=$i['id'];
    $format=$i['format'];
?>
<div class="modal fade" id="modal_delete<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Delete format</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/deleteFormatProcess'?>">
                <div class="modal-body">
                    <p>Are you sure want to permanently delete <b><?php echo $format;?></b> ?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="hidden" name="format" value="<?php echo $format;?>">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button type="submit" class="btn btn-warning">Delete</button>
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
</script>