<div style="height: 90px;"></div>
    <div class="clearfix"></div>
    <?php if($this->uri->segment(2) != null):?>
      <div class="my-5 bg-white">
        <div class="container">
            <div class="row">
              <div class="col-md-8 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                  <h2 class="h3" id="#lowongan">Loker <?=ucwords($lokasi);?></h2>
                  <p><small>Info Lowongan kerja di <?=strtoupper($lokasi);?></small></p>
                  <div class="rounded border jobs-wrap">
                      <?php $i=0; foreach($result as $job):?> 
                        <a href="<?=base_url('lowongan/').strtolower(str_replace(' ', '-', $job['perusahaan_name'])).'/'.$job['permalink'];?>" class="job-item d-block d-md-flex align-items-center freelance">
                            <div class="company-logo blank-logo text-center text-md-left pl-3">
                                <img src="<?=$job['logo'];?>" alt="<?=$job['title'];?>" class="img-fluid mx-auto">
                            </div>
                            <div class="h-100">
                                <div class="p-3 align-self-center">
                                    <h3><?=$job['title'];?> - <?=$job['perusahaan_name'];?></h3>
                                    <div class="d-block d-lg-flex">
                                    <div class="mr-3"><span class="icon-suitcase mr-1"></span> <?=$job['category_name'];?></div>
                                    <div class="mr-3"><span class="icon-room mr-1"></span> <?=ucwords(strtolower($job['nama_kabupaten'])).', '.ucwords($job['nama_provinsi']);?></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                      <?php $i++; endforeach;?>
                  </div>
                    <?php if($i == 0):?>
                        <h2 class="h6 mt-2">Mohon Maaf Lowongan Kerja di <?=ucwords($lokasi);?> belum tersedia untuk sementara waktu. Harap periksa kembali secara berkala.</h2>
                        <a href="<?=base_url('job');?>" class="btn btn-success btn-sm"><i class="fa fa-xs fa-arrow-left"></i> Cari Lowongan Kerja</a>
                    <?php endif;?>
                  <div class="col-md-12 text-center mt-5">
                  <!-- <a href="#" class="btn btn-primary rounded py-3 px-5"><span class="icon-plus-circle"></span> Show More Jobs</a> -->
                  <?=$pagination;?>
                  </div>
              </div>
              <div class="col-md-4 block-16" data-aos="fade-up" data-aos-delay="200">
                  <div class="d-flex mb-0">
                  <h2 class="mb-5 h3 mb-0">Lowongan Terbaru</h2>
                  <div class="ml-auto mt-1"><a href="#" class="owl-custom-prev">Prev</a> / <a href="#" class="owl-custom-next">Next</a></div>
                  </div>

                  <div class="nonloop-block-16 owl-carousel">
                      <?php foreach($terbaru as $new):?>
                      <div class="border rounded p-4 bg-white">
                          <h2 class="h5"><?=$new['title'];?></h2>
                          <p><span class="border border-warning rounded p-1 px-2 text-warning"><?=$new['category_name'];?></span></p>
                          <p>
                          <span class="d-block"><span class="icon-building"></span> <?=$new['perusahaan_name'];?></span>
                          <span class="d-block"><span class="icon-room"></span> <?=ucwords(strtolower($new['nama_kabupaten'])).', '.ucwords($new['nama_provinsi']);?></span>
                          <!-- <span class="d-block"><span class="icon-money mr-1"></span> <a href="/login" class="sm">Login untuk melihat gaji</a></span> -->
                          </p>
                          <p class="mb-0">
                              <?php 
                                  $desciption=$new['loker_description'];
                                  if(preg_match('/^.{1,260}\b/s', $new['loker_description'], $match)){
                                      $desciption=$match[0];
                                  }
                                  echo $desciption;
                              ?>
                          </p>
                      </div>
                      <?php endforeach;?>

                  </div>

              </div>
            </div>
        </div>
      </div>
    <?php else:?>
    <div class="bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
            <div class="col-12" data-aos="fade">
                <h1 class="h4">Cari Lowongan Kerja</h1>
                <form action="<?=base_url('job');?>" method="post">
                <div class="row mb-3">
                    <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6 mb-3 mb-md-0">
                        <input type="text" name="q" value="<?=@$search != null ? ucwords(htmlspecialchars($search)) : '';?>" class="mr-3 form-control shadow border-0 px-4" placeholder="pekerjaan, keywords atau nama perusahaan ">
                        </div>
                        <div class="col-md-6 mb-3 mb-md-0">
                        <div class="input-wrap">
                            <span class="icon icon-room"></span>
                        <input type="text" name="kota" value="<?=@$kota != null ? ucwords(htmlspecialchars($kota)) : '';?>" class="form-control shadow form-control-block search-input  border-0 px-4" placeholder="kabupaten atau kota">
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <input type="submit" class="btn btn-search btn-primary btn-block" value="Cari">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <p class="small">atau cari berdasarkan kategori: <a href="#" class="category">Teknik Informasi</a>, <a href="#" class="category">Sales Marketing</a>, <a href="/kategori" class="category">Lihat Semua Kategori</a></p>
                    </div>
                </div>
                
                </form>
            </div>
            </div>
        </div>
    </div>
    <?php endif;?>