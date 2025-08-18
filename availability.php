<?php
session_start();
include 'db.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $days = $_POST['days'];
    $start = $_POST['start_time'];
    $end = $_POST['end_time'];

    foreach ($days as $day) {
        $stmt = $pdo->prepare("INSERT INTO availability (user_id, day, start_time, end_time) VALUES (?, ?, ?, ?)");
        $stmt->execute([$user_id, $day, $start, $end]);
    }

    header("Location: dashboard.php");
    exit;
}
include 'header.php';
?>
<h2>Set Your Availability 📅</h2>
<form method="POST">
  <label>Select Days</label><br>
  <input type="checkbox" name="days[]" value="Monday"> Monday
  <input type="checkbox" name="days[]" value="Tuesday"> Tuesday
  <input type="checkbox" name="days[]" value="Wednesday"> Wednesday
  <br><br>
  <label>Time Slot</label>
  <input type="time" name="start_time" required> to <input type="time" name="end_time" required>
  <br><br>
  <button class="btn" type="submit">Save Availability</button>
</form>
<?php include 'footer.php'; ?>
