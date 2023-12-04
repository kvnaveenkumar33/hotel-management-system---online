<?php

include '../config.php';

$select = "SELECT * FROM alldetails ";
$result = $conn->query($select);
echo"<h1>success</h1>";

if($result->num_rows > 0){
    $separator = ",";
    $filename = "employee_" . date('Y-m-d') . ".csv";
    // Set header content-type to CSV and filename
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    // create a file pointer connected to the output stream
    $output = fopen('php://output', 'w');

    //set CSV column headers
    $fields = array('Id', 'Name', 'Email', 'Room Type', 'Bed Type','Check in','Check out','No oF Days','Total Bill');
    fputcsv($output, $fields, $separator);
    
    
    while($row = $result->fetch_object()){ 
        $status = ($row->is_enabled == '1')?'Yes':'No';
        $lineData = array($row->id, $row->Name, $row->Email, $row->RoomType, $row->Bed,$row->cin,$row->cout,$row->noofdays,$row->finaltotal);
	fputcsv($output, $lineData, $separator);
    }
	
    fclose($output);
    exit();
}
?>