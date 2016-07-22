<?php

	include "db.php";

	function get_cals() {
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
		}

		// ENTREE CALORIE QUERY

		$entree_query = "SELECT calories FROM foods WHERE name = '{$entree}' ";
		$select_entree = mysqli_query($connection, $entree_query);

		while($row = mysqli_fetch_assoc($select_entree)) {
		    $entree_calories = $row["calories"];
		    echo $entree_calories;
		}

		echo "<br>";
		// FRUIT/VEG CALORIE QUERY

		$fruit_veg_query = "SELECT calories FROM foods WHERE name = '{$fruit_veg}' ";
		$select_fruit_veg = mysqli_query($connection, $fruit_veg_query);

		while($row = mysqli_fetch_assoc($select_fruit_veg)) {
		    $fruit_veg_calories = $row["calories"];
		    echo $fruit_veg_calories;
		}

		echo "<br>";
		// SIDE CALORIE QUERY

		$side_query = "SELECT calories FROM foods WHERE name = '{$side}' ";
		$select_side = mysqli_query($connection, $side_query);

		while($row = mysqli_fetch_assoc($select_side)) {
		    $side_calories = $row["calories"];
		    echo $side_calories;
		}

		echo "<br>";
		// DESSERT CALORIE QUERY

		$dessert_query = "SELECT calories FROM foods WHERE name = '{$dessert}' ";
		$select_dessert = mysqli_query($connection, $dessert_query);

		while($row = mysqli_fetch_assoc($select_dessert)) {
		    $dessert_calories = $row["calories"];
		    echo $dessert_calories;
		}
			}

?>