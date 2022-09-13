<?php
$query = $this->db->query("SELECT * FROM sitesettings");
$row = $query->row();
if (isset($row))
{
    $st_date = $row->start_time;
    $en_date = $row->end_time;
}
//if (check_on_date($sdate,$edate)){$go_url = base_url('login'); }else{$go_url ='javascript:alert();';}
?>
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

  .cimg{  
    width: 90px;
        }
    @media only screen and (max-width: 600px) { 
      .mtext{
        font-size: 12px;
      }
        .c_number{
            color: red ;
            font-size: 20px;
            font-weight: 700;
        }
        .cimg{
            width: 50px;
        }
       
        table th{
            font-size: 10px;
        }
        table tr td{
            font-size: 11px;
        }
    }
    input[type=radio]{
  transform:scale(2);
}
</style>

<main role="main" class="container">
    <div class="album py-5 ">
        <div class="container">
<style>
    .col img{
            height:100px;
            width: 100%;
            cursor: pointer;
            transition: transform 1s;
            object-fit: cover;
        }
        .col label{
            overflow: hidden;
            position: relative;
        }
        label{
            overflow: hidden;
            position: relative;
        }
        .imgbgchk:checked + label>.tick_container{
            opacity: 1;
        }
  /*  aNIMATION */
        .imgbgchk:checked + label>img{
            transform: scale(1.25);
            opacity: 0.3;
        }
        .tick_container {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            cursor: pointer;
            text-align: center;
        }
        .tick {
            background-color: #FFF;
            border: 2px solid red;
            color: red;
            padding: 3px 12px;
          /*  font-size: 16px;
           
            height: 60px;*/
            width: 80x;
            /*border-radius: 100%;*/
        }
        .tick i{
          font-size:70px;
        }
