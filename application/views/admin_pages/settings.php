    <!--==========================
      Schedule Section
    ============================-->
    <br>
    
<section id="schedule" class="section-with-bg">
    <div class="container wow fadeInUp">
        
        <div class="section-header">
            
            <h2>Settings</h2>
        </div>
        
        <br>
        <div class="container wow">
        <span class="pull-right">
            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="width: 275px; text-align: left">
                <i class="fas fa-key"></i> Change super admin's PIN
            </button><br><br>
            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo" style="width: 275px; text-align: left">
                <i class="fas fa-key"></i> Change admin's PIN
            </button><br><br>

            <a data-toggle="tooltip" data-placement="bottom" title="This will help you when you forget you PIN">
            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo" style="width: 275px; text-align: left">
                <i class="far fa-envelope"></i> Change email backup
            </button></a>
        </span>
        
            
        </div>
    
        <div class="tab-content row justify-content-center">
        </div>

    </div>

</section>


<!-- ============ START MODAL SUPERADMIN =============== -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Change Super Admin's PIN</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="form-horizontal" method="post" action="<?php echo base_url('admin/changeSuperAdminPasswordProcess'); ?>" id="search_form">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" ></label>
                        <div class="col-xs-8">
                            <input name="oldPIN" placeholder="Super Admin's Old PIN" class="form-control" type="password" required pattern="[0-9]{4,10}" inputmode="numeric">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" ></label>
                        <div class="col-xs-8">
                            <input name="newPIN" class="form-control" type="password" placeholder="Super Admin's New PIN" required pattern="[0-9]{4,10}" inputmode="numeric">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" ></label>
                        <div class="col-xs-8">
                            <input name="confirmNewPIN" class="form-control" type="password" placeholder="Confirm Super Admin's New PIN" required pattern="[0-9]{4,10}" inputmode="numeric">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button type="submit" class="btn btn-primary">Change</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ============ END MODAL SUPERADMIN =============== -->

<!-- ============ START MODAL ADMIN =============== -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Change Admin's PIN</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="form-horizontal" method="post" action="<?php echo base_url('admin/changeAdminPasswordProcess'); ?>" id="search_form">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" ></label>
                        <div class="col-xs-8">
                            <input name="oldPIN" placeholder="Admin's Old PIN" class="form-control" type="password" required pattern="[0-9]{4,10}" inputmode="numeric">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" ></label>
                        <div class="col-xs-8">
                            <input name="newPIN" class="form-control" type="password" placeholder="Admin's New PIN" required pattern="[0-9]{4,10}" inputmode="numeric">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" ></label>
                        <div class="col-xs-8">
                            <input name="confirmNewPIN" class="form-control" type="password" placeholder="Confirm Admin's New PIN" required pattern="[0-9]{4,10}" inputmode="numeric">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button type="submit" class="btn btn-primary">Change</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ============ END MODAL ADMIN =============== -->

<!-- ============ START MODAL EMAIL =============== -->
<?php 
    foreach($query->result_array() as $i):
        $email=$i['email'];
?>
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Change Email Backup</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="form-horizontal" method="post" action="<?php echo base_url('admin/changeEmailBackupProcess'); ?>" id="search_form">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Current backup email</label>
                        <div class="col-xs-8">
                            <input placeholder="<?php echo $email;?>" class="form-control" type="text" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" ></label>
                        <div class="col-xs-8">
                            <input name="PIN" class="form-control" type="password" placeholder="Super admin's PIN" required pattern="[0-9]{4,10}" inputmode="numeric">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" ></label>
                        <div class="col-xs-8">
                            <input name="newBackupEmail" class="form-control" type="email" placeholder="New backup email" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" ></label>
                        <div class="col-xs-8">
                            <input name="confirmNewBackupEmail" class="form-control" type="email" placeholder="Confirm new backup email" required>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button type="submit" class="btn btn-primary">Change</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>
<!-- ============ END MODAL EMAIL =============== -->

<script type="text/javascript">
  function form_submit() {
    document.getElementById("search_form").submit();
   }    
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#mydata').DataTable();
	});
</script>