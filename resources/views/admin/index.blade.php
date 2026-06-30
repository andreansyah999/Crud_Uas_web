@extends('layouts.admin')

@section('title', 'Kelola Pemain - Admin Dashboard')
@section('page_title', 'DASHBOARD')
@section('breadcrumb_active', 'Data Pemain Olahraga')

@section('styles')
<!-- DataTables Bootstrap 5 CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<style>
    /* Styling to match the Skote design precisely */
    .card-title-custom {
        font-size: 15px;
        margin: 0 0 7px 0;
        font-weight: 700;
        color: #495057;
    }
    
    .table-responsive {
        margin-top: 15px;
    }
    
    table.dataTable {
        border-collapse: collapse !important;
        margin-top: 15px !important;
        margin-bottom: 15px !important;
    }
    
    table.dataTable thead th {
        background-color: #f8f9fa !important;
        border-bottom: 1px solid #eff2f7 !important;
        color: #495057 !important;
        font-weight: 600 !important;
        font-size: 13px;
        padding: 12px 10px !important;
    }
    
    table.dataTable tbody td {
        border-bottom: 1px solid #eff2f7 !important;
        padding: 12px 10px !important;
        font-size: 13.5px;
        color: #495057;
    }

    table.dataTable tbody tr:hover {
        background-color: #f8f9fa;
    }

    /* Override DataTables standard classes to match Skote design */
    .dataTables_length, .dataTables_filter {
        font-size: 13px;
        color: #74788d;
    }
    
    .dataTables_length select {
        border: 1px solid #ced4da;
        border-radius: 4px;
        padding: 4px 8px;
        margin: 0 5px;
        outline: none;
    }

    .dataTables_filter input {
        border: 1px solid #ced4da;
        border-radius: 4px;
        padding: 4px 10px;
        margin-left: 5px;
        outline: none;
    }

    .dataTables_info {
        font-size: 13px;
        color: #74788d;
        padding-top: 15px !important;
    }

    .dataTables_paginate {
        padding-top: 15px !important;
    }

    .pagination {
        margin: 0;
    }

    .page-item .page-link {
        font-size: 13px;
        color: #74788d;
        border: 1px solid #ced4da;
        padding: 6px 12px;
        transition: all 0.2s ease-in-out;
    }

    .page-item.active .page-link {
        background-color: var(--primary-color) !important;
        border-color: var(--primary-color) !important;
        color: #ffffff !important;
    }

    .page-item:first-child .page-link {
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }

    .page-item:last-child .page-link {
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }

    /* Action Buttons */
    .btn-action-edit {
        background-color: #34c38f;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        font-size: 13px;
        font-weight: 500;
        padding: 5px 15px;
        text-decoration: none;
        display: inline-block;
        transition: all 0.2s;
    }

    .btn-action-edit:hover {
        background-color: #2ca77a;
        color: #ffffff;
    }

    .btn-action-delete {
        background-color: #f46a6a;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        font-size: 13px;
        font-weight: 500;
        padding: 5px 12px;
        transition: all 0.2s;
    }

    .btn-action-delete:hover {
        background-color: #e15858;
        color: #ffffff;
    }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                
                <!-- Card Header Info -->
                <h4 class="card-title-custom">Data Pemain Olahraga</h4>
                
                <!-- Toolbar Action Buttons -->
                <div class="d-flex gap-2 mb-3">
                    <a href="{{ route('admin.create') }}" class="btn-skote-blue px-3 py-2 rounded-1">
                        Add data
                    </a>
                    <button class="btn btn-secondary px-3 py-2 rounded-1" style="background-color: #74788d; border-color: #74788d; font-size: 13.5px;" onclick="alert('Ekspor Excel sedang disiapkan!')">
                        Excel
                    </button>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#pdfPreviewModal" class="btn btn-secondary px-3 py-2 rounded-1 text-white" style="background-color: #74788d; border-color: #74788d; font-size: 13.5px;">
                        PDF
                    </button>
                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table align-middle table-nowrap mb-0" id="eventsTable">
                        <thead>
                            <tr>
                                <th style="width: 50px;">No</th>
                                <th>ID Event</th>
                                <th style="width: 80px;">Foto</th>
                                <th>Nama Event</th>
                                <th>Tanggal</th>
                                <th>Tempat</th>
                                <th>Penanggung Jawab</th>
                                <th class="text-center" style="width: 150px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pemains as $index => $pemain)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="fw-semibold">E{{ str_pad($pemain->id_event, 3, '0', STR_PAD_LEFT) }}</td>
                                    <td>
                                        @if($pemain->gambar)
                                            <img src="{{ asset('storage/' . $pemain->gambar) }}" class="rounded" style="width: 50px; height: 35px; object-fit: cover;" alt="{{ $pemain->nama_event }}">
                                        @else
                                            <div class="rounded bg-light text-muted d-flex align-items-center justify-content-center" style="width: 50px; height: 35px;">
                                                <i class="fa-regular fa-image" style="font-size: 11px;"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="fw-semibold text-primary">{{ $pemain->nama_event }}</td>
                                    <td>{{ \Carbon\Carbon::parse($pemain->tanggal)->format('d-m-Y') }}</td>
                                    <td>{{ $pemain->tempat }}</td>
                                    <td>{{ $pemain->penanggung_jawab }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <!-- Edit Button -->
                                            <a href="{{ route('admin.edit', $pemain->id_event) }}" class="btn-action-edit">Edit</a>
                                            <!-- Delete Button -->
                                            <button class="btn-action-delete" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $pemain->id_event }}">Delete</button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Delete Confirmation Modal -->
                                <div class="modal fade" id="deleteModal{{ $pemain->id_event }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content border-0 rounded-3 shadow-lg">
                                            <div class="modal-header border-0 bg-light p-3">
                                                <h5 class="modal-title fw-bold" style="font-family: 'Outfit', sans-serif; font-size: 16px;">Konfirmasi Hapus</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-4 text-center">
                                                <div class="text-danger mb-3">
                                                    <i class="fa-solid fa-circle-exclamation fa-3x opacity-75"></i>
                                                </div>
                                                <h5 class="fw-bold" style="font-size: 17px;">Yakin ingin menghapus?</h5>
                                                <p class="text-secondary small px-3">Apakah Anda benar-benar ingin menghapus data event <span class="fw-bold text-dark">"{{ $pemain->nama_event }}"</span>? Tindakan ini tidak dapat dibatalkan.</p>
                                            </div>
                                            <div class="modal-footer border-0 p-3 pt-0 justify-content-center gap-2">
                                                <button type="button" class="btn btn-light px-3 py-1.5 border rounded-2 fw-semibold small" data-bs-dismiss="modal">Batal</button>
                                                <form action="{{ route('admin.destroy', $pemain->id_event) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger px-3 py-1.5 rounded-2 fw-semibold small">Ya, Hapus Data</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal Preview PDF -->
