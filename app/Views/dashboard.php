<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <link rel="stylesheet" href="<?php echo base_url('assets/css/table.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/navigasi.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dashboard.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/profilesetting.css'); ?>">

    <!-- <script src="assets/js/script.js"></script>  -->
    <script src="<?php echo base_url('assets/js/table.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/navigasi.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/profile.js'); ?>"></script>
</head>

<body>
    <div class="navigasi">
        <i class="bi bi-list" onclick="BukaSidebar()"></i>
        <span>Dashboard</span>
        <i class="bi bi-person-circle"onclick="BukaOpsiProfile(this)" id="info-profile"></i>
    </div>

    <div class="info-profile">
        <span id="tanggal-profile">Hi <b id="user-name"><?= $adminName; ?></b> </span>
        <span onclick="window.location.href = '../dashboard/section-profile-setting'">Profile</span>
        <span onclick="window.location.href = '../dashboard/section-profile-setting'">Setting</span>
        <span onclick="window.location.href = '../dashboard/section-profile-setting'">My History</span>
        <span onclick="window.location.href = '../Home/logout'">Log Out</span>
    </div>

    <div class="sidebar">
        <span class="toggle-sidebar"><i class="bi bi-list" onclick="TutupSidebar()"></i></span>
        <span><img src="<?php echo base_url('assets/images/tekno.png'); ?>" width="100" alt=""></span>
        <span class="sidebar-items" id="section-table-charts" onclick="TampilkanSection(this)">Charts</span>
        <span class="sidebar-items" id="section-table-inventaris" onclick="TampilkanSection(this)">Inventaris Asset</span>
        <span class="sidebar-items" id="section-table-rekap" onclick="TampilkanSection(this)">Rekap Peminjaman</span>
        <span class="sidebar-items" id="section-table-dokumentasi" onclick="TampilkanSection(this)">Dokumentasi Asset</span>
        <span class="sidebar-items" id="section-table-tracking" onclick="TampilkanSection(this)">Tracking Asset</span>
        <span class="sidebar-items" id="section-perhitungan-roi" onclick="TampilkanSection(this)">Perhitungan Roi</span>
        <span class="sidebar-items" id="section-profile-setting" onclick="TampilkanSection(this)">Setting</span>
        <span onclick="window.location.href = '../Home/logout'">Keluar</span>
    </div>

    <!-- TAMPILAN UTAMA TABLE -->
    <?php include_once '../app/Views/'. $section ;?>
    <!-- END TAMPILAN TABLE -->

    <div class="container-alert">
        <div class="alertDelete">
            <span class="alertClose"><i class="bi bi-x"></i></span>
            <div class="alertMessage">
                <h4>Anda Yakin Ingin Menghapus?</h4>
            </div>
            <div class="alertButton">
                <button class="alertConfirmHapus">HAPUS</button>
                <button class="alertConfirmBatal">BATAL</button>
            </div>
        </div>
    </div>


    <div class="pemberitahuan">
        <div class="close-pemberitahuan">
            <i class="bi bi-x"></i>
        </div>
        <div class="message-pemberitahuan">
            <h4>Anda Berhasil menginput data</h4>
        </div>
    </div>






    <script src="<?php echo base_url('assets/js/dashboard.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/charts.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/roi.js'); ?>"></script>
</body>

</html>