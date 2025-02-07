<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Employee Advance
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Employee Advance</li>
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
              <table id="fueltbl" class="table card-table">
                <thead>
                  <tr>
                    <th class="w-1">S.No</th>
                    <th>Vehicle</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <?php if (userpermission('lr_fuel_edit') || userpermission('lr_fuel_del')) { ?>
                      <th>Action</th>
                    <?php } ?>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($employeeRecords)) {
                    $count = 1;
                    foreach ($employeeRecords as $record) {
                  ?>
                      <tr>
                        <td> <?php echo output($count);
                              $count++; ?></td>
                        <!-- <td> </?php echo output(date(dateformat(), strtotime($fuels['v_fuelfilldate']))); ?></td> -->
                        <td> <?php echo output($record['vehicle']); ?></td>
                        <td> <?php echo output($record['name']); ?></td>
                        <td> <?php echo output($record['date']); ?></td>
                        <td><?php echo output($record['description']); ?></td>
                        <td><?php echo output($record['amount']); ?></td>
                        <?php if (userpermission('lr_fuel_edit')) { ?>
                          <td>
                            <a class="icon" href="<?php echo base_url(); ?>Employee/editRecord/<?php echo output($record['id']); ?>">
                              <i class="fa fa-edit"></i>
                            </a>
                          <?php  }
                        if (userpermission('lr_booking_del')) { ?> |
                            <a data-toggle="modal" href="" onclick="confirmation('<?php echo base_url(); ?>Employee/delete','<?= output($record['id']); ?>')" data-target="#deleteconfirm" class="icon text-danger" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></a>
                            </a>
                          <?php } ?>
                          </td>
                        <?php } ?>
                      </tr>
                    <?php } ?>
                </tbody>
              </table>

            </div>
          </div>
          <!-- /.card-body -->
        </div>

      </div>
    </section>
    <!-- /.content -->