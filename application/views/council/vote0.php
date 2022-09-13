 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ลงคะแนนเลือกตั้ง</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าแรก</a></li>
              <li class="breadcrumb-item active">ลงคะแนนเลือกตั้ง</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-sm-6">
            <div class="card">
              <div class="card-body">
               <!-- class="card-title">ลงคะแนนเลือกตั้ง</h5>-->

                <p class="card-text">
                 <h3 class="text-center">การเลือกตั้งกรรมการสภามหาวิทยาลัยมหาวิทยาลัยสวนดุสิต</h3>
                  <h3 class="text-center">ประเภทคณาจารย์ประจำ ปี 2564</h3>
                </p>
                <p id="demotime" class="text-center" style="font-size:20px;font-weight:500;  "></p>
              
              </div>
            </div>

            <div class="card card-primary card-outline" id="formvote">
              <div class="card-body">
                <h5 class="card-title">ลงคะแนนเลือกตั้ง</h5>

                <p class="card-text">
                  (เลือกได้ 5 คน)
                </p>

                 <form action="" method="POST">
                <input type="hidden" name="pcode" id="pcode" value="<?php //echo $this->session->userdata['pcode']; ?>">
                <input type="hidden" name="pcode" id="hrcode" value="<?php //echo $this->session->userdata['hrcode']; ?>">
                <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="text-center">ทำเครื่องหมาย <br><i class="fas fa-check"></i></th>
                      <th valign="center" class="text-center">หมายเลข</th>
                      <th class="text-center">รูปผู้สมัคร</th>
                      <th class="text-center">ชื่อ - นามสกุล</th>
                      <th class="text-center">หน่วยงาน</th>                      
                    </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($candidates as $key => $r){ ?>
                      <tr>
                         <td style="vertical-align:middle;text-align:center;">
                          <input class="candidate" type="checkbox" name="candidate_id[]" value="<?php echo $r->id; ?>" id="chk<?php echo $r->id; ?>">                          
                        </td>
                        <td style="vertical-align:middle;text-align:center;"><div class="cnumber"><?php echo $r->c_number;?></div></td>
                        <td>
                          <img src="<?php echo base_url(); ?>uploads/candidate/<?php echo $r->picture;?>" class="img-fluid img<?php echo $r->id; ?>" width="90px">
                        </td>
                        <td><?php echo $r->candidate_name;?></td>
                        <td></td>
                       
                      </tr>
                <?php } ?>
                  </tbody>
                </table>
              </div>
                <br>
                <div class="row">
                  <div class="col-md-9 text-center">
                    <span class="text-danger">*กรณีไม่ประสงค์จะลงคะแนนกรุณาทำเครื่องหมาย <i class="fas fa-check"></i> ในช่องที่กำหนด</span>
                    <span class="text-success" id="test"></span>
                  </div>
                  <div class="col-md-3">
                     <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">ไม่ประสงค์ลงคะแนน</h3>
              </div>
              <div class="card-body">
                <div class="text-center">
                <input class="no_candidate" type="checkbox" name="no_candidate" value="0" id="no_candidate">
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            <button type="button" class="btn btn-block btn-success" id="submit2"><i class="fas fa-check"></i> บันทึกการลงคะแนน</button>
                  </div>
                </div>
               </form>
               <!--
                <input value="1" name="product" class="product-list" type="checkbox">Product 1  
    <input value="2" name="product" class="product-list" type="checkbox">Product 2  
    <input value="3" name="product" class="product-list" type="checkbox">Product 3  
    <input value="4" name="product" class="product-list" type="checkbox">Product 4  
    <input value="5" name="product" class="product-list" type="checkbox">Product 5  -->
    
             
              </div>
            </div><!-- /.card -->


          </div>
         
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
    $(document).on('click', 'input[type="checkbox"]', function() {      
      $('input[type="checkbox"]').not(this).prop('checked', false);      
    });

 /*$('.product-list').on('change', function() {
        $('.product-list').not(this).prop('checked', false);  
    });
 $('.product-list').click(function() {
        $(this).siblings('input:checkbox').prop('checked', false);
    });*/
  </script>
  <script>
    
 /*   setTimeout(function() {
    $('#formvote').fadeOut('fast'); //1000 =1s
  }, 10000);*/

    /*var lastProcessedHour = -1;

    setInterval(function() {
      var d = new Date();
      var currentHour = d.getHours();
      console.log(currentHour);
      if (currentHour != lastProcessedHour) {
      
          console.log("new hour");

          lastProcessedHour = currentHour;
      }
    }, 1000);*/

  // Set the date we're counting down to
var countDownDate = new Date("DEC 9, 2020 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demotime").innerHTML = days + " d " + hours + " ชั่วโมง "
  + minutes + " นาที " + seconds + " วินาที ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demotime").innerHTML = '<span class="text-danger">หมดเวลาการเลือกตั้งแล้ว</span>';
    //$('#formvote').hide();
  }
}, 1000);
  </script>