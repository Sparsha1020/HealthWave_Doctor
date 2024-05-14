<?php
session_start();
require_once '../Model/Doctor.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $patientName = $_POST['patientName'];
    $dateIssued = $_POST['dateIssued'];
    $prescriptionText = $_POST['prescriptionText'];

    
    $isAdded = AddPrescription($patientName, $dateIssued, $prescriptionText);

    if ($isAdded) {
        $_SESSION['successMessage'] = "Prescription added successfully.";
    } else {
        $_SESSION['errorMessage'] = "Failed to add prescription.";
    }
} else {
    $_SESSION['errorMessage'] = "Invalid request.";
}


header('Location: ../Views/Doctor/Prescription.php');
exit();
?>
