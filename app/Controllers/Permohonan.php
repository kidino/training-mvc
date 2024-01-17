<?php 

namespace App\Controllers; 

class Permohonan extends Controller{

    function senarai($show='baru'){
        $mohon_model = new \App\Models\Permohonan();

        $mohons = $mohon_model->get_by_status($show);
        

        echo $this->templates->render('office::mohon-list', [ 'mohons' => $mohons ]);
    }
}