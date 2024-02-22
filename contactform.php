<?php
$host = 'localhost';
$dbname = 'contact';
$username = 'root';
$password = '';

// Create connection
$conn = new mysqli($host, $username, $password, 'contact');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if($conn)
{
    $name = $_POST['username'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Using prepared statements to prevent SQL injection
   $sql = "INSERT INTO contactdata(name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
   $request = mysqli_query($conn,$sql);
    if($request)
    {
        echo "<script>alert('Your request has been sent to admin. We will get back to you shortly.');</script>";
        echo "<script>" . "window.location.href='./contact.html';" . "</script>";
    }
    else
    {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}

// Close connection
$conn->close();
?>
