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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Admin</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!--  -->

                    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Masukkan Username"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control"
                                placeholder="Password" required></input>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="Tambah" name="simpan" class="btn btn-primary">

                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
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
                <div class="table-responsive" id="table-container">
					<table class="table table-bordered table-hover" id="datatable">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Username</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
                            @foreach ($user as $users )
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $users->username }}</td>
								<td>
									{{-- <div class="btn-group">
										<a href="#" class="btn btn-sm btn-info text-white show-modal mr-2">
											<i class="fas fa-eye" aria-hidden="true"></i>
										</a>
									</div> --}}
									{{-- <div class="btn-group">
										<a href="{{ route('admin.edit',$users->id) }}" class="btn btn-sm btn-info text-white show-modal mr-2">
											<i class="fas fa-edit" aria-hidden="true"></i>
										</a>
									</div> --}}
									<div class="btn-group">
										<form action="{{ route('admin.destroy',$users->id) }}" onsubmit="return confirm('Yakin ingin menghapus?')" method="POST">
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
    
    <script>
        // $(document).ready(function() {
        //     var table = $('#datatable').DataTable({
        //         "scrollX": true
        //     });

            $('#search-btn').on('click', function() {
                var jurusan = $('#jurusan').val();
                var keyword = $('#keyword').val();

                table.column(2).search(jurusan).draw();
                table.search(keyword).draw();
            });

            // Tombol Ekspor
            $('#copy-btn').on('click', function() {
                table.button('.buttons-copy').trigger();
            });
            $('#excel-btn').on('click', function() {
                table.button('.buttons-excel').trigger();
            });
            $('#csv-btn').on('click', function() {
                table.button('.buttons-csv').trigger();
            });
            $('#pdf-btn').on('click', function() {
                table.button('.buttons-pdf').trigger();
            });
            $('#colvis-btn').on('click', function() {
                table.button('.buttons-colvis').trigger();
            });
    </script>
</body>
@endsection