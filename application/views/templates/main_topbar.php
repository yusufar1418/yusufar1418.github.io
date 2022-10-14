<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        
        <a class="navbar-brand" href="<?= base_url('main/index'); ?>">LSM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-item nav-link active" href="<?= base_url('main/index'); ?>">BRANDA</a>
            </div>
        </div>
        <div class="navbar-nav">
        <?php if (!empty($user['username'])): ?>
            <?php if ($user['role_id'] == 4): ?>
            <a class="nav-item nav-link active mr-3" href="<?= base_url('user/index'); ?>">USER</a>
            <?php else: ?>
            <a class="nav-item nav-link active mr-3" href="<?= base_url('user/index'); ?>">ADMIN</a>
            <?php endif; ?>
            <a class="nav-item nav-link active mr-3" href="<?= base_url('auth/logout'); ?>">LOGOUT</a>
        <?php else: ?>
            <a class="nav-item nav-link active mr-3" href="<?= base_url('user/registration'); ?>">REGISTER</a>
            <a class="nav-item nav-link active mr-3" href="<?= base_url('auth'); ?>">LOGIN</a>
        <?php endif ?>
        </div>
        
    </div>
  </nav>