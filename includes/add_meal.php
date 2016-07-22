<?php

	if(isset($_POST['add_meal'])) {

		$session_user_id = $_SESSION['user_id'];


		$the_user_query = "SELECT * FROM users WHERE user_id = {$session_user_id}";
		$select_id = mysqli_query($connection, $the_user_query);

		while ($row = mysqli_fetch_assoc($select_id)) {
			$the_user_id = $row['user_id'];

			$meal_entree = $_POST['meal_entree'];
			$meal_fruit_veg = $_POST['meal_fruit_veg'];
			$meal_side = $_POST['meal_side'];
			$meal_dessert = $_POST['meal_dessert'];

			$query = "INSERT INTO meals(entree, fruit_veg, side, dessert, meal_date, meal_user_id) ";

			$query .= "VALUES('{$meal_entree}', '{$meal_fruit_veg}', '{$meal_side}', '{$meal_dessert}', now(), {$the_user_id} ) ";

			$create_meal = mysqli_query($connection, $query);

		}

		echo "<div class='alert alert-success'>Success! New Meal Added. <a class='close' data-dismiss='alert'>&times;</a></div>";
	}

	if(isset($_POST['add_new_entree'])) {
		$new_entree = $_POST['new_entree'];
		$new_entree_cals = $_POST['new_entree_cals'];

		$query = "INSERT INTO foods(type, name, calories) VALUES('entree', '{$new_entree}', '{$new_entree_cals}') ";

		$submit_new_entree = mysqli_query($connection, $query);
	}

	if(isset($_POST['add_new_fruit_veg'])) {
		$new_fruit_veg = $_POST['new_fruit_veg'];
		$new_fruit_veg_cals = $_POST['new_fruit_veg_cals'];

		$query = "INSERT INTO foods(type, name, calories) VALUES('fruit_veg', '{$new_fruit_veg}', '{$new_fruit_veg_cals}') ";

		$submit_new_entree = mysqli_query($connection, $query);
	}

	if(isset($_POST['add_new_side'])) {
		$new_side = $_POST['new_side'];
		$new_side_cals = $_POST['new_side_cals'];

		$query = "INSERT INTO foods(type, name, calories) VALUES('side', '{$new_side}', '{$new_side_cals}') ";

		$submit_new_entree = mysqli_query($connection, $query);
	}

	if(isset($_POST['add_new_dessert'])) {
		$new_dessert = $_POST['new_dessert'];
		$new_dessert_cals = $_POST['new_dessert_cals'];

		$query = "INSERT INTO foods(type, name, calories) VALUES('dessert', '{$new_dessert}', '{$new_dessert_cals}') ";

		$submit_new_entree = mysqli_query($connection, $query);
	}

	if(isset($_POST['del_entree'])) {
		$del_meal_entree = $_POST['del_meal_entree'];
		$query = "DELETE FROM foods WHERE name = '{$del_meal_entree}' ";
		$del_entree_query = mysqli_query($connection, $query);
	}

	if(isset($_POST['del_fruit_veg'])) {
		$del_meal_fruit_veg = $_POST['del_meal_fruit_veg'];
		$query = "DELETE FROM foods WHERE name = '{$del_meal_fruit_veg}' ";
		$del_fruit_query = mysqli_query($connection, $query);
	}

	if(isset($_POST['del_side'])) {
		$del_meal_side = $_POST['del_meal_side'];
		$query = "DELETE FROM foods WHERE name = '{$del_meal_side}' ";
		$del_side_query = mysqli_query($connection, $query);
	}

	if(isset($_POST['del_dessert'])) {
		$del_meal_dessert = $_POST['del_meal_dessert'];
		$query = "DELETE FROM foods WHERE name = '{$del_meal_dessert}' ";
		$del_dessert_query = mysqli_query($connection, $query);
	}



?>


<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div id="addMealForm">

 				<form action="" method="post" enctype="multipart/form-data">

<!-- Entree Modal -->
					<div id="newEntree" class="modal fade" role="dialog">
					  <div class="modal-dialog">

					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Add New Entree</h4>
					      </div>
					      <div class="modal-body">
					      	<div class="form-group">
						        <label>Entree</label>
						        <input type="text" name="new_entree" class="form-control">
					        </div>
					        <div class="form-group">
						        <label>Calories</label>
						        <input type="number" name="new_entree_cals" class="form-control" min="5" max="2000">
					        </div>
					      </div>
					      <div class="modal-footer">
					        <button type="submit" class="btn btn-default" name="add_new_entree">Add New!</button>
					      </div>
					    </div>

					  </div>
					</div>