<div class="modal fade" id="pdfPreviewModal" tabindex="-1" aria-labelledby="pdfPreviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content border-0 rounded-3 shadow-lg">
            <div class="modal-header border-0 bg-light p-3">
                <h5 class="modal-title fw-bold" id="pdfPreviewModalLabel" style="font-family: 'Outfit', sans-serif; font-size: 16px;">
                    <i class="fa-solid fa-file-pdf text-danger me-2"></i> Preview Laporan PDF
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0" style="height: 600px;">
                {{-- PDF sudah di-generate saat halaman dimuat, embed langsung sebagai base64 --}}
                {{-- Tidak ada HTTP request tambahan, modal langsung tampil instan --}}
                <iframe
                    src="data:application/pdf;base64,{{ $pdfBase64 }}"
                    style="width: 100%; height: 100%; border: none;"
                    title="Preview Laporan PDF">
                </iframe>
            </div>
            <div class="modal-footer border-0 p-3 bg-light d-flex justify-content-between">
                <button type="button" class="btn btn-light px-3 py-1.5 border rounded-2 fw-semibold small" data-bs-dismiss="modal">Tutup</button>
                <a href="{{ route('admin.pdf') }}" class="btn btn-primary px-3 py-1.5 rounded-2 fw-semibold small">
                    <i class="fa-solid fa-download me-1"></i> Download PDF
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- jQuery & DataTables JS -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#eventsTable').DataTable({
            "language": {
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Tidak ada data yang ditemukan",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "Showing 0 to 0 of 0 entries",
                "infoFiltered": "(difilter dari _MAX_ total data)",
                "search": "Search:",
                "paginate": {
                    "next": "Next",
                    "previous": "Previous"
                }
            },
            "pageLength": 10,
            "order": [[ 0, "asc" ]], // Order by index number
            "columnDefs": [
                { "orderable": false, "targets": [2, 8] } // Disable ordering on photo and action
            ],
            "dom": "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                   "<'row'<'col-sm-12'tr>>" +
                   "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>"
        });

        // Sync top navbar search box with DataTable filter input
        const topSearch = document.querySelector('.app-search input');
        if (topSearch) {
            topSearch.addEventListener('input', function() {
                table.search(this.value).draw();
            });
        }
    });
</script>
@endsection
