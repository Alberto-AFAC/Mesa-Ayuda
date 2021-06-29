<!DOCTYPE html>
<html>
<body>



<p id="demo"></p>




<script>
var text = '{"data":[' +
'{"idproyecto":"Angel"},'+'{"nombre":""},'+'{"edad":"2"}]}';

obj = JSON.parse(text);
document.getElementById("demo").innerHTML =
obj.data[0].idproyecto + " " + obj.data[1].nombre +" "+ obj.data[2].edad;



var y = 0;
var x = 0;
while (x < 10) { // "x < 10" es la condicion del bucle
   // hacer cosas

		x++;
		y++;
 
   	console.log(x,y);
   
}
   

</script>


<table>
	<td><input type="text" name="nombre"></td><tr>
	<td><input type="text" name="apellidos"></td>
</table>

</body>
</html>
