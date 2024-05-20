<?php include "layout/upper_section.php";?>

            <div class="container-fluid">
             
            <h1 class="text-center">Students Management</h1>
                    <hr>

                    <form style="margin-left: 150px; margin-right: 150px;" action="php_controllers/register.php" method="post">
                        <div class="form-group">
                            <label for="nicInput">NIC No</label>
                            <input name="nic" type="text" class="form-control" id="nicInput" placeholder="Enter NIC No">
                        </div>
                        <div class="form-group">
                            <label for="BookNameInput">Book Name</label>
                            <input name="Book_name" type="text" class="form-control" id="studentNameInput" placeholder="Enter Student Name">
                        </div>
                        <div class="form-group">
                            <label for="priceInput">Price</label>
                            <input name="price" type="text" class="form-control" id="gradeInput" placeholder="Enter Grade">
                        </div>
                        <div class="form-group">
                            <label for="ReleaseDateInput">Release Date</label>
                            <input name="Release_Date" type="email" class="form-control" id="emailInput" placeholder="Enter E-mail Address">
                        </div>
                        <div class="form-group">
                            <label for="mobileInput">Mobile No</label>
                            <input name="mobile" type="text" class="form-control" id="mobileInput" placeholder="Enter Mobile No">
                        </div>
                        <div class="form-group">
                            <label for="genderInput">Gender</label>
                            <input name="gender" type="text" class="form-control" id="genderInput" placeholder="Enter Gender">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <h1 class="text-center">Student Details</h1>
                    <hr>

                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Book Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Release Date</th>
                                <th scope="col">Mobile No</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Student records will go here -->
                        </tbody>
                    </table>

                    <a href="php_controllers/logout.php" class="btn btn-secondary">Logout</a>
                </div>
                
            
<?php include "layout/bottom_section.php";?>         