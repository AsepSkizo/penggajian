@extends('layout.main')
@section('content')
    <?php
    function tampilTeknisi($tipe)
    {
        $tampil;
        if ($tipe == 'karyawan1') {
            $tampil = 'Teknisi 1';
        }
        if ($tipe == 'karyawan2') {
            $tampil = 'Teknisi 2';
        }
        if ($tipe == 'karyawan3') {
            $tampil = 'Teknisi 3';
        }
        return $tampil;
    }
    ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p class="fs-5 m-0 p-0">
                        Data Gaji
                    </p>
                </div>
                <div class="card-body">
                    <div class="me-1 mb-1 d-inline-block">
                    </div>
                    <div class="table-responsive mt-sm-3">
                        <table class="table mb-0 table-bordered">
                            <thead class="thead-dark">
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Nominal</th>
                                {{-- <th colspan="2" class="text-center">Kasbon</th> --}}
                                <th class="">Aksi</th>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($gaji as $singleGaji)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ tampilTeknisi($singleGaji->tipe) }}</td>
                                        <td>{{ $singleGaji->nominal }}</td>
                                        <td>
                                            <button class="btn btn-warning" data-bs-target="#editGaji"
                                                data-bs-toggle="modal"
                                                onclick="editGaji('{{ $singleGaji->id }}','{{ $singleGaji->nominal }}','{{ tampilTeknisi($singleGaji->tipe) }}')">Edit</button>
                                            {{-- <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal"
                                                onclick="hapusTek('{{ $employee->id }}')">Delete</button> --}}
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

    <div class="modal fade text-left" id="editGaji" tabindex="-1" aria-labelledby="myModalLabel18" style="display: none;"
        aria-hidden="true">
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
                    <form class="form form-vertical" action="{{ url('/salary') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="position-relative">
                                        <label for="">Nominal</label>
                                        <input type="text" id="nominal" name="nominal" class="form-control"
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
    {{-- <div class="modal fade text-left" id="deleteModal" tabindex="-1" aria-labelledby="myModalLabel18"
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
    </div> --}}
    <script>
        function editGaji(id, nominal, tipe) {
            document.getElementById('nominal').value = nominal;
            document.getElementById('idEdit').value = id;
            document.getElementById('myModalLabel18').innerHTML = "Ubah data " + tipe;
        }

        // function hapusTek(id) {
        //     document.getElementById('idHapus').value = id;
        // }
    </script>
@endsection
