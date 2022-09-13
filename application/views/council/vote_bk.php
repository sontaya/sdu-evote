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
          <div class="col-lg-12 col-sm-12">
            <div class="card">
              <div class="card-body">
               <!-- class="card-title">ลงคะแนนเลือกตั้ง</h5>-->

                <p class="card-text">
                <h3 class="text-center">การเลือกตั้งกรรมการสภามหาวิทยาลัย</h3>
                  <h3 class="text-center">ประเภทจากพนักงานมหาวิทยาลัยสายสนับสนุน</h3>
                  <h3 class="text-center">มหาวิทยาลัยสวนดุสิต ปี 2563-2564</h3>
                </p>
                <p id="demotime" class="text-center" style="font-size:20px;font-weight:500;  "></p>
              
              </div>
            </div>

            <div class="card card-primary card-outline" id="formvote">
              <div class="card-body">
                <h5 class="card-title">ลงคะแนนเลือกตั้ง</h5>

                <p class="card-text">
                  (เลือกได้ 2 คน)
                </p>
                <style type="text/css">
                  th {
                    text-align:center;
                  }
                </style>
                <form action="" method="POST">
                <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th valign="center" class="text-center">หมายเลข</th>
                      <th class="text-center">รูปผู้สมัคร</th>
                      <th class="text-center">ชื่อ - นามสกุล</th>
                      <th class="text-center">หน่วยงาน</th>
                      <th class="text-center">ทำเครื่องหมาย <br><i class="fas fa-check"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($candidates as $key => $r){ ?>
                      <tr>
                        <td style="vertical-align:middle;text-align:center;"><div class="cnumber"><?php echo $r->c_number;?></div></td>
                        <td>
                          <img src="http://personnel.dusit.ac.th/eprofile/main/files/bio_data_file/<?php echo $r->pid;?>.jpg" class="img-fluid" width="90px">
                        </td>
                        <td><?php echo $r->candidate_name;?></td>
                        <td></td>
                        <td style="vertical-align:middle;text-align:center;">
                          <input class="candidate" type="checkbox" name="candidate_id[]" value="<?php echo $r->id; ?>" id="chk<?php echo $r->id; ?>">
                          <div class="anumber d-block d-sm-block d-md-none"><?php echo $r->c_number;?></div>
                        </td>
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
  <style>
   .anumber{
    color:#002EAD;
    font-weight:800;
    font-size:20px;
  }

  .cnumber{
    color:#002EAD;
    font-weight:800;
    font-size:40px;
  }
  .removeRow{
    background-color: #FF0000;
    color:#FFFFFF;
  }
</style>
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/sweetalert2/sweetalert2.min.css">
<script src="<?php echo base_url();?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
 <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/toastr/toastr.min.css">
<script src="<?php echo base_url();?>assets/plugins/toastr/toastr.min.js"></script>
  <script>
  var pcode='<?php echo $this->session->userdata['pcode']; ?>';
  $(document).ready(function() { 
    $('.candidate').click(function(){
      if($(this).is(':checked'))
      {
        $(this).closest('tr').addClass('removeRow');
      }
      else
      {
        $(this).closest('tr').removeClass('removeRow');
      }
    });

    $("input:checkbox.candidate").click(function() {
	    $('#no_candidate').attr('disabled', true);
      //$('#no_candidate').prop('checked',false);
      var cnklen = $('input[name="candidate_id[]"]:checked').length;
      
      if(cnklen > 1 ){
        //alert("เลือกได้ 2 คนเท่านั้น");
        //toastr.error("เลือกได้ 1 คนเท่านั้น");
        Swal.fire('เลือกได้ 1 คนเท่านั้น');
        $(this).closest('tr').removeClass('removeRow');
        return false
      }else if (cnklen == 0) {
        $('#no_candidate').attr('disabled', false);
      }
 
    }); 

    $("input:checkbox.no_candidate").click(function() {
   
        if(!$(this).is(":checked")){
          $('input:checkbox[name="candidate_id[]"]').attr('disabled', false);
           
          console.log("un checked");
        }else{
         $('input:checkbox[name="candidate_id[]"]').attr('disabled', true);                
         
          console.log("checked");
        }
        //alert('you are unchecked ' + $(this).val());
    }); 
    
    $("#submit2").click(function() {
      var checkbox =$('.candidate:checked');
      var checkbox2 =$('.no_candidate:checked');
      if(checkbox.length > 0 || checkbox2.length > 0){
       Swal.fire({
          title: 'ยืนยันบัตรประจำตัวประชาชน',
          html: `<input type="text" id="cardid" class="swal2-input" placeholder="รหัสประจำตัวประชาชน">`,
          confirmButtonText: 'ยืนยัน',
          showCancelButton: true,
          focusConfirm: false,
          preConfirm: () => {
            const cardid = Swal.getPopup().querySelector('#cardid').value
            
            if (!cardid) {
              Swal.showValidationMessage(`กรุณาระบุรหัสประจำตัวประชาชน`)
            }
            return { cardid: cardid }
          }
      }).then((result) => {
        
          $.ajax({
              url:"<?php echo base_url(); ?>council/card_exists",
              method:"POST",
              data:{cardid:result.value.cardid},
              dataType: 'json',
              success:function(response)
              {
                if(response.success){
                  var checkbox_value = [];
                  $(checkbox).each(function(){
                    checkbox_value.push($(this).val());
                  });
                  $(checkbox2).each(function(){
                    checkbox_value.push($(this).val());
                  });
                   $.ajax({
                      url:"<?php echo base_url(); ?>council/add_vote",
                      method:"POST",
                      data:{checkbox_value:checkbox_value,pcode:pcode},
                      success:function()
                      {
                        
                        $('#no_candidate').attr('disabled', false);
                        //alert("Thank you.");
                        toastr.error("Thank You.");
                        window.location.reload();
                        //window.location.href = base_url +'council/success';                    
                      }
                    });
                 
                }else{
                  Swal.fire(`รหัสประจำตัวประชาชนไม่ถูกต้อง`);
                  console.log(response.error);
                }
               
               
              }
            });
      
      })
 
      }else{
        //toastr.error("กรุณาเลือกผู้สมัคร");
        Swal.fire('กรุณาเลือกผู้สมัคร');
      }

   
    });

  });
 
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
var countDownDate = new Date("DEC 15, 2020 15:37:25").getTime();

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