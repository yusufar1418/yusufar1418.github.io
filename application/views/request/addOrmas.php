<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   <div class="container">
	
	<div class="row mt-3">
		<div class="col-md-12">

			<div class="card">
				  <div class="card-header">
				  TAMBAH ORMAS
				  </div>
				  <div class="card-body">
			<?= form_open_multipart(''); ?>
        	<input type="hidden" name="iduser" id="iduser" value="<?= $user['iduser']; ?>">
          <input type="hidden" name="id_kabupaten" id="id_kabupaten" value="<?= $user['id_kabupaten']; ?>">
          <input type="hidden" name="id_provinsi" id="id_provinsi" value="<?= $user['id_provinsi']; ?>">
         
        	
        <table class="table table-stripped table-hover">
        <tr>
        <th width="180">NAMA ORMAS</th>
          <td>:</td>
          <td><input type="text" class="form-control form-control-user" name="ormas_name" id="ormas_name" placeholder="Nama ormas" value="<?= set_value('ormas_name'); ?>">
                  <?= form_error('ormas_name', '<small class="text-danger pl-3">', '</small>'); ?>
              </td>
        </tr>
        <tr>
        <th>ALAMAT ORMAS</th>
          <td>:</td>
          <td><textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Address" name="ormas_address" rows="3"><?= set_value('ormas_address'); ?>
          </textarea>
          <?= form_error('ormas_address', '<small class="text-danger pl-3">', '</small>'); ?>
          </td>
        </tr>
        <tr>
        <th>KABUPATEN</th>
          <td>:</td>
          <td><input type="text" class="form-control form-control-user" name="ormas_kabupaten" id="ormas_kabupaten" placeholder="Kontak" value="<?= $user['nama_kabupaten']; ?>" readonly>
                  <?= form_error('ormas_kabupaten', '<small class="text-danger pl-3">', '</small>'); ?>
              </td>
        </tr>
        <tr>
        <th>PROVINSI</th>
          <td>:</td>
          <td><input type="text" class="form-control form-control-user" name="ormas_provinsi" id="ormas_provinsi" placeholder="Kontak" value="<?= $user['nama_provinsi']; ?>" readonly>
                  <?= form_error('ormas_provinsi', '<small class="text-danger pl-3">', '</small>'); ?>
              </td>
        </tr>
        <th>KONTAK</th>
          <td>:</td>
          <td><input type="text" class="form-control form-control-user" name="ormas_contact" id="ormas_contact" placeholder="Kontak" value="<?= set_value('ormas_contact'); ?>">
                  <?= form_error('ormas_contact', '<small class="text-danger pl-3">', '</small>'); ?>
              </td>
        </tr>
        <th>LATITUDE</th>
          <td>:</td>
          <td><input type="text" class="form-control form-control-user" name="ormas_latitude" id="ormas_latitude" placeholder="Latitude" value="<?= set_value('ormas_latitude'); ?>">
                  <?= form_error('ormas_latitude', '<small class="text-danger pl-3">', '</small>'); ?>
              </td>
        </tr>
        <th>LONGITUDE</th>
          <td>:</td>
          <td><input type="text" class="form-control form-control-user" name="ormas_longitude" id="ormas_longitude" placeholder="Longitude" value="<?= set_value('ormas_longitude'); ?>">
                  <?= form_error('ormas_longitude', '<small class="text-danger pl-3">', '</small>'); ?>
              </td>
        </tr>
        
                  
        </table>
      </div>
    </div>
    <br>
			
        <button type="submit" name="add" class="btn btn-primary float-right">Tambah</button>
        </form>
    </div>
				</div>
			</div>
      </div>
      </div>


      <!-- End of Main Content -->

