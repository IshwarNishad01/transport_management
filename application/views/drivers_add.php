<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($driverdetails)) ? 'Edit driver' : 'Add driver' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Vehicle</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($driverdetails)) ? 'Edit driver' : 'Add driver' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          
        <form method="post" id="add_driver" class="card" enctype="multipart/form-data"
          action="<?php echo base_url(); ?>drivers/<?php echo (isset($driverdetails)) ? 'updatedriver' : 'insertdriver'; ?>">

          <div class="card-body">
            <div class="row">
              <?php if (isset($driverdetails)) { ?>
                <input type="hidden" name="d_id" id="d_id" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_id'] : '' ?>">
              <?php } ?>

              <div class="col-sm-6 col-md-3">
                <label class="form-label">Driver Name<span class="form-required">*</span></label>
                <div class="form-group">
                  <input type="text" name="d_name" id="d_name" class="form-control" placeholder="Driver Name" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_name'] : '' ?>">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Mobile<span class="form-required">*</span></label>
                  <input type="text" name="d_mobile" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_mobile'] : '' ?>" class="form-control" placeholder="Mobile">
                </div>
              </div>
              
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Adhar Number<span class="form-required">*</span></label>
                  <input type="text" name="d_adhar_number" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_adhar_number'] : '' ?>" class="form-control" placeholder="Adhar Number">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Alternate Contact<span class="form-required">*</span></label>
                  <input type="text" name="d_contact" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_contact'] : '' ?>" class="form-control" placeholder="contact">
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Age<span class="form-required">*</span></label>
                  <input type="text" name="d_age" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_age'] : '' ?>" class="form-control" placeholder="Age">
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">License No<span class="form-required">*</span></label>
                  <input type="text" name="d_licenseno" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_licenseno'] : '' ?>" class="form-control" placeholder="License No">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">License Expiry Date<span class="form-required">*</span></label>
                  <input type="date" name="d_license_expdate" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_license_expdate'] : '' ?>" class="form-control" placeholder="License Expiry Date">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Total Experiance<span class="form-required">*</span></label>
                  <input type="text" name="d_total_exp" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_total_exp'] : '' ?>" class="form-control" placeholder="Total Experiance">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Date of Joining<span class="form-required">*</span></label>
                  <input type="date" name="d_doj" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_doj'] : '' ?>" class="form-control" placeholder="Date of Joining">
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Reference/Notes</label>
                  <input type="text" name="d_ref" value="<?php echo (isset($driverdetails)) ? $driverdetails[0]['d_ref'] : '' ?>" class="form-control" placeholder="Reference or Notes">
                </div>
              </div>

              <div class="col-sm-6 col-md-6">
                <div class="form-group">
                  <label class="form-label">Address<span class="form-required">*</span></label>
                  <textarea class="form-control" autocomplete="off" placeholder="Address" name="d_address"><?php echo (isset($driverdetails)) ? $driverdetails[0]['d_address'] : '' ?></textarea>

                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label for="d_is_active" class="form-label">Driver Status</label>
                  <select id="d_is_active" name="d_is_active" class="form-control " required="">
                    <option value="">Select Driver Status</option>
                    <option <?php echo (isset($driverdetails) && $driverdetails[0]['d_is_active'] == 1) ? 'selected' : '' ?> value="1">Active</option>
                    <option <?php echo (isset($driverdetails) && $driverdetails[0]['d_is_active'] == 0) ? 'selected' : '' ?> value="0">Inactive</option>
                  </select>
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Driver Photo</label>
                  <input type="file" id="file" name="file" class="form-control" />
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Driver Document</label>
                  <input type="file" id="file1" name="file1" class="form-control" />
                </div>
              </div>
            </div>

          </div>
          <input type="hidden" id="d_created_by" name="d_created_by" value="<?php echo output($this->session->userdata['session_data']['u_id']); ?>">
          <input type="hidden" id="d_created_date" name="d_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
          <!-- <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary"> <?php echo (isset($driverdetails)) ? 'Update Driver' : 'Add Driver' ?></button>
          </div> -->
          <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">
              <?php echo (isset($driverdetails)) ? 'Update Driver' : 'Add Driver'; ?>
            </button>
          </div>

        </form>
      </div>
    </section>
    <!-- /.content -->