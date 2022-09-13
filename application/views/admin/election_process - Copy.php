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
            <h1 class="m-0 text-dark">ประมวลผลคะแนนการเลือกตั้ง</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">ประมวลผลผลคะแนนการเลือกตั้ง</li>
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
              <div class="card">
                <div class="card-header">
                   <h3 class="card-title">ประมวลผลผลคะแนนการเลือกตั้ง</h3>
                   
                </div>
              <div class="card-body p-0">
                      
                <button id="button" type="button" class="btn btn-danger">ประมวลผลคะแนน</button>

                <button id="but" type="button" class="btn btn-danger" onclick='redirect_Page(this)'>ประมวลผลคะแนน2</button>
          
                <div id="overlay">
                  <div class="cv-spinner">
                    <span class="spinner"></span>
                  </div>
                </div>
                <style>
                  #tbl_score {
                    display: flex;
                    justify-content: center;
                  }

                  #desktop {
                    align-self: center;
                  }
                </style>
                 <input type="hidden" name="pcode" id="pcode" value="<?php echo $this->session->userdata['pcode']; ?>">
                <div class="row">
                  <div class="col-md-6">
                     <div class="table-responsive " id="tbl_score1">
                <table class="table table-bordered" id="desktop" style="width:60%">
                  <thead>
                    <tr><th colspan="4">รายชื่อและหมายเลขผู้สมัครเข้ารับการคัดเลือกกันเองเป็นกรรมการบริหารงานบุคคลจากผู้แทนคณาจารย์ประจำ</th></tr>
                    <tr>                      
                     <th valign="center" class="text-center">หมายเลขผู้สมัคร</th>
                      <th valign="center" class="text-center">ชื่อ - สกุล</th>
                      <th valign="center" class="text-center">คะแนนรวม</th>  
                      <th valign="center" class="text-center">ลำดับที่ได้</th>                    
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
                </div>
                  </div>
                  <div class="col-md-6">
                    
                  </div>
                </div>
               
               
             
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

 
    
 
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">

  /*  google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
     function drawChart() { 
      var jsonData = $.ajax({ 
          url: baseurl + 'admin/report/fetch_chart', 
          dataType: "json", 
          async: false 
          }).responseText; 
           
      // Create our data table out of JSON data loaded from server. 
      var data = new google.visualization.DataTable(jsonData); 
 
      // Instantiate and draw our chart, passing in some options. 
      var chart = new google.visualization.PieChart(document.getElementById('chart_div')); 
      chart.draw(data, {width: 800, height: 300}); 
    } 
*/
  </script> 
 <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/sweetalert2/sweetalert2.min.css">
<script src="<?php echo base_url();?>assets/admin/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script>
  let redirect_Page = (ele) => {
      
        ele.value = 'Redirecting in 5 secs ...';
        ele.disabled = true;
         $("#overlay").fadeIn(5000);　
        let tID = setTimeout(function () {

      // redirect page.
            window.location.href = 'https://www.dusit.ac.th/';
            
            window.clearTimeout(tID);   // clear time out.
            
        }, 5000); // call function after 5000 milliseconds or 5 seconds
    }

  var baseurl='<?php echo base_url();?>';

  jQuery(function($){
    $("#tbl_score1").hide();
   
    
    $('#button').click(function(){
       var pcode=$('#pcode').val();

        Swal.fire({
              title: 'ยืนยันการประมวลผลคะแนน?',
              //input: 'text',
              html: `<input type="text" id="cardid" class="swal2-input" placeholder="รหัสประจำตัวประชาชน">`,
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
                  $(document).ajaxSend(function() {
                    $("#overlay").fadeIn(1000);　
                  });
                   
                  $.ajax({
                    url: baseurl + 'admin/report/process_score',
                    type: 'GET',
                    success: function(data){                      

                     
                      var obj = JSON.parse(data);
                      console.log(obj);
                       var html = '';
                      for (var i = 0; i < obj.length; i++) {          
                     
                       html += '<tr><td align="right" style="vertical-align:middle;text-align:center;"><strong>'+obj[i].c_number+'</strong></td>';
                       html += '<td><img src="'+baseurl+'uploads/candidate/'+obj[i].pid+'.jpg" width="64" height="64" class="my-n1" alt="">'+obj[i].fullname+'</td>';
                       html += '<td style="vertical-align:middle;text-align:center;">'+obj[i].total+'</td>';
                       html += '<td style="vertical-align:middle;text-align:center;">'+obj[i].num_row+'</td></tr>';
                       }
                        $("#tbl_score1").show();
                       setTimeout(function() {
                        $("#desktop tbody").html(html);
                        
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
