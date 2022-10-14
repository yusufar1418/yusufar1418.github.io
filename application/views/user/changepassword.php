<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

				  <?= $this->session->flashdata('message'); ?>
			<div class="card">
				  <div class="card-header">
				    Form Change Password
				  </div>
				  <div class="card-body">
		  	
			<form action="<?= base_url('user/changePassword'); ?>" method="post">
        	<div class="form-group row">
		    <label for="password" class="col-sm-2 col-form-label">Current Password</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" id="password" placeholder="Current Password" name="password">
		      <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
		    </div>
		    </div>
		    <div class="form-group row">
		    <label for="new_password1" class="col-sm-2 col-form-label">New Password</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" id="new_password1" placeholder="New Password" name="new_password1">
		     <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
		    </div>
		    </div>
		    <div class="form-group row">
		    <label for="new_password2" class="col-sm-2 col-form-label">Repeat Password</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" id="new_password2" placeholder="Repeat Password" name="new_password2">
		      <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
		    </div>
		    </div>
		  	<div class="form-group row justify-content-end">
		  		<div class="col-sm-2">
		  			<button type="submit" class="btn btn-primary">Change Password</button>
		  		</div>
		  	</div>
        </form>

   			</div>
</div>

</div>

</div>

      <!-- End of Main Content -->

