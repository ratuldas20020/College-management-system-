<?php

session_start();


if (!isset($_SESSION['username'])) {
  header('location:admin-login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Welcome admin</title>
  <!-- Icon cdn -->
  <!-- Boxicons CDN Link -->
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <div class="modal fade" id="addnoticemodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New notice</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="add-notice.php" method="post">
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Message:</label>
              <textarea class="form-control" id="message-text" name="notice-message"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>



          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="addNotice()">Send Notice</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="addpostmodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Post</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="add-notice.php" method="post">
            <div class="mb-3">
              <label for="post-text" class="col-form-label">Message:</label>
              <textarea class="form-control" id="post-text" name="notice-message"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="addPost()">Post</button>
        </div>
      </div>
    </div>
  </div>

  <div class="sidebar">
    <div class="logo-details">
      <img src="cgp_logo.png" alt="logo" />
      <span class="logo_name"> CGP Admin</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="#" class="active">
          <i class="bx bx-grid-alt"></i>
          <span class="links_name">Dashboard</span>
        </a>
      </li>
      <li data-bs-toggle="modal" data-bs-target="#addpostmodel">

        <a href="#">
          <i class="bx bx-note"></i>
          <span class="links_name">Add Post</span>
        </a>
      </li>
      <li data-bs-toggle="modal" data-bs-target="#addnoticemodel">
        <a href="#">
          <i class="bx bx-bell"></i>
          <span class="links_name">Add Notice</span>
        </a>
      </li>

      <li>
        <a href="#">
          <i class="bx bx-cog"></i>
          <span class="links_name">Setting</span>
        </a>
      </li>
      <li class="log_out">
        <a href="./logout.php">
          <i class="bx bx-log-out"></i>
          <span class="links_name">Log out</span>
        </a>
      </li>
    </ul>
  </div>
  <!-- End of sidebar -->
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class="bx bx-menu sidebarBtn"></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search option" />
        <i class="bx bx-search"></i>
      </div>
      <div class="profile-details">
        <i class="bx bx-user"></i>
        <span class="admin_name"><?php echo $_SESSION["username"] ?></span>
      </div>
    </nav>
    <!-- End of Navbar -->
    <div class="home-content">
      <div class="overview-boxes">
        <div class="box" id="total-student-card">
          <div class="box-topic">Total Students</div>
          <div class="number" id="total-no-students"></div>
        </div>
        <div class="box box-active" id="pending-studnets-card">
          <div class="box-topic">Pending Students</div>
          <div class="number" id="total-no-pending">5</div>
        </div>
        <div class="box" id="total-notice-card">
          <div class="box-topic">Total Notices</div>
          <div class="number" id="total-no-notice">3423</div>
        </div>

        <div class="box" id="total-post-card">
          <div class="box-topic">Total Posts</div>
          <div class="number" id="total-no-post">1</div>
        </div>
      </div>
      <!-- End of overview box -->
      <div class="option-boxes" id="total-student-container">
        <div class="option-contain box">
          <div class="title">Total Students</div>
          <div class="container">
            <table id="total-students" class="table table-striped" style="width: 100%">
              <thead>
                <tr>
                  <th>Student Name</th>
                  <th>Registration Number</th>
                  <th>Collage Name</th>
                  <th>Branch</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="students-table-body">
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="option-boxes show" id="pending-studnets-container">
        <div class="option-contain box">
          <div class="title">Pending Students</div>
          <div class="container">
            <table id="pending-students" class="table table-striped" style="width: 100%">
              <thead>
                <tr>
                  <th>Student Name</th>
                  <th>Registration Number</th>
                  <th>Collage Name</th>
                  <th>Branch</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="pending-table-body">
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="option-boxes" id="total-notice-container">
        <div class="option-contain box">
          <div class="title">Total Notices</div>
          <div class="container">
            <table id="total-notices" class="table table-striped" style="width: 100%">
              <thead>
                <tr>
                  <th>Notice No</th>
                  <th>Notice Description</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody id="table-body">
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="option-boxes" id="total-post-container">
        <div class="option-contain box">
          <div class="title">Total Posts</div>
          <div class="container">
            <table id="total-posts" class="table table-striped" style="width: 100%">
              <thead>
                <tr>
                  <th>Post Title</th>
                  <th>Post Description</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody id="post-table-body">

              </tbody>
            </table>
          </div>
        </div>
      </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

  <script src="script.js"></script>
</body>

</html>