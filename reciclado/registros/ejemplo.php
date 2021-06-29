<script type="text/javascript">
	var filtro = function (clave, valor) {
  if (clave === "hora") {
    return undefined;
  }
  return valor;
}

var objetoJavascript = {"hora": 11, "dia": 1, "mes": 7, "año": 2014},
    textoJson = JSON.stringify(objetoJavascript , filtro, 4);
    console.log(textoJson);

    var objetoJson = JSON.parse('{"clave":"valor"}');
console.log(objetoJson.clave);
</script>