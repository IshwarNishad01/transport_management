<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo (isset($tripdetails)) ? 'Edit Booking' : 'Add Booking' ?>
            </h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Vehicle</a></li>
               <li class="breadcrumb-item active"><?php echo (isset($tripdetails)) ? 'Edit Booking' : 'Add Booking' ?></li>
            </ol>
         </div><!-- /.col -->
      </div><!-- /.row -->
   </div><!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <form method="post" id="myForm" class="card" action="<?= base_url('Trips/inserttrips') ?>">

         <!-- <form method="post" id="trip_add" class="card" action="<?= base_url('Trips/inserttrips') ?>"> -->

         <div class="card-body">
            <div class="row">
               <?php if (isset($tripdetails)) { ?>
                  <input type="hidden" name="t_id" id="t_id" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_id'] : '' ?>">
               <?php } ?>

               <div class="col-sm-6 col-md-3">
                  <label class="form-label">Customer Name<span class="form-required">*</span></label>
                  <div class="form-group">
                     <select id="t_customer_id" class="form-control selectized" required="true" name="t_customer_id">
                        <option value="">Select Customer</option>
                        <?php foreach ($customerlist as $key => $customerlists) { ?>
                           <option <?php if ((isset($tripdetails)) && $tripdetails[0]['t_customer_id'] == $customerlists['c_id']) {
                                       echo 'selected';
                                    } ?> value="<?php echo output($customerlists['c_id']) ?>"><?php echo output($customerlists['c_name']) ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Vechicle<span class="form-required">*</span></label>
                     <select id="t_vechicle" class="form-control" name="t_vechicle">
                        <option value="">Select Vechicle</option>
                        <?php foreach ($vechiclelist as $key => $vechiclelists) { ?>
                           <option <?php if ((isset($tripdetails)) && $tripdetails[0]['t_vechicle'] == $vechiclelists['v_name']) {
                                       echo 'selected';
                                    } ?> value="<?php echo output($vechiclelists['v_name']) ?>"><?php echo output($vechiclelists['v_name']) . ' - ' . output($vechiclelists['v_registration_no']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Driver<span class="form-required">*</span></label>
                     <select id="t_driver" class="form-control" name="t_driver">
                        <option value="">Select Driver</option>
                        <?php foreach ($driverlist as $key => $driverlists) { ?>
                           <option <?php if ((isset($tripdetails)) && $tripdetails[0]['t_driver'] == $driverlists['d_id']) {
                                       echo 'selected';
                                    } ?> value="<?php echo output($driverlists['d_id']) ?>"><?php echo output($driverlists['d_name']); ?></option>
                        <?php  } ?>
                     </select>
                  </div>
               </div>
               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Trip Type<span class="form-required">*</span></label>
                     <select id="t_type" class="form-control" name="t_type">
                        <option value="">Select Trip Type</option>
                        <option <?php if ((isset($tripdetails)) && $tripdetails[0]['t_type'] == 'singletrip') {
                                    echo 'selected';
                                 } ?> value="singletrip">Single Trip</option>
                        <option <?php if ((isset($tripdetails)) && $tripdetails[0]['t_type'] == 'roundtrip') {
                                    echo 'selected';
                                 } ?> value="roundtrip">Round Trip</option>
                     </select>
                  </div>
               </div>

               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Loading Form<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_trip_fromlocation'] : '' ?>" name="t_trip_fromlocation" id="t_trip_loading" class="form-control" placeholder="Trip Start Location">
                  </div>
               </div>

               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Destination<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_trip_tolocation'] : '' ?>" name="t_trip_tolocation" id="t_trip_location" class="form-control" placeholder="Trip End Location">
                  </div>
               </div>

               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Source<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_source'] : '' ?>" name="t_source" id="t_source" class="form-control" placeholder="Trip Source">
                  </div>
               </div>

               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Commodity<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_commodity'] : '' ?>" name="t_commodity" id="t_commodity" class="form-control" placeholder="Trip Commodity">
                  </div>
               </div>

               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Quantity<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_quantity'] : '' ?>" name="t_quantity" id="t_quantity" class="form-control" placeholder="Trip Quantity">
                  </div>
               </div>

               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Approx Total (KM)<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_totaldistance'] : '' ?>" name="t_totaldistance" id="t_totaldistance" class="form-control" placeholder="Approx Total KM">
                  </div>
               </div>

               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Trip Start Date<span class="form-required">*</span></label>
                     <input type="date" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_start_date'] : '' ?>" name="t_start_date" value="" class="form-control" placeholder="Trip Start Date">
                  </div>
               </div>

               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Trip End Date<span class="form-required">*</span></label>
                     <input type="date" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_end_date'] : '' ?>" name="t_end_date" value="" class="form-control" placeholder="Trip End Date">
                  </div>
               </div>

               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Item<span class="form-required">*</span></label>
                     <br>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="inlineitem" id="inlineCheckbox1" value="option1" onclick="limitCheckboxSelection(this)">
                        <label class="form-check-label" for="inlineCheckbox1">Coal</label>
                     </div>

                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="inlineitem" id="inlineCheckbox2" value="option2" onclick="limitCheckboxSelection(this)">
                        <label class="form-check-label" for="inlineCheckbox2">Fly Ash</label>
                     </div>

                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="inlineitem" id="inlineCheckbox3" value="option3" onclick="limitCheckboxSelection(this)">
                        <label class="form-check-label" for="inlineCheckbox3">Gitti</label>
                     </div>

                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="inlineitem" id="inlineCheckbox4" value="option4" onclick="limitCheckboxSelection(this)">
                        <label class="form-check-label" for="inlineCheckbox4">Sand</label>
                     </div>
                  </div>
               </div>

               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Weight (Tone)<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_trip_weight'] : '' ?>" name="t_trip_weight" class="form-control" placeholder="Enter Weight">
                  </div>
               </div>

               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Fuel Consumer Per Trip (litter)<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_trip_consumer'] : '' ?>" name="t_trip_consumer" class="form-control" placeholder="Fuel Consumer Per Trip">
                  </div>
               </div>

               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Meter Reading At Start Of The Date<span class="form-required">*</span></label>
                     <input type="date" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_trip_reading'] : '' ?>" name="t_trip_reading" class="form-control" placeholder="Enter Meter Reading">
                  </div>
               </div>

               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Rate Of Transportation<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_trip_transport'] : '' ?>" name="t_trip_transport" class="form-control" placeholder="Enter Rate Of Transportation">
                  </div>
               </div>

               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Total Amount<span class="form-required">*</span></label>
                     <input type="text" value="<?php echo (isset($tripdetails)) ? $tripdetails[0]['t_trip_amount'] : '' ?>" name="t_trip_amount" class="form-control" placeholder="Total Amount">
                  </div>
               </div>

               <div class="col-sm-6 col-md-3">
                  <div class="form-group">
                     <label class="form-label">Trip Status</label>
                     <select name="t_trip_status" id="t_trip_status" required="true" class="form-control">
                        <option value="">Trip Status</option>
                        <option <?php if ((isset($tripdetails)) && $tripdetails[0]['t_trip_status'] == 'yettostart') {
                                    echo 'selected';
                                 } ?> value="yettostart">Yet to start</option>
                        <option <?php if ((isset($tripdetails)) && $tripdetails[0]['t_trip_status'] == 'completed') {
                                    echo 'selected';
                                 } ?> value="completed">Completed</option>
                        <option <?php if ((isset($tripdetails)) && $tripdetails[0]['t_trip_status'] == 'ongoing') {
                                    echo 'selected';
                                 } ?> value="ongoing">OnGoing</option>
                        <option <?php if ((isset($tripdetails)) && $tripdetails[0]['t_trip_status'] == 'cancelled') {
                                    echo 'selected';
                                 } ?> value="cancelled">Cancelled</option>
                     </select>
                  </div>
               </div>

               <?php if (!isset($tripdetails)) {  ?>
                  <div class="col-sm-6 col-md-5">
                     <div class="form-group">
                        <label class="form-label">Email</label>
                        <div class="form-group mb-0">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" value="1" name="bookingemail" id="bookingemail" class="custom-control-input" id="bookingemail">
                              <label class="custom-control-label" for="bookingemail">Is need to sent Booking confirmation email to customer?</label>
                           </div>
                        </div>
                     </div>
                  </div>
               <?php } ?>

            </div>

            <!-- <button type="button" id="new">Add address</button> -->



            <!-- <div class="row tr_clone">
                  <div class="col-sm-6">
                  <div class="form-group">
                    <label>Add Multiple Pickup Locations</label>
                    <input type="text" name="t_trip_stops[]" id="t_trip_stops" class="form-control" placeholder="Enter Locations">
                  </div>
                  </div>
                  
                  <div class="col-sm-2 col-md-offset-2 ">
                  <div class="form-group adddelbtn"> 
                  <button type="button" name="add" class="btn btn-success btn-xs rm tr_clone_add"><span class="fa fa-plus"></span></button>
                </div>
                  </div>                        
                </div>   -->

            <input type="hidden" id="t_trip_fromlat" name="t_trip_fromlat" value="1">
            <input type="hidden" id="t_trip_fromlog" name="t_trip_fromlog" value="1">
            <input type="hidden" id="t_trip_tolat" name="t_trip_tolat" value="1">
            <input type="hidden" id="t_trip_tolog" name="t_trip_tolog" value="1">
            <input type="hidden" id="t_created_by" name="t_created_by" value="<?php echo output($this->session->userdata['session_data']['u_id']); ?>">
            <input type="hidden" id="t_created_date" name="t_created_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
            <div class="card-footer text-right">
               <button type="submit" class="btn btn-primary"> <?php echo (isset($tripdetails)) ? 'Update Trip' : 'Add Trip' ?></button>
            </div>
      </form>
   </div>
</section>
<!-- /.content -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
   function limitCheckboxSelection(checkbox) {
      // Uncheck all other checkboxes in the group
      const checkboxes = document.querySelectorAll('input[name="inlineCheckboxOptions"]');
      checkboxes.forEach(cb => {
         if (cb !== checkbox) {
            cb.checked = false;
         }
      });
   }

   $('#myForm').submit(function(e) {
      e.preventDefault(); // Prevent the default form submission

      const formData = $(this).serialize(); // Serialize the form data

      $.ajax({
         url: '<?= base_url('Trips/inserttrips') ?>', // Ensure the endpoint is correct
         type: 'POST',
         data: formData,
         success: function(response) {
            const jsonResponse = JSON.parse(response);
            if (jsonResponse.success) {
               alert(jsonResponse.message);
               window.location.href = '<?= base_url('trips') ?>'; // Redirect after success
            } else {
               alert(jsonResponse.message);
            }
         },
         error: function(xhr, status, error) {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
         }
      });
   });
</script>