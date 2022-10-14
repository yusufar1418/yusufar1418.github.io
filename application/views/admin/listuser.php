<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   	<div class="row">
		<div class="col-lg">
			<?php if( validation_errors()) : ?>
	  			<div class="alert alert-danger" role="alert">
	  				<?= validation_errors(); ?>
	  			</div>
	  		<?php endif; ?>
			<?= $this->session->flashdata('message'); ?>

	<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#formModal">
	Tambah User </a>

<table align="center" id="table" class="table table-stripped table-bordered table-hover" bgcolor="white" >
				<thead class="table-primary">
				<tr>
					<th width="20">No</th>
					<th width="200">User</th>
          <?php if ($role_id != 3): ?>
					   <th>Role Access</th>
          <?php endif; ?>
					<th>Provinsi</th>
					<th>Kabupaten</th>
					<th>Action</th>
					<th width="0" hidden="on">Date</th>
				</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($userlist as $ul ) :?>
				<tr>
					<th scope="row"><?= $i; ?></th>
					<td><?= $ul['username']; ?></td>
          <?php if ($role_id != 3): ?>
					   <td><?= $ul['role']; ?></td> 
          <?php endif; ?>
					<td><?= $ul['nama_provinsi']; ?></td>
					<td><?= $ul['nama_kabupaten']; ?></td>
					<td>
					<a href="<?= base_url('admin/userDetail/') .$ul['iduser'];?>" class="badge badge-primary float-right ml-1">Detail</a>
          <?php if ($role_id != 3): ?>
					   <a href="<?= base_url('admin/userEdit/') .$ul['iduser']; ?>" class="badge badge-success float-right ml-1">Edit</a>
          <?php endif; ?>
					<a href="<?= base_url('admin/resetPassword/') .$ul['iduser']; ?>" class="badge badge-warning float-right ml-1" onclick="return confirm('Are you sure?');">Reset Password</a>
					</td>
					<td hidden="on"><?= date('d-m-Y', $ul['date_created']); ?></td>
				</tr>
				<?php $i++; ?>
			<?php endforeach; ?>
				</tbody>
			</table>


       </div>
       </div>
   </div>
<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModelLabel">Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open_multipart('admin/userlist'); ?>
        	<div class="form-group">
                  <input type="text" class="form-control form-control-user" name="name" id="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
                  <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="email" id="email" placeholder="Email" value="<?= set_value('email'); ?>">
                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
              <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="col-sm-6">
                <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
              </div>
              </div>
              <div class="form-group">
                <select class="form-control" id="role" name="role">
                <option value="" selected>Pilih Role</option>
                <?php foreach ($role as $r): ?>
                 <option value="<?= $r['id'] ?>"><?= $r['role'] ?></option>
                <?php endforeach; ?>
                </select>
                <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              
              <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="position" id="position" placeholder="Jabatan" value="<?= set_value('position'); ?>">
                  <?= form_error('position', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                  <input type="number" class="form-control form-control-user" name="telephone" id="telephone" placeholder="Nomor Telephone" value="<?= set_value('telephone'); ?>">
                  <?= form_error('telephone', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <select name="prov" class="form-control" id="provinsi">
                <option value="" selected>Pilih Provinsi</option>
                <?php foreach ($provinsi as $prov): ?>
                 <option value="<?= $prov['id'] ?>"><?= $prov['nama_provinsi'] ?></option>
                <?php endforeach; ?>
                </select>
                <?= form_error('prov', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                <select name="kab" class="form-control" id="kabupaten">
                <option value="" selected>Pilih Kabupaten</option>
                
                </select>
                <?= form_error('kab', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                  <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Address" name="address" rows="3"><?= set_value('address'); ?>
                </textarea>
                  <?= form_error('Address', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
              
                		
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>

</div>
</div>
      <!-- End of Main Content