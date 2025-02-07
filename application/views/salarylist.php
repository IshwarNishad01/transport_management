<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Salary Info
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Salary</li>
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
                          <th>Date</th>
                          <th>Name</th>
                          <th>Expense</th>
                          <th>Month</th>
                          <th>Salary</th>
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

                           <td><?php echo output($incomexpenses['date']); ?></td>
                           <td><?php echo output($incomexpenses['name']); ?></td>
                           <td><?php echo output($incomexpenses['expense']); ?></td>
                           <td><?php echo output($incomexpenses['month']); ?></td>
                          
                           <td><?php echo output($incomexpenses['salary']); ?></td>
                           <td><?php echo output($incomexpenses['mode']); ?></td>
                           </td>
                            <td>
                            <?php if(userpermission('lr_ie_edit')) { ?>
                            <a class="icon" href="<?php echo base_url(); ?>salary/editsalary/<?php echo output($incomexpenses['id']); ?>">
                              <i class="fa fa-edit"></i>
                            </a>
                            <?php } if(userpermission('lr_ie_del')) { ?> |
                              <a data-toggle="modal" href="" onclick="confirmation('<?php echo base_url(); ?>salary/deletesalary','<?= output($incomexpenses['id']); ?>')" data-target="#deleteconfirm" class="icon text-danger" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>
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
                     echo '<div class="alert alert-warning">No Salary found !.</div><div style="padding-bottom:240px"></div>';
                     }
                     ?>
        </div>         
        </div>
        <!-- /.card-body -->
      </div>
      
             </div>
    </section>
    <!-- /.content -->



