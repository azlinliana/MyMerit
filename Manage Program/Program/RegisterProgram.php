<?php
    include($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/connect/Connect.php');

    //SESSION
    $Coordinator_ID = $_SESSION['Coordinator_ID'];

    if (isset($_POST['RegisterProgram'])) {
        //INPUT FROM COORDINATOR FOR TABLE ACTIVITY
        $activityname = $_POST['Activity_Name'];
        $activitydate = $_POST['Activity_Date'];
        $activityday = $_POST['Activity_Day'];
        $activitytime = $_POST['Activity_Time'];
        $activityevent = $_POST['Activity_Event'];
        $activitytotalmerit = $_POST['Activity_TotalMerit'];
        $noparticipants = $_POST['No_Participants'];
        $activityproof = $_POST['Activity_Proof'];
    
        $query = "INSERT INTO activity(Activity_Name, Activity_Date, Activity_Day, Activity_Time, Activity_Event, Activity_TotalMerit, No_Participants, Activity_Proof, Activity_Status) VALUES('$activityname', '$activitydate', '$activityday', '$activitytime', '$activityevent', '$activitytotalmerit', '$noparticipants', '$activityproof', 'Not Approved')";

        mysqli_query($conn, $query);
            
        $activityid=mysqli_insert_id($conn);

        //INPUT FROM COORDINATOR FOR TABLE COMMITTEE
        for ($i=0; $i < count($_POST["Committee_Name"]) ; $i++) { 
            $committeename = $_POST['Committee_Name'][$i];
            $committeephoneno = $_POST['Committee_PhoneNo'][$i];
            $committeeposition = $_POST['Committee_Position'][$i];

            $query = "INSERT INTO committee(Committee_Name, Committee_PhoneNo, Committee_Position, Activity_ID) VALUES('$committeename', '$committeephoneno', '$committeeposition', '$activityid')";

            mysqli_query($conn, $query);
        }
    }
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
                <img src="/MyMerit/Resources/img/event.png" style="height: 60px; width: 60px;">  Apply Programme
            </h2>
            <!--MAIN CONTENT-->
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <h3>Please fill in information for program and committee below:</h3>
                    <div class="row">
                        <!--PROGRAMME DETAILS-->
                        <div class="col-6 border-right">
                            <h3 style="padding: 3px; text-align: center; background-color: #99c5c4;" class="border border-dark">Programme Details</h3>
                            <!--Programme Name-->
                            <div class="">
                                <div class="row">
                                    <div class="col-md-3">Programme Name:</div>
                                    <div class="col-md-9 ">
                                        <input type="text" name="Activity_Name" required>
                                    </div>
                                </div>
                            </div><br>
                            <!--/Programme Name-->
                            <!--Program Date-->
                            <div class="">
                                <div class="row">
                                    <div class="col-md-3">Programme Date:</div>
                                    <div class="col-md-9">
                                        <input type="date" name="Activity_Date" required>
                                    </div>
                                </div>
                            </div><br>
                            <!--/Programme Date-->
                            <!--Program Day-->
                            <div class="">
                                <div class="row">
                                    <div class="col-md-3">Programme Day:</div>
                                    <div class="col-md-9">
                                        <input type="day" name="Activity_Day" required>
                                    </div>
                                </div>
                            </div><br>
                            <!--/Programme Day-->
                            <!--Program Time-->
                            <div class="">
                                <div class="row">
                                    <div class="col-md-3">Programme Time:</div>
                                    <div class="col-md-9">
                                        <input type="time" name="Activity_Time" required>
                                    </div>
                                </div>
                            </div><br>
                            <!--/Programme Time-->
                            <!--Program Event-->
                            <div class="">
                                <div class="row">
                                    <div class="col-md-3">Programme Event:</div>
                                    <div class="col-md-9">
                                        <input type="text" name="Activity_Event" required>
                                    </div>
                                </div>
                            </div><br>
                            <!--/Programme Event-->
                            <!--Program Total Merit-->
                                <div class="">
                                    <div class="row">
                                        <div class="col-md-3">Programme Total Merit:</div>
                                        <div class="col-md-9">
                                            <input type="number" name="Activity_TotalMerit" required>
                                    </div>
                                    </div>
                                </div><br>
                            <!--/Programme Total Merit-->
                            <!--Expected Number of Participants-->
                                <div class="">
                                    <div class="row">
                                        <div class="col-md-3">Expected Number of Participants:</div>
                                        <div class="col-md-9">
                                            <input type="number" name="No_Participants" required>
                                        </div>
                                    </div>
                                </div><br>
                            <!--/Expected Number of Participants-->
                            <!--Proof of Activity-->
                                <div class="">
                                    <div class="row">
                                        <div class="col-md-4">Proof of Activity:</div>
                                        <div class="col-md-9">
                                            <input type="file" accept="image/*" onchange="loadFile(event)">
                                            <input type="text" name="Activity_Proof" id="Activity_Proof" hidden>
                                            <p id="no-photo">No File Selected</p>
                                            <img style="width: 200px;" id="preview-img" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div><br>
                            <!--/Proof of Activity-->
                            </div>
                            <!--/PROGRAMME DETAILS-->
                            <!--COMMUNITY DETAILS-->
                            <div class="col-6">
                                <h3 style="padding: 3px; text-align: center; background-color: #99c5c4;" class="border border-dark">Committee Details</h3>
                                <!--Committee Table-->
                                <div class="">
                                    <div class="row">
                                        <div class="container">
                                            <table class="table table-sm" style="text-align: center;" id="Committee_Table">
                                                <span id="error"></span>
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Committee Name</th>
                                                        <th scope="col">Phone Number</th>
                                                        <th scope="col">Position</th>
                                                        <th scope="col">
                                                            <a href="javascript:void(0);" style="font-size:18px;" id="addMore" title="Add More Person"><i class="fas fa-plus-square"></i></a>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td><input type="text" name="Committee_Name[]" class="form-control"></td>
                                                        <td><input type="text" name="Committee_PhoneNo[]" class="form-control"></td>
                                                        <td>
                                                            <select name="Committee_Position[]" class="form-control">
                                                                <option value="Program Chair" selected>Program Chair</option>
                                                                <option value="Program Co-Chair" selected>Program Co-Chair</option>
                                                                <option value="Main Committee" selected>Main Committee</option>
                                                                <option value="Sub Committee" selected>Sub Committee</option>
                                                            </select>
                                                        </td>
                                                        <td><a href='javascript:void(0);'  class='remove'><i class="fas fa-minus-square"></i></a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div><br>
                                <p align="right">
                                    <input type="submit" name="RegisterProgram" value="Register Program">
                                </p>
                            </div>
                            <!--COMMUNITY DETAILS-->
                        </div>
                </form>
            </div>
            <!--MAIN CONTENT-->
        </div>
    </div>
    <!--/CONTENT-->
<!--ADD & DELETE TABLE-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    $(function(){
        $('#addMore').on('click', function() {
                  var data = $("#Committee_Table tr:eq(1)").clone(true).appendTo("#Committee_Table");
                  data.find("input").val('');
        });
        $(document).on('click', '.remove', function() {
             var trIndex = $(this).closest("tr").index();
                if(trIndex>0) {
                    $(this).closest("tr").remove();
                } 
                else {
                    alert("Sorry!!! Cannot remove first row!");
               }
        });
    });      
</script>
<!--/ADD & DELETE TABLE-->
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
                var imageData = document.getElementById('Activity_Proof');
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