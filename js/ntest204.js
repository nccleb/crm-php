 
        function PrintDiv(id) {
            var data=document.getElementById(id).innerHTML;
            var myWindow = window.open('', 'my div', 'height=400,width=600');
            myWindow.document.write('<html><head><title>my div</title>');
            /*optional stylesheet*/ //myWindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
            myWindow.document.write('</head><body >');
            myWindow.document.write(data);
            myWindow.document.write('</body></html>');
            myWindow.document.close(); // necessary for IE >= 10

            myWindow.onload=function(){ // necessary if the div contain images

                myWindow.focus(); // necessary for IE >= 10
                myWindow.print();
                myWindow.close();
            };
        }
    

   
function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays * 1 * 1* 300 * 1000));
  var expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}






   
   
   
   
  
  
  
function refresh(){
	window.location.reload();
}

	



function qui(){
	setCookie("test_status", 1, 0);
}

	
	
	

	
	

function openPopupWin()
	{
		
        
   
		
		var inc=<?php echo $inc?>;
		
			if(inc!==""){
				
			 var user = getCookie("test_status");	
				 if (user !== "1"){
			
				
				
		var url = 'http://192.168.0.200/test204.php?pag=<?php echo $nam ?>&pag1=<?php echo $idf ?>';
		var pw = 400;		// pixels - change for your desired popup width
		var ph = 750;		// pixels - change for your popup height
		var left   = (screen.width  - pw)/2;
		var top    = (screen.height - ph)/2;
		var parms = 'modal=yes, dialog=1, height='+ ph +', width=' + pw + ',left=' + left + ', top=' + top + ', status=0, location=no, menubar=0, title=no, scrollbars=0';
		var uid = window.open(url, '', parms);
		
		 setCookie("test_status", 1, 1);
		 
		 
		
	}
	
	
	
	
	}
	 
	
	}
	
	
	
function printContents(id)
{
    var contents = $("#"+id).html();

    if ($("#printDiv").length == 0)
    {
    var printDiv = null;
    printDiv = document.createElement('div');
    printDiv.setAttribute('id','printDiv');
    printDiv.setAttribute('class','printable');
    $(printDiv).appendTo('body');
    }

    $("#printDiv").html(contents);

    window.print();

    $("#printDiv").remove();


}	

	

      
function myFunctions() {
	//var myElement = document.getElementById("notes");
	window.document.getElementById("notes").print(); 
//"The text from the intro paragraph is " + myElement.innerHTML;
   window.print();
}

	
	

function showdate() {
	

	
	
	
 
		
		
		  
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("form2").innerHTML = this.responseText;
    }
  };
   xhttp.open("GET","test333.php");
 
  xhttp.send();
  
   
}



function myFunction2() {
    window.open ("http://192.168.0.200//test154.php","","menubar=0,resizable=1,width=900,height=500");
}
  

 
function myFunction3() {
   window.open ("http://192.168.0.200/test168.php?page=<?php echo urlencode($nam) ?>&page1=<?php echo urlencode($idf)?>&page2=<?php echo urlencode($inc)?>","","menubar=0,resizable=1,width=2000,height=2000");
}




function myCalendar() {
   window.open ("http://192.168.0.200/test300.php?page=<?php echo urlencode($nam) ?>&page1=<?php echo urlencode($idf)?>&page2=<?php echo urlencode($inc)?>","","menubar=0,resizable=1,width=2000,height=2000");
}




function myCalendar() {
   window.open ("http://192.168.0.200/test300.php?page=<?php echo urlencode($nam) ?>&page1=<?php echo urlencode($idf)?>&page2=<?php echo urlencode($inc)?>","","menubar=0,resizable=1,width=2000,height=2000");
}



function myFunction4() {
   window.open ("http://192.168.0.200//test237.php?page=<?php echo urlencode($nam) ?>&page1=<?php echo urlencode($idf)?>","","menubar=0,resizable=1,width=1450,height=800");
}

 
 
 

function collect() {
   window.open ("http://192.168.0.200//test15.php?page=<?php echo urlencode($nam) ?>&page1=<?php echo urlencode($idf)?>","","menubar=0,resizable=1,width=1450,height=800");
}

 
 

 
function prev(){
	
comp()+remark()+sendus()+show()+address()+address2()+loadDoc()+win()+email()+cust()+bus()+url()+wi()+test()+post12();
}
function on(){
	y=setInterval("prev()",1000);
}





function quit(){
	window.close();
}














































	
 


    function uro() {
	window.moveTo(1100,0);	
    
	
	
    }





	




function search5(){
myw=window.open ("http://192.168.0.200//search.php?page=<?php echo urlencode($nam) ?>&page1=<?php echo urlencode($idf)?>&page2=<?php echo urlencode($inc)?>","","menubar=0,resizable=1,width=1000,height=950");	

	
}










































function list(){
	
 window.open ("http://192.168.0.200//test265.php","","menubar=0,resizable=1,width=1400,height=680");
	
}





































function crr(){
myw=window.open ("http://192.168.0.200//test240.php?pag=<?php echo $nam ?>&pag1=<?php echo $idf ?>&page2=<?php echo $inc ?>","","menubar=0,resizable=1,width=1050,height=1000");	

	
}