</style>
      

        <div class="row">
          <div class="col-lg-12 col-sm-12">

                <style type="text/css">
                  th {
                    text-align:center;
                  }
                  .nav-item .nav-link {
                  text-align: center;
                  font-size: 16px;
                  color: #333;
                  font-weight: 600;
                  border-radius: inherit;
                  border: inherit;
                  padding: 0px;
                  text-transform: capitalize !important;
              }
              .nav-item .nav-link.active {
                  color: #4125dd;
                  background-color: transparent;
              }

               ul.custom-tab {
                  -webkit-box-pack: center;
                  -ms-flex-pack: center;
                  justify-content: center;
                  /*border-bottom: 1px solid #dee2e6;*/
                  /*padding: 10px;
                  border: 1px solid #dee2e6;
                  margin-bottom: 5px;*/
              }
              ul.custom-tab li {
                  margin-right: 0px;
                  padding: 15px;
                  position: relative;
              }
              ul.custom-tab li a {
                  color: #252525;
                  font-size: 25px;
                  line-height: 25px;
                  font-weight: 600;
                  text-transform: capitalize;
                  
                  position: relative;
              }
              ul.custom-tab li a:hover:before {
                  width: 100%;
              }
              ul.custom-tab li a:before {
                  position: absolute;
                  left: 0;
                  bottom: 0;
                  content: "";
                  background: #4125dd;
                  width: 0;
                  height: 2px;
                  -webkit-transition: all 0.4s;
                  -o-transition: all 0.4s;
                  transition: all 0.4s;
              }
              ul.custom-tab li a.active {
                  color: #4125dd;
              }
                </style>
                <form action="" method="POST" id="form_vote">
                    <input type="hidden" name="refid" id="refid" value="<?php echo $this->session->userdata['refid']; ?>">
                    <input type="hidden" name="hrcode" id="hrcode" value="<?php echo $this->session->userdata['hrcode']; ?>">
                    <input type="hidden" name="vote_group" id="vote_group" value="<?php echo $this->session->userdata['vote_group']; ?>">
                    <input type="hidden" name="cnum" id="cnum" value="">


                 <ul class="nav custom-tab nav-fill" id="myTab" role="tablist">
                  <li class="nav-item rounded-top" style="background-color:#B39F62;">
                        <a class="nav-link  active show" id="home1-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home1" aria-selected="true">
                        1.สภาคณาจารย์และพนักงาน<br> (เลือกผู้สมัครได้ 19 คน)
                      </a>
                    </li>
                    <li class="nav-item rounded-top" style="background-color:#68CEF5;">
                        <a class="nav-link" id="home2-tab" data-toggle="tab" href="#home2" role="tab" aria-controls="home2" aria-selected="false">2.กรรมการสภามหาวิทยาลัย จากพนักงานมหาวิทยาลัย สายสนับสนุน<br> (เลือกผู้สมัครได้ 2 คน)</a>
                    </li>
                    
                   
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="home" role="tabpanel" style="background-color:#B39F62;">
                <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center">เลือก </th>
                      <th valign="center" class="text-center">หมายเลข</th>
                      <th class="text-center">รูปผู้สมัคร</th>
                      <th class="text-center">ชื่อ - นามสกุล</th>

                    </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($candidate1 as $key => $r){ ?>
                      <tr id="ck<?php echo $r->id; ?>">
                         <td style="vertical-align:middle;text-align:center;">
                         <input type="checkbox"  class="d-none candidate1 imgbgchk" name="candidate_id1[]" data-c_num="<?php echo $r->c_number; ?>" value="<?php echo $r->id; ?>" id="chk_<?php echo $r->id;?>" />
                      <!--   <input type="radio" name="imgbackground" id="img2" class="d-none imgbgchk" value=""> -->
                        <label for="chk_<?php echo $r->id; ?>">
                          <img src="<?php echo base_url('uploads/img/vote2.jpg');?>" alt="Image<?php echo $r->id; ?>" width="50px">
                          <div class="tick_container">
                            <div class="tick"><i class="fa fa-times" aria-hidden="true" ></i></div>
                          </div>
                        </label>
                                               
                        </td>
                        <td style="vertical-align:middle;text-align:center;"><div class="cnumber"><?php echo $r->c_number;?></div></td>
                        <td>
                          <img src="<?php echo base_url('uploads/events/'.$r->picture);?>" width="60px">
                        </td>
                        <td><?php echo $r->fullname;?></td>
                       
                      </tr>
                <?php } ?>
                <tr id="ck01">
                  <td style="vertical-align:middle;text-align:center;">
                  <input type="checkbox"  class="d-none no_candidate1 imgbgchk" name="candidate_id1[]" data-c_num="0" value="0" id="chk_001" />
                    <label for="chk_001">
                          <img src="<?php echo base_url('uploads/img/vote2.jpg');?>" alt="Image0" width="50px">
                          <div class="tick_container">
                            <div class="tick"><i class="fa fa-times" aria-hidden="true" ></i></div>
                          </div>
                        </label>
                  </td>
                  <td colspan="3" style="vertical-align:middle;">
                  ไม่ประสงค์ลงคะแนน
                  </td>
                </tr>
                  </tbody>
                </table>
              </div>
                      
             <!-- ///// -->
            <div class="row">
           
                  <div class="col-md-12 text-center pb-3">
                     <a href="javascript:validate1('#home');" class="btn btn-success">หน้าถัดไป <i class="fas fa-arrow-right"></i></a>
          <!--  <input type="button" class="btn btn-success" value = "หน้าถัดไป" onclick = "return validate1('#home');" />-->

                  </div>
                </div>
               <!-- /////  -->
                    </div>

                 <div class="tab-pane fade" id="home2" role="tabpanel" aria-labelledby="home2-tab" style="background-color:#68CEF5;">
                       
               <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center">เลือก </th>
                      <th valign="center" class="text-center">หมายเลข</th>
                      <th class="text-center">รูปผู้สมัคร</th>
                      <th class="text-center">ชื่อ - นามสกุล</th>

                    </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($candidate3 as $key => $r){ ?>
                      <tr id="ck<?php echo $r->id; ?>">
                         <td style="vertical-align:middle;text-align:center;">
                         <input type="checkbox"  class="d-none candidate3 imgbgchk" name="candidate_id3[]" data-c_num="<?php echo $r->c_number; ?>" value="<?php echo $r->id; ?>" id="chk_<?php echo $r->id;?>" />
                      <!--   <input type="radio" name="imgbackground" id="img2" class="d-none imgbgchk" value=""> -->
                        <label for="chk_<?php echo $r->id; ?>">
                          <img src="<?php echo base_url('uploads/img/vote2.jpg');?>" alt="Image<?php echo $r->id; ?>" width="50px">
                          <div class="tick_container">
                            <div class="tick"><i class="fa fa-times" aria-hidden="true" ></i></div>
                          </div>
                        </label>
                                               
                        </td>
                        <td style="vertical-align:middle;text-align:center;"><div class="cnumber"><?php echo $r->c_number;?></div></td>
                        <td>
                          <img src="<?php echo base_url('uploads/events/'.$r->picture);?>" width="60px">
                        </td>
                        <td><?php echo $r->fullname;?></td>
                       
                      </tr>
                <?php } ?>
                <tr id="ck03">
                  <td style="vertical-align:middle;text-align:center;">
                  <input type="checkbox"  class="d-none no_candidate3 imgbgchk" name="candidate_id3[]" data-c_num="0" value="0" id="chk_003" />
                    <label for="chk_003">
                          <img src="<?php echo base_url('uploads/img/vote2.jpg');?>" alt="Image0" width="50px">
                          <div class="tick_container">
                            <div class="tick"><i class="fa fa-times" aria-hidden="true" ></i></div>
                          </div>
                        </label>
                  </td>
                  <td colspan="3" style="vertical-align:middle;">
                  ไม่ประสงค์ลงคะแนน
                  </td>
                </tr>
                  </tbody>
                </table>
              </div>
              <!-- ///// -->
