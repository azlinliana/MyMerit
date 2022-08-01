<?php
    include($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/connect/Connect.php'); //Connection to database
    //SESSION
    $Admin_ID = $_SESSION['Admin_ID'];

    $query="SELECT * FROM activity" or die (mysqli_error());

    $result=mysqli_query($conn, $query);
    mysqli_store_result($conn);

    if (isset($_POST['ApproveProgram'])) {
        
    }

?>
<!--HEADER-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/html/header/HeaderAdmin.html'); ?>
<!--/HEADER-->
<!--NAVBAR-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/html/navbar/NavbarAdmin.html'); ?>
<!--/NAVBAR-->
    <!--CONTENT-->
    <div class="container">
        <div class="row">
            <div class="card-body">
                <div class="container">
                    <table class="table table-bordered table-hover" id="view-program-admin">
                        <thead class="table table-dark">
                            <tr>
                                <th scope="col">Activity ID</th>
                                <th scope="col">Activity Name</th>
                                <th scope="col">Activity Date</th>
                                <th scope="col">Activity Day</th>
                                <th scope="col">Activity Time</th>
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
                                    <?=$row['Activity_Date'] ?>
                                </td>
                                <td>
                                    <?=$row['Activity_Day'] ?>
                                </td>
                                <td>
                                    <?=$row['Activity_Time'] ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success" name="ApproveProgram" data-toggle="modal" data-target="#exampleModal">Approve</button>
                                    <button type="button" class="btn btn-warning">Reject</button>
                                </td>

                                <!--MODAL-->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Give QR Code</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body" style="background-color: #99c5c4;">
                                            <form>
                                            <div class="form-group">
                                                <label>QR Code for Student:</label><br>

                                                Link for Attendance:<input type="text" name="QR_Website_Student">
                                                <input type="file" accept="image/*" onchange="loadFile(event)">
                                                <input type="text" name="QR_Code_Student" id="QR" hidden>
                                                <p id="no-photo">No File Selected</p>
                                                <img style="width: 200px;" id="preview-img1" class="img-fluid" alt=""><br>

                                                Link for Attendance:<input type="text" name="QR_Website_Committee">
                                                <label>QR Code for Comittee:</label><br>
                                                <input type="file" accept="image/*" onchange="loadFile(event)">
                                                <input type="text" name="QR_Code_Committee" id="QR_Code_Committee" hidden>
                                                <p id="no-photo">No File Selected</p>
                                                <img style="width: 200px;" id="preview-img2" class="img-fluid" alt="">
                                                
                                            
                                            </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" name="GiveQR" id="ConfirmAtendance" class="btn btn-secondary">Confirm Attendace</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/MODAL-->
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/CONTENT-->
<!--UPLOAD IMAGE-->
<script>
    var loadFile = function(event) {
        var reader = new FileReader();
            reader.onload = function() {
                //Preview
                var output = document.getElementById('preview-img1');
                document.getElementById('no-photo').innerHTML = "";
                output.src = reader.result;
                //Pipe base64 to database
                var imageData = document.getElementById('QR_Code_Student');
                imageData.value = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>
<script>
    var loadFile = function(event) {
        var reader = new FileReader();
            reader.onload = function() {
                //Preview
                var output = document.getElementById('preview-img2');
                document.getElementById('no-photo').innerHTML = "";
                output.src = reader.result;
                //Pipe base64 to database
                var imageData = document.getElementById('QR_Code_Committee');
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