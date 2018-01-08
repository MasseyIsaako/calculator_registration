<!DOCTYPE html>
<html>
<head>
    
    <title>Calculator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Massey Isa'ako">
    <meta name="description" content="A calculator, and registration site">
    <meta name="keywords" content="calculator, registration, database, php">
    
    <link rel="stylesheet" type="text/css" href="assets/css/reset.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.min.css">

</head>
<body id="wrapper">

    <div id="intro">
        <?php include "server/dbconnect.php"; ?>
        <button class="btn btn-primary">Calculator</button>
        <button class="btn btn-primary">Register</button>
    </div>

    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
</body>
</html>