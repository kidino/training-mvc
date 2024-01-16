<?php 

namespace App\Models;

class User extends Model {

    var $table = 'users';
    var $id = 'id';

    function get_by_email($email) {
        $stmt = $this->query_builder
            ->select('*')
            ->from( $this->table )
            ->where( 'email like ?' )
            ->setMaxResults(1)
            ->setParameter(0, $email);
        return $stmt->execute()->fetchAll();
    } // -- end of get_by_email


    function get_by_username($username) {
        $stmt = $this->query_builder
            ->select('*')
            ->from( $this->table )
            ->where( 'username like ?' )
            ->setMaxResults(1)
            ->setParameter(0, $username);
        return $stmt->execute()->fetchAll();
    } // -- end of get_by_username

}