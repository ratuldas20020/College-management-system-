<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!----======== CSS ======== -->
  <link rel="stylesheet" href="style.css" />

  <!----===== Iconscout CSS ===== -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

  <title>Student Regisration</title>
</head>

<body>
  <?php
  include '../config.php';
  ?>

  <div class="container">
    <img class="logo" src="../img/cgp_logo.png">
    <header>Registration</header>
    <form id="signup-form" method="post" action="signup-action.php">
      <div class="form first">
        <div class="details personal">
          <span class="title">Personal Details</span>

          <div class="fields">
            <div class="input-field">
              <label>Full Name</label>
              <input id="fullname" type="text" name="fullname" placeholder="Enter your name" />
            </div>

            <div class="input-field">
              <label>Date of Birth</label>
              <input type="date" name="dob" placeholder="Enter birth date" />
            </div>

            <div class="input-field">
              <label>Email</label>
              <input type="text" name="email" placeholder="Enter your email" />
            </div>

            <div class="input-field">
              <label>Mobile Number</label>
              <input type="number" name="mobile" placeholder="Enter mobile number" />
            </div>

            <div class="input-field">
              <label>Gender</label>
              <select name="gender">
                <option disabled selected>Select gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
              </select>
            </div>

            <div class="input-field">
              <label>Gurdian's Name</label>
              <input name="gurdian" type="text" placeholder="Enter your gurdian's Name" />
            </div>


            <div class="input-field">
              <label>Password</label>
              <input type="password" name="password" placeholder="Enter your password" />
            </div>

            <div class="input-field">
              <label>Confirm Password</label>
              <input type="password" name="conpassword" placeholder="Confirm password" />
            </div>
            <div class="input-field">
              <label>Address</label>
              <input type="text" name="address" placeholder="Enter your address" />
            </div>
          </div>

          <div class="details ID">
            <span class="title">College Details</span>

            <div class="fields">
              <div class="input-field">
                <label>Registration Number</label>
                <input type="text" name="regno" placeholder="Enter registration number" />
              </div>

              <div class="input-field">
                <label>Roll Number</label>
                <input type="number" name="rollno" placeholder="Enter Roll number" />
              </div>

              <div class="input-field">
                <label>College Name</label>
                <select name="college">
                  <option disabled selected>Select College</option>
                  <?php
                  $query = "SELECT * FROM colleges";
                  $result = $conn->query($query);
                  while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['college_code'] . '">' . $row['college_name'] . '</option>';
                  }

                  ?>
                </select>
              </div>

              <div class="input-field">
                <label>Branch Name</label>
                <select name="branch">
                  <option disabled selected>Select Branch</option>
                  <option value="CST">CST</option>
                  <option value="EE">EE</option>
                  <option value="RE">RE</option>
                </select>
              </div>

              <div class="input-field">
                <label>Issued Date</label>
                <input type="date" name="issueddate" placeholder="Enter your issued date" />
              </div>



              <button class="submit" type="submit">
                <span class="btnText">Submit</span>
                <i class="uil uil-navigator"></i>
              </button>
            </div>
          </div>
    </form>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>


  <script src="script.js"></script>
</body>

</html>