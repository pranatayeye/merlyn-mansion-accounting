@section('pageTitle', 'Transaction')
@extends('layouts.app')

@section('content')
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <x-sidebar></x-sidebar>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <x-navbar></x-navbar>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                @if (session()->has('success'))
                    @include('components.alert.success', [
                        'message' => session('success'),
                    ])
                @endif

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-success">
                        <h6 class="m-0 font-weight-bold text-white">Daftar Transaksi</h6>
                    </div>
                    <div class="card-body row">
                        <div class="col-md-5 col-12 text-md-start">
                            <form action="" method="GET" id="form-search">
                                <p class="my-0">Filter tanggal transaksi :</p>
                                <div class="input-group mt-1">
                                    <input type="date" 
                                    id="startDate"
                                    value="{{ $startDate }}"
                                    class="form-control bg-light border-1 border-gray-300 small" 
                                    placeholder="tanggal akhir"
                                    aria-label="Search" aria-describedby="basic-addon2">

                                    <i class="fas fa-arrow-right mx-2 d-flex align-items-center"></i>
                                    
                                    <input type="date" 
                                        value="{{ $endDate }}"
                                        id="endDate"
                                        class="form-control bg-light border-1 border-gray-300 small" 
                                        placeholder="tanggal akhir"
                                        aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-success" id="submit-button-id">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-7 col-12 mt-md-0 mt-4 pt-md-3 pt-0 text-end">
                            <a class="btn btn-success btn-icon-split" href="#" data-toggle="modal" data-target="#transactionModal">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Catat Transaksi</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Keterangan</th>
                                        <th>Masuk/Keluar</th>
                                        <th>Nilai (Rp)</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ Carbon\Carbon::parse($transaction->transaction_date)->format('d F Y') }}</td>
                                            <td>{{ $transaction->description }}</td>
                                            <td>{{ $transaction->status }}</td>
                                            <td>{{ number_format($transaction->quantity, 0, '', '.'); }}</td>
                                            <td>
                                                <a class="text-danger" href="#" data-toggle="modal" data-target="#deleteModal{{ $transaction->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                            <!-- Modal Delete Validation -->
                                            <div class="modal fade" id="deleteModal{{ $transaction->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Apa kamu yakin??</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">Pilih "Hapus" di bawah jika Anda siap menghapus.</div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                            <a class="btn btn-danger" href="{{ route('transaction.destroy', $transaction->id) }}">
                                                                Hapus
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End of Modal Delete Validation -->
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Modal Create Transaction -->
        <div class="modal fade" id="transactionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="POST" action="{{ route('transaction.store') }}" class="user">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header bg-success text-light">
                            <h5 class="modal-title fw-bold" id="exampleModalLabel">Catat Transaksi</h5>
                            <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body container mt-2">
                            <div>
                                <div class="form-floating mb-3">
                                    <?php
                                        // SET TIME SERVER
                                        date_default_timezone_set("Asia/Jakarta");
                                    ?>
                                    <input type="date" 
                                        class="form-control @error('transaction_date') is-invalid @enderror" 
                                        id="transaction" placeholder="date" name="transaction_date"
                                        value="{{ date("Y-m-d") }}" required>
                                    <label for="floatingInput">Tanggal Transaksi</label>
                                    @error('transaction_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div>
                                <div class="form-floating mb-3">
                                    <textarea 
                                        name="description" 
                                        class="form-control text-start @error('description') is-invalid @enderror" 
                                        id="description" placeholder="keterangan"
                                        value="{{ old('description') }}" required></textarea>
                                    <label for="floatingInput">Keterangan</label>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-floating mb-3">
                                        <select class="form-select text-secondary @error('status') is-invalid @enderror" 
                                            id="status" aria-label="Floating label select example" 
                                            name="status" required>
                                            <option selected disabled>-- Pilih status --</option>
                                            <option value="Masuk">Masuk</option>
                                            <option value="Keluar">Keluar</option>
                                        </select>
                                        <label for="floatingInput">Masuk/Keluar</label>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-floating mb-3">
                                        <input type="number" 
                                            class="form-control @error('quantity') is-invalid @enderror" 
                                            id="quantity" placeholder="quantity" name="quantity"
                                            value="{{ old('quantity') }}" required>
                                        <label for="floatingInput">Jumlah</label>
                                        @error('quantity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success fw-bold">
                                Simpan Data
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End of Modal Create Transaction -->

        <!-- Footer -->
        <x-footer></x-footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<x-scroll></x-scroll>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // error message validation modal
            @if ($errors->has('transaction_date') || 
                $errors->has('description') || 
                $errors->has('status') || 
                $errors->has('quantity'))
                $('#transactionModal').modal('show');
            @endif
        });
            
        $('#submit-button-id').click(function() {
            var startDate;
            var endDate;
            
            startDate = $('#startDate').val();
            endDate = $('#endDate').val();

            if (startDate == '') {
                startDate = null;
            } 

            if (endDate == '') {
                endDate = null;
            }
            

            // set url before send to ajax
            var url = "{{ route('transaction.search', [':startDate', ':endDate']) }}";
            url = url.replace(':startDate', startDate);
            url = url.replace(':endDate', endDate);

            $('#form-search').attr('action', url);
        });

    </script>
@endsection
