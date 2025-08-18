<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM appointments WHERE user_id = ? ORDER BY meeting_date, meeting_time");
$stmt->execute([$user_id]);
$appointments = $stmt->fetchAll();

include 'header.php';
?>
<h2>Welcome, <?= htmlspecialchars($_SESSION['user_name']) ?> 🎀</h2>
<p>Here are your upcoming appointments:</p>
<ul class="meeting-list">
  <?php foreach ($appointments as $a): ?>
    <li>📅 <?= $a['meeting_date'] ?> at <?= $a['meeting_time'] ?> — <?= htmlspecialchars($a['visitor_name']) ?> (<?= htmlspecialchars($a['visitor_email']) ?>)</li>
  <?php endforeach; ?>
</ul>
<?php include 'footer.php'; ?>
