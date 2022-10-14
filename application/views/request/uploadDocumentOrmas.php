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
            <?php endif ?>
				  </div>
				  <div class="card-body">
			<?= form_open_multipart(); ?>
        	<input type="hidden" name="type_file" value="<?= $type_file; ?>" readonly>
					  <div class="form-group row">
        <div class="col-sm-4"><b>UPLOAD FILE FORMAT PDF</b></div>
        <div class="col-sm-8">
          <div class="row">
            
            
              <div class="custom-file">
            <input type="file" class="custom-file-input" id="document_file" name="document_file">
            <label class="custom-file-label" for="document_file">Choose file</label>
            <?= form_error('document_file', '<small class="text-danger pl-3">', '</small>'); ?>
         
            </div>
          </div>
          </div>
        </div>

        <button type="submit" name="edit" class="btn btn-primary float-right">Upload</button>
        </form>
    </div>
				</div>
			</div>
		</div>
</div>

		</div>
	</div>

      <!-- End of Main Content -->

