<?php include "layout/upper_section.php";?>

            <div class="container-fluid">
             
            <h1 class="text-center">Borrow Management</h1>
                    <hr>

                    <form style="margin-left: 150px; margin-right: 150px;" method="POST" action="register.php">
                        <div class="form-group">
                            <label for="Book_ISBN_NoInput">Book ISBN No</label>
                            <input name="Book_ISBN_No" type="text" class="form-control" id="Book_ISBN_NoInput" placeholder="Enter Book ISBN No">
                        </div>
                        <div class="form-group">
                            <label for="StatusInput">Status</label>
                            <input name="Status" type="text" class="form-control" id="StatusInput" placeholder="Enter Status">
                        </div>
                        <div class="form-group">
                            <label for="Student_Nic_NoInput">Student Nic No</label>
                            <input name="Student_Nic_No" type="text" class="form-control" id="Student_Nic_NoInput" placeholder="Enter Student Nic No">
                        </div>
                        <div class="form-group">
                            <label for="Handover_DateInput">Handover Date</label>
                            <input name="Handover_Date" type="text" class="form-control" id="Handover DateInput" placeholder="Enter Handover Date">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <h1 class="text-center">Student Details</h1>
                    <hr>

                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Book ISBN No</th>
                                <th scope="col">Status</th>
                                <th scope="col">Student Nic</th>
                                <th scope="col">Handover Date</th>
                                <th scope="col">Returned</th>s
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Student records will go here -->
                        </tbody>
                    </table>

                    <a href="php_controllers/logout.php" class="btn btn-secondary">Logout</a>
                </div>
                
            
<?php include "layout/bottom_section.php";?>         