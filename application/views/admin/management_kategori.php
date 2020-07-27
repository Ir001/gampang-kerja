<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-blue">
            <div class="card-body">
                <div class="mb-3">
                    <button class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#modal_tambah_baru">
                        Kategori Baru
                    </button>
                </div>
                <div class="table-responsive">
                    <table id="tbl_kategori" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Kategori</th>
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
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Tambah Kategori Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="form_tambah">
            <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" name="kategori" class="form-control" placeholder="Kategori" required>
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
<!-- Modal Ubah Data -->
<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="modal_editTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Ubah Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="form_edit">
            <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="hidden" name="id" id="id_edit">
                        <input type="text" name="kategori" id="kategori_edit" class="form-control" placeholder="Kategori" required>
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
<script>
    var table = $('#tbl_kategori').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            "url": "/function_admin/kategori/datatable",
            "type": "POST",
        },
        columns: [
            {"data": "category_name"},
            {"data": "id", render: function(data, type, row) {
                var html = '<button class="btn btn-info btn-xs btn-edit" data-id="'+row.id+'"><i class="fa fa-pen"></i> Ubah</button> ';
                html+='<button class="btn btn-danger btn-xs  btn-delete" data-id="'+row.id+'"><i class="fa fa-trash"></i> Hapus</button>';
                return html;
            }}
        ],
        order: [[1, 'asc']],
        "fnDrawCallback": function( oSettings ) {
            $('.btn-edit').click(function(){
                var id = $(this).attr('data-id');
                $.ajax({
                    type  : 'post',
                    url : '/function_admin/kategori/get',
                    data : {kategori_id : id},
                    dataType : 'json',
                    success : function(data){
                        $('#id_edit').val(data.id);
                        $('#kategori_edit').val(data.category_name);
                        $('#modal_edit').modal('show');
                    }
                });
            });
            $('.btn-delete').click(function(){
                var id = $(this).attr('data-id');
                
                konfirmasi(function(){
                    $.ajax({
                        type  : 'post',
                        url : '/function_admin/kategori/hapus',
                        data : {kategori_id : id},
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
    // Tambah Button
    $('#form_tambah').submit(function(e){
        e.preventDefault();
        $.ajax({
            type : 'post',
            url : '/function_admin/kategori/tambah',
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
            url : '/function_admin/kategori/ubah',
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