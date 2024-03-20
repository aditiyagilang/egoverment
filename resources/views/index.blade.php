<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link href="{{asset('assets/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
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
            height: 800px; /* Ubah nilai tinggi sesuai kebutuhan */
            object-fit: cover; /* Memastikan gambar mengisi seluruh area dengan menjaga aspek rasio */
        }
        p {
            text-align: justify; /* Mengatur teks menjadi rata kanan-kiri */
        }
    </style>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6"
        data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            @php
                $activePage = 'index'; // Contoh, sesuaikan dengan halaman yang sedang aktif
            @endphp
            @include('sidebar', ['activePage' => $activePage])
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
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

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Surat Masuk</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">100</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-envelope fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Surat Keluar</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">120</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-envelope-open-text fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Surat Disposisi
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">100</div>
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm mr-2">
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-mail-bulk fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Total Surat</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">320</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="far fa-check-square fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Row -->

                <div class="row">
                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h5 style="font-family: 'Arial', sans-serif; font-weight: bold; color: #000; text-align: center;">Data Jumlah Surat Diterima Pada Tahun 2024</h5>
                                <!-- Example split danger button -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary">Tahun</button>
                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">2021</a></li>
                                    <li><a class="dropdown-item" href="#">2022</a></li>
                                    <li><a class="dropdown-item" href="#">2023</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <canvas id="grafikSurat"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- Pie Chart -->
                </div>
                <!-- Content Row -->
                <div class="row">
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="col">
                            <div class="card h-100">
                                <img src="{{asset('assets/images/profile/kematian.jpg')}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Contoh Surat Keterangan Kematian</h5>
                                    <p class="card-text">
                                        Surat kematian adalah dokumen resmi yang dikeluarkan oleh instansi pemerintah setempat atau lembaga yang berwenang, yang menyatakan bahwa seseorang telah meninggal dunia. Dokumen ini merupakan bukti legal yang diperlukan untuk berbagai
                                        prosedur administratif, klaim asuransi, penyelesaian warisan, dan lain sebagainya. Surat kematian berisi informasi penting tentang identitas individu yang meninggal dan informasi tentang kematian tersebut.
                                        {{-- Berikut adalah beberapa informasi yang biasanya tercantum dalam surat kematian:
                                        <ol>
                                            <li>Nama lengkap dan identitas pribadi: Surat kematian akan mencantumkan nama lengkap individu yang meninggal, termasuk tanggal lahir, tempat lahir, dan nomor identitas jika relevan. Ini membantu untuk mengidentifikasi orang yang meninggal secara pasti.</li>
                                            <li>Tanggal dan tempat kematian: Dokumen tersebut akan mencantumkan tanggal dan tempat di mana individu tersebut meninggal dunia. Informasi ini diperlukan untuk keperluan administratif dan perencanaan pemakaman.</li>
                                            <li>Penyebab kematian: Surat kematian biasanya juga mencantumkan penyebab kematian, baik secara singkat maupun detail, tergantung pada ketentuan yang berlaku di wilayah tersebut. Informasi ini dapat diperoleh dari sertifikat kematian yang dikeluarkan oleh dokter yang merawat.</li>
                                            <li>Tanda tangan dan cap resmi: Dokumen tersebut akan ditandatangani oleh pejabat yang berwenang, seperti petugas catatan sipil atau dokter yang menandatanganinya, dan akan dicap dengan cap resmi lembaga yang menerbitkannya untuk memberikan keabsahan.</li>
                                        </ol> --}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <img src="{{asset('assets/images/profile/usaha.webp')}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Contoh Surat Keterangan Usaha</h5>
                                    <p class="card-text">
                                        Surat keterangan usaha adalah dokumen resmi yang dikeluarkan oleh instansi pemerintah atau lembaga lain yang berwenang, yang menyatakan bahwa seseorang atau suatu badan usaha memang memiliki usaha atau bisnis yang sah dan terdaftar. Dokumen ini
                                        sering kali diperlukan untuk berbagai keperluan administratif, termasuk pendaftaran ke lembaga keuangan, pengajuan izin usaha, partisipasi dalam tender proyek, atau dalam transaksi bisnis lainnya.
                                        {{-- Berikut adalah beberapa informasi yang biasanya terdapat dalam surat keterangan usaha:
                                        <ol>
                                            <li>Identitas Pemilik Usaha atau Perusahaan: Surat keterangan tersebut akan mencantumkan nama lengkap pemilik usaha atau perusahaan, serta informasi identifikasi lainnya seperti nomor identitas atau nomor perusahaan.</li>
                                            <li>Informasi tentang Usaha atau Perusahaan: Dokumen tersebut akan memberikan informasi mengenai jenis usaha atau bidang usaha yang dijalankan, misalnya jasa, perdagangan, atau manufaktur, serta detail lainnya yang relevan.</li>
                                            <li>Tanggal Berlaku: Surat keterangan usaha akan mencantumkan tanggal dikeluarkannya dokumen tersebut, yang menunjukkan kebaruan informasi yang terkandung di dalamnya.</li>
                                            <li>Tanda Tangan dan Cap Resmi: Surat keterangan tersebut akan ditandatangani oleh pejabat yang berwenang dan dicap dengan cap resmi dari lembaga atau pihak yang menerbitkannya, untuk memberikan keabsahan dokumen tersebut.</li>
                                            <li>Nomor Registrasi atau Izin Usaha: Dokumen tersebut mungkin juga mencantumkan nomor registrasi atau nomor izin usaha yang dimiliki oleh usaha atau perusahaan yang bersangkutan.</li>
                                        </ol> --}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <img src="{{asset('assets/images/profile/domisili.jpg')}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Contoh Keterangan Domisili</h5>
                                    <p class="card-text">
                                        Surat keterangan domisili adalah dokumen resmi yang dikeluarkan oleh pihak berwenang, seperti pemerintah daerah atau kepolisian, yang menyatakan bahwa seseorang atau sekelompok orang memiliki tempat tinggal atau kediaman di suatu wilayah atau
                                        alamat tertentu. Dokumen ini sering kali diperlukan untuk keperluan administratif, seperti pembukaan rekening bank, pendaftaran kartu identitas, pendaftaran sekolah, atau berbagai transaksi lain yang memerlukan bukti alamat tempat tinggal.
                                        {{-- Berikut adalah beberapa informasi yang biasanya dicantumkan dalam surat keterangan domisili:
                                        <ol>
                                            <li>Identitas Pihak yang Bersangkutan: Surat keterangan domisili akan mencantumkan nama lengkap, nomor identitas, tanggal lahir, dan informasi identifikasi lainnya untuk mengidentifikasi orang yang bersangkutan.</li>
                                            <li>Alamat Tempat Tinggal: Dokumen tersebut akan mencantumkan alamat lengkap tempat tinggal atau kediaman orang yang bersangkutan.</li>
                                            <li>Tanggal Dikeluarkan: Surat keterangan domisili akan mencantumkan tanggal penerbitan dokumen tersebut untuk menunjukkan kebaruan informasi yang terkandung di dalamnya.</li>
                                            <li>Tanda Tangan dan Cap Resmi: Surat tersebut akan ditandatangani oleh pejabat yang berwenang, seperti lurah atau kepala desa, dan akan dicap dengan cap resmi dari lembaga atau pihak yang menerbitkannya untuk memberikan keabsahan dokumen tersebut.</li>
                                        </ol> --}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <img src="{{asset('assets/images/profile/sktm.webp')}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Contoh Surat SKTM</h5>
                                    <p class="card-text">
                                        Surat keterangan tidak mampu adalah dokumen resmi yang dikeluarkan oleh pihak yang berwenang, seperti kantor pemerintah atau lembaga yang berwenang, yang menyatakan bahwa seseorang atau sekelompok orang tidak mampu
                                        secara finansial untuk melakukan atau memenuhi suatu kewajiban atau keperluan tertentu. Surat ini biasanya digunakan sebagai bukti bahwa seseorang tidak memiliki cukup dana untuk membayar biaya-biaya tertentu, seperti
                                        biaya pengobatan, biaya pendidikan, atau biaya administrasi lainnya.
                                        {{-- Berikut adalah beberapa hal yang biasanya dicantumkan dalam surat keterangan tidak mampu:
                                        <ol>
                                            <li>Identitas Pihak yang Bersangkutan: Surat keterangan tidak mampu akan mencantumkan nama lengkap, alamat, nomor identitas, dan informasi lainnya yang diperlukan untuk mengidentifikasi orang yang bersangkutan.</li>
                                            <li>Penjelasan Keadaan Finansial: Surat tersebut akan menjelaskan secara singkat alasan mengapa pihak yang bersangkutan tidak mampu secara finansial, misalnya pengangguran, keterbatasan pendapatan, atau kondisi ekonomi lainnya.</li>
                                            <li>Tujuan Penggunaan Surat: Surat keterangan tidak mampu akan mencantumkan tujuan penggunaannya, misalnya untuk mengajukan bantuan keuangan, memperoleh keringanan biaya, atau untuk keperluan administratif lainnya.</li>
                                            <li>Tanda Tangan dan Cap Resmi: Surat tersebut akan ditandatangani oleh pejabat yang berwenang dan dicap dengan cap resmi lembaga yang menerbitkannya untuk memberikan keabsahan dokumen tersebut.</li>
                                        </ol> --}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('grafikSurat').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Jumlah Surat Diproses',
                    data: [12, 19, 3, 5, 2, 3, 8, 10, 15, 10, 5, 20],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var cards = document.querySelectorAll(".card-text"); // Memilih semua elemen dengan kelas "card-text"

            cards.forEach(function(card) {
                var content = card.textContent.trim(); // Menghapus spasi di awal dan akhir teks
                var words = content.split(' '); // Memisahkan teks menjadi array kata

                var maxWords = 20; // Jumlah maksimum kata yang ingin ditampilkan

                if (words.length > maxWords) {
                    var truncatedContent = words.slice(0, maxWords).join(' '); // Memotong array kata menjadi maksimum jumlah kata yang ditentukan
                    var fullContent = words.join(' '); // Menggabungkan kembali seluruh kalimat

                    card.innerHTML = truncatedContent + '...'; // Menampilkan teks yang dipotong dengan ellipsis

                    // Menambahkan event listener untuk memperluas atau memperpendek teks saat mengklik card
                    card.addEventListener('click', function() {
                        if (card.textContent === truncatedContent + '...') {
                            card.textContent = fullContent; // Menampilkan seluruh kalimat
                        } else {
                            card.textContent = truncatedContent + '...'; // Kembali ke tampilan teks yang dipotong dengan ellipsis
                        }
                    });
                }
            });
        });
    </script>

