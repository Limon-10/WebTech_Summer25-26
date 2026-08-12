<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>

<body>

<?php

$errors = [];

$studentName = "";
$username = "";
$email = "";
$phone = "";
$age = "";
$password = "";
$confirmPassword = "";
$studentID = "";
$personalWebsite = "";
$DOB = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["studentName"])) {
        $errors['Nerror'] = "Full Name is required.";
    } else {
        $studentName = $_POST["studentName"];

        if (!preg_match("/^[a-zA-Z ]+$/", $studentName)) {
            $errors['Nerror'] = "Full Name may contain only alphabetic characters and spaces.";
        } elseif (strlen($studentName) < 3) {
            $errors['Nerror'] = "Full Name must contain at least 3 characters.";
        } elseif (strlen($studentName) > 50) {
            $errors['Nerror'] = "Full Name must not contain more than 50 characters.";
        }
    }

    if (empty($_POST["username"])) {
        $errors['usererror'] = "Username is required.";
    } else {
        $username = $_POST["username"];

        if (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
            $errors['usererror'] = "Username may contain only letters, numbers, and underscore.";
        } elseif (strlen($username) < 5 || strlen($username) > 15) {
            $errors['usererror'] = "Username length must be between 5 and 15 characters.";
        } elseif (!preg_match("/^[a-zA-Z]/", $username)) {
            $errors['usererror'] = "Username must start with an alphabetic character.";
        }
    }

    if (empty($_POST["email"])) {
        $errors['Eerror'] = "Email Address is required.";
    } else {
        $email = $_POST["email"];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['Eerror'] = "Please enter a valid email address.";
        } elseif (!preg_match("/\.(com|org|edu)$/i", $email)) {
            $errors['Eerror'] = "Email Address must end with .com, .org, or .edu.";
        }
    }

    if (empty($_POST["phone"])) {
        $errors['Perror'] = "Phone Number is required.";
    } else {
        $phone = $_POST["phone"];

        if (!preg_match("/^[0-9]+$/", $phone)) {
            $errors['Perror'] = "Phone Number must contain digits only.";
        } elseif (strlen($phone) != 11) {
            $errors['Perror'] = "Phone Number must contain exactly 11 digits.";
        } elseif (substr($phone, 0, 2) != "01") {
            $errors['Perror'] = "Phone Number must start with 01.";
        }
    }

    if (empty($_POST["age"])) {
        $errors['Aerror'] = "Age is required.";
    } else {
        $age = $_POST["age"];

        if (!is_numeric($age)) {
            $errors['Aerror'] = "Age must contain a numeric value.";
        } elseif ($age < 18 || $age > 30) {
            $errors['Aerror'] = "Age must be between 18 and 30.";
        }
    }

    if (empty($_POST["password"])) {
        $errors['PWerror'] = "Password is required.";
    } else {
        $password = $_POST["password"];

        if (strlen($password) < 8) {
            $errors['PWerror'] = "Password must contain at least 8 characters.";
        } elseif (!preg_match("/[A-Z]/", $password)) {
            $errors['PWerror'] = "Password must contain at least one uppercase English letter.";
        } elseif (!preg_match("/[0-9]/", $password)) {
            $errors['PWerror'] = "Password must contain at least one numeric digit.";
        } elseif (!preg_match("/[@#$%]/", $password)) {
            $errors['PWerror'] = "Password must contain at least one of @, #, $, %.";
        }
    }

    if (empty($_POST["confirmPassword"])) {
        $errors['CPerror'] = "Confirm Password is required.";
    } else {
        $confirmPassword = $_POST["confirmPassword"];

        if ($confirmPassword !== $password) {
            $errors['CPerror'] = "Confirm Password must exactly match Password.";
        }
    }

    if (empty($_POST["studentID"])) {
        $errors['SIDerror'] = "Student ID is required.";
    } else {
        $studentID = $_POST["studentID"];

        if (!preg_match("/^[0-9]{2}-[0-9]{5}-[0-9]$/", $studentID)) {
            $errors['SIDerror'] = "Student ID must follow the format XX-XXXXX-X.";
        }
    }

    if (empty($_POST["personalWebsite"])) {
        $errors['Werror'] = "Personal Website is required.";
    } else {
        $personalWebsite = $_POST["personalWebsite"];

        if (!filter_var($personalWebsite, FILTER_VALIDATE_URL)) {
            $errors['Werror'] = "Please enter a valid website URL.";
        } elseif (!preg_match("/^https?:\/\//i", $personalWebsite)) {
            $errors['Werror'] = "Website must begin with http:// or https://.";
        }
    }

    if (empty($_POST["DOB"])) {
        $errors['DOBerror'] = "Date of Birth is required.";
    } else {
        $DOB = $_POST["DOB"];
    }
}

