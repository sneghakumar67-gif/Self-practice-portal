<?php
session_start();

// Restrict access to students only
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}

// If you are using roles in your database
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'student') {
    header("Location: unauthorized.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Self Practice - College Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
  <div class="container mt-5">
    <h2>Self Practice - Enter Question and Sample IO</h2>
    <form action="practice_workspace.php" method="POST">
      <div class="mb-3">
        <label for="question" class="form-label">Question</label>
        <textarea id="question" name="question" rows="5" class="form-control" required></textarea>
      </div>
      <div class="mb-3">
        <label for="sample_input" class="form-label">Sample Input</label>
        <textarea id="sample_input" name="sample_input" rows="3" class="form-control" required></textarea>
      </div>
      <div class="mb-3">
        <label for="expected_output" class="form-label">Expected Output</label>
        <textarea id="expected_output" name="expected_output" rows="3" class="form-control" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Generate Workspace</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

