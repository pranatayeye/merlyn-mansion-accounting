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
                    <div class="card-header py-3 bg-gradient-success">
                        <h6 class="m-0 font-weight-bold text-center text-light">Laporan Pemasukan & Pengeluaran</h6>
                    </div>
                    <div class="card-header py-3 bg-success">
                        <h6 class="m-0 font-weight-bold text-center text-light">Periode {{ Carbon\Carbon::parse($month)->format('M') }} {{ Carbon\Carbon::parse($year)->format('y') }}</h6>
                    </div>
                    <div class="card-body px-md-5">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless">
                                <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Tgl</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col" class="text-end">Pemasukan</th>
                                    <th scope="col" class="text-end">Pengeluaran</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if (isset($dates))
                                        @if ($total_quantity != $saldo)
                                            <tr>
                                                <td>1</td>
                                                <td>01-{{ Carbon\Carbon::parse($month)->format('M') }}-{{ Carbon\Carbon::parse($year)->format('y') }}</td>
                                                <td>Saldo Awal</td>
                                                <td class="text-end">{{ number_format($previous_saldo, 2, '.', ',') }}</td>
                                                <td class="text-end"></td>
                                            </tr>
                                        @endif

                                        @foreach ($dates as $date)
                                            <tr>
                                                @if ($total_quantity != $saldo)
                                                    <td>{{ $loop->iteration + 1 }}</td>
                                                @else
                                                    <td>{{ $loop->iteration }}</td>
                                                @endif
                                                <td>{{ Carbon\Carbon::parse($date->transaction_date)->format('d-M-y') }}</td>
                                                <td>{{ $date->description }}</td>

                                                @if ($date->status == 'Masuk')
                                                    <td class="text-end">{{ number_format($date->quantity, 2, '.', ',') }}</td>
                                                    <td class="text-end"></td>
                                                @elseif ($date->status == 'Keluar')
                                                    <td class="text-end"></td>
                                                    <td class="text-end">{{ number_format($date->quantity, 2, '.', ',') }}</td>
                                                @endif
                                                
                                            </tr>
                                        @endforeach
                                        
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data.</td>
                                        </tr>
                                    @endif
                                </tbody>
                                @if (isset($dates))
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" class="fw-bold text-end">Total</td>
                                            <td class="fw-bold text-end">{{ number_format($revenue, 2, '.', ',') }}</td>
                                            <td class="fw-bold text-end">{{ number_format($expense, 2, '.', ',') }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="fw-bold text-end">Saldo Akhir</td>
                                            <td colspan="2" class="fw-bold text-end">{{ number_format($saldo, 2, '.', ',') }}</td>
                                        </tr>
                                    </tfoot>
                                @endif
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

