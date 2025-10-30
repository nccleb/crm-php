<script>


/* const numberOne= [1,2,3];
const numberTwo= [4,5,6];

const number = [...numberOne,...numberTwo];

//document.write(number);
console.log(number); */

</script>
<p id="demo"></p>
<script>


/* function calculate(a,b){

const add = a+b;
const sub = a-b;

return [add,sub];

}

const [add,sub] = calculate(2,7);

document.write("<p>answer="+add+"</p>");



 */



 const obj = {a:1,b:2,d:3};

 for ( let v in obj){

    document.write(obj.v);
    
    
 }


 //document.getElementById("demo").innerHTML +=Object.values(obj);
 document.getElementById("demo").innerHTML = obj.a;
</script>
