<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <form id="formPost" novalidate>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="">Apply Job</label>
                                    <input type="text" class="form-control" name="apply_job" placeholder="URL" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Judul</label>
                                    <input type="text" class="form-control" name="judul" placeholder="Judul Lowongan" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="description" cols="30" rows="20" class="textarea" required></textarea>
                                </div>
                                <div class="form-group">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""><a href="<?=base_url('manager/perusahaan')?>" target="_blank">Perusahaan</a></label>
                                    <select name="perusahaan_id" class="form-control" id="perusahaan_id" required>
                                        <option value="1" selected hidden>Pilih Perusahaan</option>
                                        <?php foreach($perusahaan as $company): ;?>
                                            <option value="<?=$company['id'];?>"><?=$company['perusahaan_name'];?></option>
                                        <?php endforeach ;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Provinsi</label>
                                    <select name="prov_id" class="form-control select2-blue" id="select_prov" required>
                                        <option selected hidden>Pilih Provinsi</option>
                                        <?php foreach($provinsi as $prov): ;?>
                                            <option value="<?=$prov['id'];?>"><?=$prov['provinsi_name'];?></option>
                                        <?php endforeach ;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Kabupaten</label>
                                    <select name="kab_id" class="form-control select2-blue" id="select_kab" required>
                                        <option selected hidden>Pilih Kabupaten</option>
                                        <?php foreach($kabupaten as $kab): ;?>
                                            <option value="<?=$kab['id'];?>"><?=$kab['kabupaten_name'];?></option>
                                        <?php endforeach ;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for=""><a href="<?=base_url('manager/kategori')?>" target="_blank">Kategori</a></label>
                                    <select name="category_id" class="form-control select2-blue" id="category_id" required>
                                        <option selected hidden>Pilih Kategori</option>
                                        <?php foreach($kategori as $kat): ;?>
                                            <option value="<?=$kat['id'];?>"><?=$kat['category_name'];?></option>
                                        <?php endforeach ;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Permalink</label>
                                    <input type="text" name="permalink" class="form-control" placeholder="Permalink" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat Kerja</label>
                                    <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                                </div>
                                <div class="form-group">
                                    <label for="">Deadline</label>
                                    <input type="date" name="deadline" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Published</label>
                                    <br>
                                    <input type="checkbox" name="status" value='1' checked data-bootstrap-switch data-off-color="danger" data-size="xs" data-on-color="success">
                                </div>
                                <div class="form-group">
                                    <a href="<?=base_url('manager/loker')?>" class="btn btn-sm btn-primary">Kembali</a>
                                    <button type="submit" class="float-right btn btn-sm btn-success">Posting</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    
    $('#perusahaan_id').select2({
        theme : 'bootstrap',
        minimumInputLength: 2,
        tags: [],
        ajax: {
            url: '<?=base_url('function_admin/ajax/perusahaan')?>',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function (term) {
                return {
                    q: term.term
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.perusahaan_name,
                            slug: item.slug,
                            id: item.id
                        }
                    })
                };
            }
        }
    });
    $('#select_prov').select2({
        theme : 'bootstrap',
    });
    $('#select_kab').select2({
        theme : 'bootstrap',
    });
    $('#category_id').select2({
        theme : 'bootstrap',
        minimumInputLength: 2,
        tags: [],
        ajax: {
            url: '<?=base_url('function_admin/ajax/kategori')?>',
            dataType: 'json',
            type: "GET",
            quietMillis: 50,
            data: function (term) {
                return {
                    q: term.term
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.category_name,
                            slug: item.slug,
                            id: item.id
                        }
                    })
                };
            }
        }
    });
    $('.textarea').summernote({
        height : 550,
        placeholder : 'Deskripsi lowongan kerja',
    });
    $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
    $('#formPost').submit(function(e){
        e.preventDefault();
        $.ajax({
            type : 'post',
            url : '/function_admin/lowongan/tambah',
            data : $(this).serialize(),
            dataType : 'json',
            success : function(data){
                if (data.status) {
                    toastr['success'](data.message);
                    setTimeout(() => {
                        window.location.href="/manager/loker/";
                    }, 1000);
                }else{
                    toastr['error'](data.message);
                }
            }
        })
    })
</script>