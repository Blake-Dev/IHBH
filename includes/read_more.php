<?php

if(isset($_GET['m_id'])) {
	$read_more_id = $_GET['m_id'];
}

$meal_query = "SELECT * FROM meals WHERE id = {$read_more_id} ";
$get_meals = mysqli_query($connection, $meal_query);

while($row = mysqli_fetch_assoc($get_meals)) {
	$entree = $row['entree'];
	$fruit_veg = $row['fruit_veg'];
	$side = $row['side'];
	$dessert = $row['dessert'];
	$meal_time = $row['meal_date'];
}

$meal_time = strtotime($meal_time);
$mysqldate = date('H', $meal_time);

if($mysqldate >= 0 && $mysqldate < 12){
	$time_eaten = "Breakfast";
} elseif ($mysqldate >=12 && $mysqldate <= 17) {
	$time_eaten = "Lunch";
} else { $time_eaten = "Dinner"; }

echo $mysqldate;

// ENTREE CALORIE QUERY

$entree_query = "SELECT calories FROM foods WHERE name = '{$entree}' ";
$select_entree = mysqli_query($connection, $entree_query);

while($row = mysqli_fetch_assoc($select_entree)) {
    $entree_calories = $row["calories"];
    if($entree_calories == "None") {
    	$entree_calories = 0;
    }
}


// FRUIT/VEG CALORIE QUERY

$fruit_veg_query = "SELECT calories FROM foods WHERE name = '{$fruit_veg}' ";
$select_fruit_veg = mysqli_query($connection, $fruit_veg_query);

while($row = mysqli_fetch_assoc($select_fruit_veg)) {
    $fruit_veg_calories = $row["calories"];
    if($fruit_veg_calories == "None") {
    	$fruit_veg_calories = 0;
    }
}


// SIDE CALORIE QUERY

$side_query = "SELECT calories FROM foods WHERE name = '{$side}' ";
$select_side = mysqli_query($connection, $side_query);

while($row = mysqli_fetch_assoc($select_side)) {
    $side_calories = $row["calories"];
    if($side_calories == "None") {
    	$side_calories = 0;
    }
}


// DESSERT CALORIE QUERY

$dessert_query = "SELECT calories FROM foods WHERE name = '{$dessert}' ";
$select_dessert = mysqli_query($connection, $dessert_query);

while($row = mysqli_fetch_assoc($select_dessert)) {
    $dessert_calories = $row["calories"];
    if($dessert_calories == "None") {
    	$dessert_calories = 0;
    }
}

$total_calories = $entree_calories + $fruit_veg_calories + $side_calories + $dessert_calories;

?>


<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div id="addMealForm">

				<h1>Extra Info</h1>

				<table class="table table-bordered table-hover">
				    <thead>
				        <tr>
				            <th>Calories</th>
				            <th>Total Fat</th>
				            <th>Sugar</th>
				            <th>Sodium</th>
				            <th>Plate Size</th>
				            <th>Meal Time</th>
				            <th>Date</th>
				        </tr>
				    </thead>
				    <tbody>
				    	<td><?php echo $total_calories; ?></td>
				    	<td>12g</td>
				    	<td>4g</td>
				    	<td>110mg</td>
				    	<td>Medium</td>
				    	<td><?php echo $time_eaten; ?></td>
				    	<td>07-16-2016</td>
				    </tbody>
				</table>
				
			</div>
		</div>
	</div>
</div>
