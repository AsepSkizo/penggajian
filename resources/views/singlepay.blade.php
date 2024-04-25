{{-- @dd($penggajian[0]['kasbon']['kasbon0']) --}}
{{-- @dd($penggajian) --}}
{{-- @dd($bayarTeknisi1) --}}

@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p class="fs-5 m-0 p-0">
                        Data Penggajian Tanggal : {{ $detail }}
                    </p>
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-sm-3">
                        <table class="table mb-0 table-bordered">
                            <thead class="thead-dark">
                                <th>No</th>
                                <th>Nama</th>
                                <th>1 Teknisi</th>
                                <th>2 Teknisi</th>
                                <th>3 Teknisi</th>
                                <th colspan="2" class="text-center">Kasbon</th>
                                <th>Subtotal</th>
                            </thead>
                            <tbody>
                                <?php $awal = 0; ?>
                                <?php $no = 1; ?>
                                @foreach ($employees as $employee)
                                    <?php
                                    $getTeknisi1 = $penggajian[$awal]['karyawan1'];
                                    $paidTeknisi1 = $getTeknisi1 * $bayarTeknisi1;
                                    $getTeknisi2 = $penggajian[$awal]['karyawan2'];
                                    $paidTeknisi2 = $getTeknisi2 * $bayarTeknisi2;
                                    $getTeknisi3 = $penggajian[$awal]['karyawan3'];
                                    $paidTeknisi3 = $getTeknisi3 * $bayarTeknisi3;
                                    $kasbon1 = $penggajian[$awal]['kasbon']['kasbon0'];
                                    $kasbon2 = $penggajian[$awal]['kasbon']['kasbon1'];
                                    $totalKasbon = $kasbon1 + $kasbon2;
                                    $totalPaid = $paidTeknisi1 + $paidTeknisi2 + $paidTeknisi3;
                                    $subTotal = $totalPaid - $totalKasbon;
                                    ?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $employee->nama }}</td>
                                        <td>{{ $paidTeknisi1 }}</td>
                                        <td>{{ $paidTeknisi2 }}</td>
                                        <td>{{ $paidTeknisi3 }}</td>
                                        <td>{{ $kasbon1 ?? 0 }}</td>
                                        <td>{{ $kasbon2 ?? 0 }}</td>
                                        <td>{{ $subTotal }}</td>
                                    </tr>
                                    <?php $no++; ?>
                                    <?php $awal++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
