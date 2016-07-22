<?php include 'includes/header.php'; ?>

<?php

    if(isset($_GET['source'])) {
        $source = $_GET['source'];
    } else {
        $source = '';
    }
    switch ($source) {
        case 'add_meal':
            include "includes/add_meal.php";
            break;

        case 'edit_meal':
            include "includes/edit_meal.php";
            break;

        case 'read_more':
            include "includes/read_more.php";
            break;
        
        default:
            include "includes/view_all_meals.php";
            break;
    }

?>

<script type="text/javascript" src="./public/script.js"></script>

<?php include 'includes/footer.php' ?>