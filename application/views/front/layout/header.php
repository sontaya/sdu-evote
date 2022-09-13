<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SDU Election 2022">
    <meta name="author" content="paphawin panyasai">
    <meta name="generator" content="">
    <title>SDU Election 2022</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/starter-template/">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Niramit:wght@400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/front/css/bootstrap.min.css" rel="stylesheet">

    <script src="<?php echo base_url();?>assets/front/jquery-3.3.1.min.js"></script>
    <script>
        var baseurl='<?php echo base_url();?>';
    </script>
    <style>
        body{
            font-family: 'Niramit', sans-serif;
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        .bg-custom{
            /*background-color: #343a40!important;*/
            background-color: #062263;

        }
        .nav-link {color: #ffffff;}
        .nav-link:hover {color: #007bff;}
        .custom-toggler .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(135,206,250, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
        }
        .custom-toggler.navbar-toggler {
            border-color: rgb(135,206,250);
        }
        .c_number{
            color: blue ;
            font-size: 50px;
            font-weight: 700;
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/front/starter-template.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-md navbar-custom bg-custom fixed-top">
    <a class="navbar-brand" href="#">
        <img src="<?php echo base_url();?>uploads/logo20162.png" height="50px" alt="">
    </a>
    <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
        <?php if(!isset($this->session->userdata['logged_in'])){ ?>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url();?>">หน้าแรก <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>home/check_election">ตรวจสอบรายชื่อผู้มีสิทธิเลือกตั้ง</a>
               <!-- <a class="nav-link" href="#">ตรวจสอบรายชื่อผู้มีสิทธิเลือกตั้ง</a> -->
            </li>
            <?php }?>

        </ul>
       <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form> -->
       <!-- <label id="t_time" class="text-white"></label> -->
       <button type="button" class="btn btn-outline-light" id="t_time"></button>

        <?php if(isset($this->session->userdata['logged_in'])){ ?>
        <a href="<?php echo base_url();?>login/signout" class="btn btn-outline-warning my-2 my-sm-0" type="submit">ออกจากระบบ</a>
        <?php }?>
    </div>
</nav>


