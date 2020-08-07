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
                            <small><a href="/">Home</a> / <a href="/page/<?=$post['permalink'];?>"><?=$post['title'];?></a> </small>
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
                    <div class="ml-auto mt-1"><a href="#" class="owl-custom-prev">Prev</a> / <a href="#" class="owl-custom-next">Next</a></div>
                    </div>

                    <div class="nonloop-block-16 owl-carousel">
                    <?php foreach($sejenis as $terkait):?>
                        <div class="border rounded p-4 bg-white">
                            <h2 class="h5"><a href="<?=base_url()?>lowongan/<?=str_replace(' ', '-',strtolower($terkait['perusahaan_name']))?>/<?=$terkait['permalink'];?>"><?=$terkait['title'];?></a></h2>
                            <p><span class="border border-warning rounded p-1 px-2 text-warning"><?=$terkait['category_name'];?></span></p>
                            <p>
                            <span class="d-block"><span class="icon-building"></span> <?=$terkait['perusahaan_name'];?></span>
                            <span class="d-block"><span class="icon-room"></span> <?=ucwords(strtolower($terkait['nama_kabupaten'])).', '.ucwords($terkait['nama_provinsi']);?></span>
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
    <div class="py-5">
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