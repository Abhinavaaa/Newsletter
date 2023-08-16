<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Subscribe - NSS Club</title>
  <style>
    body {
      background-color: #EAF6FF;
    }
    .container {
      max-width: 500px;
      margin: 0 auto;
      padding: 40px;
      background-color: #FFFFFF;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
      text-align: center;
    }
    .success-message {
      margin-top: 20px;
      text-align: center;
      color: green;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Subscribe to Our Newsletter</h1>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Get the email from the form submission
      $email = $_POST['email'];

      // Validate the email address
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<p>Invalid email address.</p>';
      } else {
        // Database connection details
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "newsletter_nss";

        // Create a new database connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO subscribers (email) VALUES (?)");

        // Bind the email parameter
        $stmt->bind_param("s", $email);

        // Execute the statement
        if ($stmt->execute()) {
          echo '<p class="success-message">Thank you for subscribing!</p>';
        } else {
          echo '<p>Error storing email.</p>';
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
      }
    }
    ?>
    <form action="subscribe.php" method="POST">
      <input type="email" name="email" placeholder="Enter your email address" required style="width: 100%; padding: 10px; margin-top: 10px;">
      <button type="submit" style="width: 100%; padding: 10px; margin-top: 10px;">Subscribe</button>
    </form>
  </div>
</body>
</html>
