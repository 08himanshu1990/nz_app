<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
   <link rel="stylesheet" href="http://workondesk.com/demo/terry/css/bootstrap.css">
    <link rel="stylesheet" href="http://workondesk.com/demo/terry/scss/custom.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
    <link rel="stylesheet" href="http://workondesk.com/demo/terry/scss/responsive.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <div class="container top-main">
        <div class="row">
            <!-- Top Nav with dark bg Starts -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light col rounded-0">
                <a class="navbar-brand col-4 px-0" href="#">
                    <img src="http://workondesk.com/demo/terry/img/logo.jpg" class="img-fluid rounded" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto col py-3 nav-fill">
                        <li class="nav-item text-left">
                            <a class="nav-link p-2 p-sm-4 text-light" href="#" data-toggle="modal" data-target="#modalTwo">
                                <i class="fas fa-plus-circle fa-2x align-middle"></i> &nbsp; Invite team members
                            </a>
                        </li>
                        <li class="nav-item text-left text-sm-left ">
                            <a class="nav-link p-2 p-sm-4 text-light" href="#">
                                <i class="fas fa-user-circle fa-2x align-middle"></i> &nbsp; Samuel Johnson &nbsp;
                                <span class="badge badge-light rounded p-1"> Account Holder</span>
                            </a>
                        </li>
                        <li class="nav-item d-none d-sm-none d-md-block text-left text-sm-right hamburger-icon">
                            <a class="nav-link mt-3" href="javascript:void();" onClick="saveForm();" >
                                <i class="fas fa-bars fa-2x"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Top Nav with dark bg Starts -->

           

            <div class="w-100"></div>
            <!-- Main Navigation Starts -->


            <ul class="nav nav-pills nav-fill border border-secondary col p-0" id="top-nav">
                <li class="nav-item">
                    <a class="nav-link border-right border-secondary rounded-0 py-3 px-2 <?php if($title=='Leads'){echo 'active';}?>" href="index.php?page=leads/leadPage">
                        <i class="fas fa-filter fa-2x align-middle"></i>
                        <span class="align-middle font-weight-bold d-none d-sm-none d-md-inline-block">Leads</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link border-right border-secondary py-3 px-2 rounded-0 <?php if($title=='Customers'){echo 'active';}?>" href="index.php?page=customers/customerPage">
                        <i class="fas fa-id-card fa-2x align-middle"></i>
                        <span class="align-middle d-none d-sm-none d-md-inline-block">Customers</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link border-right border-secondary py-3 px-2 rounded-0" href="resources.html">
                        <i class="fas fa-users fa-2x align-middle"></i>
                        <span class="align-middle d-none d-sm-none d-md-inline-block">Resources</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link border-right border-secondary py-3 px-2 rounded-0" href="#">
                        <i class="fas fa-calendar-alt fa-2x align-middle mr-sm-2"></i>
                        <span class="align-middle d-none d-sm-none d-md-inline-block"> Schedule</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link border-right border-secondary py-3 px-2 rounded-0" href="settings.html">
                        <i class="fas fa-cog fa-2x align-middle"></i>
                        <span class="align-middle d-none d-sm-none d-md-inline-block">Settings </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-3 rounded-0 px-2" href="reports.html">
                        <i class="fas fa-chart-bar fa-2x align-middle"></i>
                        <span class="align-middle d-none d-sm-none d-md-inline-block">Reports</span>
                    </a>
                </li>
            </ul>
            <!-- Main Navigation Ends -->


        </div>
    </div>
   