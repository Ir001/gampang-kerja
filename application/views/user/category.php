    <div style="height: 90px;"></div>
    <div class="clearfix"></div>
    <?php if($this->uri->segment(2) != null):?>
      <div class="my-5 bg-white">
        <div class="container">
            <div class="row">
              <div class="col-md-8 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                  <h2 class="h3" id="#lowongan"><?=ucwords($category_name);?></h2>
                  <p><small>Lowongan kerja</small></p>
                  <div class="rounded border jobs-wrap">
                      <?php foreach($result as $job):?>
                      <a href="<?=base_url('lowongan/').strtolower(str_replace(' ', '-', $job['perusahaan_name'])).'/'.$job['permalink'];?>" class="job-item d-block d-md-flex align-items-center freelance">
                          <div class="company-logo blank-logo text-center text-md-left pl-3">
                          <img src="<?=$job['logo'];?>" alt="<?=$job['title'];?>" class="img-fluid mx-auto">
                          </div>
                          <div class="job-details h-100">
                          <div class="p-3 align-self-center">
                              <h3><?=$job['title'];?></h3>
                              <div class="d-block d-lg-flex">
                              <div class="mr-3"><span class="icon-building mr-1"></span> <?=$job['perusahaan_name'];?></div>
                              <!-- <div class="mr-3"><span class="icon-suitcase mr-1"></span> <?=$job['category_name'];?></div> -->
                              <div class="mr-3"><span class="icon-room mr-1"></span> 
                                  <?=ucwords(strtolower($job['nama_kabupaten'])).', '.ucwords($job['nama_provinsi']);?>
                              </div>
                              <!-- <div><span class="icon-money mr-1"></span> $55000 &mdash; 70000</div> -->
                              </div>
                          </div>
                          </div>
                          <div class="job-category align-self-center">
                          <div class="p-3">
                              <span class="text-warning p-2 rounded border border-warning"><?=$job['category_name'];?></span>
                          </div>
                          </div>  
                      </a>
                      <?php endforeach;?>
                  </div>
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
                <h2><?=$cat['category_name'];?></h2>
                <span class="counting"><?=$cat['total'];?></span>
               </a>
            </div>
        <?php endforeach;?>
        </div>

      </div>
    </div>