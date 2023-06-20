<?php
namespace App\Controllers;


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Home extends BaseController
{
    public function index()
    {
        $auth["auth"] = "Home/VerifyLogin";
        return view("login", $auth);
    }
    public function Verifylogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new \App\Models\UserModel();
        $user = $userModel->where('username', $username)
            ->where('password', $password)
            ->first();

        if ($user) {
            date_default_timezone_set('Asia/Jakarta');
            // Login berhasil
            $session = session();
            $userData = [

                'id' => $user['id'],
                'username' => $user['username'],
                'is_admin' => $user['is_admin'],
                'login_date' => date('Y-m-d H:i:s')
            ];
            $session->set($userData);

            return redirect()->to("dashboard/charts.php");
        } else {
            // Login gagal
            return redirect()->back()->with('error', 'Invalid username or password');
        }
    }


    public function logout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to('/');
    }


    public function dashboard($getSection)
    {
        $data['section'] = $getSection;

        $session = session();
        if (!$session->has('is_admin')) {
            return redirect()->to('/');
        }

        $data['adminName'] = $session->get('username');
        $data['login_date'] = $session->get('login_date');


        if ($data['section'] == "section-table-inventaris") {
            $table_satu = new \App\Models\inventarisasset();

            $data['data'] = $table_satu->getData();
            $data['fields'] = $table_satu->getFieldNames();
            $data['section'] = "inventarisAsset.php";

        } else if ($data['section'] == "section-table-rekap") {
            $table_dua = new \App\Models\rekappeminjaman();
            $data['data'] = $table_dua->getData();
            $data['fields'] = $table_dua->getFieldNames();;
            $data['section'] = "rekapAsset.php";
        } else if ($data['section'] == "section-table-dokumentasi") {
            $table_tiga = new \App\Models\dokumentasiasset();
            $data['data'] = $table_tiga->getData();
            $data['fields'] = $table_tiga->getFieldNames();
            $data['section'] = "dokumentasiasset.php";
        } else if ($data['section'] == "section-table-tracking") {
            $table_empat = new \App\Models\trackingasset();
            $data['data'] = $table_empat->getData();
            $data['fields'] = $table_empat->getFieldNames();
            $data['section'] = "trackingasset.php";
        } else if ($data['section'] == "section-profile-setting") {
            $table_lima = new \App\Models\history();
            $data['data'] = $table_lima->getData();
            $data['fields'] = $table_lima->getFieldNames();
            $data['section'] = "profileSetting.php";
        }else if($data['section']=="section-perhitungan-roi"){
            $table_satu = new \App\Models\inventarisasset();

            $data['data'] = $table_satu->getData();
            $data['fields'] = $table_satu->getFieldNames();
            $data['section'] = "perhitunganRoi.php";
        }
        else{
            $data['section'] = "charts.php";
        }

        return view('dashboard', $data);
    }

    

}