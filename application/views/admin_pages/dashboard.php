<!-- Admin Index -->
<?php $isSuperAdmin = $this->session->userdata('isSuperAdmin'); ?>
<section id="intro">
    <div class="intro-container wow fadeIn">
      <h1 class="mb-4 pb-0">Welcome,<br>You are<span>
      <?php if($isSuperAdmin==1){
          echo "An Admin</span></h1>";
      }else{
          echo "An Admin</span></h1>";
      } ?>
      
    </div>
</section>