<?php
    include_once "db_functions.php";

    if (isset($_REQUEST['option'])) {

        if ($_REQUEST['option'] == 'users') {
            
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
                $msg = "Error grouping Users by Campus" . $sql . "<br>" . $conn->error;
            }

            $sql = "SELECT Major, COUNT(*) AS cntMajor FROM Users GROUP BY Major";
            $result = $conn->query($sql);
            if ($result) {
                while ( $row = mysqli_fetch_assoc($result) ) {
                    $arrMajor[$row['Major']] = $row['cntMajor'];
                }
            } else {
                $msg = "Error grouping Users by Major" . $sql . "<br>" . $conn->error;
            }
            
            $sql = "SELECT Year, COUNT(*) AS cntYear FROM Users GROUP BY Year";
            $result = $conn->query($sql);
            if ($result) {
                while ( $row = mysqli_fetch_assoc($result) ) {
                    $arrYear[$row['Year']] = $row['cntYear'];
                }
            } else {
                $msg = "Error grouping Users by Year" . $sql . "<br>" . $conn->error;
            }

            $arr['Campus'] = $arrCampus;
            $arr['Major'] = $arrMajor;
            $arr['Year'] = $arrYear;

            $json=urldecode(json_encode($arr)) ;
            
            echo $json;
            $conn->close();
        }
        
        else if ($_REQUEST['option'] == 'items') {
            
            // the array to be returned
            $arr = array();
            $arrSales = array();
            $arrRequests = array();
            $arrTrans = array();

            $conn = connectDB();

            // need a full outer join of Sales, Requests, Trans after grouping by Tag
            // but MySQL does not support full outer join, so we use left join UNION right join

            $sql = "CREATE OR REPLACE VIEW SR_leftJoin AS
                        (SELECT tmp1.Tag AS Tag, tmp1.cntSales AS cntSales, tmp2.cntRequests AS cntRequests FROM
                            (SELECT Tag, COUNT(*) AS cntSales FROM Sales GROUP BY Tag) tmp1 LEFT JOIN 
                            (SELECT Tag, COUNT(*) AS cntRequests FROM Requests GROUP BY Tag) tmp2 ON tmp1.Tag=tmp2.Tag );";
            $result = $conn->query($sql);

            $sql = "CREATE OR REPLACE VIEW SR_rightJoin AS
                        (SELECT tmp2.Tag AS Tag, tmp1.cntSales AS cntSales, tmp2.cntRequests AS cntRequests FROM
                            (SELECT Tag, COUNT(*) AS cntSales FROM Sales GROUP BY Tag) tmp1 RIGHT JOIN 
                            (SELECT Tag, COUNT(*) AS cntRequests FROM Requests GROUP BY Tag) tmp2 ON tmp1.Tag=tmp2.Tag );";
            $result = $conn->query($sql);

            $sql = "CREATE OR REPLACE VIEW SR_fullJoin AS
                        (SELECT * FROM (SELECT * FROM SR_leftJoin UNION SELECT * FROM SR_rightJoin) tmp );";
            $result = $conn->query($sql);

            $sql = "CREATE OR REPLACE VIEW SRT_leftJoin AS
                        (SELECT SR_fullJoin.Tag AS Tag, SR_fullJoin.cntSales AS cntSales, SR_fullJoin.cntRequests AS cntRequests, tmp3.cntTrans AS cntTrans FROM
                            SR_fullJoin LEFT JOIN 
                            (SELECT Tag, COUNT(*) AS cntTrans FROM Transactions GROUP BY Tag) tmp3 ON SR_fullJoin.Tag=tmp3.Tag );";
            $result = $conn->query($sql);

            $sql = "CREATE OR REPLACE VIEW SRT_rightJoin AS
                        (SELECT tmp3.Tag AS Tag, SR_fullJoin.cntSales AS cntSales, SR_fullJoin.cntRequests AS cntRequests, tmp3.cntTrans AS cntTrans FROM
                            SR_fullJoin RIGHT JOIN 
                            (SELECT Tag, COUNT(*) AS cntTrans FROM Transactions GROUP BY Tag) tmp3 ON SR_fullJoin.Tag=tmp3.Tag );";
            $result = $conn->query($sql);

            $sql = "SELECT * FROM (SELECT * FROM SRT_leftJoin UNION SELECT * FROM SRT_rightJoin) tmp";
            $result = $conn->query($sql);
            
            if ($result) {
                while ( $row = mysqli_fetch_assoc($result) ) {
                    $arrSales[$row['Tag']] = $row['cntSales'] == null ? 0 : $row['cntSales'];
                    $arrRequests[$row['Tag']] = $row['cntRequests'] == null ? 0 : $row['cntRequests'];
                    $arrTrans[$row['Tag']] = $row['cntTrans'] == null ? 0 : $row['cntTrans'];
                }
            } else {
                $msg = "Error full join after grouping by tag" . $sql . "<br>" . $conn->error;
            }
            
            $arr['Sales'] = $arrSales;
            $arr['Requests'] = $arrRequests;
            $arr['Trans'] = $arrTrans;

            $json=urldecode(json_encode($arr)) ;
            
            echo $json;
            $conn->close();
        } elseif($_REQUEST['option'] == 'price'){
            // the array to be returned
            $arr = array();
            $arrMax = array();
            $arrAvg = array();
            $arrMin = array();

            $conn = connectDB();
            $sql = "SELECT Tag, max(IntendedPrice) as MaxPrice, min(IntendedPrice) as MinPrice, avg(IntendedPrice) as AvgPrice FROM Sales GROUP BY Tag";
            $result = $conn->query($sql);
            
            if ($result) {
                while ( $row = mysqli_fetch_assoc($result) ) {
                    $arrMax[$row['Tag']] = $row['MaxPrice'] == null ? 0 : $row['MaxPrice'];
                    $arrAvg[$row['Tag']] = $row['AvgPrice'] == null ? 0 : $row['AvgPrice'];
                    $arrMin[$row['Tag']] = $row['MinPrice'] == null ? 0 : $row['MinPrice'];
                }
            } else {
                $msg = "Error full join after grouping by tag" . $sql . "<br>" . $conn->error;
            }

            $arr['Max'] = $arrMax;
            $arr['Avg'] = $arrAvg;
            $arr['Min'] = $arrMin;

            $json=urldecode(json_encode($arr)) ;
            
            echo $json;
            $conn->close();
        }

    }
    // echo "<script>console.log('$msg');</script>";

?>