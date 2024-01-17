<?php 

namespace App\Controllers; 

class Permohonan extends Controller {
    
    //syasya mohon & hantar
    function mohon() 
    {
        $perniagaan = new \App\Models\Perniagaan();
        $jenis = $perniagaan->get_all();
        echo $this->templates->render('office::mohon', [ 'jenis' => $jenis ]);
    }

    function hantar() 
    {
        $nama = $_POST['nama'];
        $nokp = $_POST['nokp'];
        $tapak = $_POST['tapak'];
        $jenis_perniagaan = $_POST['jenis_perniagaan'];

        // array to capture validation errors
        $errors = [];

        // validation checks
        if(!isset($_POST['nama']) || (is_null($_POST['nama'])) || ($_POST['nama'] == '')) {
            $errors[] = 'Sila isi maklumat ini.';
        }
        if(!isset($_POST['nokp']) || (is_null($_POST['nokp'])) || ($_POST['nokp'] == '')) {
            $errors[] = 'Sila isi maklumat ini.';
        }
        if(!isset($_POST['tapak']) || (is_null($_POST['tapak'])) || ($_POST['tapak'] == '')) {
            $errors[] = 'Sila isi maklumat ini.';
        }
        if(!isset($_POST['jenis_perniagaan']) || (is_null($_POST['jenis_perniagaan'])) || ($_POST['jenis_perniagaan'] == '')) {
            $errors[] = 'Sila isi maklumat ini.';
        }

        $permohonan_model = new \App\Models\Permohonan();

        // no validation errors -- good to be saved
        if(count($errors) == 0) {
            $permohonan = $permohonan_model->save([
                'nama' => $nama,
                'nokp' => $nokp,
                'tapak' => $tapak,
                'jenis_perniagaan' => $jenis_perniagaan,
                
            ]);

            header('Location: /permohonan?success=1');
        }

        // reload the register page with the validation errors
        echo $this->templates->render('mohon::mohon', [ 'data' => $_POST, 'errors' => $errors]);

    } 

    function review($id){
        $permohonan_model = new \App\Models\Permohonan();
        $permohonan = $permohonan_model->get_by_id($id);

        $jenisperniagaan_model = new \App\Models\JenisPerniagaan();
        $jenisperniagaan = $jenisperniagaan_model->get_all();
    
        echo $this->templates->render('office::review', [ 
            'data' => $permohonan[0], 
            'jenisperniagaan' => $jenisperniagaan,
            'user' => $_SESSION['user']
            ] );
    }

    function do_review($id){
        $permohonan_model = new \App\Models\Permohonan();

        $nama = $_POST["nama"];
        $nokp = $_POST["nokp"];
        $tapak = $_POST["tapak"];
        $status = $_POST["status"];
        $semak_oleh = $_SESSION['user']['id'];
        $jenisperniagaan = $_POST["jenisperniagaan"];
        $created = date('Y-m-d H:i:s');

        $to_save = [
            'id' => $id,
            'nama' => $nama,
            'nokp' => $nokp,
            'tapak' => $tapak,
            'status' => $status,
            'semak_oleh' => $semak_oleh,
            'tarikh_semak' => $created,
            'jenis_perniagaan' => $jenisperniagaan
        ];

        $user = $permohonan_model->save($to_save);
        header('Location: /office/permohonan/'. $id .'/review?saved=1');
    }
}