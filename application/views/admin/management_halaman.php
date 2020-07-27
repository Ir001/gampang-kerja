<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <div class="py-2">
                        <div class="form-group row">
                            <div class="col-md-3">
                                <button class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#modal_tambah">Halaman Baru</button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="tbl_halaman" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Halaman #1</td>
                                    <td><span class="badge badge-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-xs btn-info"><i class="fa fa-pen"></i></button>
                                        <button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Tambah -->
<div class="modal fade" id="modal_tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content ">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Buat Halaman</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="form_tambah">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="judul" class="form-control" placeholder="Judul Halaman" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Konten</label>
                        <textarea name="content" class="textarea" placeholder="Kode iklan" required></textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Permalink </label>
                        <input type="text" name="permalink" class="form-control" placeholder="Permalink" required>
                    </div>
                    <div class="form-group">
                        <label>Status: </label>
                        <input type="checkbox" name="status" value='1' class="input-sm" data-bootstrap-switch data-off-color="danger" data-size="sm" data-on-color="success">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        </div>
        </form>
        </div>
    </div>
</div>
<!-- Modal Edit -->
<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content ">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Buat Halaman</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="form_edit">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="hidden" name="id" id="edit_id">
                        <input type="text" name="judul" id="edit_judul" class="form-control" placeholder="Judul Halaman" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Konten</label>
                        <textarea name="content" id="edit_konten" class="textarea" placeholder="Kode iklan" required></textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Permalink </label>
                        <input type="text" name="permalink" id="edit_permalink" class="form-control" placeholder="Permalink" required>
                    </div>
                    <div class="form-group">
                        <label>Status: </label>
                        <input type="checkbox" name="status" id="edit_status" value='1' class="input-sm" data-bootstrap-switch data-off-color="danger" data-size="sm" data-on-color="success">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        </div>
        </form>
        </div>
    </div>
</div>
<script>
$("input[data-bootstrap-switch]").each(function(){
    $(this).bootstrapSwitch('state', $(this).prop('checked'));
});
$('.textarea').summernote({
        height : 250,
        placeholder : 'Deskripsi',
    });
/* Form Add */
$('#form_tambah').submit(function(e){
    e.preventDefault();
    $.ajax({
        type : 'post',
        url : '/function_admin/halaman/tambah',
        data : $(this).serialize(),
        dataType : 'json',
        success : function(data){
            if (data.status) {
                toastr['success'](data.message);
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            }else{
                toastr['error'](data.message);
            }
        }
    })
});
/* Form Edit */
$('#form_edit').submit(function(e){
    e.preventDefault();
    $.ajax({
        type : 'post',
        url : '/function_admin/halaman/ubah',
        data : $(this).serialize(),
        dataType : 'json',
        success : function(data){
            if (data.status) {
                toastr['success'](data.message);
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            }else{
                toastr['error'](data.message);
            }
        }
    })
});
/* Datatables */
    var table = $('#tbl_halaman').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            "url": "/function_admin/halaman/datatable",
            "type": "POST",
        },
        columns: [
            {"data": "title"},
            {"data": "status", render: function(data, type, row) {
                var html;
                if (row.status == 1) {
                    html = '<span class="badge badge-success"> Active </span>';
                }else{
                    html = '<span class="badge badge-danger"> Draft </span>';
                }
                return html;
            }},
            {"data": "id", render: function(data, type, row) {
                var html = '<button class="btn btn-info btn-xs btn-edit" data-id="'+row.id+'"><i class="fa fa-pen"></i> Ubah</button> ';
                html+='<button class="btn btn-danger btn-xs  btn-delete" data-id="'+row.id+'"><i class="fa fa-trash"></i> Hapus</button>';
                return html;
            }}
        ],
        order: [[0, 'asc']],
        "fnDrawCallback": function( oSettings ) {
            $('.btn-edit').click(function(){
                var id = $(this).attr('data-id');
                $.ajax({
                    type : 'post',
                    url : '/function_admin/halaman/get',
                    data : {halaman_id : id},
                    dataType : 'json',
                    success: function(data){
                        $('#edit_id').val(data.id);
                        $('#edit_judul').val(data.title);
                        $('#edit_permalink').val(data.permalink);
                        $('#edit_konten').summernote("code",data.content);
                        if (data.status == 1) {
                            $('#edit_status').bootstrapSwitch('state', true);
                        }else{
                            $('#edit_status').bootstrapSwitch('state', false);
                        }
                        $('#modal_edit').modal('show');
                    }
                })
            });
            $('.btn-delete').click(function(){
                var id = $(this).attr('data-id');
                
                konfirmasi(function(){
                    $.ajax({
                        type  : 'post',
                        url : '/function_admin/halaman/hapus',
                        data : {halaman_id : id},
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
                });
            })
        },
        'columnDefs': [ {
            'targets': [2], /* column index */
            'orderable': false, /* true or false */
        }],
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