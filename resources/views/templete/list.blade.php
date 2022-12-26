@can('guru')
    <div class="col mt-5 pt-3">
        <p class=" border-bottom">Dashboard guru</p>
    </div>
@endcan
@can('TU')
    <div class="col mb-2">
        <p class=" border-bottom">Dashboard TU</p>
    </div>
@endcan
@can('siswa')
    <div class="col">
        <p class=" border-bottom">Dashboard Siswa</p>
    </div>
@endcan
@can('admin')
    <div class="col">
        <p class=" border-bottom">Dashboard admin</p>
    </div>
@endcan

@canany(['guru', 'TU', 'admin'])
    <div class="col mb-2">
        <a class="text-decoration-none text-muted nav-link active" href="/kelas">Kelas</a>
    </div>
@endcanany




<div class="col mb-2">
    <a class="text-decoration-none text-muted nav-link active" href="/">jadwal</a>
</div>


@canany(['TU','admin'])
    <div class="col mb-2">
        <a class="text-decoration-none text-muted nav-link active" href="/">pelajaran</a>
    </div>
    <div class="col mb-2">
        <a class="text-decoration-none text-muted nav-link active" href="/siswa">Siswa</a>
    </div>
    <div class="col mb-2">
        <a class="text-decoration-none text-muted nav-link active" href="/">Guru</a>
    </div>
@endcanany

@canany(['siswa','admin'])
    <div class="col mb-2">
        <a class="text-decoration-none text-muted nav-link active" href="/">Absensi</a>
    </div>
@endcanany
