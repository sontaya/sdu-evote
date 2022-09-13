 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ข้อมูลผู้มีสิทธิเลือกตั้ง</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">ข้อมูลผู้มีสิทธิเลือกตั้ง</li>
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
                   <h3 class="card-title">รายชื่อผู้มีสิทธิเลือกตั้ง</h3>
                   <div class="card-tools">
                    <!-- <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#addModal">
                              <i class="fas fa-plus">
                              </i>
                              Add
                          </a> -->          
            
                  </div>
                </div>
              <div class="card-body p-0">
              

                <div class="table-responsive">
                <table class="table table-bordered" id="tbluser">
                  <thead>
                    <tr>
                        <th valign="center" class="text-center">ID</th>
                     <th valign="center" class="text-center">ลำดับบัญชีรายชื่อ</th>
                      <th valign="center" class="text-center">HRCODE</th>                     
                      <th >ชื่อ - นามสกุล</th>
                      <th class="text-center">หน่วยงาน</th>
                      <th class="text-center">ตำแหน่ง</th>
                      <th class="text-center">สถานที่</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php 
                     $i=1;
                     foreach ($users as $key => $r){ ?>
                      <tr>
                          <td><?php echo $r->id;?></td>
                      <td><?php echo $r->n_order;?></td>
                      <td><?php echo $r->hrcode;?></td>
                        <td ><?php echo $r->fullname;?></td>                                                
                        <td><?php echo $r->department;?></td>
                        <td><?php echo $r->position_type;?></td>
                        <td><?php echo $r->sub_department;?></td>
                       
                      </tr>
                <?php $i++; } ?>
                  </tbody>
                </table>
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

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>    
 
<script>
    $(document).ready(function(){
 
        $("#tbluser").DataTable();
         
    });
</script>