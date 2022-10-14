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
	Add News</a>

<table align="center" id="table" class="table table-stripped table-bordered table-hover" bgcolor="white" >
				<thead class="table-primary">
				<tr>
					<th width="20">No</th>
					<th width="200">Title</th>
					<th>Description</th>
					<th>Image</th>
					<th width="130">Action</th>
				</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($newslist as $nl ) :?>
				<tr>
					<th scope="row"><?= $i; ?></th>
					<td><?= $nl['news_title']; ?></td>
					<td><?= $nl['news_description']; ?></td>
					<td width="150"> <img src="<?= base_url('assets/img/news/') . $nl['news_image']; ?>" class="card-img" height="150" width="150"></td>
					<td>
					<a href="<?= base_url('information/newsDelete/') .$nl['idnews'];?>" class="badge badge-danger float-right ml-1 button-delete">Delete</a>
					<a href="<?= base_url('information/newsEdit/') .$nl['idnews']; ?>" class="badge badge-success float-right ml-1">Edit</a>
          <a href="<?= $nl['news_link']; ?>" class="badge badge-info float-right ml-1" target="_blank">Link</a>
					
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
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModelLabel">Add News</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open_multipart('information/newslist'); ?>
        	 <div class="form-group">
              <input type="text" class="form-control form-control-user" name="news_title" id="news_title" placeholder="Title" value="<?= set_value('news_title'); ?>">
              <?= form_error('news_title', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-user" name="news_link" id="news_link" placeholder="Link" value="<?= set_value('news_link'); ?>">
              <?= form_error('news_link', '<small class="text-danger pl-3">', '</small>'); ?>
            </div> 
            <div class="form-group">
                  <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="News description" name="news_description" rows="3"><?= set_value('news_description'); ?>
                </textarea>
                  <?= form_error('news_description', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group row">
              <div class="col-sm-2"><b>PICTURE</b></div>
              <div class="col-sm-10">
                <div class="row">
                  <div class="col-sm-3">
                    <img src="<?= base_url('assets/img/news/default.png') ?>" class="img-thumbnail">
                  </div>
                  <div class="col-sm-9">
              <div class="custom-file">
            <input type="file" class="custom-file-input" id="image" name="image">
            <label class="custom-file-label" for="image">Choose file</label>
            <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
            </div>
          </div>
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