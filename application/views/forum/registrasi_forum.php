<?php $this->load->view('forum/head') ?>

<?php $this->load->view('forum/header.php') ?>



  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <p>Registrasi Organisasi</p>
          <h2>Narahubung Organisasi</h2>
        </div>

        <div class="row">

          <div class="col-lg-12">
            <form action="<?= base_url('forum/registrasi/registrasi_forum') ?>" method="post" role="form" class="php-email-form">
            <?php if($this->session->flashdata('msg')){echo $this->session->flashdata('msg');} ?>
                <div class="form-row">
                  <div class="col-lg-12 form-group">
                  <?php 
                  $validation = validation_errors();

                  if(validation_errors() != false) { 
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <p>'. $validation.'</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                  }?>
                
                  </div>

                  <div class="col-lg-12 form-group ">
                  <label for="nama_depan">Nama Lengkap Pendaftar</label>
                    <input type="text" name="nama_lengkap" value="<?php 
                    if(validation_errors() != false) { 
                      echo $akun['nama_lengkap'];
                    } ;
                    ?>" class="form-control" id="nama_depan" placeholder="Nama Lengkap Pendaftar"  />
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-lg-12 form-group">
                  <label for="nama_depan">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php 
                    if(validation_errors() != false) { 
                      echo $akun['email'];
                    } ;
                    ?>"  />

                  </div>
                  <div class="col-lg-12 form-group">
                  <label for="nama_depan">Nama Forum</label>
                    <input type="text" class="form-control" name="nama_forum" id="nama_forum" value="<?php 
                    if(validation_errors() != false) { 
                      echo $akun['nama_forum'];
                    } ;
                    ?>"  />

                  </div>
                </div>
                <div class="form-row">
                  <div class="col-lg-12 form-group">
                  <label for="nama_depan">Password</label>
                    <input type="text" name="password" class="form-control" id="password" placeholder="Password" value="<?php 
                    if(validation_errors() != false) { 
                      echo $akun['password'];
                    } ;
                    ?>"  />

                  </div>
                  <div class="col-lg-12 form-group">
                  <label for="nama_depan">Konfirmasi Password</label>
                    <input type="text" class="form-control" name="konfirmasi_password" id="konfirmasi_password" placeholder="Konfirmasi Password" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />

                  </div>
                </div>
                <div class="form-row">
                <div class="col form-group">
                  <label for="nama_depan">Logo Forum</label>
                    <input type="file" name="logo_forum" class="form-control" id="password" placeholder="Password" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />

                  </div>
                  <div class="col form-group">
                  <label for="nama_depan">Tanggal Pendirian</label>
                    <input type="date" class="form-control" name="tanggal_berdiri" id="tanggal_berdiri" placeholder="Tanggal Pendirian" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />

                  </div>
                </div>
                <div class="form-row">
                  <div class="col-lg-12 form-group">
                  <label for="nama_depan">Lokasi</label>
                    <textarea name="lokasi" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>

                  </div>
                </div>
                <div class="form-row">
                  <div class="col-6 form-group">
                  <label for="nama_depan">Provinsi</label>
                    <input type="text" name="provinsi" class="form-control" id="provinsi" placeholder="Provinsi" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />

                  </div>
                  <div class="col-6 form-group">
                  <label for="nama_depan">Kabupaten</label>
                    <input type="text" name="kabupaten" class="form-control" id="kabupaten" placeholder="Kabupaten" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  </div>
                  <div class="col-6 form-group">
                  <label for="nama_depan">Kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control" id="kecamatan" placeholder="Kecamatan" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  </div>
                  <div class="col-6 form-group">
                  <label for="nama_depan">Kode Pos</label>
                    <input type="text" name="kode_pos" class="form-control" id="kode_pos" placeholder="Kode Pos" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />                  
                  </div>
                  <div class="col-6 form-group">
                  <label for="nama_depan">Telephone</label>
                    <input type="text" name="nomor_handphone" class="form-control" id="nomor_handphone" placeholder="Nomor Handphone" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  </div>
                  <div class="col-6 form-group">
                  <label for="nama_depan">Website</label>
                    <input type="text" name="website" class="form-control" id="website" placeholder="Website" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />                  
                  </div>
              </div>
              <div class="text-center"><button type="submit">REGISTERASI</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php $this->load->view('forum/footer.php') ?>