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
/*         aNIMATION */
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
   /* padding: 10px;
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
                    <li class="nav-item rounded-top" style="background-color:#F873BA;">
                        <a class="nav-link active show" id="home1-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home1" aria-selected="true">1.กรรมการสภามหาวิทยาลัย
จากคณาจารย์ประจำ<br> (เลือกผู้สมัครได้ 2 คน)</a>
                    </li>
                    <li class="nav-item rounded-top" style="background-color:#B39F62;">
                        <a class="nav-link" id="home2-tab" data-toggle="tab" href="#home2" role="tab" aria-controls="home2" aria-selected="false">
                        2.สภาคณาจารย์และพนักงาน<br> (เลือกผู้สมัครได้ 19 คน)
                      </a>
                    </li>
                   
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="home" role="tabpanel" style="background-color:#F873BA;">

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
                     <?php foreach ($candidate2 as $key => $r){ ?>
                      <tr id="ck<?php echo $r->id; ?>">
                         <td style="vertical-align:middle;text-align:center;">
                         <input type="checkbox"  class="d-none candidate2 imgbgchk" name="candidate_id2[]" data-c_num="<?php echo $r->c_number; ?>" value="<?php echo $r->id; ?>" id="chk_<?php echo $r->id;?>" />
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
                <tr id="ck02">
                  <td style="vertical-align:middle;text-align:center;">
                  <input type="checkbox"  class="d-none no_candidate2 imgbgchk" name="no_candidate2" data-c_num="0" value="0" id="no_candidate2" />
                    <label for="no_candidate2">
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
                     
            <input type="button" class="btn btn-success" value = "หน้าถัดไป" onclick = "return validate1();" />

                  </div>
                </div>
               <!-- /////  -->
                    </div>

                 <div class="tab-pane fade" id="home2" role="tabpanel" aria-labelledby="home2-tab" style="background-color:#B39F62;">
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
                  <input type="checkbox"  class="d-none no_candidate1 imgbgchk" name="no_candidate1" data-c_num="0" value="0" id="no_candidate1" />
                    <label for="no_candidate1">
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
                    </div>
                  </div>


                <br>
                <div class="row">
           
                  <div class="col-md-12 text-center pb-3">
                     
            <button type="button" class="btn btn-success" id="submit2"><i class="fas fa-check"></i> บันทึกการลงคะแนน</button>
                  </div>
                </div>
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
    function validate1() {
    var checkbox21=$('.candidate2:checked');
    var checkbox20=$('.no_candidate2:checked');
    
    if(checkbox21.length > 0 || checkbox20.length > 0) {      
      $('a[href="#home2"]').tab('show');     
    }else{
      Swal.fire({icon: 'info', title: 'กรุณาเลือกผู้สมัคร', });
    }
}

function validate2() {}

  $(document).ready(function() {
     
//group 2
    $("input:checkbox.candidate2").click(function() {
     $('#no_candidate2').attr('disabled', true);
      var markedCheckbox2 = document.querySelectorAll('input[name="candidate_id2[]"]:checked');
      var cnklen2 = $('input[name="candidate_id2[]"]:checked').length;
      //console.log(cnklen3);
      if(cnklen2 > 2 ){
        Swal.fire({
          icon: 'error',
          title: 'เลือกได้ 2 คนเท่านั้น!',         
        });

        //$(this).closest('tr').removeClass('removeRow');
        return false
      }else if (cnklen2 == 0) {
        $('#no_candidate2').attr('disabled', false);
      }else{
        //document.getElementById('vdata1').innerHTML = "";
        for (var checkbox2 of markedCheckbox2) {
          console.log(checkbox2.value);
          if (checkbox2.checked) {

        }
       
      }
    }

  }); 

  $("input:checkbox.no_candidate2").click(function() {      
      if(!$(this).is(":checked")){
        $('input:checkbox[name="candidate_id2[]"]').attr('disabled', false);
          console.log("no_candidate2 unchecked");
        }else{
         $('input:checkbox[name="candidate_id2[]"]').attr('disabled', true);           
         console.log("no_candidate2 checked");
       }
  });

//group 1
  $("input:checkbox.candidate1").click(function() {
     $('#no_candidate1').attr('disabled', true);
      var checkedElemets = $('.candidate1:checked');
      var markedCheckbox1 = document.querySelectorAll('input[name="candidate_id1[]"]:checked');
      var cnklen1 = $('input[name="candidate_id1[]"]:checked').length;
      //console.log(cnklen1);
      if(cnklen1 > 19 ){

        Swal.fire({
          icon: 'error',
          title: 'เลือกได้ 19 คนเท่านั้น!',         
        });

        return false
      }else if (cnklen1 == 0) { 
        $('#no_candidate1').attr('disabled', false);
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
      var checkedElemets = $('.no_candidate1:checked');
      if(!$(this).is(":checked")){
        $('input:checkbox[name="candidate_id1[]"]').attr('disabled', false);       
          console.log("no_candidate1 unchecked");
        }else{
         $('input:checkbox[name="candidate_id1[]"]').attr('disabled', true);       
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

      var checkbox11 =$('.candidate1:checked');
      var checkbox10=$('.no_candidate1:checked');
      var checkbox21 =$('.candidate2:checked');
      var checkbox20=$('.no_candidate2:checked');
      if((checkbox11.length > 0 || checkbox10.length > 0) && (checkbox21.length > 0 || checkbox20.length > 0)){
        
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
            //console.log('v_data'+v_data);
            var checkbox_value = [];
            $(checkbox11).each(function(){
              $data=$(this).val()+':1';
              checkbox_value.push($data);             
            });
            $(checkbox21).each(function(){
              $data=$(this).val()+':2';
              checkbox_value.push($data);              
            });
            $(checkbox10).each(function(){
               $data=$(this).val()+':1';
               checkbox_value.push($data);              
            });
            $(checkbox20).each(function(){
               $data=$(this).val()+':2';
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
                  $('#no_candidate2').attr('disabled', false);
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
 // election_vote_expire();
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
      $('#formvote').hide();
     
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