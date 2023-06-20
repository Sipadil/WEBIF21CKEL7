function TambahData(FormPengirim) {
  var form = document.getElementsByClassName(FormPengirim)[0];
  formData = new FormData(form);
  formData.append('FormPengirim', FormPengirim);
  window.location.reload();
  $.ajax({
    url: '../ControllerTable/tambahData',
    type: 'POST',
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      // Handle the successful response
      console.log(response);
    },
    error: function (xhr, status, error) {
      // Handle the error
      console.log(error);
    }
  });
}


function EditData(FormPengirim) {
  var form = document.getElementsByClassName(FormPengirim)[0];
  formData = new FormData(form);
  formData.append('Key', form.querySelectorAll("input")[0].value);
  window.location.reload();
  $.ajax({
    url: '../../ControllerTable/EditData/' + FormPengirim,
    type: 'POST',
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      
    },
    error: function (xhr, status, error) {
      // Handle the error
      console.log(error);
    }
  });
}


function AksiHapusData(button) {
  var row = button.closest('tr'); // Baris yang sebaris dengan tombol
  var tdVal = '';
  var FormPengirim = button.id;
  var tdElements = row.getElementsByTagName('td'); // Mengambil semua elemen <td> dalam baris
  for (var i = 2; i < 3; i++) {
    tdVal = tdElements[i].innerText;
  }

  var containerAlert = document.getElementsByClassName("container-alert")[0];
  containerAlert.style.display = "grid";

  // Ambil tombol-tombol dari popup
  var tombolHapus = containerAlert.querySelector(".alertConfirmHapus");
  var tombolBatal = containerAlert.querySelector(".alertConfirmBatal");
  var tombolClose = containerAlert.querySelector(".alertClose");

  // Tambahkan event listener untuk tombol Hapus
  tombolHapus.addEventListener("click", function () {
    // Lakukan operasi penghapusan data melalui AJAX

    window.location.reload();
    $.ajax({
      url: '../ControllerTable/HapusData',
      type: 'POST',
      data: {
        "delete": tdVal,
        "FormPengirim": FormPengirim
      },
      success: function (response) {
        // Handle the successful response
        console.log(response);
      },
      error: function (xhr, status, error) {
        // Handle the error
        console.log(error);
      }
    });

    // Sembunyikan popup setelah operasi penghapusan selesai
    containerAlert.style.display = "none";
  });

  // Tambahkan event listener untuk tombol Batal
  tombolBatal.addEventListener("click", function () {
    tdVal = "";
    containerAlert.style.display = "none";
  });

  tombolClose.addEventListener("click", function () {
    tdVal = "";
    containerAlert.style.display = "none";
  })
}



function AksiEditData(button) {
  document.querySelector(".CasingAllForm#" + button.id + "").style.display = "block";
  var form = document.getElementsByClassName(button.id)[0];
  var inputform = form.querySelectorAll("input");
  var row = button.closest('tr'); // Baris yang sebaris dengan tombol
  var tdElements = row.getElementsByTagName('td');

  for (var i = 2; i < tdElements.length - 1; i++) {
    var tdText = tdElements[i].innerText;

    if (inputform[i - 2].name === "foto_asset") {
      inputform[i - 2].value = '';
    } else {
      inputform[i - 2].value = tdText;
    }
  }
}



var DataTerpilih = [];
var DataInti = [];

function PilihData(button) {
  var row = button.closest('tr'); // Baris yang sebaris dengan tombol
  var tdElements = row.getElementsByTagName('td');

  if (button.checked) {
    DataInti.push(tdElements[2].innerText);
    for (var i = 2; i < tdElements.length - 1; i++) {
      DataTerpilih.push(tdElements[i].innerText);
    }
  } else {
    var intiIndex = DataInti.indexOf(tdElements[2].innerText);
    if (intiIndex !== -1) {
      DataInti.splice(intiIndex, 1);
    }

    for (var i = 2; i < tdElements.length - 1; i++) {
      var index = DataTerpilih.indexOf(tdElements[i].innerText);
      if (index !== -1) {
        DataTerpilih.splice(index, 1);
      }
    }
  }
  console.log(DataInti);
}


function PilihSemua(button) {
  var checkboxes = Array.from(document.querySelectorAll("." + button.id));
  if (button.checked) {
    checkboxes.forEach(function (checkbox) {
      checkbox.checked = button.checked;
      PilihData(checkbox);
    });
  } else {
    checkboxes.forEach(function (checkbox) {
      checkbox.checked = button.checked;
      PilihData(checkbox);
    });
  }
}



function OpsiFiturTamabah(button) {
  document.querySelector(".CasingAllForm#" + button.id + "").style.display = "block";
  var form = document.getElementsByClassName(button.id)[0];
  var inputform = form.querySelectorAll("input");
  for (var i = 0; i < inputform.length; i++) {
    if (DataTerpilih.length > 0 && DataTerpilih.length < inputform.length + 1) {
      if (inputform[i].name === "foto_asset") {
        inputform[i].value = "";
      } else {
        inputform[i].value = DataTerpilih[i];
      }
    } else {
      inputform[i].value = "";
    }
  }
}

