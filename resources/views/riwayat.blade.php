@extends('layout.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <div class="ms-0">
                                <p class="fs-5 m-0 p-0">Index of {{ $tahun }}</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="float-end">
                                <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#tahunModal">
                                    Tahun
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <th class="text-center">Bulan</th>
                                <th class="text-center">Minggu</th>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td class="fs-3 text-center" rowspan="2">Januari</td>
                                    <td class="text-center"><button class="btn btn-outline-primary text-center"><a
                                                href="">Minggu
                                                Pertama</a></button></td>
                                </tr>
                                <tr>
                                    <td class="text-center"><button class="btn btn-outline-primary pe-4 text-center"><a
                                                href="">Minggu
                                                Kedua</a></button></td>
                                </tr>
                                <tr>
                                    <td class="fs-3 text-center" rowspan="2">Februari</td>
                                    <td class="text-center"><button class="btn btn-outline-primary text-center"><a
                                                href="">Minggu
                                                Pertama</a></button></td>
                                </tr>
                                <tr>
                                    <td class="text-center"><button class="btn btn-outline-primary pe-4 text-center"><a
                                                href="">Minggu
                                                Kedua</a></button></td>
                                </tr>
                                <tr>
                                    <td class="fs-3 text-center" rowspan="2">Maret</td>
                                    <td class="text-center"><button class="btn btn-outline-primary text-center"><a
                                                href="">Minggu
                                                Pertama</a></button></td>
                                </tr>
                                <tr>
                                    <td class="text-center"><button class="btn btn-outline-primary pe-4 text-center"><a
                                                href="">Minggu
                                                Kedua</a></button></td>
                                </tr>
                                <tr>
                                    <td class="fs-3 text-center" rowspan="2">April</td>
                                    <td class="text-center"><button class="btn btn-outline-primary text-center"><a
                                                href="">Minggu
                                                Pertama</a></button></td>
                                </tr>
                                <tr>
                                    <td class="text-center"><button class="btn btn-outline-primary pe-4 text-center"><a
                                                href="">Minggu
                                                Kedua</a></button></td>
                                </tr>
                                <tr>
                                    <td class="fs-3 text-center" rowspan="2">Mei</td>
                                    <td class="text-center"><button class="btn btn-outline-primary text-center"><a
                                                href="">Minggu
                                                Pertama</a></button></td>
                                </tr>
                                <tr>
                                    <td class="text-center"><button class="btn btn-outline-primary pe-4 text-center"><a
                                                href="">Minggu
                                                Kedua</a></button></td>
                                </tr>
                                <tr>
                                    <td class="fs-3 text-center" rowspan="2">Juni</td>
                                    <td class="text-center"><button class="btn btn-outline-primary text-center"><a
                                                href="">Minggu
                                                Pertama</a></button></td>
                                </tr>
                                <tr>
                                    <td class="text-center"><button class="btn btn-outline-primary pe-4 text-center"><a
                                                href="">Minggu
                                                Kedua</a></button></td>
                                </tr>
                                <tr>
                                    <td class="fs-3 text-center" rowspan="2">Juli</td>
                                    <td class="text-center"><button class="btn btn-outline-primary text-center"><a
                                                href="">Minggu
                                                Pertama</a></button></td>
                                </tr>
                                <tr>
                                    <td class="text-center"><button class="btn btn-outline-primary pe-4 text-center"><a
                                                href="">Minggu
                                                Kedua</a></button></td>
                                </tr>
                                <tr>
                                    <td class="fs-3 text-center" rowspan="2">Agustus</td>
                                    <td class="text-center"><button class="btn btn-outline-primary text-center"><a
                                                href="">Minggu
                                                Pertama</a></button></td>
                                </tr>
                                <tr>
                                    <td class="text-center"><button class="btn btn-outline-primary pe-4 text-center"><a
                                                href="">Minggu
                                                Kedua</a></button></td>
                                </tr>
                                <tr>
                                    <td class="fs-3 text-center" rowspan="2">September</td>
                                    <td class="text-center"><button class="btn btn-outline-primary text-center"><a
                                                href="">Minggu
                                                Pertama</a></button></td>
                                </tr>
                                <tr>
                                    <td class="text-center"><button class="btn btn-outline-primary pe-4 text-center"><a
                                                href="">Minggu
                                                Kedua</a></button></td>
                                </tr>
                                <tr>
                                    <td class="fs-3 text-center" rowspan="2">Oktober</td>
                                    <td class="text-center"><button class="btn btn-outline-primary text-center"><a
                                                href="">Minggu
                                                Pertama</a></button></td>
                                </tr>
                                <tr>
                                    <td class="text-center"><button class="btn btn-outline-primary pe-4 text-center"><a
                                                href="">Minggu
                                                Kedua</a></button></td>
                                </tr>
                                <tr>
                                    <td class="fs-3 text-center" rowspan="2">November</td>
                                    <td class="text-center"><button class="btn btn-outline-primary text-center"><a
                                                href="">Minggu
                                                Pertama</a></button></td>
                                </tr>
                                <tr>
                                    <td class="text-center"><button class="btn btn-outline-primary pe-4 text-center"><a
                                                href="">Minggu
                                                Kedua</a></button></td>
                                </tr>
                                <tr>
                                    <td class="fs-3 text-center" rowspan="2">Desember</td>
                                    <td class="text-center"><button class="btn btn-outline-primary text-center"><a
                                                href="">Minggu
                                                Pertama</a></button></td>
                                </tr>
                                <tr>
                                    <td class="text-center"><button class="btn btn-outline-primary pe-4 text-center"><a
                                                href="">Minggu
                                                Kedua</a></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Tahun Modal --}}
    <div class="modal fade text-left" id="tahunModal" tabindex="-1" aria-labelledby="myModalLabel18"
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
                    <form action="{{ url('history') }}" method="POST">
                        @csrf
                        @method('post')
                        <input type="number" id="yearInput" min="1900" max="2099" step="1"
                            placeholder="Tahun" class="form-control">
                        <div class="invalid-feedback" id="validationMessage">
                            Hanya menerima inputan 1900-2099.
                        </div>
                        <button type="submit" id="btnTahun" class="btn btn-primary mt-3 disabled">Pilih Tahun</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const yearInput = document.getElementById('yearInput');
        const validationMessage = document.getElementById('validationMessage');
        const btnTahun = document.getElementById('btnTahun');

        yearInput.addEventListener('input', function() {
            const year = parseInt(yearInput.value);

            if (year >= 1900 && year <= 2099) {
                yearInput.classList.remove('is-invalid');
                validationMessage.style.display = 'none';
                btnTahun.className = 'btn btn-primary mt-3';
            } else {
                yearInput.classList.add('is-invalid');
                validationMessage.style.display = 'block';
                btnTahun.className = 'btn btn-primary mt-3 disabled';
            }
        });
    </script>
@endsection
