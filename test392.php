<!DOCTYPE html>
<html lang="en">
<head>
  
<?php include('head.php'); ?>
  <link rel="stylesheet" href="css/stylei.css">
  <link rel="stylesheet" href="css/stylei2.css">
   
  <link rel="stylesheet" href="css/whatsappButton.css" />
  <script src="js/test371.js"></script>









</head>
<body>
<div class="jumbotron"> 

<p id="demo"></p>

<script>
function makeCounter() {
    var counter = 0;
	
    // Nested function
    function make() {
        counter += 1;
        return counter;
    }
    return make;
}

/* Execute the makeCounter() function and store the
returned value in the myCounter variable */
var myCounter = makeCounter();

//document.getElementById("demo").innerHTML = myCounter();



//console.log(myCounter()); // Prints: 1
//console.log(myCounter()); // Prints: 2

</script>

<script>

function hello(){

    document.getElementById("demo").innerHTML = myCounter();


}

</script>



<button type="button" id="form" class="whatsappbutton" onclick="hello()">Press</button>

</div>

</body>
</html>

