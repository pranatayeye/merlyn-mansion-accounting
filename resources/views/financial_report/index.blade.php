@section('pageTitle', 'Financial Report')
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

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-success">
                        <h6 class="m-0 font-weight-bold text-light">Daftar Laporan Kuangan</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead class="bg-success text-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Periode</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result as $yearData)
                                        @foreach ($yearData['months'] as $monthData)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ ucfirst($monthData['month']) }} {{ $yearData['year'] }}</td>
                                                <td class="align-middle">
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle card-drop text-success"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a href="{{ route('financialReport.detail', ['month' => $monthData['month'], 'year' => $yearData['year']]) }}" class="dropdown-item">
                                                                <i class="fas fa-eye text-success me-1"></i>
                                                                    Lihat laporan
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        
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

