 <?php 
  function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
  return $hasil_rupiah;
 
} 
  ?>
    <!-- Page Wrapper -->
  <div id="wrapper">
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->

<br>
<br>
  <h1 class="h3 mb-4" align="middle">Laporan Data <?= $title; ?></h1>
  
  <div class="row" align="middle">
    <div class="col-lg">
      
  <table align="center" id="table" class="table table-stripped table-bordered table-hover text-nowrap" bgcolor="white" >
        <thead class="table-primary">         
          <tr>
          <th>No</th>
          <th>Name</th>
          <th>Position</th>
          <th>Status</th>
          <th>NPWP</th>
          <th>Hire Date</th>
          <th>Salary</th>
          <th>Delegation</th>
          <th>Job Allowance</th>
          <th>Certificate Allowance</th>
          <th>BPJS</th>
          <th>Recived</th>
          <th>No Rekening</th>
          <th>Rekening Acount</th>
          <!-- <th width="400">Action</th> -->
          <th width="0" hidden="on">Date</th>
        </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php $recivedtotal = 0; ?>
          <?php foreach ($userlist as $ul ) :?>

          <?php 

        $date_entry = $ul['date_entry'];
        $date_mutation = $ul['date_mutation2'];
        $id_position = $ul['id_position'];
        $id_position2 = $ul['id_position2'];
        $salary = $ul['salary'];
        $job_allowance = $ul['job_allowance'];
        $certificate_allowance = $ul['certificates_allowance'];
        $salary2 = $ul['salary2'];
        $job_allowance2 = $ul['job_allowance2'];
        $certificate_allowance2 = $ul['certificates_allowance2'];
    $date_first = strtotime(date('Y-m-00'));
    $date_last = strtotime(date('Y-m-t'));
    $date_20 = strtotime(date('Y-m-20',$date_entry));
    $date_21 = strtotime(date('Y-m-20'));
    $date_1 = strtotime(date('Y-m-00',$date_entry));
    $date_t = strtotime(date('Y-m-t',$date_entry));
    $date_1m = strtotime(date('Y-m-00',$date_mutation));
    $date_tm = strtotime(date('Y-m-t',$date_mutation));
    $date_now = time();

    $join_total = round((($date_now - $date_entry) / (60*60*24))+1);
    $join_total_entry = round(($date_t - $date_entry) / (60*60*24)+1);
    $date_total_entry = round(($date_t - $date_1) / (60*60*24));
    $date_total = round(($date_last - $date_first) / (60*60*24));
    $date_bmutation = round((($date_mutation - $date_1m) / (60*60*24))-1);
    $date_amutation = round((($date_tm - $date_mutation) / (60*60*24))+1);
    $date_total_mutation = round(($date_tm - $date_1m) / (60*60*24));
    

    if (($id_position !== $id_position2) AND ($date_now <= $date_tm)) {
      $delegasi1 = ($date_bmutation / $date_total_mutation)*$salary2;
      $job1 = ($date_bmutation / $date_total_mutation)*$job_allowance2;
      $certificate1 = ($date_bmutation / $date_total_mutation)*$certificate_allowance2;

      $delegasi2 = ($date_amutation / $date_total_mutation)*$salary;
      $job2 = ($date_amutation / $date_total_mutation)*$job_allowance;
      $certificate2 = ($date_amutation / $date_total_mutation)*$certificate_allowance;

      $delegasi_total = $delegasi1 + $delegasi2;
      $job_total = $job1 + $job2; 
      $certificate_total = $certificate1 + $certificate2;


      //tanya lagi bagian bpjs jika mutasi rumusnya gmn
      $salary_bpjs = $ul['salary_bpjs'];
        $bpjs = $salary_bpjs*1/100;
      $recived = $delegasi_total + $job_total + $certificate_total - $bpjs;
      
    }else{

    if ($date_entry > $date_20) {
      $delegasi1 = ($join_total_entry / $date_total_entry)*$salary;
      $job1 = ($join_total_entry / $date_total_entry)*$job_allowance;
      $certificate1 = ($join_total_entry / $date_total_entry)*$certificate_allowance;
     } else {
        $delegasi1 = 0;
      $job1 = 0;
      $certificate1 = 0;
    }
    
    $date_entry2 = $date_entry + ($date_now - $date_entry); 


   
    

       
   if ($join_total < 20) {
      $delegasi2 = ($join_total_entry / $date_total_entry)*$salary;
      $job2 = ($join_total_entry / $date_total_entry)*$job_allowance;
      $certificate2 = ($join_total_entry / $date_total_entry)*$certificate_allowance;
    } else{
      $delegasi2 = ($date_total / $date_total)*$salary;
      $job2 = ($date_total / $date_total)*$job_allowance;
      $certificate2 = ($date_total / $date_total)*$certificate_allowance;
    }

    $a = +2;
    $date_2 =  strtotime($a.'month', $date_20);
    
    if ($date_entry2 < $date_2) {
    $delegasi_total = $delegasi1 + $delegasi2;
    $job_total = $job1 + $job2; 
    $certificate_total = $certificate1 + $certificate2; 
    }else{
    $delegasi_total = $delegasi2;
    $job_total = $job2;  
    $certificate_total = $certificate2;  
    } 
    $salary_bpjs = $ul['salary_bpjs'];
        $bpjs = $salary_bpjs*1/100;
    $recived = $delegasi_total + $job_total + $certificate_total - $bpjs;
    }
    ?>
          <tr>
          <th scope="row"><?= $i; ?></th>
          <td><?= $ul['username']; ?></td>
          <td><?= $ul['position']; ?></td>
          <?php if ($ul['marital_status'] == "Single"): ?>
          <td>S</td>
          <?php elseif ($ul['marital_status'] == "Married"): ?>
          <td>M/<?= $ul['children']; ?></td>
          <?php endif ?>
          <td><?= $ul['npwp']; ?></td>
          <td><?= date('d-m-Y',$ul['date_entry']); ?></td>
          <td><?= rupiah($ul['salary']); ?></td>
          <?php if (($date_now < $date_21) OR ($date_entry > $date_21)) : ?>
            <td>calculate</td>
          <?php else : ?>
          <td><?= rupiah($delegasi_total); ?></td>
        <?php endif ; ?>
        <?php if (($date_now < $date_21) OR ($date_entry > $date_21)) : ?>
            <td>calculate</td>
          <?php else : ?>
          <td><?= rupiah($job_total); ?></td>
        <?php endif ; ?>
        <?php if (($date_now < $date_21) OR ($date_entry > $date_21)) : ?>
            <td>calculate</td>
          <?php else : ?>
          <td><?= rupiah($certificate_total); ?></td>
        <?php endif ; ?>
        <?php if (($date_now < $date_21) OR ($date_entry > $date_21)) : ?>
            <td>calculate</td>
          <?php else : ?>
          <td><?= rupiah($bpjs); ?></td>
        <?php endif ; ?>
        <?php if (($date_now < $date_21) OR ($date_entry > $date_21)) : ?>
            <td>calculate</td>
          <?php else : ?>
          <td><?= rupiah(round($recived)); ?></td>
        <?php endif ; ?>
          <td><?= $ul['rekening']; ?></td>
          <td><?= $ul['rekening_account']; ?></td>
          <!-- < <td>
          <a href="<?= base_url('admin/userDetail/') .$ul['iduser'];?>" class="badge badge-primary float-right ml-1">Explanation</a>
          </td> -->
          <td hidden="on"><?= date('d-m-Y', $ul['date_created']); ?></td> 
        </tr>
        <?php $i++; ?>
        <?php $recivedtotal += $recived; ?>
      <?php endforeach; ?>
      <tr>
    <td colspan="11"></td>
    <td><?= rupiah(round($recivedtotal)) ?></td>
   </tr>
        </tbody>
      </table>
</div>
</div>

<table border="1">
  <tr>
    <td>Dibuat oleh,</td>
    <td></td>
    <td>Dibuat oleh,</td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td><b>Yosi Herman</b></td>
    <td></td>
    <td><b>Yosi Herman</b></td>
    </tr>
    <tr>
    <td><i>Human Capital Division<i></td>
    <td></td>
    <td><i>Human Capital Division<i></td>
    </tr>

</table>


<script>
window.print();
</script>