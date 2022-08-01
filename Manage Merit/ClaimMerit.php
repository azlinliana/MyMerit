<?php
    include($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/connect/Connect.php');
    //SESSION
    $Student_ID = $_SESSION['Student_ID'];
?>

<!--HEADER-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/html/header/HeaderStudent.html'); ?>
<!--/HEADER-->
<!--NAVBAR-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/html/navbar/NavbarStudent.html'); ?>
<!--/NAVBAR-->
	<!--CONTENT-->
    <div class="container">
        <div class="row">
            TYPE CODE HERE FOR CLAIM MERIT
        </div>
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