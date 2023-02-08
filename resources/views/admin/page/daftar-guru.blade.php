@extends('layouts.main')
@section('title', 'Master user')
@section('content')
    <div class="card shadow px-0">
        <div class="card-header bg-gradient bg-primary">
            <h3 class="fw-bolder mt-2 d-inline-flex text-white">List Guru</h3>
            <button type="button" class="btn btn-secondary float-end" data-bs-toggle="modal" data-bs-target="#myModal">
                Tambah
            </button>
        </div>

        <div class="card-body">
            @if (session()->has('errors'))
                <ul>
                    <li>{{ session('errors') }}</li>
                </ul>
            @endif
            <table id="table_data_user" class="table table-bordered display" cellspacing="0" width="100%">
                <thead class="thead-inverse">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($wali_kelas as $guru)
                        <tr>
                            <td scope="row">
                                {{ ($wali_kelas->currentpage() - 1) * $wali_kelas->perpage() + $loop->index + 1 }}
                            </td>
                            <td>{{ $guru->name }}</td>
                            <td>{{ $guru->kelas->nama_kelas }}</td>
                            <td>
                                <form action="/master-guru/{{ $guru->id }}" method="post" id="form"
                                    class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" id="show_confirm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary fs-4 fw-bold text-light">
                    <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
                </div>
                <div class="modal-body">
                    <form action="/master-guru/store" method="post" id="editform">
                        @csrf
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="name" id="name" required>

                        <div class="mt-2">
                            <label for="user_id">User</label>
                            <select class="select2 form-control" id="user_id" name="user_id" required
                                style="width: 100%;">
                                <option value="" selected>Pilih User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->email }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-2">
                            <label for="kelas_id">Kelas</label>
                            <select class="select2 form-control" id="kelas_id" name="kelas_id" required
                                style="width: 100%;">
                                <option value="" selected>Pilih Kelas</option>

                                @foreach ($kelas as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" id="tambah">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            var table = $('#table_data_user').DataTable({
                pagingType: 'simple_numbers',
                responsive: true,
                processing: true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json",
                    paginate: {
                        first: '«',
                        previous: '‹',
                        next: '›',
                        last: '»'
                    },
                    aria: {
                        paginate: {
                            first: 'First',
                            previous: 'Previous',
                            next: 'Next',
                            last: 'Last'
                        }
                    },
                },
                'columnDefs': [{
                        orderable: false,
                        responsivePriority: 1,
                        targets: 1
                    },
                    {
                        orderable: false,
                        responsivePriority: 2,
                        targets: 3
                    },
                ],
            });
            $('button#show_confirm').click(function(event) {
                var form = $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                swal({
                        title: `Yakin ingin menghapus?`,
                        text: "Hapus Permanen Guru",
                        icon: "warning",
                        buttons: [true, "Yakin"],
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                            setTimeout(() => {
                                swal("Guru berhasil dihapus!", "", "success");
                            }, 1500);
                        }
                    });
            });


        });
        $('button#tambah').click(function(event) {
            var form = $(this).closest("form");

            form.submit();
            setTimeout(() => {
                swal("Guru berhasil ditambah!", "", "success");
            }, 2200);

        });
    </script>
@endpush
