<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title><?php if (!empty($page_title)) echo $page_title;?></title> <!-- $data['page_title'] = 'The title of this page'; -->
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="<?php echo base_url('assets/img/logo.png'); ?>" rel="icon">
    <link href="<?php echo base_url('assets/img/logo.png'); ?>" rel="apple-touch-icon">

    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Karla|Montserrat&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"></script>
  
</head>

<body>

    <!-- start navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="<?php echo base_url('assets/img/logo.png'); ?>" width="30" height="37" class="d-inline-block align-top" alt="">
        </a>
    </div>
    </nav>
    <!-- end navbar -->

    <!-- start log in form -->
    <br><br><br><br>
      <div class="container my-auto col-sm-4">
        <div class="card text-center">
          <div class="card-header">
            IATMI TRAININGS PUBLICATION SYSTEM
          </div>
          <div class="card-body">
            <p class="card-text">Please enter PIN</p>
            <form action="<?php echo site_url("admin/loginProcess"); ?>" method="POST">

            <?php
        if($this->session->flashdata('message')==1){
            echo '<div class="alert alert-danger alert-dismissible fade show mx-sm-3 mb-3" role="alert"><small>Wrong PIN, please try again</small>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
    ?>

<?php
        if($this->session->flashdata('message')==2){
            echo '<div class="alert alert-danger alert-dismissible fade show mx-sm-3 mb-3" role="alert"><small>SESSION ga ada</small>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
    ?>

              <div class="form-group mx-sm-3 mb-3">
                <input type="password" class="form-control" placeholder="PIN" required name="inputPIN" pattern="[0-9]{4,10}" inputmode="numeric">
              </div>
              <button type="submit" class="btn btn-primary">Log In</a>
            </form>
          </div>
        </div>
      </div>
    <!-- end log in form -->

</body>