// document.querySelector("body").style.backgroundColor = "red";
var entrees = {
	Chicken: 231,
	Turkey: 153,
	Salmon: 412,
	Pizza: 285,
	Eggs: 156
};

var fruit_veg = {
	Asparagus: 30,
	Broccoli: 63,
	Salad: 100,
	Apple: 95,
	Banana: 105
};

var side = {
	Rice: 199,
	Potatoes: 150,
	Bread: 79
};

var dessert = {
	Chocolate: 235,
	Cookie: 78,
	IceCream: 137,
	Cake: 239,
	Fruit: 95
};

// window.alert(dessert.Chocolate);


function shling() {

	var meal_entrees = document.getElementById("entrees").value;
	var meal_fruit_veg = document.getElementById("fruit_veg").value;
	var meal_side = document.getElementById("sides").value;
	var meal_dessert = document.getElementById("dessert").value;

	var calorie_entrees = (entrees[meal_entrees.toString()]);
	var calorie_fruit_veg = (fruit_veg[meal_fruit_veg.toString()]);
	var calorie_side = (side[meal_side.toString()]);
	var calorie_dessert = (dessert[meal_dessert.toString()]);

}

document.getElementById("submit_meal").onclick = function() { shling(); };

window.alert(calorie_side);