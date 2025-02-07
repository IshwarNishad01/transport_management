<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($incomexpensedetails)) ? 'Edit Salary' : 'Add Salary' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($incomexpensedetails)) ? 'Edit Salary' : 'Add Salary' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form method="post" id="Income_Expense" class="card" action="<?php echo base_url(); ?>Salary/<?php echo (isset($incomexpensedetails)) ? 'updatesalary' : 'insertsalary'; ?>">
          <div class="card-body">


            <div class="row">
              <?php if (isset($incomexpensedetails)) { ?>

                <input type="hidden" name="id" id="is_date" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['id'] : '' ?>">
              <?php } ?>
          
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Date<span class="form-required">*</span></label>
                  <input type="date" class="form-control" id="date" name="date" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['date'] : '' ?>" placeholder="">

                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['name'] : '' ?>" name="name" placeholder="Name">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Month</label>
                  <input type="month" class="form-control" id="month" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['month'] : '' ?>" name="month" placeholder="Month">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Mode Of Payment</label>
                  <select name="mode" id="mode" class="form-control">
                    <option value="">Select type</option>
                    <option <?php if ((isset($incomexpensedetails)) && $incomexpensedetails[0]['mode'] == 'Cash') {
                              echo 'selected';
                            } ?> value="Cash">Cash</option>
                    <option <?php if ((isset($incomexpensedetails)) && $incomexpensedetails[0]['mode'] == 'UPI') {
                              echo 'selected';
                            } ?> value="UPI">UPI</option>
                  </select>
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Salary<span class="form-required">*</span></label>
                  <input type="text" class="form-control" id="salary" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['salary'] : '' ?>" name="salary" placeholder="Salary">
                </div>
              </div>

              
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Expense<span class="form-required">*</span></label>
                  <input type="text" class="form-control" id="expense" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['expense'] : '' ?>" name="expense" placeholder="Expense">
                </div>
              </div>

            </div>
            <input type="hidden" id="created_at" name="created_at" value="<?php echo date('Y-m-d h:i:s'); ?>">

            <div class="modal-footer">

              <button type="submit" class="btn btn-primary"> <?php echo (isset($incomexpensedetails)) ? 'Update Salary' : 'Add Salary' ?></button>
            </div>
        </form>
      </div>
    </section>
    <!-- /.content -->