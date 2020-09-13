  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of users waiting approval</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($users as $user){?>
                  <tr>
                    <td><?=$user->firstName.' '.$user->lastName?></td>
                    <td><?=$user->email?></td>
                    <td><?=$user->createdDate?></td>
                    <td>
                      <a href="<?=base_url('users/approve/'.$user->userId)?>" class="btn btn-success">Approve</a>
                      <a href="<?=base_url('users/decline/'.$user->userId)?>" class="btn btn-danger">Decline</a>
                    </td>
                  </tr>
                    <?php }?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
</div>
  <!-- /.content-wrapper -->