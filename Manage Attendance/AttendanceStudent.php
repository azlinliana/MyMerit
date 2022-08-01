<?php
    include($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/connect/Connect.php');
    //Display from table activity //'$Activity_ID'
    $query="SELECT * FROM activity where Activity_ID=1" or die (mysqli_error());  
    $result=mysqli_query($conn, $query);
    mysqli_store_result($conn);

    //Insert into attendancestudent table
    if (isset($_POST['CheckedIn'])) {
        $geolocation = $_POST['$Attendee_Geolocation'];
        $ipaddress = $_POST['Attendee_IPAddress'];
        $action = $_POST['$Attendee_Action'];

        $query = "INSERT INTO attendancestudent(Attendance_ID, Attendee_Geolocation ,Attendee_IPAddress, Attendee_Action) VALUES('0', '$geolocation', '$ipaddress', '$action')";

        mysqli_query($conn, $query);
    }
    //GEOLOCATION
?>
<!--HEADER-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/html/header/HeaderAttendance.html'); ?>
<!--/HEADER-->
<!--NAVBAR-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/html/navbar/NavbarAttendance.html'); ?>
<!--/NAVBAR-->
    <!--CONTENT-->
    <div class="container">
        <h2 style="color: white; text-align: center;">In order to record your attendance, please click "Submit" and "Login" button</h2>
        <div class="card">
            <h2 class="card-header text-center">
                <img src="/MyMerit/Resources/img/attendance.png" style="height: 60px; width: 60px;">  Attendance Details (Student)
            </h2>
            <div class="card-body">
                <div class="row">
                    <!--PROGRAMME DETAILS-->
                    <?php
                        foreach ($result as $row) {
                    ?>
                    <div class="col-6 border-right">
                        <div class="row">
                            <!--TITLE: PROGRAMME DESCRIPTION-->
                            <div class="col-md-12"><h5><b>PROGRAMME DESCRIPTION:</b></h5></div>
                            <!--/TITLE: PROGRAMME DESCRIPTION-->
                            <div class="col-md-12">
                                <!--PROGRAMME NAME-->
                                <div class="">
                                    <div class="row">
                                        <div class="col-md-4"><b>Programme Name:</b></div>
                                        <div class="col-md-8"><?=$row['Activity_Name'] ?></div>
                                    </div>
                                </div><br>
                                <!--/PROGRAMME NAME-->
                                <!--PROGRAMME DAY-->
                                <div class="">
                                    <div class="row">
                                        <div class="col-md-4"><b>Programme Day:</b></div>
                                        <div class="col-md-8"><?=$row['Activity_Day'] ?></div>
                                    </div>
                                </div><br>
                                <!--/PROGRAMME DAY-->
                                <!--PROGRAMME DATE-->
                                <div class="">
                                    <div class="row">
                                        <div class="col-md-4"><b>Programme Date:</b></div>
                                        <div class="col-md-8"><?=$row['Activity_Date'] ?></div>
                                    </div>
                                </div><br>
                                <!--/PROGRAMME DATE-->
                                <!--PROGRAMME TIME-->
                                <div class="">
                                    <div class="row">
                                        <div class="col-md-4"><b>Programme Time:</b></div>
                                        <div class="col-md-8"><?=$row['Activity_Time'] ?></div>
                                    </div>
                                </div><br>
                                <!--/PROGRAMME TIME-->
                                <!--PROGRAMME EVENT-->
                                <div class="">
                                    <div class="row">
                                        <div class="col-md-4"><b>Programme Event:</b></div>
                                        <div class="col-md-8"><?=$row['Activity_Event'] ?></div>
                                    </div>
                                </div><br>
                                <!--/PROGRAMME EVENT-->
                                <!--SHOW POSITION ON MAP-->
                                <div class="">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <center><button type="button" class="btn btn-secondary" name="Map" onclick="getlocation1()">Show Position on Map</button>
                                            <br><br>
                                            <div id="demo1" style="width: 500px; height: 500px;"> 
                                            </div></center>
                                        </div>
                                    </div>
                                </div><br>
                                <!--/SHOW POSITION ON MAP-->
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                    <!--/PROGRAMME DETAILS-->
                    <!--ATTENDANCE DETAILS-->
                    <div class="col-6">
                        <div class="">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" method="post">
                                        <!--GEOLOCATION-->
                                        <div class="">
                                            <div class="row">
                                                <div class="col-md-4">Geolocation:</div>
                                                <div class="col-md-8">
                                                    <button type="button" class="btn btn-secondary"  name="Attendee_Geolocation" onclick="getLocation()">Show Latitude and Longitude</button>
                                                    <br><br>
                                                    <p id="demo" name="Attendee_Geolocation"></p>
                                                    <br>
                                                </div>
                                            </div>
                                        </div><br>
                                        <!--/GEOLOCATION-->
                                        <!--IP ADDRESS-->
                                        <div class="">
                                            <div class="row">
                                                <div class="col-md-4">IP Address:</div>
                                                <div class="col-md-8">
                                                    <input type="value" name="Attendee_IPAddress" value="<?php $IP_Address = getHostByName(getHostName()); echo $IP_Address; ?>">

                                                    <input type="text" name="Attendee_IPAddress2" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" disabled>
                                                    
                                                </div>
                                            </div>
                                        </div><br>
                                        <!--/IP ADDRESS-->
                                        <!--ACTION-->
                                        <div class="">
                                            <div class="row">
                                                <div class="col-md-4">Action:</div>
                                                <div class="col-md-8">
                                                    <input type="radio" name="Attendee_Action" value="Not Check In" required><label style="padding-left: 10px;"> Not Checked In</label><br>
                                                    <input type="radio" name="Attendee_Action" value="Check In" required><label style="padding-left: 10px;"> Checked In</label><br>
                                                    <small><b>Please choose "Checked In" to change your attendance status before click "Submit" button</b></small>
                                                </div>
                                            </div>
                                        </div><br>
                                        <!--/ACTION-->
                                        <div class="">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p align="right">
                                                        <button type="submit" class="btn btn-secondary" name="CheckedIn">Submit</button>
                                                    <!--BUTTON TO TRIGGER MODAL-->
                                                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">Login</button>
                                                    </p>
                                                    <!--BUTTON TO TRIGGER MODAL-->
                                                    <!--MODAL-->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                            </div>
                                                            <div class="modal-body" style="background-color: #99c5c4;">
                                                                <!--<form>-->
                                                                    <div class="form-group">
                                                                        <label for="Student_Username" class="col-form-label">Username:</label>
                                                                        <input type="text" class="form-control" id="username" name="Student_Username" placeholder="Insert your username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Insert your username'" style="border: 1px solid black;">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="message-text" class="col-form-label">Password:</label>
                                                                        <input type="password" class="form-control" id="password" name="Student_Password" placeholder="Insert your password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Insert your password'" style="border: 1px solid black;">
                                                                    </div>
                                                                <!--</form>-->
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" name="ConfirmAttendance" id="ConfirmAtendance" class="btn btn-secondary">Confirm Attendace</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/MODAL-->
                                                </div>
                                            </div>
                                        </div>
                                </form>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    </form>
                    <!--ATTENDANCE DETAILS-->
                </div>
            </div>
        </div>
    </div>
    <!--/CONTENT-->
<!--SHOW POSITION ON MAP-->
<script src="https://maps.google.com/maps/api/js?key=AIzaSyC6PGHjYS6_4fTEfC1b3FL-idBuVG1hwkE&sensor=true"> 
</script> 

<script type="text/javascript"> 
    function getlocation1(){ 
        if(navigator.geolocation){ 
            navigator.geolocation.getCurrentPosition(showLoc, errHand); 
            } 
        } 

    function showLoc(pos){ 
        latt = pos.coords.latitude; 
        long = pos.coords.longitude; 
        var lattlong = new google.maps.LatLng(latt, long); 
        var OPTions = { 
            center: lattlong, 
            zoom: 10, 
            mapTypeControl: true, 
            navigationControlOptions: {style:google.maps.NavigationControlStyle.SMALL} 
        } 
        var mapg = new google.maps.Map(document.getElementById("demo1"), OPTions); 
        var markerg =  new google.maps.Marker({position:lattlong, map:mapg, title:"You are here!"}); 
        } 
                                                      
    function errHand(err) { 
        switch(err.code) { 
        case err.PERMISSION_DENIED: 
        result.innerHTML = "The application doesn't have the permission"  +  "to make use of location services" 
            break; 
        case err.POSITION_UNAVAILABLE: 
        result.innerHTML = "The location of the device is uncertain" 
            break; 
        case err.TIMEOUT: 
        result.innerHTML = "The request to get user location timed out" 
            break; 
        case err.UNKNOWN_ERROR: 
        result.innerHTML = "Time to fetch location information exceeded"+ "the maximum timeout interval" 
            break; 
        } 
    } 
</script> 
<!--/SHOW POSITION ON MAP-->
<!--SHOW GEOLOCATION-->
<script>
    var x = document.getElementById("demo");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } 
        else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }   

    function showPosition(position) {
      x.innerHTML = "Latitude: " + position.coords.latitude + 
      "<br>Longitude: " + position.coords.longitude;
    }
</script>
<!--/SHOW GEOLOCATION-->
<!--CHANGELOGO-->
<script>
    function changeLogoAndTitle() {
        logo = document.getElementById('navbar-brand-logo');
        logo.src = '';
        title = document.getElementById('tab-title');
        title.innerHTML = 'MyMerit | Attendance';
    }
    changeLogoAndTitle();
</script>
<!--/CHANGELOGO-->
<!--FOOTER-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/html/footer/Footer.html'); ?>
<!--/FOOTER-->


