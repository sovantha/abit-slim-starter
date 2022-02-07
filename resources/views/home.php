<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="m-0 text-dark">Home</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
			Home Page
        </div>
    </div>
</section>

<?php ob_start() ?>

<?php $this->addAttribute('scripts', ob_get_clean()) ?>