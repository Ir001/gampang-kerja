
        <div style="height: 120px;"></div>
        <div class="site-blocks-cover overlay" style="background: url('<?=base_url('assets/');?>images/hero_1.jpg') center center fixed;" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center">
            <div class="col-md-12 py-3">
                <h1>Cari Lowongan Kerja</h1>
                <form action="<?=base_url('job')?>" method="post">
                <div class="row mb-3">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <input type="text" name="q" class="mr-3 form-control border-0 px-4" placeholder="pekerjaan, keywords atau nama perusahaan ">
                            </div>
                            <div class="col-md-6 mb-3 mb-md-0">
                                <div class="input-wrap">
                                    <span class="icon icon-room"></span>
                                    <input type="text" name="kota" class="form-control form-control-block search-input  border-0 px-4" id="autocomplete" placeholder="kabupaten atau kota" onFocus="geolocate()">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <input type="submit" class="btn btn-search btn-success btn-block" value="Cari">
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <p class="small">atau cari loker berdasarkan kategori: <a href="<?=base_url('kategori/it-perangkat-lunak')?>" class="category">IT Perangkat Lunak</a>, <a href="<?=base_url('kategori/manufaktur')?>" class="category">Manufaktur</a>,  <a href="<?=base_url('kategori')?>" class="category">Lihat Kategori</a></p>
                </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>
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
                        <span class="d-block mb-3 text-success">
                            <i class="icon <?=$cat['icon'];?>"></i>
                        </span>
                        <h2>Loker <?=$cat['category_name'];?></h2>
                        <span class="counting text-success small"><?=$cat['total'];?></span>
                        </a>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
        <div class="py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-8" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="mb-5 h3">Lowongan Kerja Terbaru <?=date('Y');?></h2>
                        <div class="rounded border jobs-wrap">
                            <?php foreach($result as $job):?>
                            <a href="<?=base_url('lowongan/').strtolower(str_replace(' ', '-', $job['perusahaan_name'])).'/'.$job['permalink'];?>" class="job-item d-block d-md-flex align-items-center freelance">
                                <div class="company-logo blank-logo text-center text-md-left pl-3">
                                    <img src="<?=$job['logo'];?>" alt="Logo <?=$job['perusahaan_name'];?>" title="Logo <?=$job['perusahaan_name'];?>" class="img-fluid mx-auto">
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
                            <a href="<?=base_url('job');?>" class="btn btn-success rounded py-3 px-5"><span class="icon-plus-circle"></span> Lihat Lebih Banyak</a>
                        </div>
                    </div>
                    <div class="col-md-4 block-16" data-aos="fade-up" data-aos-delay="200">
                        <div class="d-flex mb-0">
                            <h2 class="mb-5 h3 mb-0">Lowongan Terpilih</h2>
                            <div class="ml-auto mt-1">
                                <a href="#" class="owl-custom-prev text-success">Prev</a> / <a href="#" class="owl-custom-next text-success">Next</a>
                            </div>
                        </div>
                        <div class="nonloop-block-16 owl-carousel">
                            <?php foreach($terbaru as $new):?>
                                <div class="border rounded px-4 pt-3 bg-white">
                                    <h3 class="h5"><a href="<?=base_url('lowongan/').strtolower(str_replace(' ', '-', $new['perusahaan_name'])).'/'.$new['permalink'];?>" class="text-success">Lowongan <?=$new['title'];?></a></h3>
                                    <span class="d-block"><span class="icon-suitcase mr-1"></span> <a href="<?=base_url('kategori/').str_replace(' ','-', strtolower($new['category_name']));?>" class="text-secondary"><?=$new['category_name'];?></a></span>
                                    <span class="d-block"><span class="icon-building"></span> <a href="<?=base_url('perusahaan/').str_replace(' ','-', strtolower($new['perusahaan_name']));?>" class="text-secondary"><?=$new['perusahaan_name'];?></a></span>
                                    <span class="d-block"><span class="icon-room"></span> <a href="<?=base_url('lokasi/').str_replace(' ','-', str_replace('.','', strtolower($new['nama_kabupaten'])));?>" class="text-secondary"><?=ucwords(strtolower($new['nama_kabupaten']));?></a>, <a href="<?=base_url('lokasi/').str_replace(' ','-', strtolower($new['nama_provinsi']));?>" class="text-secondary"><?=ucwords($new['nama_provinsi']);?></a></span>
                                    <!-- <span class="d-block"><span class="icon-money mr-1"></span> <a href="/login" class="sm">Login untuk melihat gaji</a></span> -->
                                    </p>
                                    <p class="mb-0"><?=substr(strip_tags($new['loker_description']), 0, 80);?>...</p>
                                    <p>
                                        <a href="<?=base_url('lowongan/').strtolower(str_replace(' ', '-', $new['perusahaan_name'])).'/'.$new['permalink'];?>" class="text-success">Baca Selengkapnya</a>
                                    </p>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="py-5 block-15">
            <div class="container">
                <div class="row">
                <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                    <h2>Blog Terbaru</h2>
                </div>
                </div>


                <div class="nonloop-block-15 owl-carousel">
                

                    <div class="media-with-text">
                    <div class="img-border-sm mb-4">
                        <a href="#" class="image-play">
                        <img src="images/img_1.jpg" alt="" class="img-fluid">
                        </a>
                    </div>
                    <h2 class="heading mb-0 h5"><a href="#">Jobs are made easy</a></h2>
                    <span class="mb-3 d-block post-date">January 20, 2018 &bullet; By <a href="#">Josh Holmes</a></span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolores culpa qui aliquam placeat nobis veritatis tempora natus rerum obcaecati.</p>
                    </div>
                
                    <div class="media-with-text">
                    <div class="img-border-sm mb-4">
                        <a href="#" class="image-play">
                        <img src="images/img_2.jpg" alt="" class="img-fluid">
                        </a>
                    </div>
                    <h2 class="heading mb-0 h5"><a href="#">Jobs are made easy</a></h2>
                    <span class="mb-3 d-block post-date">January 20, 2018 &bullet; By <a href="#">Josh Holmes</a></span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolores culpa qui aliquam placeat nobis veritatis tempora natus rerum obcaecati.</p>
                    </div>
                
                    <div class="media-with-text">
                    <div class="img-border-sm mb-4">
                        <a href="#" class="image-play">
                        <img src="images/img_3.jpg" alt="" class="img-fluid">
                        </a>
                    </div>
                    <h2 class="heading mb-0 h5"><a href="#">Jobs are made easy</a></h2>
                    <span class="mb-3 d-block post-date">January 20, 2018 &bullet; By <a href="#">Josh Holmes</a></span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolores culpa qui aliquam placeat nobis veritatis tempora natus rerum obcaecati.</p>
                    </div>

                    <div class="media-with-text">
                    <div class="img-border-sm mb-4">
                        <a href="#" class="image-play">
                        <img src="images/img_1.jpg" alt="" class="img-fluid">
                        </a>
                    </div>
                    <h2 class="heading mb-0 h5"><a href="#">Jobs are made easy</a></h2>
                    <span class="mb-3 d-block post-date">January 20, 2018 &bullet; By <a href="#">Josh Holmes</a></span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolores culpa qui aliquam placeat nobis veritatis tempora natus rerum obcaecati.</p>
                    </div>
                
                    <div class="media-with-text">
                    <div class="img-border-sm mb-4">
                        <a href="#" class="image-play">
                        <img src="images/img_2.jpg" alt="" class="img-fluid">
                        </a>
                    </div>
                    <h2 class="heading mb-0 h5"><a href="#">Jobs are made easy</a></h2>
                    <span class="mb-3 d-block post-date">January 20, 2018 &bullet; By <a href="#">Josh Holmes</a></span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolores culpa qui aliquam placeat nobis veritatis tempora natus rerum obcaecati.</p>
                    </div>
                
                    <div class="media-with-text">
                    <div class="img-border-sm mb-4">
                        <a href="#" class="image-play">
                        <img src="images/img_3.jpg" alt="" class="img-fluid">
                        </a>
                    </div>
                    <h2 class="heading mb-0 h5"><a href="#">Jobs are made easy</a></h2>
                    <span class="mb-3 d-block post-date">January 20, 2018 &bullet; By <a href="#">Josh Holmes</a></span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolores culpa qui aliquam placeat nobis veritatis tempora natus rerum obcaecati.</p>
                    </div>
                    
                    <div class="media-with-text">
                    <div class="img-border-sm mb-4">
                        <a href="#" class="image-play">
                        <img src="images/img_1.jpg" alt="" class="img-fluid">
                        </a>
                    </div>
                    <h2 class="heading mb-0 h5"><a href="#">Jobs are made easy</a></h2>
                    <span class="mb-3 d-block post-date">January 20, 2018 &bullet; By <a href="#">Josh Holmes</a></span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolores culpa qui aliquam placeat nobis veritatis tempora natus rerum obcaecati.</p>
                    </div>
                
                    <div class="media-with-text">
                    <div class="img-border-sm mb-4">
                        <a href="#" class="image-play">
                        <img src="images/img_2.jpg" alt="" class="img-fluid">
                        </a>
                    </div>
                    <h2 class="heading mb-0 h5"><a href="#">Jobs are made easy</a></h2>
                    <span class="mb-3 d-block post-date">January 20, 2018 &bullet; By <a href="#">Josh Holmes</a></span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolores culpa qui aliquam placeat nobis veritatis tempora natus rerum obcaecati.</p>
                    </div>
                
                    <div class="media-with-text">
                    <div class="img-border-sm mb-4">
                        <a href="#" class="image-play">
                        <img src="images/img_3.jpg" alt="" class="img-fluid">
                        </a>
                    </div>
                    <h2 class="heading mb-0 h5"><a href="#">Jobs are made easy</a></h2>
                    <span class="mb-3 d-block post-date">January 20, 2018 &bullet; By <a href="#">Josh Holmes</a></span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolores culpa qui aliquam placeat nobis veritatis tempora natus rerum obcaecati.</p>
                    </div>
                </div>

                <div class="row">
                
                </div>
            </div>
        </div> -->