?>

<h1>Registration Form:</h1>

<form action="student_registration.php" method="post">

    <label for="studentName">Full Name:</label>
    <input type="text" name="studentName" value="<?php echo htmlspecialchars($studentName); ?>">

    <p>
        <?php echo $errors['Nerror'] ?? ""; ?>
    </p>

    <label for="username">User Name:</label>
    <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>">

    <p>
        <?php echo $errors['usererror'] ?? ""; ?>
    </p>

    <label for="email">Email Address:</label>
    <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">

    <p>
        <?php echo $errors['Eerror'] ?? ""; ?>
    </p>

    <label for="phone">Phone Number:</label>
    <input type="text" name="phone" value="<?php echo htmlspecialchars($phone); ?>">

    <p>
        <?php echo $errors['Perror'] ?? ""; ?>
    </p>

    <label for="age">Age:</label>
    <input type="text" name="age" value="<?php echo htmlspecialchars($age); ?>">

    <p>
        <?php echo $errors['Aerror'] ?? ""; ?>
    </p>

    <label for="password">Password:</label>
    <input type="password" name="password">

    <p>
        <?php echo $errors['PWerror'] ?? ""; ?>
    </p>

    <label for="confirmPassword">Confirm Password:</label>
    <input type="password" name="confirmPassword">

    <p>
        <?php echo $errors['CPerror'] ?? ""; ?>
    </p>

    <label for="studentID">Student ID:</label>
    <input type="text" name="studentID" value="<?php echo htmlspecialchars($studentID); ?>">

    <p>
        <?php echo $errors['SIDerror'] ?? ""; ?>
    </p>

    <label for="personalWebsite">Personal Website:</label>
    <input type="text" name="personalWebsite" value="<?php echo htmlspecialchars($personalWebsite); ?>">

    <p>
        <?php echo $errors['Werror'] ?? ""; ?>
    </p>

    <label for="DOB">Date of Birth:</label>
    <input type="date" name="DOB" value="<?php echo htmlspecialchars($DOB); ?>">

    <p>
        <?php echo $errors['DOBerror'] ?? ""; ?>
    </p>

    <input type="submit" name="submit" value="Submit">

</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errors)) {

    echo "Registration Successful!<br><br>";
    echo "Full Name: " . htmlspecialchars($studentName) . "<br>";
    echo "Username: " . htmlspecialchars($username) . "<br>";
    echo "Student ID: " . htmlspecialchars($studentID) . "<br>";
    echo "Email Address: " . htmlspecialchars($email);

}

?>

</body>
</html>
<?php
/*
1. htmlspecialchars() is used to safely display user input by converting special characters into HTML entities, helping prevent XSS attacks.
2. Server-side validation is necessary because HTML validation can be bypassed or disabled by the user.
3. It ensures that invalid or malicious data cannot reach the server or database.
4. For example, a **password confirmation** field should be checked for matching values before checking other password rules.
5. Therefore, server-side validation provides reliable and secure input checking.
*/
?>