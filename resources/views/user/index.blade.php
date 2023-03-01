@section('pageTitle', 'Users')
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

                @if (session()->has('successUser'))
                    <!-- Modal Akun User -->
                    <div class="modal fade" id="akunModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-success text-light">
                                    <h5 class="modal-title fw-bold" id="exampleModalLabel">{{ session('successUser') }}</h5>
                                    <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close" id="close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body mb-3">
                                    <p class="text-danger"><span class="text-danger">*</span>Pastikan Anda sudah menyalin Email dan Password dibawah karena pesan ini tidak akan ditampilkan kembali.</p>
                                    <div class="row">
                                        <div class="col-2">Email</div>
                                        <div class="col-10">:  {{ session('email') }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">Password</div>
                                        <div class="col-10">:  {{ session('password') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Modal Akun User -->
                @endif

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-success">
                        <h6 class="m-0 font-weight-bold text-white">Daftar Transaksi</h6>
                    </div>
                    <div class="card-body row">
                        <div class="col-12 mt-md-0 mt-4 pt-md-3 pt-0 text-end">
                            @if (auth()->user()->can('createUser'))
                                <a class="btn btn-success btn-icon-split me-md-2 mb-md-0 mb-2" href="#" data-toggle="modal" data-target="#roleModal">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Tambah Role</span>
                                </a>
                                <a class="btn btn-success btn-icon-split" href="#" data-toggle="modal" data-target="#userModal">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Tambah User</span>
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead class="bg-success text-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama User</th>
                                        <th>Posisi</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->position }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @foreach ($user->roles as $role)
                                                    <span class="badge bg-success p-2 fw-bold me-1">{{ ucfirst($role->name) }}</span>
                                                @endforeach
                                            </td>


                                            <td class="align-middle">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle card-drop text-success"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        @if (auth()->user()->can('editRoleUser'))
                                                            @if ($user->hasRole('master'))
                                                                <li><a class="dropdown-item text-muted" href="#">
                                                                    <i class="fas fa-edit text-success me-1 text-muted"></i>
                                                                        Edit role
                                                                    </a>
                                                                </li>
                                                            @else
                                                                <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#editRoleModal{{ $user->id }}">
                                                                    <i class="fas fa-edit text-success me-1"></i>
                                                                        Edit role
                                                                    </a>
                                                                </li>
                                                            @endif
                                                        @endif

                                                        @if (auth()->user()->can('deleteUser'))
                                                            @if (Auth()->user()->position == $user->position || $user->hasRole('master'))
                                                                <li><a href="#" class="dropdown-item text-muted">
                                                                    <i class="fas fa-trash text-danger me-1 text-muted"></i>
                                                                        Hapus
                                                                    </a>
                                                                </li>
                                                            @else
                                                                <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteModal{{ $user->id }}">
                                                                    <i class="fas fa-trash text-danger me-1"></i>
                                                                        Hapus
                                                                    </a>
                                                                </li>
                                                            @endif
                                                        @endif

                                                    </ul>
                                                </div>
                                            </td>
                                            
                                            <!-- Modal Edit role -->
                                            <div class="modal fade" id="editRoleModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form method="POST" action="{{ route('user.editRole', $user->id) }}" class="user">
                                                        @csrf
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-success text-light">
                                                                <h5 class="modal-title fw-bold" id="exampleModalLabel">Edit role</h5>
                                                                <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label class="fw-bold">Pilih Role:</label>
                                                                @foreach ($roles as $role)
                                                                    <?php 
                                                                        $is_role = false;

                                                                        foreach ($user->roles as $userRole) {
                                                                            if ($role->name == $userRole->name) {
                                                                                $is_role = true;
                                                                                break;
                                                                            }
                                                                        }
                                                                    ?>

                                                                    @if ($is_role)
                                                                        <div class="form-check my-2 ms-2 @error('roles') is-invalid @enderror">
                                                                            <input class="form-check-input" type="checkbox" value="{{ $role->name }}" name="roles[]" id="flexCheckDefault" checked>
                                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                            <div class="fw-bold">{{ $role->name }}</div> ({{ $role->permissions->pluck('name')->implode(', ') }})
                                                                            </label>
                                                                        </div>
                                                                    @else
                                                                        <div class="form-check my-2 ms-2 @error('roles') is-invalid @enderror">
                                                                            <input class="form-check-input" type="checkbox" value="{{ $role->name }}" name="roles[]" id="flexCheckDefault">
                                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                            <div class="fw-bold">{{ $role->name }}</div> ({{ $role->permissions->pluck('name')->implode(', ') }})
                                                                            </label>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                                @error('roles')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
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
                                            <!-- End of Modal Edit role -->

                                            <!-- Modal Delete Validation -->
                                            <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-success text-light">
                                                            <h5 class="modal-title fw-bold" id="exampleModalLabel">Apa Anda yakin??</h5>
                                                            <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">Pilih "Hapus" di bawah jika Anda siap menghapus.</div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                            <a class="btn btn-danger" href="{{ route('user.destroy', $user->id) }}">
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

        <!-- Modal Create Role -->
        <div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="POST" action="{{ route('user.role') }}" class="user">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header bg-success text-light">
                            <h5 class="modal-title fw-bold" id="exampleModalLabel">Tambah Role</h5>
                            <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body container mt-2">
                            <div>
                                <div class="form-floating mb-3">
                                    <input type="text" 
                                        class="form-control @error('role') is-invalid @enderror" 
                                        id="role" placeholder="role" name="role"
                                        value="{{ old('role') }}" required>
                                    <label for="floatingInput">Nama Role <span class="text-danger">*</span></label>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div>
                                <div class="form-check my-1 ms-2">
                                    <input class="form-check-input" type="checkbox" id="select_all">
                                    <label class="form-check-label fw-bold" for="permission">
                                    Pilih semua
                                    </label>
                                </div>
                                <hr>
                                @foreach ($permissions as $permission)
                                    @if ($permission->name == 'dashboard')
                                        <div class="form-check my-1 ms-2 @error('permissions') is-invalid @enderror">
                                            <input type="hidden" value="{{ $permission->name }}" name="permissions[]">
                                            <input class="form-check-input" type="checkbox" value="{{ $permission->name }}" name="permissions[]" id="permission{{ $permission->id }}" checked disabled>
                                            <label class="form-check-label" for="permission{{ $permission->id }}">
                                                {{ $permission->id }}. {{ $permission->name }}
                                            </label>
                                        </div>
                                    @else
                                        <div class="form-check my-1 ms-2 @error('permissions') is-invalid @enderror">
                                            <input class="form-check-input" type="checkbox" value="{{ $permission->name }}" name="permissions[]" id="permission{{ $permission->id }}">
                                            <label class="form-check-label" for="permission{{ $permission->id }}">
                                                {{ $permission->id }}. {{ $permission->name }}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach

                                @error('permissions')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
        <!-- End of Modal Create Role -->

        <!-- Modal Create User -->
        <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="POST" action="{{ route('user.store') }}" class="user">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header bg-success text-light">
                            <h5 class="modal-title fw-bold" id="exampleModalLabel">Tambah User</h5>
                            <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body container mt-2">
                            <div>
                                <div class="form-floating mb-3">
                                    <input type="text" 
                                        class="form-control @error('name') is-invalid @enderror" 
                                        id="name" placeholder="name" name="name"
                                        value="{{ old('name') }}" required>
                                    <label for="floatingInput">Nama User <span class="text-danger">*</span></label>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div>
                                <div class="form-floating mb-3">
                                    <input type="text" 
                                        class="form-control @error('position') is-invalid @enderror" 
                                        id="position" placeholder="position" name="position"
                                        value="{{ old('position') }}" required>
                                    <label for="floatingInput">Posisi <span class="text-danger">*</span></label>
                                    @error('position')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <label class="fw-bold">Pilih Role:</label>
                            @foreach ($roles as $role)
                                <div class="form-check my-2 ms-2 @error('roles') is-invalid @enderror">
                                    <input class="form-check-input" type="checkbox" value="{{ $role->name }}" name="roles[]" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    <div class="fw-bold">{{ $role->name }}</div> ({{ $role->permissions->pluck('name')->implode(', ') }})
                                    </label>
                                </div>
                            @endforeach
                            @error('roles')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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
        <!-- End of Modal Create User -->

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
            @if ($errors->has('name') || 
                $errors->has('position') ||
                $errors->has('roles'))
                $('#userModal').modal('show');
            @endif

            @if ($errors->has('role') || 
                $errors->has('permissions'))
                $('#roleModal').modal('show');
            @endif

            @if (session()->has('successUser'))
                $('#akunModal').modal({
                    backdrop: 'static',
                    keyboard: false, 
                }); 
                $('#akunModal').modal('show');

                $('#close').click(function() {
                    $('#akunModal').modal('hide');
                });
            @endif
        });

        $('#select_all').click(function() {
            var isChecked = $(this).prop("checked");
            $("input[type='checkbox']").not(":disabled").prop("checked", isChecked);
        });

        $("#permission3, #permission4").click(function() {
            if ($(this).is(":checked")) {
            $("#permission2").prop("checked", true);
            }
        });

        $("#permission7, #permission8, #permission9").click(function() {
            if ($(this).is(":checked")) {
            $("#permission6").prop("checked", true);
            }
        });

        $("#permission2").click(function() {
            if (!$(this).is(":checked")) {
            $("#permission3, #permission4").prop("checked", false);
            }
        });

        $("#permission6").click(function() {
            if (!$(this).is(":checked")) {
            $("#permission7, #permission8, #permission9").prop("checked", false);
            }
        });
    </script>
@endsection
