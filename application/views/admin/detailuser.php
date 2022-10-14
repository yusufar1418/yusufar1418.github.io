        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->


<table>
  <tr>
  <td width="400"> <h1 class="h3 mb-4 text-gray-800">USER DETAIL</h1> </td>
  <td width="585"></td>
  </tr>
</table>
  

  <div class="card" style="max-width: 1080px;">  
    
      <div class="card-body">
      
    <table class="table table-stripped table-hover">
        <tr>
          <th width="250">USERNAME</th>
          <td width="30">:</td>
          <td><?= $userbyid['username']; ?></td>
        </tr>
        
        <tr>
          <th width="250">EMAIL</th>
          <td width="30">:</td>
          <td><?= $userbyid['email']; ?></td>
        </tr>
        <tr>
          <th width="250">ROLE</th>
          <td width="30">:</td>
          <td><?= $userbyid['role']; ?></td>   
        </tr>
        <tr>
          <th width="250">PROVINSI</th>
          <td width="30">:</td>
          <td><?= $userbyid['nama_provinsi']; ?></td>   
        </tr>
        <tr>
          <th width="250">KABUPATEN</th>
          <td width="30">:</td>
          <td><?= $userbyid['nama_kabupaten']; ?></td>   
        </tr>
        <tr>
          <th width="250">JABATAN</th>
          <td width="30">:</td>
          <td><?= $userbyid['position']; ?></td>   
        </tr>
        <tr>
          <th width="250">TELEPHONE</th>
          <td width="30">:</td>
          <td><?= $userbyid['telephone']; ?></td>   
        </tr>
        <tr>
          <th width="250">ADDRESS</th>
          <td width="30">:</td>
          <td><?= $userbyid['address']; ?></td>   
        </tr>

        </table>
        
       
       
   
    </div>
    </div>
    <br>
      
  


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
