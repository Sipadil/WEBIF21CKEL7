<section class="section-table-inventaris casingAllSec" style="display: flex;">
        <table class="opsi-fitur-inventaris">
            <tr>
                <th>
                    <b>
                        <span class="aksi-tambah" onclick="OpsiFiturTamabah(this)" id="form-table-inventaris">Tambah</span>
                        <span class="aksi-hapus" onclick="OpsiFiturHapus(this)" id="form-table-inventaris">Hapus</span>
                        <span class="aksi-copy" onclick="CopyData()">Copy</span>
                        <span class="aksi-paste">Paste</span>
                        <span class="aksi-download" id="form-table-inventaris" onclick="DownloadData(this)" >Download</span>
                        <span class="aksi-upload" id="fileName"onclick="uploadData()">Chose File</span>
                        <span id="uploadData" class="uploadDataInventaris">Upload</span>
                        <span class="aksi-reload">Reload</span>
                        <span><input type="text" name="table-data-inventaris" id="field-aksi-pencarian"></span>
                        <span class="aksi-pencarian" onclick="PencarianData(this)" id="table-data-inventaris"><i class="bi bi-search"></i></span>
                    </b>
                </th>
            </tr>
        </table>
        <div class="caseOverflowTable">
            <table class="table-data-inventaris">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="pilih-semua" id="pilih-semua-inventaris" class="checkbox-semua" onclick="PilihSemua(this)">
                        </th>
                        <?php foreach (array_slice($fields, 0, -2) as $field) : ?>
                        <th class="kolom-title-inventaris">
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
                            <input type="checkbox" name="pilih-satu" id="" class="pilih-semua-inventaris" onchange="PilihData(this)">
                        </td>
                        <?php foreach(array_slice($row, 0, -2) as $value) :?>
                        <td class="kolom-data-inventaris">
                            <?= $value?>
                        </td>
                        <?php endforeach ;?>
                        <td>
                            <b><span id="form-table-inventaris" onclick="AksiEditData(this)" class="tombol-aksi-edit"><i
                                        class="bi bi-pencil-square"></i></span><span>&nbsp;|&nbsp;</span><span
                                    id="form-table-inventaris" onclick="AksiHapusData(this)"
                                    class="tombol-aksi-hapus"><i class="bi bi-trash"></i></span></b>
                        </td>
                    </tr>
                    <?php endforeach ;?>
                </tbody>
            </table>
        </div>
        <div class="CasingAllForm"  style="display: none;" id="form-table-inventaris">
            <button id="form-table-inventaris" onclick="TutupForm(this)">Tutup</button><br>
            <form action="" class="form-table-inventaris">
                <?php foreach(array_slice($fields, 1, -2) as $input) :?>
                <label for="">
                    <?= $input?>
                </label><input type="text" name="<?= $input; ?>" class="input-table-inventaris"><br>
                <?php endforeach ;?>
            </form>
            <button id="form-table-inventaris" onclick="TambahData(this.id)">Tambah</button>
            <button id="form-table-inventaris" onclick="EditData(this.id)">Edit</button>
        </div>
    </section>