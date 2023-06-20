<section class="section-table-dokumentasi casingAllSec" style="display: flex;">
        <table class="opsi-fitur-dokumentasi">
            <tr>
                <th>
                    <b>
                        <span class="aksi-tambah" onclick="OpsiFiturTamabah(this)"
                            id="form-table-dokumentasi">Tambah</span>
                        <span class="aksi-hapus" onclick="OpsiFiturHapus(this)" id="form-table-dokumentasi">Hapus</span>
                        <span class="aksi-copy"  onclick="CopyData()">Copy</span>
                        <span class="aksi-paste">Paste</span>
                        <span class="aksi-download" onclick="DownloadData(this)" id="form-table-dokumentasi">Download</span>
                        <span class="aksi-upload" id="fileName"onclick="uploadData()">Chose File</span>
                        <span id="uploadData" class="uploadDataDokumentasi">Upload</span>
                        <span class="aksi-reload">Reload</span>
                        <span><input type="text" name="table-data-dokumentasi" id="field-aksi-pencarian"></span>
                        <span class="aksi-pencarian" onclick="PencarianData(this)" id="table-data-dokumentasi"><i
                                class="bi bi-search"></i></span>
                    </b>
                </th>
            </tr>
        </table>
        <div class="caseOverflowTable">
            <table class="table-data-dokumentasi">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="pilih-semua" id="pilih-semua-dokumentasi" class="checkbox-semua" onclick="PilihSemua(this)">
                        </th>
                        <?php foreach (array_slice($fields, 0, -2) as $field) : ?>
                        <th class="kolom-title-dokumentasi">
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
                            <input type="checkbox" name="pilih-satu" id="" class="pilih-semua-dokumentasi" onchange="PilihData(this)">
                        </td>
                        <?php foreach(array_slice($row, 0, -2) as $value) :?>
                        <td class="kolom-data-dokumentasi">
                            <?= $value?>
                        </td>
                        <?php endforeach ;?>
                        <td>
                            <b><span id="form-table-dokumentasi" onclick="AksiEditData(this)"
                                    class="tombol-aksi-edit"><i
                                        class="bi bi-pencil-square"></i></span><span>&nbsp;|&nbsp;</span><span
                                    id="form-table-dokumentasi" onclick="AksiHapusData(this)"
                                    class="tombol-aksi-hapus"><i class="bi bi-trash"></i></span></b>
                        </td>
                    </tr>
                    <?php endforeach ;?>
                </tbody>
            </table>
        </div>
        <div class="CasingAllForm"  style="display: none;" id="form-table-dokumentasi">
        <button id="form-table-dokumentasi" onclick="TutupForm(this)">Tutup</button><br>
            <form action="" class="form-table-dokumentasi">
                <label for="">Id Dokumen </label><input type="text" name="id_dokumen"
                    class="input-table-dokumentasi"><br>
                <label for="">Nama Asset </label><input type="text" name="nama_asset"
                    class="input-table-dokumentasi"><br>
                <label for="">Keterangan </label><input type="text" name="keterangan"
                    class="input-table-dokumentasi"><br>
                <label for="">Jenis Asset </label><input type="text" name="jenis_asset"
                    class="input-table-dokumentasi"><br>
                <label for="">Tanggal Masuk </label><input type="date" name="tanggal_masuk"
                    class="input-table-dokumentasi"><br>
                <label for="">Harga Awal </label><input type="text" name="harga_awal"
                    class="input-table-dokumentasi"><br>
                <label for="">Penyimpanan Dokumen </label><input type="text" name="penyimpanan_dokumen"
                    class="input-table-dokumentasi"><br>
                <label for="">Foto Asset </label><input type="file" name="foto_asset"
                    class="input-table-dokumentasi"><br>
            </form>
            <button id="form-table-dokumentasi" onclick="TambahData(this.id)">Tambah</button>
            <button id="form-table-dokumentasi" onclick="EditData(this.id)">Edit</button>
        </div>
    </section>