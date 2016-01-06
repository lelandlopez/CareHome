<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CareHomeController extends Controller
{
    //
    public function getStates() {
        $states = \App\State::all();
        echo json_encode($states);
    }

    public function getCities() {
        $cities = \App\City::where('state_id', $_GET['id'])->get();
        echo json_encode($cities);
    }

    public function getCareHomes() {
        $careHomes = \App\CareHome::where('zipcode', $_GET['zipcode'])->get();
        echo json_encode($careHomes);
    }

    public function getCareHomeRooms() {
        $careHomeRooms = array();
        $careHomes = \App\CareHome::where('zipcode', $_GET['zipcode'])->get();
        foreach($careHomes as $careHome) { 
            $rooms = \App\CareHomeRoom::where('care_home_id', $careHome['id'])->where('available', '1')->get();
            if(count($rooms) != 0) {
                $infoArray['careHome'] = $careHome;
                $infoArray['rooms'] = $rooms;
                $careHomeRooms[] = $infoArray;
            }
        }
        echo json_encode($careHomeRooms);
    }

    public function getProfile() {
        return view('profile');
    }

    public function getRegisterSubstitute() {
        return view('registerSubstitute');
    }

    public function postRegisterSubstitute() {
        $substitute = new \App\Substitute;

        $substitute->address = $_POST['address'];
        $substitute->distance = $_POST['distance'];
        $substitute->user_id = \Auth::id();

        $substitute->save(); 
        return redirect('/profile');
    }

    public function getRegisterCareHome() {
        return view('registerCareHome');
    }

    public function postRegisterCareHome() {
        return view('registerCareHome');
    }
}
