<?php
    include_once "db_functions.php";

    if (isset($_REQUEST['table'])) {
        $table=$_REQUEST['table'];

        if (true) { // $table=='users'
            
            // the array to be returned
            $arr = array();
            $arrCampus = array();
            $arrMajor = array();
            $arrYear = array();

            $conn = connectDB();

            $sql = "SELECT Campus, COUNT(*) AS cntCampus FROM Users GROUP BY Campus";
            $result = $conn->query($sql);
            if ($result) {
                while ( $row = mysqli_fetch_assoc($result) ) {
                    $arrCampus[$row['Campus']] = $row['cntCampus'];
                }
            } else {
                $msg = "Error grouping by campus" . $sql . "<br>" . $conn->error;
            }

            $sql = "SELECT Major, COUNT(*) AS cntMajor FROM Users GROUP BY Major";
            $result = $conn->query($sql);
            if ($result) {
                while ( $row = mysqli_fetch_assoc($result) ) {
                    $arrMajor[$row['Major']] = $row['cntMajor'];
                }
            } else {
                $msg = "Error grouping by major" . $sql . "<br>" . $conn->error;
            }
            
            $sql = "SELECT Year, COUNT(*) AS cntYear FROM Users GROUP BY Year";
            $result = $conn->query($sql);
            if ($result) {
                while ( $row = mysqli_fetch_assoc($result) ) {
                    $arrYear[$row['Year']] = $row['cntYear'];
                }
            } else {
                $msg = "Error grouping by year" . $sql . "<br>" . $conn->error;
            }

            $arr['Campus'] = $arrCampus;
            $arr['Major'] = $arrMajor;
            $arr['Year'] = $arrYear;

            $json=urldecode(json_encode($arr)) ;
            
            echo $json;
            $conn->close();
        }

    }
    // echo "<script>console.log('$msg');</script>";

?>