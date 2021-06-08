<?php $this->load->view('forum/head') ?>

<?php $this->load->view('forum/header.php') ?>



  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <p>Registrasi Organisasi</p>
          <h2>1 / 4 Narahubung Organisasi</h2>
        </div>

        <div class="row">

          <div class="col-lg-12">
            <form action="<?php echo base_url('forum/registrasi/registrasi_forum') ?>" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="col form-group">
                  <input type="text" name="nama_depan" class="form-control" id="nama_depan" placeholder="Nama Depan" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col form-group">
                  <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" placeholder="Nama Belakang" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col form-group">
                  <input type="email" name="email" class="form-control" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email"  />
                  <div class="validate"></div>
                </div>
                <div class="col form-group">
                  <input type="text" class="form-control" name="nomor_handphone" id="nomor_handphone" placeholder="Nomor Handphone" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col form-group">
                  <input type="text" name="password" class="form-control" id="password" placeholder="Password" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col form-group">
                  <input type="text" class="form-control" name="konfirmasi_password" id="konfirmasi_password" placeholder="Konfirmasi Password" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="text-center"><button type="submit">Selanjutnya</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php $this->load->view('forum/footer.php') ?>