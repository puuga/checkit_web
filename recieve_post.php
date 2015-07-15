<?php
  $mac = $_POST["mac"];
  $sender_time = $_POST["sender_time"];

  $servername = "localhost";
  $username = "checkit";
  $password = "12345678901";
  $database = "checkit_test";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $database);

  $response = [];
  // Check connection
  if ($conn->connect_error) {
    $response["result"] = "Connection failed";
    $response["message"] = $conn->connect_error;
    die("Connection failed: " . $conn->connect_error);
  }
  // echo "Connected successfully";
  $response["result"] = "Connection successfully";

  $sql = "INSERT INTO status_posts (mac, sender_time)
  VALUES ('$mac', '$sender_time')";

  if ($conn->query($sql) === TRUE) {
      // echo "New record created successfully";
      $response["message"] = "New record created successfully";
  } else {
      // echo "Error: " . $sql . "<br>" . $conn->error;
      $response["result"] = "Insert Error";
      $response["message"] = "New record created successfully";
  }

  $conn->close();

  header('Content-type: application/json');
  echo json_encode( $response );
?>
