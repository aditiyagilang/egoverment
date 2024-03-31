<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .card-img-top {
            height: 800px;
            /* Ubah nilai tinggi sesuai kebutuhan */
            object-fit: cover;
            /* Memastikan gambar mengisi seluruh area dengan menjaga aspek rasio */
        }

        p {
            text-align: justify;
            /* Mengatur teks menjadi rata kanan-kiri */
        }
    </style>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .profile-image {
            max-width: 150px;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6"
    data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <aside class="left-sidebar">
        @php
            $activePage = 'profil'; // Contoh, sesuaikan dengan halaman yang sedang aktif
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
                                <img src="assets/profile/{{$user->foto}}/{{$user->foto}}" alt="" width="35"
                                    height="35" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                aria-labelledby="drop2">
                                <div class="message-body">
                                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                        <i class="ti ti-user fs-6"></i>
                                        <p class="mb-0 fs-3">My Profile</p>
                                    </a>
                                    <a href="/logout"
                                        class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="container-fluid">
            <div class="container py-4">


                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Edit Profile</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-4 mb-md-0 text-center">
                                        <img src="assets/profile/{{$user->foto}}/{{$user->foto}}" style="height: 21%; width: 100%;" alt="Profile Image"
                                            class="profile-image img-fluid rounded-circle">

                                        <p>Nama: {{$user->name}}</p>
                                        <p>Email: {{$user->email}}</p>
                                        <!-- Tambah label dengan data di sini -->
                                    </div>
                                    <div class="col-md-8">
                                        <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="{{$user->name}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email address</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{$user->email}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{$user->password}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="confirm_password">Confirm Password</label>
                                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Enter your address" value="{{$user->alamat}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="notelp">Nomor Telepon</label>
                                                <input type="text" class="form-control" id="notelp" name="notelp" placeholder="Enter your phone number" value="{{$user->notelp}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="telegram_id">ID Telegram</label>
                                                <input type="text" class="form-control" id="telegram_id" name="telegram_id" placeholder="Enter your phone number" value="{{$user->telegram_id}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="foto">Foto</label>
                                                <input type="file" id="foto" name="foto" class="form-control" value="{{ $user->foto }}" placeholder="Enter Foto">
                                            </div>
                                            <!-- Menambahkan input untuk data yang diperlukan lainnya -->
                                            <button type="submit" class="btn btn-primary">Update Profile</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
