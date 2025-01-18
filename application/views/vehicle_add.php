    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($vehicledetails)) ? 'Edit Vehicle' : 'Add Vehicle' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Vehicle</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($vehicledetails)) ? 'Edit vehicle' : 'Add Vehicle' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form method="post" id="vehicle_add" class="card" action="<?php echo base_url('Vehicle/insertvehicle'); ?>" enctype="multipart/form-data">
          <div class="card-body">

            <!-- </?php if ($this->session->flashdata('message')): ?>
              <div class="alert alert-success">
                </?php echo $this->session->flashdata('message'); ?>
              </div>
            </?php endif; ?> -->

            <?php if ($this->session->flashdata('message')): ?>
              <div class="alert alert-success">
                <?= $this->session->flashdata('message'); ?>
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              </div>
              <?php $this->session->unset_userdata('message'); // Unset the flashdata 
              ?>
            <?php endif; ?>


            <div class="row">
              <?php if (isset($vehicledetails)) { ?>
                <input type="hidden" name="v_id" id="v_id" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_id'] : '' ?>">
              <?php } ?>
              <div class="col-sm-6 col-md-3">
                <label class="form-label">Registration Number</label>
                <div class="form-group">
                  <input type="text" name="v_registration_no" id="v_registration_no" class="form-control" placeholder="Registration Number" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_registration_no'] : '' ?>">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <label class="form-label">Vehicle Name</label>
                <div class="form-group">
                  <input type="text" name="v_name" id="v_name" class="form-control" placeholder="Vehicle Name" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_name'] : '' ?>">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <label class="form-label">Insurance Expiry Date</label>
                <div class="form-group">
                  <input type="date" name="v_insurance_date" id="v_insurance_date" class="form-control" placeholder="Insurance Expiry Date" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_insurance_date'] : '' ?>">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <label class="form-label">Fitness Renewal Date</label>
                <div class="form-group">
                  <input type="date" name="v_fitness_date" id="v_fitness_date" class="form-control" placeholder="Fitness Renewal Date" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_fitness_date'] : '' ?>">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <label class="form-label">Installments Due Date</label>
                <div class="form-group">
                  <input type="date" name="v_installments_due_date" id="v_installments_due_date " class="form-control" placeholder="Installments Due Date" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_installments_due_date'] : '' ?>">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <label class="form-label">Total Installments Pending</label>
                <div class="form-group">
                  <input type="text" name="v_installments_pending_date" id="v_installments_pending_date" class="form-control" placeholder="Total Installments Pending" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_installments_pending_date'] : '' ?>">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <label class="form-label">Installment Amount</label>
                <div class="form-group">
                  <input type="text" name="v_installments_amount" id="v_installments_amount" class="form-control" placeholder="Installment Amount" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_installments_amount'] : '' ?>">
                </div>
              </div>

              <!-- <div class="col-sm-6 col-md-3">
                <label class="form-label">Total Installments Pending</label>
                <div class="form-group">
                  <input type="text" name="v_installments_pending_date" id="v_installments_pending_date" class="form-control" placeholder="Total Installments Pending">
                </div>
              </div> -->

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Model</label>
                  <input type="text" name="v_model" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_model'] : '' ?>" class="form-control" placeholder="Model">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Chassis No</label>
                  <input type="text" name="v_chassis_no" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_chassis_no'] : '' ?>" class="form-control" placeholder="Chassis No">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Engine No</label>
                  <input type="text" name="v_engine_no" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_engine_no'] : '' ?>" class="form-control" placeholder="Engine No">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Manufactured By</label>
                  <input type="text" name="v_manufactured_by" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_manufactured_by'] : '' ?>" class="form-control" placeholder="Manufactured By">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Vehicle Type</label>
                  <select id="v_type" name="v_type" class="form-control">
                    <option value="">Select Vehicle Type</option>
                    <option <?php echo (isset($vehicledetails) && $vehicledetails[0]['v_type'] == 'CAR') ? 'selected' : '' ?> value="CAR">CAR</option>
                    <option <?php echo (isset($vehicledetails) && $vehicledetails[0]['v_type'] == 'MOTORCYCLE') ? 'selected' : '' ?> value="MOTORCYCLE">MOTORCYCLE</option>
                    <option <?php echo (isset($vehicledetails) && $vehicledetails[0]['v_type'] == 'TRUCK') ? 'selected' : '' ?> value="TRUCK">TRUCK</option>
                    <option <?php echo (isset($vehicledetails) && $vehicledetails[0]['v_type'] == 'BUS') ? 'selected' : '' ?> value="BUS">BUS</option>
                    <option <?php echo (isset($vehicledetails) && $vehicledetails[0]['v_type'] == 'TAXI') ? 'selected' : '' ?> value="TAXI">TAXI</option>
                    <option <?php echo (isset($vehicledetails) && $vehicledetails[0]['v_type'] == 'BICYCLE') ? 'selected' : '' ?> value="BICYCLE">BICYCLE</option>
                  </select>

                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label for="v_color" class="form-label">Vehicle Color<small> (To show in Map)</small></label>
                  <input id="add-device-color" name="v_color" class="jscolor {valueElement:'add-device-color', styleElement:'add-device-color', hash:true, mode:'HSV'} form-control" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_color'] : '#D6E1F3' ?>">
                </div>
              </div>

              <!-- </?php if (isset($vehicledetails[0]['v_is_active'])) { ?> -->
                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                    <label for="v_is_active" class="form-label">Vehicle Status</label>
                    <select id="v_is_active" name="v_is_active" class="form-control">
                      <option value="">Select Vehicle Status</option>
                      <option <?php echo (isset($vehicledetails) && $vehicledetails[0]['v_is_active'] == 1) ? 'selected' : '' ?> value="1">Active</option>
                      <option <?php echo (isset($vehicledetails) && $vehicledetails[0]['v_is_active'] == 0) ? 'selected' : '' ?> value="0">Inactive</option>
                    </select>
                  </div>
                </div>
              <!-- </?php } ?> -->

              <!-- <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label class="form-label">Registration Expiry Date</label>
                        <input type="text" name="v_reg_exp_date" value="<?php echo (isset($vehicledetails)) ? date(dateformat(), strtotime($vehicledetails[0]['v_reg_exp_date'])) : '' ?>" class="form-control datepicker" placeholder="Registration Expiry Date">
                      </div>
                  </div> -->

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Registration Expiry Date</label>
                  <input type="date" name="v_reg_exp_date" class="form-control" placeholder="Registration Expiry Date" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_reg_exp_date'] : '' ?>">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label for="v_group" class="form-label">Vehicle Group</label>
                  <!-- <input type="text" id="v_group" name="v_group" value="" class="form-control" placeholder="Enter Vehicle Group"> -->

                  <select id="v_group" name="v_group" class="form-control">
                    <option value="">Select Vehicle Group</option>
                    <?php if (!empty($v_group)) {
                      foreach ($v_group as $v_groupdata) { ?>
                        <option <?= (isset($vehicledetails[0]['v_group']) && $vehicledetails[0]['v_group'] == $v_groupdata['gr_id']) ? 'selected' : '' ?> value="<?= $v_groupdata['gr_id'] ?>"><?= $v_groupdata['gr_name'] ?></option>
                    <?php }
                    } ?>
                  </select>
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Vehicle Image</label>
                  <input type="file" id="file" name="file" class="form-control" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['file'] : '' ?>" />
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Vehicle Document</label>
                  <input type="file" id="file1" name="file1" class="form-control"value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['file1'] : '' ?>" />
                </div>
              </div>
              <!-- </?php $settings = sitedata();
              if (isset($settings['s_traccar_enabled']) && $settings['s_traccar_enabled'] == 1) { ?>

                <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                    <label class="form-label">Traccar Device ID <span title="3 New Messages" class="badge ">(Data sycn based on this value)</span></label>
                    <select id="v_traccar_id" name="v_traccar_id" class="form-control">
                      <option value="">Select Traccar Device ID</option>
                      </?php if (!empty($traccar_list)) {
                        foreach ($traccar_list as $traccar) { ?>
                          <option </?= (isset($vehicledetails[0]['v_traccar_id']) && $vehicledetails[0]['v_traccar_id'] == $traccar['id']) ? 'selected' : '' ?> value="<?= $traccar['id'] ?>"><?= $traccar['name'] ?></option>
                      </?php }
                      } ?>
                    </select>
                  </div>
                </div>





              </?php } ?> -->

            </div>




            <!-- <hr> -->
            <!-- <div class="form-label"><b>GPS API Details(Feed GPS Data)</b></div>
            <div class="row">
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">API URL</label>
                  <input type="text" name="v_api_url" class="form-control" placeholder="API URL" value="<?php echo base_url(); ?>api" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">API Username</label>
                  <input type="text" id="v_api_username" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_api_username'] : '' ?>" name="v_api_username" class="form-control" placeholder="API Username" readonly>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">API Password</label>
                  <input type="text" name="v_api_password" class="form-control" placeholder="API Password" value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_api_password'] : random_string('nozero', 6) ?>" readonly>
                </div>
              </div>
            </div> -->
          </div>
          <input type="hidden" id="v_created_by" name="v_created_by" value="<?php echo output($this->session->userdata['session_data']['u_id']); ?>">
          <input type="hidden" id="v_mileageperlitre" name="v_mileageperlitre" value="0">

          <input type="hidden" id="v_created_date" name="v_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
          <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary"> <?php echo (isset($vehicledetails)) ? 'Update Vehicle' : 'Add Vehicle' ?></button>
          </div>
        </form>
      </div>
    </section>
    <!-- /.content -->

    <script>
      $(function() {
        $(".datepicker").datepicker({
          dateFormat: "yy-mm-dd", // Format for the date
          changeMonth: true,
          changeYear: true,
          yearRange: "1900:2100" // Adjust range as needed
        });
      });
    </script>

    <script>
      $(document).ready(function() {
        $('#vehicle_add').on('submit', function(e) {
          // Prevent form submission if validation fails
          let isValid = true;
          const regNo = $('#v_registration_no').val();
          const name = $('#v_name').val();

          if (!regNo) {
            alert('Registration Number is required.');
            isValid = false;
          }

          if (!name) {
            alert('Vehicle Name is required.');
            isValid = false;
          }

          if (!isValid) {
            e.preventDefault(); // Stop form submission
          }
        });
      });
    </script>