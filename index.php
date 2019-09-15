<?php 
$msg = '';
$msgClass = '';
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
    $msg = 'please check all input field';
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>contact form</title>
</head>
<body class="bg-dark">
<br>
   <div class="container">
   <div class="row justify-content-center">
   <div class="col-sm-4 card">

   <div class="card-heading">
   <h4>Contact us</h4></div>
   <div class="card-body">
   <?php  if($msg !=''): ?>
<div class="<?php echo $msgClass ;?>"><?php echo $msg; ?></div>

<?php endif; ?>
   <form method="POST" action="<?php  echo $_SERVER['PHP_SELF'];?>">
  
    <div class="form-group">
    <label for="Name">Name</label>
    <input type="name" class="form-control" placeholder="name" name="name" value="<?php 
    
    echo isset($_POST['name'])?$name : '';
    ?>">

  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" placeholder="Enter email" value="<?php 
    
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
    
    ></textarea>
  </div>
  
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
   
   
   </div>
   
   </div>
   </div>
   
   </div>
</body>
</html>