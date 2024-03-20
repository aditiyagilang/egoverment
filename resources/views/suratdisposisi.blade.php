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
                $activePage = 'suratdisposisi'; // Contoh, sesuaikan dengan halaman yang sedang aktif
            @endphp
            @include('sidebar', ['activePage' => $activePage])
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                                <i class="ti ti-bell-ringing"></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('assets/images/profile/user-1.jpg') }}" alt=""
                                        width="35" height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="/profile" class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a>
                                        <a href="/login" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
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
                                Tabel Surat Masuk
                            </h3>
                            <div class="card-body">
                                <div id="table" class="table-editable">
                                    <span class="table-add float-end mb-3 me-2">
                                        <button class="btn btn-sm btn-success" data-toggle="modal"
                                            data-target="#exampleModalCenter3"><i class="ri-add-fill"><span
                                                    class="ps-1">Add New</span></i></button>
                                        <div class="modal fade" id="exampleModalCenter3" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit
                                                            Data</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="form-group">
                                                                <label for="no">No Surat</label>
                                                                <input type="text" id="no"
                                                                    class="form-control"
                                                                    placeholder="Contoh form text ...">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="noAgenda">No Agenda</label>
                                                                <input type="text" id="noAgenda"
                                                                    class="form-control"
                                                                    placeholder="Contoh form text ...">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="nama">Nama</label>
                                                                <input type="text" id="nama"
                                                                    class="form-control"
                                                                    placeholder="Contoh form text ...">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="perihal">Perihal</label>
                                                                <textarea type="text" id="perihal" class="form-control" placeholder="Contoh textarea ..."></textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="nama">Asal Surat</label>
                                                                <input type="text" id="nama"
                                                                    class="form-control"
                                                                    placeholder="Contoh form text ...">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="tanggal">Tanggal
                                                                    Surat</label>
                                                                <input type="date" class="form-control"
                                                                    id="inputGroupFile02">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="tanggalterima">Tanggal
                                                                    Terima</label>
                                                                <input type="date" class="form-control"
                                                                    id="inputGroupFile02">
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary">Save
                                                            Changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                    <table class="table table-bordered table-responsive-md table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th>No Surat</th>
                                                <th>No Agenda</th>
                                                <th>Nama</th>
                                                <th>Perihal</th>
                                                <th>Asal Surat</th>
                                                <th>Tanggal Surat</th>
                                                <th>Tanggal Terima</th>
                                                <th>Action</th> <!-- Ubah kolom Remove menjadi Action -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="">
                                                <td contenteditable="true">1</td>
                                                <td contenteditable="true">1</td>
                                                <td contenteditable="true">Sueb</td>
                                                <td contenteditable="true">SKTM Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing elit. Sed
                                                    do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                    enim ad minim veniam,
                                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                                    commodo consequat. Duis aute
                                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore
                                                    eu fugiat nulla pariatur.
                                                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                                    officia deserunt mollit
                                                    anim id est laborum.</td>
                                                <td contenteditable="true">Kelurahan</td>
                                                <td contenteditable="true">11-03-2024</td>
                                                <td contenteditable="true">12-03-2024</td>
                                                <td>
                                                    <!-- Tombol untuk setiap action -->
                                                    <button type="button"
                                                        class="btn btn-danger btn-rounded btn-sm my-0"
                                                        data-toggle="modal"
                                                        data-target="#exampleModalCenter2">Delete</button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModalCenter2" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="exampleModalLongTitle">Announcement</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure you want to deleted this?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-primary">Delete</button>
                                                                    <button type="button" class="btn btn-primary"
                                                                        data-dismiss="modal"
                                                                        style="background-color:black">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button"
                                                        class="btn btn-warning btn-rounded btn-sm my-0"
                                                        data-toggle="modal"
                                                        data-target="#exampleModalCenter1">Edit</button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModalCenter1" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="exampleModalLongTitle">Edit
                                                                        Data</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <label for="no">No Surat</label>
                                                                            <input type="text" id="no"
                                                                                class="form-control"
                                                                                placeholder="Contoh form text ...">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="noAgenda">No Agenda</label>
                                                                            <input type="text" id="noAgenda"
                                                                                class="form-control"
                                                                                placeholder="Contoh form text ...">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="nama">Nama</label>
                                                                            <input type="text" id="nama"
                                                                                class="form-control"
                                                                                placeholder="Contoh form text ...">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="perihal">Perihal</label>
                                                                            <textarea type="text" id="perihal" class="form-control" placeholder="Contoh textarea ..."></textarea>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="nama">Asal Surat</label>
                                                                            <input type="text" id="nama"
                                                                                class="form-control"
                                                                                placeholder="Contoh form text ...">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="tanggal">Tanggal
                                                                                Surat</label>
                                                                            <input type="date" class="form-control"
                                                                                id="inputGroupFile02">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="tanggalterima">Tanggal
                                                                                Terima</label>
                                                                            <input type="date" class="form-control"
                                                                                id="inputGroupFile02">
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-primary">Save
                                                                        Changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button"
                                                        class="btn btn-info btn-rounded btn-sm my-0">Send</button>
                                                        <a type="button" href="{{ url('generate-pdf') }}"
                                                        class="btn btn-primary btn-rounded btn-sm my-0">View</a>
                                                </td>
                                            </tr>
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

            document.addEventListener("DOMContentLoaded", function() {
                var commentCells = document.querySelectorAll("td:nth-child(5)"); // Memilih sel pada kolom "Perihal"

                commentCells.forEach(function(cell) {
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
