<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Feedback - NSS Club</title>
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
    <h1>Provide Feedback</h1>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Get the form inputs
      $firstName = $_POST['first-name'];
      $lastName = $_POST['last-name'];
      $email = $_POST['email'];
      $message = $_POST['message'];

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
      $stmt = $conn->prepare("INSERT INTO feedback (first_name, last_name, email, message) VALUES (?, ?, ?, ?)");

      // Bind the parameters
      $stmt->bind_param("ssss", $firstName, $lastName, $email, $message);

      // Execute the statement
      if ($stmt->execute()) {
        echo '<p class="success-message">Thank you for your feedback!</p>';
      } else {
        echo '<p>Error storing feedback.</p>';
      }

      // Close the statement and connection
      $stmt->close();
      $conn->close();
    }
    ?>
    <form action="feedback.php" method="POST">
      <input type="text" name="first-name" placeholder="First Name" required style="width: 100%; padding: 10px; margin-top: 10px;">
      <input type="text" name="last-name" placeholder="Last Name" required style="width: 100%; padding: 10px; margin-top: 10px;">
      <input type="email" name="email" placeholder="Email" required style="width: 100%; padding: 10px; margin-top: 10px;">
      <textarea name="message" placeholder="Message" required style="width: 100%; height: 100px; padding: 10px; margin-top: 10px;"></textarea>
      <button type="submit" style="width: 100%; padding: 10px; margin-top: 10px;">Submit Feedback</button>
    </form>
  </div>
</body>
</html>
