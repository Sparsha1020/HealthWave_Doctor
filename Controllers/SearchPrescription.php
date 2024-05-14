<?php
require_once '../Model/Doctor.php';
session_start();

if (isset($_POST['query'])) {
    $query = $_POST['query'];
    
    $patient = SearchPrescription($query);

    if (!empty($patient)) {
        foreach ($patients as $patient) {
            echo '<p>' . $patients['PatientName'] . ' - ' . $patients['PatientName'] . '</p>';
            
        }
    } else {
        echo 'No results found';
    }
} else {
    echo 'Invalid request';
}
?>