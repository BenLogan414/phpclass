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

    public function user_create($username, $password, $email)
    {
        $db = db_connect();
        $MemberKey = sprintf('%04X%04X%04X%04X%04X%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
        $hashedPWD = md5($password . $MemberKey);
        $roleID = 2;

        $sql = "insert into memberLogin (memberName, memberEmail, memberPassword, memberKey, roleID) values (?, ?, ?, ?, ?)";
        $query = $db->query($sql, [$username, $email, $hashedPWD, $MemberKey, $roleID]);

        return (bool)$query;
    }
}