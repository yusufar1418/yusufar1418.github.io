<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   	<div class="row">
		<div class="col-lg-6">
			<?= $this->session->flashdata('message'); ?>

			<h5>Role: <?= $role['role']  ?></h5>
			<table align="center" id="table" class="table table-stripped table-bordered table-hover" bgcolor="white" >
				<thead class="table-primary">
				<tr>
					<th>No</th>
					<th>Role</th>
					<th>Access</th>
				</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($menu as $m ) :?>
				<tr>
					<th scope="row"><?= $i; ?></th>
					<td><?= $m['menu']; ?></td>
					<td align="center">
						<div class="form-check">
					  	<input type="checkbox" class="form-check-input" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
						</div>
					</td>
				</tr>
				<?php $i++; ?>
			<?php endforeach; ?>
				</tbody>
			</table>
       </div>
       </div>
     </div>


</div>
