<!-- VARIABLES ARE IN VARIABLES PAGE -->
<?php

// contact form security
if (isset($_POST['subject'])) {
    $subject = trim($_POST['subject']);

    if (empty($subject)) {
        $errors []= "Subject can not be empty";
    } elseif (strlen($subject)< 8) {
        $errors []= "Subject must be more than 8 letters";
    }
}

if (isset($_POST['email'])) {
    $email = trim($_POST['email']);

    if (empty($email)) {
        $errors []= "email can not be empty";
    }elseif (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors []= "Please enter a vilid email";
    }
}

if (isset($_POST['message'])) {
    $message = trim($_POST['message']);

    if (empty($message)) {
        $errors []= "Content can not be empty";
    } elseif ((strlen($message) <= 80)) {
        $errors []= '80 minimum letters';
    }
}
?>
<?php foreach ($errors as $error) {?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
    </div>
<?php
}?>
<form id="contact" action="" method = "post" class="container">
<h3>Contact us </h3>
    <div>
    <label for="subject">Subject:</label>
    <input type="text" id="subject" name="subject" placeholder = "Subject..." >
    </div>
    <div>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder = "example@email.com">
    </div>
    <label for="message">Your Message:</label>
    <textarea name="message" form="usrform"></textarea>
    </div>
<div>
   <button type="submit" class = "btn btn-primary">Send</button>
</div>
</form> 