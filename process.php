<?php
$error = "";
$sjowBill = false;

//check if the form is submitted & ada value ke x
if (isset($_POST['calculate'])) {

    //echo "The Input for the first kWh: " . $_POST ['first'];
//echo "<br>The Input for the second kWh: " . $_POST ['second'];
    // echo "<br>The Input for the third kWh: " . $_POST ['third'];
    //echo "<br>The Input for the fourth kWh: " . $_POST ['fourth'];
    //echo "<br>The Input for the fifth kWh: " . $_POST ['fifth'];

    $firstkwh = $_POST['first'];
    $secondkwh = $_POST['second'];
    $thirdkwh = $_POST['third'];
    $fourthkwh = $_POST['fourth'];
    $fifthkwh = $_POST['fifth'];


    //if user input is empty, set the value to 0
    if ($firstkwh == "")
        $firstkwh = 0;
    if ($secondkwh == "")
        $secondkwh = 0;
    if ($thirdkwh == "")
        $thirdkwh = 0;
    if ($fourthkwh == "")
        $fourthkwh = 0;
    if ($fifthkwh == "")
        $fifthkwh = 0;

    //validation2
    if ($firstkwh < 0 || $secondkwh < 0 || $thirdkwh < 0 || $fourthkwh < 0 || $fifthkwh < 0) {
        $error = "<br>Invalid Input. Please enter a positive number.";
        //validation3
        //check if the input exceeds the limit
    } else if ($firstkwh > 200) {
        $error = "<br>Invalid Input. The first kwh can only have up to 200 kWh.";
    } else if ($secondkwh > 100) {
        $error = "<br>Invalid Input. The second kwh can only have up to 100 kWh.";
    } else if ($thirdkwh > 300) {
        $error = "<br>Invalid Input. The third kwh can only have up to 300 kWh.";
    } else if ($fourthkwh > 300) {
        $error = "<br>Invalid Input. The fourth kwh can only have up to 300 kWh.";
    }

    else if ($firstkwh + $secondkwh + $thirdkwh + $fourthkwh + $fifthkwh == 0) {
        $error = "Please enter at least one value";
    } else {

    $firstcharge = $firstkwh * 0.218;
    $secondcharge = $secondkwh * 0.334;
    $thirdcharge = $thirdkwh * 0.516;
    $fourthcharge = $fourthkwh * 0.546;
    $fifthcharge = $fifthkwh * 0.571;

    //totalkwh
    $totalkwh = $firstkwh + $secondkwh + $thirdkwh + $fourthkwh + $fifthkwh;
    //total rm
    $totalcharge = $firstcharge + $secondcharge + $thirdcharge + $fourthcharge + $fifthcharge;
    //totl sst; 6% if above 600kwh
    if ($totalcharge > 600) {
        $sst = $totalcharge * 0.06;

        //takleh pakai sbb nk tunjuk totla rm bila nk darab shj
       // $totalcharge += $sst;
        //$totalcharge = $totalcharge + $sst;

    }else {
        $sst = 0;
    } 
    //total semua tambah dgn sst
    $totalBill = $totalcharge + $sst;

    $showBill = true;


    echo "<br>The total charge for the first kwh is : RM " . $firstcharge;
    echo "<br>The total charge for the second kwh is : RM " . $secondcharge;
    echo "<br>The total charge for the third kwh is : RM " . $thirdcharge;
    echo "<br>The total charge for the fourth kwh is : RM " . $fourthcharge;
    echo "<br>The total charge for the fifth kwh is : RM " . $fifthcharge;
    }
}
?>