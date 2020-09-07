<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-blue">
            <div class="card-body">
                <div class="mb-3">
                    <button class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#modal_tambah_baru">
                        Tambah Perusahaan
                    </button>
                    <a href="<?=base_url('manager/loker/new')?>" target="_blank" class="btn btn-sm btn-info">
                        Buat Lowongan Baru
                    </a>
                </div>
                <div class="table-responsive">
                    <table id="tbl_perusahaan" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nama Perusahaan</th>
                                <th>Situs</th>
                                <th>Waktu Kerja</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Tambah Baru -->
<div class="modal fade" id="modal_tambah_baru" tabindex="-1" role="dialog" aria-labelledby="modal_tambah_baruTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Tambah Perusahaan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="form_tambah">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Perusahaan *</label>
                                    <input type="text" name="perusahaan_name" class="form-control " placeholder="Nama Perusahaan" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>URL *</label>
                                    <input type="text" name="url" class="form-control" placeholder="URL" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><a href="<?=base_url('manager/industri')?>" target="_blank">Industri</a></label>
                                    <select name="industri_id" id="select_industri" class="form-control" required>
                                        <option value="1" selected hidden>Pilih Industri</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="text" name="logo" class="form-control" placeholder="Logo Perusahaan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Situs</label>
                                    <input type="text" name="situs" class="form-control" placeholder="Situs Perusahaan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ukuran Perusahaan</label>
                                    <input type="text" name="ukuran" class="form-control" placeholder="Ukuran Perusahaan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Alamat Perusahaan</label>
                                    <input type="text" name="alamat" class="form-control" placeholder="Alamat Perusahaan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gaya berpakaian</label>
                                    <input type="text" name="fashion" class="form-control" placeholder="Gaya berpakaian">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Bahasa</label>
                                    <input type="text" name="bahasa" class="form-control" placeholder="Bahasa yang digunakan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tunjangan</label>
                                    <input type="text" name="tunjangan" class="form-control" placeholder="Tunjangan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Waktu Kerja</label>
                                    <input type="text" name="waktu_kerja" class="form-control" placeholder="Waktu kerja">
                                </div>
                            </div>
                        </div>    
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Informasi Perusahaan *</label>
                            <textarea name="description" class="textarea form-control" placeholder="Informasi Pekerjaan"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Mengapa Bergabung dengan Perusahaan *</label>
                            <textarea name="why_join_us" class="textarea form-control" placeholder="Why join us"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- Modal Edit -->
<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="modal_editTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Edit Perusahaan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="form_edit">
        <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Perusahaan *</label>
                                    <input type="hidden" name="id" id="id_edit">
                                    <input type="text" name="perusahaan_name" id="perusahaan_edit" class="form-control " placeholder="Nama Perusahaan" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>URL *</label>
                                    <input type="text" name="url" class="form-control" id="url_edit" placeholder="URL" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><a href="<?=base_url('manager/industri')?>" target="_blank">Industri</a></label>
                                    <select name="industri_id" id="select_industri_edit" class="form-control" required>
                                        <option value="1" selected hidden>Pilih Industri</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="text" name="logo" id="logo_edit" class="form-control" placeholder="Logo Perusahaan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Situs</label>
                                    <input type="text" name="situs" id="situs_edit" class="form-control" placeholder="Situs Perusahaan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ukuran Perusahaan</label>
                                    <input type="text" name="ukuran" id="ukuran_edit" class="form-control" placeholder="Ukuran Perusahaan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Alamat Perusahaan</label>
                                    <input type="text" name="alamat" id="alamat_edit" class="form-control" placeholder="Alamat Perusahaan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gaya berpakaian</label>
                                    <input type="text" name="fashion" id="fashion_edit" class="form-control" placeholder="Gaya berpakaian">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Bahasa</label>
                                    <input type="text" name="bahasa" id="bahasa_edit" class="form-control" placeholder="Bahasa yang digunakan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tunjangan</label>
                                    <input type="text" name="tunjangan" id="tunjangan_edit" class="form-control" placeholder="Tunjangan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Waktu Kerja</label>
                                    <input type="text" name="waktu_kerja" id="waktu_edit" class="form-control" placeholder="Waktu kerja">
                                </div>
                            </div>
                        </div>    
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Informasi Perusahaan *</label>
                            <textarea name="description" class="textarea form-control" id="description_edit" placeholder="Informasi Pekerjaan"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Mengapa Bergabung dengan Perusahaan *</label>
                            <textarea name="why_join_us" class="textarea form-control" id="why_edit" placeholder="Why join us"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary btn-sm">Ubah</button>
            </div>
        </form>
        </div>
    </div>
