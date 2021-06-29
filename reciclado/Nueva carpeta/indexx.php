<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="css/buttons.bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script> 

  <table id="mitabla">
    <thead>
      <tr>
      <th>Nombre</th>
      <th>Nota</th>
      <th>Rango</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Pepe</td><td>5</td><td>24/12/2017</td>
      </tr>
       <tr>
        <td>María</td><td>3</td><td>04/04/2018</td>
      </tr>
        <tr>
        <td>Luis</td><td>1</td><td>12/12/2017</td>
      </tr>
    </tbody>
  </table>


<script>
  
  $(document).ready(function(){
  
  $("#mitabla").dataTable({
    
    rowCallback:function(row,data)
    {
      if(data[2] == "24/12/2017")
      {
        $($(row).find("td")[0]).css("background-color","yellow");
      }
      else if(data[1] == "3"){
          $($(row).find("td")[0]).css("background-color","blue");
      }
      else{
          $($(row).find("td")[0]).css("background-color","red");
      }
      
    }
    
  });
  
});
</script>