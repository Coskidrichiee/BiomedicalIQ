<?php
session_start(); // Start the session
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Biomedical IQ</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Biomedical IQ</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <img src="assets/img/widad.jpg" alt="Profile" class="rounded-circle">
                <span class="d-none d-md-block dropdown-toggle ps-2">
                    <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Guest'; ?>
                </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                    <h6><?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Guest'; ?></h6>
                    <span><?php echo isset($_SESSION['job']) ? htmlspecialchars($_SESSION['job']) : 'No Job Specified'; ?></span> <!-- Display the job title -->
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                        <i class="bi bi-person"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="logout.php">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>

      </header>

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">


      <li class="nav-item">
        <a class="nav-link" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Inventory</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <!-- Existing Wards -->
          <li>
            <a href="Equipment.php">
              <i class="bi bi-circle"></i>
              <span id="ward-a-name">Ward A</span>
            </a>
            <i class="bi bi-pencil edit-icon ms-2" onclick="enableEdit('ward-a-name')" style="cursor: pointer; font-size: 15px;"></i>
            <i class="bi bi-trash delete-icon ms-2" onclick="deleteWard('ward-a-name')" style="cursor: pointer; font-size: 15px;"></i>
          </li>
          <li>
            <a href="ward.php">
              <i class="bi bi-circle"></i>
              <span id="ward-b-name">Ward B</span>
            </a>
            <i class="bi bi-pencil edit-icon ms-2" onclick="enableEdit('ward-b-name')" style="cursor: pointer; font-size: 15px;"></i>
            <i class="bi bi-trash delete-icon ms-2" onclick="deleteWard('ward-b-name')" style="cursor: pointer; font-size: 15px;"></i>
          </li>
          <!-- Add New Ward Button -->
          <li>
            <a href="#" onclick="addNewWard()">
              <i class="bi bi-circle"></i><span>Add Ward +</span>
            </a>
          </li>
        </ul>
      </li>
      
      
<!-- End of Inventory nav       -->
      

      <li class="nav-item">
        <a href="workorder.php">
          <i class="bi bi-journal-text"></i><span>Work Order</span>
        </a>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a  href="repair.php">
          <i class="bi bi-layout-text-window-reverse"></i><span>Repair & Maintainence</span>
        </a>
      </li>
      <!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i>
          <span>Trends in Biomedical Engineering</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
      
        <ul id="charts-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="https://www.gilero.com/news/biomedical-engineering-inventions/" target="_blank">
              <i class="bi bi-circle"></i>
              <span>Gilero</span>
            </a>
          </li>
          <li>
            <a href="https://online-engineering.case.edu/blog/emerging-trends-in-biomedical-engineering" target="_blank">
              <i class="bi bi-circle"></i>
              <span>Case Western Reserve University</span>
            </a>
          </li>
          <li>
            <a href="https://www.bolton.ac.uk/blogs/biomedical-engineering-innovations-you-need-to-know" target="_blank">
              <i class="bi bi-circle"></i>
              <span>University Of Boston</span>
            </a>
          </li>
          <li>
            <a href="https://kahedu.edu.in/top-10-biomedical-engineering-innovations-in-the-last-decade/" target="_blank">
              <i class="bi bi-circle"></i>
              <span>Karpagam</span>
            </a>
          </li>
          <li>
            <a href="https://today.ucsd.edu/story/five-cutting-edge-advances-in-biomedical-engineering-and-their-applications-in-medicine" target="_blank">
              <i class="bi bi-circle"></i>
              <span>Uc San Diego</span>
            </a>
          </li>
          <li>
            <a href="https://fastercapital.com/content/Biomedical-engineering-innovation-Revolutionizing-Healthcare--Biomedical-Engineering-Innovations.html" target="_blank">
              <i class="bi bi-circle"></i>
              <span>Faster Capital</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- End Charts Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link " href="profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

        <div class="card">
    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
        <img src="assets/img/widad.jpg" alt="Profile" class="rounded-circle" id="profileImagePreview">
        <h5><?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Guest'; ?></h5>
        <p class="text-muted" id="overviewJob"></p> <!-- Placeholder for the job -->
        <div class="social-links mt-2">
            <a href="<?php echo htmlspecialchars($user['twitter'] ?? '#'); ?>" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="<?php echo htmlspecialchars($user['facebook'] ?? '#'); ?>" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="<?php echo htmlspecialchars($user['instagram'] ?? '#'); ?>" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="<?php echo htmlspecialchars($user['linkedin'] ?? '#'); ?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
    </div>
      </div>
        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <div id="overviewAbout" class="col-lg-9 col-md-8"></div>
                  <p class="small fst-italic"></p>

                  <h5 class="card-title">Profile Details</h5>

