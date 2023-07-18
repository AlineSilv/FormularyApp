<?php
use Aline\formulary\persons;
use Aline\formulary\searchdata;
use Aline\formulary\register;
use Aline\formulary\excludeperson;
use Aline\formulary\UpdatePerson;
require_once 'register.php';
require 'classes/persons.php';
?>
<DOCTYPE html>
    <head>
      <title>Formulary| Register</title>
</head>
<span><h1 style="color:black; font-size: 8rem;">RegistForm</h1></span>
<body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- TABLE MEMBERS -->

<body>
  
<?php
$class= new Persons("persons", "localhost", "root", "");
$data = $class->searchdata();
?>
<?php
  if (isset($_GET['id'])){
    $id_person=addslashes($_GET['id']);
    $class->excludeperson($id_person);
    //header("location:register.php");
    //header location(refresh)
  }
?>
<section style="display: flex; flex-direction:column; justfy-content:center; background-color:white">

<table class="table">
  <!--titulos ficam acima do código php-->
  <thead>
    <tr>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Phone</th>
      <th scope="col">Gender</th>
      <th scope="col">E-mail</th>
      <th scope="col">password</th>
      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">State</th>
      <th scope="col">District</th>
    </tr>
  </thead>
  
<script>
  function alert(){
    alert("You just deleted a record, is that right?");
  }
</script>

<!-- Váriavel contem todos os dados do banco de dados.-->
<?php 
$class= new Persons("persons", "localhost", "root", "");
$data = $class->searchdata();
if(count($data) > 0){
  //for cria uma linha 0 para os valores e posteriormente retorna ao valor 1 e assim por diante.
  // se $i =0, a partir de $i contamos $data, assim por diante.
  for($i=0; $i < count($data); $i++){
    echo"<tbody>
    <tr>";
    //$data é um array, de chave e valores.
    foreach ($data[$i] as $key => $value){
      //excluindo o id da amostra.
      if($key != "id"){
        echo"<td>".$value."</td>";
      }
    }
    //CRUD------------------------------------------------
?>
    <td>
      <a href="index.php?id_up=<?php echo $data[$i]['id'];?>">
      <input type="submit" value="Edit"></a>
    </td> 
    
      <td><!--criando método get, com '?=id'.-->
        <a href="register.php?id=<?php echo $data[$i]['id'];?>">
        <input type="submit" value="Exclude"></a>
        </td>
      <?php
  
  }
  
}; 
    echo"</tr>
    </tbody>";
    ?>


  <tbody>
    <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>
</section>
</body>
</html>