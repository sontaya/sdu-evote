<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url();?>" class="brand-link">
      <img src="<?php echo base_url()?>uploads/img/dusit.png" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SDU eVote</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
     <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">       

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="<?php echo base_url()?>" class="nav-link <?php if($this->uri->segment(1)==""){echo ' active';}?>">
              
              <i class="nav-icon fas fa-home"></i>
              <p class="text">หน้าแรก</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('council/check_election')?>" class="nav-link <?php if($this->uri->segment(2)=="check_election"){echo ' active';}?>">
              
              <i class="nav-icon fas fa-info-circle"></i>
              <p>ข้อมูลสิทธิการเลือกตั้ง</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('council/candidate')?>" class="nav-link <?php if($this->uri->segment(2)=="candidate"){echo ' active';}?>">
              
              <i class="nav-icon fas fa-people-arrows"></i>
              <p>รายชื่อผู้สมัคร</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo site_url('council/vote')?>" class="nav-link <?php if($this->uri->segment(2)=="vote"){echo ' active';}?>">
              <i class="nav-icon fas fa-vote-yea"></i>
              
              <p>ลงคะแนน</p>
            </a>
          </li>
         
          
          <li class="nav-header">ช่วยเหลือ</li>
          <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-file"></i>
                  <p>คู่มือใช้งานระบบ</p>
                </a>
           </li>
           <li class="nav-item">
            <a href="<?php echo base_url()?>login/logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              
              <p class="text">ออกจากระบบ</p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>