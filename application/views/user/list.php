    <div style="height: 113px;"></div>

    <div class="bg-light py-4">
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
                            <?=@$search != null || $kota != null ? '<input type="button" id="btn-clear" class="btn btn-sm mt-2 btn-info" value="Bersihkan Riwayat Pencarian">' : '';?>
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
                    <p class="small">atau cari loker berdasarkan kategori: <a href="<?=base_url('kategori/it-perangkat-lunak')?>" class="category">IT Perangkat Lunak</a>, <a href="<?=base_url('kategori/staff-administrasi-umum')?>" class="category">Staff / Administrasi / Umum</a>, <a href="<?=base_url('kategori')?>" class="category">Lihat Semua Kategori</a></p>
                    </div>
                </div>
                
                </form>
            </div>
            </div>
        </div>
    </div>
    <div class="my-5 bg-white">
        <div class="container">
            <div class="row">
            <div class="col-md-8 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                <h2 class="h3" id="#lowongan"><?=$_SESSION['q'] == null && $_SESSION['kota'] == null ? 'Info Lowongan Kerja' : 'Hasil Pencarian'; ?></h2>
                <p><small>Lowongan kerja <?=@$search != null ? ucwords(htmlspecialchars($search)) : '';?> di <?=@$kota != null ? ucwords(htmlspecialchars($kota)) : 'Indonesia';?></small></p>
                <div class="rounded border jobs-wrap">
                    <?php $i=0; foreach($result as $job):?>
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
                    <?php $i++; endforeach;?>
                    
                </div>
                <?php if($i == 0):?>
                    <h2 class="h6 mt-2">Maaf Lowongan Kerja yang Anda cari tidak tersedia. Harap cari dengan kata kunci yang berbeda.</h2>
                <?php endif;?>
                <div class="col-md-12 text-center mt-5">
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
    <script>
        $('#btn-clear').click(function(){
            $.ajax({
                url : '<?=base_url('home/clear')?>',
                type : 'POST',
                data : {confirm : 1},
                dataType : 'json',
                success : function(data){
                    if (data.status) {
                        setTimeout(() => {
                            window.location.replace('<?=base_url('job');?>');
                        }, 800);
                    }else{
                        console.log('Gagal menghapus riwayat pencarian');
                    }
                }
            });
        });
    </script>