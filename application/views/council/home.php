 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!--<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <!--  <div class="card">
              <div class="card-body">
               

                <p class="card-text">
                 <h3 class="text-center">การเลือกตั้งกรรมการสภามหาวิทยาลัย</h3>
                  <h3 class="text-center">ประเภทจากพนักงานมหาวิทยาลัยสายสนับสนุน</h3>
                  <h3 class="text-center">มหาวิทยาลัยสวนดุสิต</h3>
                </p>
                
              
              </div>
            </div> -->

            <div class="card">
              <div class="card-body  text-center">
                <h5 class="card-title"></h5>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item  active">
                      <img class="d-block w-100" src="<?php echo base_url()?>uploads/IMG_1996_PNG.webp" alt="First slide">
                    </div>
                   <!-- <div class="carousel-item">
                      <img class="d-block w-100" src="https://placehold.it/900x500/3c8dbc/ffffff&amp;text=I+Love+Bootstrap" alt="Second slide">
                    </div>
                    <div class="carousel-item ">
                      <img class="d-block w-100" src="https://placehold.it/900x500/f39c12/ffffff&amp;text=I+Love+Bootstrap" alt="Third slide">
                    </div> -->
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-custom-icon" aria-hidden="true">
                      <i class="fas fa-chevron-left"></i>
                    </span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-custom-icon" aria-hidden="true">
                      <i class="fas fa-chevron-right"></i>
                    </span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
                
                <br>
                <?php
               //print_r($this->session->userdata); 
               // print_r($mymac);
                ?>
              </div>
            </div>

           
          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->