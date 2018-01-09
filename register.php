<?php require "assets/templates/header.php"; ?>
    
    <!-- Navigation bar -->
    <?php require "assets/templates/nav.php"; ?>

    <!-- DB Connection established through referencing the below file -->
    <?php require "server/dbconnect.php"; ?>

    <!-- id register encompasses entire form -->
    <div id="register">

        <h3 class="font-white">Register Below</h3>

        <!-- Form used for registering/entering details of a new individual to the DB -->
        <form method="POST" action="#" id="register-form">

            <!-- row and col css method is used to ensure proper grid styling and js behaviour -->
            <div class="row">
                <div class="form-group col">
                    <label for="firstname" class="font-white">First Name</label>
                    <input type="text" name="firstname" class="form-control" id="firstname-input" aria-describedby="firstnameHelp" placeholder="Type . . . ">
                </div>
                <div class="form-group col">
                    <label for="firstname" class="font-white">Last Name</label>
                    <input type="text" name="lastname" class="form-control" id="lastname-input" aria-describedby="lastnameHelp" placeholder="Type . . . ">
                </div>
            </div>

            <div class="row">
                <div class="form-group col">
                    <label for="phone" class="font-white">Phone Number</label>
                    <input type="number" name="phoneNumber" class="form-control" id="phone-input" aria-describedby="phoneHelp" placeholder="Type . . . ">
                </div>
                <div class="form-group col">
                    <label for="house" class="font-white">House Number</label>
                    <input type="number" name="houseNumber" class="form-control" id="house-input" aria-describedby="houseHelp" placeholder="Type . . . ">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
<?php require "assets/templates/footer.php" ?>