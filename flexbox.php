 

 <!DOCTYPE htm>
<html>
<head>

<title>eventListener</title>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  

   <script src="jquery-3.5.1"></script>
  <script src="js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="css/bootstrap">
  <!link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="base.css">
  <!script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <link rel="stylesheet" href="js/bootstrap.min.js">
  <!script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <!link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   











<style>

.flexbox-container{
	display:flex;
	//justify-content: space-around;
	//justify-content: flex-start;
	//justify-content: flex-end;
	
	//align-items: center;
	//flex-direction:column;
	
}


.flexbox-item{
	
width:200px;
margin:10px;
border: 3px ;
background-color:yellow;	
	
	
	
	
}


.flexbox-item-1{
	
min-height:100px;
	flex-shrink:0;
	align-self:flex-end;
	order:3;
	
}


.flexbox-item-2{
	
min-height:200px;
	
	//flex-shrink:0;
	flex-grow:2;
	flex-basis:0;
	align-self:center;
	order:1;
	
}



.flexbox-item-3{
	
 min-height:300px;
	
	flex-grow:1;
	flex-basis:0;
	order:2;
	
	
}





#form{
	color:blue;
	font-size:36px;
}

#q{
	color:blue;
	font-size:24px;
}
</style>


<script>

function quit(){
	window.close()
}

</script>

























</head>
<body>

<button type="button" id="form"  onclick=" quit()">QUIT</button>

<div class="flexbox-container">

<div class="flexbox-item flexbox-item-1 ">
<span>Flexbox Item 1   </span>








</div>


<div class="flexbox-item flexbox-item-2" >
<span>Flexbox Item 2  </span>








</div>




<div class="flexbox-item flexbox-item-3" >
<span>Flexbox Item 3   </span>








</div>






<div>
<br>








<script>
const div = document.querySelector('div');

//alert(div.textContent);
//alert(div.innerText);

</script>








<script>
/*
const body =  document.body;
//body.append("hello world","bye");

const div = document.createElement('div');
div.innerText="hello world";
div.textContent="hello world2";
body.append(div);

*/


	
</script>































</body>
</html>