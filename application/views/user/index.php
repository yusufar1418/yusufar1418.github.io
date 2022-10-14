    
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">My Profile</h1>
          <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
              <?= validation_errors(); ?>
            </div>
          <?php endif; ?>

          <?= $this->session->flashdata('message'); ?>
          <div class="card mb-3" style="max-width: 1080px;">
            <div class="row no-gutters">
              <div class="col-md-3">
                <img src="<?= base_url('assets/img/user/') . $user['image']; ?>" class="card-img" height="260">
              </div>
              <div class="col-md">
                <div class="card-body">
                  <h2 class="card-title"><?= $user['username']; ?></h2>
                  <hr>
                  <table class="h5">
                    <tr class="card-text">
                      <td width="100">Email</td>
                      <td width="20">:</td>
                      <td width="50"><?= $user['email']; ?></td>
                    </tr>
                    <tr class="card-text">
                      <td>Role</td>
                      <td>:</td>
                      <td><?= $user['role']; ?></td>
                    </tr>
                    <tr class="card-text">
                      <td>Active</td>
                      <td>:</td>
                      <?php if ($user['is_active'] == 1) : ?>
                        <td>Enable</td>
                      <?php else : ?>
                        <td>Disable</td>
                      <?php endif; ?>
                    </tr>
                  </table>
                  <hr>
                  <h5 class="card-text"><small class="text-muted">User since <?= date('d-m-Y', $user['date_created']) ?></small></h5>
                </div>
              </div>
            </div>
          </div>
          <!-- <table align="center" id="table" class="table table-stripped table-bordered table-hover" bgcolor="white">
            <thead class="table-primary">
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Stock</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($use as $us) : ?>
                <?php if ($us['status_hardware'] == "No Active") : ?>
                  <tr class="table-danger">
                  <?php elseif ($us['status_hardware'] == "Maintenance") : ?>
                  <tr class="table-warning">
                  <?php elseif ($us['status_hardware'] == "Repair") : ?>
                  <tr class="table-success">
                  <?php endif; ?>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $us['name']; ?></td>
                  <td><?= $us['brand']; ?></td>
                  <td><?= $us['amount']; ?></td>
                  <td><?= $us['status_hardware']; ?></td>
                  <?php if ($us['status_hardware'] == "No Active") : ?>
                    <td>Complaint Added</td>
                  <?php elseif ($us['status_hardware'] == "Repair") : ?>
                    <td><?= $us['complaint']; ?></td>
                  <?php else : ?>
                    <td><a href="<?= base_url('user/complaint/') . $us['iduse']; ?>" class="badge badge-primary float-right ml-1">Complaint</a></td>
                  <?php endif; ?>
                  </tr>
                  <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
          </table> -->


        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->