<?php

namespace App\Models;

use CodeIgniter\Model;
use mysql_xdevapi\Exception;

class Race extends Model
{
    public function get_runners($memberKey, $RaceID)
    {
        $db = db_connect();
        //$sql = "Select * from race";
        $sql = "select ML.memberName, ML.memberEmail, ML.memberID, MR.roleID from member_race MR
                inner join memberLogin ML on MR.memberID = ML.memberID
                where ML.memberKey = ?
                and MR.raceID = ?
                and MR.roleID = '3';";
        $query = $db->query($sql, [$memberKey, $RaceID]);
        return $query->getResultArray();
    }

    public function get_races($memberKey)
    {
        $this->session = service('session');
        $this->session->start();

        $memberKey = $this->session->get("memberKey");

        $db = db_connect();
        //$sql = "Select * from race";
        $sql = "select R.raceID, raceName, raceLocation, raceDescription, raceDateTime from race R inner join member_race MR on R.raceID = MR.raceID inner join memberLogin ML on MR.memberID = ML.memberID where ML.memberKey = '$memberKey' and MR.roleID = '2';";
        $query = $db->query($sql);
        return $query->getResultArray();
    }

    public function get_race($id)
    {
        $db = db_connect();
        $sql = "Select * from race where raceID = ?";
        $query = $db->query($sql, [$id]);
        return $query->getResultArray();
    }

    public function add_race($name, $location, $description, $date)
    {
        try
        {
            $db = db_connect();
            $sql = "insert into race (raceName, raceLocation, raceDescription, raceDateTime) values(?, ?, ?, ?)";
            $db->query($sql, [$name, $location, $description, $date]);
            return true;
        }
        catch (Exception $ex)
        {
            return false;
        }

    }

    public function delete_race($id)
    {
        try
        {
            $db = db_connect();
            $sql = "delete from race where raceID = ?";
            $db->query($sql, [$id]);
            return true;
        }
        catch (Exception $ex)
        {
            return false;
        }

    }

    public function update_race($name, $location, $description, $date, $txtID)
    {
        try
        {
            $db = db_connect();
            $sql = "update race set raceName = ?, raceLocation = ?, raceDescription = ?, raceDateTime = ? where raceID = ?";
            $db->query($sql, [$name, $location, $description, $date, $txtID]);
            return true;
        }
        catch (Exception $ex)
        {
            return false;
        }

    }
}