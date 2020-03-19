<?php
    include_once(__DIR__."/classes/User.php");
    
    if(!empty($_POST)){

        try {
            $user = new User();
            $user->setEmail($_POST['email']);
            $user->setFirstName($_POST['firstName']);
            $user->setLastName($_POST['lastName']);
            
            $user->save(); 
            $success = "user saved!";
           
        } catch (\Throwable $th) {
            $error = $th->getMessage();
        }
        
    }

    
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(isset($error)): ?>
        <div class="error" style="color: red;"><?php echo $error ?></div>
    <?php endif; ?>

    <?php if(isset($success)): ?>
        <div class="succes" style="color: green;"><?php echo $success ?></div>
    <?php endif; ?>


    <form action="" method="post">
        <div>
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" id="firstName"/>
        </div>
        <div>
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" id="lastName"/>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email"/>
        </div>
        <div>
            <input type="submit" value="Sign me up">
        </div>
    </form>
</body>
</html>