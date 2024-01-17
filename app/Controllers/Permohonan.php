<?php 

namespace App\Controllers; 

class Permohonan extends Controller {
    
    //syasya mohon & hantar
    function mohon() 
    {
        $perniagaan = new \App\Models\Perniagaan();
        $jenis = $perniagaan->get_all();
        echo $this->templates->render('mohon::mohon', [ 'jenis' => $jenis ]);
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

        // if(count($user_model->get_by_email($email)) > 0 ) {
        //     $errors[] = 'Email is already been used.';
        // }

        // if(count($user_model->get_by_username($username)) > 0) {
        //     $errors[] = 'Username is already been used.';
        // }

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

    
}