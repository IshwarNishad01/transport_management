

<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Employee Advance Report
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>reports">Report</a></li>
               <li class="breadcrumb-item active">Employee Advance Report</li>
            </ol>
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <form method="post" id="vehicle_report" class="card basicvalidation" action="<?php echo base_url();?>reports/employeeadvancereport">
         <div class="card-body">
            <div class="row">
               <div class="col-md-3">
                  <div class="form-group row">
                     <label for="fuel_from" class="col-sm-5 col-form-label">Report From</label>
                     <div class="col-sm-6 form-group">
                        <input type="date" required="true" class="form-control form-control-sm" value="<?php echo isset($_POST['fuel_from']) ? $_POST['fuel_from'] : ''; ?>" id="fuel_from" name="from" placeholder="Date From">
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="form-group row">
                     <label for="fuel_to" class="col-sm-5 col-form-label">Report To</label>
                     <div class="col-sm-6 form-group">
                        <input type="date" required="true" class="form-control form-control-sm" value="<?php echo isset($_POST['fuel_to']) ? $_POST['fuel_to'] : ''; ?>" id="fuel_to" name="to" placeholder="Date To">
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group row">
                     <label for="booking_to" class="col-sm-3 col-form-label">Vehicle</label>
                     <div class="col-sm-8 form-group">
                        <select required="true" id="fuel_vechicle"  class="form-control selectized"  name="vechicle">
                           <option value="all">All Vechicle</option>
                           <?php foreach ($vehiclelist as $key => $vechiclelists) { ?>
                           <option <?php echo (isset($_POST['booking_vechicle']) && ($_POST['booking_vechicle'] == $vechiclelists['v_id'])) ? 'selected':'' ?> value="<?php echo output($vechiclelists['v_registration_no']) ?>"><?php echo output($vechiclelists['v_name']).' - '. output($vechiclelists['v_registration_no']); ?></option>
                           <?php  } ?>
                        </select>
                     </div>
                  </div>
               </div>
               <input type="hidden" id="vehicle_report" name="submit" value="1">
               <div class="col-md-2">
                  <button type="submit" class="btn btn-block btn-outline-info btn-sm"> Generate Report</button>
               </div>
            </div>
         </div>
   </div>
   </form>
    <div class="card">
        <div class="card-body p-0">
            <?php if(!empty($employees)){ 
             ?>
                   <table id="advanceemployee" class="datatableexport table card-table">
                      <thead>
                        <tr>
                          <th class="w-1">S.No</th>
                           <th>Vehicle</th>
                          <th>Name</th>
                          <th>Date</th>
                          <th>Description</th>
                          <th>Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if(!empty($employees)){  $count=1;
                           foreach($employees as $records){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                            <td> <?php echo output($records['vehicle']); ?></td>
                           <td> <?php echo output($records['name']); ?></td>
                           <td> <?php echo output($records['date']); ?></td>
                           <td><?php echo output($records['description']); ?></td>
                           <td><?php echo output($records['amount']); ?></td>
                        </tr>
                        <?php } } ?>
                      </tbody>
                    </table>
                     <?php }  ?>
        </div>
      </div>
   </div>
</section>

