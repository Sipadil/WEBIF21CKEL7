<section class="section-table-tracking casingAllSec" style="display: flex;">

        <table class="opsi-fitur-tracking">
            <tr>
                <th>
                    <b>
                        <span class="aksi-tambah" onclick="OpsiFiturTamabah(this)"
                            id="form-table-tracking">Tambah</span>
                        <span class="aksi-hapus" onclick="OpsiFiturHapus(this)" id="form-table-tracking">Hapus</span>
                        <span class="aksi-copy"  onclick="CopyData()">Copy</span>
                        <span class="aksi-paste">Paste</span>
                        <span class="aksi-download" onclick="DownloadData(this)" id="form-table-tracking">Download</span>
                        <span class="aksi-upload" id="fileName"onclick="uploadData()">Chose File</span>
                        <span id="uploadData" class="uploadDataTracking">Upload</span>
                        <span class="aksi-reload">Reload</span>
                        <span><input type="text" name="table-data-tracking" id="field-aksi-pencarian"></span>
                        <span class="aksi-pencarian" onclick="PencarianData(this)" id="table-data-tracking"><i
                                class="bi bi-search"></i></span>
                    </b>
                </th>
            </tr>
        </table>
        <div class="caseOverflowTable">
            <table class="table-data-tracking">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="pilih-semua" id="pilih-semua-tracking" class="checkbox-semua" onclick="PilihSemua(this)">
                        </th>
                        <?php foreach (array_slice($fields, 0, -2) as $field) : ?>
                        <th class="kolom-title-tracking">
                            <?= ucfirst(str_replace('_', ' ', $field)); ?>
                        </th>
                        <?php endforeach ;?>
                        <th>
                            <span>Aksi</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $row) :?>
                    <tr>
                        <td>
                            <input type="checkbox" name="pilih-satu" id="" class="pilih-semua-tracking" onchange="PilihData(this)">
                        </td>
                        <?php foreach(array_slice($row, 0, -2) as $value) :?>
                        <td class="kolom-data-tracking">
                            <?= $value?>
                        </td>
                        <?php endforeach ;?>
                        <td>
                            <b><span id="form-table-tracking" onclick="AksiEditData(this)" class="tombol-aksi-edit"><i
                                        class="bi bi-pencil-square"></i></span><span>&nbsp;|&nbsp;</span><span
                                    id="form-table-tracking" onclick="AksiHapusData(this)" class="tombol-aksi-hapus"><i
                                        class="bi bi-trash"></i></span></b>
                        </td>
                    </tr>
                    <?php endforeach ;?>
                </tbody>
            </table>
        </div>
        <div class="CasingAllForm" style="display: none;" id="form-table-tracking">
            <button id="form-table-tracking" onclick="TutupForm(this)">Tutup</button><br>
            <form action="" class="form-table-tracking" >
                <?php foreach(array_slice($fields, 1, -2) as $input) :?>
                <label for="">
                    <?= $input?>
                </label><input type="text" name="<?= $input; ?>" class="input-table-inventaris"><br>
                <?php endforeach ;?>
            </form>
            <button id="form-table-tracking" onclick="TambahData(this.id)">Tambah</button>
            <button id="form-table-tracking" onclick="EditData(this.id)">Edit</button>
        </div>
    </section>