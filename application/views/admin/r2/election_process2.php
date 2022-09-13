<style>
#button{
  display:block;
  margin:20px auto;
  padding:30px 30px;
  background-color:#ff0000;
  border:solid #ccc 1px;
  cursor: pointer;
}
#overlay{ 
  position: fixed;
  top: 0;
  z-index: 100;
  width: 100%;
  height:100%;
  display: none;
  background: rgba(0,0,0,0.6);
}
.cv-spinner {
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;  
}
.spinner {
  width: 40px;
  height: 40px;
  border: 4px #ddd solid;
  border-top: 4px #2e93e6 solid;
  border-radius: 50%;
  animation: sp-anime 0.8s infinite linear;
}
@keyframes sp-anime {
  100% { 
    transform: rotate(360deg); 
  }
}
.is-hide{
  display:none;
}
</style>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ประกาศผลคะแนนการเลือกตั้งกรรมการสภามหาวิทยาลัย จากคณาจารย์ประจำ</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">ประกาศผลคะแนนการเลือกตั้ง</li>
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
           <div class="col-lg-12">
              <input type="hidden" name="pcode" id="pcode" value="<?php echo $this->session->userdata['pcode']; ?>">      
                <button id="button" type="button" class="btn btn-danger">ประกาศผลคะแนน</button>

              <!--  <button id="but" type="button" class="btn btn-danger" onclick='redirect_Page(this)'>ประกาศผลคะแนน1</button>-->
                <div id="overlay">
                  <div class="cv-spinner">
                    <span class="spinner"></span>
                  </div>
                </div>
                
           </div>
        </div>
        <div class="row" id="tbl_score1">
          <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                   <h3 class="card-title">ประกาศผลคะแนนการเลือกตั้ง</h3>
                   
                </div>
              <div class="card-body p-0">
              <!--  <input type="hidden" name="pcode" id="pcode" value="<?php echo $this->session->userdata['pcode']; ?>">      
                <button id="button" type="button" class="btn btn-danger">ประกาศผลคะแนน</button> -->

              <!--  <button id="but" type="button" class="btn btn-danger" onclick='redirect_Page(this)'>ประกาศผลคะแนน1</button>-->
          
              
                          
                <style>
                  #tbl_score {
                    display: flex;
                    justify-content: center;
                  }

                  #desktop {
                    align-self: center;
                  }
                </style>
                
                <div class="table-responsive " >
                <table class="table table-bordered" id="desktop" style="width:60%">
                  <thead>
                    <tr>
                      
                     <th valign="center" class="text-center">หมายเลขผู้สมัคร</th>
                      <th valign="center" class="text-center">ชื่อ - สกุล</th>
                      <th valign="center" class="text-center">คะแนนรวม</th>  
                      <th valign="center" class="text-center">ลำดับคะแนน</th>                    
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
                </div>
             
              </div>
            </div>

            

           
          </div>
          
        </div>
        <!-- /.row -->

        <div class="row p-3" id="result">
           <div class="col-lg-12 text-center">
             
              <a href="<?php echo base_url();?>admin/report/election_rept2" class="btn btn-primary">สรุปผลการเลือกตั้ง</a>

           
           </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/sweetalert2/sweetalert2.min.css">
<script src="<?php echo base_url();?>assets/admin/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script>
  var baseurl='<?php echo base_url();?>';
 /* let redirect_Page = (ele) => {
      
        ele.value = 'Redirecting in 5 secs ...';
        ele.disabled = true;
         $("#overlay").fadeIn(5000);　
        let tID = setTimeout(function () {

      // redirect page.
            window.location.href = baseurl +'admin/report/election_vote';
            
            window.clearTimeout(tID);   // clear time out.
            
        }, 5000); // call function after 5000 milliseconds or 5 seconds
    }*/

  

  jQuery(function($){
   $("#tbl_score1").hide();
   $("#result").hide();
    //$("#but").hide();
    $('#button').click(function(){
       var pcode=$('#pcode').val();

        Swal.fire({
              title: 'ยืนยันการประมวลผลคะแนน?',
              //input: 'text',
              html: `<input type="password" id="cardid" class="swal2-input" placeholder="ระบุรหัส">`,
              confirmButtonText: 'ยืนยัน',
              //showCancelButton: true,
              showLoaderOnConfirm: true,
              focusConfirm: false,
              preConfirm: () => {
               const cardid = Swal.getPopup().querySelector('#cardid').value
                //var myurl=baseurl+`council/card_exists/`;
               return new Promise(function (resolve,reject) {
                  $.ajax({
                    url: baseurl+`admin/home/card_exists/` + cardid,
                    type: "POST",                
                    data: {cardid:cardid,pcode:pcode},               
                    dataType: 'json', 
                  }).done(function (response) {
                      console.log(response);
                      if(response.status=='error'){
                         Swal.showValidationMessage(`รหัสยืนยันไม่ถูกต้อง`);                    
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

                  // $("#but").click();
                  $(document).ajaxSend(function() {
                    $("#overlay").fadeIn(1000);　
                  });
                   
                  $.ajax({
                    url: baseurl + 'admin/report/process_score2',
                    type: 'GET',
                    success: function(data){                     

                      var obj = JSON.parse(data);
                      console.log(obj);
                       var html = '';
                      for (var i = 0; i < obj.length; i++) {          
                     
                       html += '<tr><td align="right" style="vertical-align:middle;text-align:center;"><strong>'+obj[i].c_number+'</strong></td>';
                       html += '<td><img src="'+baseurl+'uploads/events/'+obj[i].picture+'" width="64" height="70" class="my-n1" alt="">'+obj[i].fullname+'</td>';
                       html += '<td style="vertical-align:middle;text-align:center;">'+obj[i].score+'</td>';
                       html += '<td style="vertical-align:middle;text-align:center;">'+obj[i].score_order+'</td></tr>';
                       }
                       
                        
                       setTimeout(function() {
                        $("#tbl_score1").show();
                        $("#desktop tbody").html(html);
                        $("#result").show();
                      }, 5000);   
                      $('#button').hide();             

                    }      
                  }).done(function() {
                    setTimeout(function(){
                      $("#overlay").fadeOut(1000);
                    },5000);
                  });
                 
                }else{
                  /*Swal.fire(
                    'No data',
                    'No data has been deleted.',
                    'success'
                  )*/
                }

              }).catch(swal.noop);
     
     
    }); 

  });
</script>
