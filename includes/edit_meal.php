<?php
    
    if(isset($_GET['m_id'])) {

        $the_meal_id = $_GET['m_id'];

    }

    $query = "SELECT * FROM meals WHERE id = $the_meal_id";
    $select_meals_by_id = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_meals_by_id)) {

        $meal_id = $row['id'];
        $meal_entree = $row['entree'];
        $meal_fruit_veg = $row['fruit_veg'];
        $meal_side = $row['side'];
        $meal_dessert = $row['dessert'];

    }

    if(isset($_POST['edit_meal'])) {

        $meal_entree = $_POST['meal_entree'];
        $meal_fruit_veg = $_POST['meal_fruit_veg'];
        $meal_side = $_POST['meal_side'];
        $meal_dessert = $_POST['meal_dessert'];

        $query = "UPDATE meals SET ";
        $query .= "entree = '{$meal_entree}', ";
        $query .= "fruit_veg = '{$meal_fruit_veg}', ";
        $query .= "side = '{$meal_side}', ";
        $query .= "dessert = '{$meal_dessert}' ";
        $query .= "WHERE id = {$the_meal_id} ";

        $update_post = mysqli_query($connection, $query);

        header("Location: meals.php");

    }

?>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div id="addMealForm">


                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="meal_fruit_veg">Entree</label>
                        <select name="meal_entree" class="form-control">
                            <?php

                             echo "<option selected='true' value='$meal_entree' class='option-caps'>$meal_entree</option>";

                            $the_entree_query = "SELECT * FROM foods WHERE type = 'entree' ";
                            $select_entree = mysqli_query($connection, $the_entree_query);
                            while ($row = mysqli_fetch_assoc($select_entree)) {
                                $list_entree = $row['name'];
                               
                                echo "<option value='$list_entree' class='option-caps'>$list_entree</option>";

                            }

                            ?>
                            <option value="None">None</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="meal_fruit_veg">Fruit / Vegetable</label>
                        <select name="meal_fruit_veg" class="form-control">
                            <?php

                             echo "<option selected='true' value='$meal_fruit_veg' class='option-caps'>$meal_fruit_veg</option>";

                            $the_fruit_veg_query = "SELECT * FROM foods WHERE type = 'fruit_veg' ";
                            $select_fruit_veg = mysqli_query($connection, $the_fruit_veg_query);
                            while ($row = mysqli_fetch_assoc($select_fruit_veg)) {
                                $list_fruit_veg = $row['name'];
                               
                                echo "<option value='$list_fruit_veg' class='option-caps'>$list_fruit_veg</option>";

                            }

                            ?>
                            <option value="None">None</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="meal_side">Side</label>
                        <select name="meal_side" class="form-control">
                            <?php

                             echo "<option selected='true' value='$meal_side' class='option-caps'>$meal_side</option>";

                            $the_side_query = "SELECT * FROM foods WHERE type = 'side' ";
                            $select_side = mysqli_query($connection, $the_side_query);
                            while ($row = mysqli_fetch_assoc($select_side)) {
                                $list_side = $row['name'];
                               
                                echo "<option value='$list_side' class='option-caps'>$list_side</option>";

                            }

                            ?>
                            <option value="None">None</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="meal_dessert">Dessert</label>
                        <select name="meal_dessert" class="form-control">
                            <?php

                             echo "<option selected='true' value='$meal_dessert' class='option-caps'>$meal_dessert</option>";

                            $the_dessert_query = "SELECT * FROM foods WHERE type = 'dessert' ";
                            $select_dessert = mysqli_query($connection, $the_dessert_query);
                            while ($row = mysqli_fetch_assoc($select_dessert)) {
                                $list_dessert = $row['name'];
                               
                                echo "<option value='$list_dessert' class='option-caps'>$list_dessert</option>";

                            }

                            ?>
                            <option value="None">None</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="edit_meal" value="Update Meal!">
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>