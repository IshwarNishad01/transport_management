    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Income Expense Info
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Income Expense Info</li>
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
          <?php if(!empty($incomexpense)){ ?>
                    <table id="incomexpensetbl" class="table card-table">
                      <thead>
                        <tr>
                          <th class="w-1">S.No</th>
                          <th>Vechicle</th>
                          <th>Date</th>
                          <th>Description</th>
                          <th>Amount</th>
                          <th>Type</th>
                          <th>Payment Mode</th>
                          <?php if(userpermission('lr_ie_edit') || userpermission('lr_ie_del')) { ?>
                          <th>Action</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>

                      <?php $count=1;
                           foreach($incomexpense as $incomexpenses){
                           ?>
                        <tr>
                           <td> <?php echo output($count); $count++; ?></td>
                           <td> <?php echo output($incomexpenses['date']->v_name).'Others'.output($incomexpenses['vech_name']->v_registration_no); ?></td>
                           <!-- <td> </?php echo output(date(dateformat(), strtotime($incomexpenses['ie_date']))); ?></td> -->

                           <td><?php echo output($incomexpenses['ie_date']); ?></td>
                           <td><?php echo output($incomexpenses['ie_description']); ?></td>
                           <td><?php echo output($incomexpenses['ie_amount']); ?></td>
                           <td><span class="badge <?php echo ($incomexpenses['ie_type']=='income') ? 'badge-success' : 'badge-danger'; ?>"><?php echo ($incomexpenses['ie_type']=='income') ? 'Income' : 'Expense'; ?></span>  
                           <td><?php echo output($incomexpenses['ie_mode']); ?></td>
                           </td>
                            <td>
                            <?php if(userpermission('lr_ie_edit')) { ?>
                            <a class="icon" href="<?php echo base_url(); ?>incomexpense/editincomexpense/<?php echo output($incomexpenses['ie_id']); ?>">
                              <i class="fa fa-edit"></i>
                            </a>
                            <?php } if(userpermission('lr_ie_del')) { ?> |
                              <a data-toggle="modal" href="" onclick="confirmation('<?php echo base_url(); ?>incomexpense/deleteincomexpense','<?= output($incomexpenses['ie_id']); ?>')" data-target="#deleteconfirm" class="icon text-danger" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>
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
                     echo '<div class="alert alert-warning">No income or expense found !.</div><div style="padding-bottom:240px"></div>';
                     }
                     ?>
        </div>         
        </div>
        <!-- /.card-body -->
      </div>
      
             </div>
    </section>
    <!-- /.content -->