function number(){
myw=window.open ("http://192.168.0.200//numbersearch.php?page=<?php echo urlencode($nam) ?>&page1=<?php echo urlencode($idf)?>&page2=<?php echo urlencode($inc)?>","","menubar=0,resizable=1,width=1050,height=1000");	

	
}



















function ImportC(){
	
 window.open ("http://192.168.0.200//test73.php","","menubar=0,resizable=1,width=480,height=300");
	
}




function ExporCt(){
	
 window.open ("http://192.168.0.200//test72.php","","menubar=0,resizable=1,width=480,height=300");
	
}


















function search3(){
	
 window.open ("http://192.168.0.200//test184.php","","menubar=0,resizable=1,width=480,height=620");
	
}






function search4(){
	
 window.open ("http://192.168.0.200//test189.php","","menubar=0,resizable=1,width=480,height=620");
	
}



 

function backup(){
	var myw;
	
   myw=location.replace('test36.php');
	
}


function history(){
	
 window.open ("http://192.168.0.200//test29.php","","menubar=0,resizable=1,width=480,height=350");
	
}









function deldriver(){
	
 window.open ("http://192.168.0.200//test206.php","","menubar=0,resizable=1,width=480,height=350");
	
}





















function delAll3(){
	
 window.open ("http://192.168.0.200//test366.php","","menubar=0,resizable=1,width=480,height=350");
	
}






function list81(){
	
 window.open ("http://192.168.0.200//test360.php","","menubar=0,resizable=1,width=1400,height=680");
	
}












function quit(){
	

	window.close();
}

	





function update(){
	var myw;
	
   myw=window.open ("http://192.168.0.200//test27.php","","menubar=0,resizable=1,width=480,height=750");
	
}
 


 
function addCrm(){
	var myw;
	
   
	myw=window.open ("http://192.168.0.200//test56.php?page=<?php echo $nam ?>&page1=<?php echo $idf ?>&page2=<?php echo $inc ?>","","menubar=0,resizable=1,width=450,height=800");
}


	

function updateCrm(){
	var myw;
	
   
	myw=window.open ("http://192.168.0.200//before.php?pag=<?php echo $nam ?>&pag1=<?php echo $idf ?>&pag2=<?php echo $inc ?>","","menubar=0,resizable=1,width=500,height=800");
}







        
        
 
function ura(){
	var mx;
	
   mx=1;
	
} 




function size(){
	window.resizeTo(700,750);
	
}


 
 













function submit() {
    var form1 = document.forms['form1']
    
    
         form1.submit()
    
}
  






function billing() {
	
	 
	
	
  var xhttp;
  
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("test").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET","test15.php", true);
  xhttp.send();
}






function billing2() {
	
	 
	
  var xhttp;
  
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET","test356.php", true);
  xhttp.send();
}







function win() {
  var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("ep").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET","test25.php", true);
  xhttp.send();
}


 
function post12() {
  var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("pio").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET","test341.php", true);
  xhttp.send();
}















function wi() {
  var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("zp").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET","test162.php", true);
  xhttp.send();
}




function comp() {
  var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("comp").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET","test368.php", true);
  xhttp.send();
}





function sendurl() {
	
	 var x=document.getElementById("se").value;
	 //alert('03205818');
	 //var x = '03205818';
	//alert(x);
	
  var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("pio").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET","test341.php?q=" + x, true);
  xhttp.send();
}





function sendus() {
	
	 //var x=document.getElementById("se").value;
	 //alert('03205818');
	 var x = "<?php echo $nam ?>";
	// var x=0;
	//alert(x);
	
  var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("pio").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET","test347.php?q=" + x, true);
  xhttp.send();
}









 
function cust() {
  var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("cu").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET","test37.php", true);
  xhttp.send();
}





function bus() {
  var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("bu").value = this.responseText;
    }
  };
  xhttp.open("GET","test40.php", true);
  xhttp.send();
}







function show() {
  var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("ap").value = this.responseText;
    }
  };
  xhttp.open("GET","test18.php", true);
  xhttp.send();
}


 
 
 
function loadDoc(str) {
  var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("bp").value = this.responseText;
 
    }
  };
  xhttp.open("GET","test23.php?q="+str, true);
  xhttp.send();
}



function address() {
  var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("cp").value = this.responseText;
      
    }
  };
  xhttp.open("GET","test17.php", true);
  xhttp.send();
}





function address2() {
  var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("cp2").value = this.responseText;
      
    }
  };
  xhttp.open("GET","test353.php", true);
  xhttp.send();
}





function remark() {
  var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("rem").value = this.responseText;
      
    }
  };
  xhttp.open("GET","test355.php", true);
  xhttp.send();
}





function email() {
  var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("com").value = this.responseText;
      
    }
  };
  xhttp.open("GET","test34.php", true);
  xhttp.send();
}



function url() {
  var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("ur").value = this.responseText;
      
    }
  };
  xhttp.open("GET","test49.php", true);
  xhttp.send();
}

 
 
 
 
function sq(str) {
	
	 var name="<?php echo $nam ?>" ;
  var idf="<?php echo $idf ?>" ;
  
  //alert(name+idf);
	
  var xhttp;
 
  
  
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("sq").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET","test313.php?name="+name+"&idf="+idf, true);
 
  xhttp.send();
}


 
 
 
 	

 
 
	
	
	
	
	