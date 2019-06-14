<?php 
include 'csv.php'; 
include 'fetch_data_oracle.php';
?>

<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style> 
textarea#test {
  resize: none;
}
</style>
<title>Form Send Email</title>
</head>
<body>



<br>
<div align="center">

<h1>Send email From CSV</h1>
<div>
<br>
<div>
  <form action="upload.php" method="post" align="left" enctype="multipart/form-data">
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="file">
        <label class="custom-file-label" for="file">Choose file .CSV</label>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" name="save" value="Upload">
        <input type="submit" class="btn btn-primary" name="delete" value="Delete">
      </div>
  </form>
</div>

<div>
  <form action="sendemail.php" method="POST">
    <div class="table-responsive">
      <table class="table">
        <tr>
        <th>No</th>
          <th>Name</th>
          <th>Email</th> 
          <th>Message</th>
          <th>BCC</th>
        </tr>
        <?php 
        $x = 1;
        while ($x < sizeof($the_big_array) ){ ?>
        <tr>
        <td><?php echo $x; ?></td>
        <td><?php echo $the_big_array[$x][1]; ?></td>
        <td><?php echo $the_big_array[$x][3]; ?></td>
        <td><?php echo $the_big_array[$x][2]; ?></td>
        <td>
          <textarea id = "test" type="text" name="bcc<?php echo $x; ?>" style="width:100%" rows="5" ></textarea>
        </tr>
        <?php $x++;} ?>
      </table>
    </div>
    <br>
    <input type="submit" class="btn btn-primary" name="multi_send" value="Send Email ke semua data">
  </form>
</div>

<br>

<h1>Send email Single user</h1>
<br>
<div>
  <form action="sendemail.php" method="post">
      Masukkan Alamat penerima :<br> 
      <input type="text" name="penerima"><br>
      Masukkan Subjek : <br>
      <input type="text" name="subjek"><br>
      Masukkan BCC : <br>
      <textarea type="text" rows="4" cols="25" name="bcc"></textarea><br>
      Masukkan Isi Pesan : <br>
      <textarea type="text" rows="4" cols="25" name="isi_pesan"></textarea><br><br>
      <input type="submit" name="single_send" value="Kirim Pesan Satu orang" row="10">
  </form>
</div>
<br>
<h1>Send email from Oracle Database</h1>
<br>


<table style="width:100%" border="1">
  <tr>
    <th>EMP CODE</th>
    <th>Name EMP</th>
    <th>Status EMP</th>
    <th>Email</th> 
  </tr>
<?php while ($baris = oci_fetch_array($select, OCI_RETURN_NULLS+OCI_ASSOC)) { ?>
    <tr>
    <?php 
      foreach ($baris as $item) { 
          print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
      } 
    ?>
    </tr>
<?php } ?>
</table>



</body>
</html>
