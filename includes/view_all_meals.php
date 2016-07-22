<div class="container">

<div class="row">
    <div class="col-lg-6 col-md-6">
        <h1 id="mealsHeader">All Meals</h1>
    </div>
    <div class="col-lg-6 col-md-6">
        <a class="btn-lg btn-success" id="addMeal" href="meals.php?source=add_meal">Add Meal</a>
    </div>
</div>

<?php

// $select_comments = mysqli_query($connection, $query);

            // while($row = mysqli_fetch_assoc($select_comments)) {
            //     $test_date = $row['meal_date'];
            //     $test_date = strtotime($test_date);
            //     $test_mysqldate = date('D', $test_date);
            // }



            // $currentDate = getdate(date("U"));
            // echo $currentDate['weekday'];

        // echo "<div class='alert alert-success' style='width: 100%;'>";
        // echo "<p class='tabledata-span'>TUESDAY</p>";
        // echo "</div>";

?>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <!-- <th>ID</th> -->
            <th>Entree</th>
            <th>Fruit/Veggies</th>
            <th>Side Dish</th>
            <th>Dessert</th>
            <th>Date</th>
            <th>Extra Info</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        
        <?php

            if(isset($_SESSION['user_id'])) {
                $meal_user_id = $_SESSION['user_id']; 
            }

            $query = "SELECT * FROM meals WHERE meal_user_id = $meal_user_id ORDER BY id DESC";
            $select_meals = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_meals)) {
                $meal_id = $row['id'];
                $meal_entree = $row['entree'];
                $meal_fruit_veg = $row['fruit_veg'];
                $meal_side = $row['side'];
                $meal_dessert = $row['dessert'];
                $meal_time = $row['meal_date'];

                $meal_time = strtotime($meal_time);
                $mysqldate = date('m-d-Y', $meal_time);

                echo "<tr>";
                    // echo "<td>{$meal_id}</td>";
                    echo "<td>{$meal_entree}</td>";
                    echo "<td>{$meal_fruit_veg}</td>";

                    echo "<td>{$meal_side}</td>";
                    echo "<td>{$meal_dessert}</td>";
                    echo "<td>{$mysqldate}</td>";
                    echo "<td><a href='meals.php?source=read_more&m_id=$meal_id'>Read More<a/></td>";
                    echo "<td><a href='meals.php?source=edit_meal&m_id=$meal_id'>Edit<a/></td>";
                    echo "<td><a href='meals.php?delete=$meal_id'>Delete<a/></td>";
                echo "</tr>";
            }

        ?>
        
    </tbody>
</table>

</div>

<?php
    
    if(isset($_GET['delete'])) {
        $the_meal_id = $_GET['delete'];

        $query = "DELETE FROM meals WHERE id = {$the_meal_id}";

        $delete_query = mysqli_query($connection, $query);
        header("Location: meals.php");
    }

    // if(isset($_GET['deny'])) {

    //     $the_comment_id = $_GET['deny'];

    //     $query = "UPDATE comments SET comment_status = 'denied' WHERE comment_id = $the_comment_id ";

    //     $deny_comment_query = mysqli_query($connection, $query);
    //     header("Location: comments.php");
    // }

    // if(isset($_GET['approve'])) {
        
    //     $the_comment_id = $_GET['approve'];

    //     $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id ";

    //     $approve_comment_query = mysqli_query($connection, $query);
    //     header("Location: comments.php");
    // }

?>