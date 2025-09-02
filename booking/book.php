<?php require '../includes/header.php'; ?>
<?php require '../config/config.php'; ?>

<?php

if (isset($_POST['submit'])) {

  if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['date']) || empty($_POST['time']) || empty($_POST['phone']) || empty($_POST['message'])) {
    echo "<script>alert('All fields are required!');</script>";
  } else {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $user_id = $_SESSION['user_id'];

    if($date > date("n/j/Y")) {
      
    //write query to insert booking
    $insert = $conn->prepare("INSERT INTO booking (first_name, last_name, date, time, phone, message, user_id ) 
    VALUES (:first_name, :last_name, :date, :time, :phone, :message, :user_id)");
    $insert->execute([
      ':first_name' => $first_name,
      ':last_name' => $last_name,
      ':date' => $date,
      ':time' => $time,
      ':phone' => $phone,
      ':message' => $message,
       ':user_id' => $user_id
    ]);

    header("Location: " . APPURL . "");
    }

  else {
      header("Location: " . APPURL . "");
    }
  }
}