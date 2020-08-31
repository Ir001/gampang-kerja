<div style="height: 90px;"></div>

<div class="pt-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="p-5 bg-white">
                    <div class="mt-sm-5 mt-md-0 mb-md-1 mr-5">
                        <div class="job-post-item-header d-flex align-items-center">
                            <h1 class="mr-3 text-black h4"><?=$post['title']?></h1>
                            <div class="badge-wrap">
                            <!-- <span class="border border-warning text-warning py-2 px-4 rounded">Freelance</span> -->
                            </div>
                        </div>
                        <div class="py-3">
                            <small><a href="/" id="breadcrumbs" class="text-secondary">Home</a> / <span><?=$post['title'];?></span> </small>
                            <script type="application/ld+json">
                            {
                                "@context": "http://schema.org",
                                "@type": "BreadcrumbList",
                                "itemListElement":[
                                    {
                                        "@type": "ListItem",
                                        "position": 1,
                                        "item":
                                            {
                                                "@id": "<?=base_url();?>",
                                                "url": "<?=base_url();?>",
                                                "name": "www.lokerhub.com"
                                            }
                                    },{
                                        "@type": "ListItem",
                                        "position": 2,
                                        "name": "<?=$post['title']?>"
                                    }			
                                ]
                            }
                        </script>
                    <!-- ShareThis BEGIN --><div class="sharethis-inline-share-buttons my-3"></div><!-- ShareThis END -->

                        </div>
                        <?=$post['content'];?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-4 mb-3 bg-white">
                <!-- <h3 class="h5 text-black mb-3">Sponsor</h3> -->
                </div>
                <div class="col-md-12 block-16" data-aos="fade-up" data-aos-delay="200">
                    <div class="d-flex mb-0">
                    <h2 class="mb-5 h3 mb-0">Loker Terbaru</h2>
                    <div class="ml-auto mt-1"><a href="#" class="owl-custom-prev text-success" rel="nofollow">Prev</a> / <a href="#" class="owl-custom-next text-success">Next</a></div>
                    </div>

                    <div class="nonloop-block-16 owl-carousel">
                    <?php foreach($sejenis as $new):?>
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
                        <div class="border rounded p-4 bg-white">
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
    <div class="py-5">
        <div class="container">
            <div class="row align-items-center">
            <div class="col-12">
                <h3 class="h4">Cari Lowongan Kerja</h3>
                <form action="<?=base_url();?>job" method="post">
                <div class="row mb-3">
                    <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6 mb-3 mb-md-0">
                        <input type="text" name="q" class="mr-3 form-control shadow border-0 px-4" placeholder="pekerjaan, keywords atau nama perusahaan ">
                        </div>
                        <div class="col-md-6 mb-3 mb-md-0">
                        <div class="input-wrap">
                            <span class="icon icon-room"></span>
                        <input type="text" name="kota" class="form-control shadow form-control-block search-input  border-0 px-4" id="autocomplete" placeholder="kabupaten atau kota">
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
                    <p class="small">atau cari loker berdasarkan kategori: <a href="<?=base_url('kategori/it-perangkat-lunak')?>" class="category text-success">IT Perangkat Lunak</a>, <a href="<?=base_url('kategori/staff-administrasi-umum')?>" class="category text-success">Staff / Administrasi / Umum</a>, <a href="<?=base_url('kategori')?>" class="category text-success">Lihat Semua Kategori</a></p>
                    </div>
                </div>
                
                </form>
            </div>
            </div>
        </div>
    </div>
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f3940ba404dcb001210cdc6&product=sop' async='async'></script>
