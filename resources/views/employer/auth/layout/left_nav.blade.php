<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Left Sidebar with Bootstrap 5</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* Custom left sidebar */
    .left-sidebar {
      top: 90px; /* Height of the Bootstrap navbar */
      bottom: 60px; /* Height of the footer */
      width: 200px;
      background-color: #f8f9fa;
      border-right: 1px solid #ddd;
      padding-top: 1rem;
    }

    .main-content {
      margin-left: 200px;
      padding: 1rem;
    }

    footer {
      height: 60px;
      background-color: #343a40;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
    }
  </style>
</head>
<body>

  <!-- Left Sidebar -->
  <div class="left-sidebar position-fixed">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('employer.post.job') }}">Post job</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Settings</a>
      </li>
    </ul>
  </div>

  <!-- Footer -->
  <!-- <footer class="fixed-bottom">
    <div class="container">
      <p class="mb-0">© 2025 MySite</p>
    </div>
  </footer> -->

</body>
</html>
