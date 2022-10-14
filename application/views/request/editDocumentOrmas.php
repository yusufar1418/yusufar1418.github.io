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
				    <?php if ($type_file == 1): ?>
				    UPLOAD DOKUMEN SURAT PENGESAHAN DARI BADAN HUKUM
            <?php elseif($type_file == 2): ?>
            UPLOAD DOKUMEN SURAT KEPUTUSAN KEPENGURUSAN
          <?php elseif($type_file == 3): ?>
            UPLOAD DOKUMEN FORMULIR
          <?php elseif($type_file == 4): ?>
            UPLOAD DOKUMEN KEPNGURUSAN YANG DISETUJUI
            <?php endif; ?>
				  </div>
				  <div class="card-body">
			<?= form_open_multipart(); ?>
        	<input type="hidden" name="type_file" value="<?= $type_file; ?>" readonly>

					<?php if ($type_file == 1): ?>
        		<input type="hidden" name="document_link" value="<?= $ormasbyid['ormas_document1']; ?>">
        	<?php elseif($type_file == 2): ?>
        		<input type="hidden" name="document_link" value="<?= $ormasbyid['ormas_document2']; ?>">
        	<?php elseif($type_file == 3): ?>
        		<input type="hidden" name="document_link" value="<?= $ormasbyid['ormas_document3']; ?>">
        	<?php elseif($type_file == 4): ?>
        		<input type="hidden" name="document_link" value="<?= $ormasbyid['ormas_document4']; ?>">
        	<?php endif; ?>

					<div class="form-group row">
		        <div class="col-sm-3"><b>UPLOAD FILE FORMAT PDF</b></div>
		        <div class="col-sm-9">
		          <div class="row">
		            <div class="col-sm-2">
		            	<?php if ($type_file == 1): ?>
		              	<?= $ormasbyid['ormas_document1']; ?>
		            	<?php elseif($type_file == 2): ?>	
		              	<?= $ormasbyid['ormas_document2']; ?>
		            	<?php elseif($type_file == 3): ?>	
		              	<?= $ormasbyid['ormas_document3']; ?>
		            	<?php elseif($type_file == 4): ?>	
		              	<?= $ormasbyid['ormas_document4']; ?>
		            	<?php endif; ?>
		            </div>
		            <div class="col-sm-10">
		              <div class="custom-file">
				            <input type="file" class="custom-file-input" id="document_file" name="document_file">
				            <label class="custom-file-label" for="document_file">Choose File</label>
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

