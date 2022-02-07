<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?= $app_info['description'] ?>">
    <meta name="keywords" content="">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->getAttribute('title') ?> | <?= $app_info['name'] ?></title>
    <link rel="icon" href="/favicon.png" type="image/png">
    <link rel="stylesheet" href="/css/styles.css?v=1">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="nav navbar-nav ml-auto">
                <form class="nav-item" id="logout-form" action="/logout" method="post">
                    <a class="nav-link" href="javascript:document.getElementById('logout-form').submit()" title="logout"><i class="fas fa-sign-out-alt"></i></a>
                </form>
            </ul>
        </nav>
        <!-- /navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= path_for('home') ?>" class="brand-link  text-center">
                <span class="brand-text font-weight-light"><b><?= $app_info['company'] ?></b></span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/img/avatars/default.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block" title="My Profile">Welcome, </a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">                        
                        <li class="nav-header">Header</li>
                        <li class="nav-item">
                            <a href="<?= path_for('home') ?>" class="nav-link <?= css_make_active('home') ?>">
                                <i class="fas fa-home"></i>
                                <p>Home</p>
                            </a>
                        </li>
                    </ul>
                </nav><!-- /.sidebar-menu -->
            </div><!-- /.sidebar -->
        </aside>

        <div class="content-wrapper" id="page-content">
            <div class="container-fluid">
                <!-- validation error message -->
                <?php if ($this->getAttribute('errors')) { ?>
                	<div class="alert alert-danger mt-3 alert-dismissible fade show" role="alert">
                		<ul class="mb-0">
                			<?php foreach ($this->getAttribute('errors') as $error) { ?>
                				<li><?= $error ?></li>
                			<?php } ?>
                		</ul>
                		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                			<span aria-hidden="true">&times;</span>
                		</button>
                	</div>
                <?php } ?>
                <!-- flash message -->
                <?php if($flash->getMessage('info')) { ?>
                	<div class="alert alert-info mt-3 alert-dismissible fade show" role="alert">
                		<?= $flash->getMessage('info')[0] ?>
                		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                	</div>
                <?php } ?>
                <?php if($flash->getMessage('success')) { ?>
                	<div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                		<?= $flash->getMessage('success')[0] ?>
                		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                	</div>
                <?php } ?>
                <?php if($flash->getMessage('warning')) { ?>
                	<div class="alert alert-warning mt-3 alert-dismissible fade show" role="alert">
                		<?= $flash->getMessage('warning')[0] ?>
                		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                	</div>
                <?php } ?>
                <?php if($flash->getMessage('error')) { ?>
                	<div class="alert alert-danger mt-3 alert-dismissible fade show" role="alert">
                		<?= $flash->getMessage('error')[0] ?>
                		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                	</div>
                <?php } ?>
            </div>
            <?= $content ?>
        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; <?= date('Y') ?> <a href="<?= $app_info['authorUrl'] ?>"><?= $app_info['author'] ?></a>.</strong> All rights reserved.
            <div class="float-right d-none d-sm-inline-block"><b>Version</b> <?= $app_info['version'] ?></div>
        </footer>
    </div><!-- ./wrapper -->

    <script src="/js/scripts.js"></script>
	<script>
		$(document).ajaxError(function(event, xhr){
			if (xhr.status < 500) return Message.add(xhr.responseText || 'not found!', { skin: 'large ico-medium', type: 'warning' });
			else Message.add('An error occurred. Contact your system administrator.', { skin: 'large ico-medium', type: 'error' });
			console.log(xhr);
		});

		$.fn.select2.defaults.set('theme', 'bootstrap4');
		$.fn.select2.defaults.set('minimumInputLength', 3);
		$.fn.select2.defaults.set("ajax--cache", true);
		$.fn.select2.defaults.set("ajax--delay", 500);

        $.fn.notific = function(msg, type) {
            Message.add(msg, { skin: 'large ico-medium', type: type });
            return this;
        };
	</script>
    <?= $this->getAttribute('scripts'); ?>
</body>
</html>
