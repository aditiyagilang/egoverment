<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>


<body>

    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            @php
                $activePage = 'user'; // Contoh, sesuaikan dengan halaman yang sedang aktif
            @endphp
            @include('admin.sidebar', ['activePage' => $activePage])
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light shadow-sm">

                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('assets/images/profile/user-1.jpg') }}" alt="" width="35"
                                        height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a>
                                        <a href="./authentication-login.html"
                                            class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                <!--  Row 1 -->
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Editable table -->
                        <div class="card">
                            <h3 class="card-header text-center font-weight-bold text-uppercase py-4"
                                style="background-color: #5D87FF; color: black">
                                Tabel Jabatan
                            </h3>
                            <div class="card-body">
                                <div id="table" class="table-editable">
                                    <span class="table-add float-end mb-3 me-2">
                                        <button class="btn btn-sm btn-success" data-toggle="modal"
                                            data-target="#addModal"><i class="ri-add-fill"><span
                                                    class="ps-1">Add New</span></i></button>
                                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                                            aria-labelledby="addModalTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addModalTitle">Add New Jabatan</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="name">Nama</label>
                                                                <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan Nama">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan Email">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="password">Password</label>
                                                                <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="alamat">Alamat</label>
                                                                <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Masukkan Alamat">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="notelp">Nomor Telepon</label>
                                                                <input type="text" id="notelp" name="notelp" class="form-control" placeholder="Masukkan Nomor Telepon">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="foto">Foto</label>
                                                                <input type="file" id="foto" name="foto" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jabatan_id">Jabatan</label>
                                                                <select id="jabatan_id" name="jabatan_id" class="form-control">
                                                                    <!-- Tambahkan opsi untuk setiap jabatan -->
                                                                    @foreach($jabatan as $jbtn)
                                                                        <option value="{{ $jbtn->id }}">{{ $jbtn->nama }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="level">Hak Akses</label>
                                                                <select id="level" name="level" class="form-control">
                                                                    <option value="Admin">Admin</option>
                                                                    <option value="Sekretaris">Sekretaris</option>
                                                                    <option value="Kepala Desa">Kepala Desa</option>
                                                                    <option value="Kaur Umum">Kaur Umum</option>
                                                                    <option value="Lainya">Lainya</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="telegram_id">ID Telegram</label>
                                                                <input type="text" id="telegram_id" name="telegram_id" class="form-control" placeholder="Masukkan ID Telegram">
                                                            </div>
                                                            <!-- Tambahkan formulir untuk bidang lainnya di sini sesuai kebutuhan Anda -->

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-primary">Add User</button>
                                                            </div>
                                                        </form>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </span>
                                    <table class="table table-bordered table-responsive-md table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Alamat</th>
                                                <th>No Handphone</th>
                                                <th>ID Telegram</th>
                                                <th>Jabatan</th>
                                                <th>Hak Akses</th>
                                                <th>Action</th> <!-- Ubah kolom Remove menjadi Action -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user as $key => $user)
                                                <tr >

                                                    <td>{{ $key + 1 }}</td>


                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->alamat }}</td>
                                                    <td>{{ $user->notelp }}</td>
                                                    <td>{{ $user->telegram_id }}</td>
                                                    <td>{{ $user->jabatan->nama }}</td>
                                                    <td>{{ $user->level }}</td>

                                                    <td>
                                                        <!-- Tombol untuk setiap action -->
                                                        <button type="button"
                                                            class="btn btn-danger btn-rounded btn-sm my-0"
                                                            data-toggle="modal"
                                                            data-target="#deleteModal{{ $user->id }}">Delete</button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="deleteModal{{ $user->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="deleteModalLabel{{ $user->id }}"
                                                            aria-hidden="true">
                                                            <!-- Isi formulir untuk mengedit data user -->
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="deleteModalTitle">
                                                                            Confirmation</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Are you sure you want to delete this user?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form id="deleteForm"
                                                                            action="{{ route('user.destroy', $user->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Delete</button>
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">Cancel</button>
                                                                        </form>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <button type="button"
                                                            class="btn btn-warning btn-rounded btn-sm my-0"
                                                            data-toggle="modal"
                                                            data-target="#editModal{{ $user->id }}">Edit</button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $user->id }}" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="form-group">
                                                                                <label for="name">Nama</label>
                                                                                <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="email">Email</label>
                                                                                <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="alamat">Alamat</label>
                                                                                <input type="text" id="alamat" name="alamat" class="form-control" value="{{ $user->alamat }}" placeholder="Enter Alamat">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="notelp">No. Telepon</label>
                                                                                <input type="text" id="notelp" name="notelp" class="form-control" value="{{ $user->notelp }}" placeholder="Enter No. Telepon">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="foto">Foto</label>
                                                                                <input type="file" id="foto" name="foto" class="form-control" value="{{ $user->foto }}" placeholder="Enter Foto">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="jabatan_id">Jabatan</label>
                                                                                <input type="text" id="jabatan_id" name="jabatan_id" class="form-control" value="{{ $user->jabatan_id }}" placeholder="Enter Jabatan">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="level">Hak Akses</label>
                                                                                <select id="level" name="level" class="form-control">
                                                                                    <!-- Tambahkan opsi untuk setiap jabatan -->

                                                                                        <option value="{{ $user->level }}">{{ $user->level }}</option>
                                                                                        <option value="Admin">Admin</option>
                                                                                        <option value="Sekretaris">Sekretaris</option>
                                                                                        <option value="Kepala Desa">Kepala Desa</option>
                                                                                        <option value="Kaur Umum">Kaur Umum</option>
                                                                                        <option value="Lainya">Lainya</option>

                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="telegram_id">Telegram ID</label>
                                                                                <input type="text" id="telegram_id" name="telegram_id" class="form-control" value="{{ $user->telegram_id }}" placeholder="Enter Telegram ID">
                                                                            </div>

                                                                            <!-- Tambahkan formulir untuk bidang lainnya di sini sesuai kebutuhan Anda -->

                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Wrapper End-->
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
        <!-- Your scripts -->
        <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/sidebarmenu.js') }}"></script>
        <script src="{{ asset('js/app.min.js') }}"></script>
        <script src="{{ asset('libs/apexcharts/dist/apexcharts.min.js') }}"></script>
        <script src="{{ asset('libs/simplebar/dist/simplebar.js') }}"></script>
        <script src="{{ asset('js/dashboard.js') }}"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var perihalCells = document.querySelectorAll("td:nth-child(4)"); // Memilih sel pada kolom "Perihal"

                perihalCells.forEach(function(cell) {
                    var content = cell.textContent;
                    var words = content.split(' ');
                    if (words.length > 20) { // Memeriksa apakah jumlah kata melebihi 100
                        var truncatedContent = words.slice(0, 20).join(
                            ' '); // Memotong array kata menjadi 100 kata dan menggabungkannya kembali
                        var fullContent = words.join(' '); // Menggabungkan kembali seluruh kalimat

                        // Menambahkan teks singkat dan tombol "Selengkapnya" untuk sel yang telah dipotong
                        cell.innerHTML = truncatedContent + '<span class="ellipsis">...</span>' +
                            '<span class="full-text" style="display:none;">' + fullContent + '</span>' +
                            '<button class="btn btn-link btn-sm read-more">Selengkapnya</button>';

                        // Menambahkan event listener untuk setiap tombol "Selengkapnya"
                        cell.querySelector('.read-more').addEventListener('click', function() {
                            var ellipsis = cell.querySelector('.ellipsis');
                            var fullText = cell.querySelector('.full-text');

                            if (ellipsis.style.display === 'none') {
                                ellipsis.style.display = 'inline'; // Menampilkan elipsis
                                fullText.style.display = 'none'; // Menyembunyikan seluruh kalimat
                                this.textContent =
                                    'Selengkapnya'; // Mengganti teks tombol menjadi "Selengkapnya"
                            } else {
                                ellipsis.style.display = 'none'; // Menyembunyikan elipsis
                                fullText.style.display = 'inline'; // Menampilkan seluruh kalimat
                                this.textContent =
                                    'Sembunyikan'; // Mengganti teks tombol menjadi "Sembunyikan"
                            }
                        });
                    }
                });
            });
        </script>


</body>

</html>
