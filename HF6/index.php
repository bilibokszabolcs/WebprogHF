<?php

$firstNameErr = $lastNameErr = $emailErr = $attendErr = $fileErr = $termsErr = $submitErr = "";
$firstName = $lastName = $email = "";
$valid_format = array("application/pdf");

if (isset($_POST['submit'])) {

    $sent = true;
    if (empty($_POST['firstName'])) {
        $firstNameErr = "First name is required!";
        $correct = false;
    } else {
        $firstName = test_input($_POST['firstName']);
    }

    if (empty($_POST['lastName'])) {
        $lastNameErr = "Last name is required!";
        $sent = false;
    } else {
        $lastName = test_input($_POST['lastName']);
    }

    if (empty($_POST['email'])) {
        $emailErr = "Email required!";
        $sent = false;
    } else {
        $email = test_input($_POST['email']);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format!";
            $sent = false;
        }
    }

    if (!isset($_POST['attend'])) {
        $attendErr = "Select at least one event!";
        $sent = false;
    }

    if (!in_array($_FILES["abstract"]["type"], $valid_format)) {
        $fileErr = "Invalid format! Only PDF files can be uploaded!";
        $sent = false;
    }
    if ($_FILES["abstract"]["error"] != 0) {
        $fileErr = "Please choose a PDF file!";
        $sent = false;
    }

    if ($_FILES["abstract"]["size"] > 3 * 1024 * 1024) {
        $fileErr = "The size of the selected PDF file is too large!";
        $sent = false;
    }

    if (!isset($_POST['terms'])) {
        $termsErr = "Terms agreement required!";
        $sent = false;
    }

    if ($sent) {
        echo "<h3>The form has been successfully submitted!</h3> ";
        echo "First name: " . $firstName . "<br>";
        echo "Last name: " . $lastName . "<br>";
        echo "E-mail: " . $_POST['email'] . "<br>";
        echo "I will attend: ";
        foreach ($_POST['attend'] as $attends) {
            echo "$attends ";
        }
        echo "<br>" . "T-Shirt size: " . $_POST['tshirt'] . "<br>";
        echo "File : " . $_FILES['abstract']['name'];
    }

}

function test_input($data)
{
    return htmlspecialchars($data);
}

?>

<h3>Online conference registration</h3>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
    <label for="fname"> First name:
        <input type="text" name="firstName">
    </label>
    <span><?php echo $firstNameErr; ?></span>
    <br><br>
    <label for="lname"> Last name:
        <input type="text" name="lastName">
    </label>
    <span><?php echo $lastNameErr; ?></span>
    <br><br>
    <label for="email"> E-mail:
        <input type="text" name="email">
    </label>
    <span><?php echo $emailErr; ?></span>
    <br><br>
    <label for="attend"> I will attend:<br>
        <input type="checkbox" name="attend[]" value="Event1">Event 1<br>
        <input type="checkbox" name="attend[]" value="Event2">Event2<br>
        <input type="checkbox" name="attend[]" value="Event3">Event2<br>
        <input type="checkbox" name="attend[]" value="Event4">Event3<br>
    </label>
    <span><?php echo $attendErr; ?></span>
    <br><br>
    <label for="tshirt"> What's your T-Shirt size?<br>
        <select name="tshirt">
            <option value="P">Please select</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select>
    </label>
    <br><br>
    <label for="abstract"> Upload your abstract<br>
        <input type="file" name="abstract"/>
    </label>
    <span><?php echo $fileErr; ?></span>
    <br><br>
    <input type="checkbox" name="terms" value="">I agree to terms & conditions.<br>
    <span><?php echo $termsErr; ?></span>
    <br><br>
    <input type="submit" name="submit" value="Send registration"/>
</form>