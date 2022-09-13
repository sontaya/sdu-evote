 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <!-- <h1 class="m-0 text-dark">ลงคะแนนเลือกตั้ง</h1>-->
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
        <div class="col-12 text-center">
            <div class="section-title mb-4 pb-2">
                <h4 class="title mb-4">ลงคะแนนเลือกตั้ง</h4>
                <p class="text-muted para-desc mx-auto mb-0">การเลือกตั้งกรรมการสภามหาวิทยาลัย ประเภทจากพนักงานมหาวิทยาลัยสายสนับสนุน มหาวิทยาลัยสวนดุสิต</p>
            </div>
        </div><!--end col-->
    </div><!--end row-->

        <div class="row">
          <div class="col-lg-12 col-sm-12">
            <div class="card">
              <div class="card-body">
               <div class="row">
                 <div class="col-md-6">
                   <p id="demotime" class="text-center" style="font-size:20px;font-weight:500;  "></p>
                 </div>
                 <div class="col-md-6">
                   <p id="downtime" class="text-center" style="font-size:20px;font-weight:500;  "></p>
                 </div>
               </div>             
              
              </div>
            </div>

            <div class="card card-primary card-outline" id="formvote">
              <div class="card-body">
                <h5 class="card-title">ลงคะแนนเลือกตั้ง</h5>

                <p class="card-text text-danger">
                  (เลือกผู้สมัครได้ 1 คน)
                </p>
                <style type="text/css">
                  th {
                    text-align:center;
                  }
                </style>
                <form action="" method="POST">
                <input type="hidden" name="pcode" id="pcode" value="<?php echo $this->session->userdata['pcode']; ?>">
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
                          <input class="candidate" type="checkbox" name="candidate_id[]" value="<?php echo $r->c_number; ?>" id="chk<?php echo $r->c_number; ?>">                          
                        </td>
                        <td style="vertical-align:middle;text-align:center;"><div class="cnumber"><?php echo $r->c_number;?></div></td>
                        <td>
                          <img src="http://personnel.dusit.ac.th/eprofile/main/files/bio_data_file/<?php echo $r->pid;?>.jpg" class="img-fluid" width="90px">
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

  <script>
  var baseurl='<?php echo base_url();?>';
  var pcode=$('#pcode').val();

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
        //Swal.fire('เลือกได้ 1 คนเท่านั้น');
        Swal.fire({
          icon: 'error',
          title: 'เลือกได้ 1 คนเท่านั้น!',         
        });
       
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
          title: 'ยืนยันการลงคะแนน?',
          text: "โปรดตรวจสอบและยืนยันการเลือกของท่าน เมื่อท่านยืนยันแล้วระบบจะไม่สามารถเปลี่ยนแปลงแก้ไขได้!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'ยืนยัน',
          cancelButtonText: 'ยกเลิก',
        }).then((result) => {
          if (result.value) { //isConfirmed
            Swal.fire({
              title: 'ยืนยันบัตรประจำตัวประชาชน',
              //input: 'text',
              html: `<input type="text" id="cardid" class="swal2-input" placeholder="รหัสประจำตัวประชาชน">`,
              confirmButtonText: 'ตรวจสอบ',
              //showCancelButton: true,
              showLoaderOnConfirm: true,
              focusConfirm: false,
              preConfirm: () => {
               const cardid = Swal.getPopup().querySelector('#cardid').value
                //var myurl=baseurl+`council/card_exists/`;
               return new Promise(function (resolve,reject) {
                  $.ajax({
                    url: baseurl+`council/card_exists/` + cardid,
                    type: "POST",                
                    data: {cardid:cardid},               
                    dataType: 'json', 
                  }).done(function (response) {
                      console.log(response);
                      if(response.status=='error'){
                         Swal.showValidationMessage(`รหัสประจำตัวประชาชนไม่ถูกต้อง`);                    
                      }
                      resolve();
                     
                    }).fail(function (erordata) {
                      console.log(erordata);
                      swal.fire('Error!', 'Call error.', 'error');
                    })

                })
              },
               allowOutsideClick: () => !Swal.isLoading()
              }).then((result) => {
                
                if(result.value){

                  var checkbox_value = [];
                      $(checkbox).each(function(){
                        checkbox_value.push($(this).val());
                      });
                      $(checkbox2).each(function(){
                        checkbox_value.push($(this).val());
                      });
                      
                       $.ajax({
                          url: baseurl +"council/add_vote",
                          method:"POST",
                          data:{checkbox_value:checkbox_value,pcode:pcode},
                          success:function()
                          {                        
                            $('#no_candidate').attr('disabled', false);
                           
                            swal.fire({
                              icon: 'success',
                              title: 'Your vote has been saved',
                              showConfirmButton: false,
                              timer: 2000                             
                            }).then(function() {
                              window.location = baseurl +'council/success';
                            });                                           
                          }
                        });
                 
                }else{
                  /*Swal.fire(
                    'No data',
                    'No data has been deleted.',
                    'success'
                  )*/
                }

              }).catch(swal.noop);

          }
        })


      }else{
        //toastr.error("กรุณาเลือกผู้สมัคร");
        //Swal.fire('กรุณาเลือกผู้สมัคร');
        Swal.fire({
          icon: 'info',
          title: 'กรุณาเลือกผู้สมัคร',         
        });
      }

   
    });

  //setInterval(fetchdata,5000); //300000 (5*60*1000 = 5 minute)
});
 
