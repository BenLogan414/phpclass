<?php

namespace App\Models;

use CodeIgniter\Model;

class Member extends Model
{
    public function has_access($raceID, $memberKey)
    {
        try
        {
            $db = db_connect();
            $sql = "select ML.memberName, ML.memberEmail, ML.memberID, MR.roleID from member_race MR
                    inner join memberLogin ML on MR.memberID = ML.memberID
                    where ML.memberKey = ?
                    and MR.raceID = ?
                    and MR.roleID = '2';";
            $query = $db->query($sql, [$memberKey, $raceID]);
            $row = $query->getFirstRow();

            if($row==null){
                return false;
            }
            else{
                return true;
            }
        }
        catch (Exception $ex)
        {
            return false;
        }
    }

    public function user_login($email, $password)
    {
        $db = db_connect();
        $sql = "Select * from memberLogin where memberEmail = ? and roleID=2";
        $query = $db->query($sql, [$email]);
        $row = $query->getFirstRow();

        if ($row != null) {
            $DBPass = $row->memberPassword;
            $MemberKey = $row->memberKey;
            $password = md5($password . $MemberKey);

            if ($password == $DBPass) {
                $this->session = service('session');
                $this->session->start();

                $this->session->set("roleID", $row->roleID);
                $this->session->set("memberKey", $row->memberKey);
                $this->session->set("memberName", $row->memberName);

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function add_user($memberID, $raceID)
    {
        try
        {
            $db = db_connect();
            $sql = "insert into member_race (memberID, raceID, roleID) values (?, ?, '3')";
            $db->query($sql, [$memberID, $raceID]);

            return true;
        }
        catch (Exception $ex)
        {
            return false;
        }
    }

    public function delete_user($memberID, $raceID)
    {
        try
        {
            $db = db_connect();
            $sql = "delete from member_race where memberID = ? and raceID = ? and roleID = '3'";
            $db->query($sql, [$memberID, $raceID]);

            return true;
        }
        catch (Exception $ex)
        {
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