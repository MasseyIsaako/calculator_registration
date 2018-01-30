<?php 

    /**
     * Validating inout before user data is accepted and used for calculations.
     */
    if ($_POST) {

        /**
         * Extracting the POST array into individual variables (specified
         * in input field name). To be used for form validation.
         */
        extract($_POST);

        // Error logging for user input, errors from input will be pushed
        // to this array and then echoed back to the user
        $errors = [];

        // Validating $firstnumber to check if values exists and correct input.
        // I.e. number input
        if (!$firstnumber) {
            array_push($errors, "First number is required.");
        } elseif (!is_numeric($firstnumber)) {
            array_push($errors, "Please remove letters and special characters from your first number.");
        } elseif ($firstnumber < 0) {
            array_push($errors, "First number must be greater than 0.");
        }

        // Validating $secondnumber to check if values exists and correct input.
        // I.e. number input
        if (!$secondnumber) {
            array_push($errors, "Second number is required.");
        } elseif (!is_numeric($secondnumber)) {
            array_push($errors, "Please remove letters and special characters from your second number.");
        } elseif ($secondnumber < 0) {
            array_push($errors, "Second number must be greater than 0.");
        } elseif ($secondnumber > $firstnumber && $operation === "-") {
            array_push($errors, "Second number should be less than first number because you're using the - operator.");
        }

        if (empty($errors)) {

            // Calling the calculator to run from external file.
            include ("calculateInterface.php");

            // Calling new instance of Calculation class to pass through validated
            // user input.
            $Calculation = new FinalCalculation();
            $result = $Calculation->identifyOperator($firstnumber, $secondnumber, $operation);

            if (is_infinite($result)) {
                $result = "Infinite";
            }
        }
    }
?>

<!-- Connecting to the custom stylesheet as well as to bootstrap css files. -->
<?php require "assets/templates/header.php"; ?>

    <!-- Navigation bar -->
    <?php require "assets/templates/nav.php"; ?>

    <!-- This div wraps around entire table -->
    <div id="wrapper" class="wrapper-flex-content">
        <h3 class="font-white h3-calc">Calculator</h3>

        <?php if (strlen($result) != 0): ?>
            <h6 class="font-white">
                Final Result: 
            </h6>
            <h5 class="font-white h5-output-result">
            <?= 
                    $firstnumber . " "
                     . $operation . " "
                     . $secondnumber . " = "
                     . number_format($result);
                ?>
            </h5>
        <?php endif; ?>

        <form method="POST" action="calculator.php" id="calculator-form" autocomplete="on">
            <div class="row">
                <div class="form-group col">
                    <label class="font-white" for="firstnumber">Enter your first number:</label>
                    <input type="number" name="firstnumber" id="firstnumber" class="form-control" aria-describedby="firstNumberHelp" placeholder="1" value="<?php if (isset($firstnumber)) { echo $firstnumber; } else { echo ""; } ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label class="font-white" for="operation">Operation:</label>
                    <br>
                    <select name="operation" class="custom-select">
                        <option value="+"> &#43; </option>
                        <option value="-"> &#8722; </option>
                        <option value="/"> &#247; </option>
                        <option value="*"> &#215; </option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label class="font-white" for="secondnumber">Enter second number:</label>
                    <input type="text" name="secondnumber" id="secondnumber" class="form-control" aria-describedby="secondNumberHelp" placeholder="1" value="<?php if (isset($secondnumber)) { echo $secondnumber; } else { echo ""; } ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Calculate</button>
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