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
            <form id="regForm" action="<?= base_url('forum/registrasi/registrasi_forum') ?>" method="post" role="form" class="php-email-form">
              <div class="tab">
                <div class="form-row">
                  <div class="col-lg-12 form-group">
                  <label for="nama_depan">Nama depan</label>
                    <input type="text" name="nama_depan" class="form-control" id="nama_depan" placeholder="Nama Depan" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                  </div>
                  <div class="col form-group">
                  <label for="nama_depan">Nama Belakang</label>
                    <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" placeholder="Nama Belakang" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                  </div>
                </div>
                <div class="form-row">
                <label for="nama_depan">Email</label>
                  <div class="col-lg-12 form-group">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email"  />
                    <div class="validate"></div>
                  </div>
                  <div class="col form-group">
                  <label for="nama_depan">Nomor Handphone</label>
                    <input type="text" class="form-control" name="nomor_handphone" id="nomor_handphone" placeholder="Nomor Handphone" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-lg-12 form-group">
                  <label for="nama_depan">Password</label>
                    <input type="text" name="password" class="form-control" id="password" placeholder="Password" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                  </div>
                  <div class="col-lg-12 form-group">
                  <label for="nama_depan">Konfirmasi Password</label>
                    <input type="text" class="form-control" name="konfirmasi_password" id="konfirmasi_password" placeholder="Konfirmasi Password" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                  </div>
                </div>
              </div>
              <div class="tab">
                <div class="form-row">
                  <div class="col-lg-12 form-group">
                  <label for="nama_depan">Nama Forum Relawan</label>
                    <input type="text" name="nama_forum_relawan" class="form-control" id="nama_forum_relawan" placeholder="Nama Forum Relawan" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                  </div>
                  <div class="col form-group">
                  <label for="nama_depan">Tanggal Pendirian</label>
                    <input type="date" class="form-control" name="tanggal_pendirian" id="tanggal_pendirian" placeholder="Tanggal Pendirian" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-lg-12 form-group">
                  <label for="nama_depan">Logo Forum</label>
                    <input type="file" name="password" class="form-control" id="password" placeholder="Password" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                  </div>
                </div>
              </div>
              <div class="tab">
                <div class="form-row">
                  <div class="col-lg-12 form-group">
                  <label for="nama_depan">Lokasi</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    <div class="validate"></div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col form-group">
                  <label for="nama_depan">Provinsi</label>
                    <input type="text" name="provinsi" class="form-control" id="provinsi" placeholder="Provinsi" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                  </div>
                  <div class="col form-group">
                  <label for="nama_depan">Kabupaten</label>
                    <input type="text" name="kabupaten" class="form-control" id="kabupaten" placeholder="Kabupaten" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                  </div>
                  <div class="col form-group">
                  <label for="nama_depan">Kode Pos</label>
                    <input type="text" name="kode_pos" class="form-control" id="kode_pos" placeholder="Kode Pos" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col form-group">
                  <label for="nama_depan">Telephone Organisasi</label>
                    <input type="text" name="telephone_organisasi" class="form-control" id="telephone_organisasi" placeholder="Telephone Organisasi" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                  </div>
                  <div class="col form-group">
                  <label for="nama_depan">Website Organisasi</label>
                    <input type="text" name="website_organisasi" class="form-control" id="website_organisasi" placeholder="Website Organisasi" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                  </div>
                </div>
              </div>
              <div style="overflow:auto;">
          <div style="float:right;">
            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
          </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
        </div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php $this->load->view('forum/footer.php') ?>