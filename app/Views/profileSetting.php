<section class="section-profile-setting casingAllSec" style="display: flex">
    <div class="container-profile">
        <div class="profile">

            <div class="content-profile-setting">
                <div class="profile-picture">
                    <img src="<?php echo base_url('assets/images/tekno.png') ?>" alt="">
                </div>
                <div class="profile-information">
                    <div class="profile-options">
                        <div class="information options" id="content-information-profile" onclick="BukaOptions(this)">
                            Informasi
                        </div>
                        <div class="change-password options" id="content-password-change" onclick="BukaOptions(this)">
                            Ubah password
                        </div>
                        <div class="action-history options" id="content-action-history" onclick="BukaOptions(this)">
                            History Aksi
                        </div>
                    </div>
                    <div class="profile-content">
                        <span>Nama :
                            <?= $adminName; ?>
                        </span>
                        <span>Role : admin</span>
                        <span>Waktu Login :
                            <?= $login_date ?>
                        </span>
                    </div>
                </div>
            </div>
            <div class="main-profile-content">

                <div class="content-password-change" style="display: none">
                    <form action="../ControllerTable/GantiPassword/<?= $adminName; ?>" method="POST">
                        <span>Password Saat Ini</span>
                        <input type="text" name="recent-password">
                        <span>Password Baru</span>
                        <input type="text" name="new-password">
                        <span>Ulangi Password Baru</span>
                        <input type="text" name="retype-new-password">
                        <button>Change</button>
                    </form>
                </div>

                <div class="content-information-profile" style="display: none;">
                    nothing
                </div>

                <div class="content-action-history" style="display: flex">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Admin</th>
                                <th>Role</th>
                                <th>Table</th>
                                <th>Aksi</th>
                                <th>Keterangan</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <?php foreach ($data as $row): ?>
                            <tr>
                                <?php foreach ($row as $value): ?>
                                    <td>
                                        <?= $value ?>
                                    </td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>

            </div>
        </div>


    </div>
</section>