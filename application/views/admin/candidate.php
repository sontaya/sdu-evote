 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ข้อมูลผู้สมัคร</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">ข้อมูลผู้สมัคร</li>
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
                   <h3 class="card-title">รายชื่อผู้สมัคร</h3>
                   <div class="card-tools">
                     <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#addModal">
                              <i class="fas fa-plus">
                              </i>
                              Add
                          </a>           
            
                  </div>
                </div>
              <div class="card-body p-0">
              

                <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                     <th valign="center" class="text-center">#</th> 
                     <th class="text-center">กลุ่มผู้สมัคร</th>
                      <th valign="center" class="text-center">หมายเลข</th>
                      <th >รูปผู้สมัคร</th>
                      <th >ชื่อ - นามสกุล</th>                      
                      <th class="text-center">หน่วยงาน</th>
                      <th class="text-center">จัดการ</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php 
                     $i=1;
                     foreach ($candidates as $key => $r){ ?>
                      <tr>
                      <td style="vertical-align:middle;text-align:center;"><?php echo $r->id;;?></td>
                      <td><?php echo $r->group_id;?></td>
                        <td style="vertical-align:middle;text-align:center;"><div class="cnumber"><?php echo $r->c_number;?></div></td>
                        <td>
                          <img src="<?php echo base_url('uploads/candidate/'.$r->picture);?>" class="img-fluid" width="100px">
                          <!--<img src="http://personnel.dusit.ac.th/eprofile/main/files/bio_data_file/<?php echo $r->pid;?>.jpg" class="img-fluid" width="90px"> -->
                        </td>
                        <td><?php echo $r->fullname;?></td>
                        
                        <td><?php echo $r->department;?></td>
                        <td style="vertical-align:middle;text-align:center;">
                          
                          <a class="btn btn-info btn-sm btn-edit" href="#" data-id="<?= $r->id;?>" data-candidate_name="<?= $r->fullname;?>" data-department="<?= $r->department;?>" data-c_number="<?= $r->c_number;?>"  data-pid="<?= $r->pid;?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm btn-delete" href="#" data-id="<?= $r->id;?>">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                        </td>
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

   <!-- Modal Add Product-->
    <form action="<?php echo base_url()?>admin/candidate/save" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                 <div class="form-group">
                    <label>หมายเลขผู้สมัคร</label>
                    <input type="text" class="form-control" name="c_number" placeholder="หมายเลขผู้สมัคร">
                </div>

                 <div class="form-group">
                    <label>รหัสพนักงาน</label>
                    <input type="text" class="form-control" name="pid" placeholder="รหัสพนักงาน">
                </div>

                <div class="form-group">
                    <label>ชื่อผู้สมัคร</label>
                    <input type="text" class="form-control" name="candidate_name" placeholder="ชื่อผู้สมัคร">
                </div>
                 
                <div class="form-group">
                    <label>หน่วยงาน</label>
                    <input type="text" class="form-control" name="department" placeholder="หน่วยงาน">
                </div>
             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Add Product-->
 
    <!-- Modal Edit Product-->
    <form action="<?php echo base_url()?>admin/candidate/update" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>หมายเลขผู้สมัคร</label>
                    <input type="text" class="form-control c_number" name="c_number" placeholder="หมายเลขผู้สมัคร">
                </div>

                 <div class="form-group">
                    <label>รหัสพนักงาน</label>
                    <input type="text" class="form-control pid" name="pid" placeholder="รหัสพนักงาน">
                </div>

                <div class="form-group">
                    <label>ชื่อผู้สมัคร</label>
                    <input type="text" class="form-control candidate_name" name="candidate_name" placeholder="ชื่อผู้สมัคร">
                </div>
                 
                <div class="form-group">
                    <label>หน่วยงาน</label>
                    <input type="text" class="form-control department" name="department" placeholder="หน่วยงาน">
                </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" class="id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Edit Product-->
 
    <!-- Modal Delete Product-->
    <form action="<?php echo base_url()?>admin/candidate/delete" method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
               <h4>Are you sure want to delete?</h4>
             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" class="cid">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->
 
<script>
    $(document).ready(function(){
 
        // get Edit Product
        $('.btn-edit').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            const c_number = $(this).data('c_number');
            const pid = $(this).data('pid');
            const candidate_name = $(this).data('candidate_name');
            const department = $(this).data('department');
            // Set data to Form Edit
            $('.id').val(id);
            $('.c_number').val(c_number);
            $('.pid').val(pid);
            $('.candidate_name').val(candidate_name);
            $('.department').val(department);
            // Call Modal Edit
            $('#editModal').modal('show');
        });
 
        // get Delete Product
        $('.btn-delete').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            // Set data to Form Edit
            $('.cid').val(id);
            // Call Modal Edit
            $('#deleteModal').modal('show');
        });
         
    });
</script>