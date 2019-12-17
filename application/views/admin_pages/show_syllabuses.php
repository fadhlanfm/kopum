    <!--==========================
      Schedule Section
    ============================-->
    <br><br>
    
<section id="schedule" class="section-with-bg">
    <div class="container wow fadeInUp">
        
        <div class="section-header">
        <?php
            if($this->session->flashdata('message')=='add_success'){
                echo '<div class="alert alert-info alert-dismissible fade show mb-3" role="alert"><small>'.$this->session->flashdata('object').' added</small>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }
        ?>

        <?php
            if($this->session->flashdata('message')=='edit_success'){
                echo '<div class="alert alert-info alert-dismissible fade show mb-3" role="alert"><small>'.$this->session->flashdata('object').' edited</small>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }
        ?>

        <?php
            if($this->session->flashdata('message')=='delete_success'){
                echo '<div class="alert alert-info alert-dismissible fade show mb-3" role="alert"><small>'.$this->session->flashdata('object').' deleted</small>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }
        ?>
        <h2>Syllabus is <i style="color: #E6E600">empty</i> in these trainings</h2>
        </div>
        

        <div class="container wow fadeInUp" style="text-align: right">
        <span><br>
        </span>
        
            <table class="table table-striped" id="mydata" style="text-align: left">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Topic</td>
                        <td>Insert syllabus</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($query_trainings->result_array() as $t1){ 
                        $id=$t1['id'];
                        $topic=$t1['topic'];
                        $isSyllabusDefined=$t1['isSyllabusDefined'];
                        if($isSyllabusDefined==0){
                        ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $topic; ?></td>
                        <td>
                        <a class="btn btn-sm btn-info" href="<?php echo site_url('admin/syllabusOf/'.$id.''); ?>"><i class="fas fa-file-import" style="color: black"></i></a>
                        </td>
                    </tr>
                    <?php } }?>
                </tbody>
            </table>
        </div>
    
        <div class="tab-content row justify-content-center">
        </div>

    </div>

</section>

    <!--==========================
     Section
    ============================-->
    <br><br>
    
<section id="schedule" class="section-with-bg">
    <div class="container wow fadeInUp">
        
        <div class="section-header">
        
        <h2>Syllabus is <i style="color:#00308F">defined</i> in these trainings</h2>
        </div>
        

        <div class="container wow fadeInUp" style="text-align: right">
        <span><br>
        </span>
        
            <table class="table table-striped" id="mydata1" style="text-align: left">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Date</td>
                        <td>Topic</td>
                        <td>Instructors</td>
                        <td>Edit syllabus</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($query_trainings->result_array() as $t2){ 
                        $id=$t2['id'];
                        $topic=$t2['topic'];
                        $start_date=$t2['start_date'];
                        $end_date=$t2['end_date'];
                        $isSyllabusDefined=$t2['isSyllabusDefined'];
                        $x=0;
                        if($isSyllabusDefined==1){
                        ?>
                    <?php foreach($query_trainings_and_instructors->result_array() as $tai){
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
                        <td><?php echo $start_date.' to '.$end_date; ?></td>
                        <td><?php echo $topic; ?></td>
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
                        <a class="btn btn-sm btn-info" href="<?php echo site_url('admin/syllabusOf/'.$id.''); ?>"><i style="color: black" class="far fa-edit"></i></a>
                        </td>
                    </tr>
                    <?php }} ?>
                </tbody>
            </table>
        </div>
    
        <div class="tab-content row justify-content-center">
        </div>

    </div>

</section>


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

    $(document).ready(function(){
		$('#mydata1').DataTable(
            {
                responsive: true
            }
        );
	});
</script>