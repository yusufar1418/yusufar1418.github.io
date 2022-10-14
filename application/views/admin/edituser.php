<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<?= $this->session->flashdata('message'); ?>
   <div class="container">
	
	<div class="row mt-3">
		<div class="col-md-12">
	
			<div class="card">
				  <div class="card-header">
				    Form Edit User
				  </div>
				  <div class="card-body">
			<?= form_open_multipart(); ?>
        	<input type="hidden" name="id" id="id" value="<?= $userbyid['iduser']; ?>">
        	<div class="form-group row">
			    <label for="email" class="col-sm-2 col-form-label">Email</label>
			    <div class="col-sm-10">
			    <input type="text" class="form-control title" id="email" name="email" value="<?= $userbyid['email']; ?>" readonly>
			    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
			</div>
        	<div class="form-group row">
			    <label for="name" class="col-sm-2 col-form-label">Full Name</label>
			    <div class="col-sm-10">
			    <input type="text" class="form-control title" id="name" name="name" value="<?= $userbyid['username']; ?>">
			    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
			</div>
			<div class="form-group row">
			    <label for="role" class="col-sm-2 col-form-label">Select Role</label>
			    <div class="col-sm-10">
			    <select class="form-control" id="role" name="role">
				<?php foreach ($role as $r): ?>
					<?php if($r['id'] == $userbyid['role_id']) :?>
					<option value="<?= $r['id'] ?>" selected><?= $r['role'] ?></option>
					<?php else : ?>
					<option value="<?= $r['id'] ?>" ><?= $r['role'] ?></option>
					<?php endif; ?>
				<?php endforeach; ?>
				</select>
				<?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
			</div>
		<div class="form-group row">
			<label for="prov" class="col-sm-2 col-form-label">Provinsi </label>
			    <div class="col-sm-10">
        <select name="prov" class="form-control" id="provinsi">
        <?php foreach ($provinsi as $prov): ?>
        <?php if($prov['id'] == $userbyid['id_provinsi']) :?>
					<option value="<?= $prov['id'] ?>" selected><?= $prov['nama_provinsi'] ?></option>
					<?php else : ?>
					<option value="<?= $prov['id'] ?>"><?= $prov['nama_provinsi'] ?></option>
					<?php endif; ?> 
        <?php endforeach; ?>
        </select>
        <?= form_error('prov', '<small class="text-danger pl-3">', '</small>'); ?>
      	</div>
      </div>
      <div class="form-group row">
				<label for="prov" class="col-sm-2 col-form-label">Kabupaten </label>
			  <div class="col-sm-10">
        <select name="kab" class="form-control" id="kabupaten">
        <option value="<?= $userbyid['id_kabupaten'] ?>" selected><?= $userbyid['nama_kabupaten']; ?></option>
        </select>
        <?= form_error('kab', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
     </div>
     <div class="form-group row">
			    <label for="position" class="col-sm-2 col-form-label">Jabatan</label>
			    <div class="col-sm-10">
			    <input type="text" class="form-control title" id="position" name="position" value="<?= $userbyid['position']; ?>">
			    <?= form_error('position', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
			</div>
			<div class="form-group row">
			    <label for="telephone" class="col-sm-2 col-form-label">Telephone</label>
			    <div class="col-sm-10">
			    <input type="text" class="form-control title" id="telephone" name="telephone" value="<?= $userbyid['telephone']; ?>">
			    <?= form_error('telephone', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
			</div>
			<div class="form-group row">
			    <label for="address" class="col-sm-2 col-form-label">Address</label>
			    <div class="col-sm-10">
			    	<textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Address" name="address" rows="3"><?= $userbyid['address']; ?>
            </textarea>
			    <?= form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
			</div>
		
        <button type="submit" name="edit" class="btn btn-primary float-right">Edit User</button>
        </form>
    </div>
				</div>
			</div>
		</div>
</div>

		</div>
	</div>

      <!-- End of Main Content -->

