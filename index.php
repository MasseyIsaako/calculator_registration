<!-- ToDo: Preventing duplicate data from being entered for email. -->
<!-- Query for finding duplicate emails: -->
<!-- 
    SELECT * 
        FROM  `users` 
            WHERE `email` LIKE '$email' -->

<?php
    // Setting up server connection via a separate PHP file,
    // containing parameters needed for authentication.
    require ("server/dbconnect.php");

    /**
     * In order to test whether iput is being registered by the form,
     * use the testInput function and place it just after the if($_POST)
     * statement in order to echo out the resulting user input. Use the 
     * $_POST array as the parameter to pass through the test function.
     *
     * E.g. if($_POST) {
     *     testInput($_POST);
     * }
     */
    if($_POST) {

        /**
         * Extracting the POST array into individual variables (specified
         * in input field name). To be used for form validation.
         */
        extract($_POST);

        // Error logging for user input, errors from input will be pushed
        // to this array and then echoed back to the user
        $errors = [];

        // Validating firstname and lastname for existing input and correct
        // input character length.
        if (!$firstname) {
            array_push($errors, "First name is required.");
        } elseif (!ctype_alpha($firstname)) {
            array_push($errors, "Please remove numbers and special characters from your first name.");
        } elseif (strlen($firstname) < 2) {
            array_push($errors, "First name must be at least 2 characters long.");
        } elseif (strlen($firstname) > 35) {
            array_push($errors, "First name must be at less than 35 characters long.");
        }

        if (!$lastname) {
            array_push($errors, "Last name is required.");
        } elseif (!ctype_alpha($lastname)) {
            array_push($errors, "Please remove numbers and special characters from your last name.");
        } elseif (strlen($lastname) < 2) {
            array_push($errors, "Last name must be at least 2 characters long.");
        } elseif (strlen($lastname) > 35) {
            array_push($errors, "Last name must be at less than 35 characters long.");
        }

        // Validating phonenumber and housenumber for existing numerical input
        // and correct input character length.
        if (!$phonenumber) {
            array_push($errors, "Home phone number is required.");
        } elseif (strlen($phonenumber) != 7) {
            array_push($errors, "Home phone number must be 7 characters long.");
        } elseif (!ctype_alnum($phonenumber)) {
            array_push($errors, "Please enter numbers only for your phone number.");
        }

        if (!$housenumber) {
            array_push($errors, "House number is required.");
        } elseif ($housenumber <= -1) {
            array_push($errors, "Please enter a house number greater than 0.");
        } elseif ($housenumber > 999){
            array_push($errors, "Please enter a house number less than 1000.");
        } elseif (!ctype_alnum($housenumber)) {
            array_push($errors, "Please enter numbers only for your house address number.");
        }

        // Validating email input
        if (!$email) {
            array_push($errors, "Email is required.");
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Invalid email format.");
        }

        if (empty($errors)) {
            $firstname = mysqli_real_escape_string($dbConnect, $firstname);
            $lastname = mysqli_real_escape_string($dbConnect, $lastname);
            $email = mysqli_real_escape_string($dbConnect, $email);
            $phonenumber = mysqli_real_escape_string($dbConnect, $phonenumber);
            $housenumber = mysqli_real_escape_string($dbConnect, $housenumber);

            $query = "INSERT INTO users VALUES ('$firstname', '$lastname', '$email', '$phonenumber', '$housenumber')";
            $result = mysqli_query($dbConnect, $query);

            if ($query && mysqli_affected_rows($dbConnect) > 0) {
                header("Location: index.php");
            } elseif (!$query || mysqli_affected_rows($dbConnect) <= 0) {
                die("Error occurred while posting to database.");
            }

            // Clearing all variables for future use on the same device
            $firstname = $lastname = $email = $phonenumber = $housenumber = null;
        }

    }

    function testInput($userInput)
    {

        // Extracting variables from POST array
        extract($userInput);

        // Echoing resulting input to verify
        echo $firstname . " " . 
             $lastname . " " . 
             $email . " " . 
             $phonenumber . " " . 
             $housenumber;
    }

?>

<!-- Connecting to the custom stylesheet as well as to bootstrap css files. -->
<?php require "assets/templates/header.php"; ?>
    
    <!-- Navigation bar -->
    <?php require "assets/templates/nav.php"; ?>

    <!-- id register encompasses entire form -->
    <div id="wrapper" class="wrapper-flex-content">

        <h3 class="font-white h3">Register Below</h3>

        <!-- Form used for registering/entering details of a new individual to the DB -->
        <form method="POST" action="index.php" id="register-form" autocomplete="on">

            <!-- row and col css method is used to ensure proper grid styling and js behaviour -->

            <!-- First and last name input fields -->
            <div class="row">
                <div class="form-group col">
                    <label for="firstname" class="font-white required-field">* First Name</label>
                    <input type="text" name="firstname" class="form-control" id="firstname-input" aria-describedby="firstnameHelp" placeholder="Joe" value="<?php if (isset($firstname)) {echo $firstname;} else { echo ""; } ?>" autofocus>
                </div>
                <div class="form-group col">
                    <label for="lastname" class="font-white required-field">* Last Name</label>
                    <input type="text" name="lastname" class="form-control" id="lastname-input" aria-describedby="lastnameHelp" placeholder="Bloggs" value="<?php if (isset($lastname)) {echo $lastname;} else { echo ""; } ?>">
                </div>
            </div>

            <!-- Phone and House number input fields -->
            <div class="row">
                <div class="form-group col">
                    <label for="phonenumber" class="font-white required-field">* Home Phone Number</label>
                    <input type="number" name="phonenumber" class="form-control" id="phone-input" aria-describedby="phoneHelp" placeholder="1234567" value="<?php if (isset($phonenumber)) {echo $phonenumber;} else { echo ""; } ?>">
                </div>
                <div class="form-group col">
                    <label for="housenumber" class="font-white required-field">* Home Address Number</label>
                    <input type="number" name="housenumber" class="form-control" id="house-input" aria-describedby="houseHelp" placeholder="93" value="<?php if (isset($housenumber)) {echo $housenumber;} else { echo ""; } ?>">
                </div>
            </div>

            <!-- Email input field -->
            <div class="row">
                <div class="form-group col">
                    <label for="email" class="font-white required-field">* Email</label>
                    <input type="email" name="email" class="form-control" id="email-input" aria-describedby="emailHelp" placeholder="j.bloggs@email.com" value="<?php if (isset($email)) {echo $email;} else {echo "";} ?>">d
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <?php if($_POST): ?>

            <div class="list-error-container">
                <ul class="list-group">
                    <?php foreach($errors as $error): ?>
                        <li class="list-group-item list-group-item-danger"><?= $error ?></li>
                    <?php endforeach ?>
                </ul>
            </div>

        <?php endif ?>
    </div>

<!-- Calling in the relevant script files, includes custom js as well as bootstrap and jquery files -->
<?php require "assets/templates/footer.php" ?>