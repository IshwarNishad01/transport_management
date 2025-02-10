<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark">Employee Salary Report
            </h1>
         </div>
         <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>reports">Report</a></li>
               <li class="breadcrumb-item active">Employee Salary Report</li>
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
      <form method="post" id="vehicle_report" class="card basicvalidation" action="<?php echo base_url();?>reports/employeesalaryreport">
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
            
               <input type="hidden" id="vehicle_report" name="employeesalary_report" value="1">
               <div class="col-md-2">
                  <button type="submit" class="btn btn-block btn-outline-info btn-sm"> Generate Report</button>
               </div>
            </div>
         </div>
   </div>
   </form>
    <div class="card">
        <div class="card-body p-0">
            <?php if(!empty($salary)){ 
             ?>
                   <table  class="datatableexport table card-table">
                      <thead>
                        <tr>
                          <th class="w-1">S.No</th>
                           <th>Date</th>
                          <th>Name</th>
                          <th>Expense</th>
                          <th>Month</th>
                          <th>Salary</th>
                           <th>Mode Of Payment</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if(!empty($salary)){  $count=1;
                           foreach($salary as $record){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                            <td> <?php echo output($record['date']); ?></td>
                           <td> <?php echo output($record['name']); ?></td>
                           <td> <?php echo output($record['expense']); ?></td>
                           <td><?php echo output($record['month']); ?></td>
                           <td><?php echo output($record['salary']); ?></td>
                           <td><?php echo output($record['mode']); ?></td>
                        </tr>
                        <?php } } ?>
                      </tbody>
                    </table>
                     <?php }  ?>
        </div>
      </div>
   </div>
</section>
