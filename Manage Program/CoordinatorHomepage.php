<?php
    include($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/connect/Connect.php'); //Connection to the database
    //SESSION
    $Coordinator_ID = $_SESSION['Coordinator_ID'];

    $query="SELECT * FROM activity" or die (mysqli_error());

    $result=mysqli_query($conn, $query);
    mysqli_store_result($conn);
?>
<!--HEADER-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/html/header/HeaderCoordinator.html'); ?>
<!--/HEADER-->
<!--NAVBAR-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/html/navbar/NavbarCoordinator.html'); ?>
<!--/NAVBAR-->
    <!--CONTENT-->
    <div class="container">
        <div class="card">
            <h2 class="card-header text-center" style="background-color: white;">
                <img src="/MyMerit/Resources/img/list.png" style="height: 60px; width: 60px;">  List of Programme
            </h2>
            <!--MAIN CONTENT-->
            <div class="card-body">
                <div class="container">
                    <table class="table table-bordered table-hover" id="list-programme">
                        <thead class="table table-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Programme Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($result as $row) {
                            ?>
                            <tr>
                                <td>
                                    <?=$row['Activity_ID'] ?>
                                </td>
                                <td>
                                    <?=$row['Activity_Name'] ?>
                                </td>
                                <td>
                                    <?=$row['Activity_Status'] ?>
                                </td>
                                <td>
                             <button class="btn" ><a href="RegisterProgram.php"><i class="fas fa-info-circle fa-2x" style="color: green;"></i></button>

                                <button class="btn" ><a href="RegisterProgram.php"><i class="fas fa-edit fa-2x" style="color: orange;"></i></button>
                                    
                                <button class="btn" ><a href="activity"><i class="fas fa-trash-alt fa-2x" style="color: red;"></i></button>
                                   

                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--MAIN CONTENT-->
        </div>
    </div>
    <!--/CONTENT-->
<!--ADD TABLE-->
<!--/ADD TABLE-->
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
                var imageData = document.getElementById('Proof_Activity');
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