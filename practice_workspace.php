<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}
$username = strtoupper($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Practice Workspace</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-4">
  <h3>Practice Workspace</h3>
  
  <!-- Show question and sample input/output -->
  <p><b>Question:</b> <?php echo $_POST['question']; ?></p>
  <p><b>Sample Input:</b> <pre><?php echo $_POST['sample_input']; ?></pre></p>
  <p><b>Expected Output:</b> <pre><?php echo $_POST['expected_output']; ?></pre></p>

  <form method="POST" action="run_code.php">
    
    <!-- Step 1: Select Language -->
    <div class="mb-3">
      <label for="language" class="form-label"><b>Select Language</b></label>
      <select name="language" id="language" class="form-control" required>
        <option value="">-- Choose a Language --</option>
        <option value="python3">Python 3</option>
        <option value="cpp17">C++ 17</option>
        <option value="c">C</option>
        <option value="java">Java</option>
      </select>
    </div>

    <!-- Step 2: Code Editor -->
    <div class="mb-3">
      <label for="code" class="form-label"><b>Write Your Code</b></label>
      <textarea name="code" id="code" rows="12" class="form-control" placeholder="Start typing your code here..." required></textarea>
    </div>

    <!-- Hidden fields to carry question details -->
    <input type="hidden" name="sample_input" value="<?php echo $_POST['sample_input']; ?>">
    <input type="hidden" name="expected_output" value="<?php echo $_POST['expected_output']; ?>">

    <!-- Step 3: Run Button -->
    <button type="submit" class="btn btn-success">Run Code</button>
  </form>
</div>
</body>
</html>

