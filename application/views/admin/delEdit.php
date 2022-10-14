<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   <div class="container">
	
	<div class="row mt-3">
		<div class="col-md-12">
	
			<div class="card">
				  <div class="card-header">
				    Form Delete Button
				  </div>
				  <div class="card-body">
			<form action="" method="post">
        	<input type="hidden" name="id" id="id" value="<?= $del['idsetting']; ?>">
			<div class="form-group">
          <select class="form-control js-example-basic-single" id="del" name="del">
           <option value="<?= $del['delete_button']; ?>" selected><?= $del['delete_button']; ?></option>
            <option value="Active" <?= set_select('del','Active') ?>>Active</option>
            <option value="No Active" <?= set_select('del','No Active') ?>>No Active</option>
            </select>
            <?= form_error('del', '<small class="text-danger pl-3">', '</small>'); ?>
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

