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
				    Form Edit Holy Book
				  </div>
				  <div class="card-body">
			<?= form_open_multipart(); ?>
        	<input type="hidden" name="id" id="id" value="<?= $holybookbyid['idholy_book']; ?>">
        	<input type="hidden" name="holy_book_image" id="holy_book_image" value="<?= $holybookbyid['holy_book_image']; ?>">
        	<input type="hidden" name="holy_book_link" id="holy_book_link" value="<?= $holybookbyid['holy_book_link']; ?>">

        	<div class="form-group row">
			    <label for="holy_book_title" class="col-sm-2 col-form-label"><b>Title</b></label>
				    <div class="col-sm-10">
				    <input type="text" class="form-control title" id="holy_book_title" name="holy_book_title" value="<?= $holybookbyid['holy_book_title']; ?>">
				    <?= form_error('holy_book_title', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
			    <label for="holy_book_description" class="col-sm-2 col-form-label"><b>Description</b></label>
				    <div class="col-sm-10">
				    	<textarea class="form-control" id="exampleFormControlTextarea1" name="holy_book_description" rows="3"><?= $holybookbyid['holy_book_description']; ?>
          		</textarea>
				    <?= form_error('holy_book_description', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
		        <div class="col-sm-2"><b>HOLY BOOK FILE</b></div>
		        <div class="col-sm-10">
		          <div class="row">
		            <div class="col-sm-2">
		              <?= $holybookbyid['holy_book_link']; ?>
		            </div>
		            <div class="col-sm-10">
		              <div class="custom-file">
				            <input type="file" class="custom-file-input" id="book_file" name="book_file">
				            <label class="custom-file-label" for="book_file">Choose File</label>
		          		</div>
		            </div>
		          </div>
		        </div>
	        </div>

	        <div class="form-group row">
				    <div class="col-sm-2"><b>Picture</b></div>
				    <div class="col-sm-10">
				    	<div class="row">
				    		<div class="col-sm-3">
				    			<img src="<?= base_url('assets/img/holybook/') . $holybookbyid['holy_book_image'] ?>" class="img-thumbnail">
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
      
		
        <button type="submit" name="edit" class="btn btn-primary float-right">Edit Book</button>
        </form>
    </div>
				</div>
			</div>
		</div>
</div>

		</div>
	</div>

      <!-- End of Main Content -->

