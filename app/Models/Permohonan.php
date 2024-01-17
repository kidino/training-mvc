<?php
namespace App\Models;

class Permohonan extends Model{

    var $table = 'permohonan';
    var $id = 'id';

    function get_by_status($stat) {
        $this->query_builder = $this->db_conn->createQueryBuilder();
        $stmt = $this->query_builder
            ->select('a.*, b.jenis')
            ->from( $this->table, 'a' )            
            ->innerJoin('a', 'jenis_perniagaan', 'b', 'a.jenis_perniagaan = b.id')
            ->where( 'status = ?' )
            ->setParameter(0, $stat);
        return $stmt->execute()->fetchAll();
    }

}