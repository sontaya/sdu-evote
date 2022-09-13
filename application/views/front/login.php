 <?php
    $query = $this->db->query('SELECT * FROM sitesettings');
    $row = $query->row();
    if (isset($row))
    {
        $sdate = $row->start_time;
        $edate = $row->end_time;
    }
    if (check_on_date($sdate,$edate)){
       
    }else{
        redirect(base_url());
    }

    ?>

  <style>
    .login-head {
      margin-top: 0;
      margin-bottom: 20px;
      padding-bottom: 20px;
      border-bottom: 1px solid #ddd;
      text-align: center;
  }
  .form-control {
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 0.875rem;
    line-height: 1.5;
    color: #495057;
    background-color: #FFF;
    background-clip: padding-box;
    border: 2px solid #ced4da;
    border-radius: 4px;
    -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    -o-transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
}
  </style>
  <main role="main" class="container">
      <div class="album py-5 ">
          <div class="container">

              <div class="row justify-content-center">

                <div class="login-box">
                  <div class="login-logo">

                    <!--<a href="<?php echo base_url();?>"><b>SDU</b> eVote</a> -->
                  </div>
                  <!-- /.login-logo -->
                  <div class="card">
                    <div class="card-body login-card-body">
                     <div class="text-center">
                     <img src="<?php echo base_url();?>uploads/1.png" height="80px" alt="logo">
                     <!--<h3 class="login-head">
                     <i class="far fa-user-circle"></i>

                                เข้าสู่ระบบ			</h3> --><br>
                             
                      </div>
                       <p class="login-box-msg"></p>
                      <form action="<?php echo base_url()?>login/signin" method="post">
                      <label for="username" class="control-label">ชื่อผู้ใช้งาน เช่น thunyamai_klu</label>
                        <div class="input-group mb-3">
                          <input name="username" type="text" class="form-control" autocomplete="off" placeholder="ชื่อผู้ใช้งาน" required>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-user"></span>
                            </div>
                          </div>
                        </div>
                        <label for="password">เลขประจำตัวประชาชน</label>
                        <div class="input-group mb-3">
                          <input name="password" type="text" class="form-control"  autocomplete="off" placeholder="เลขประจำตัวประชาชน" required>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-lock"></span>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-4">

                          </div>
                          <!-- /.col -->
                          <div class="col-8">
                            <button type="submit" class="btn btn-primary btn-block">เข้าสู่ระบบ</button>
                          </div>
                          <!-- /.col -->
                        </div>
                      </form>

                    </div>

                  </div>
                </div>

              </div>

          </div>
      </div>
  </main>
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/toastr/toastr.min.css">
<script src="<?php echo base_url();?>assets/admin/plugins/toastr/toastr.min.js"></script>

<script type="text/javascript">
  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
<?php       
        if($this->session->flashdata('error_message')) { ?>
        toastr.error("<?php echo $this->session->flashdata('error_message'); ?>");
          <?php  }  ?>
</script>

