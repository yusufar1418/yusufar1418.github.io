        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->


<table>
  <tr>
  <td width="400"> <h1 class="h3 mb-4 text-gray-800">ORMAS DETAIL</h1> </td>
  <td width="585"></td>
  </tr>
</table>
  
  <?= $this->session->flashdata('message'); ?>

  <div class="card" style="max-width: 1080px;">  
    
      <div class="card-body">
      
    <table class="table table-stripped table-hover">
        <tr>
          <th width="250">NAMA</th>
          <td width="30">:</td>
          <td><?= $ormasbyid['ormas_name']; ?></td>
        </tr>
        <tr>
          <th width="250">ALAMAT</th>
          <td width="30">:</td>
          <td><?= $ormasbyid['ormas_address']; ?></td>
        </tr>
        <tr>
          <th width="250">KONTAK</th>
          <td width="30">:</td>
          <td><?= $ormasbyid['ormas_contact']; ?></td>
        </tr>
        <tr>
          <th width="250">DATE</th>
          <td width="30">:</td>
          <td><?= date('d-M-Y H:i',$ormasbyid['date_created_ormas']); ?></td>   
        </tr>
        </table>
        <br>
        
        <table align="center" id="table" class="table table-stripped table-bordered table-hover" bgcolor="white" >
          <thead class="table-primary">
        <tr>
          <th width="20">No</th>
          <th width="800">Upload Dokumen</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>1</td>
          <td>Surat Pengesahan Dari Badan Hukum</td>
          <?php if (!empty($ormasbyid['ormas_document1'])): ?>
          <td>Sudah Upload Dokumen</td>
            <?php else: ?>
          <td>Belum Upload Dokumen</td>
          <?php endif; ?>
          <td>
            <?php if (!empty($ormasbyid['ormas_document1'])): ?>
            <a href="<?= base_url('request/ormasDocumentDownload/') .$ormasbyid['idormas']. '/1';?>" class="badge badge-primary float-right ml-1">Download</a>
            <a href="<?= base_url('request/editOrmasDocument/') .$ormasbyid['idormas']. '/1';?>" class="badge badge-success float-right ml-1">Edit</a>
            <?php else: ?>
            <a href="<?= base_url('request/ormasDocument/') .$ormasbyid['idormas']. '/1';?>" class="badge badge-primary float-right ml-1">Upload</a>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>Surat Keputusan Kepengurusan</td>
          <?php if (!empty($ormasbyid['ormas_document2'])): ?>
          <td>Sudah Upload Dokumen</td>
            <?php else: ?>
          <td>Belum Upload Dokumen</td>
          <?php endif ?>
          <td>
            <?php if (!empty($ormasbyid['ormas_document2'])): ?>
            <a href="<?= base_url('request/ormasDocumentDownload/') .$ormasbyid['idormas']. '/2';?>" class="badge badge-primary float-right ml-1">Download</a>
            <a href="<?= base_url('request/editOrmasDocument/') .$ormasbyid['idormas']. '/2';?>" class="badge badge-success float-right ml-1">Edit</a>
            <?php else: ?>
            <a href="<?= base_url('request/ormasDocument/') .$ormasbyid['idormas']. '/2';?>" class="badge badge-primary float-right ml-1">Upload</a>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <td>3</td>
          <td colspan="3">
            <a href="<?= base_url('request/addOrmas') ?>" class="btn btn-primary mb-3">Add KTP</a>
            <table align="center" id="table" class="table table-stripped table-bordered table-hover" bgcolor="white">
            <thead class="table-primary">
            <tr>
              <th width="20">No</th>
              <th width="600">Nama</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              <td></td>
              <td></td>
              <td></td>
            </tbody>
          </table>
          </td>
          
          
        </tr>
        <tr>
          <td>4</td>
          <td>Formulir (Klik Download Formulir)</td>
          <?php if (!empty($ormasbyid['ormas_document3'])): ?>
          <td>Sudah Upload Dokumen</td>
            <?php else: ?>
          <td>Belum Upload Dokumen</td>
          <?php endif ?>
          <td>
            <?php if (!empty($ormasbyid['ormas_document3'])): ?>
            <a href="<?= base_url('request/ormasDocumentDownload/') .$ormasbyid['idormas']. '/3';?>" class="badge badge-primary float-right ml-1">Download</a>
            <a href="<?= base_url('request/editOrmasDocument/') .$ormasbyid['idormas']. '/3';?>" class="badge badge-success float-right ml-1">Edit</a>
            <?php else: ?>
            <a href="<?= base_url('request/ormasDocument/') .$ormasbyid['idormas']. '/3';?>" class="badge badge-primary float-right ml-1">Upload</a>
            <a href="<?= base_url('request/ormasFormulirDownload/3');?>" class="badge badge-warning float-right ml-1">Download</a>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <td>5</td>
          <td>Dokumen kepengurusan yang disetujui</td>
          <?php if (!empty($ormasbyid['ormas_document4'])): ?>
          <td>Sudah Upload Dokumen</td>
            <?php else: ?>
          <td>Belum Upload Dokumen</td>
          <?php endif ?>
          <td>
            <?php if (!empty($ormasbyid['ormas_document4'])): ?>
            <a href="<?= base_url('request/ormasDocumentDownload/') .$ormasbyid['idormas']. '/4';?>" class="badge badge-primary float-right ml-1">Download</a>
            <a href="<?= base_url('request/editOrmasDocument/') .$ormasbyid['idormas']. '/4';?>" class="badge badge-success float-right ml-1">Edit</a>
            <?php else: ?>
            <a href="<?= base_url('request/ormasDocument/') .$ormasbyid['idormas']. '/4';?>" class="badge badge-primary float-right ml-1">Upload</a>
             <a href="<?= base_url('request/ormasFormulirDownload/3');?>" class="badge badge-warning float-right ml-1">Download</a>
            <?php endif; ?>
          </td>
        </tr>
        </tbody>
        </table>
    <br>
        <a href="<?= base_url('request/requestSend/') .$ormasbyid['idregistrasi_ormas'] ?>" class="btn btn-success mb-3 float-right ml-1 button-send">
      SEND</a>

        </div>
        </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