<div class="row">
           
                  <div class="col-md-12 text-center pb-3">
                    <a href="javascript:validate2('#home2');" class="btn btn-warning"><i class="fas fa-undo"></i> ย้อนกลับ</a>
                   <!--   <input type="button" class="btn btn-warning" value="ย้อนกลับ" onclick="return validate2('#home2');" /> -->
            <button type="button" class="btn btn-success" id="submit2"><i class="fas fa-check"></i> บันทึกการลงคะแนน</button>
                  </div>
                </div>
               <!-- ///// -->
                    </div>
                  </div>

               


                <br>
                

               </form>
                
            

          </div>
         
        </div>


     
    </div>
</main>

  <style>
   
</style>
<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/sweetalert2/sweetalert2.min.css">
<script src="<?php echo base_url();?>assets/admin/plugins/sweetalert2/sweetalert2.all.min.js"></script>

  <script>

function validate1(tabid) {
  var checkbox11=$('.candidate1:checked');
  var checkbox10=$('.no_candidate1:checked');
    
    if(checkbox11.length > 0 || checkbox10.length > 0) {      
      $('a[href="#home2"]').tab('show');  
      //$('a[href="'+tabid+'"]').tab('show');   
    }else{
      Swal.fire({icon: 'info', title: 'คุณยังไม่ได้เลือก สภาคณาจารย์และพนักงาน', });
    }
}

function validate2(tabid) {
    var checkbox31=$('.candidate3:checked');
    var checkbox30=$('.no_candidate3:checked');
    
    if(checkbox31.length > 0 || checkbox30.length > 0) {      
      $('a[href="#home"]').tab('show');  
      //$('a[href="'+tabid+'"]').tab('show');   
    }else{
      Swal.fire({icon: 'info', title: 'คุณยังไม่ได้เลือก กรรมการสภามหาวิทยาลัย จากพนักงานมหาวิทยาลัย สายสนับสนุน', });
     
    }
}


  $(document).ready(function() {

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
      var target = $(e.target).attr("href"); // activated tab
      //var ctarget= $(e.relatedTarget).attr("href");
      //alert(target);
      if(target=="#home"){
       validate2(target);
       
      }else if(target=="#home2"){
      validate1(target);
     
      }

    });

  
//group 3
    $("input:checkbox.candidate3").click(function() {
     $('.no_candidate3').attr('disabled', true);
      var markedCheckbox3 = document.querySelectorAll('input[name="candidate_id3[]"]:checked');
      var cnklen3 = $('.candidate3:checked').length;
      //console.log(cnklen3);
      if(cnklen3 > 2 ){
        Swal.fire({
          icon: 'error',
          title: 'เลือกได้ 2 คนเท่านั้น!',         
        });

        //$(this).closest('tr').removeClass('removeRow');
        return false
      }else if (cnklen3 == 0) {
        $('.no_candidate3').attr('disabled', false);
      }else{
        //document.getElementById('vdata1').innerHTML = "";
        for (var checkbox1 of markedCheckbox3) {
          console.log(checkbox1.value);
          if (checkbox1.checked) {

        }
       
      }
    }

  }); 

  $("input:checkbox.no_candidate3").click(function() {      
      if(!$(this).is(":checked")){
        $('.candidate3').attr('disabled', false);
          console.log("no_candidate3 unchecked");
        }else{
         $('.candidate3').attr('disabled', true);           
         console.log("no_candidate3 checked");
       }
  });