<!-- Entree Delete Modal -->
					<div id="delEntree" class="modal fade" role="dialog">
					  <div class="modal-dialog">

					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Delete Entree</h4>
					      </div>
					      <div class="modal-body">
					      	<div class="form-group">
		                        <label for="meal_fruit_veg">Entree</label>
		                        <select name="del_meal_entree" class="form-control">
		                        	<option disabled="true" selected="true" value="None">-- Select An Entree --</option>
		                            <?php

		                            $the_entree_query = "SELECT * FROM foods WHERE type = 'entree' ";
		                            $select_entree = mysqli_query($connection, $the_entree_query);
		                            while ($row = mysqli_fetch_assoc($select_entree)) {
		                                $list_entree = $row['name'];
		                               
		                                echo "<option value='$list_entree' class='option-caps'>$list_entree</option>";

		                            }

		                            ?>
		                        </select>
		                    </div>
					      </div>
					      <div class="modal-footer">
					        <button type="submit" class="btn btn-danger" name="del_entree">Delete!</button>
					      </div>
					    </div>

					  </div>
					</div>

					<div class="form-group">

						<label>Entree</label>

						<div class="input-group">
						<select name="meal_entree" class="form-control" id="entrees">
							<option disabled="true" selected="true" value="None">-- Select An Entree --</option>
							<?php

			 				$the_entree_query = "SELECT * FROM foods WHERE type = 'entree' ";
			 				$select_entree = mysqli_query($connection, $the_entree_query);
			 				while ($row = mysqli_fetch_assoc($select_entree)) {
			 					$list_entree = $row['name'];
			 					echo "<option value='$list_entree' class='option-caps'>$list_entree</option>";

			 				}

			 				?>
			 				<option value="None">None</option>
						</select>
						<span class="input-group-btn">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#newEntree"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delEntree"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
						</span>
						</div>

<!-- Fruit/Veg Modal -->
						<div id="newFruit" class="modal fade" role="dialog">
						  <div class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Add New Fruit or Vegetable</h4>
						      </div>
						      <div class="modal-body">
						      	<div class="form-group">
							        <label>Fruit or Vegetable</label>
							        <input type="text" name="new_fruit_veg" class="form-control">
						        </div>
						        <div class="form-group">
							        <label>Calories</label>
							        <input type="number" name="new_fruit_veg_cals" class="form-control" min="5" max="2000">
						        </div>
						      </div>
						      <div class="modal-footer">
						        <button type="submit" class="btn btn-default" name="add_new_fruit_veg">Add New!</button>
						      </div>
						    </div>

						  </div>
						</div>

<!-- Fruit/Veg Delete Modal -->

						<div id="delFruit" class="modal fade" role="dialog">
						  <div class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Delete Fruit / Vegetable</h4>
						      </div>
						      <div class="modal-body">
						      	<div class="form-group">
			                        <label for="meal_fruit_veg">Fruit / Vegetable</label>
			                        <select name="del_meal_fruit_veg" class="form-control">
			                        	<option disabled="true" selected="true" value="None">-- Select A Fruit / Vegetable --</option>
			                            <?php

			                            $the_fruit_veg_query = "SELECT * FROM foods WHERE type = 'fruit_veg' ";
			                            $select_fruit_veg = mysqli_query($connection, $the_fruit_veg_query);
			                            while ($row = mysqli_fetch_assoc($select_fruit_veg)) {
			                                $list_fruit_veg = $row['name'];
			                               
			                                echo "<option value='$list_fruit_veg' class='option-caps'>$list_fruit_veg</option>";

			                            }

			                            ?>
			                        </select>
			                    </div>
						      </div>
						      <div class="modal-footer">
						        <button type="submit" class="btn btn-danger" name="del_fruit_veg">Delete!</button>
						      </div>
						    </div>

						  </div>
						</div>

						<label>Fruit or Vegetable</label>

						<div class="input-group">
						<select name="meal_fruit_veg" class="form-control" id="fruit_veg">
							<option disabled="true" selected="true" value="None">-- Select A Fruit/Veggie --</option>
							<?php

			 				$the_fruit_veg_query = "SELECT * FROM foods WHERE type = 'fruit_veg' ";
			 				$select_fruit_veg = mysqli_query($connection, $the_fruit_veg_query);
			 				while ($row = mysqli_fetch_assoc($select_fruit_veg)) {
			 					$list_fruit_veg = $row['name'];
			 					echo "<option value='$list_fruit_veg' class='option-caps'>$list_fruit_veg</option>";

			 				}

			 				?>
			 				<option value="None">None</option>
						</select>
						<span class="input-group-btn">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#newFruit"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delFruit"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
						</span>
						</div>

						<label>Side Dish</label>

