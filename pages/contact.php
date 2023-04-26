<!-- VARIABLES ARE IN VARIABLES PAGE -->
<?php
$contact = new Contact($_POST); // create new class 
?>
<?php foreach ($contact->getErrors() as $error) { ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
    </div>
    <?php
} ?>
<form id="form-contact" action="" method="post" class="container">
    <h3>Contact us </h3>
    <div>
        <label for="subject">Write a Content:</label>
        <input type="text" id="subject" name="subject" placeholder="Subject...">
    </div>
    <div>
        <label for="email">Enter Your Email:</label>
        <input type="email" id="email" name="email" placeholder="example@email.com">
    </div>
    <div>
        <label for="message">Your a Message:</label>
        <textarea name="message"></textarea>
    </div>
    <div>
        <button type="submit" name="submit" class="btn btn-primary">Send</button>
    </div>
</form>