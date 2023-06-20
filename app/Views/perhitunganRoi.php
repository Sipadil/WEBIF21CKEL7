<div class="container-roi">
    <div class="wadah-roi">
    <table class="roi-case">
            <tr class="roi-rows">
                <td>Id Asset</td>
                <td class="id_asset">
                    <select name="id_asset" id="id_asset_select">
                        <option value="not_selected">not selected</option>
                        <?php foreach($data as $value) :?>
                            <option value="<?php echo $value['id_asset']; ?>"><?php echo $value['id_asset']; ?></option>
                        <?php endforeach;?>
                    </select>
                </td>
            </tr>
            <tr class="roi-rows">
                <td>Jumlah Asset</td>
                <td class="jumlah_asset">
                    <input class="roi-inputs" type="text">
                </td>
            </tr>
            <tr class="roi-rows">
                <td>Nama Asset</td>
                <td class="nama_asset">
                    <input class="roi-inputs" type="text" disabled>
                </td>
            </tr>
            <tr class="roi-rows">
                <td>Harga Beli</td>
                <td class="harga_beli">
                    <input class="roi-inputs" type="text">
                </td>
            </tr>
            <tr class="roi-rows">
                <td>Tahun Beli</td>
                <td class="tahun_beli">
                    <select name="tahun_beli" id="tahun_beli_select">
                        <option value=""></option>
                    </select>
                </td>
            </tr>
            <tr class="roi-rows">
                <td>Tahun jual</td>
                <td class="tahun_jual">
                    
                </td>
            </tr>
            <tr class="roi-rows">
                <td>harga Jual satuan</td>
                <td class="harga_satuan">
                    <input class="roi-inputs" type="text">
                </td>
            </tr>

            <tr class="roi-rows">
                <td>Biaya Operational per/TH</td>
                <td class="biaya_operational">
                    <input class="roi-inputs" type="text">
                </td>
            </tr>
            <tr class="roi-rows">
                <td>Hitung Nilai ROI</td>
                <td class="hitung_roi">
                    <button onclick="HitungRoi()">Hitung Roi</button>
                </td>
            </tr>
            <tr class="roi-rows">
                <td>Total Pendapatan Kotor</td>
                <td class="total_kotor">
                    <input class="roi-inputs" type="text" disabled>
                </td>
            </tr>
            <tr class="roi-rows">
                <td>Profit Per/PCS</td>
                <td class="profit_pcs">
                    <input class="roi-inputs" type="text" disabled>
                </td>
            </tr>
            <tr class="roi-rows">
                <td>Clear Profit</td>
                <td class="total_bersih">
                    <input class="roi-inputs" type="text" disabled>
                </td>
            </tr>
        </table>
    </div>

</div>