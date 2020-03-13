<?php 
$msg = "";
$msgClass = "";
 // check for submit 

 if(filter_has_var(INPUT_POST,'submit')){
//get form data
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);

// check require field
if(!empty($email)&& !empty($name)&& !empty($message)){
//passed
//check email address
if(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
    //failed
    $msg = 'please enter correct E-mail address';
    $msgClass = 'alert-danger';
}else{
    //passed
$toEmail = 'joginder9868@outlook.com';
$subject = 'Contact Request From'.$name;
$body = '<h2>Contact Request</h2>
        <h4> Name</h4><p>'.$name.'</p>
        <h4> Email</h4><p>'.$email.'</p>
        <h4> Email</h4><p>'.$message.'</p>';

$headers = "MIME-version1.o"."\r\n";
$headers .= "Contet-Type:text/html;charset=UTF-8"."\r\n";
$headers .= "From:".$name."<".$email.">"."\r\n";
if(mail($toEmail,$subject,$body,$headers)){
    $msg = 'your message send successfully!!';
    $msgClass = 'alert-success';
}else{
    $msg = 'your message failed !!';
    $msgClass = 'alert-danger';
}
}


}else{
    //failed
    $msg = 'Please Check All Input Field';
    $msgClass = 'alert-danger';
}



 }



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>contact form</title>
</head>
<body class="bg-dark">
<br>
   <div class="container">
   <div class="row justify-content-center">
   <div class="col-sm-4 card">

   <div class="card-heading">
   <h4 class="text-center text-primary">Contact Us</h4></div>
   <div class="card-body">
   <?php  if($msg !=''): ?>
<div class="<?php echo $msgClass ;?>"><?php echo $msg; ?></div>

<?php endif; ?>
   <form method="POST" action="<?php  echo $_SERVER['PHP_SELF'];?>">
  
    <div class="form-group">
    <label for="Name">Name</label>
    <input type="name" class="form-control" placeholder="Enter Your Name" name="name" value="<?php 
    
    echo isset($_POST['name'])?$name : '';
    ?>">

  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">E-mail</label>
    <input type="email" class="form-control" name="email" placeholder="Enter E-mail" value="<?php 
    
    echo isset($_POST['email'])?$email : '';
    ?>">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="message">Message</label>
    <textarea name="message" id="" cols="30" rows="10" class="form-control"
    value="<?php 
    
    echo isset($_POST['message'])?$message : '';
    ?>"
    placeholder="Type your message here "
    ></textarea>
  </div>
  
  <button type="submit" name="submit" class="btn btn-primary">SEND</button>
</form>
   
   
   </div>
   
   </div>
   </div>
   
   </div>
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
