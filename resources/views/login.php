<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $app_info['name'] ?> | Log in</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="icon" href="/favicon.png" type="image/png">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="<?= $app_info['companyUrl'] ?>"> <?= $app_info['company'] ?></a>
    </div>
    <?php if($flash->getMessage('error')) { ?>
        <p class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $flash->getMessage('error')[0] ?>
        </p>
    <?php } ?>
  <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form action="<?= path_for('login') ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="username" value="" placeholder="Username" autocomplete="off" autofocus required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" value="" placeholder="Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
                <?php foreach ($tokenArray as $key => $value): ?>
                    <input type="hidden" name="<?= $key ?>" value="<?= $value ?>">
                <?php endforeach; ?>
            </form>
        </div><!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
</body>
</html>
