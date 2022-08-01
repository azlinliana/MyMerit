<?php
	include($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/connect/Connect.php');
	//LOGIN SESSION
	$Admin_ID = $_SESSION['Admin_ID'];

	$query="SELECT * FROM administrator where Admin_ID='$Admin_ID'" or die (mysqli_error());

	$result=mysqli_query($conn, $query);
	mysqli_store_result($conn);
?>
<!--HEADER-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/html/header/HeaderAdmin.html'); ?>
<!--/HEADER-->
<!--NAVBAR-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/html/navbar/NavbarAdmin.html'); ?>
<!--/NAVBAR-->
	<!--CONTENT-->
	<?php
        foreach ($result as $row) {
    ?>
	<div class="wrapper">
		<div class="row">
			<!--SIDEBAR-->
			<div class="col-2 m-1 border-right-dark" style="border-right: 2px solid black; position: relative;">
				<div class="card" style="width: 16rem; border: none;">
					<img src="/MyMerit/Resources/img/avatar4.png" class="card-img-top" alt="..."><br>
					<div class="card-header">
						<center><h4><b>@<?=$row['Admin_Username'] ?></b></h4></center>
					</div>
					<div class="card-body">
						<!--DASHBOARD-->
						<div class="col-md-12">
							<div class="row">
								<a class="btn btn-lg" href="#"><i class="fas fa-house-user"></i> Dashboard</a>
							</div>
						</div>
						<!--/DASHBOARD-->
						<!--PROFILE-->
						<div class="col-md-12">
							<div class="row">
								<a class="btn btn-lg" href="/MyMerit/Manage User/User Profile/AdminProfile.php"><i class="fas fa-id-card-alt"></i> Profile</a>
							</div>
						</div>
						<!--/PROFILE-->
						<!--PROGRAMME APPROVAL-->
						<div class="col-md-12">
							<div class="row">
								<a class="btn btn-lg" href="/MyMerit/Manage Program/Approval/ApproveProgram.php"><i class="fas fa-clipboard-check"></i> Approve</a>
							</div>
						</div>
						<!--/PROGRAMME APPROVAL-->
						<!--STUDENT LIST-->
						<div class="col-md-12">
							<div class="row">
								<a class="btn btn-lg" href="#"><i class="fas fa-user-graduate"></i> Student</a>
							</div>
						</div>
						<!--/STUDENT LIST-->
						<!--COORDINATOR LIST-->
						<div class="col-md-12">
							<div class="row">
								<a class="btn btn-lg" href="#"><i class="fas fa-book-reader"></i> Coordinator</a>
							</div>
						</div>
						<!--/COORDINATOR LIST-->
						<!--COORDINATOR LIST-->
						<div class="col-md-12">
							<div class="row">
								<a class="btn btn-lg" href="#"><i class="fas fa-chart-line"></i> Report and Analytics</a>
							</div>
						</div>
						<!--/COORDINATOR LIST-->
					</div>
				</div>
			</div>
			<!--/SIDEBAR-->
			<!--MAIN-->
			<div class="col-9">
				Start Write Code for View Dashboard of Admin
			</div>
			<!--/MAIN-->
		</div>
	</div>
	<?php
        }
    ?>
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