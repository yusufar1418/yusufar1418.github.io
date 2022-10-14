<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   	<div class="row">
		<div class="col-lg">
			<!-- error validation -->
			<?php if(validation_errors()) : ?>
			<div class="alert alert-danger" role="alert">
			<?= validation_errors(); ?>
			</div>
		<?php endif; ?>
			
			<?= $this->session->flashdata('message'); ?>
			
			<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#formModal">
			Add New Submenu </a>
			<table align="center" id="table" class="table table-stripped table-bordered table-hover" bgcolor="white" >
				<thead class="table-primary">
				<tr>
					<th>No</th>
					<th>Title</th>
					<th>Menu</th>
					<th>Url</th>
					<th>Icon</th>
					<th>Active</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($submenu as $sm ) :?>
				<tr>
					<th scope="row"><?= $i; ?></th>
					<td><?= $sm['title']; ?></td>
					<td><?= $sm['menu']; ?></td>
					<td><?= $sm['url']; ?></td>
					<td><?= $sm['icon']; ?></td>
					<td><?= $sm['is_active']; ?></td>
					<td>
					<a href="<?= base_url(); ?>menu/editSubmenu/<?= $sm['id']; ?>" class="badge badge-success float-right ml-1">edit</a>
					<a href="<?= base_url('menu/deleteSubmenu/'); ?><?= $sm['id']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Are you sure?');">Delete</a>
					</td>
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModelLabel">Add New Submenu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('menu/submenu'); ?>" method="post">
        	<div class="form-group">
			    <label for="title">Title Name</label>
			    <input type="text" class="form-control title" id="title" name="title" placeholder="Submenu title">
			</div>
			<div class="form-group">
				<label for="title">Select Menu</label>
                <select class="form-control" id="menu_id" name="menu_id">
                <option value="" selected>Select Menu</option>
                <?php foreach ($menu as $m): ?>
                  <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                <?php endforeach; ?>
                </select>
            </div>
			<div class="form-group">
			    <label for="url">URL</label>
			    <input type="text" class="form-control menu" id="url" name="url" placeholder="Submenu URL">
			</div>
			<div class="form-group">
			    <label for="icon">Icon</label>
			    <input type="text" class="form-control menu" id="icon" name="icon" placeholder="Submenu icon">
			</div>
			<div class="form-group">
				<div class="custom-control custom-checkbox">
			  <input type="checkbox" class="custom-control-input" id="is_active" value="1" name="is_active" checked>
			  <label class="custom-control-label" for="is_active">Active?</label>
				</div>
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
      <!-- End of Main Content -->

