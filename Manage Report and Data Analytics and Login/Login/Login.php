<?php
	include($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/connect/Connect.php');
	
	//LOGIN ADMIN
	if (isset($_POST['LoginAdmin'])) {
		$adminusername = $_POST['Admin_Username'];
		$adminpassword = $_POST['Admin_Password'];

		$query="SELECT * FROM administrator where Admin_Username='$adminusername' AND Admin_Password='$adminpassword'" or die (mysqli_error());

		$result=mysqli_query($conn, $query);
		mysqli_store_result($conn);
		$count_row=mysqli_num_rows($result);
		$row=mysqli_fetch_array($result);

		if ($count_row > 0) {
		    session_start();
		    $_SESSION['Admin_ID']=$row['Admin_ID'];
		    header("Location: /MyMerit/Manage Report and Data Analytics and Login/AdminDashboard.php");
		}
	}
	else if (isset($_REQUEST['LoginCoordinator'])) {
		$coordinatorusername = $_POST['Coordinator_Username'];
		$coordinatorpassword = $_POST['Coordinator_Password'];

		$query="SELECT * FROM coordinator where Coordinator_Username='$coordinatorusername' AND Coordinator_Password='$coordinatorpassword'" or die (mysqli_error());

		$result=mysqli_query($conn, $query);
		mysqli_store_result($conn);
		$count_row=mysqli_num_rows($result);
		$row=mysqli_fetch_array($result);

		if ($count_row > 0) {
		    session_start();
		    $_SESSION['Coordinator_ID']=$row['Coordinator_ID'];
		    header("Location: /MyMerit/Manage Program/CoordinatorHomepage.php");
		}
	}
	else if (isset($_REQUEST['LoginStudent'])) {
		$studentusername = $_POST['Student_Username'];
		$studentpassword = $_POST['Student_Password'];

		$query="SELECT * FROM student where Student_Username='$studentusername' AND Student_Password='$studentpassword'" or die (mysqli_error());

		$result=mysqli_query($conn, $query);
		mysqli_store_result($conn);
		$count_row=mysqli_num_rows($result);
		$row=mysqli_fetch_array($result);

		if ($count_row > 0) {
		    session_start();
		    $_SESSION['Student_ID']=$row['Student_ID'];
		    header("Location: /MyMerit/Manage Merit/StudentHomepage.php");
		}
	}
?>
<!--HEADER-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/html/header/HeaderLogin.html'); ?>
<!--/HEADER-->
<!--NAVBAR-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/html/navbar/NavbarLogin.html'); ?>
<!--/NAVBAR-->
	<!--CONTENT-->
	<center><img src="/MyMerit/Resources/img/UMP.png" style="height: 150px; width: 300px;"></center>
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
				                <div class="pt-3 form outline mt-0">
				                    <input type="text" class="form-control" id="username" name="Admin_Username" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" style="border: 1px solid black;">
				                </div>
				                <!--/ADMIN USERNAME-->
				                <!--ADMIN PASSWORD-->
				                <div class="pt-3 form outline mt-0">
				                    <input type="password" class="form-control" id="password" name="Admin_Password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" style="border: 1px solid black;">
				                </div>
				                <!--ADMIN PASSWORD-->
				                <div class="form-group text-center mt-4">
				                    <button type="submit" name="LoginAdmin" id="login" class="btn btn-secondary btn-block" value="Login">Login</button>
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
				                <div class="pt-3 form outline mt-0">
				                    <input type="text" class="form-control" id="username" name="Coordinator_Username" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" style="border: 1px solid black;">
				                </div>
				                <!--/COORDINATOR USERNAME-->
				                <!--COORDINATOR PASSWORD-->
				                <div class="pt-3 form outline mt-0">
				                    <input type="password" class="form-control" id="password" name="Coordinator_Password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" style="border: 1px solid black;">
				                </div>
				                <!--COORDINATOR PASSWORD-->
				                <div class="form-group text-center mt-4">
				                    <button type="submit" name="LoginCoordinator" id="login" class="btn btn-secondary btn-block" value="Login">Login</button>
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
				                <div class="pt-3 form outline mt-0">
				                    <input type="text" class="form-control" id="username" name="Student_Username" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" style="border: 1px solid black;">
				                </div>
				                <!--/STUDENT USERNAME-->
				                <!--STUDENT PASSWORD-->
				                <div class="pt-3 form outline mt-0">
				                    <input type="password" class="form-control" id="password" name="Student_Password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" style="border: 1px solid black;">
				                </div>
				                <!--STUDENT PASSWORD-->
				                <div class="form-group text-center mt-4">
				                    <button type="submit" name="LoginStudent" id="login" class="btn btn-secondary btn-block" value="Login">Login</button>
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
        title.innerHTML = 'MyMerit | Login';
    }
    changeLogoAndTitle();
</script>
<!--/CHANGELOGO-->
<!--FOOTER-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/html/footer/Footer.html'); ?>
<!--/FOOTER-->