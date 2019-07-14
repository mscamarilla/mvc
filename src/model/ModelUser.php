<?php


namespace Model;

use Core\Model;

class ModelUser extends Model
{
    public function findUserByToken($token)
    {
        $sql = "SELECT * FROM users WHERE token='" . $token . "'";
        $query = $this->query($sql);

        if ($query->num_rows) {
            return true;
        }

        return false;
    }

    
}