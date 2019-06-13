<?php include 'csv.php'; ?>
<html>
<head>
<style> 
textarea#test {
  resize: none;
}
</style>
<title>Form Send Email</title>
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select File to upload:
    <input type="file" name="file" id="file"><br>
	<input type="submit" name="save" value="Upload">
	<input type="submit" name="delete" value="Delete">
</form>



<br>
<div align="center">
<form action="sendemail.php"method="POST">
  <table style="width:100%" border="1">
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
  <input type="submit" name="multi_send" value="Send Email ke semua data">
</form>
<div>
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
      <textarea type="text" rows="4" cols="25" name="isi_pesan"></textarea><br>
      <input type="submit" name="single_send" value="Kirim Pesan Satu orang" row="10">
  </form>
</div>

</body>


</html>
