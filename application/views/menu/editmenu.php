<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   <div class="container">
	
	<div class="row mt-3">
		<div class="col-md-12">
	
			<div class="card">
				  <div class="card-header">
				    Form Edit Menu
				  </div>
				  <div class="card-body">
				  		<?php if( validation_errors()) : ?>
				  			<div class="alert alert-danger" role="alert">
				  				<?= validation_errors(); ?>
				  			</div>
				  		<?php endif; ?>
			<form action="" method="post">
        	<input type="hidden" name="id" id="id" value="<?= $user_menu['id']; ?>">
			<div class="form-group">
			    <label for="menu">Menu Name</label>
			    <input type="text" class="form-control" id="menu" name="menu" value="<?= $user_menu['menu']; ?>">
			</div>
        <button type="submit" name="edit" class="btn btn-primary float-right">Edit Menu</button>
        </form>
    </div>
				</div>
			</div>
		</div>
</div>
		</div>
	</div>

      <!-- End of Main Content -->

