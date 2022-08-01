<!--HEADER-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/html/header/HeaderQR.html'); ?>
<!--/HEADER-->
<!--NAVBAR-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/html/navbar/NavbarCoordinator.html'); ?>
<!--/NAVBAR-->

<!-- IF USING IE -->
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js">
</script>
<!-- END USING IE -->

    <!--CONTENT-->
    <div class="container">
        <div class="card">
            <h2 class="card-header text-center" style="background-color: white;">
                <img src="/MyMerit/Resources/img/attendance.png" style="height: 60px; width: 60px;">  Scan QRCode
            </h2>
            <body>
            <p>Please Scan This QR CODE for Committee</p>
        <img style="display: block; margin-left: auto; margin-right: auto;" src="https://chart.apis.google.com/chart?chs=400x400&cht=qr&chl=http://localhost/MyMerit/Manage%20Attendance/AttendanceCommittee.php?event=10&choe=UTF-8">
            <br><br>
            <p>Please Scan This QR CODE for Participant</p>
        <img style="display: block; margin-left: auto; margin-right: auto;" src="https://chart.apis.google.com/chart?chs=400x400&cht=qr&chl=http://localhost/MyMerit/Manage%20Attendance/AttendanceStudent.php?event=10&choe=UTF-8">
            
            </body>

<script>
    var qrdata = document.getElementById('qr-data');
    var qrcode = new QRCode(document.getElementById('qrcode'));


    function generateQR()
    {
        var data = qrdata.value;
        qrcode.makeCode(data)
    }

</script>
        </div>
    </div>

    <!--/CONTENT-->
<!--ADD TABLE-->
<!--/ADD TABLE-->
<!--UPLOAD IMAGE-->
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

<!-- BOOTSTRAP JAVASCRIPT -->
<script src="https://code.jquery.com/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/custom.js">
</script>
<!-- END BOOTSTRAP JAVASCRIPT -->

<!--FOOTER-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/html/footer/Footer.html'); ?>
<!--/FOOTER-->