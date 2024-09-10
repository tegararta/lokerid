@extends('be.partials.main')
@section('container')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        .table-responsive {
            overflow-x: auto;
        }
    </style>
<div class="row">
    {{-- Modal Kategori --}}


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Produk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!--  -->

                    <form action="{{ route('infopel.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control" accept="image/*" required>
                        </div>
                    
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required>
                        </div>
                    
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" placeholder="Masukkan Jabatan" required>
                        </div>
                    
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
                        </div>
                    
                        <div class="form-group">
                            <label>NIP</label>
                            <input type="text" name="nip" class="form-control" placeholder="Masukkan NIP" required>
                        </div>
                    
                        <div class="form-group">
                            <label>Hari</label>
                            <input type="text" name="hari" class="form-control" placeholder="Masukkan Hari" required>
                        </div>
                    
                        <div class="form-group">
                            <label>Jam</label>
                            <input type="time" name="jam" class="form-control" required>
                        </div>
                    
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" name="jumlah" class="form-control" placeholder="Masukkan Jumlah" required>
                        </div>
                    
                        <div class="form-group">
                            <label>Modal</label>
                            <input type="text" name="modal" class="form-control" placeholder="Masukkan Modal" required>
                        </div>
                    
                        <div class="form-group">
                            <label>Pelatihan</label>
                            <input type="text" name="pelatihan" class="form-control" placeholder="Masukkan Pelatihan" required>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" value="Tambah" name="simpan" class="btn btn-primary">
                        </div>
                    </form>
                    
                    
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @if (session('sukses'))
    <div class="alert alert-success">
        {{ session('sukses') }}
    </div>
    @endif
	<div class="d-flex justify-content-end mb-3">
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
			Tambah Data
		</button>
	</div>
	<div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form Pencarian -->
                
                
                <!-- Tombol Ekspor -->
                {{-- <div class="mb-3">
                    <button id="excel-btn" class="btn btn-success">Excel</button>
                    <button id="pdf-btn" class="btn btn-danger">PDF</button>
                </div> --}}
                <div class="table-responsive" id="table-container">
                    <table class="table table-bordered table-hover" id="">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Email</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Hari</th>
                                <th scope="col">Jam</th>
                                <th scope="col">Jumlah Peserta</th>
                                <th scope="col">Modal</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($infopelatihan as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="../{{ $data->foto }}" alt="Foto" class="img-thumbnail" width="50"></td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->jabatan }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->nip }}</td>
                                <td>{{ $data->hari }}</td>
                                <td>{{ $data->jam }}</td>
                                <td>{{ $data->jumlah }}</td>
                                <td>{{ $data->modal }}</td>
                                <td>
                                    {{-- <div class="btn-group">
                                        <a href="" class="btn btn-sm btn-info text-white show-modal mr-2">
                                            <i class="fas fa-eye" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="" class="btn btn-sm btn-info text-white show-modal mr-2">
                                            <i class="fas fa-edit" aria-hidden="true"></i>
                                        </a>
                                    </div> --}}
                                    <div class="btn-group">
                                        <form action="{{ route('infopel.destroy',$data->id) }}" onsubmit="return confirm('Yakin ingin menghapus?')" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger text-white show-modal mr-2">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            <!-- Tambahkan lebih banyak baris jika diperlukan -->
                        </tbody>
                        
                    </table>
                </div>
                
            </div>
        </div>
    </div>

	
</div>
</div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 5 JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
	
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!-- FileSaver.js for saving files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <!-- JSZip for Excel export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <!-- pdfmake for PDF export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <!-- Buttons for DataTables -->
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.colVis.min.js"></script>
    {{-- exc --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    {{-- pdf --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.22/jspdf.plugin.autotable.min.js"></script>


    
    <script>
        $(document).ready(function() {
            var table = $('#datatable').DataTable({
                "scrollX": true
            });

            $('#search-btn').on('click', function() {
                var jenis_perizinan = $('#jenis_perizinan').val();
                var keyword = $('#keyword').val();

                table.column(2).search(jenis_perizinan).draw();
                table.search(keyword).draw();
            });

            // Tombol Ekspor
            
        });
    </script>

<script>
    document.getElementById('search-btn').addEventListener('click', function() {
        // Ambil nilai jenis perizinan yang dipilih
        var jenisPerizinan = document.getElementById('jenis_perizinan_select').value;
    
        // Ambil semua baris tabel
        var rows = document.querySelectorAll('#datatable tbody tr');
    
        // Loop melalui semua baris tabel
        rows.forEach(function(row) {
            // Ambil nilai jenis perizinan dari baris tersebut
            var cellJenisPerizinan = row.querySelector('td:nth-child(6)').textContent.trim();
    
            // Jika jenis perizinan cocok, tampilkan barisnya, jika tidak, sembunyikan
            if (cellJenisPerizinan === jenisPerizinan) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
    </script>
{{-- Exc --}}
<script>
    document.getElementById('excel-btn').addEventListener('click', function() {
        var table = document.getElementById('datatable');
        var workbook = XLSX.utils.table_to_book(table, {sheet: "Sheet JS"});
        XLSX.writeFile(workbook, 'data.xlsx');
    });
    </script>
    {{-- Pdf --}}
    <script>
        document.getElementById('pdf-btn').addEventListener('click', function() {
            const { jsPDF } = window.jspdf;
        
            var doc = new jsPDF();
            doc.text("Data Perizinan", 14, 16);
            
            doc.autoTable({
                html: '#datatable',
                startY: 20,
                styles: { cellPadding: 0.5, fontSize: 8 },
                headStyles: { fillColor: [0, 0, 0], textColor: [255, 255, 255] },
            });
        
            doc.save('data.pdf');
        });
        </script>
        
    
</body>
@endsection