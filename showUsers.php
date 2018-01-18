<?php 
    
    // Setting up server connection via a separate PHP file,
    // containing parameters needed for authentication.
    require "server/dbconnect.php";

    // Using select query to retrieve firstname, lastname and email field data.
    $sql = "SELECT * FROM `users`";
    $result = mysqli_query($dbConnect, $sql);

    if ($result) {
        $userData = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        echo "<p class='font-white'>Connection to database: " . $db_name . ", returned error: " . mysqli_connect_errno() . "</p>";
    }
?>

<!-- Connecting to the custom stylesheet as well as to bootstrap css files. -->
<?php require "assets/templates/header.php"; ?>

    <!-- Navigation bar -->
    <?php require "assets/templates/nav.php"; ?>

    <!-- This div wraps around entire table -->
    <div id="wrapper" class="wrapper-flex-content">
        <h3 class="font-white h3">Registered Users</h3>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="font-white">#</th>
                    <th scope="col" class="font-white">First Name</th>
                    <th scope="col" class="font-white">Last Name</th>
                    <th scope="col" class="font-white">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userData as $data): ?>
                <tr>
                    <th scope="row" class="font-white"><?= $rowCount += 1; ?></th>
                    <td class="font-white"><?= $data['firstname']; ?></td>
                    <td class="font-white"><?= $data['lastname']; ?></td>
                    <td class="font-white"><?= $data['email']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<!-- Calling in the relevant script files, includes custom js as well as bootstrap and jquery files -->
<?php require "assets/templates/footer.php" ?>