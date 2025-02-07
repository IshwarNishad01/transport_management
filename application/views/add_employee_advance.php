<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($incomexpensedetails)) ? 'Edit Employee Advance' : 'Add Employee Advance' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Employee Advance</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($incomexpensedetails)) ? 'Edit Employee Advance' : 'Add Employee Advance' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form method="post" id="Income_Expense" class="card" action="<?php echo base_url(); ?>Employee/<?php echo (isset($incomexpensedetails)) ? 'updaterecord' : 'insertrecord'; ?>">
          <div class="card-body">

            <div class="row">
              <?php if (isset($incomexpensedetails)) { ?>

                <input type="hidden" name="id" id="id" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['id'] : '' ?>">
              <?php } ?>
              <div class="col-sm-6 col-md-3">
                <label class="form-label">Vechicle<span class="form-required"></span></label>
                <div class="form-group">
                  <select id="ie_v_id" class="form-control" name="vehicle">
                    <option value="">Select Vechicle</option>
                    
                    <?php foreach ($vehiclelist as $key => $vechiclelists) { ?>
                      <option <?php if ((isset($incomexpensedetails)) && $incomexpensedetails[0]['vehicle'] == $vechiclelists['v_registration_no']) {
                                echo 'selected';
                              } ?> value="<?php echo output($vechiclelists['v_registration_no']) ?>"><?php echo output($vechiclelists['v_name']) . ' - ' . output($vechiclelists['v_registration_no']); ?></option>
                    <?php  } ?>
                  </select>
                </div>
              </div>
         
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Name<span class="form-required"></span></label>
                  <input type="text" class="form-control" id="name" name="name" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['name'] : '' ?>" placeholder="Name">

                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Date</label>
                  <input type="date" class="form-control" id="date" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['date'] : '' ?>" name="date" placeholder="Description">
                </div>
              </div>

              
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Description<span class="form-required"></span></label>
                  <input type="text" class="form-control" id="description" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['description'] : '' ?>" name="description" placeholder="Description">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Amount<span class="form-required"></span></label>
                  <input type="text" class="form-control" id="amount" value="<?php echo (isset($incomexpensedetails)) ? $incomexpensedetails[0]['amount'] : '' ?>" name="amount" placeholder="Amount">
                </div>
              </div>



            </div>
            <input type="hidden" id="ie_created_date" name="created_at" value="<?php echo date('Y-m-d h:i:s'); ?>">

            <div class="modal-footer">

              <button type="submit" class="btn btn-primary"> <?php echo (isset($incomexpensedetails)) ? 'Update' : 'Add' ?></button>
            </div>
        </form>
      </div>
    </section>
    <!-- /.content -->