<?php include 'csv.php'; ?>
<html>
<head>
<title>Form Send Email</title>
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select File to upload:
    <input type="file" name="file" id="file"><br>
	<input type="submit" name="save" value="Upload">
	<input type="submit" name="delete" value="Delete">
</form>

<table style="width:100%" border="1">
  <tr>
	<th>No</th>
    <th>Name</th>
    <th>Email</th> 
    <th>Message</th>
  </tr>
  <?php 
  $x = 1;
  while ($x < sizeof($the_big_array) ){ ?>
  <tr>
	<td><?php echo $x; ?></td>
	<td><?php echo $the_big_array[$x][1]; ?></td>
	<td><?php echo $the_big_array[$x][3]; ?></td>
	<td><?php echo $the_big_array[$x][2]; ?></td>
  </tr>
  <?php $x++;} ?>
</table>

<br>
<div align="center">
<form action="sendemail.php"method="POST">
	<button type="submit">Send Email</button>
</form>
<div>

</body>


</html>
