<?php
	include($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/connect/Connect.php');
		
	if (isset($_POST['RegisterAdmin'])) { //If button RegisterAdmin clicked
		$adminusername = $_POST['Admin_Username'];
		$adminpassword = $_POST['Admin_Password'];
		$adminname = $_POST['Admin_Name'];
		$adminphoneno = $_POST['Admin_PhoneNo'];
		$adminemail = $_POST['Admin_Email'];

		$query = "INSERT INTO administrator(Admin_ID ,Admin_Username, Admin_Password, Admin_Name, Admin_PhoneNo, Admin_Email) VALUES('0', '$adminusername', '$adminpassword', '$adminname', '$adminphoneno', '$adminemail')";
		$result = mysqli_query($conn, $query);

		$message = "Registered succesfully";
            echo "<script>alert('$message')</script>";
	}
		
	else if (isset($_POST['RegisterCoordinator'])) { //If button RegisterCoordinator clicked
		$coordinatorusername = $_POST['Coordinator_Username'];
		$coordinatorpassword = $_POST['Coordinator_Password'];
		$coordinatorname = $_POST['Coordinator_Name'];
		$coordinatorphoneno = $_POST['Coordinator_PhoneNo'];
		$coordinatoremail = $_POST['Coordinator_Email'];

		$query = "INSERT INTO coordinator(Coordinator_ID ,Coordinator_Username, Coordinator_Password, Coordinator_Name, Coordinator_PhoneNo, Coordinator_Email) VALUES('0', '$coordinatorusername', '$coordinatorpassword', '$coordinatorname', '$coordinatorphoneno', '$coordinatoremail')";
		$result = mysqli_query($conn, $query);

		$message = "Registered succesfully";
        echo "<script>alert('$message')</script>";
	}

	else if (isset($_POST['RegisterStudent'])) { //If button RegisterStudent clicked
		$studentusername = $_POST['Student_Username'];
		$studentpassword = $_POST['Student_Password'];
		$studentname = $_POST['Student_Name'];
		$studentphoneno = $_POST['Student_PhoneNo'];
		$studentemail = $_POST['Student_Email'];

		$query = "INSERT INTO student(Student_ID ,Student_Username, Student_Password, Student_Name, Student_PhoneNo, Student_Email) VALUES('0', '$studentusername', '$studentpassword', '$studentname', '$studentphoneno', '$studentemail')";
		$result = mysqli_query($conn, $query);

		$message = "Registered succesfully";
        echo "<script>alert('$message')</script>";
	}
	mysqli_close($conn);
?>

<!--HEADER-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/html/header/HeaderRegistration.html'); ?>
<!--/HEADER-->
<!--NAVBAR-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/html/navbar/NavbarRegistration.html'); ?>
<!--/NAVBAR-->
	<!--CONTENT-->
	<div class="container">
		<div class="row justify-content-center">
			<!--BUTTON NAV PILLS-->
			<ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
	            <li class="nav-item" role="presentation">
	                <a class="btn btn-outline-secondary rounded-pill nav-link active m-2" id="pills-admin-tab" data-toggle="pill" href="#admin" role="tab" aria-controls="admin" aria-selected="true" style="border: 1px solid black; background-color: none;">Admin</a>
	            </li>
	            <li class="nav-item" role="presentation">
	                <a class="btn btn-outline-secondary rounded-pill nav-link m-2" id="pills-coordinator-tab" data-toggle="pill" href="#coordinator" role="tab" aria-controls="coordinator" aria-selected="false">Coordinator</a>
	            </li>
	            <li class="nav-item" role="presentation">
	                <a class="btn btn-outline-secondary rounded-pill nav-link m-2" id="pills-student-tab" data-toggle="pill" href="#student" role="tab" aria-controls="student" aria-selected="false">Student</a>
	            </li>
	        </ul>
			<!--/BUTTON NAV PILLS-->
		</div>
		<!--CONTENT NAV PILLS-->
		<div class="row justify-content-center">
			<div class="tab-content" id="pills-tabContent">
				<!--ADMIN SECTION-->
				<div class="tab-pane fade show active" id="admin" role="tabpanel" aria-labelledby="student">
					<div class="w-10 card shadow p-2 mb-3 rounded" style="background-color: #99c5c4; border: 2px solid black; width: 30rem">
				        <div class="card-body">
				            <form action=""method="post">
				            	<!--ADMIN USERNAME-->
				            	<div class="form-group row">
    								<label for="username" class="col-sm-3 col-form-label">Username</label>
    								<div class="col-sm-9">
      									<input type="text" class="form-control" id="username" name="Admin_Username" required>
    								</div>
  								</div>
				                <!--/ADMIN USERNAME-->
				                <!--ADMIN PASSWORD-->
				            	<div class="form-group row">
    								<label for="password" class="col-sm-3 col-form-label">Password</label>
    								<div class="col-sm-9">
      									<input type="password" class="form-control" id="password" name="Admin_Password" required>
    								</div>
  								</div>
				                <!--/ADMIN PASSWORD-->
				                <!--ADMIN NAME-->
				            	<div class="form-group row">
    								<label for="name" class="col-sm-3 col-form-label">Full Name</label>
    								<div class="col-sm-9">
      									<input type="text" class="form-control" id="name" name="Admin_Name" required>
    								</div>
  								</div>
				                <!--/ADMIN NAME-->
				                <!--ADMIN PHONE NUMBER-->
				                <div class="form-group row">
    								<label for="phoneno" class="col-sm-3 col-form-label">Phone No</label>
    								<div class="col-sm-9">
      									<input type="text" class="form-control" id="phoneno" name="Admin_PhoneNo" required>
    								</div>
  								</div>
				                <!--/ADMIN PHONE NUMBER-->
				                <!--ADMIN EMAIL-->
				                <div class="form-group row">
    								<label for="email" class="col-sm-3 col-form-label">Email</label>
    								<div class="col-sm-9">
      									<input type="email" class="form-control" id="email" name="Admin_Email" required>
    								</div>
  								</div>
				                <!--ADMIN EMAIL-->
				                <div class="form-group text-center mt-4">
				                    <button type="submit" name="RegisterAdmin" id="register" class="btn btn-secondary btn-block" value="Register">Register</button>
				                </div>
				            </form>
				        </div>
				    </div>
				</div>
				<!--/ADMIN SECTION-->
				<!--COORDINATOR SECTION-->
				<div class="tab-pane fade show" id="coordinator" role="tabpanel" aria-labelledby="coordinator">
					<div class="w-10 card shadow p-2 mb-3 rounded" style="background-color: #99c5c4; border: 2px solid black; width: 30rem">
				        <div class="card-body">
				            <form action=""method="post">
				            	<!--COORDINATOR USERNAME-->
				            	<div class="form-group row">
    								<label for="username" class="col-sm-3 col-form-label">Username</label>
    								<div class="col-sm-9">
      									<input type="text" class="form-control" id="username" name="Coordinator_Username" required>
    								</div>
  								</div>
				                <!--/COORDINATOR USERNAME-->
				                <!--COORDINATOR PASSWORD-->
				            	<div class="form-group row">
    								<label for="password" class="col-sm-3 col-form-label">Password</label>
    								<div class="col-sm-9">
      									<input type="password" class="form-control" id="password" name="Coordinator_Password" required>
    								</div>
  								</div>
				                <!--/COORDINATOR PASSWORD-->
				                <!--COORDINATOR NAME-->
				            	<div class="form-group row">
    								<label for="name" class="col-sm-3 col-form-label">Full Name</label>
    								<div class="col-sm-9">
      									<input type="text" class="form-control" id="name" name="Coordinator_Name" required>
    								</div>
  								</div>
				                <!--/COORDINATOR NAME-->
				                <!--COORDINATOR PHONE NUMBER-->
				                <div class="form-group row">
    								<label for="phoneno" class="col-sm-3 col-form-label">Phone No</label>
    								<div class="col-sm-9">
      									<input type="text" class="form-control" id="phoneno" name="Coordinator_PhoneNo" required>
    								</div>
  								</div>
				                <!--/COORDINATOR PHONE NUMBER-->
				                <!--COORDINATOR EMAIL-->
				                <div class="form-group row">
    								<label for="email" class="col-sm-3 col-form-label">Email</label>
    								<div class="col-sm-9">
      									<input type="email" class="form-control" id="email" name="Coordinator_Email" required>
    								</div>
  								</div>
				                <!--/COORDINATOR EMAIL-->
				                <div class="form-group text-center mt-4">
				                    <button type="submit" name="RegisterCoordinator" id="register" class="btn btn-secondary btn-block" value="Register">Register</button>
				                </div>
				            </form>
				        </div>
				    </div>
				</div>
				<!--/COORDINATOR SECTION-->
				<!--STUDENT SECTION-->
				<div class="tab-pane fade show" id="student" role="tabpanel" aria-labelledby="student">
					<div class="w-10 card shadow p-2 mb-3 rounded" style="background-color: #99c5c4; border: 2px solid black; width: 30rem">
				        <div class="card-body">
				            <form action=""method="post">
				            	<!--STUDENT USERNAME-->
				            	<div class="form-group row">
    								<label for="username" class="col-sm-3 col-form-label">Username</label>
    								<div class="col-sm-9">
      									<input type="text" class="form-control" id="username" name="Student_Username" required>
    								</div>
  								</div>
				                <!--/STUDENT USERNAME-->
				                <!--STUDENT PASSWORD-->
				            	<div class="form-group row">
    								<label for="password" class="col-sm-3 col-form-label">Password</label>
    								<div class="col-sm-9">
      									<input type="password" class="form-control" id="password" name="Student_Password" required>
    								</div>
  								</div>
				                <!--/STUDENT PASSWORD-->
				                <!--STUDENT NAME-->
				            	<div class="form-group row">
    								<label for="name" class="col-sm-3 col-form-label">Full Name</label>
    								<div class="col-sm-9">
      									<input type="text" class="form-control" id="name" name="Student_Name" required>
    								</div>
  								</div>
				                <!--/STUDENT NAME-->
				                <!--STUDENT PHONE NUMBER-->
				                <div class="form-group row">
    								<label for="phoneno" class="col-sm-3 col-form-label">Phone No</label>
    								<div class="col-sm-9">
      									<input type="text" class="form-control" id="phoneno" name="Student_PhoneNo" required>
    								</div>
  								</div>
				                <!--/STUDENT PHONE NUMBER-->
				                <!--STUDENT EMAIL-->
				                <div class="form-group row">
    								<label for="email" class="col-sm-3 col-form-label">Email</label>
    								<div class="col-sm-9">
      									<input type="email" class="form-control" id="email" name="Student_Email" required>
    								</div>
  								</div>
				                <!--/STUDENT EMAIL-->
				                <div class="form-group text-center mt-4">
				                    <button type="submit" name="RegisterStudent" id="register" class="btn btn-secondary btn-block" value="Register">Register</button>
				                </div>
				            </form>
				        </div>
				    </div>
				</div>
				<!--/STUDENT SECTION-->
			</div>
		</div>
			<!--/CONTENT NAV PILLS-->
	</div>
	<!--/CONTENT-->
<!--CHANGELOGO-->
<script>
    function changeLogoAndTitle() {
        logo = document.getElementById('navbar-brand-logo');
        logo.src = '';
        title = document.getElementById('tab-title');
        title.innerHTML = 'MyMerit | Registration';
    }
    changeLogoAndTitle();
</script>
<!--/CHANGELOGO-->
<!--FOOTER-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/html/footer/Footer.html'); ?>
<!--/FOOTER-->