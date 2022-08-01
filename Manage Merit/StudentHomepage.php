<?php
	include($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/connect/Connect.php');//Connection to the database
	//SESSION
	$Student_ID = $_SESSION['Student_ID'];

    $query = "SELECT * FROM activity";
    
    mysqli_query($conn, $query);

?>
<?php 
    $query = "SELECT SUM(Activity_TotalMerit) as total FROM activity";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $total = $row['total'];
?>

<!--HEADER-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/html/header/HeaderStudent.html'); ?>
<!--/HEADER-->
<!--NAVBAR-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/html/navbar/NavbarStudent.html'); ?>
<!--/NAVBAR-->
	<!--CONTENT-->
    <div class="container">
        <div class="card">
            <h2 class="card-header text-center" style="background-color: white;">
                <img src="/MyMerit/Resources/img/merit.png" style="height: 60px; width: 60px;">  List of Attended Programme
            </h2>
            <!--MAIN CONTENT-->
            <div class="card-body">
                <div class="container">
                    <table class="table table-bordered table-hover" id="attend-programme">
                        <thead class="table table-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Programme Name</th>
                                <th scope="col">Event Location</th>
                                <th scope="col">Position</th>
                                <th scope="col">Merit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($result as $row) {
                            ?>
                            <tr>
                                <td>
                                </td>
                                <td>
                                    <?=$row["Activity_Name"]?>
                                </td>
                                <td>
                                    <?=$row['Activity_Date']?>
                                </td>
                                <td>
                                    <?php echo $row["Activity_Event"] ?>
                                </td>
                                <td>
                                    <?php echo $row['Activity_TotalMerit'] ?>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    Total Merit: <?=$row['total']?>
                </div>
                <div class="right">
                    <input type="submit" value="Print Certificate">
                </div>
            </div>
            <!--MAIN CONTENT-->
        </div>
    </div>
            <!--MAIN CONTENT-->
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