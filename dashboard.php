<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}
$username = strtoupper($_SESSION['username']); // show name in caps
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f9f9f9;
    }
    .navbar {
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .course-card {
      border-radius: 12px 12px 0 0;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      transition: transform 0.2s;
      min-height: 300px;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
    }
    .course-blue { background: #1976d2; }
    .course-pink { background: #e91e63; }
    .course-red  { background: #f44336; }
    .subject-label {
      background: #fff;
      color: #333;
      text-align: center;
      border-radius: 0 0 12px 12px;
      margin-bottom: 16px;
      padding: 10px;
      font-weight: bold;
      font-size: 1.1rem;
      box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }
    .course-card img {
      border-radius: 12px 12px 0 0;
    }
    .avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: #666;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-white">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold text-success" href="#">Student Portal</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="#">My Courses</a></li>
           <li class="nav-item"><a class="nav-link" href="self_practice.php">Self Practice</a></li>


        </ul>
        <div class="d-flex align-items-center">
          <div class="avatar"><?php echo substr($username,0,2); ?></div>
        </div>
      </div>
    </div>
  </nav>

  <!-- Welcome Section -->
  <div class="container welcome-section">
    <h2>Hi, <?php echo $username; ?>! 👋 </h2>
    <h5 class="text-muted">Recently accessed courses</h5>
  </div>

  <!-- Courses Grid -->
  <div class="container">
    <div class="row g-4">
      <!-- Course 1: Blue -->
      <div class="col-md-4">
        <div class="card course-card course-blue">
          <img src="https://via.placeholder.com/300x150.png?text=Database+Management" class="card-img-top" alt="Course 1">
          <div class="card-body text-white">
            <h5 class="card-title">2028 Database Management System</h5>
            <p class="card-text">Training</p>
          </div>
        </div>
        <div class="subject-label">Database Management</div>
      </div>

      <!-- Course 2: Pink -->
      <div class="col-md-4">
        <div class="card course-card course-pink">
          <img src="https://via.placeholder.com/300x150.png?text=Placement+Programming" class="card-img-top" alt="Course 2">
          <div class="card-body text-white">
            <h5 class="card-title">Placement Programming Course</h5>
            <p class="card-text">Training</p>
          </div>
        </div>
        <div class="subject-label">Placement Programming</div>
      </div>

      <!-- Course 3: Red -->
      <div class="col-md-4">
        <div class="card course-card course-red">
          <img src="https://via.placeholder.com/300x150.png?text=Semester+Exams" class="card-img-top" alt="Course 3">
          <div class="card-body text-white">
            <h5 class="card-title">2028 Semester Exams</h5>
            <p class="card-text">Training</p>
          </div>
        </div>
        <div class="subject-label">Semester Exams</div>
      </div>
    </div>
    <div class="mt-4">
      <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
