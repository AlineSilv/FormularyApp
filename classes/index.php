
<?php

use Aline\formulary\persons;


//inejção do arquivo de classes de conexão.
require_once 'persons.php';
//require 'vendor/autoload.php';

//autoload composer
require_once __DIR__ . '/vendor/autoload.php';

//inejção da classe de conexão, class Person.
//parâmetros da conexão com valores de campo do db.
$class=new Persons("persons", "localhost", "root", "");
//todas as informações do db estão nesta variável, para return.
//$data = $class->searchdata();
?>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</script>-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="classes/stylesheet.css" rel="stylesheet" type="text/css">
  <!--BTS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <!--JQ-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

  <script type="text/javascript" src="formulario.js"></script> 

  <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:wght@800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <title>Formulary|Register</title>
</head>

<body style="background-color:#181818;">
  <header> <!--header-->
    <nav>
    <!-- Header Table No PHP -->
    <span id=form-logo><h1 style="color:white; font-size: 8rem;">RegistForm</h1></span>

    </nav>
    <?php
    // Se temos o array _post, 'name' (se o usuário clicou me cadastrar e o name existe)
    //colheremos as informações em variáveis, protegidas pelo método 'addslashes($_POST[''])'.
    if(isset($_POST['firstname'])){
            //método de proteção, não permite códigos nos campos de preenchimento
      $firstname = addslashes($_POST['firstname']);
      $lastname = addslashes($_POST['lastname']);
      $phone = addslashes($_POST['phone']);
      $gender = addslashes($_POST['gender']);
      $email = addslashes($_POST['email']);
      $password = addslashes($_POST['password']);
      $address = addslashes($_POST['address']);
      $city = addslashes($_POST['city']);
      $state = addslashes($_POST['state']);
      $district = addslashes($_POST['district']);
    
      //Condicionais para requerimento de todos os campos preenchidos e impedimento de email reutilizado.
      if(!empty($firstname) && !empty($lastname) && !empty($phone) && !empty($gender) && !empty($email) && 
      !empty($password) && !empty($address) 
      && !empty($city) && !empty($state) && !empty($district)){
        if (!$class->Register($firstname, $lastname, $phone, $gender, $email, $password, $address, $city,
         $state, $district)){

          echo"This email was previously registered and cannot be reused.";
        }

      }
      else{
        echo"To proceed, it is necessary to fill in all the fields on the form.";
      }

      }
      
    ?>

    </header> <!--header-->

  <main style="background-color:#181818;">
    <section  class="col-md-6">
    <form style="background-color:rgb(41, 39, 39);" method="POST" action="" id="formjq"> <!--DIR-->
    <span class=register><h3 style="color:white;">Register:</h3></span>
      <!--First Name And Last Name-->
      <label style="margin-top:10px;" for="name"> Enter Your Full Name:
        <div class="row g-3">
          <div class="col">
            <input name="firstname" type="text" class="form-control" placeholder="First name" aria-label="First name" value="<?php if(isset($class)){echo $class['firstname'];}?>">
          </div>
          <div class="col">
            <input name="lastname" type="text" class="form-control" placeholder="Last name" aria-label="Last name" value="<?php if(isset($class)){echo $class['lastname'];}?>">
          </div>
        </div>
      </label> 
      <!--Phone-->
      <div style="margin-top:2%; max-width:60%;" class="input-group mb-3">
        <label for="phone" class="input-group-text" id="basic-addon1">DDI+</label>
        <input name="phone" type="text" class="form-control" placeholder="(ddd)+" aria-describedby="basic-addon1" value="<?php if(isset($class)){echo $class['phone'];}?>">
      </div>
      <!--GENDER-->
      <div class="form-check">
        <input name="gender" class="form-check-input" type="radio" value="<?php if(isset($class)){echo $class['female'];}?>" id="flexRadioDefault">
        <label class="form-check-label" for="flexRadioDefault">
          Female
        </label>
        <div class="form-check">
          <input name="gender" class="form-check-input" type="radio" value="<?php if(isset($class)){echo $class['indeterminate'];}?>" id="flexRadioDefault1">
          <label class="form-check-label" for="flexCheckIndeterminate" cheked>
            Indeterminate
          </label>
        </div>
      </div>
      <div class="form-check">
        <input name="gender" class="form-check-input" type="radio" value="<?php if(isset($class)){echo $class['male'];}?>" id="flexRadioDefault">
        <label class="form-check-label" for="flexCheckChecked">
          Male
        </label>
      </div>
      <!--E-mail-->
      <div style="width: 60%;" class="col-md-6">
        <label name="email" for="inputEmail4" class="form-label">Enter Your Email:</label>
        <input name="email" type="email" class="form-control" id="inputEmail4" value="<?php if(isset($class)){echo $class['email'];}?>">
      </div>
      <div style="width: 60%;" class="col-md-6">
        <!--Password-->
        <label name="password" for="inputPassword4" class="form-label">Password:</label>
        <input name="password" type="password" class="form-control" id="inputPassword4" value="<?php if(isset($class)){echo $class['password'];}?>">
      </div>
      <!--Address-->
      <div style="max-width:60%;" class="col-12">
        <label name="address" for="inputAddress" class="form-label">Address:</label>
        <input name="address"type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" value="<?php if(isset($class)){echo $class['address'];}?>">
      </div>
      <!--City-->
      <div style="width:60%;" class="col-md-6">
        <label name="city" for="inputCity" class="form-label">City:</label>
        <input name="city" type="text" class="form-control" id="inputCity" value="<?php if(isset($class)){echo $class['city'];}?>">
      </div>
      <!--State-->
      <div style="width:60%;" class="col-md-4">
        <label name="state" for="inputState" class="form-label">State:</label>
        <select name="state" id="inputState" class="form-select" value="<?php if(isset($class)){echo $class['state'];}?>">
          <option selected>Choose...</option>
          <option value="Other">Other</option>
          <option value="MG"> Minas Gerais </option>
          <option value="RJ"> Rio de Janeiro </option>
          <option value="MT"> Mato Grosso </option>
          <option value="MS"> Mato Grosso do Sul </option>
          <option value="SP"> São Paulo </option>
          <option value="AC"> Acre </option>
        </select>
      </div>
      <!--District-->
      <div style="width:50%;" class="col-md-2">
        <label for="inputZip" class="form-label">District</label>
        <input name="district" type="text" class="form-control" id="inputZip" value="<?php if(isset($class)){echo $class['district'];}?>">
      </div>
      <!--I CONFIRM THE INFORMATION-->
      <div class="col-12">
        <div class="confirm" class="form-check">
          <input name="confirm" class="form-check-input" type="checkbox" id="gridCheck" value="confirm">
          <label class="form-check-label" for="gridCheck">
            I confirm the informations above.
          </label>
        </div>
      </div>
      <div style="margin-top:5%; margin-bottom:5%;" class="col-12">
        <a href="#"><button id="submit" type="submit" class="butto" value="<?php if(isset($class)){echo "Update";}else{echo "register";};?>" >Register</button></a>
      </div>
    </form>

    </section>
  </main>

 <!-- TABLE MEMBERS -->

</body>

<footer style="display: flex; justify-content:center; color:gray;font: weight 400px;">
  <p>Created by Aline.S</br>
  <a href="http://localhost/dev/formulary/register.php">AccessRegister</a></p>


</footer>

</html>
