<?php
namespace App\Models;

class Permohonan extends Model{

    var $table = 'permohonan';
    var $id = 'id';

    function get_by_status($stat) {
        $this->query_builder = $this->db_conn->createQueryBuilder();
        $stmt = $this->query_builder
            ->select('a.*, b.jenis, c.username as nama_semak, d.username as nama_lulus')
            ->from( $this->table, 'a' )            
            ->innerJoin('a', 'jenis_perniagaan', 'b', 'a.jenis_perniagaan = b.id')
            ->leftJoin('a', 'users', 'c', 'a.semak_oleh = c.id')
            ->leftJoin('a', 'users', 'd', 'a.dilulus_oleh = d.id')
            ->where( 'status = ?' )
            ->setParameter(0, $stat);
        return $stmt->execute()->fetchAll();
    }

}