//uncomment when online
//$('#formvote').hide();
//election_countdown();
election_vote_down();

function election_countdown(){
  // Set the date we're counting down to
  var countDownDate = new Date("JAN 5, 2021 18:47:00").getTime();

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
    document.getElementById("demotime").innerHTML ='<span class="text-primary">การเลือกตั้งจะเริ่มในอีก: </span> '+ days + " วัน " + hours + " ชั่วโมง "
    + minutes + " นาที " + seconds + " วินาที ";

    // If the count down is finished, write some text
    if (distance < 0) {
      clearInterval(x);
      //document.getElementById("demotime").innerHTML = '<span class="text-success">เริ่มการเลือกตั้งแล้ว</span>';
      election_vote_time();
      //$('#formvote').hide();
      $('#formvote').show();
    }
  }, 1000);
}

function election_vote_time(){
  var ttext;
  // Set the date we're counting down to
  var countDownDate = new Date("JAN 5, 2021 19:20:00").getTime();

  // Update the count down every 1 second
  var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    //var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
   //document.getElementById("demotime").innerHTML = '<span class="text-success">เหลือเวลาอีก: </span> '+ hours + " ชั่วโมง "
    //+ minutes + " นาที " + seconds + " วินาที ";
   if(hours == 0 && minutes !== 0){
    ttext = '<span class="text-success">เหลือเวลาในการเลือกตั้ง: </span> '+  minutes + " นาที " + seconds + " วินาที ";
   }else if(hours == 0 && minutes == 0){
    ttext = '<span class="text-success">เหลือเวลาในการเลือกตั้ง: </span> '+   seconds + " วินาที ";
   }else{
    ttext ='<span class="text-success">เหลือเวลาในการเลือกตั้ง: </span> '+ hours + " ชั่วโมง " + minutes + " นาที " + seconds + " วินาที ";
   }
  document.getElementById("demotime").innerHTML = ttext;
    // If the count down is finished, write some text
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("demotime").innerHTML = '<span class="text-danger">หมดเวลาการเลือกตั้งแล้ว</span>';
      $('#formvote').hide();
     
    }
  }, 1000);
}
 
 function election_vote_down(){
  var ttext;
  // Set the date we're counting down to
  var countDownDate = new Date().getTime() + (5*60000);;

  console.log(countDownDate);
  // Update the count down every 1 second
  var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    //var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
   //document.getElementById("demotime").innerHTML = '<span class="text-success">เหลือเวลาอีก: </span> '+ hours + " ชั่วโมง "
    //+ minutes + " นาที " + seconds + " วินาที ";
   if(hours == 0 && minutes !== 0){
    ttext = '<span class="text-success">เหลือเวลาในการเลือกตั้ง: </span> '+  minutes + " นาที " + seconds + " วินาที ";
   }else if(hours == 0 && minutes == 0){
    ttext = '<span class="text-success">เหลือเวลาในการเลือกตั้ง: </span> '+   seconds + " วินาที ";
   }else{
    ttext ='<span class="text-success">เหลือเวลาในการเลือกตั้ง: </span> '+ hours + " ชั่วโมง " + minutes + " นาที " + seconds + " วินาที ";
   }
  document.getElementById("downtime").innerHTML = ttext;
    // If the count down is finished, write some text
    if (distance < 0) {
      clearInterval(x);
      //document.getElementById("downtime").innerHTML = '<span class="text-danger">หมดเวลาการเลือกตั้งแล้ว</span>';
      
      $.ajax({
        url: baseurl +"login/signout",
        type: 'post',
        success: function(response){
          location.reload();
         // Perform operation on the return value
         //alert(response);
        }
       });
     
    }
  }, 1000);
}
 
 function fetchdata(){
   $.ajax({
    url: baseurl +"login/signout",
    type: 'post',
    success: function(response){
      location.reload();
     // Perform operation on the return value
     //alert(response);
    }
   });
  }
  
  </script>