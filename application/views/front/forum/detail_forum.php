<?php $this->load->view('template/head') ?>

<?php $this->load->view('template/header.php') ?>



  <main id="main">
    
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">


      <div class="container-fluid" data-aos="fade-up">

        <div class="row">

        <div class="col-lg-4 d-flex flex-column justify-content-center align-items-stretch">

              <div class="logo-forum">
              <img width="500" src="<?= base_url('assets/images/logo_forum/'.$data_forum[0]->logo);  ?>" alt="">
              </div>
        
        </div>

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">

            <div class="content">
              <h3>FORUM <strong><?= $data_forum[0]->nama_forum ?></strong></h3>
              <!-- <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              </p> -->
            </div>

            <div class="accordion-list">
              <ul>
                <li>
                  <a data-toggle="collapse" class="collapse" href="#accordion-list-1"><span>DATA FORUM</span> <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-1" class="collapse show" data-parent=".accordion-list">
                    <table>
                          <tr>
                            <td>Nama Forum</td>
                            <td></td>
                            <td>:</td>
                            <td><?= $data_forum[0]->nama_forum ?></td>
                          </tr>
                          <tr>
                            <td>Tanggal Berdiri</td>
                            <td></td>
                            <td>:</td>
                            <td><?= tgl_indo($data_forum[0]->tanggal_berdiri)?></td>
                          </tr>
                          <tr>
                            <td>Provinsi</td>
                            <td></td>
                            <td>:</td>
                            <td><?= $data_forum[0]->provinsi ?></td>
                          </tr>
                          <tr>
                            <td>Kabupaten</td>
                            <td></td>
                            <td>:</td>
                            <td><?= $data_forum[0]->kabupaten ?></td>
                          </tr>
                          <tr>
                            <td>Kecamatan</td>
                            <td></td>
                            <td>:</td>
                            <td><?= $data_forum[0]->kecamatan ?></td>
                          </tr>
                          <tr>
                            <td>Kode Pos</td>
                            <td></td>
                            <td>:</td>
                            <td><?= $data_forum[0]->kode_pos ?></td>
                          </tr>
                          <tr>
                            <td>Alamat Lengkap</td>
                            <td></td>
                            <td>:</td>
                            <td><?= $data_forum[0]->lokasi ?></td>
                          </tr>
                          <tr>
                            <td>Website</td>
                            <td></td>
                            <td>:</td>
                            <td><?= $data_forum[0]->website ?></td>
                          </tr>
                          <tr>
                            <td>Nama Penanggung Jawab</td>
                            <td></td>
                            <td>:</td>
                            <td><?= $data_forum[0]->nama_lengkap ?></td>
                          </tr>
                          <tr>
                            <td>Nomor Handphone</td>
                            <td></td>
                            <td>:</td>
                            <td><?= $data_forum[0]->nomor_handphone ?></td>
                          </tr>
                          <tr>
                            <td>Email</td>
                            <td></td>
                            <td>:</td>
                            <td><?= $data_forum[0]->email ?></td>
                          </tr>
                    </table>
                    
                  </div>
                </li>
              </ul>
              <?php
                if($this->session->userdata('login_relawan') == FALSE) {  ?>
                        <a class="btn btn-outline-primary" href="#" role="button">SILAHKAN LOGIN UNTUK BERGABUNG</a>
                <?php }else { ?>
                    <a class="btn btn-outline-primary" href="#" role="button">GABUNG SEKARANG</a>
                <?php } ?>
            </div>

          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php $this->load->view('template/footer.php') ?>

