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
<?php
if(isset($this->session->userdata['logged_admin'])){
 $level = $this->session->userdata['user_level'];

 ?>
      <!-- Sidebar Menu -->
      <nav class="mt-2">       

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
         
          <li class="nav-header">ผู้ดูและระบบ</li>
          <?php if($level=='1'){?>
          <li class="nav-item">
            <a href="<?php echo base_url('admin/home');?>" class="nav-link <?php if($this->uri->segment(2)=="home"){echo ' active';}?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li> 
        <?php } ?>
          <?php if($level=='4'){?>
          
          <li class="nav-item">
            <a href="<?php echo base_url('admin/report/election_process2');?>" class="nav-link <?php if($this->uri->segment(3)=="election_process2"){echo ' active';}?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>1.คณาจารย์ประจำ</p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="<?php echo base_url('admin/report/election_process3');?>" class="nav-link <?php if($this->uri->segment(3)=="election_process3"){echo ' active';}?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>2.พนักงานมหาวิทยาลัย<br> สายสนับสนุน</p>
            </a>
          </li> 
           <li class="nav-item">
            <a href="<?php echo base_url('admin/report/election_process1');?>" class="nav-link <?php if($this->uri->segment(3)=="election_process1"){echo ' active';}?>">
             <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>3.สภาคณาจารย์และพนักงาน</p>
            </a>
          </li> 
        <?php } ?>
      <?php if($level=='1'){?>
          <li class="nav-item">
            <a href="<?php echo base_url('admin/event');?>" class="nav-link <?php if($this->uri->segment(2)=="event"){echo ' active';}?>">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>ข้อมูลกิจกรรม</p>
            </a>
          </li>        
       <?php } ?>
       <?php if($level=='1'){?>
          <li class="nav-item">
            <a href="<?php echo base_url('admin/user');?>" class="nav-link <?php if($this->uri->segment(2)=="user"){echo ' active';}?>">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>ข้อมูลผู้มีสิทธิเลือกตั้ง</p>
            </a>
          </li>
           <?php } ?>
        <?php if($level=='1'){?>  
           <li class="nav-item">
            <a href="<?php echo base_url('admin/report/vote_list');?>" class="nav-link <?php if($this->uri->segment(3)=="vote_list"){echo ' active';}?>">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>รายงานผู้ลงคะแนนเลือกตั้ง</p>
            </a>
          </li>
           <?php } ?>
          <?php if($level=='1' || $level=='3'){?>
           <li class="nav-item">
            <a href="<?php echo base_url('admin/report/election_report');?>" class="nav-link <?php if($this->uri->segment(3)=="election_report"){echo ' active';}?>">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>รายงานจำนวนผู้มาใช้สิทธิ</p>
            </a>
          </li>
           <?php } ?>
         <?php if($level=='1' || $level=='3'){?>
           <li class="nav-item">
            <a href="<?php echo base_url('admin/report/election_result1');?>" class="nav-link <?php if($this->uri->segment(3)=="election_result1"){echo ' active';}?>">
              <i class="nav-icon fas fa-table"></i>
              <p>รายงานผลการเลือกตั้ง 1</p>
            </a>
          </li>
           <?php } ?>
          <?php if($level=='1' || $level=='3'){?>
          <li class="nav-item">
            <a href="<?php echo base_url('admin/report/election_result2');?>" class="nav-link <?php if($this->uri->segment(3)=="election_result2"){echo ' active';}?>">
              <i class="nav-icon fas fa-table"></i>
              <p>รายงานผลการเลือกตั้ง 2</p>
            </a>
          </li>
       <?php }} ?>
          <li class="nav-header">ช่วยเหลือ</li>
         
           <li class="nav-item">
            <a href="<?php echo base_url()?>admin/login/logout" class="nav-link">
              <i class="nav-icon fas fa-door-closed"></i>
              <p class="text">ออกจากระบบ</p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>