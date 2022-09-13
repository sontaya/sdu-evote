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
        <div class="container ">
  
    
        <div class="row">
          <div class="col-lg-12 col-sm-12">
            <div class="card">
              <div class="card-body">


             <div class="row">
                 <div class="col-md-6">
                 <div class="alert alert-success">
                  รหัสพนักงาน: <?php echo $this->session->userdata['hrcode']; ?><br>
                  ชื่อ-สกุล: <?php echo $this->session->userdata['fullname']; ?>
                  </div>
                 <!--  <p id="demotime" class="text-center" style="font-size:20px;font-weight:500;  "></p> -->
                 </div>
                 <div class="col-md-6 text-center">
                   <p>
                <!-- <button id="demotime" type="button" class="btn btn-outline-success"></button>-->
                 <button id="downtime" type="button" class="btn btn-outline-danger"></button>
                </p>
 
                  <!--   <p id="demotime" class="text-center" style="font-size:20px;font-weight:500;  "></p>
                   <p id="downtime" class="text-center" style="font-size:20px;font-weight:500;  "></p> -->
                 </div>
                
               </div>
              
              </div>
            </div>



                <style type="text/css">
                  th {
                    text-align:center;
                  }
                </style>
                <form action="" method="POST" id="form_vote">
                    <input type="hidden" name="refid" id="refid" value="<?php echo $this->session->userdata['refid']; ?>">
                    <input type="hidden" name="hrcode" id="hrcode" value="<?php echo $this->session->userdata['hrcode']; ?>">
                    <input type="hidden" name="vote_group" id="vote_group" value="<?php echo $this->session->userdata['vote_group']; ?>">
                   <!-- <input type="hidden" name="cnum" id="cnum" value=""> -->
        <div class="card card-primary" >
          <div class="card-header" style="background-color:<?php echo $ccolor; ?>;">
            <p class="card-title text-white">1.<?php echo $title; ?> <span class="text-warning">(เลือกผู้สมัครได้ <?php echo $selected; ?> คน) </span></p> 
          </div>
          <div class="card-body">
                <div class="row add_bottom_15">
      <div class="col-md-10">

            <div class="row">

             <?php foreach ($candidates as $key => $r){ ?>

              <div class="col col-lg-3 col-md-3 col-sm-3 col-6 text-center">
                 <input type="checkbox"  class="d-none candidate1 imgbgchk" name="candidate_id1[]" value="<?php echo $r->id; ?>" title='1' id="chk_<?php echo $r->id;?>" />
                     
                        <label for="chk_<?php echo $r->id; ?>">
                          <img src="<?php echo base_url();?>uploads/events/<?php echo $r->picture;?>" alt="Image<?php echo $r->c_number; ?>" width="80px">
                          
                          <div class="tick_container">
                            <div class="tick"><i class="fa fa-times" aria-hidden="true" ></i></div>
                          </div>
                        </label><br>
                        <label style="font-size: 14px"><?php echo $r->fullname; ?></label>

              </div>

            <?php } ?>
           
          </div>
      
    </div>
    <div class="col-md-2">

     <div class="card card-danger">
      <div class="card-header">
        <p class="card-title text-danger" >ไม่ประสงค์<br>ลงคะแนน</p>
      </div>
      <div class="card-body">
        <div class="row">
           <div class="col col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                 <input type="checkbox"  class="d-none no_candidate1 imgbgchk" name="no_candidate1" value="0" title='1' id="no_candidate1" />
                     
                        <label for="no_candidate1">
                          <img src="<?php echo base_url();?>uploads/img/vote2.jpg" alt="Image0" width="50px">
                          
                          <div class="tick_container">
                            <div class="tick"><i class="fa fa-times" aria-hidden="true" ></i></div>
                          </div>
                        </label><br>
                    <!--    <label style="font-size: 11px">ไม่ประสงค์ลงคะแนน</label> -->

              </div>
         <!-- <input class="no_candidate" type="checkbox" name="no_candidate" value="0" id="no_candidate">-->
        </div>
      </div>

    </div>
  <!--  <div style="border:3px; border-style:solid; border-color:#f1f5f9;padding-top: 5px;padding-bottom: 5px">
      <h6 class="card-text text-danger">
        เบอร์ที่เลือก  &nbsp;<span class="text-primary" id="vcount1"></span>
      </h6>     

      <span class="text-success cnumber text-center" id="vdata1"></span>
    </div>  -->
    
  </div>


