 

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


 

#grandparent {
    background: #385a94;
    border-radius: 50%;
    height:600px;
    width:600px;
	position: relative;
}


.parent {
    position: absolute;
   background: #a9aaab;
   border-radius: 50%;
   height: 300px;
   width: 300px;
   /*
    Put top edge and left edge in the center
   */
   top: 50%;
   left: 50%;
   margin: -150px 0px 0px -150px;
   /* 
    Offset the position correctly with
    minus half of the width and minus half of the height 
   */
}



.child {
    position: absolute;
   background: yellow;
   border-radius: 50%;
   height: 150px;
   width: 150px;
   /*
    Put top edge and left edge in the center
   */
   top: 75%;
   left: 75%;
   margin: -150px 0px 0px -150px;
   /* 
    Offset the position correctly with
    minus half of the width and minus half of the height 
   */
}






</style>









<style>
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


<div id="grandparent">
  <div class="parent">
    <div class="child">

    </div>
  </div>
</div>









<script>

const grandparent =  document.querySelector("#grandparent");
const parent = document.querySelector(".parent");
const child = document.querySelector(".child");


grandparent.addEventListener("click", e => {
  alert('grandparent capture');
  }, {capture:true});
	
	
grandparent.addEventListener("click", e => {
  alert('grandparent buble');
  });	
	
parent.addEventListener("click", e => {
	
  alert('parent capture');
} , {capture:true}       );	
	
parent.addEventListener("click", e => {
  alert('parent buble');
});	


child.addEventListener("click", e => {
  alert('child capture ');
} , {capture:true}      );		
	

child.addEventListener("click", e => {
	//e.stopPropagation()
  alert('child buble ');
}       );		


	
document.addEventListener("click", e => {
  alert('document capture');
}  , {capture:true}    );	


document.addEventListener("click", e => {
  alert('document  buble ');
} ,{ once:true }  );			

		
	
</script>


<script>

//parent.addEventListener("click" ,alert('hi'))
//setTimeout(() => {
	//parent.removeEventListener("click" , alert('hi'))
//},2000)






</script>

<button type="button" id="form"  onclick=" quit()">QUIT</button>















</body>
</html>