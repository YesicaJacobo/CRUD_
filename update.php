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
  <link rel="stylesheet" href="./css/estilos.css"> 
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <title>Actualizar</title>
</head>
<body>
  

<?php


$query="SELECT column1, column2, column3, column4, column5 FROM table1 WHERE column1 = ".$_POST['column1'].";";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$result = $conn->query($query);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ( $conn->query($query)){
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      
      ?><br><br>
      <form action="update2.php" method="POST">
        <div align='center'>
          <fieldset style="width:500px">
            <legend>  <div align='center'> </strong> Cambie la información del registro.</b></div></legend> <br>
              </strong> Id:</b> <input type="number" name="identificador" id="" value="<?= $row['column1'] ?>" class="w3-input" readonly><br>
              </strong> Nombre:</b> <input type="text" name="nombre" id="" value="<?= $row['column2'] ?>" class="w3-input"><br>
              </strong> Fecha:</b> <input type="date" name="fecha" id="" value="<?= $row['column3'] ?>"><br>
              </strong> Numero:</b> <input type="number" name="numero" id="" value="<?= $row['column4'] ?>" class="w3-input"><br> 
              </strong> Num.Double:</b> <input type="number" name="numdouble" id="" value="<?= $row['column5'] ?>" class="w3-input"><br>
              <br>
              <input type="submit" value="Modificar"><br> <br>
          </fieldset>
        </div>
      </form>
      <?php
    }
}else{
    echo "Algo salio mal <a href='https://localhost/crud/crud.php'> clic aqui para volver al crud</a>" ;
    
}
?>
</body>
</html>