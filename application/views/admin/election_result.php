 <div class="content-wrapper">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ผลการเลือกตั้ง</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">ผลการเลือกตั้ง</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	<section class="content">
		<div class="row">
			<div class="col-lg-6">
				 <div class="card">
			        <div class="card-header">
			          <h3 class="card-title">คะแนนรายบุคลเรียงตามหมายเลข</h3>

			        </div>
			        <div class="card-body">
			        	<div class="table-responsive">
			        		<table class="table table-bordered" style="width:100%">
			        			<thead>
			        				<th valign="center" class="text-center">#</th>
                      <th valign="center" class="text-center">หมายเลข</th>
                      <th valign="center" class="text-center">ชื่อสกุล</th>
                      <th valign="center" class="text-center">คะแนน</th>
			        			</thead>
			        			<tbody>
			        				<?php 
                     				$i=1;
                     				foreach ($score1 as $key => $r){ ?>
                     					<tr>
                     						<td valign="center" class="text-center"><?php echo $i; ?></td>
                     						<td valign="center" class="text-center"><?php echo $r->c_number; ?></td>
                     						<td><?php echo $r->candidate_name; ?></td>
                                <td valign="center" class="text-center"><?php echo $r->total; ?></td>
                     					</tr>
                     			<?php 
                     			$i += 1; 
                     			
                     			} 

                     			?>
                     			
			        			</tbody>
			        		</table>
			        	</div>
                 <a href="<?php echo site_url('admin/report/print2');?>" class="btn btn-primary">พิมพ์</a>
			        </div>
			       
			      </div>
             
			</div> 
			<div class="col-lg-6">
				<div class="card">
			        <div class="card-header">
			          <h3 class="card-title">คะแนนรายบุคคลเรียงตามคะแนน</h3>			         
			        </div>
			        <div class="card-body">
			        	<div class="table-responsive">
			        		<table class="table table-bordered">
			        			<thead>
			        				<th valign="center" class="text-center">#</th>
                      <th valign="center" class="text-center">หมายเลข</th>
			        				<th valign="center" class="text-center">ชื่อสกุล</th>
			        				<th valign="center" class="text-center">คะแนน</th>
			        			</thead>
			        			<tbody>
			        				<?php 
                            $i=1;
                            foreach ($score2 as $key => $r){ ?>
                              <tr>
                                <td valign="center" class="text-center"><?php echo $i; ?></td>
                                <td valign="center" class="text-center"><?php echo $r->c_number; ?></td>
                                <td><?php echo $r->candidate_name; ?></td>
                                <td valign="center" class="text-center"><?php echo $r->total; ?></td>
                              </tr>
                          <?php 
                          $i += 1; 
                          
                          } 

                          ?>
			        			</tbody>
			        		</table>
			        	</div>
                 <a href="<?php echo site_url('admin/report/print');?>" class="btn btn-primary">พิมพ์</a>
			        </div>
			       
			      </div>
             
			</div>
		</div>
    
    <div class="row">
      <div class="col-md-12">
      <!--  <a href="<?php echo site_url('admin/report/print');?>" class="btn btn-primary">พิมพ์ผลการเลือตั้ง</a>-->
      </div>
    </div>
    </section>

</div>