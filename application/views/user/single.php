<div style="height: 90px;"></div>
<div class="pt-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8">
                <div class="p-md-5 p-3 bg-white">
                    <div class="mt-sm-5 mt-md-0 mb-md-0 mr-0 mr-md-5">
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <div class="job-post-item-header d-block d-md-flex align-items-center w-100">
                                <h1 class="mr-3 text-black h4">Lowongan <?=$post['title']?> di <?=$post['perusahaan_name']?></h1>
                            </div>
                            <div class="job-post-item-body d-block d-md-flex w-100">
                                <span class="small" title="Telah dilihat oleh <?=number_format($post['viewed'], 0, ',', '.')?> Orang"><i class="fa fa-eye"></i> <?=number_format($post['viewed'], 0, ',', '.')?></span>
                                <span class="small pl-2" title="Dipublikasikan pada <?=$post['posted_text']?>"><i class="fa fa-calendar"></i> <?=$post['posted_text']?></span>
                                <span class="small pl-2" title="Lowongan Kerja <?=ucwords(strtolower($post['kabupaten']))?>"><i class="fas fa-map"></i> <?=ucwords(strtolower($post['kabupaten']))?></span>
                            </div>                            
                        </div>
                        <div class="col-md-4">
                            <!-- GTranslate: https://gtranslate.io/ -->
                            <a href="#" onclick="doGTranslate('en|en');return false;" title="Bahasa Inggris" class="gflag nturl " style="background-position:-0px -0px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="English" /></a>

                            <select onchange="doGTranslate(this);" class="form-control form-control-sm mb-sm-4 mx-sm-auto"><option value="id|en">Terjemahkan</option><option value="en|id">Indonesian</option></select><div id="google_translate_element2"></div>
                        </div>
                    </div>                        
                    </div>
                    <div class="w-100">
                        <span class="small"><a href="<?=base_url()?>" id="breadcrumbs" class="text-secondary">Home</a> / <a href="<?=base_url('perusahaan/').$post['url'];?>" class="text-secondary"><?=$post['perusahaan_name'];?></a> / <a href="<?=base_url('kategori/').$post['category_url'];?>" class="text-secondary"><?=$post['category_name'];?></a> / <?=$post['title']?></span>
                        <script type="application/ld+json">
                            {
                                "@context": "https://schema.org",
                                "@type": "BreadcrumbList",
                                "itemListElement": [{
                                    "@type": "ListItem",
                                    "position": 1,
                                    "name": "www.lokerhub.com",
                                    "item": "<?=base_url();?>"
                                },{
                                    "@type": "ListItem",
                                    "position": 2,
                                    "name": "<?=$post['perusahaan_name'];?>",
                                    "item": "<?=base_url('perusahaan/').$post['url'];?>"
                                },{
                                    "@type": "ListItem",
                                    "position": 3,
                                    "name": "<?=$post['title']?>"
                                }]
                            }
                        </script>
                    </div>
                    <!-- ShareThis BEGIN --><div class="sharethis-inline-share-buttons my-3"></div><!-- ShareThis END -->
                    <!-- <p>
                        Telah dibuka lowongan kerja <?=$post['title']?> di <a href="<?=base_url('perusahaan/').$post['url']?>"><?=$post['perusahaan_name'];?></a>
                         untuk ditempatkan di <a href="<?=base_url('lokasi/').$post['kabupaten_url'];?>"><?=ucwords(strtolower($post['kabupaten']))?></a>, 
                         <?=ucwords($post['provinsi'])?>.
                         Info loker ini telah dipublikasikan via <?=$this->config->item('site_name');?> pada <?=$post['posted_text']?>, 
                         sehingga Anda tidak perlu khawatir dengan ketersediaan lowongan kerja <?=$post['perusahaan_name'];?> ini.
                    </p> -->
                    <p><b>Lowongan Kerja <?=$post['title'];?></b> - <a href="<?=base_url('perusahaan/').$post['url']?>"><?=$post['perusahaan_name'];?></a> membuka lowongan kerja <?=$post['title']?>.
                    Info lowongan kerja ini kami sajikan dengan data yang kredibel dan terbaru untuk Anda yang sedang mencari kerja. </p>
                    <img data-src="<?=$post['logo'];?>" alt="<?=$post['title'];?>" title="Lowongan <?=$post['perusahaan_name']?>" class="lazy img img-fluid rounded mx-auto my-3 d-block col-md-5">
                    <p>Info loker ini dipublikasikan pada <?=$post['posted_text']?> sehingga Anda tidak perlu khawatir perihal ketersediaan lowongan kerja tersebut.  .Simak lebih lanjut tentang lowongan <?=strtolower($post['title'])?>.
                    </p>
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <ins class="adsbygoogle"
                         style="display:block; text-align:center;"
                         data-ad-layout="in-article"
                         data-ad-format="fluid"
                         data-ad-client="ca-pub-1016503767419159"
                         data-ad-slot="8603751936"></ins>
                    <script>
                         (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                    <h2 class="h5" id="deskripsi">Deskripsi Lowongan <?=$post['title']?></h2>
                    <?=$post['loker_description'];?>
                    <div class="ml-5  small">
                        <i>
                            <b>Lihat Juga:</b>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><a href="<?=base_url('kategori/').$post['category_url'];?>">Lowongan <?=$post['category_name'];?></a></li>
                                <li class="list-group-item"><a href="<?=base_url('lokasi/').$post['kabupaten_url'];?>">Info Loker <?=ucwords(strtolower($post['kabupaten']))?></a></li>
                                <li class="list-group-item"><a href="<?=base_url('lokasi/').$post['provinsi_url'];?>">Info Loker <?=ucwords($post['provinsi'])?></a></li>
                            </ul>
                        </i>
                    </div>
                    <?php if($post['perusahaan_description'] != null):?>
                    <h2 class="h5" id="profile_perusahaan">Profile <?=$post['perusahaan_name'];?></h2>
                    <?=$post['perusahaan_description'];?>
                    <?php endif;?>

                    <h2 class="h5" id="gambaran_perusahaan">Gambaran <?=$post['perusahaan_name'];?></h2>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <?php if($post['industri_name'] != null):?>
                                <tr>
                                    <td>Industri</td>
                                    <td><?=$post['industri_name'];?></td>
                                </tr>
                                <?php endif;?>
                                <?php if($post['website'] != null):?>
                                <tr>
                                    <td>Situs <?=$post['perusahaan_name'];?></td>
                                    <td><a href="<?=$post['website'] != null ? $post['website'] : 'https://www.google.com/search?q='.$post['perusahaan_name'];?>" target="_blank" rel="noopener noreferrer nofollow"><?=$post['website'];?></a></td>
                                </tr>
                                <?php endif;?>
                                <?php if($post['alamat_perusahaan'] != null):?>
                                <tr>
                                    <td>Lokasi <?=$post['perusahaan_name'];?></td>
                                    <td><?=$post['alamat_perusahaan'];?></td>
                                </tr>
                                <?php endif;?>
                                <?php if($post['ukuran_perusahaan'] != null):?>
                                <tr>
                                    <td>Ukuran Perusahaan</td>
                                    <td><?=$post['ukuran_perusahaan'];?></td>
                                </tr>
                                <?php endif;?>
                                <?php if($post['tunjangan'] != null):?>
                                <tr>
                                    <td>Tunjangan</td>
                                    <td><?=$post['tunjangan'];?></td>
                                </tr>
                                <?php endif;?>
                                <?php if($post['bahasa'] != null):?>
                                <tr>
                                    <td>Bahasa</td>
                                    <td><?=$post['bahasa'];?></td>
                                </tr>
                                <?php endif;?>
                                <?php if($post['bahasa'] != null):?>
                                <tr>
                                    <td>Gaya Pakaian</td>
                                    <td><?=$post['fashion'];?></td>
                                </tr>
                                <?php endif;?>
                                <?php if($post['waktu_kerja'] != null):?>
                                <tr>
                                    <td>Waktu Kerja</td>
                                    <td><?=$post['waktu_kerja'];?></td>
                                </tr>
                                <?php endif;?>
                                <tr>
                                    <td>Alamat Perusahaan <?=$post['perusahaan_name'];?></td>
                                    <td>Lihat di <a href="https://www.google.com/maps/search/<?=$post['perusahaan_name'];?>" rel="nofollow" target="_blank">Google Maps</a></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    <?php if($post['why_join_us'] != null):?>
                    <h2 class="h5" id="why_join_us">Mengapa Bergabung dengan <?=$post['perusahaan_name'];?></h2>
                    <?=$post['why_join_us'];?>
                    <?php endif;?>
                    <?php if($post['alamat'] != null):?>
                    <h2 class="h5" id="penempatan_kerja">Penempatan Kerja</h2>
                    <?=$post['alamat'];?>
                    <?php endif;?>
                    <p class="mt-2">
                        Lowongan Kerja ini ditutup pada <b class="text-danger"><?=@$post['deadline_text'];?></b>
                    </p>
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Iklan Bottom in Single Page -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-1016503767419159"
                         data-ad-slot="8293578982"
                         data-ad-format="auto"
                         data-full-width-responsive="true"></ins>
                    <script>
                         (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                    <p class="my-3">
                        <?php if(@$post['expired']):?>
                        <button id="btn-lamar" class="btn btn-danger py-2 px-4 disabled">Lamaran ditutup</button>
                        <?php else:?>
                        <form rel="nofollow" id="apply-form" target="_blank">
                            <?php
                                $url = explode('?fr', $post['apply_job']);
                                $uri = explode('-', $url[0]);
                                $jumlah = count($uri);
                                $id = $uri[$jumlah-1];
                            ?>
                            <input type="hidden" name="job_id" value="<?=$id;?>">
                            <input type="hidden" name="s" value="40">
                            <input type="hidden" name="AdvertisementSource" value="1">
                            <input type="hidden" name="fr">
                            <button id="btn-lamar" type="submit" class="btn btn-success py-2 px-4">Lamar Kerjaan</button>
                        </form>
                        <?php endif;?>
                    </p>
                    <p class="alert alert-sm alert-danger">Disclaimer: Melamar Kerja di <b><?=$this->config->item('site_name');?></b> tidak dipungut biaya.</p>
                    <p class="mt-2">
                        Tags: Info loker <?=strtolower($post['kabupaten']);?>, lowongan <?=strtolower($post['title']);?>, info loker <?=strtolower($post['perusahaan_name']);?>
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-4 mb-3 bg-white">
                    <!-- <h3 class="h5 text-black mb-3">Sponsor</h3> -->
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Iklan Sidebar -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-1016503767419159"
                         data-ad-slot="3606420594"
                         data-ad-format="auto"
                         data-full-width-responsive="true"></ins>
                    <script>
                         (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
                <div class="col-md-12 block-16">
                    <div class="d-flex mb-0">
                    <h2 class="mb-5 h3 mb-0">Lowongan Kerja Sejenis</h2>
                    <div class="ml-auto mt-1"><a href="#" rel="nofollow" class="owl-custom-prev text-success">Prev</a> / <a href="#" rel="nofollow" class="owl-custom-next text-success">Next</a></div>
                    </div>

                    <div class="nonloop-block-16 owl-carousel">
                    <?php foreach($sejenis as $new):?>
                        <div class="border rounded px-4 pt-3 bg-white">
                            <h3 class="h5"><a href="<?=base_url('lowongan/').$new['url'].'/'.$new['permalink'];?>" class="text-success">Lowongan <?=$new['title'];?></a></h3>
                            <span class="d-block"><span class="icon-suitcase mr-1"></span> <a href="<?=base_url('kategori/').$new['category_url'];?>" class="text-secondary"><?=$new['category_name'];?></a></span>
                            <span class="d-block"><span class="icon-building"></span> <a href="<?=base_url('perusahaan/').$new['url']?>" class="text-secondary"><?=$new['perusahaan_name'];?></a></span>
                            <span class="d-block"><span class="icon-room"></span> <a href="<?=base_url('lokasi/').$new['kabupaten_url'];?>" class="text-secondary"><?=ucwords(strtolower($new['kabupaten']));?></a>, <a href="<?=base_url('lokasi/').$new['provinsi_url'];?>" class="text-secondary"><?=ucwords($new['provinsi']);?></a></span>
                            <!-- <span class="d-block"><span class="icon-money mr-1"></span> <a href="/login" class="sm">Login untuk melihat gaji</a></span> -->
                            </p>
                            <p class="mb-0"><?=substr(strip_tags($new['loker_description']), 0, 80);?>...</p>
                            <p>
                                <a href="<?=base_url('lowongan/').$new['url'].'/'.$new['permalink'];?>" class="text-success">Baca Selengkapnya</a>
                            </p>
                        </div>
                      <?php endforeach;?>
                        <div class="border rounded p-4 bg-white">
                            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- Ads Terkait -->
                            <ins class="adsbygoogle"
                                style="display:block"
                                data-ad-client="ca-pub-1016503767419159"
                                data-ad-slot="7624500735"
                                data-ad-format="auto"
                                data-full-width-responsive="true"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
    <div class="pb-5 mt-n5">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-6">
                    <h2>Pertanyaan yang Sering Diajukan</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="accordion unit-8" id="accordion">
                        <div class="accordion-item">
                            <h3 class="mb-0 heading">
                                <a class="btn-block" data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne">Apakah Lowongan <?=$post['title'].' di '.$post['perusahaan_name'];?> Asli?<span class="icon"></span></a>
                            </h3>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="body-text">
                                <p>
                                    Untuk memastikan bahwa lowongan yang ditawarkan <?=$post['title'];?> bukan penipuan. Berikut kami sajikan tips menghindari segala bentuk penipuan tersebut:
                                    <ul>
                                        <li>Pastikan bahwa <?=$post['perusahaan_name'];?> merupakan perusahaan <b>terpercaya</b> dan kredibelnya jelas.</li>
                                        <li>Periksa dan pastikan bahwa <?=$post['perusahaan_name'];?> merupakan perusahaan asli (bukan fiktif).</li>
                                        <li>Berhati-hatilah dengan perusahaan yang hanya menggunakan alamat email publik seperti @gmail.com atau @yahoo.com atau SMS (termasuk aplikasi sejenis TELEGRAM atau WHATSAPP ) sebagai media komunikasi. Perusahaan akan lebih meyakinkan jika memiliki telepon kantor sendiri atau alamat email domain web perusahaan.</li>
                                        <li>Jika Anda dimintai uang untuk alasan administrasi atau apapun, sebaiknya Anda <b>HINDARI</b> lowongan kerja tersebut. Beberapa alasan sering dipakai adalah biaya seragam, biaya training (pelatihan), biaya penggantian materai, dan membayar formulir/surat perjanjian.</li>
                                        <li>Pastikan bahwa lowongan yang Anda apply sesuai dengan judul dari lowongan ini, yaitu <?=$post['title']?> .</li>
                                        <li>Pastikan Anda tidak ditawari bisnis investasi yang mencurigakan atau menjadi member MLM yang tidak jelas</li>
                                    </ul>
                                </p>
                                </div>
                            </div>
                        </div> <!-- .accordion-item -->
                        <div class="accordion-item">
                            <h3 class="mb-0 heading">
                                <a class="btn-block" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo">Disclaimer Melamar via <?=$this->config->item('site_name');?> di <?=$post['perusahaan_name'];?> sebagai <?=$post['title'];?> </a>
                            </h3>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="body-text">
                                <p>Sebelum Anda melamar lowongan <?=$post['title'];?> ini atau menekan tombol <b>Lamar Pekerjaan</b>, Anda harus mengerti dan mengaplikasikan setiap ketentuan dari situs kami ( <?=$this->config->item('site_name');?> ) sebagai berikut:</p>
                                <ul class="list-group mb-3 style="line-height: 25px;">
                                    <li>Iklan Lowongan Pekerjaan ini dibuat oleh <?=$post['perusahaan_name'];?> , kami tidak pernah mengubah / menambahkan / memvalidasi setiap lowongan kerja secara langsung. </li>
                                    <li>Semua iklan Lowongan Kerja ini bersumber dari web <b>Jobstreet</b>, kami TIDAK AKAN PERNAH meminta biaya baik secara langsung maupun melalui perusahaan bersangkutan.</li>
                                    <li>Segala transaksi yang terjadi saat Anda melamar dalam iklan <?=$post['title'];?> di luar dari tanggung jawab kami.</li> <li>Di situs kami ini anda akan menemukan banyak link, berupa banner maupun text, ke situs lain. Tetapi kami tidak betanggungjawab atas isi dan akibat yang ditimbulkan dari situs-situs tersebut</li>
                                </ul>
                                </div>
                            </div>
                        </div> <!-- .accordion-item -->
                    </div>
                </div>
            </div>        
        </div>
    </div>
    <div class="bg-light py-5">
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
<script>
    $('#apply-form').submit(function(e){
        e.preventDefault();
        var uri = $(this).serialize();
        var url = "https://myjobstreet-id.jobstreet.co.id/application/online-apply.php?";
        window.open(url+uri);
    });
</script>