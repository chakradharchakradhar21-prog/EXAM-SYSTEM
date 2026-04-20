<?php
// This logic handles the path whether you are in root or the admin folder
$dir = (strpos($_SERVER['SCRIPT_NAME'], '/admin/') !== false) ? '../' : '';
?>
<nav style="background: #2c3e50; padding: 15px; display: flex; justify-content: space-between; align-items: center; color: white; margin-bottom: 20px;">
    <div class="logo"><strong style="font-size: 20px;">ExamSystem Pro</strong></div>
    <div class="menu">
        <?php if($_SESSION['role'] == 'admin'): ?>
            <a href="<?php echo $dir; ?>admin/dashboard.php" style="color: white; margin-right: 15px; text-decoration: none;">Admin Home</a>
            <a href="<?php echo $dir; ?>admin/manage_exams.php" style="color: white; margin-right: 15px; text-decoration: none;">Manage Exams</a>
        <?php else: ?>
            <a href="<?php echo $dir; ?>student_dashboard.php" style="color: white; margin-right: 15px; text-decoration: none;">My Exams</a>
            <a href="<?php echo $dir; ?>student_results.php" style="color: white; margin-right: 15px; text-decoration: none;">My Results</a>
        <?php endif; ?>
        <a href="<?php echo $dir; ?>logout.php" style="background: #e74c3c; color: white; padding: 5px 10px; border-radius: 4px; text-decoration: none; margin-left: 10px;">Logout</a>
    </div>
</nav>