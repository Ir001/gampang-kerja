<div style="height: 113px;"></div>
<div class="bg-white py-4">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="h1">
                Error 404
            </h1>
            <p>
                Halaman tidak ditemukan
            </p>
            <a href="<?=base_url()?>" class="mx-auto btn btn-primary btn-sm">Go to Home</a>
        </div>
    </div>
</div>
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
                        <input type="text" name="q" value="" class="mr-3 form-control shadow border-0 px-4" placeholder="pekerjaan, keywords atau nama perusahaan ">
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">
                    <div class="input-wrap">
                        <span class="icon icon-room"></span>
                    <input type="text" name="kota" value="" class="form-control shadow form-control-block search-input  border-0 px-4" placeholder="kabupaten atau kota">
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
                <p class="small">atau cari berdasarkan kategori: <a href="<?=base_url('kategori/it-perangkat-lunak');?>" class="category">IT Perangkat Lunak</a>, <a href="<?=base_url('kategori/manufaktur');?>" class="category">Manufaktur</a>, <a href="<?=base_url('kategori');?>" class="category">Lihat Semua Kategori</a></p>
                </div>
            </div>
            
            </form>
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