function OpsiFiturHapus(button) {

  var FormPengirim = button.id;
  var ToDelete = '';
  if (DataInti.length === 1) {
    ToDelete = DataInti[0]
  } else {
    ToDelete = JSON.stringify(DataInti);
  }

  var containerAlert = document.getElementsByClassName("container-alert")[0];
  containerAlert.style.display = "grid";

  // Ambil tombol-tombol dari popup
  var tombolHapus = containerAlert.querySelector(".alertConfirmHapus");
  var tombolBatal = containerAlert.querySelector(".alertConfirmBatal");
  var tombolClose = containerAlert.querySelector(".alertClose");

  // Tambahkan event listener untuk tombol Hapus
  tombolHapus.addEventListener("click", function () {
    window.location.reload();
    $.ajax({
      url: '../ControllerTable/HapusData',
      type: 'POST',
      data: {
        "delete": ToDelete,
        "FormPengirim": FormPengirim
      },
      success: function (response) {
        
        console.log(response);
      },
      error: function (xhr, status, error) {
        // Handle the error
        console.log(error);
      }
    });
    containerAlert.style.display = "none";
  });
  tombolBatal.addEventListener("click", function () {
    ToDelete = JSON.stringify(DataInti);
    containerAlert.style.display = "none";
  });

  tombolClose.addEventListener("click", function () {
    ToDelete = JSON.stringify(DataInti);
    containerAlert.style.display = "none";
  })
}

function TutupForm(button) {
  document.querySelector(".CasingAllForm#" + button.id + "").style.display = "none";
}


function PencarianData(button) {
  var input = document.querySelector('input#field-aksi-pencarian[name="' + button.id + '"]');
  var filter = input.value.toUpperCase();
  var table = document.getElementsByClassName(button.id)[0];
  var rows = table.getElementsByTagName("tr");

  // Melakukan pencarian pada setiap baris tabel, mulai dari baris kedua (indeks 1)
  for (var i = 1; i < rows.length; i++) {
    var cells = rows[i].getElementsByTagName("td");
    var found = false;

    // Memeriksa setiap sel pada baris
    for (var j = 1; j < cells.length; j++) {
      var cell = cells[j];
      if (cell) {
        var text = cell.textContent || cell.innerText;
        if (text.toUpperCase().indexOf(filter) > -1) {
          found = true;
          break;
        }
      }
    }

    // Menampilkan atau menyembunyikan baris berdasarkan hasil pencarian
    if (found) {
      rows[i].style.display = "";
    } else {
      rows[i].style.display = "none";
    }
  }
}


function CopyData() {
  var data = DataTerpilih.join('\n');

  navigator.clipboard.writeText(data)
    .then(function () {
      console.log('Teks berhasil disalin ke clipboard');
    })
    .catch(function (error) {
      console.error('Gagal menyalin teks ke clipboard:', error);
    });
}


function DownloadData(button) {
  var senderV = button.id;
  window.location.href = "../ControllerTable/downloadData/" + senderV;

}




function uploadData() {
  var fileInput = document.createElement('input');
  fileInput.type = 'file';
  fileInput.style.display = 'none';

  fileInput.addEventListener('change', function (e) {
    var file = e.target.files[0];
    document.getElementById('fileName').textContent = file.name;
    if (file) {
      document.getElementById("uploadData").addEventListener("click", function (e) {
        readFileAsArrayBuffer(file, function (buffer) {
          var jsonData = convertToJSON(buffer);
          senderV = e.target.className;
          // Mengakses properti 'data' dalam objek JSON
          // Kirim data ke server menggunakan AJAX
          window.location.reload();

          $.ajax({
            url: '../ControllerTable/uploadData',
            type: 'POST',
            dataType: 'json',
            data: {
              sender: senderV,
              data: JSON.stringify(jsonData) // Mengubah objek JavaScript menjadi string JSON
            },
            success: function (response) {
              console.log(response);
            },
            error: function (xhr, status, error) {
              console.log(error);
            }
          });
        });
      });
    }
  });

  fileInput.click();
}

function readFileAsArrayBuffer(file, callback) {
  var reader = new FileReader();
  reader.onload = function (e) {
    var buffer = e.target.result;
    callback(buffer);
  };
  reader.readAsArrayBuffer(file);
}

function convertToJSON(buffer) {
  var data = new Uint8Array(buffer);
  var workbook = XLSX.read(data, { type: 'array' });
  var sheetName = workbook.SheetNames[0];
  var worksheet = workbook.Sheets[sheetName];
  var jsonData = XLSX.utils.sheet_to_json(worksheet);

  return jsonData;
}