//group 1
  $("input:checkbox.candidate1").click(function() {
     $('.no_candidate1').attr('disabled', true);
      //var checkedElemets = $('.candidate1:checked');
      var markedCheckbox1 = document.querySelectorAll('input[name="candidate_id1[]"]:checked');
      //var cnklen1 = $('input[name="candidate_id1[]"]:checked').length;
      var cnklen1 = $('.candidate1:checked').length;
      //console.log(cnklen1);
      if(cnklen1 > 19 ){

        Swal.fire({
          icon: 'error',
          title: 'เลือกได้ 19 คนเท่านั้น!',         
        });

        return false
      }else if (cnklen1 == 0) { 
        $('.no_candidate1').attr('disabled', false);
      }else{

       // document.getElementById('vdata2').innerHTML = "";
        for (var checkbox1 of markedCheckbox1) {
          console.log(checkbox1.value);
          if (checkbox1.checked) {

        }
       
      }
    }

  }); 

    $("input:checkbox.no_candidate1").click(function() {
      //var checkedElemets = $('.no_candidate1:checked');
      if(!$(this).is(":checked")){
        $('.candidate1').attr('disabled', false);       
          console.log("no_candidate1 unchecked");
        }else{
         $('.candidate1').attr('disabled', true);       
         console.log("no_candidate1 checked");
       }
      }); 

    $("#submit2").click(function() {
   
      //check current session and signout
      $.get( baseurl+"vote/check_session", function( data ) {
        console.log(data);
          if(data==="1")
           {

           }else{
            window.location = baseurl +'login/signout';
           }
      });

      var refid=$('#refid').val();
      var hrcode=$('#hrcode').val();
      var vote_group=$('#vote_group').val();

      var checkbox11 =$('input[name="candidate_id1[]"]:checked');   
      var checkbox31 =$('input[name="candidate_id3[]"]:checked');

      if((checkbox11.length > 0) && (checkbox31.length > 0)){
        
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

            var checkbox_value = [];
            $(checkbox11).each(function(){
              $data=$(this).val()+':1';
              checkbox_value.push($data);             
            });
            $(checkbox31).each(function(){
              $data=$(this).val()+':3';
              checkbox_value.push($data);              
            });

            console.log(checkbox_value);

           $.ajax({
              url: baseurl +"vote/add_vote",
              method:"POST",
              data:{checkbox_value:checkbox_value,refid:refid,hrcode:hrcode,vote_group:vote_group},
              success:function(data)
              {  
                console.log(data);
                if(data==true){ 

                  $('#no_candidate1').attr('disabled', false);
                  $('#no_candidate3').attr('disabled', false);
                  window.location = baseurl +'vote/success';
             
                } else{
                  Swal.fire('รหัสนี้ใช้เลือกตั้งแล้ว.');
                }                    

              }
            });


          }else{}
        }); //end swal .catch(swal.noop)

    }else{
      Swal.fire({icon: 'info', title: 'กรุณาเลือกทั้ง 2 คณะ', });
    }

  });

  //setInterval(fetchdata,5000); //300000 (5*60*1000 = 5 minute)
});

var cc_date ='<?php echo $en_date;?>';
//uncomment when online
//$('#formvote').hide();
//election_countdown();
 election_vote_expire();
//  limit_vote_time();


function election_vote_expire(){
  var ttext;
  // Set the date we're counting down to
    //var countDownDate = new Date("Mar 14, 2022 15:00:00").getTime();
  var countDownDate = new Date(cc_date.replace(/\s/, 'T')).getTime();

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
   //document.getElementById("demotime").innerHTML = '<span class="text-success">เหลือเวลาอีก: </span> '+ hours + " ชั่วโมง "
    //+ minutes + " นาที " + seconds + " วินาที ";
   /*   if(hours == 0 && minutes !== 0){
        ttext = '<span class="text-success">เหลือเวลา: </span> '+  minutes + " : " + seconds ;
      }else if(hours == 0 && minutes == 0){
        ttext = '<span class="text-success">เหลือเวลา: </span> '+  minutes + " : " + seconds;
      }else if(days == 0 && hours !== 0 && minutes !== 0){
        ttext ='<span class="text-success">เหลือเวลา: </span> '+ hours + " : " + minutes + " : " + seconds ;
      }else{
          ttext ='<span class="text-success">เหลือเวลา: </span> '+ days + " วัน " + hours + " : " + minutes + " : " + seconds;
      }

    document.getElementById("demotime").innerHTML = ttext;*/
    // If the count down is finished, write some text
    if (distance < 0) {
      clearInterval(x);
      //document.getElementById("demotime").innerHTML = '<span class="text-danger">หมดเวลาการเลือกตั้งแล้ว</span>';
      //$('#formvote').hide();
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
 
 function limit_vote_time(){
  var ttext;
  // Set the date we're counting down to
  var countDownDate = new Date().getTime() + (5*60000);

  //console.log(countDownDate);
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
    ttext = '<span class="text-success">คุณมีเวลาในการลงคะแนน: </span> '+  minutes + " : " + seconds ;
   }else if(hours == 0 && minutes == 0){
    ttext = '<span class="text-success">คุณมีเวลาในการลงคะแนน: </span> '+  minutes + " : " + seconds  ;
   }else{
    ttext ='<span class="text-success">คุณมีเวลาในการลงคะแนน: </span> '+ hours + " : " + minutes + " : " + seconds;
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