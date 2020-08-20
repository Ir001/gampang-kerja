<div style="height: 90px;"></div>
<div class="pt-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8">
                <div class="p-md-5 p-3 bg-white">

                    <div class="mt-sm-5 mt-md-0 mb-md-1 mr-5">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="job-post-item-header d-flex align-items-center">
                                <h1 class="mr-3 text-black h4"><?=$post['title']?></h1>
                            </div>
                            <div class="job-post-item-body d-block d-md-flex"></div>
                            <div class="py-3">
                                <small><a href="/">Home</a> / <a href="/perusahaan/<?=str_replace(' ','-', strtolower($post['perusahaan_name']));?>"><?=$post['perusahaan_name'];?></a> / <a href="/kategori/<?=str_replace(' ','-', strtolower($post['category_name']));?>"><?=$post['category_name'];?></a> / <?=$post['title']?></small>
                            </div>
                        </div>
                        <div class="col-md-4 text-sm-center">
                            <!-- GTranslate: https://gtranslate.io/ -->
                            <a href="#" onclick="doGTranslate('en|en');return false;" title="English" class="gflag nturl" style="background-position:-0px -0px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="English" /></a>

                            <select onchange="doGTranslate(this);"><option value="id|en">Pilih Bahasa</option><option value="en|id">Indonesian</option></select><div id="google_translate_element2"></div>
                            <img src="<?=$post['logo'];?>" alt="<?=$post['title'];?>" title="Logo <?=$post['perusahaan_name']?>" class="img img-fluid col-md-8">
                        </div>
                    </div>
                        
                    </div>
                    <!-- ShareThis BEGIN --><div class="sharethis-inline-share-buttons mb-3"></div><!-- ShareThis END -->
                    <h2 class="h5">Deskripsi Pekerjaan</h2>
                    <?=$post['loker_description'];?>
                    <?php if($post['perusahaan_description'] != null):?>
                    <h2 class="h5">Profile Perusahaan</h2>
                    <?=$post['perusahaan_description'];?>
                    <?php endif;?>

                    <h2 class="h5">Gambaran Perusahaan</h2>
                    <table class="table table-bordered">
                        <tbody>
                            <?php if($post['website'] != null):?>
                            <tr>
                                <td>Situs</td>
                                <td><a href="<?=$post['website'] != null ? $post['website'] : 'https://www.google.com/search?q='.$post['perusahaan_name'];?>" target="_blank" rel="noopener noreferrer"><?=$post['website'];?></a></td>
                            </tr>
                            <?php endif;?>
                            <?php if($post['ukuran_perusahaan'] != null):?>
                            <tr>
                                <td>Ukuran Perusahaan</td>
                                <td><?=$post['ukuran_perusahaan'];?></td>
                            </tr>
                            <?php endif;?>
                            <?php if($post['bahasa'] != null):?>
                            <tr>
                                <td>Gaya Pakaian</td>
                                <td><?=$post['bahasa'];?></td>
                            </tr>
                            <?php endif;?>
                            <?php if($post['waktu_kerja'] != null):?>
                            <tr>
                                <td>Waktu Kerja</td>
                                <td><?=$post['waktu_kerja'];?></td>
                            </tr>
                            <?php endif;?>
                            <tr>
                                <td>Alamat Perusahaan</td>
                                <td>Lihat di <a href="https://www.google.com/maps/search/<?=$post['perusahaan_name'];?>" rel="nofollow" target="_blank">Google Maps</a></td>
                            </tr>
                            
                        </tbody>
                    </table>
                    <?php if($post['why_join_us'] != null):?>
                    <h2 class="h5">Mengapa Bergabung dengan Kami</h2>
                    <?=$post['why_join_us'];?>
                    <?php endif;?>
                    <?php if($post['alamat'] != null):?>
                    <h2 class="h5">Penempatan Kerja</h2>
                    <?=$post['alamat'];?>
                    <?php endif;?>
                    <p class="mt-2">
                        Lowongan Kerja ini ditutup pada <b> <?=@$post['deadline_text'];?></b>
                    </p>
                    <p class="my-3">
                        <?php if(@$post['expired']):?>
                        <button id="btn-lamar" class="btn btn-danger py-2 px-4 disabled">Lamaran ditutup</button>
                        <?php else:?>
                        <button id="btn-lamar" class="btn btn-primary py-2 px-4">Lamar Kerjaan</button>
                        <?php endif;?>
                    </p>
                    <p class="alert alert-sm alert-danger">Disclaimer: Melamar Kerja di <b><?=$this->config->item('site_name');?></b> tidak dipungut biaya</p>
                    </div>
            </div>
            <div class="col-lg-4">
                <div class="p-4 mb-3 bg-white">
                    <!-- <h3 class="h5 text-black mb-3">Sponsor</h3> -->
                </div>
                <div class="col-md-12 block-16" data-aos="fade-up" data-aos-delay="200">
                    <div class="d-flex mb-0">
                    <h2 class="mb-5 h3 mb-0">Lowongan Kerja Sejenis</h2>
                    <div class="ml-auto mt-1"><a href="#" rel="nofollow" class="owl-custom-prev">Prev</a> / <a href="#" rel="nofollow" class="owl-custom-next">Next</a></div>
                    </div>

                    <div class="nonloop-block-16 owl-carousel">
                    <?php foreach($sejenis as $terkait):?>
                        <div class="border rounded p-4 bg-white">
                            <h2 class="h5"><a href="<?=base_url()?>lowongan/<?=str_replace(' ', '-',strtolower($terkait['perusahaan_name']))?>/<?=$terkait['permalink'];?>"><?=$terkait['title'];?></a></h2>
                            <span class="d-block"><span class="icon-suitcase"></span> <?=$terkait['category_name'];?></span>
                            <span class="d-block"><span class="icon-building"></span> <?=$terkait['perusahaan_name'];?></span>
                            <span class="d-block"><span class="icon-room"></span> <?=ucwords(strtolower($terkait['kabupaten'])).', '.ucwords($terkait['provinsi']);?></span>
                            <!-- <span class="d-block"><span class="icon-money mr-1"></span> <a href="/login" class="sm">Login untuk melihat gaji</a></span> -->
                            </p>
                            <p class="mb-0"><?=substr($terkait['loker_description'], 0, 100);?>...</p>
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
    <div class="pb-5 mt-n5">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-6" data-aos="fade" >
                    <h2>Pertanyaan yang Sering Diajukan</h2>
                </div>
            </div>
            <div class="row justify-content-center" data-aos="fade" data-aos-delay="100">
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
                        <input type="text" name="kota" class="form-control shadow form-control-block search-input  border-0 px-4" id="autocomplete" placeholder="kabupaten atau kota" onFocus="geolocate()">
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
                    <p class="small">atau cari berdasarkan kategori: <a href="#" class="category">Teknik Informasi</a>, <a href="#" class="category">Sales Marketing</a>, <a href="/category" class="category">Lihat Semua Kategori</a></p>
                    </div>
                </div>
                
                </form>
            </div>
            </div>
        </div>
    </div>
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f3940ba404dcb001210cdc6&product=sop' async='async'></script>
    <script>
    $('#btn-lamar').click(function(){
        window.open('<?=$post['apply_job']?>', '_blank')
    });
</script>