<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-body">
                    <div class="py-2">
                        <div class="form-group row">
                            <div class="col-md-3">
                                <a href="/manager/loker/new" class="btn btn-primary btn-sm">Lowongan Baru</a>
                            </div>
                            <div class="col-md-3">
                                <select name="provinsi" id="filter_provinsi" class="form-control form-control-sm">
                                    <option value="">Filter berdasarkan Provinsi</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="kategori" id="filter_kategori" class="form-control form-control-sm">
                                    <option value="">Filter berdasarkan Kategori</option>
                                    <option value="Informatika">Informatika</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="perusahaan" id="filter_perusahaan" class="form-control form-control-sm">
                                    <option value="">Filter berdasarkan Perusahaan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="tbl_loker" class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Perusahaan</th>
                                    <th>Kategori</th>
                                    <th>Industri</th>
                                    <th>Provinsi</th>
                                    <th>Deadline</th>
                                    <th>Dilihat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Judul</td>
                                    <td>Perusahaan</td>
                                    <td>Kategori</td>
                                    <td>Industri</td>
                                    <td>Provinsi</td>
                                    <td>Deadline</td>
                                    <td>Dilihat</td>
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
<script>
/* Datatables */
    var table = $('#tbl_loker').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            "url": "/function_admin/lowongan/datatable",
            "type": "POST",
        },
        columns: [
            {"data": "title"},
            {"data": "perusahaan_name"},
            {"data": "category_name"},
            {"data": "industri_name"},
            {"data": "provinsi_name"},
            {"data": "deadline"},
            {"data": "viewed"},
            {"data": "id", render: function(data, type, row) {
                var html = '<button class="btn btn-info btn-xs btn-edit" data-id="'+row.id+'"><i class="fa fa-pen"></i> Ubah</button> ';
                html+='<button class="btn btn-danger btn-xs  btn-delete" data-id="'+row.id+'"><i class="fa fa-trash"></i> Hapus</button>';
                return html;
            }}
        ],
        order: [[7, 'desc']],
        "fnDrawCallback": function( oSettings ) {
            $('.btn-edit').click(function(){
                var id = $(this).attr('data-id');
                window.location.href="/manager/loker/edit/"+id;
            });
            $('.btn-delete').click(function(){
                var id = $(this).attr('data-id');
                
                konfirmasi(function(){
                    $.ajax({
                        type  : 'post',
                        url : '/function_admin/lowongan/hapus',
                        data : {loker_id : id},
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
        },
        'columnDefs': [ {
            'targets': [1,2,3,4], /* column index */
            'orderable': false, /* true or false */
            "width": "18%",
            "targets": 7 
        }],
    });
    $('#filter_kategori').change(function(){
        var text = $(this).val();
        window.location.href="?kategori="+text;
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