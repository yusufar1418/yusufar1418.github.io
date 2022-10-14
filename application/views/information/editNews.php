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
				    Form Edit News
				  </div>
				  <div class="card-body">
			<?= form_open_multipart(); ?>
        	<input type="hidden" name="id" id="id" value="<?= $newsbyid['idnews']; ?>">
        	<input type="hidden" name="news_image" id="news_image" value="<?= $newsbyid['news_image']; ?>">

        	<div class="form-group row">
			    <label for="news_title" class="col-sm-2 col-form-label"><b>Title</b></label>
				    <div class="col-sm-10">
				    <input type="text" class="form-control title" id="news_title" name="news_title" value="<?= $newsbyid['news_title']; ?>">
				    <?= form_error('news_title', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
			    <label for="news_link" class="col-sm-2 col-form-label"><b>Link</b></label>
				    <div class="col-sm-10">
				    <input type="text" class="form-control title" id="news_link" name="news_link" value="<?= $newsbyid['news_link']; ?>">
				    <?= form_error('news_link', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
			    <label for="news_description" class="col-sm-2 col-form-label"><b>Description</b></label>
				    <div class="col-sm-10">
				    	<textarea class="form-control" id="exampleFormControlTextarea1" name="news_description" rows="3"><?= $newsbyid['news_description']; ?>
          		</textarea>
				    <?= form_error('news_description', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
	        <div class="form-group row">
				    <div class="col-sm-2"><b>Picture</b></div>
				    <div class="col-sm-10">
				    	<div class="row">
				    		<div class="col-sm-3">
				    			<img src="<?= base_url('assets/img/news/') . $newsbyid['news_image'] ?>" class="img-thumbnail">
				    		</div>
				    		<div class="col-sm-9">
				    			<div class="custom-file">
									  <input type="file" class="custom-file-input" id="image" name="image">
									  <label class="custom-file-label" for="image">Choose file</label>
									</div>
				    		</div>
				    	</div>
				    </div>
		  		</div>
      
		
        <button type="submit" name="edit" class="btn btn-primary float-right">Edit news</button>
        </form>
    </div>
				</div>
			</div>
		</div>
</div>

		</div>
	</div>

      <!-- End of Main Content -->

