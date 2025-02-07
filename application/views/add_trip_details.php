<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($tripDetails)) ? 'Edit Truck Trip' : 'Add Truck Trip ' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($tripDetails)) ? 'Edit Truck Trip' : 'Add Truck Trip' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form method="post" id="Income_Expense" class="card" action="<?php echo base_url(); ?>Tripdetails/<?php echo (isset($tripDetails)) ? 'updatetrip' : 'inserttrucktrip'; ?>">
          <div class="card-body">


            <div class="row">
              <?php if (isset($tripDetails)) { ?>

                <input type="hidden" name="id" id="is_date" value="<?php echo (isset($tripDetails)) ? $tripDetails[0]['id'] : '' ?>">
              <?php } ?>
          
              <div class="col-sm-6 col-md-3 d-md-none">
                <div class="form-group">
                  <label class="form-label">Serial No</label>
                  <input type="text" class="form-control" id="serial_no" name="serial_no" value="<?php echo (isset($tripDetails)) ? $tripDetails[0]['serial_no'] : '' ?>" placeholder="Serial No">

                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Customer Name</label>

                  <select id="customer_name" class="form-control" name="customer_name">
                    <option value="">Select Customer</option>
                    <?php foreach ($customerlist as $key => $vehicle) { ?>
                      <option <?php if ((isset($tripDetails)) && $tripDetails[0]['customer_name'] == $vehicle['c_name']) {
                                echo 'selected';
                              } ?> value="<?php echo output($vehicle['c_name']) ?>"><?php echo output($vehicle['c_name']) ; ?></option>
                    <?php  } ?>
                  </select>

                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Date</label>
                  <input type="date" class="form-control" id="date" value="<?php echo (isset($tripDetails)) ? $tripDetails[0]['date'] : '' ?>" name="date" placeholder="">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Vehicle No</label>
                  <select id="vehicle_no" class="form-control" name="vehicle_no">
                    <option value="">Select Vechicle</option>
                    <?php foreach ($vehiclelist as $key => $vehicle) { ?>
                      <option <?php if ((isset($tripDetails)) && $tripDetails[0]['vehicle_no'] == $vehicle['v_registration_no']  ) {
                                echo 'selected';
                              } ?> value="<?php echo output($vehicle['v_registration_no']) ?>"><?php echo output($vehicle['v_name']) . ' - ' . output($vehicle['v_registration_no']); ?></option>
                    <?php  } ?>
                  </select>
                </div>
              </div>

         

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Source</label>
                  <input type="text" class="form-control" id="source" value="<?php echo (isset($tripDetails)) ? $tripDetails[0]['source'] : '' ?>" name="source" placeholder="Source">
                </div>
              </div>

              
              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Destination</label>
                  <input type="text" class="form-control" id="	destination" value="<?php echo (isset($tripDetails)) ? $tripDetails[0]['	destination'] : '' ?>" name="destination" placeholder="Destination">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Weight source </label>
                  <input type="text" class="form-control" id="weight_source" value="<?php echo (isset($tripDetails)) ? $tripDetails[0]['weight_source'] : '' ?>" name="weight_source" placeholder="Weight source ">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Weight Destination </label>
                  <input type="text" oninput="calculateTotalAmount()" class="form-control" id="weight_destination" value="<?php echo (isset($tripDetails)) ? $tripDetails[0]['weight_destination'] : '' ?>" name="weight_destination" placeholder="Weight Destination ">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Shortage </label>
                  <input type="text" class="form-control" id="expense" value="<?php echo (isset($tripDetails)) ? $tripDetails[0]['shortage'] : '' ?>" name="shortage" placeholder="Shortage">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Meter source</label>
                  <input type="text" class="form-control" id="expense" value="<?php echo (isset($tripDetails)) ? $tripDetails[0]['meter_source'] : '' ?>" name="meter_source" placeholder="Meter source ">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Meter destination </label>
                  <input type="text" class="form-control" id="expense" value="<?php echo (isset($tripDetails)) ? $tripDetails[0]['meter_destination'] : '' ?>" name="meter_destination" placeholder="Meter destination ">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Diesel</label>
                  <input type="text" class="form-control" id="expense" value="<?php echo (isset($tripDetails)) ? $tripDetails[0]['diesal'] : '' ?>" name="diesal" placeholder="Diesel">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Daily amount </label>
                  <input type="text" class="form-control" id="expense" value="<?php echo (isset($tripDetails)) ? $tripDetails[0]['daily_amount'] : '' ?>" name="daily_amount" placeholder="Daily amount ">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Rate</label>
                  <input type="text" oninput="calculateTotalAmount()" class="form-control" id="rate" value="<?php echo (isset($tripDetails)) ? $tripDetails[0]['rate'] : '' ?>" name="rate" placeholder="rate">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Total Amount</label>
                  <input type="text" class="form-control" id="total_amount" value="<?php echo (isset($tripDetails)) ? $tripDetails[0]['total_amount'] : '' ?>" name="total_amount" placeholder="total_amount">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Challan no</label>
                  <input type="text" class="form-control" id="challan_no" value="<?php echo (isset($tripDetails)) ? $tripDetails[0]['challan_no'] : '' ?>" name="challan_no" placeholder="Challan no">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Invoice no</label>
                  <input type="text" class="form-control" id="expense" value="<?php echo (isset($tripDetails)) ? $tripDetails[0]['invoice_no'] : '' ?>" name="invoice_no" placeholder="Invoice no">
                </div>
              </div>

              <div class="col-sm-6 col-md-3">
                <div class="form-group">
                  <label class="form-label">Tp no</label>
                  <input type="text" class="form-control" id="tp_no" value="<?php echo (isset($tripDetails)) ? $tripDetails[0]['tp_no'] : '' ?>" name="tp_no" placeholder="TP no">
                </div>
              </div>

              

            </div>
            <input type="hidden" id="created_at" name="created_at" value="<?php echo date('Y-m-d h:i:s'); ?>">

            <div class="modal-footer">

              <button type="submit" class="btn btn-primary"> <?php echo (isset($tripDetails)) ? 'Update' : 'Submit' ?></button>
            </div>
        </form>
      </div>
    </section>
    <!-- /.content -->

    <script>

const rate = document.getElementById('rate');
const weight_destination = document.getElementById('weight_destination');
const total_amount = document.getElementById('total_amount');

function calculateTotalAmount(){
console.log(rate.value * weight_destination.value)
total_amount.value = rate.value * weight_destination.value;
}

    </script>