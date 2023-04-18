<?php

if (isset($_POST['username'])) {
    // declaire password and username without spacing
    // FORM SECURITY
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username != $defaultUsername) {
        $errors[] = 'Invalid username';
    } elseif (empty($password)) {
        $errors[] = 'empty password';
    } elseif ($password != $defaultPassword) {
        $errors[] = 'Wrong password';
    } elseif (!empty($username) && $password = $defaultPassword) {
        $_SESSION['username'] = $_POST['username'];
        header('Location: index.php?login=success');
    }
}
?>

<?php foreach ($errors as $error) { ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
    </div>
    <?php
} ?>

<form action="" method="post" class="container">
    <h3>Sign Up</h3>
    <ul>
        <li>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Name..." required>
        </li>
        <li>
            <label for="password">Pass Word:</label>
            <input type="password" id="password" name="password" placeholder="**********">
        </li>
    </ul>
    <div>
        <input type="submit" value="Connection">
    </div>
</form>