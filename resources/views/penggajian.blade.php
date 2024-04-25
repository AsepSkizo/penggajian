@extends('layout.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="">
                        <p class="fs-5 m-0 p-0">{{ $detail }}</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="me-1 mb-1 d-inline-block">
                        <!-- Button trigger for default modal -->
                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#defaultSize">
                            Tambah Data
                        </button>
                        <!--Default size Modal -->
                        <div class="modal fade text-left" id="defaultSize" tabindex="-1" aria-labelledby="myModalLabel18"
                            style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel18">Default Modal</h4>
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
                                        <form class="form form-vertical" action="{{ url('/paylist') }}" method="POST">
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
                                                            <label for="password-id-icon">Nama Unit</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Unit" id="password-id-icon" name="unit"
                                                                    required>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-car-front"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="mobile-id-icon">Nama Teknisi 1</label>
                                                            <div class="position-relative">
                                                                <fieldset class="form-group">
                                                                    <select class="form-select" name="teknisi1"
                                                                        id="basicSelect">
                                                                        <option value="0">Tidak ada</option>
                                                                        @foreach ($teknisi as $orang)
                                                                            <option value="{{ $orang->id }}">
                                                                                {{ $orang->nama }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="mobile-id-icon">Nama Teknisi 2</label>
                                                            <div class="position-relative">
                                                                <fieldset class="form-group">
                                                                    <select class="form-select" name="teknisi2"
                                                                        id="basicSelect">
                                                                        <option value="0">Tidak ada</option>
                                                                        @foreach ($teknisi as $orang)
                                                                            <option value="{{ $orang->id }}">
                                                                                {{ $orang->nama }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="mobile-id-icon">Nama Teknisi 3</label>
                                                            <div class="position-relative">
                                                                <fieldset class="form-group">
                                                                    <select class="form-select" name="teknisi3"
                                                                        id="basicSelect">
                                                                        <option value="0">Tidak ada</option>
                                                                        @foreach ($teknisi as $orang)
                                                                            <option value="{{ $orang->id }}">
                                                                                {{ $orang->nama }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end modal-footer">
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
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Unit</th>
                                    <th>Teknisi 1</th>
                                    <th>Teknisi 2</th>
                                    <th>Teknisi 3</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            function setHari($hari)
                            {
                                if ($hari == 'Sunday') {
                                    $hari = 'Minggu';
                                } elseif ($hari == 'Monday') {
                                    $hari = 'Senin';
                                } elseif ($hari == 'Tuesday') {
                                    $hari = 'Selasa';
                                } elseif ($hari == 'Wednesday') {
                                    $hari = 'Rabu';
                                } elseif ($hari == 'Thursday') {
                                    $hari = 'Kamis';
                                } elseif ($hari == 'Friday') {
                                    $hari = 'Jumat';
                                } elseif ($hari == 'Saturday') {
                                    $hari = 'Sabtu';
                                }
                                return $hari;
                            }
                            ?>
                            <tbody>
                                @foreach ($listgaji as $gaji)
                                    <?php
                                    $date = strtotime($gaji->tanggal);
                                    $hari = date('l', $date);
                                    $date = date('Y-m-d', $date);
                                    ?>
                                    <tr>
                                        <td class="text-bold-500"><?= setHari($hari) . '( ' . $gaji->tanggal . ' )' ?></td>
                                        <td>{{ $gaji->unit }}</td>
                                        <td class="text-bold-500">{{ $gaji->getkaryawan1->nama ?? 'Tidak ada' }}</td>
                                        <td>{{ $gaji->getkaryawan2->nama ?? 'Tidak ada' }}</td>
                                        <td>{{ $gaji->getkaryawan3->nama ?? 'Tidak ada' }}</td>
                                        <td><a href="#"
                                                onclick="edit('{{ $gaji->id }}','{{ $date }}','{{ $gaji->unit }}','{{ $gaji->getkaryawan1->id }}','{{ $gaji->getkaryawan2->id ?? '0' }}','{{ $gaji->getkaryawan3->id ?? '0' }}')"><i
                                                    class="bi bi-pencil-square" style="font-size: 1.2rem;"
                                                    data-bs-toggle="modal" data-bs-target="#editModal"></i></a>
                                            <a href="#"><i class="bi bi-trash" style="font-size: 1.2rem;"
                                                    data-bs-toggle="modal" onclick="hapus('{{ $gaji->id }}')"
                                                    data-bs-target="#deleteModal"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row mt-3 col-12">
                        <div class="col-6">
                            <div class="paginate">
                                {{ $listgaji->links() }}
                            </div>
                        </div>
                        <div class="col-6">
                            <a href="{{ url('/paylist/' . $tanggalAwal . '/' . $bulan . '/' . $tahun) }}"
                                class="float-end">
                                <button class="btn btn-primary">Lihat Penggajian</button>
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>



    {{-- Edit Modal --}}
    <div class="modal fade text-left" id="editModal" tabindex="-1" aria-labelledby="myModalLabel18"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel18">Edit Data</h4>
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
                    <form class="form form-vertical" action="{{ url('/paylist') }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Tanggal</label>
                                        <div class="position-relative">
                                            <input type="date" name="tanggal" class="form-control"
                                                placeholder="Input with icon left" id="editDate" value="">
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar3"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="password-id-icon">Nama Unit</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" placeholder="Unit" id="editUnit"
                                                name="unit">
                                            <div class="form-control-icon">
                                                <i class="bi bi-car-front"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="mobile-id-icon">Nama Teknisi 1</label>
                                        <div class="position-relative">
                                            <fieldset class="form-group">
                                                <select class="form-select" name="teknisi1" id="teknisi1">
                                                    <option value="0">Tidak ada</option>
                                                    @foreach ($teknisi as $orang)
                                                        <option value="{{ $orang->id }}">{{ $orang->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="mobile-id-icon">Nama Teknisi 2</label>
                                        <div class="position-relative">
                                            <fieldset class="form-group">
                                                <select class="form-select" name="teknisi2" id="teknisi2">
                                                    <option value="0">Tidak ada</option>
                                                    @foreach ($teknisi as $orang)
                                                        <option value="{{ $orang->id }}">{{ $orang->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="mobile-id-icon">Nama Teknisi 3</label>
                                        <div class="position-relative">
                                            <fieldset class="form-group">
                                                <select class="form-select" name="teknisi3" id="teknisi3">
                                                    <option value="0">Tidak ada</option>
                                                    @foreach ($teknisi as $orang)
                                                        <option value="{{ $orang->id }}">{{ $orang->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="id" id="idEdit">
                                <div class="col-12 d-flex justify-content-end modal-footer">
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
                    <h4 class="modal-title" id="myModalLabel18">Delete Data</h4>
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
                    <form class="form form-vertical" action="{{ url('/paylist') }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <label for="">Apakah anda ingin menghapus data ini?</label>
                                <input type="hidden" name="id" id="idHapus">
                                <div class="col-12 d-flex justify-content-end modal-footer">
                                    <button type="button" class="btn btn-light-secondary me-1 mb-1"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Ya</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function edit(idGaji, tanggal, unit, karyawan1Id, karyawan2Id, karyawan3Id, ) {
            document.getElementById('idEdit').value = idGaji;
            document.getElementById('editDate').value = tanggal;
            document.getElementById('editUnit').value = unit;
            document.getElementById('teknisi1').value = karyawan1Id;
            document.getElementById('teknisi2').value = karyawan2Id;
            document.getElementById('teknisi3').value = karyawan3Id;
        }

        function hapus(id) {
            document.getElementById('idHapus').value = id;
        }
    </script>
@endsection
