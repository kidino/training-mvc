<?php
namespace App\Models;

class Model {
    var $table;
    var $id;
    var $db_conn;
    var $query_builder;

    function __construct() {
        global $db_conn; // derived from database.php
        $this->db_conn = $db_conn;
        $this->query_builder = $this->db_conn->createQueryBuilder();
    }

    function get_by_id($id = 0) {
        $stmt = $this->query_builder
            ->select('*')
            ->from( $this->table )
            ->where( $this->id . ' = ?' )
            ->setParameter(0, $id);
        return $stmt->execute()->fetchAll();
    }

    function get_all() {
        $stmt = $this->query_builder
            ->select('*')
            ->from( $this->table );

        return $stmt->execute()->fetchAll();
    }

    function save(array $data)
    {
        try {
            $id;
            if (isset($data[ $this->id ])) {
                // If 'id' key exists, update the record
                $id = $data[$this->id];
                unset($data[$this->id]); // Remove 'id' from data to avoid updating it
                $this->db_conn->update($this->table, $data, [ $this->id => $id]);
            } else {
                // If 'id' key does not exist, insert a new record
                $this->db_conn->insert($this->table, $data);
                $id = $this->db_conn->lastInsertId();
            }

            $data = $this->db_conn->fetchAllAssociative("SELECT * FROM $this->table WHERE {$this->id} = ?", [$id]);

            return $data[0];
        } catch (\Exception $e) {
            // Returning false to indicate an error
            return false;
        }
    } // -- end of save()  

}

