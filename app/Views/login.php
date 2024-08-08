<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php if (isset($validation)): ?>
        <div>
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <?php if (isset($error)): ?>
        <div>
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form action="/user/login" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?= set_value('username') ?>">
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        
        <button type="submit">Login</button>
    </form>
</body>
</html>
