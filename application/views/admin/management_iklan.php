<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <div class="py-2">
                        <div class="form-group row">
                            <div class="col-md-3">
                                <button class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#modal_tambah">Iklan Baru</button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="tbl_iklan" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Posisi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Ads #1</td>
                                    <td>Banner Top</td>
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
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Tambah Iklan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="form_tambah">
        <div class="modal-body">
            <div class="form-group">
                <label>Nama Iklan</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Iklan" required>
            </div>
            <div class="form-group">
                <label>Posisi</label>
                <select name="posisi" class="form-control">
                    <option value="sidebar">Sidebar</option>
                    <option value="top">Top</option>
                    <option value="bottom">Bottom</option>
                </select>
            </div>
            <div class="form-group">
                <label>Status: </label>
                <input type="checkbox" name="status" value='1' class="input-sm" data-bootstrap-switch data-off-color="danger" data-size="sm" data-on-color="success">
            </div>
            <div class="form-group">
                <label>Code</label>
                <textarea name="code" class="form-control" placeholder="Kode iklan" required></textarea>
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
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Tambah Iklan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="form_edit">
        <div class="modal-body">
            <div class="form-group">
                <label>Nama Iklan</label>
                <input type="hidden" name="id" id="edit_id">
                <input type="text" name="nama" id="edit_nama" class="form-control" placeholder="Nama Iklan" required>
            </div>
            <div class="form-group">
                <label>Posisi</label>
                <select name="posisi" id="edit_posisi" class="form-control">
                    <option value="sidebar">Sidebar</option>
                    <option value="top">Top</option>
                    <option value="bottom">Bottom</option>
                </select>
            </div>
            <div class="form-group">
                <label>Status: </label>
                <input type="checkbox" name="status" id="edit_status" value='1' class="input-sm" data-bootstrap-switch data-off-color="danger" data-size="sm" data-on-color="success">
            </div>
            <div class="form-group">
                <label>Code</label>
                <textarea name="code" id="edit_code" class="form-control" placeholder="Kode iklan" required></textarea>
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
/* Form Add */
$('#form_tambah').submit(function(e){
    e.preventDefault();
    $.ajax({
        type : 'post',
        url : '/function_admin/iklan/tambah',
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
        url : '/function_admin/iklan/ubah',
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
    var table = $('#tbl_iklan').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            "url": "/function_admin/iklan/datatable",
            "type": "POST",
        },
        columns: [
            {"data": "nama"},
            {"data": "posisi"},
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
                    url : '/function_admin/iklan/get',
                    data : {iklan_id : id},
                    dataType : 'json',
                    success: function(data){
                        $('#edit_id').val(data.id);
                        $('#edit_nama').val(data.nama);
                        $('#edit_posisi').val(data.posisi);
                        $('#edit_code').val(data.code);
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
                        url : '/function_admin/iklan/hapus',
                        data : {iklan_id : id},
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
            'targets': [3], /* column index */
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