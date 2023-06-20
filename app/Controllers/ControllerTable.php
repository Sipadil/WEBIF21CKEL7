<?php
namespace App\Controllers;

use App\Models\TableModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\Header;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ControllerTable extends BaseController
{
    public function getPrimaryKey()
    {
        $model = new TableModel();
        $primaryKey = $model->getPrimaryKey();
        return $this->response->setJSON(['primaryKey' => $primaryKey]);
    }

    public function tambahData()
    {
        $FormPengirim = $this->request->getPost("FormPengirim");
    
        if ($FormPengirim == "form-table-inventaris") {
            $tablemodel = new \App\Models\inventarisasset();
        } else if ($FormPengirim == "form-table-rekap") {
            $tablemodel = new \App\Models\rekappeminjaman();
        } else if ($FormPengirim == "form-table-dokumentasi") {
            $tablemodel = new \App\Models\dokumentasiasset();
        } else if ($FormPengirim == "form-table-tracking") {
            $tablemodel = new \App\Models\trackingasset();
        }

        
        $fieldNames = $tablemodel->getFieldNames();
        $primaryKey = $tablemodel->getPrimaryKey();

        $data = [];
        foreach ($fieldNames as $fieldName) {
            if ($fieldName == 'foto_asset') {
                $fotoAsset = $this->request->getFile('foto_asset');
                if ($fotoAsset && $fotoAsset->isValid()) {
                    $newName = $fotoAsset->getRandomName();
                    $fotoAsset->move(ROOTPATH . 'public/uploads', $newName);
                    $data['foto_asset'] = $newName;
                }
            } else {
                $value = $this->request->getPost($fieldName);
                $data[$fieldName] = $value;
            }
        }
        $this->addHistory($tablemodel, $data[$fieldNames[1]], 'tambah', 'Menambah Data : ');
        $tablemodel->insert($data);

        // Mengambil data terbaru
        $latestData = $tablemodel->orderBy('no', 'DESC')->first();

        // Mengupdate nomor berdasarkan urutan terbaru
        $allData = $tablemodel->orderBy('no', 'ASC')->findAll();

        $newNo = 1;
        foreach ($allData as $row) {
            if ($row[$primaryKey] == $latestData[$primaryKey]) {
                $tablemodel->where($primaryKey, $row[$primaryKey])->set(['no' => $newNo])->update();
            }
            $newNo++;
        }
        

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Data berhasil ditambahkan'
        ]);
    }



    public function EditData($FormPengirim)
    {
        if ($FormPengirim === "form-table-dokumentasi") {
            $tablemodel = new \App\Models\dokumentasiasset();
        } else if ($FormPengirim === "form-table-tracking") {
            $tablemodel = new \App\Models\trackingasset();
        } else if ($FormPengirim === "form-table-rekap") {
            $tablemodel = new \App\Models\rekappeminjaman();
        } else if ($FormPengirim === "form-table-inventaris") {
            $tablemodel = new \App\Models\inventarisasset();
        }

        $fieldNames = $tablemodel->getFieldNames();

        $data = [];
        $key = $tablemodel->getPrimaryKey();
        $acuan = $this->request->getPost($key);

        $existingData = $tablemodel->where($key, $acuan)->first();
        foreach ($fieldNames as $fieldName) {
            if ($fieldName !== $key) {
                $value = $this->request->getPost($fieldName);
                if ($fieldName === 'no') {
                    // Set nilai kolom nomor_urut menjadi nomor baris saat ini
                    $value = $existingData["no"];
                }
                $data[$fieldName] = $value;
            }
        }

        

        // Periksa apakah ada file gambar yang diunggah
        $gambar = $this->request->getFile('foto_asset');
        if ($gambar && $gambar->isValid()) {
            $newName = $gambar->getRandomName();
            $gambar->move(ROOTPATH . 'public/uploads', $newName);

            // Simpan nama file yang baru ke dalam kolom foto_asset di tabel database
            $data['foto_asset'] = $newName;
        } elseif (!empty($existingData['foto_asset'])) {
            // Jika tidak ada file gambar yang diunggah, gunakan gambar yang sudah ada
            $data['foto_asset'] = $existingData['foto_asset'];
        }

        $this->addHistory($tablemodel, $acuan, 'edit', 'Mengedit Data : ');
        $tablemodel->where($key, $acuan)->set($data)->update();
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Data berhasil diupdate',
        ]);
    }


    public function HapusData()
    {
        $FormPengirim = $this->request->getPost("FormPengirim");
        $delete = $this->request->getPost("delete");

        if ($FormPengirim === "form-table-dokumentasi") {
            $tablemodel = new \App\Models\dokumentasiasset();
        } else if ($FormPengirim === "form-table-tracking") {
            $tablemodel = new \App\Models\trackingasset();
        } else if ($FormPengirim === "form-table-rekap") {
            $tablemodel = new \App\Models\rekappeminjaman();
        } else if ($FormPengirim === "form-table-inventaris") {
            $tablemodel = new \App\Models\inventarisasset();
        }

        $key = $tablemodel->getPrimaryKey();

        // Memeriksa apakah input delete merupakan JSON
        $decodedDelete = json_decode($delete, true);
        
        if (json_last_error() === JSON_ERROR_NONE && is_array($decodedDelete)) {
            // Jika delete adalah JSON array, hapus data berdasarkan setiap elemen dalam array
            foreach ($decodedDelete as $id) {
                $tablemodel->where($key, $id)->delete();
            }
        } else {
            // Jika delete bukan JSON array, hapus data sesuai dengan nilai tunggal
            $this->addHistory($tablemodel, $delete, 'Hapus', 'Menghapus Data : ');
            $tablemodel->where($key, $delete)->delete();
        }
        $allData = $tablemodel->findAll();

        // Urutkan data berdasarkan kolom nomor_urut secara ascending
        usort($allData, function ($a, $b) {
            return $a['no'] - $b['no'];
        });

        // Update kolom nomor_urut untuk setiap data sesuai dengan urutan increment
        foreach ($allData as $index => $data) {
            $tablemodel->where($key, $data[$key])->set(['no' => $index + 1])->update();
        }

    }

    public function downloadData($sender)
    {
        // Membuat objek model inventarisasset


        if ($sender == "form-table-inventaris") {
            $model = new \App\Models\inventarisasset();
        } else if ($sender == "form-table-rekap") {
            $model = new \App\Models\rekappeminjaman();
        } else if ($sender == "form-table-tracking") {
            $model = new \App\Models\trackingasset();
        } else if ($sender == "form-table-dokumentasi") {
            $model = new \App\Models\dokumentasiasset();
        }

        // Mengambil data dari model
        $data = $model->getData();

        // Mendapatkan field names dari model
        $fieldNames = array_slice($model->getFieldNames(), 1);

        // Membuat objek Spreadsheet
        $spreadsheet = new Spreadsheet();

        // Mendapatkan sheet aktif
        $sheet = $spreadsheet->getActiveSheet();

        // Menulis field names ke baris pertama
        $column = 1;
        foreach ($fieldNames as $fieldName) {
            $sheet->setCellValueByColumnAndRow($column, 1, $fieldName);
            $column++;
        }

        // Menulis data ke sheet
        $row = 2;
        foreach ($data as $rowData) {
            $column = 1; // Mulai dari kolom ke satu
            foreach ($rowData as $key => $cellData) {
                if ($key !== 'no') { // Ganti 'kolom_pertama' dengan nama kolom pertama yang ingin diabaikan
                    $sheet->setCellValueByColumnAndRow($column, $row, $cellData);
                    $column++;
                }
            }
            $row++;
        }

        // Membuat objek Writer untuk menulis ke file XLSX
        $writer = new Xlsx($spreadsheet);

        // Nama file XLSX yang akan diunduh
        $filename = $model->getTableName() . '.xlsx';

        // Mengatur header HTTP untuk download file
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Menulis file XLSX ke output
        $writer->save('php://output');
    }

    public function uploadData()
    {
        $sender = $this->request->getPost("sender");
        if ($sender == "uploadDataInventaris") {
            $model = new \App\Models\inventarisasset();
        } else if ($sender == "uploadDataRekap") {
            $model = new \App\Models\rekappeminjaman();
        } else if ($sender == "uploadDataTracking") {
            $model = new \App\Models\trackingasset();
        } else if ($sender == "uploadDataDokumentasi") {
            $model = new \App\Models\dokumentasiasset();
        }

        $jsonString = $this->request->getPost('data'); // Mengambil data JSON dari permintaan POST
        $data = json_decode($jsonString, true); // Mendekode JSON menjadi array asosiatif

        if (!empty($data)) {

            $model->insertBatch($data);

            $response = [
                'status' => 'success',
                'message' => 'Data uploaded successfully.'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'No data received.'
            ];
        }

        return $this->response->setJSON($response);
    }


    public function perhitunganRoi($key)
    {
        $keyTofind = $key;

        $model = new \App\Models\inventarisasset();

        $result = $model->select('nama_asset, jumlah, tanggal_masuk, harga_awal')->where('id_asset', $keyTofind)->first();

        if ($result) {
            $namaAsset = $result['nama_asset'];
            $jumlah = $result['jumlah'];
            $tanggalMasuk = $result['tanggal_masuk'];
            $hargaAwal = $result['harga_awal'];
        } else {
            $namaAsset = "";
            $jumlah = "";
            $tanggalMasuk = "";
            $hargaAwal = "";
        }

        // Mengembalikan nilai "jumlah", "tanggal_masuk", dan "harga_awal" sebagai respons JSON
        return $this->response->setJSON([
            'namaAsset' => $namaAsset,
            'jumlah' => $jumlah,
            'tahunBeli' => $tanggalMasuk,
            'hargaBeli' => $hargaAwal
        ]);
    }


    public function GantiPassword($User)
    {
        $model = new \App\Models\UserModel();
        $pass = $this->request->getPost('recent-password');
        $correctionPass = $this->request->getPost('retype-new-password');
        $newPass = $this->request->getPost('new-password');

        $result = $model->where('username', $User)->where('password', $pass)->first();

        if ($result) {
            if ($newPass == $correctionPass) {
                // Lakukan set new password sesuai dengan logikanya
                $result['password'] = $newPass;
                $model->save($result);
            }
        }
        $session = session();
        $session->destroy();

        return redirect()->to('/');
        return $this->response->setJSON($result);
    }


    public function Chartuse()
    {
        $model = new \App\Models\inventarisasset();

        // Retrieve the query result as an array
        $results = $model->select('harga_awal')->get()->getResultArray();

        // Extract the "harga_awal" values from the array
        $hargaAwal = [];
        foreach ($results as $row) {
            $hargaAwal[] = $row['harga_awal'];
        }

        // Send the "hargaAwal" array as a JSON response
        return $this->response->setJSON($hargaAwal);
    }

    public function addHistory($table, $sign, $aksi, $ket)
    {
        $model = new \App\Models\history();
        $admin = session();
        date_default_timezone_set('Asia/Jakarta');

        $data = [];
        $data['nama_admin'] = $admin->get('username');
        if ($admin->get('is_admin') == 0) {
            $data['role'] = "admin";
        }
        $data['table'] = $table->getTableName();
        $data['aksi'] = $aksi;
        $data['keterangan'] = $ket . $sign;
        $data['tanggal'] = date('Y-m-d H:i:s');

        $model->insert($data);



        $allData = $model->orderBy('id', 'ASC')->findAll();

        $newNo = 1;
        foreach ($allData as $row) {
            $model->where('id', $row['id'])->set(['id' => $newNo])->update();
            $newNo++;
        }
        

    }

}
?>