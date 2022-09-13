 <div class="content-wrapper">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>รายงานจำนวนผู้มาใช้สิทธิ</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">รายงานจำนวนผู้มาใช้สิทธิ</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	<section class="content">
		<div class="row">
			<div class="col-lg-8">
				 <div class="card">
			        <div class="card-header">
			          <h3 class="card-title">จำนวนผู้มีสิทธิทั้งหมด</h3>

			        </div>
			        <div class="card-body">
			        	<div class="table-responsive">
			        		<table class="table table-bordered">
			        			<thead>
			        				<th>#</th>
			        				<th>หน่วยงาน</th>
									<th>ประเภท</th>
			        				<th>จำนวนผู้มีสิทธิ</th>
                      <th>จำนวนผู้ใช้สิทธิ</th>
			        			</thead>
			        			<tbody>
			        				<?php 
                     				$i=1;$sum=0;$sum2=0;
                     				foreach ($orgs as $key => $r){ ?>
                     					<tr>
                     						<td><?php echo $i; ?></td>
                     						<td><?php echo $r->department; ?></td>
											<td><?php echo $r->position_level; ?></td>
                     						<td style="vertical-align:middle;text-align:center;"><?php echo $r->total; ?></td>
                                <td style="vertical-align:middle;text-align:center;"><?php echo $r->total2; ?></td>
                     					</tr>
                     			<?php 
                     			$i += 1; 
                     			$sum = $sum + $r->total;
                          $sum2 = $sum2 + $r->total2;
                     			} 

                     			?>
                     				<tr>
                     					<td colspan="3" style="vertical-align:middle;text-align:center;">รวม</td>
                     					<td style="vertical-align:middle;text-align:center;"><?php echo $sum; ?></td>
                              <td style="vertical-align:middle;text-align:center;"><?php echo $sum2; ?></td>
                     				</tr> 
			        			</tbody>
			        		</table>
			        	</div>
			        </div>
			       
			      </div>
			</div> 
			<div class="col-lg-4">
			<!--	<div class="card">
			        <div class="card-header">
			          <h3 class="card-title">จำนวนผู้มาใช้สิทธิ</h3>			         
			        </div>
			        <div class="card-body">
			        	<div class="table-responsive">
			        		<table class="table table-bordered">
			        			<thead>
			        				<th>#</th>
			        				<th>หน่วยงาน</th>
			        				<th>จำนวนผู้มาใช้สิทธิ</th>
			        			</thead>
			        			<tbody>
			        				<?php 
                     				$i=1;$sum=0;
                     				foreach ($currents as $key => $r){ ?>
                     					<tr>
                     						<td><?php echo $i; ?></td>
                     						<td><?php echo '(' . $r->faculty_id . ')' .$r->faculty_name; ?></td>
                     						<td style="vertical-align:middle;text-align:center;"><?php echo $r->total; ?></td>
                     					</tr>
                     			<?php 
                     			$i += 1; 
                     			$sum = $sum + $r->total;
                     			} 

                     			?>
                     				<tr>
                     					<td colspan="2" style="vertical-align:middle;text-align:center;">รวม</td>
                     					<td style="vertical-align:middle;text-align:center;"><?php echo $sum; ?></td>
                     				</tr>
			        			</tbody>
			        		</table>
			        	</div>
			        </div>
			       
			      </div> -->
			</div>
		</div>
      <!-- Default box -->
     
      <!-- /.card -->
      <!-- Default box -->
      
      <!-- /.card -->

    </section>

</div>