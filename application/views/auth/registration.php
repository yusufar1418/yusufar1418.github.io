  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="post" action="<?= base_url('auth/registration')?>">
                <div class="form-group">
                  <input type="text" class="form-control" id="username" name="username" placeholder="Full Name" value="<?= set_value('username'); ?>">
                  <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat Password">
                  </div>
                </div>
                <div class="form-group">
                  <input type="number" class="form-control" name="telephone" id="telephone" placeholder="Nomor Telephone" value="<?= set_value('telephone'); ?>">
                  <?= form_error('telephone', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                <select name="prov" class="form-control" id="provinsi">
                <option value="" selected>Pilih Provinsi</option>
                <?php foreach ($provinsi as $prov): ?>
                 <option value="<?= $prov['id'] ?>"><?= $prov['nama_provinsi'] ?></option>
                <?php endforeach; ?>
                </select>
                <?= form_error('prov', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                <select name="kab" class="form-control" id="kabupaten">
                <option value="" selected>Pilih Kabupaten</option>
                
                </select>
                <?= form_error('kab', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Address" name="address" rows="3"><?= set_value('address'); ?>
                </textarea>
              <?= form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
                <hr>
              </form>
              <hr>
              <div class="text-center">
                <a href="<?= base_url('auth') ?>">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>