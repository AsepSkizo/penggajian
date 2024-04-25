@extends('layout.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p class="fs-5 m-0 p-0">
                        Data Kasbon Tanggal : {{ @$detail }}
                    </p>
                </div>
                <div class="card-body">
                    <div class="me-1 mb-1 d-inline-block">
                        <!-- Button trigger for default modal -->
                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#defaultSize">
                            Tambah Kasbon
                        </button>
                        <!--Default size Modal -->
                        <div class="modal fade text-left" id="defaultSize" tabindex="-1" aria-labelledby="myModalLabel18"
                            style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel18">Tambah Kasbon</h4>
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
                                        <form class="form form-vertical" action="{{ url('/kasbon') }}" method="POST">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="first-name-icon">Tanggal</label>
                                                            <div class="position-relative">
                                                                <input type="date" class="form-control"
                                                                    placeholder="Input with icon left" id="first-name-icon"
                                                                    name="tanggal" value="{{ date('Y-m-d') }}">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-calendar3"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="password-id-icon">Nama Karyawan</label>
                                                            <div class="position-relative">
                                                                <fieldset class="form-group">
                                                                    <select class="form-select" name="teknisi"
                                                                        id="basicSelect">
                                                                        @foreach ($employees as $employee)
                                                                            <option value="{{ $employee['id'] }}">
                                                                                {{ $employee['nama'] }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="position-relative">
                                                            <label for="">Nominal</label>
                                                            <input type="number" name="kasbon" class="form-control"
                                                                id="" placeholder="Nominal harus berupa angka">
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
                                <th colspan="2" class="text-center">Kasbon</th>
                                <th class="col-2">Aksi</th>
                            </thead>
                            <tbody>
                                <?php
                                $anggota = 0;
                                ?>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td class="col-1">1</td>
                                        <td>{{ $employee->nama }}</td>
                                        @for ($i = 0; $i < 2; $i++)
                                            <td>{{ $kasbon[$anggota]['kasbon' . $i] ?? 0 }}</td>
                                        @endfor
                                        <td>
                                            <button class="btn btn-primary" data-bs-target="#detailKasb"
                                                data-bs-toggle="modal"
                                                onclick="detailKas('{{ $employee->id }}','{{ $kasbon[$anggota]['kasbon0'] ?? 0 }}','{{ $kasbon[$anggota]['kasbon1'] ?? 0 }}','{{ $kasbon[$anggota]['idKasbon0'] ?? 0 }}','{{ $kasbon[$anggota]['idKasbon1'] ?? 0 }}')">Detail</button>
                                        </td>
                                    </tr>
                                    <?php $anggota++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-left" id="detailKasb" tabindex="-1" aria-labelledby="myModalLabel18"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel18">Edit Kasbon</h4>
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
                    <div class="table-responsive mt-sm-3">
                        <table class="table mb-0 table-bordered">
                            <thead class="thead-dark">
                                <th class="text-center">No</th>
                                <th class="text-center">Nominal</th>
                                <th class="">Aksi</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <input type="hidden" id="idKasbon1">
                                    <input type="hidden" id="kasbon1">
                                    <input type="hidden" id="idKaryawan">
                                    <td>1</td>
                                    <td id="nominal-1"></td>
                                    <td>
                                        <button type="button" class="btn btn-warning" onclick="editKasb1()"
                                            data-bs-target="#editKasb" class="btn btn-danger"
                                            data-bs-toggle="modal">Edit</button>
                                        <button type="button" onclick="hapusKasb1()" data-bs-target="#hapusKasb"
                                            class="btn btn-danger" data-bs-toggle="modal">Hapus</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <input type="hidden" id="idKasbon2">
                                    <input type="hidden" id="kasbon2">
                                    <td id="nominal-2"></td>
                                    <td>
                                        <button type="button" onclick="" class="btn btn-warning"
                                            data-bs-target="#editKasb" data-bs-toggle="modal">Edit</button>
                                        <button class="btn btn-danger">Hapus</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-left" id="editKasb" tabindex="-1" aria-labelledby="myModalLabel18"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel18">Edit Kasbon</h4>
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
                    <form action="/kasbon" method="post">
                        @csrf
                        @method('PUT')
                        <label for="" class="mb-2">Nominal</label>
                        <input type="text" class="form-control" name="nominal" id="nominalEdit">
                        <input type="hidden" name="idKasbon" id="idKasbonEdit">
                </div>
                <div class="col-12 mt-3 d-flex justify-content-end modal-footer">
                    <button type="button" class="btn btn-light-secondary me-1 mb-1"
                        data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade text-left" id="hapusKasb" tabindex="-1" aria-labelledby="myModalLabel18"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel18">Hapus Kasbon</h4>
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
                    <form action="/kasbon" method="post">
                        @csrf
                        @method('DELETE')
                        <label for="" class="mb-2">Apakah Anda Yakin Akan Menghapus Kasbon Ini?</label>
                        <input type="hidden" name="idKasbon" id="idKasbonHapus">
                </div>
                <div class="col-12 mt-3 d-flex justify-content-end modal-footer">
                    <button type="button" class="btn btn-light-secondary me-1 mb-1"
                        data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary me-1 mb-1">Ya</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function detailKas(idTeknisi, kasbon1, kasbon2, idKasbon1, idKasbon2) {
            document.getElementById('idKaryawan').value = idTeknisi;
            document.getElementById('idKasbon1').value = idKasbon1;
            document.getElementById('kasbon1').value = kasbon1;
            document.getElementById('nominal-1').innerHTML = kasbon1;
            document.getElementById('idKasbon2').value = idKasbon2;
            document.getElementById('kasbon2').value = kasbon2;
            document.getElementById('nominal-2').innerHTML = kasbon2;
        }

        function editKasb1() {
            var idKasbon1 = document.getElementById('idKasbon1').value;
            var kasbon1 = document.getElementById('kasbon1').value;
            document.getElementById('idKasbonEdit').value = idKasbon1;
            document.getElementById('nominalEdit').value = kasbon1;
        }

        function hapusKasb1() {
            var idKasbon1 = document.getElementById('idKasbon1').value;
            // var kasbon1 = document.getElementById('kasbon1').value;
            document.getElementById('idKasbonHapus').value = idKasbon1;
            // document.getElementById('nominalEdit').value = kasbon1;
        }
    </script>
@endsection
