<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   <div class="container">
	
	<div class="row mt-3">
		<div class="col-md-12">
	
			<div class="card">
				  <div class="card-header">
				    Form Edit Role
				  </div>
				  <div class="card-body">
			<form action="" method="post">
        	<input type="hidden" name="id" id="id" value="<?= $role['id']; ?>">
			<div class="form-group row">
			    <label for="role" class="col-sm-2 col-form-label">Role Name</label>
			    <div class="col-sm-10">
			    <input type="text" class="form-control" id="role" name="role" value="<?= $role['role']; ?>">
			    <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
			</div>
        <button type="submit" name="edit" class="btn btn-primary float-right">Edit</button>
        
        </form>
    </div>
				</div>
			</div>
		</div>
</div>
		</div>
	</div>

      <!-- End of Main Content -->

