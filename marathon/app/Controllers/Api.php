<?php

namespace App\Controllers;

use App\Models\Member;
use App\Models\Race;

class Api extends BaseController
{
    public function get_races($ApiKey)
    {
        $Race = new Race();
        $data = $Race->get_races($ApiKey);
        echo json_encode($data);
        exit();
    }
    public function get_runners($ApiKey, $RaceID)
    {
        $Race = new Race();
        $data = $Race->get_runners($ApiKey, $RaceID);
        echo json_encode($data);
        exit();
    }
    public function add_runner()
    {
        $json = json_decode(file_get_contents("php://input"), true);

        $ApiKey = $json["ApiKey"];
        $RaceID = $json["RaceID"];
        $MemberID = $json["MemberID"];

        $Member = new Member();

        if($Member->has_access($RaceID, $ApiKey))
        {
            $Member->add_user($MemberID, $RaceID);
            echo "Runner Added!";
        }
        else
        {
            echo "Access Denied!";
        }

        exit();
    }
    public function delete_runner()
    {
        $json = json_decode(file_get_contents("php://input"), true);

        $ApiKey = $json["ApiKey"];
        $RaceID = $json["RaceID"];
        $MemberID = $json["MemberID"];

        $Member = new Member();

        if($Member->has_access($RaceID, $ApiKey))
        {
            $Member->delete_user($MemberID, $RaceID);
            echo "Runner Deleted!";
        }
        else
        {
            echo "Access Denied!";
        }

        exit();
    }
}