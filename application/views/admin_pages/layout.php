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
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/toast/jquery.toast.min.css'); ?>" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets/toast/jquery.toast.min.js'); ?>"></script>
  
</head>

<body>

    <!-- start navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="<?php echo base_url('assets/img/logo.png'); ?>" width="30" height="37" class="d-inline-block align-top" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">	
            <ul class="nav navbar-nav navbar-left mr-auto">
                <li class="nav-item <?php if($this->uri->segment(2)=="showDashboard"){echo 'active';}?>">
                    <a href="<?php echo base_url('admin/showDashboard'); ?>" class="nav-link"><b class="caret"></b><i class="fas fa-home"></i> Dashboard</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right ml-auto">
                <li class="nav-item dropdown <?php if($this->uri->segment(2)=="showFormats" || $this->uri->segment(2)=="showInstructors" || $this->uri->segment(2)=="addInstructor" || $this->uri->segment(2)=="editInstructor" || $this->uri->segment(2)=="showTrainings"|| $this->uri->segment(2)=="addTraining"|| $this->uri->segment(2)=="editTraining"|| $this->uri->segment(2)=="showSyllabuses"){echo 'active';}?>">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><b class="caret"></b><i class="far fa-edit"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url('admin/showTrainings'); ?>" class="dropdown-item">Trainings</a></li>
                        <li><a href="<?php echo base_url('admin/showSyllabuses'); ?>" class="dropdown-item">Syllabuses</a></li>
                        <li class="divider dropdown-divider"></li>
                        <li><a href="<?php echo base_url('admin/showInstructors'); ?>" class="dropdown-item">Instructors</a></li>
                        <li class="divider dropdown-divider"></li>
                        <li><a href="<?php echo base_url('admin/showFormats'); ?>" class="dropdown-item">Formats</a></li>
                        <li><a href="<?php echo base_url('admin/showDisciplines'); ?>" class="dropdown-item">Disciplines</a></li>
                        <li class="divider dropdown-divider"></li>
                        <li><a href="<?php echo base_url('admin/showDocuments'); ?>" class="dropdown-item">Public Documents</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><b class="caret"></b><i class="fas fa-users"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="dropdown-item">Email Blast</a></li>
                        <li><a href="#" class="dropdown-item">Subscribers</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown <?php if($this->uri->segment(2)=="settings"){echo 'active';}?>">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><b class="caret"></b><i class="fas fa-user-cog"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url('admin/settings'); ?>" class="dropdown-item">Passwords</a></li>
                        <li class="divider dropdown-divider"></li>
                        <li><a href="<?php echo base_url('admin/logoutProcess'); ?>" class="dropdown-item">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    </nav>
    <!-- end navbar -->

    <?php echo $content; ?>

</body>

<footer>
  <p><br></p>
</footer> 