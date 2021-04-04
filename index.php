<?php 

include 'code.php';
include 'search.php';


?>
	
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<section class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-6">
					<a href="index.php"><img src="img/logo.JPG" alt="logo"></a>
			  </div>
			
			</div>
		  </div>
		</section>
		
    <!-- Main content -->
    <section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card-header">
						<h3 class="card-title"><b>Booking Details</b></h3>
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default" style=" float:right;color:white;background-color:#007bff;">
					Import Record
				</button>
					</div>
					<div class="card-body">
					<form method="POST">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
								  <label>Employee Name</label>
								  <select class="form-control select2" name="ename" style="width: 100%;">
									<option selected="selected"></option>
									<?php

									include("conn.php");
									error_reporting(0);
									$query = "Select * from employee ORDER BY employee_name ASC; ";
									$dep = mysqli_query($con,$query);
									?>
									<?php

									while ($val = mysqli_fetch_array($dep)) {
										?>
 									<option value="<?php echo $val['ID']; ?>">
 										<?php echo $val['employee_name']; ?></option>
									<?php
									}

									?>
									
									
									
								  </select>
								</div>
					  
							<!-- /.form-group -->
							</div>
							<div class="col-md-3">
									<div class="form-group">
									  <label>Event Name</label>
									  <select class="form-control select2" name="event_nam" style="width: 100%;">
										<option selected="selected"></option>
											<?php

									include("conn.php");
									error_reporting(0);
									$query1 = "Select * from event ORDER BY event_name ASC; ";
									$event = mysqli_query($con,$query1);
									?>
									<?php

									while ($val1 = mysqli_fetch_array($event)) {
										?>
 									<option value="<?php echo $val1['ID']; ?>">
 										<?php echo $val1['event_name']; ?></option>
									<?php
									}

									?>
									  </select>
									</div>
						
							</div>   
							<div class="col-md-3">
								<div class="form-group">
									<label>Event Date:</label>

									  <div class="input-group">
										<div class="input-group-prepend">
										  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
										</div>
										<input type="date" name="date1" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
									  </div>
							 
								</div>
							
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label style="color:white;">:</label>
									
										<button type="submit" name="search" class="btn btn-block btn-success" style="background-color:#007bff;">Search</button>
									</form>

								</div>
							</div>
						</div>
					</form>
					</div>
					
					<div class="card">
						<div class="card-header">
							<h3 class="card-title"><b>Booking Record</b></h3>
						</div>
						<div class="card-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead style="color:blue;">
									  <tr>
										<th>Participation ID</th>
										<th>Employee Name</th>
										<th>Employee Email</th>
										<th>Event Name</th>
										<th>Date</th>
										<th>Participation Fees</th>
									  </tr>
								</thead>
								<tbody>
								<?php
							
									while($t = mysqli_fetch_array($result11)) 
									{
										  $ttl=$t['Total'];											
									}							
									while($row10 = mysqli_fetch_array($result10)) 
									{
										$total=$row10['Total'];
								?>
									  <tr>
										<td><?php echo $row10['participation_id'] ;?></td>
										<td><?php echo $row10['employee_name'] ;?></td>
										<td><?php echo $row10['employee_mail'] ;?></td>
										<td><?php echo $row10['event_name'] ;?></td>
										<td><?php echo $row10['event_date'] ;?></td>
										<td><?php echo $row10['participation_fee'] ;?></td>
									  </tr>
								<?php
									}
								?>		
															
								</tbody>
							</table>
						</div>
					  
					</div>
        
				</div>
        
			</div>
       
		</div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

							
<div class="col-md-3 col-sm-6 col-12" style="float:right;">
            <div class="info-box">
              <span class="info-box-icon bg-blue"><i class="far fa-calendar"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Fees</span>
                <span class="info-box-number"><?php echo $ttl;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
		  <form method="POST">
            <div class="modal-header">
              <h4 class="modal-title">Import JSON File</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <input type="file" name="file" />
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="import" class="btn btn-primary">Import</button>
            </div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
 
 
 
 
</div>
<!-- ./wrapper -->


</body>

