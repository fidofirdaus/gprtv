@extends('backend.app')

@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Video</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Video</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <!-- Column -->
        <div class="card col-md-12">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
                <h4 class="card-title">Data Video</h4>
                <a href="{{ route('video.create')}}"><button class="btn btn-primary">Tambah Data Video YouTube</button></a>
                <a href="{{ route('file.create')}}"><button class="btn btn-primary">Tambah Data Video</button></a>
                <div class="table-responsive m-t-20">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th style="width: 40%">Judul</th>
                                <th style="width: 20%">Kategori</th>

                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataVideo as $no => $video)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $video->title }}</td>
                                <td>{{ $video->category->name }}</td>
                                <td>
                                    <a href="{{ route('video.edit', $video->id) }}" class="badge badge-info">Edit</a>
                                    <a href="#" data-id="{{ $video->id }}" class="badge badge-danger sa-params">
                                        <form action="{{ route('video.destroy', $video->id) }}" id="delete{{ $video->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        </form>
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('custom-js')
<script src="{{ url('/') }}/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="{{ url('/') }}/assets/plugins/sweetalert/sweetalert.min.js"></script>
@endpush

@push('after-js')
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                '<tr class="group"><td colspan="5">' + group +
                                '</td></tr>');
                            last = group;
                        }
                    });
                }
            });

        });
    });
</script>

<script>
    $('.sa-params').click(function(e){
        id = e.target.dataset.id;
        swal({
            title: "Yakin Hapus Data?",
            text: "Data yang sudah dihapus tidak bisa dikembalikan!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, hapus ini!",
            cancelButtonText: "Tidak, batalkan!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm){
            if (isConfirm) {
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
                $(`#delete${id}`).submit();
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
    });
</script>
@endpush