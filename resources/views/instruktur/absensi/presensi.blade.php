@extends('instruktur.partials.main')
@section('container')
    @if (session('success'))
        <div class="alert alert-success">
            {!! session('success') !!}
        </div>
    @endif

    <div class="container mt-4">
        <h2 class="text-center">Absensi</h2>
        {{-- Form untuk mengirim presensi --}}
        <form class="mt-4" action="{{ route('presensi.store') }}" method="POST">
            @csrf
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Member</th>
                            <th>Pelatihan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($absensi->pelatihan->daftarpelatihan as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>

                                {{-- Simpan nama, id_member, pelatihan sebagai input tersembunyi --}}
                                <input type="hidden" name="id_member[{{ $item->id }}]" value="{{ $item->member->id }}">
                                <input type="hidden" name="nama[{{ $item->id }}]" value="{{ $item->nama }}">
                                <input type="hidden" name="pelatihan[{{ $item->id }}]"
                                    value="{{ $item->pelatihan->pelatihan }}">

                                {{-- Menampilkan nama member dan pelatihan --}}
                                <td>{{ $item->nama ?? 'Tidak Ada Nama' }}</td>
                                <td>{{ $item->pelatihan->pelatihan ?? 'Tidak Ada Pelatihan' }}</td>

                                {{-- Dropdown untuk memilih status --}}
                                <td>
                                    <select name="status[{{ $item->id }}]" class="form-control" required>
                                        <option value="" disabled>Pilih Status</option>
                                        <option value="Hadir" {{ $item->status == 'Hadir' ? 'selected' : '' }}>Hadir
                                        </option>
                                        <option value="Alpha" {{ $item->status == 'Alpha' ? 'selected' : '' }}>Alpha
                                        </option>
                                        <option value="Izin" {{ $item->status == 'Izin' ? 'selected' : '' }}>Izin
                                        </option>
                                        <option value="Sakit" {{ $item->status == 'Sakit' ? 'selected' : '' }}>Sakit
                                        </option>
                                    </select>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Belum ada mahasiswa untuk di presensi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Tombol submit untuk menyimpan presensi --}}
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Simpan Absensi</button>
            </div>

        </form>
    </div>
@endsection
