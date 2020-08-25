    <div style="height: 90px;"></div>
    <div class="clearfix"></div>
    <?php if($this->uri->segment(2) != null):?>
      <div class="my-5 bg-white">
        <div class="container">
            <div class="row">
              <div class="col-md-8 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                  <h1 class="h3" id="#lowongan">Loker <?=ucwords($category_name);?></h1>
                  <p><small>Info Lowongan kerja <?=ucwords($category_name);?> <?=date('Y')?> terbaru</small></p>
                  <div class="rounded border jobs-wrap">
                      <?php foreach($result as $job):?>
                      <a href="<?=base_url('lowongan/').strtolower(str_replace(' ', '-', $job['perusahaan_name'])).'/'.$job['permalink'];?>" class="job-item d-block d-md-flex align-items-center freelance">
                          <div class="company-logo blank-logo text-center text-md-left pl-3">
                              <img src="<?=$job['logo'];?>" alt="<?=$job['title'];?>" class="img-fluid mx-auto">
                          </div>
                          <div class="h-100">
                              <div class="p-3 align-self-center">
                                  <h3>Lowongan <?=$job['title'];?> di <?=$job['perusahaan_name'];?></h3>
                                  <div class="d-block d-lg-flex">
                                  <div class="mr-3"><span class="icon-suitcase mr-1"></span> <?=$job['category_name'];?></div>
                                  <div class="mr-3"><span class="icon-room mr-1"></span> <?=ucwords(strtolower($job['nama_kabupaten'])).', '.ucwords($job['nama_provinsi']);?></div>
                                  </div>
                              </div>
                          </div>
                      </a>
                      <?php endforeach;?>
                  </div>
                  <div class="col-md-12 text-center mt-5">
                  <?=$pagination;?>
                  </div>
              </div>
              <div class="col-md-4 block-16" data-aos="fade-up" data-aos-delay="200">
                  <div class="d-flex mb-0">
                  <h2 class="mb-5 h3 mb-0">Loker Terbaru</h2>
                  <div class="ml-auto mt-1"><a href="#" rel="nofollow" class="owl-custom-prev">Prev</a> / <a href="#" rel="nofollow" class="owl-custom-next">Next</a></div>
                  </div>

                  <div class="nonloop-block-16 owl-carousel">
                      <?php foreach($terbaru as $new):?>
                        <div class="border rounded px-4 pt-3 bg-white">
                            <h3 class="h5"><a href="<?=base_url('lowongan/').strtolower(str_replace(' ', '-', $new['perusahaan_name'])).'/'.$new['permalink'];?>">Lowongan <?=$new['title'];?></a></h3>
                            <span class="d-block"><span class="icon-suitcase mr-1"></span> <a href="<?=base_url('kategori/').str_replace(' ','-', strtolower($new['category_name']));?>" class="text-secondary"><?=$new['category_name'];?></a></span>
                            <span class="d-block"><span class="icon-building"></span> <a href="<?=base_url('perusahaan/').str_replace(' ','-', strtolower($new['perusahaan_name']));?>" class="text-secondary"><?=$new['perusahaan_name'];?></a></span>
                            <span class="d-block"><span class="icon-room"></span> <a href="<?=base_url('lokasi/').str_replace(' ','-', str_replace('.','', strtolower($new['nama_kabupaten'])));?>" class="text-secondary"><?=ucwords(strtolower($new['nama_kabupaten']));?></a>, <a href="<?=base_url('lokasi/').str_replace(' ','-', strtolower($new['nama_provinsi']));?>" class="text-secondary"><?=ucwords($new['nama_provinsi']);?></a></span>
                            <!-- <span class="d-block"><span class="icon-money mr-1"></span> <a href="/login" class="sm">Login untuk melihat gaji</a></span> -->
                            </p>
                            <p class="mb-0"><?=substr(strip_tags($new['loker_description']), 0, 80);?>...</p>
                            <p>
                                <a href="<?=base_url('lowongan/').strtolower(str_replace(' ', '-', $new['perusahaan_name'])).'/'.$new['permalink'];?>">Baca Selengkapnya</a>
                            </p>
                        </div>
                      <?php endforeach;?>

                  </div>

              </div>
            </div>
        </div>
      </div>
    <?php endif;?>
    <div class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2 class="mb-3">Kategori Lowongan Kerja</h2>
          </div>
        </div>
        <div class="row">
        <?php foreach($category as $cat):?>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-3" data-aos="fade-up" data-aos-delay="100">
              <a href="<?=base_url('kategori/');?><?=str_replace(' ', '-', strtolower($cat['category_name']));?>" class="h-100 feature-item">
                <span class="d-block mb-3 text-primary">
                    <i class="icon <?=$cat['icon'];?>"></i>
                </span>
                <h2>Lowongan <?=$cat['category_name'];?></h2>
                <span class="counting"><?=$cat['total'];?></span>
               </a>
            </div>
        <?php endforeach;?>
        </div>

      </div>
    </div>