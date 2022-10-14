<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   <div class="container">
	
	<div class="row mt-3">
		<div class="col-md-12">
	
			<div class="card">
				  <div class="card-header">
				    Form Edit Submenu
				  </div>
				  <div class="card-body">
				  		<?php if( validation_errors()) : ?>
				  			<div class="alert alert-danger" role="alert">
				  				<?= validation_errors(); ?>
				  			</div>
				  		<?php endif; ?>
			<form action="" method="post">
        	<input type="hidden" name="id" id="id" value="<?= $user_sub_menu['id']; ?>">
			<form action="<?= base_url('menu/submenu'); ?>" method="post">
        	<div class="form-group">
			    <label for="title">Title Name</label>
			    <input type="text" class="form-control title" id="title" name="title" value="<?= $user_sub_menu['title']; ?>">
			</div>
			<div class="form-group">
			    <label for="menu">Select Menu</label>
			    <select class="form-control" id="menu_id" name="menu_id">
				<?php foreach ($menu as $m): ?>
					<?php if($m['id'] == $user_sub_menu['menu_id']) :?>
						<option value="<?= $m['id'] ?>" selected><?= $m['menu'] ?></option>
					<?php else : ?>
					<option value="<?= $m['id'] ?>" ><?= $m['menu'] ?></option>
					<?php endif; ?>
				<?php endforeach; ?>
				</select>
      </div>
			<div class="form-group">
			    <label for="url">URL</label>
			    <input type="text" class="form-control menu" id="url" name="url" value="<?= $user_sub_menu['url']; ?>">
			</div>
			<div class="form-group">
			    <label for="icon">Icon</label>
			    <input type="text" class="form-control menu" id="icon" name="icon" value="<?= $user_sub_menu['icon']; ?>">
			</div>
			<div class="form-group">
				<div class="custom-control custom-checkbox">
			  <?php if($user_sub_menu['is_active'] == 1) : ?>
			  <input type="checkbox" class="custom-control-input" id="is_active" value="1" name="is_active" checked>
			  <?php else : ?>
			  <input type="checkbox" class="custom-control-input" id="is_active" value="1" name="is_active" >
			<?php endif; ?>
			  <label class="custom-control-label" for="is_active">Active?</label>
				</div>
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

