<?php
include('db_conn.php');
session_start();

// Security Check: Must be a student
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
    header("Location: index.php");
    exit();
}

include('header.php'); // Uses the new dynamic paths

$user_id = (int)$_SESSION['user_id'];

// Join Results and Exams table to get the Exam Name - use prepared statement
$stmt = $conn->prepare(
    "SELECT r.score, r.submitted_at, e.exam_title 
    FROM results r 
    JOIN exams e ON r.exam_id = e.exam_id 
    WHERE r.user_id = ? 
    ORDER BY r.submitted_at DESC"
);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}
$stmt->bind_param("i", $user_id);
if (!$stmt->execute()) {
    die("Execute failed: " . $stmt->error);
}
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Exam Results</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>My Performance History</h2>
        <p>Review your past exam scores and submission dates below.</p>
        <hr>

        <table>
            <thead>
                <tr>
                    <th>Exam Title</th>
                    <th>Score Achieved</th>
                    <th>Date Submitted</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['exam_title']); ?></td>
                        <td><strong style="color: #2c3e50;"><?php echo $row['score']; ?> Marks</strong></td>
                        <td><?php echo date('M d, Y - h:i A', strtotime($row['submitted_at'])); ?></td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" style="text-align:center;">You haven't completed any exams yet.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        
        <div style="margin-top: 20px;">
            <a href="student_dashboard.php" class="back-link">← Back to Available Exams</a>
        </div>
    </div>
</body>
</html>
<?php $stmt->close(); ?>