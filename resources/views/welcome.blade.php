@foreach ($data as $coba)
    {{ $coba->getkaryawan1->nama ?? 'kosong' }}
    {{ $coba->getkaryawan2->nama ?? 'kosong' }}
    {{ $coba->getkaryawan3->nama ?? 'kosong' }}
    <br>
@endforeach
