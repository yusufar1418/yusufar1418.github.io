<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   	<div class="row">
		<div class="col-lg-6">
			<?= form_error('menu', '<div class="alert alert-danger">', '</div>' ); ?>
			<?= $this->session->flashdata('message'); ?>
			<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#formModal">
			Add New Role </a>
			<a href="<?= base_url('admin/deleteButton'); ?>" class="btn btn-primary mb-3">
			Delete Button </a>
			<table align="center" id="table" class="table table-stripped table-bordered table-hover" bgcolor="white" >
				<thead class="table-primary">
				<tr>
					<th>No</th>
					<th>Role</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($role as $r ) :?>
				<tr>
					<th scope="row"><?= $i; ?></th>
					<td><?= $r['role']; ?></td>
					<td>
					<a href="<?= base_url('admin/roleDelete/') .$r['id']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Are you sure?');">Delete</a>
					<a href="<?= base_url('admin/roleEdit/') .$r['id']; ?>" class="badge badge-success float-right ml-1">Edit</a>
					<a href="<?= base_url('admin/roleAccess/') .$r['id'];?>" class="badge badge-warning float-right ml-1">Access</a>
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
        <h5 class="modal-title" id="formModelLabel">Add New Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/role'); ?>" method="post">
        	<div class="form-group">
			    <label for="role">Role Name</label>
			    <input type="text" class="form-control role" id="role" name="role" alue="<?= set_value('role'); ?>">
			    <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>
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

