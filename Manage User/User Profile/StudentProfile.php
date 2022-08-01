<!--HEADER-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/html/header/HeaderStudent.html'); ?>
<!--/HEADER-->
<!--NAVBAR-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/html/navbar/NavbarStudent.html'); ?>
<!--/NAVBAR-->
	<!--CONTENT-->
	<?php
		include($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/connect/Connect.php');

		//$result = mysqli_query($conn,"SELECT * FROM administrator");

	?>
	<form action="" method="post">
		<div class="container">
			<div class="row">
				<div class="col-3">
					<div class="card">
						<img src="/MyMerit/Resources/img/avatar3.png" class="card-img-top img-fluid" alt="..." id="preview-img"><br>
						<div class="card-header">
							<h5>@STUDENT_USERNAME</h5>
						</div>
						<div class="card-body">
							<a class="btn btn-lg" href="/MyMerit/Manage Merit/StudentHomepage.php"><i class="fas fa-house-user"></i> Home</a>
						</div>
					</div>
				</div>
				<div class="col-9">
						<div class="card border">
							<div class="card-header"><h4>Edit Profile<h4></div>
							<div class="card-body">
								<!--USERNAME SECTION-->
								<div class="">
									<div class="row">
										<div class="col-md-3">
											<h5>Username:</h5>
										</div>
										<div class="col-md-9">
											<input type="text" name="Student_Username" class="form control">
										</div>
									</div>
								</div><br>
								<!--/USERNAME SECTION-->
								<!--PASSWORD SECTION-->
								<div class="">
									<div class="row">
										<div class="col-md-3">
											<h5>Password:</h5>
										</div>
										<div class="col-md-9">
											<input type="password" name="Student_Password" class="form control">
										</div>
									</div>
								</div><br>
								<!--/PASSWORD SECTION-->
								<!--NAME SECTION-->
								<div class="">
									<div class="row">
										<div class="col-md-3">
											<h5>Name:</h5>
										</div>
										<div class="col-md-9">
											<input type="text" name="Student_Name" class="form control">
										</div>
									</div>
								</div><br>
								<!--/NAME SECTION-->
								<!--PHONE NUMBER SECTION-->
								<div class="">
									<div class="row">
										<div class="col-md-3">
											<h5>Phone Number:</h5>
										</div>
										<div class="col-md-9">
											<input type="text" name="Student_PhoneNo" class="form control">
										</div>
									</div>
								</div><br>
								<!--/PHONE NUMBER SECTION-->
								<!--EMAIL SECTION-->
								<div class="">
									<div class="row">
										<div class="col-md-3">
											<h5>Email:</h5>
										</div>
										<div class="col-md-9">
											<input type="email" name="Student_Email" class="form control">
										</div>
									</div>
								</div><br>
								<!--/EMAIL SECTION-->
								<!--PROFILE PICTURE SECTION-->
								<div class="">
									<div class="row">
										<div class="col-md-3">
											<h5>Profile Picture:</h5>
										</div>
										<div class="col-md-9">
											<input type="file" accept="image/*" onchange="loadFile(event)">
                                            <input type="text" name="Student_Profile" id="Student_Profile" hidden>
                                            <p id="no-photo">No File Selected</p>
										</div>
									</div>
								</div><br>
								<!--/PROFLE PICTURE SECTION-->
							</div>
							<button type="button" class="btn btn-warning m-1" style="width: 15%;" name="UpdateProfile">Update Profile</button>
							<br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!--/CONTENT-->
<!--UPLOAD IMAGE-->
<script>
    var loadFile = function(event) {
        var reader = new FileReader();
            reader.onload = function() {
                //Preview
                var output = document.getElementById('preview-img');
                document.getElementById('no-photo').innerHTML = "";
                output.src = reader.result;
                //Pipe base64 to database
                var imageData = document.getElementById('Student_Profile');
                imageData.value = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>
<!--/UPLOAD IMAGE-->
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