<div id="profileOverview" class="row">
    <div class="col-lg-3 col-md-4 label">Full Name</div>
    <div id="overviewFullName" class="col-lg-9 col-md-8">Alagbe Widad</div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">Company</div>
    <div id="overviewCompany" class="col-lg-9 col-md-8">Federal School Of Biomedical Engineering,LUTH</div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">Job</div>
    <div id="overviewJob" class="col-lg-9 col-md-8">Software Developer</div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">Country</div>
    <div id="overviewCountry" class="col-lg-9 col-md-8">Nigeria</div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">Address</div>
    <div id="overviewAddress" class="col-lg-9 col-md-8">Federal School Of Biomedical Engineering, LUTH.</div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">Phone</div>
    <div id="overviewPhone" class="col-lg-9 col-md-8">(+234) 81 0092 6871</div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-4 label">Email</div>
    <div id="overviewEmail" class="col-lg-9 col-md-8">alagbewidad814@gmail.com</div>
</div>

</div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form id="profileForm" enctype="multipart/form-data" onsubmit="return saveProfileData()">
    <div class="row mb-3">
        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
        <div class="col-md-8 col-lg-9">
            <img id="profileImagePreview" src="assets/img/.jpg" alt="Upload Profile picture" class="img-thumbnail mb-2" style="width: 100px; height: 100px;">
            <input name="profileImage" type="file" class="form-control" id="profileImage" accept="image/*" onchange="previewImage(event)">
            <div class="pt-2">
                <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image" onclick="removeImage()"> <i class="bi bi-trash"></i></a>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
        <div class="col-md-8 col-lg-9">
            <input name="fullName" type="text" class="form-control" id="fullName" required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
        <div class="col-md-8 col-lg-9">
            <textarea name="about" class="form-control" id="about" style="height: 100px" required></textarea>
        </div>
    </div>

    <div class="row mb-3">
        <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
        <div class="col-md-8 col-lg-9">
            <input name="company" type="text" class="form-control" id="company" required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="job" class="col-md-4 col-lg-3 col-form-label">Job</label>
        <div class="col-md-8 col-lg-9">
            <input name="job" type="text" class="form-control" id="job" required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="country" class="col-md-4 col-lg-3 col-form-label">Country</label>
        <div class="col-md-8 col-lg-9">
            <input name="country" type="text" class="form-control" id="country" required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
        <div class="col-md-8 col-lg-9">
            <input name="address" type="text" class="form-control" id="address" required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
        <div class="col-md-8 col-lg-9">
            <input name="phone" type="text" class="form-control" id="phone" required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
        <div class="col-md-8 col-lg-9">
            <input name="email" type="email" class="form-control" id="email" required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
        <div class="col-md-8 col-lg-9">
            <input name="twitter" type="text" class="form-control" id="twitter">
        </div>
    </div>

    <div class="row mb-3">
        <label for="facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
        <div class="col-md-8 col-lg-9">
            <input name="facebook" type="text" class="form-control" id="facebook">
        </div>
    </div>

    <div class="row mb-3">
        <label for="instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
        <div class="col-md-8 col-lg-9">
            <input name="instagram" type="text" class="form-control" id="instagram">
        </div>
    </div>

    <div class="row mb-3">
        <label for="linkedin" class="col-md-4 col-lg-3 col-form-label">LinkedIn Profile</label>
        <div class="col-md-8 col-lg-9">
            <input name="linkedin" type="text" class="form-control" id="linkedin">
        </div>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
</form>
                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>AlagbeWidad</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


  <script>
