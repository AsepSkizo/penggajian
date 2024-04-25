@extends('layout.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p class="fs-5 m-0 p-0">
                        Data Teknisi
                    </p>
                </div>
                <div class="card-body">
                    <div class="me-1 mb-1 d-inline-block">
                        <!-- Button trigger for default modal -->
                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#addTeknisi">
                            Tambah Teknisi
                        </button>
                        <!--Default size Modal -->
                        <div class="modal fade text-left" id="addTeknisi" tabindex="-1" aria-labelledby="myModalLabel18"
                            style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel18">Tambah Teknisi</h4>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form form-vertical" action="{{ url('/employee') }}" method="POST">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="position-relative">
                                                            <label for="">Nama</label>
                                                            <input type="text" name="nama" class="form-control"
                                                                id="" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mt-3 d-flex justify-content-end modal-footer">
                                                        <button type="button" class="btn btn-light-secondary me-1 mb-1"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive mt-sm-3">
                        <table class="table mb-0 table-bordered">
                            <thead class="thead-dark">
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                {{-- <th colspan="2" class="text-center">Kasbon</th> --}}
                                <th class="col-2">Aksi</th>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $employee->nama }}</td>
                                        <td>
                                            <button class="btn btn-warning" data-bs-target="#editTekniksi"
                                                data-bs-toggle="modal"
                                                onclick="editTek('{{ $employee->id }}','{{ $employee->nama }}')">Edit</button>
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal"
                                                onclick="hapusTek('{{ $employee->id }}')">Delete</button>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="editTekniksi" tabindex="-1" aria-labelledby="myModalLabel18"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel18">Ubah Teknisi</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form form-vertical" action="{{ url('/employee') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="position-relative">
                                        <label for="">Nama</label>
                                        <input type="text" id="nama" name="nama" class="form-control"
                                            id="" placeholder="">
                                        <input type="hidden" id="idEdit" name="id" id="">
                                    </div>
                                </div>
                                <div class="col-12 mt-3 d-flex justify-content-end modal-footer">
                                    <button type="button" class="btn btn-light-secondary me-1 mb-1"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-left" id="deleteModal" tabindex="-1" aria-labelledby="myModalLabel18"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel18">Hapus Teknisi</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form form-vertical" action="{{ url('/employee') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="form-body">
                            <div class="row">
                                <p>Apakah anda yakin ingin menghapus data teknisi ini?</p>
                                <input type="hidden" name="id" id="idHapus">
                                <div class="col-12 mt-3 d-flex justify-content-end modal-footer">
                                    <button type="button" class="btn btn-light-secondary me-1 mb-1"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function editTek(id, nama) {
            document.getElementById('nama').value = nama;
            document.getElementById('idEdit').value = id;
        }

        function hapusTek(id) {
            document.getElementById('idHapus').value = id;
        }
    </script>
@endsection
