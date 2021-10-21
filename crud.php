<?php
include("./inc/settings.php");
validar();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <script src="./js/funciones.js"></script>
      <link rel="stylesheet" href="./css/estilos.css"> 
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      
  </head>
<body >
  <br>
    <div align='center'> 
    <strong>
    Bienvenido a mi crud 
    <?= $_SESSION["nombre"]?>
    <?= $_SESSION["apellido1"]?>
    <?= $_SESSION["apellido2"]?>
    <a href="logout.php" >Log out</a>
    </strong></div>
    <br>
<?php
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT column1, column2, column3, column4, column5 FROM table1";
$result = $conn->query($sql);

define("TD", "</td>\n\t<td>");

if ($result->num_rows > 0) {
  echo "<center><table border='1'><tr><th>ID</th><th>Name</th><th>Fecha</th><th>Numero</th><th>NumeroDouble</th><th>Eliminar</th><th>Modificar</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "\n<tr>\n\t<td>".$row["column1"].TD.$row["column2"].TD.$row["column3"].TD.$row["column4"].TD.$row["column5"]."</td>";
    //eliminar    //modificamos crud, functiones y eliminar
    echo "<td><form action ='eliminar.php' method = 'post'>";
    echo "<input type ='hidden' name = 'column1' value = '".$row["column1"]."'>";
    echo "<input type ='submit' value ='' style =\"background:url('./img/eliminar.png'); border: 0; display: block; width: 24px; heigth: 24px;\" onclick='return confirmar()'></form></td> \n";
    //actualizar
    echo "<td> <a href='update.php?colum1=".$row["column1"]."' onclick='return confirmarModificar()'><img src='./img/update.png'></td></tr>\n";
  }
  echo "</table></center>";
} else {
  echo "0 results";
}
$conn->close();
?>
<br>
<form action="insertar.php" method="post">
<div align='center'>
<fieldset style="width:500px">
<legend> <strong> <div align='center'> Inserte la informacion del nuevo registro</div></strong></legend> <br>
  <strong> Id:</strong> <input type="number" name="identificador" id="" value="1975" class="w3-input" required><br>
  <strong> Nombre:</strong> <input type="text" name="nombre" id="" value="Humberto" class="w3-input"><br>
  <strong> Fecha:</strong> <input type="date" name="fecha" id="" value="1975-06-23"><br><br>
  <strong> Numero:</strong> <input type="number" name="numero" id="" value="" class="w3-input"><br> 
  <strong> Num.Double:</strong> <input type="number" name="numdouble" id="" value="" class="w3-input"><br>
  <br>
  <input type="submit" value="Aceptar"><br><br>
</fieldset>
</div>
</form>

</body>
</html>