<?php

namespace App\Models;

use CodeIgniter\Model;

class Member extends Model
{
    public function user_login($email, $password)
    {
        $db = db_connect();
        $sql = "Select memberPassword, memberKey, roleID, memberID from memberLogin where memberEmail = ? and roleID=2";
        $query = $db->query($sql, [$email]);
        $row = $query->getFirstRow();

        if ($row != null) {
            $DBPass = $row->memberPassword;
            $MemberKey = $row->memberKey;
            $password = md5($password . $MemberKey);

            if ($password == $DBPass) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}