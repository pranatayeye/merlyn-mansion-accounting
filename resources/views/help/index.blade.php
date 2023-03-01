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

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Bantuan</h1>
                </div>

                <ul>
                    <li><a href="#dashboard" class="text-success fw-bold fs-5">Dashboard</a> 
                        <ul>
                            <li><a href="#dashboard1" class="text-secondary">Apa itu Data Transaksi?</a></li>
                            <li><a href="#dashboard2" class="text-secondary">Apa itu Total Pemasukan?</a></li>
                            <li><a href="#dashboard3" class="text-secondary">Apa itu Total Pengeluaran?</a></li>
                            <li><a href="#dashboard4" class="text-secondary">Apa itu Saldo Akhir?</a></li>
                            <li><a href="#dashboard5" class="text-secondary">Apa itu Data User?</a></li>
                        </ul>
                    </li>
                    <li><a href="#transaction" class="text-success fw-bold fs-5">Transaction</a>
                        <ul>
                            <li><a href="#transaction1" class="text-secondary">Bagaimana mencatat Transaksi Baru?</a></li>
                            <li><a href="#transaction2" class="text-secondary">Bagaimana mencari Transaksi berdasarkan Waktu Tertentu?</a></li>
                            <li><a href="#transaction3" class="text-secondary">Bagaimana menghapus Transaksi?</a></li>
                        </ul>
                    </li>
                    <li><a href="#report" class="text-success fw-bold fs-5">Financial Report</a>
                        <ul>
                            <li><a href="#report1" class="text-secondary">Bagaimana melihat Laporan?</a></li>
                            <li><a href="#report2" class="text-secondary">Bagaimana mengunduh Laporan?</a></li>
                        </ul>
                    </li>
                    <li><a href="#users" class="text-success fw-bold fs-5">Users</a>
                        <ul>
                            <li><a href="#users1" class="text-secondary">Bagaimana cara kerja User Management?</a></li>
                            <li><a href="#users2" class="text-secondary">Bagaimana menambah Role Baru?</a></li>
                            <li><a href="#users3" class="text-secondary">Bagaimana menambah User Baru?</a></li>
                            <li><a href="#users4" class="text-secondary">Bagaimana mengubah Role?</a></li>
                            <li><a href="#users5" class="text-secondary">Bagaimana menghapus User?</a></li>
                        </ul>
                    </li>
                    <li><a href="#log" class="text-success fw-bold fs-5">Activity Log</a>
                        <ul>
                            <li><a href="#log1" class="text-secondary">Bagaimana melihat Log Aktivitas?</a></li>
                        </ul>
                    </li>
                    <li><a href="#other" class="text-success fw-bold fs-5">Lain-lainnya</a>
                        <ul>
                            <li><a href="#other1" class="text-secondary">Bagaimana merubah Password?</a></li>
                            <li><a href="#other2" class="text-secondary">Apa saja kegunaan Permission/Hak akses saat membuat Role?</a></li>
                            <li><a href="#other3" class="text-secondary">Bagaimana cara Logout?</a></li>
                        </ul>
                    </li>
                </ul>

                <section id="dashboard" class="text-success fw-bold fs-5 mt-5 ms-3"># Dashboard</section>
                    <section id="dashboard1" class="text-success fw-bold ms-3"># Apa itu Data Transaksi?</section>
                        <p class="ms-5">Data Transaksi adalah total keseluruhan data yang sudah tercatat pada tabel transaksi.</p>
                    <section id="dashboard2" class="text-success fw-bold ms-3"># Apa itu Total Pemasukan?</section>
                        <p class="ms-5">Total Pemasukan adalah total keseluruhan data dengan status masuk yang sudah tercatat pada tabel transaksi.</p>
                    <section id="dashboard3" class="text-success fw-bold ms-3"># Apa itu Total Pengeluaran?</section>
                        <p class="ms-5">Total Pengeluaran adalah total keseluruhan data dengan status keluar yang sudah tercatat pada tabel transaksi.</p>
                    <section id="dashboard4" class="text-success fw-bold ms-3"># Apa itu Saldo Akhir?</section>
                        <p class="ms-5">Saldo Akhir adalah Total Pemasukan - Total Pengeluaran.</p>
                    <section id="dashboard5" class="text-success fw-bold ms-3"># Apa itu Data User?</section>
                        <p class="ms-5">Data User adalah total keseluruhan user/pengguna yang dapat mengakses sistem ini.</p>


                <section id="transaction" class="text-success fw-bold fs-5 mt-5 ms-3"># Transaction</section>
                    <section id="transaction1" class="text-success fw-bold ms-3"># Bagaimana mencatat Transaksi Baru?</section>
                        <div class="container ms-4 my-2">
                            <img src="{{ asset('assets/img/help/transaction-create1.png') }}" class="img-fluid" alt="">
                            <ol class="mt-3">
                                <li>Pergi ke Halaman Transaction</li>
                                <li>Klik tombol Catat Transaksi</li>
                                <li>Isi semua data Transaksi</li>
                                <li>Simpan data.</li>
                            </ol>
                        </div>
                    <section id="transaction2" class="text-success fw-bold ms-3"># Bagaimana mencari Transaksi berdasarkan Waktu Tertentu?</section>
                        <div class="container ms-4 my-2">
                            <img src="{{ asset('assets/img/help/transaction-search.png') }}" class="img-fluid" alt="">
                            <ol class="mt-3">
                                <li>Pergi ke Halaman Transaction</li>
                                <li>Isi Tanggal awal</li>
                                <li>Isi Tanggal akhir</li>
                                <li>Klik tombol cari.</li>
                            </ol>
                        </div>
                    <section id="transaction3" class="text-success fw-bold ms-3"># Bagaimana menghapus Transaksi?</section>
                        <div class="container ms-4 my-2">
                            <img src="{{ asset('assets/img/help/transaction-delete.png') }}" class="img-fluid" alt="">
                            <ol class="mt-3">
                                <li>Pergi ke Halaman Transaction</li>
                                <li>Cari data Transaksi yang ingin dihapus</li>
                                <li>Klik ikon Hapus berwarna merah</li>
                                <li>Klik tombol Hapus.</li>
                            </ol>
                        </div>

                <section id="report" class="text-success fw-bold fs-5 mt-5 ms-3"># Financial Report</section>
                    <section id="report1" class="text-success fw-bold ms-3"># Bagaimana melihat Laporan?</section>
                        <div class="container ms-4 my-2">
                            <img src="{{ asset('assets/img/help/report.png') }}" class="img-fluid" alt="">
                            <ol class="mt-3">
                                <li>Pergi ke Halaman Financial Report</li>
                                <li>Cari periode Transaksi yang ingin dilihat. Periode sudah dikelompokkan berdasarkan bulan dan tahun</li>
                                <li>Klik ikon paling anan</li>
                                <li>Klik Lihat Laporan.</li>
                            </ol>
                        </div>
                    <section id="report2" class="text-success fw-bold ms-3"># Bagaimana mengunduh Laporan?</section>
                        <div class="container ms-4 my-2">
                            <img src="{{ asset('assets/img/help/report-unduh.png') }}" class="img-fluid" alt="">
                            <ol class="mt-3">
                                <li>Pergi ke Halaman Financial Report</li>
                                <li>Cari periode Transaksi yang ingin dilihat. Periode sudah dikelompokkan berdasarkan bulan dan tahun</li>
                                <li>Klik ikon paling kanan</li>
                                <li>Klik Unduh Laporan.</li>
                            </ol>
                        </div>

                <section id="users" class="text-success fw-bold fs-5 mt-5 ms-3"># Users</section>
                    <section id="users1" class="text-success fw-bold ms-3"># Bagaimana cara kerja User Management?</section>
                        <p class="ms-5">
                            User Management bertujuan untuk mengelola user/pengguna dalam menggunakan sistem ini. 
                            Sistem ini mempunyai beberapa hak akses disetiap halamannya yang disebut Permission.
                            Permission-permission ini dikelompokkan/dibungkus oleh Role.
                            Role ini akan diberikan pada setiap user/pengguna dengan begitu user/pengguna yang memiliki Role akan otomatis mempunyai Permission/Hak akses.
                            <br>
                            Sebagai tambahan, Role Master adalah Role yang memiliki semua Permission/Hak akses sehingga user/pengguna dengan Role ini memiliki otoritas tertinggi dan tidak dapat diubah atau dihapus oleh Role lainnya. 
                        </p>
                    <section id="users2" class="text-success fw-bold ms-3"># Bagaimana menambah Role Baru?</section>
                        <div class="container ms-4 my-2">
                            <img src="{{ asset('assets/img/help/user-role.png') }}" class="img-fluid" alt="">
                            <ol class="mt-3">
                                <li>Pergi ke Halaman Users</li>
                                <li>Klik tombol Tambah Role</li>
                                <li>Isi data Role</li>
                                <li>Pilih Permission/Hak akses. 
                                    <br>
                                    Permission dashboard otomatis ada untuk setiap Role. Jika ingin memilih create, edit, delete maka read otomatis akan terpilih juga.
                                    <br>
                                    <a href="#other2">Apa saja kegunaan Permission/Hak akses saat membuat Role? Klik disini.</a>
                                </li>
                                <li>Simpan data.</li>
                            </ol>
                        </div>
                    <section id="users3" class="text-success fw-bold ms-3"># Bagaimana menambah User Baru?</section>
                        <div class="container ms-4 my-2">
                            <img src="{{ asset('assets/img/help/user-add.png') }}" class="img-fluid mb-2" alt="">
                            <img src="{{ asset('assets/img/help/user-add2.png') }}" class="img-fluid" alt="">
                            <ol class="mt-3">
                                <li>Pergi ke Halaman Users</li>
                                <li>Klik tombol Tambah User</li>
                                <li>Isi semua data User</li>
                                <li>Simpan data</li>
                                <li>PENTING! 
                                    <br>
                                    Setelah data User berhasil ditambahkan 
                                    maka sistem akan memberikan Email dan Password untuk disalin. Password diberikan random agar menjaga keamanan akun.
                                    <br>
                                    Pastikan sudah menyalinnya untuk diberikan kepada User yang bersangkutan karena hanya muncul sekali saja.
                                    <br>
                                    Setelah Email dan Password diberikan, pastikan User tersebut agar Langsung merubah passwordnya setelah Login.
                                    <br>
                                    <a href="#other1">Bagaimana merubah Password? Klik disini.</a>
                                    <br>
                                    Bagaimana jika lupa menyalin Email dan Password? 
                                    <br>
                                    Hapus akun User yang sudah dibuat tadi, lalu ulangi kembali proses menambah User baru.
                                </li>
                            </ol>
                        </div>
                    <section id="users4" class="text-success fw-bold ms-3"># Bagaimana mengubah Role?</section>
                        <div class="container ms-4 my-2">
                            <img src="{{ asset('assets/img/help/user-edit.png') }}" class="img-fluid" alt="">
                            <ol class="mt-3">
                                <li>Pergi ke Halaman Users</li>
                                <li>Klik ikon paling kanan</li>
                                <li>Pilih Edit Role</li>
                                <li>Pilih Role</li>
                                <li>Simpan data.</li>
                            </ol>
                        </div>
                    <section id="users5" class="text-success fw-bold ms-3"># Bagaimana menghapus User?</section>
                        <div class="container ms-4 my-2">
                            <img src="{{ asset('assets/img/help/user-delete.png') }}" class="img-fluid" alt="">
                            <ol class="mt-3">
                                <li>Pergi ke Halaman Users</li>
                                <li>Klik ikon paling kanan</li>
                                <li>Pilih Hapus</li>
                                <li>Klik tombol Hapus.</li>
                            </ol>
                        </div>

                <section id="log" class="text-success fw-bold fs-5 mt-5 ms-3"># Activity Log</section>
                    <section id="log1" class="text-success fw-bold ms-3"># Bagaimana melihat Log Aktivitas?</section>
                        <div class="container ms-4 my-2">
                            <img src="{{ asset('assets/img/help/log.png') }}" class="img-fluid" alt="">
                            <ol class="mt-3">
                                <li>Pergi ke Halaman Activity Log</li>
                                <li>Lihat log aktivitas.</li>
                            </ol>
                        </div>
                                        
                <section id="other" class="text-success fw-bold fs-5 mt-5 ms-3"># Lain-lainya</section>
                    <section id="other1" class="text-success fw-bold ms-3"># Bagaimana merubah Password?</section>
                        <div class="container ms-4 my-2">
                            <img src="{{ asset('assets/img/help/password.png') }}" class="img-fluid" alt="">
                            <ol class="mt-3">
                                <li>Klik ikon Profil/Avatar pada pojok kanan atas</li>
                                <li>Pilih Ubah Password</li>
                                <li>Isi Password Baru</li>
                                <li>Simpan data.</li>
                            </ol>
                        </div>
                    
                    <section id="other2" class="text-success fw-bold ms-3"># Apa saja kegunaan Permission/Hak akses saat membuat Role?</section>
                        <ol class="ms-5">
                            <li><b>Dashboard</b>
                                <br>
                                Untuk mengakses Halaman awal.
                            </li>
                            <li><b>ReadTransaction</b>
                                <br>
                                Untuk mengakses Halaman Transaction.
                            </li>
                            <li><b>CreateTransaction</b>
                                <br>
                                Untuk mencatat Transaksi Baru.
                                </li>
                            <li><b>DeleteTransaction</b>
                                <br>
                                Untuk menghapus Data Transaksi.
                            </li>
                            <li><b>ReadReport</b>
                                <br>
                                Untuk mengakses Halaman Financial Report.
                            </li>
                            <li><b>ReadUser</b>
                                <br>
                                Untuk mengakses Halaman User Management.
                            </li>
                            <li><b>CreateUser</b>
                            <br>
                                Untuk menambah akun User Baru dan menambah Role Baru.
                            </li>
                            <li><b>EditRoleUser</b>
                            <br>
                                Untuk merubah Role User sebelumnya.
                            </li>
                            <li><b>DeleteUser</b>
                            <br>
                                Untuk menghapus akun User.
                            </li>
                            <li><b>ReadLog</b>
                            <br>
                                Untuk melihat Halaman Activity Log.
                            </li>
                        </ol>

                    <section id="other3" class="text-success fw-bold ms-3"># Bagaimana cara Logout?</section>
                        <div class="container ms-4 my-2">
                            <img src="{{ asset('assets/img/help/logout.png') }}" class="img-fluid" alt="">
                            <ol class="mt-3">
                                <li>Klik ikon Profil/Avatar pada pojok kanan atas</li>
                                <li>Pilih Logout.</li>
                            </ol>
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

