
// roi 

// Mendapatkan semua elemen <td> dengan kelas "tahun_beli"
var tahun_jual = document.querySelectorAll(".tahun_jual");

// Perulangan untuk setiap elemen <td> yang memiliki kelas "tahun_beli"
tahun_jual.forEach(function (tahun_jual) {
    // Membuat elemen <select>
    var selectElement = document.createElement("select");
    selectElement.name = "tahun_jual"; // Memberikan nilai untuk atribut "name"
    selectElement.id = "tahun_jual_select";
    selectElement.appendChild(new Option("Not_Selected", "not_selected"));
    // Perulangan untuk memasukkan <option> ke dalam <select>
    var key = document.querySelector("#tahun_beli_select option").value;

    if (key) {
        for (var i = key; i <= 2050; i++) {
            var optionElement = document.createElement("option");
            optionElement.value = i;
            optionElement.text = i;
            selectElement.appendChild(optionElement);
        }
    } else {
        var currentYear = new Date().getFullYear();
        for (var i = currentYear + 5; i >= currentYear - 5; i--) {
            var optionElement = document.createElement("option");
            optionElement.value = i;
            optionElement.text = i;
            selectElement.appendChild(optionElement);
        }
    }

    // Menambahkan elemen <select> ke dalam elemen <td>
    tahun_jual.appendChild(selectElement);
});



$(document).ready(function () {
    // Menangani perubahan pilihan opsi
    $('#id_asset_select').change(function () {
        var selectedIdAsset = $(this).val();
        if (selectedIdAsset == "not_selected") {
            document.querySelector(".nama_asset input").value = "";
            document.querySelector(".jumlah_asset input").value = "";
            document.querySelector(".harga_beli input").value = "";

            var EtahunBelidocument = document.querySelector(".tahun_beli select option");
            EtahunBelidocument.value = "";
            EtahunBelidocument.textContent = "";
        }
        // Mengirim data ke controller menggunakan AJAX
        $.ajax({
            url: '../ControllerTable/perhitunganRoi/' + selectedIdAsset,
            type: 'POST',
            success: function (response) {
                // Menggunakan respons dari controller
                document.querySelector(".nama_asset input").value = response.namaAsset;
                document.querySelector(".jumlah_asset input").value = response.jumlah;
                document.querySelector(".harga_beli input").value = response.hargaBeli;

                var EtahunBelidocument = document.querySelector(".tahun_beli select option");
                var tahunBeliSplit = response.tahunBeli.split("-")[0].trim();
                EtahunBelidocument.value = tahunBeliSplit;
                EtahunBelidocument.textContent = tahunBeliSplit;
            },
            error: function (xhr, status, error) {
                console.error(error);
                // Menangani kesalahan
            }
        });
    });


});

var TahunJual = document.querySelector("#tahun_jual_select");
TahunJual.addEventListener("change", function () {
    var hargaBeliInput = parseFloat(document.querySelector(".harga_beli input").value);
    var jumlahAssetInput = parseFloat(document.querySelector(".jumlah_asset input").value);
    var selectedValue = parseFloat(this.options[this.selectedIndex].value);
    var tahunBeliValue = parseFloat(document.querySelector("#tahun_beli_select option").value);

    if (!hargaBeliInput || !jumlahAssetInput || !selectedValue || !tahunBeliValue) {
        document.querySelector(".harga_satuan input").value = "";
    } else {
        var holdYear = selectedValue - tahunBeliValue;
        var hargaSatuan = hargaBeliInput / jumlahAssetInput;
        var keuntunganPcs = holdYear * hargaBeliInput / 100;
        var jualSatuan = hargaSatuan + keuntunganPcs;

        document.querySelector(".harga_satuan input").value = jualSatuan;
    }


});

function HitungRoi() {
    var hargaBeliInput = parseFloat(document.querySelector(".harga_beli input").value);
    var jumlahAssetInput = parseFloat(document.querySelector(".jumlah_asset input").value);
    var tahunJualSelect = document.querySelector("#tahun_jual_select");
    var tahunJual = parseFloat(tahunJualSelect.options[tahunJualSelect.selectedIndex].value);
    var tahunBeliValue = parseFloat(document.querySelector("#tahun_beli_select option").value);
    var biayaOperasi = parseFloat(document.querySelector(".biaya_operational input").value);

    var holdYear = tahunJual - tahunBeliValue;
    var hargaSatuan = hargaBeliInput / jumlahAssetInput;
    var keuntunganPcs = holdYear * hargaBeliInput / 100;

    var RoiKotor = hargaSatuan + keuntunganPcs;
    var RoiBersih = RoiKotor - (biayaOperasi * holdYear);
    document.querySelector(".total_kotor input").value = RoiKotor;
    document.querySelector(".profit_pcs input").value = keuntunganPcs;
    document.querySelector(".total_bersih input").value = RoiBersih;
}