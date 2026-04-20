<?php
include('db_conn.php');
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
    header("Location: index.php");
    exit();
}

include('header.php'); 

$current_time = date('Y-m-d H:i:s');
// Use prepared statement to prevent SQL injection
$stmt = $conn->prepare("SELECT exam_id, exam_title, duration_minutes, end_time FROM exams WHERE end_time > ? ORDER BY end_time ASC");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}
$stmt->bind_param("s", $current_time);
if (!$stmt->execute()) {
    die("Execute failed: " . $stmt->error);
}
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Available Examinations</h2>
        <p>Select an exam below to begin your session. The timer will start immediately.</p>
        <hr>

        <table>
            <thead>
                <tr>
                    <th>Exam Title</th>
                    <th>Duration</th>
                    <th>Deadline</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><strong><?php echo htmlspecialchars($row['exam_title']); ?></strong></td>
                        <td><?php echo $row['duration_minutes']; ?> mins</td>
                        <td><?php echo date('M d, Y - h:i A', strtotime($row['end_time'])); ?></td>
                        <td>
                            <a href="take_exam.php?id=<?php echo $row['exam_id']; ?>" class="btn">Start Exam</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="4" style="text-align:center;">No active exams available at this time.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php $stmt->close(); ?>