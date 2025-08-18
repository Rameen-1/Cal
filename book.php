<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $user_id = 1; // Temporary: static user ID (can make dynamic later)

    $stmt = $pdo->prepare("INSERT INTO appointments (user_id, visitor_name, visitor_email, meeting_date, meeting_time) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$user_id, $name, $email, $date, $time]);

    $success = true;
}
include 'header.php';
?>
<h2>Book a Meeting 💌</h2>
<?php if (!empty($success)) echo "<p style='color:green;'>Appointment confirmed! 🎉</p>"; ?>
<form method="POST">
  <input type="text" name="name" placeholder="Your Name" required>
  <input type="email" name="email" placeholder="Email" required>
  <label>Select Date</label>
  <input type="date" name="date" required>
  <label>Pick Time</label>
  <input type="time" name="time" required>
  <button type="submit" class="btn">Confirm Booking</button>
</form>
<?php include 'footer.php'; ?>
