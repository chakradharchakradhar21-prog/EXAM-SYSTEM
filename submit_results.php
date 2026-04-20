<?php
include('db_conn.php');
session_start();

// Verify user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php?error=Session expired");
    exit();
}

if (isset($_POST['submit_exam']) || isset($_POST['exam_id'])) {
    // Validate and sanitize inputs
    $user_id = (int)$_SESSION['user_id'];
    $exam_id = isset($_POST['exam_id']) ? (int)$_POST['exam_id'] : 0;
    $answers = isset($_POST['answer']) && is_array($_POST['answer']) ? $_POST['answer'] : [];
    
    if ($exam_id <= 0) {
        header("Location: student_dashboard.php?error=Invalid exam");
        exit();
    }
    
    $score = 0;

    foreach ($answers as $q_id => $chosen_opt) {
        // Sanitize q_id and chosen_opt
        $q_id = (int)$q_id;
        $chosen_opt = isset($chosen_opt) ? strtoupper(trim($chosen_opt)) : '';
        
        // Validate chosen_opt is A-D
        if (!in_array($chosen_opt, ['A', 'B', 'C', 'D'])) {
            continue;
        }
        
        // Use prepared statement
        $stmt = $conn->prepare("SELECT correct_option FROM questions WHERE q_id = ? AND exam_id = ?");
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("ii", $q_id, $exam_id);
        if (!$stmt->execute()) {
            die("Execute failed: " . $stmt->error);
        }
        $res = $stmt->get_result();
        $row = $res->fetch_assoc();
        
        if ($row && $row['correct_option'] == $chosen_opt) {
            $score++;
        }
        $stmt->close();
    }

    // Insert result using prepared statement
    $stmt = $conn->prepare("INSERT INTO results (user_id, exam_id, score, status) VALUES (?, ?, ?, 'completed')");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("iii", $user_id, $exam_id, $score);
    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }
    $stmt->close();

    header("Location: student_results.php?msg=Exam Submitted Successfully");
    exit();
}
?>