document.addEventListener("DOMContentLoaded", function() {
    loadProfileData();

    // Handle form submission
    document.getElementById('profileForm').addEventListener('submit', saveProfileData);

    // Correctly attach the preview image function
    const profileImageInput = document.getElementById('profileImage');
    if (profileImageInput) {
        profileImageInput.addEventListener('change', previewImage);
    }

    // Attach event listener for the full name input to update the overview and navbar
    const fullNameInput = document.getElementById('fullName');
    if (fullNameInput) {
        fullNameInput.addEventListener('input', updateFullName);
    }

    // Function to update the full name in profile overview and navbar
    function updateFullName() {
        const fullName = this.value; // Get the current value of the full name input
        document.getElementById('overviewFullName').textContent = fullName || 'N/A'; // Update profile overview
        updateHeaderFullName(fullName); // Update navbar
    }

    // Function to save profile data
    function saveProfileData(event) {
        event.preventDefault(); // Prevent default form submission

        // Get form data
        const formData = new FormData(document.getElementById('profileForm'));
        const profileImageFile = formData.get('profileImage');

        // Create a profile data object
        const profileData = {
            fullName: formData.get('fullName'),
            about: formData.get('about'),
            company: formData.get('company'),
            job: formData.get('job'), // Ensure to include the job field
            country: formData.get('country'),
            address: formData.get('address'),
            phone: formData.get('phone'),
            email: formData.get('email'),
            twitter: formData.get('twitter'),
            facebook: formData.get('facebook'),
            instagram: formData.get('instagram'),
            linkedin: formData.get('linkedin'),
        };

        console.log("Profile Data:", profileData); // Log profile data for debugging

        // Save profile data to localStorage
        localStorage.setItem('profileData', JSON.stringify(profileData));

        // Save profile image if a new one is selected
        if (profileImageFile) {
            const reader = new FileReader();
            reader.onload = function(e) {
                localStorage.setItem('profileImage', e.target.result); // Save the image data URL
                updateProfileOverview(profileData, e.target.result); // Pass the new image to update the overview
                updateHeaderImage(e.target.result); // Update header image
            }
            reader.readAsDataURL(profileImageFile); // Read the uploaded file
        } else {
            updateProfileOverview(profileData); // Update overview without new image
        }

        // Refresh the form
        document.getElementById('profileForm').reset();
        removeImage(); // Reset image preview
    }

    // Function to load profile data
    function loadProfileData() {
        const profileData = JSON.parse(localStorage.getItem('profileData'));
        const profileImage = localStorage.getItem('profileImage');

        if (profileData) {
            document.getElementById('fullName').value = profileData.fullName || '';
            document.getElementById('company').value = profileData.company || '';
            document.getElementById('job').value = profileData.job || ''; // Load job data
            document.getElementById('country').value = profileData.country || '';
            document.getElementById('address').value = profileData.address || '';
            document.getElementById('phone').value = profileData.phone || '';
            document.getElementById('email').value = profileData.email || '';
            document.getElementById('twitter').value = profileData.twitter || '';
            document.getElementById('facebook').value = profileData.facebook || '';
            document.getElementById('instagram').value = profileData.instagram || '';
            document.getElementById('linkedin').value = profileData.linkedin || '';

            // Load profile overview data
            updateProfileOverview(profileData, profileImage);
        }

        // Load the profile image if it exists
        if (profileImage) {
            document.getElementById('profileImagePreview').src = profileImage; // Set the preview to the stored image
            updateHeaderImage(profileImage); // Update header image
        }
    }

    // Function to update profile overview
    function updateProfileOverview(data, imageUrl) {
        document.getElementById('overviewFullName').textContent = data.fullName || 'N/A';
        document.getElementById('overviewCompany').textContent = data.company || 'N/A';
        document.getElementById('overviewJob').textContent = data.job || 'N/A'; // Update the overview job
        console.log("Updated Job Overview:", data.job); // Log updated job for debugging
        document.getElementById('overviewCountry').textContent = data.country || 'N/A';
        document.getElementById('overviewAddress').textContent = data.address || 'N/A';
        document.getElementById('overviewPhone').textContent = data.phone || 'N/A';
        document.getElementById('overviewEmail').textContent = data.email || 'N/A';
        document.getElementById('overviewAbout').textContent = data.about || 'N/A';

        // Update the profile image if a new one is provided
        if (imageUrl) {
            document.getElementById('profileImagePreview').src = imageUrl; // Update the image preview
        }
    }

    // Function to update header image
    function updateHeaderImage(imageUrl) {
        document.querySelector('.nav-profile img').src = imageUrl; // Update the header image
    }

    // Function to update header full name
    function updateHeaderFullName(fullName) {
        document.querySelector('.nav-profile .profile-name').textContent = fullName || 'N/A'; // Update the navbar name
    }

    // Function to remove image
    function removeImage() {
        document.getElementById('profileImagePreview').src = 'assets/img/default.jpg'; // Reset to a default image
        document.getElementById('profileImage').value = null; // Clear the file input
    }

    // Function to preview image before saving
    function previewImage(event) {
        const imagePreview = document.getElementById('profileImagePreview');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result; // Set the preview image source
            }
            reader.readAsDataURL(file); // Read the uploaded file
        }
    }
});
</script>
<script>
  function saveProfileData(event) {
    event.preventDefault(); // Prevent default form submission

    // Get form data
    const formData = new FormData(document.getElementById('profileForm'));
    const profileImageFile = formData.get('profileImage');

    // Create a profile data object
    const profileData = {
        fullName: formData.get('fullName'),
        about: formData.get('about'),
        company: formData.get('company'),
        job: formData.get('job'), // Ensure to include the job field
        country: formData.get('country'),
        address: formData.get('address'),
        phone: formData.get('phone'),
        email: formData.get('email'),
        twitter: formData.get('twitter'),
        facebook: formData.get('facebook'),
        instagram: formData.get('instagram'),
        linkedin: formData.get('linkedin'),
    };

    console.log("Profile Data:", profileData); // Log profile data for debugging

    // Save profile data to localStorage
    localStorage.setItem('profileData', JSON.stringify(profileData));

    // Save profile image if a new one is selected
    if (profileImageFile) {
        const reader = new FileReader();
        reader.onload = function(e) {
            localStorage.setItem('profileImage', e.target.result); // Save the image data URL
            updateProfileOverview(profileData, e.target.result); // Pass the new image to update the overview
            updateHeaderImage(e.target.result); // Update header image
        }
        reader.readAsDataURL(profileImageFile); // Read the uploaded file
    } else {
        updateProfileOverview(profileData); // Update overview without new image
        updateHeaderImage(); // Call this to update the header image without a new one
    }

    // Refresh the form
    document.getElementById('profileForm').reset();
    removeImage(); // Reset image preview
}

</script>


</body>

</html>