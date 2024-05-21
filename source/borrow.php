<?php include "layout/upper_section.php";?>

            <div class="container-fluid">
             
            <h1 class="text-center">Students Management</h1>
                    <hr>

                    <form style="margin-left: 150px; margin-right: 150px;" action="php_controllers/register.php" method="post">
                        <div class="form-group">
                            <label for="nicInput"> Student NIC No</label>
                            <input name="Student_NIC_No" type="text" class="form-control" id="Student_NIC_NoInput" placeholder="Enter Student NIC No">
                        </div>
                        <div class="form-group">
                            <label for="BookNameInput">Book Name</label>
                            <input name="Book_name" type="text" class="form-control" id="Book_NameInput" placeholder="Enter Book Name">
                        </div>
                        <div class="form-group">
                            <label for="BookNameInput">ISBN No</label>
                            <input name="Book_name" type="text" class="form-control" id="Book_NameInput" placeholder="Enter Book Name">
                        </div>
                        <div class="form-group">
                            <label for="GenresInput">Genres</label>
                            <input name="Genres" type="text" class="form-control" id="GenresInput" placeholder="Enter Genres">
                        </div>
                        <div class="form-group">
                            <label for="AutherInput">Auther</label>
                            <input name="Auther" type="email" class="form-control" id="AutherInput" placeholder="Enter Auther">
                        </div>
                        <div class="form-group">
                            <label for="PriceInput">Price</label>
                            <input name="Price" type="text" class="form-control" id="PriceInput" placeholder="Enter Book Price">
                        </div>
                        <div class="form-group">
                            <label for="Release_DateInput">Release Date</label>
                            <input name="Release_Date" type="text" class="form-control" id="Release_Date" placeholder="Enter Release Date">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <h1 class="text-center">Student Details</h1>
                    <hr>

                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Student NIC No</th>
                                <th scope="col">Book Name</th>
                                <th scope="col">ISBN No</th>
                                <th scope="col">Auther</th>
                                <th scope="col">Genres</th>
                                <th scope="col">Price</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Release Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Student records will go here -->
                        </tbody>
                    </table>

                    <a href="php_controllers/logout.php" class="btn btn-secondary">Logout</a>
                </div>
                
            
<?php include "layout/bottom_section.php";?>         