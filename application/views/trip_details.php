<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Truck Trip Details
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Truck Trip Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    <div class="card">

        <div class="card-body p-0">
          

         <div class="table-responsive">
         
          <?php if(!empty($tripdetails)){ ?>
                    <table id="incomexpensetbl" class="table card-table">
                      <thead>
                        <tr>
                          <th class="w-1">S.No</th>
                          <!-- <th>Seriol No</th> -->
                          <th>Customer Name</th>
                          <th>Date</th>
                          <th>Vehicle No</th>
                          <th>Source</th>
                          <th>Destination</th>
                          <?php if(userpermission('lr_ie_edit') || userpermission('lr_ie_del')) { ?>
                          <th>Action</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>

                      <?php $count=1;
                           foreach($tripdetails as $tripData){
                           ?>
                        <tr>
                           <!-- <td> <?php echo output($count); $count++; ?></td> -->

                           <td><?php echo output($tripData['serial_no']); ?></td>
                           <td><?php echo output($tripData['customer_name']); ?></td>
                           <td><?php echo output($tripData['date']); ?></td>
                           <td><?php echo output($tripData['vehicle_no']); ?></td>
                           <td><?php echo output($tripData['source']); ?></td>
                          
                           <td><?php echo output($tripData['destination']); ?></td>
                      
                            <td>

                            <a class="icon" href="<?php echo base_url(); ?>Tripdetails/viewRecord/<?php echo output($tripData['id']); ?>">
                              <i class="fa fa-eye"></i>
                            </a>

                            <?php if(userpermission('lr_ie_edit')) { ?>
                            <a class="icon" href="<?php echo base_url(); ?>Tripdetails/edittrip/<?php echo output($tripData['id']); ?>">
                              <i class="fa fa-edit"></i>
                            </a>
                            <?php } if(userpermission('lr_ie_del')) { ?> |
                              <a data-toggle="modal" href="" onclick="confirmation('<?php echo base_url(); ?>Tripdetails/deletetrip','<?= output($tripData['id']); ?>')" data-target="#deleteconfirm" class="icon text-danger" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>
                            </a> 
                            <?php } ?>
                          </td>
                        </tr>
                        <?php } ?>
                  
                      </tbody>
                    </table>
                    <?php 
                     }  
                     else
                     {
                     echo '<div class="alert alert-warning">No Record found !.</div><div style="padding-bottom:240px"></div>';
                     }
                     ?>
        </div>         
        </div>
        <!-- /.card-body -->
      </div>
      
             </div>
    </section>
    <!-- /.content -->



