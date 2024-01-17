<?php 

namespace App\Controllers; 

class Permohonan extends Controller {

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