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
                        <div class="job-post-item-body d-block d-md-flex">
                            <div class="mr-3">
                            <span class="fl-bigmug-line-portfolio23"></span><?=ucwords(strtolower($post['kabupaten']));?></div>
                            <div><span class="fl-bigmug-line-big104"></span>,<span><a href="/lokasi/<?=str_replace(' ','-', strtolower($post['provinsi']));?>"><?=ucwords(strtolower($post['provinsi']));?></a></span></div>
                        </div>
                        <div class="py-3">
                            <img src="<?=$post['logo'];?>" alt="<?=$post['title'];?>" class="float-right img img-fluid col-3">

                            <small><a href="/">Home</a> / <a href="/perusahaan/<?=str_replace(' ','-', strtolower($post['perusahaan_name']));?>"><?=$post['perusahaan_name'];?></a> / <a href="/kategori/<?=str_replace(' ','-', strtolower($post['category_name']));?>"><?=$post['category_name'];?></a> / <?=$post['title']?></small>
                        </div>
                    </div>
                    <h2 class="h5">Deskripsi Pekerjaan</h2>
                    <?=$post['loker_description'];?>
                    <h2 class="h5">Profile Perusahaan</h2>
                    <?=$post['perusahaan_description'];?>
                    <h2 class="h5">Gambaran Perusahaan</h2>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Situs</td>
                                <td><?=$post['website'];?></td>
                            </tr>
                            <tr>
                                <td>Ukuran Perusahaan</td>
                                <td><?=$post['ukuran_perusahaan'];?></td>
                            </tr>
                            <tr>
                                <td>Gaya Pakaian</td>
                                <td><?=$post['bahasa'];?></td>
                            </tr>
                            <tr>
                                <td>Waktu Kerja</td>
                                <td><?=$post['waktu_kerja'];?></td>
                            </tr>
                            <tr>
                                <td>Alamat Perusahaan</td>
                                <td>Lihat di <a href="https://www.google.com/maps/search/<?=$post['perusahaan_name'];?>" rel="nofollow" target="_blank">Google Maps</a></td>
                            </tr>
                            
                        </tbody>
                    </table>
                    <h2 class="h5">Mengapa Bergabung dengan Kami</h2>
                    <?=$post['why_join_us'];?>
                    <h2 class="h5">Penempatan Kerja</h2>
                    <?=$post['alamat'];?>
                    <p class="mt-3"><button id="btn-lamar" class="btn btn-primary py-2 px-4">Lamar Kerjaan</button></p>
                    <p class="alert alert-sm alert-danger">Disclaimer: Melamar Kerja di <b>GampangKerja</b> tidak dipungut biaya</p>
                        <div class="sharethis-inline-share-buttons py-3"></div>
                    </div>
            </div>
            <div class="col-lg-4">
                <div class="p-4 mb-3 bg-white">
                <h3 class="h5 text-black mb-3">Sponsor</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto hic consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur</p>
                </div>
                <div class="col-md-12 block-16" data-aos="fade-up" data-aos-delay="200">
                    <div class="d-flex mb-0">
                    <h2 class="mb-5 h3 mb-0">Loker Sejenis</h2>
                    <div class="ml-auto mt-1"><a href="#" class="owl-custom-prev">Prev</a> / <a href="#" class="owl-custom-next">Next</a></div>
                    </div>

                    <div class="nonloop-block-16 owl-carousel">
                    <?php foreach($sejenis as $terkait):?>
                        <div class="border rounded p-4 bg-white">
                            <h2 class="h5"><a href="<?=base_url()?>lowongan/<?=str_replace(' ', '-',strtolower($terkait['perusahaan_name']))?>/<?=$terkait['permalink'];?>"><?=$terkait['title'];?></a></h2>
                            <p><span class="border border-warning rounded p-1 px-2 text-warning"><?=$terkait['category_name'];?></span></p>
                            <p>
                            <span class="d-block"><span class="icon-building"></span> <?=$terkait['perusahaan_name'];?></span>
                            <span class="d-block"><span class="icon-room"></span> <?=ucwords(strtolower($terkait['kabupaten'])).', '.ucwords($terkait['provinsi']);?></span>
                            <!-- <span class="d-block"><span class="icon-money mr-1"></span> <a href="/login" class="sm">Login untuk melihat gaji</a></span> -->
                            </p>
                            <p class="mb-0"><?=substr($terkait['loker_description'], 0, 250);?></p>
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
                    <a class="btn-block" data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne">Apakah <?=$post['title'];?> Asli?<span class="icon"></span></a>
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
            </div>
            </div>
            </div>
        
        </div>
    </div>
    <div class="bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
            <div class="col-12">
                <h1 class="h4">Cari Lowongan Kerja</h1>
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
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5e9443acf4621e00127d1905&product=inline-share-buttons&cms=website' async='async'></script>
<script>
    $('#btn-lamar').click(function(){
        window.open('<?=$post['apply_job']?>', '_blank')
    })
</script>