<!-- Side Dish Modal -->
						<div id="newSide" class="modal fade" role="dialog">
						  <div class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Add New Side Dish</h4>
						      </div>
						      <div class="modal-body">
						      	<div class="form-group">
							        <label>Side Dish</label>
							        <input type="text" name="new_side" class="form-control">
						        </div>
						        <div class="form-group">
							        <label>Calories</label>
							        <input type="number" name="new_side_cals" class="form-control" min="5" max="2000">
						        </div>
						      </div>
						      <div class="modal-footer">
						        <button type="submit" class="btn btn-default" name="add_new_side">Add New!</button>
						      </div>
						    </div>

						  </div>
						</div>

<!-- Delete Side Dish Modal -->

						<div id="delSide" class="modal fade" role="dialog">
						  <div class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Delete Side Dish</h4>
						      </div>
						      <div class="modal-body">
						      	<div class="form-group">
			                        <label for="del_meal_side">Side</label>
			                        <select name="del_meal_side" class="form-control">
			                        	<option disabled="true" selected="true" value="None">-- Select A Side Dish --</option>
			                            <?php

			                            $the_side_query = "SELECT * FROM foods WHERE type = 'side' ";
			                            $select_side = mysqli_query($connection, $the_side_query);
			                            while ($row = mysqli_fetch_assoc($select_side)) {
			                                $list_side = $row['name'];
			                               
			                                echo "<option value='$list_side' class='option-caps'>$list_side</option>";

			                            }

			                            ?>
			                        </select>
			                    </div>
						      </div>
						      <div class="modal-footer">
						        <button type="submit" class="btn btn-danger" name="del_side">Delete!</button>
						      </div>
						    </div>

						  </div>
						</div>

						<div class="input-group">
						<select name="meal_side" class="form-control" id="sides">
							<option disabled="true" selected="true" value="None">-- Select A Side --</option>
							<?php

			 				$the_side_query = "SELECT * FROM foods WHERE type = 'side' ";
			 				$select_side = mysqli_query($connection, $the_side_query);
			 				while ($row = mysqli_fetch_assoc($select_side)) {
			 					$list_side = $row['name'];
			 					echo "<option value='$list_side' class='option-caps'>$list_side</option>";

			 				}

			 				?>
			 				<option value="None">None</option>
						</select>
						<span class="input-group-btn">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#newSide"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delSide"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
						</span>
						</div>

						<label>Dessert</label>

<!-- Dessert Modal -->
						<div id="newDessert" class="modal fade" role="dialog">
						  <div class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Add New Dessert</h4>
						      </div>
						      <div class="modal-body">
						      	<div class="form-group">
							        <label>Dessert</label>
							        <input type="text" name="new_dessert" class="form-control">
						        </div>
						        <div class="form-group">
							        <label>Calories</label>
							        <input type="number" name="new_dessert_cals" class="form-control" min="5" max="2000">
						        </div>
						      </div>
						      <div class="modal-footer">
						        <button type="submit" class="btn btn-default" name="add_new_dessert">Add New!</button>
						      </div>
						    </div>

						  </div>
						</div>

<!-- Delete Dessert Modal -->

						<div id="delDessert" class="modal fade" role="dialog">
						  <div class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Delete Dessert</h4>
						      </div>
						      <div class="modal-body">
						      	<div class="form-group">
			                        <label for="meal_dessert">Dessert</label>
			                        <select name="del_meal_dessert" class="form-control">
			                        	<option disabled="true" selected="true" value="None">-- Select A Dessert --</option>
			                            <?php

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
						      </div>
						      <div class="modal-footer">
						        <button type="submit" class="btn btn-danger" name="del_dessert">Delete!</button>
						      </div>
						    </div>

						  </div>
						</div>

						<div class="input-group">
						<select name="meal_dessert" class="form-control" id="dessert">
							<option disabled="true" selected="true" value="None">-- Select A Dessert --</option>
							<?php

			 				$the_dessert_query = "SELECT * FROM foods WHERE type = 'dessert' ";
			 				$select_dessert = mysqli_query($connection, $the_dessert_query);
			 				while ($row = mysqli_fetch_assoc($select_dessert)) {
			 					$list_dessert = $row['name'];
			 					echo "<option value='$list_dessert' class='option-caps'>$list_dessert</option>";

			 				}

			 				?>
			 				<option value="None">None</option>
						</select>
						<span class="input-group-btn">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#newDessert"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delDessert"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
						</span>
						</div>

					</div>

					<button class="btn btn-primary btn-lg" type="submit" id="submit_meal" name="add_meal">Add Meal!</button>

				</form>

			</div>
		</div>
	</div>
</div>
