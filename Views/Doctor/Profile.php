<?php
session_start();
require_once '../../Model/Doctor.php';

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username']; 
$profileData = ShowProfile($username);

if ($profileData !== false) {
    $profile = $profileData->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        fieldset {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }

        legend {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Doctor Profile</h2>
    <form action="../../Controllers/UpdateDoctorProfile.php" method="POST">
        <fieldset>
            <legend>Personal Information</legend>
            <input type="hidden" id="username" name="username" value="<?php echo $username; ?>">
            <label for="fullName">Full Name:</label>
            <input type="text" id="fullName" name="fullName" value="<?php echo $profile['FullName']; ?>"><br>
            
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $profile['Username']; ?>" ><br>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender">
                <option value="male" <?php if ($profile['Gender'] === 'male') echo 'selected'; ?>>Male</option>
                <option value="female" <?php if ($profile['Gender'] === 'female') echo 'selected'; ?>>Female</option>
                <option value="other" <?php if ($profile['Gender'] === 'other') echo 'selected'; ?>>Other</option>
            </select><br>
            
            <label for="contactNo">Contact Number:</label>
            <input type="text" id="contactNo" name="contactNo" value="<?php echo $profile['ContactNo']; ?>"><br>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $profile['Email']; ?>"><br>
            
            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="4" cols="50"><?php echo $profile['Address']; ?></textarea><br>
            
            <label for="speciality">Speciality:</label>
            <input type="text" id="speciality" name="speciality" value="<?php echo $profile['Speciality']; ?>"><br>
            
            <input type="submit" value="Update Information">
        </fieldset>
    </form>
</body>
</html>


<?php
} 
else {
    // Doctor profile not found
    echo "Doctor profile not found!";
}
?>
