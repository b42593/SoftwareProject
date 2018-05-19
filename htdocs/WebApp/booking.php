<!--
    http://localhost:8084/WebApp/booking.php
    http://getbootstrap.com/docs/4.1/components/forms/
-->


    <?php
        session_start();

        //if submit_btn was pressed
        if (isset($_POST['submit_btn'])) {
            $tableNO = $_POST['tableNO'];
            $people = $_POST['people'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $customerID = $_SESSION['customerID'];

            if (empty($tableNO) || empty($people) || empty($date) || empty($time)) {
                echo "<div class=\"alert alert-warning\"> You need to enter information in all fields to proceed</div>";
            }
            else {
                $link = mysqli_connect("localhost", "root", "", "booking", 3307);
                if (mysqli_connect_errno()) {
                    echo "<div class=\"alert alert-error\">Error connecting to DB...".mysqli_connect_error()."</div>";
                    exit;
                }

                //create insert statement
                $statement = "INSERT INTO booking (tableNO, people, date, time, customerID) VALUES('$tableNO', '$people', '$date', '$time', '$customerID')";
                //send statement to mysql
                $result = mysqli_query($link, $statement);

                //check if 1 row was added...
                if (mysqli_affected_rows($link) == 1) {
                    echo "<div class=\"alert alert-success\">Thank you! You are now booked!</div>";
                }
                else {
                    echo "<div class=\"alert alert-warning\">Oops! Something went wrong!</div>";
                }
            }
        }
    ?>
<?php include("menu.php"); ?>
    <div class="jumbotron container">
        <center><h1 class="display-3">Booking - Book yourself a table</h1><br/></center>
        <form action="booking.php" method="post">
            <div class="form-group">
                <label for="tableNO">Table Number</label>
                <input type="number" min="1" max="10" class="form-control" name="tableNO" id="tableNO" placeholder="Enter desired table number">
            </div>
            <div class="form-group">
                <label for="people">Number of People</label>
                <input type="number" min="1" max="10" class="form-control" name="people" id="people" placeholder="Enter number of people to book for a table">
            </div>
             <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" name="date" id="date" placeholder="Enter the desired booking date">
            </div>
            <div class="form-group">
                <label for="time">Time</label>
                <input type="time" class="form-control" name="time" id="time" placeholder="Enter the desired time to set the booking">
            </div>
            <center><button type="submit" name="submit_btn" class="btn btn-primary">Submit</button></center>    
        </form>

    </div>

<?php include("footer.php"); ?>