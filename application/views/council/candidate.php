 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
          <!--  <h1 class="m-0 text-dark">รายชื่อผู้สมัคร</h1>-->
          </div><!-- /.col -->
          <div class="col-sm-6">
           <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าแรก</a></li>
              <li class="breadcrumb-item active">รายชื่อผู้สมัคร</li>
            </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<style>
 
/* Three columns side by side */
.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

/* Display the columns below each other instead of side by side on small screens */
@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}

@media only screen 
  and (min-device-width: 768px) 
  and (max-device-width: 1024px) 
  and (-webkit-min-device-pixel-ratio: 1) {
    .column {
    width: 50%;
    display: block;
  }
}

/* Add some shadows to create a card effect */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}

/* Some left and right padding inside the container */
.container {
  padding: 10px 16px;
}

/* Clear floats */
.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}
.c_number{
  color: #007bff ;
  font-size: 60px;
  font-weight: 700;
}
</style>
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
         <div class="row">
        <div class="col-12 text-center">
            <div class="section-title mb-4 pb-2">
                <h4 class="title mb-4">รายชื่อผู้สมัครรับการเลือกตั้ง</h4>
                <p class="text-muted para-desc mx-auto mb-0">การเลือกตั้งกรรมการสภามหาวิทยาลัย ประเภทจากพนักงานมหาวิทยาลัยสายสนับสนุน มหาวิทยาลัยสวนดุสิต</p>
            </div>
        </div><!--end col-->
    </div><!--end row-->


      <div class="row">
         <?php foreach ($candidates as $key => $r){ ?>
        <div class="column">
    <div class="card">
      <div class="row">
        <div class="col-6">
           <img src="<?php echo base_url('uploads/candidate/'.$r->picture);?>" width="177px" alt="image">
        </div>
        <div class="col-6 align-self-center text-center">
          <p>หมายเลข</p>
          <div class="c_number"><?php echo $r->c_number;?></div>

        </div>
      </div>
     
      <div class="container">
        <h4><?php echo $r->candidate_name;?></h4>
       <!-- <p class="title">CEO &amp; Founder</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>example@example.com</p>
        <p><button class="button">Contact</button></p> -->
      </div>
    </div>
  </div>
    <?php } ?>
      </div>
 

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->