</div>
<script>
    var table = $('#tbl_perusahaan').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            "url": "/function_admin/perusahaan/datatable",
            "type": "POST",
        },
        columns: [
            {"data": "perusahaan_name"},
            {"data": "website"},
            {"data": "waktu_kerja"},
            {"data": "id", render: function(data, type, row) {
                var html = '<button class="btn btn-info btn-xs btn-edit" data-id="'+row.id+'"><i class="fa fa-pen"></i> Ubah</button> ';
                html+='<button class="btn btn-danger btn-xs  btn-delete" data-id="'+row.id+'"><i class="fa fa-trash"></i> Hapus</button>';
                return html;
            }}
        ],
        order: [[3, 'desc']],
        "fnDrawCallback": function( oSettings ) {
            $('.btn-edit').click(function(){
                var id = $(this).attr('data-id');
                $.ajax({
                    type  : 'post',
                    url : '/function_admin/perusahaan/get',
                    data : {perusahaan_id : id},
                    dataType : 'json',
                    success : function(data){
                        $('#id_edit').val(data.id);
                        $('#perusahaan_edit').val(data.perusahaan_name);
                        $('#url_edit').val(data.url);
                        $('#situs_edit').val(data.website);
                        $('#logo_edit').val(data.logo);
                        $('#alamat_edit').val(data.alamat_perusahaan);
                        $('#select_industri_edit').val(data.industri_id);
                        if ($('#select_industri_edit').find("option[value='" + data.id + "']").length) {
                            $('#select_industri_edit').val(data.id).trigger('change');
                        } else { 
                            // Create a DOM Option and pre-select by default
                            var newOption = new Option(data.industri_name, data.industri_id, true, true);
                            // Append it to the select
                            $('#select_industri_edit').append(newOption).trigger('change');
                        } 
                        $('#select_industri_edit').trigger('change');;
                        $('#fashion_edit').val(data.fashion);
                        $('#bahasa_edit').val(data.bahasa);
                        $('#waktu_edit').val(data.waktu_kerja);
                        $('#ukuran_edit').val(data.ukuran_perusahaan);
                        $('#tunjangan_edit').val(data.tunjangan);
                        $('#description_edit').summernote('code', data.description);
                        $('#why_edit').summernote('code', data.why_join_us);
                        $('#modal_edit').modal('show');
                    }
                });
            });
            $('.btn-delete').click(function(){
                var id = $(this).attr('data-id');
                
                konfirmasi(function(){
                    $.ajax({
                        type  : 'post',
                        url : '/function_admin/perusahaan/hapus',
                        data : {perusahaan_id : id},
                        dataType : 'json',
                        success : function(data){
                            if (data.status) {
                                toastr['success'](data.message);
                                setTimeout(() => {
                                    window.location.reload();
                                }, 800);
                            }else{
                                toastr['error'](data.message);
                            }
                        }
                    })
                })
            })
        }
    });
    $('#select_industri').select2({
        theme : 'bootstrap',
        minimumInputLength: 2,
        tags: [],
        ajax: {
            url: '<?=base_url('function_admin/ajax/industri')?>',
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
                            text: item.industri_name,
                            slug: item.slug,
                            id: item.id
                        }
                    })
                };
            }
        }
    });
    $('#select_industri_edit').select2({
        theme : 'bootstrap',
        minimumInputLength: 2,
        tags: [],
        ajax: {
            url: '<?=base_url('function_admin/ajax/industri')?>',
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
                            text: item.industri_name,
                            slug: item.slug,
                            id: item.id
                        }
                    })
                };
            }
        }
    });
    $('.textarea').summernote({
        height : 160,
        placeholder : '',
    });
    // Tambah Button
    $('#form_tambah').submit(function(e){
        e.preventDefault();
        console.log($(this).serialize());
        $.ajax({
            type : 'post',
            url : '/function_admin/perusahaan/tambah',
            data : $(this).serialize(),
            dataType : 'json',
            success : function(data){
                if (data.status) {
                    toastr['success'](data.message);
                    setTimeout(() => {
                        window.location.reload();
                    }, 800);
                }else{
                    toastr['error'](data.message);
                }
            }
        });
    });
    // Ubah Button
    $('#form_edit').submit(function(e){
        e.preventDefault();
        $.ajax({
            type : 'post',
            url : '/function_admin/perusahaan/ubah',
            data : $(this).serialize(),
            dataType : 'json',
            success : function(data){
                if (data.status) {
                    toastr['success'](data.message);
                    setTimeout(() => {
                        window.location.reload();
                    }, 800);
                }else{
                    toastr['error'](data.message);
                }
            }
        });
    });
    function konfirmasi(req){
        $.confirm({
            title: 'Yakin Menghapus Data?',
            content: 'Data yang sudah dihapus tidak dapat dikembalikan lagi',
            autoClose: 'cancelAction|10000',
            escapeKey: 'cancelAction',
            buttons: {
                confirm: {
                    btnClass: 'btn-red',
                    text: 'Hapus',
                    action: function(){
                        req();
                    }
                },
                cancelAction: {
                    text: 'Batal',
                    action: function(){
                    }
                }
            }
        });
    }
</script>