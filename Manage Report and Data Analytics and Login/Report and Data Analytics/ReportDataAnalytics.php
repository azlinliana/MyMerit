<!--HEADER-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/html/header/HeaderAdmin.html'); ?>
<!--/HEADER-->
<!--NAVBAR-->
<?php echo file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/MyMerit/Resources/html/navbar/NavbarAdmin.html'); ?>
<!--/NAVBAR-->
	<!--CONTENT-->
	<div class="container">
            <!--MAIN CONTENT-->
            <div class="card-body">
                <form action="AdminDashboard.php" method="post" enctype="multipart/form-data">
                    <h3>REPORT DATA ANALYTICS</h3>
                    <div class="row">
                        <!--ACTIVITY DETAILS-->
                            <div class="col-6">
                                <h3 style="padding: 3px; text-align: center; background-color: #99c5c4;" class="border border-dark">Program Details</h3>
                                <!--Activity Table-->
                                <div class="">
                                    <div class="row">
                                        <div class="container">
                                            <table class="table table-sm" style="text-align: center;" id="Program_Table">
                                                <span id="error"></span>
                                                
                                                <tbody>
												<?php
												if(($_SESSION['Admin_ID'])
												{
													$id = $_SESSION['Admin_ID']
													$sql = "SELECT Activity_Name, Activity_Date, Activity_Day, Activity_Time, Activity_Event, Activity_TotalMerit, No_Participants FROM activity";
												}
													if($result = mysqli_query($conn, $sql))
													{
														if(mysqli_num_rows($result) > 0 && $row = mysqli_fetch_array($result))
														{
                                                    echo "<table align='center' width='50%'>";
														echo "<tr>";
															echo "<th>Program Name</th>" . "<td>" . $row['Activity_Name'] . "</td>";
                                                        echo "<tr>";
															echo "<th>Program Date</th>" . "<td>" . $row['Activity_Date'] . "</td>";
														echo "<tr>";
															echo "<th>Program Day</th>" . "<td>" . $row['Activity_Day'] . "</td>";
														echo "<tr>";
															echo "<th>Program Time</th>" . "<td>" . $row['Activity_Time'] . "</td>";
														echo "<tr>";
															echo "<th>Program Event</th>" . "<td>" . $row['Activity_Event'] . "</td>";
														echo "<tr>";
															echo "<th>Program Total Merit</th>" . "<td>" . $row['Activity_TotalMerit'] . "</td>";
														echo "<tr>";
															echo "<th>Expected Number of Participants</th>" . "<td>" . $row['No_Participants'] . "</td>";
                                                        echo "</tr>";
													echo "</table>";
													mysqli_free_result($result);
														} 
												else
													{
														echo "No records matching your query were found.";
													}
												} 	
												else
													{
														echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
													}

												mysqli_close($conn);
												?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div><br>
                            </div>
                            <!--ACTIVITY DETAILS-->
							<!--COMMITTEE DETAILS-->
                            <div class="col-6">
                                <h3 style="padding: 3px; text-align: center; background-color: #99c5c4;" class="border border-dark">Committee Details</h3>
                                <!--Committee Table-->
                                <div class="">
                                    <div class="row">
                                        <div class="container">
                                            <table class="table table-sm" style="text-align: center;" id="Committee_Table">
                                                <span id="error"></span>
                                                
                                                <tbody>
                                                    <tr>
                                                        <td></td>
														<?php
														if(($_SESSION['Admin_ID']);
															{
															$id = $_SESSION['Admin_ID'];
															$sql = "SELECT Committee_Name, Committee_PhoneNo, Committee_Position FROM committee";
															}
															if($result = mysqli_query($conn, $sql))
																{
																if(mysqli_num_rows($result) > 0 && $row = mysqli_fetch_array($result))
																{
														echo "<table align='center' width='50%'>";
                                                        echo "<tr>";
															echo "<th>Committee Name</th>" . "<td>" . $row['Committee_Name'] . "</td>";
														echo "<tr>";
															echo "<th>Committee Phone No</th>" . "<td>" . $row['Committee_PhoneNo'] . "</td>";
														echo "<tr>";
															echo "<th>Position</th>" . "<td>" . $row['Committee_Position'] . "</td>";
														echo "</tr>";
														echo "</table>";
														mysqli_free_result($result);
																} 
														else
															{
															echo "No records matching your query were found.";
															}
																} 	
																else
																	{
																		echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
																	}

														mysqli_close($conn);
														?>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div><br>
                                <p align="right">
                                    <input type="submit" name="ReportDataAnalytics" value="Done">
                                </p>
                            </div>
                            <!--COMMITTEE DETAILS-->

                        </div>
                </form>
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