</div>

  </div>
      </div>

                <br>
                <div class="row">
           
                  <div class="col-md-12">
                     
            <button type="button" class="btn btn-block btn-success" id="submit2"><i class="fas fa-check"></i> บันทึกการลงคะแนน</button>
                  </div>
                </div>
               </form>
                
             <?php

             ?>
          


          </div>
         
        </div>


        </div>
    </div>
</main>

  <style>
   
</style>
<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/sweetalert2/sweetalert2.min.css">
<script src="<?php echo base_url();?>assets/admin/plugins/sweetalert2/sweetalert2.all.min.js"></script>

<script>
  var baseurl='<?php echo base_url();?>';
  var selec = '<?php echo $selected;?>';
  $(document).ready(function() { 

    $("input:checkbox.candidate1").click(function() {
     $('#no_candidate1').attr('disabled', true);
      //$('#no_candidate').prop('checked',false);
      //var markedCheckbox = document.querySelectorAll('input[type="checkbox"]:checked');
      var markedCheckbox1 = document.querySelectorAll('input[name="candidate_id1[]"]:checked');
      var cnklen1 = $('input[name="candidate_id1[]"]:checked').length;
      //console.log(cnklen1);
      if(cnklen1 > selec ){

        Swal.fire({
          icon: 'error',
          title: 'เลือกได้ '+ selec + ' คนเท่านั้น!',         
        });

        //$(this).closest('tr').removeClass('removeRow');
        return false
      }else if (cnklen1 == 0) {
       // document.getElementById('vcount1').innerHTML = "";
       // document.getElementById('vdata1').innerHTML = "";
        $('#no_candidate1').attr('disabled', false);
      }else{

        document.getElementById('vdata1').innerHTML = "";
        for (var checkbox1 of markedCheckbox1) {
          console.log(checkbox1.value);
          if (checkbox1.checked) {
          //document.getElementById('vcount1').innerHTML = cnklen1 ;
          //document.getElementById('vdata1').innerHTML += checkbox1.value + ' ';
           //document.body.append(checkbox1.value + ' ');
        }
       
      }
    }

  }); 

    $("input:checkbox.no_candidate1").click(function() {
      
      if(!$(this).is(":checked")){
        $('input:checkbox[name="candidate_id1[]"]').attr('disabled', false);
        //$("#image-checkbox").attr("disabled", false);
          //$(this).find('img').attr('disabled', false);
          
          console.log("no_candidate1 unchecked");
        }else{
         $('input:checkbox[name="candidate_id1[]"]').attr('disabled', true); 
         //$("#image-checkbox").attr("disabled", true);
         //$(this).find('img').attr('disabled', true);              
          
         console.log("no_candidate1 checked");
       }
        //alert('you are unchecked ' + $(this).val());
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
      //var cardid=$('#cardid').val();
      //var v_data=document.getElementById("vdata").innerText;
      //var v_count=document.getElementById("vcount").innerText;
      var checkbox11 =$('.candidate1:checked');
      var checkbox10=$('.no_candidate1:checked');
     
      if(checkbox11.length > 0 || checkbox10.length > 0){
      
        
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
         
            $(checkbox10).each(function(){
               $data=$(this).val()+':1';
               checkbox_value.push($data);              
            });
       

            console.log(checkbox_value);
           

            $.ajax({
              url: baseurl +"vote/add_vote3",
              method:"POST",
              data:{checkbox_value:checkbox_value,refid:refid,hrcode:hrcode,vote_group:vote_group},
              //data:{checkbox_value:checkbox_value,otpcode:otpcode,v_data:v_data,v_count:v_count},
              success:function(data)
              {  
                console.log(data);
                if(data==true){ 

                  $('#no_candidate1').attr('disabled', false);
                  
                  window.location = baseurl +'vote/success';
               /*   swal.fire({
                    icon: 'success',
                    title: 'ขอบคุณ.',
                    showConfirmButton: false,
                    timer: 2000                             
                  }).then(function() {
                    window.location = baseurl +'otp/success';
                  });  */ 
                } else{
                  Swal.fire('รหัสนี้ใช้เลือกตั้งแล้ว.');
                }                    

              }
            });


          }else{}
        }); //end swal .catch(swal.noop)

    }else{
      Swal.fire({icon: 'info', title: 'กรุณาเลือกผู้สมัคร', });
    }

  });

});


</script>