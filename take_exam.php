<?php
include('db_conn.php');
session_start();

// Security: Must be logged in as student
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
    header("Location: index.php");
    exit();
}

include('header.php'); 

// Validate and sanitize exam_id
$exam_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($exam_id <= 0) {
    header("Location: student_dashboard.php?error=Invalid exam");
    exit();
}

// 1. Fetch Exam Details using prepared statement
$stmt = $conn->prepare("SELECT exam_id, exam_title, duration_minutes FROM exams WHERE exam_id = ?");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}
$stmt->bind_param("i", $exam_id);
if (!$stmt->execute()) {
    die("Execute failed: " . $stmt->error);
}
$exam_result = $stmt->get_result();
$exam = $exam_result->fetch_assoc();

if (!$exam) {
    header("Location: student_dashboard.php?error=Exam not found");
    exit();
}
$stmt->close();

// 2. Fetch Questions using prepared statement
$stmt = $conn->prepare("SELECT q_id, question_text, option_a, option_b, option_c, option_d FROM questions WHERE exam_id = ?");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}
$stmt->bind_param("i", $exam_id);
if (!$stmt->execute()) {
    die("Execute failed: " . $stmt->error);
}
$questions = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Exam: <?php echo htmlspecialchars($exam['exam_title']); ?></title>
    <link rel="stylesheet" href="style.css">
    <style>
        #timer { position: fixed; top: 80px; right: 20px; background: #e74c3c; color: white; padding: 15px; font-size: 22px; font-weight: bold; border-radius: 8px; z-index: 1000; box-shadow: 0 4px 10px rgba(0,0,0,0.2); }
        .question-block { background: #fff; margin-bottom: 20px; border: 1px solid #ddd; padding: 20px; border-radius: 8px; }
        .opt-label { display: block; padding: 10px; margin: 5px 0; background: #f9f9f9; border-radius: 4px; cursor: pointer; }
        .opt-label:hover { background: #f1f1f1; }
    </style>
</head>
<body onload="startTimer()">

    <div id="timer">⏳ Time Left: <span id="time">00:00</span></div>

    <div class="container">
        <h2><?php echo htmlspecialchars($exam['exam_title']); ?></h2>
        <p><strong>Total Time:</strong> <?php echo $exam['duration_minutes']; ?> Minutes</p>
        <hr>

        <form id="examForm" action="submit_results.php" method="POST">
            <input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>">

            <?php 
            $count = 1;
            while($q = $questions->fetch_assoc()): 
            ?>
                <div class="question-block">
                    <p><strong>Question <?php echo $count++; ?>:</strong> <?php echo htmlspecialchars($q['question_text']); ?></p>
                    
                    <label class="opt-label"><input type="radio" name="answer[<?php echo $q['q_id']; ?>]" value="A" required> <?php echo htmlspecialchars($q['option_a']); ?></label>
                    <label class="opt-label"><input type="radio" name="answer[<?php echo $q['q_id']; ?>]" value="B"> <?php echo htmlspecialchars($q['option_b']); ?></label>
                    <label class="opt-label"><input type="radio" name="answer[<?php echo $q['q_id']; ?>]" value="C"> <?php echo htmlspecialchars($q['option_c']); ?></label>
                    <label class="opt-label"><input type="radio" name="answer[<?php echo $q['q_id']; ?>]" value="D"> <?php echo htmlspecialchars($q['option_d']); ?></label>
                </div>
            <?php endwhile; $stmt->close(); ?>

            <div style="text-align: center; margin-top: 30px;">
                <button type="submit" name="submit_exam" style="width: 250px; background: #27ae60; font-size: 18px;">Final Submit Exam</button>
            </div>
        </form>
    </div>

    <script>
        let duration = <?php echo (int)$exam['duration_minutes']; ?> * 60;
        let display = document.querySelector('#time');

        function startTimer() {
            let timer = duration, minutes, seconds;
            let countdown = setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    clearInterval(countdown);
                    alert("Time is up! Your exam will be submitted automatically.");
                    document.getElementById("examForm").submit();
                }
            }, 1000);
        }
    </script>
</body>
</html>