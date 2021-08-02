  <?php
  session_start();

  $connection = mysqli_connect("localhost", "root", "pass", "maestro");
  if (!$connection) {

    echo  "<script>alert('no connection')</script>";
  } else {

    if (!isset($_SESSION['id'])) {

      header("Location:courses.php");
    }

    $id = $_SESSION['id'];
    $query  = "SELECT * FROM kaka WHERE id = '$id'";
    $res = mysqli_query($connection, $query);
    $last = mysqli_fetch_assoc($res);
    if ($res) {
      //$_SESSION['file'] == ['file'];
      $file = $last['file'];
    } else
      echo 'failed';
  }
  ?>
  <div class=" h-100 m-3 ">
    <center><embed class="mr-auto" style="width:95%;height: 90vh;" src=<?php echo $file;  ?> type=""></center>
  </div>