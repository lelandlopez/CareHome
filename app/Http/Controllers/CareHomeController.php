<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CareHomeController extends Controller
{
    public function getRegister() {
        return view('register');
    }


    public function postRegister(Request $request) {
        $this->validate($request, [
            'email' => 'required|unique:users,email|max:255',
            'password' => 'required',
            'repassword' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
        ]);

        return redirect('/');
 
    }
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
        $careHomes = \App\CareHome::where('user_id', \Auth::id())->get();
        $substituteInfo = \App\Substitute::where('user_id', \Auth::id())->get();
        $callsForSubstitute = \App\CallForSubstitute::where('user_id', \Auth::id())->get();
        $substituteMessages = \App\SubstituteMessage::where('substitute_user_id', \Auth::id())->get();
        return view('profile')->with('careHomes', $careHomes)
                                ->with('substituteInfo', $substituteInfo)
                                ->with('substituteMessages', $substituteMessages)
                                ->with('callsForSubstitute', $callsForSubstitute);
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
        $careHome = new \App\CareHome;
        $careHome->lat = $_POST['lat'];
        $careHome->lng = $_POST['lng'];
        $careHome->address = $_POST['address'];
        $careHome->zipcode = $_POST['postal_code'];
        $careHome->user_id = \Auth::id();
        $careHome->save();
        for($i = 0; $i < $_POST['numberRooms']; $i++) {
            $ti = $i + 1;
            $careHomeRoom = new \App\CareHomeRoom;
            $careHomeRoom->care_home_id = $careHome->id;
            $sF = "squareFootage" . $ti;
            $available = "available" . $ti;
            $careHomeRoom->square_footage = $_POST[$sF];
            if($_POST[$available] == "on") {
                $careHomeRoom->available = '1';
            }
            $careHomeRoom->save();


        }

        return redirect('/profile');
    }

    public function getCareHome($id) {
        $careHomeInfo = \App\CareHome::where('id', $id)->get();
        echo $careHomeInfo[0];
        $rooms = \App\CareHomeRoom::where('care_home_id', $id)->where('available', '1')->get();
        $contact = \App\User::where('id', $careHomeInfo[0]->user_id)->get();
        return view('careHome')->with('careHomeInfo', $careHomeInfo[0])
                                ->with('rooms', $rooms)
                                ->with('contact', $contact);
    }

    public function getCreateCallForSubstitute() {
        $careHomeInfo = \App\CareHome::where('user_id', \Auth::id())->get();
        return view('CreateCallForSubstitute')->with('careHomeInfo', $careHomeInfo);
    } 

    public function postCreateCallForSubstitute() {
        $callForSubstitute = new \App\callForSubstitute;
        $callForSubstitute->care_home_id = $_POST['careHomeSelect'];
        $callForSubstitute->user_id = \Auth::id();

        $start_date = $_POST['startMonth'] . "/" . $_POST['startDay'] . "/" . $_POST['startYear'];
        $start_time = $_POST['startHour'] . " " . $_POST['startMinute'] . " " . $_POST['startAMorPM'];
        $end_date = $_POST['endMonth'] . "/" . $_POST['endDay'] . "/" . $_POST['endYear'];
        $end_time = $_POST['endHour'] . " " . $_POST['endMinute'] . " " . $_POST['endAMorPM'];
        $callForSubstitute->start_date = $start_date;
        $callForSubstitute->start_time = $start_time;
        $callForSubstitute->end_date = $end_date;
        $callForSubstitute->end_time = $end_time;
        $callForSubstitute->save();
        return redirect('/profile');
    } 


    public function getSearchForSubstitute($id) {
        $substitutes = \App\Substitute::
            where('user_id', '!=', \Auth::id())->get(); $substitutesInfo = array();
        $callForSubstitute = \App\CallForSubstitute::where('id', $id)->get();
        for($i = 0; $i < count($substitutes); $i++) {
            $substituteRatings = \App\SubstituteRating::
                where('user_commentee_id', $substitutes[$i]->id)->get();
            if(count($substituteRatings) == 0) {
                $averageSubstituteRatings[$i] = "No One has Rated This Substitute Yet";
            } else {
                $total = 0;
                for($x = 0; $x < count($substituteRatings); $x++) {
                    $total += $substituteRatings[$x]->rating;
                }
                $averageSubstituteRatings[$i] = $total/count($substituteRatings);
            }
        }
        return view('searchForSubstitute')->with('substitutesInfo', $substitutes)
                                            ->with('callForSubstitute', $callForSubstitute[0])
                                            ->with('averageSubstituteRatings', $averageSubstituteRatings);
    } 

    public function getEditCallForSubstitute($id) {
        $callForSubstitute = \App\CallForSubstitute::where('id', $id)->first();
        echo $callForSubstitute;
        $startDate = explode("/", $callForSubstitute->start_date);
        $startTime = explode(" ", $callForSubstitute->start_time);
        $endDate = explode("/", $callForSubstitute->end_date);
        $endTime = explode(" ", $callForSubstitute->end_time);
        $careHomeInfo = \App\CareHome::where('user_id', \Auth::id())->get();
        return view('editCallForSubstitute')->with('careHomeInfo', $careHomeInfo)
                                            ->with('startTime', $startTime)
                                            ->with('startDate', $startDate)
                                            ->with('endTime', $endTime)
                                            ->with('endDate', $endDate)
                                            ->with('careHomeId', $callForSubstitute->care_home_id)
                                            ->with('id', $id);
    } 

    public function postEditCallForSubstitute($id) {
        $callForSubstitute = \App\CallForSubstitute::find($id);
        $callForSubstitute->care_home_id = $_POST['careHomeSelect'];
        $callForSubstitute->user_id = \Auth::id();

        $start_date = $_POST['startMonth'] . "/" . $_POST['startDay'] . "/" . $_POST['startYear'];
        $start_time = $_POST['startHour'] . " " . $_POST['startMinute'] . " " . $_POST['startAMorPM'];
        $end_date = $_POST['endMonth'] . "/" . $_POST['endDay'] . "/" . $_POST['endYear'];
        $end_time = $_POST['endHour'] . " " . $_POST['endMinute'] . " " . $_POST['endAMorPM'];
        $callForSubstitute->start_date = $start_date;
        $callForSubstitute->start_time = $start_time;
        $callForSubstitute->end_date = $end_date;
        $callForSubstitute->end_time = $end_time;
        $callForSubstitute->save();
        return redirect('/profile');
    } 

    public function getEditSubstituteInfo() {
        $substituteInfo = \App\Substitute::where('user_id', \Auth::id())->get();
        return view('editSubstitute')->with('substituteInfo', $substituteInfo);
    }

    public function postEditSubstituteInfo() {
        $substituteInfo = \App\Substitute::where('user_id', \Auth::id())->first();
        $substituteInfo->address = $_POST['address'];
        $substituteInfo->distance = $_POST['distance'];
        $substituteInfo->save();
        return redirect('/profile');

    } 

    public function getEditCareHome($id) {
        $careHomeInfo = \App\CareHome::where('id', $id)->get();
        echo $careHomeInfo[0];
        $rooms = \App\CareHomeRoom::where('care_home_id', $id)->where('available', '1')->get();
        $contact = \App\User::where('id', $careHomeInfo[0]->user_id)->get();
        return view('editCareHome')->with('careHomeInfo', $careHomeInfo[0])
                                ->with('rooms', $rooms)
                                ->with('contact', $contact);
    }

    public function getDeleteCareHome($id) {
        $careHome = \App\CareHome::find($id);
        \App\CareHomeRoom::where('care_home_id', $id)->delete();
        $careHome->delete();
        return redirect('/profile');
    }

    public function getDeleteCallForSubstitute($id) {
        $callForSubstitute = \App\CallForSubstitute::find($id);
        $callForSubstitute->delete();
        return redirect('/profile');
    }

    public function getSendMessageSubstitute($id) {
        $user = \App\User::where('id', $id)->first();
        return view('sendMessageSubstitute')->with('user', $user);
    }

    public function postSendMessageSubstitute($id) {
        $substitute_message = new \App\SubstituteMessage;

        $substitute_message->user_id = \Auth::id();
        $substitute_message->substitute_user_id = $id;
        $substitute_message->title = $_POST['title'];
        $substitute_message->message = $_POST['message'];
        $substitute_message->read = '0';

        $substitute_message->save(); 
        return redirect('/confirmation/sendmessage/substitute/' . $substitute_message->id);
    }

    public function getConfirmationSendMessageSubstitute($id) {
        $substituteMessage = \App\SubstituteMessage::where('id', $id)->first();
        $user = \App\User::where('id', $substituteMessage->substitute_user_id)->first();
        return view('confirmationSendMessageSubstitute')->with('substituteMessage', $substituteMessage)
                                                        ->with('user', $user);
    }

    public function getSubstituteMessages() {
        $substituteMessages = \App\SubstituteMessage::where('substitute_user_id', \Auth::id())->get();
        return view('substituteMessages')->with('substituteMessages', $substituteMessages);
    }

    public function getDeleteSubstituteMessage($id) {
        \App\SubstituteMessage::find($id)->delete();
        return redirect('/substitutemessages');
    }

    public function getSearchCallForSubstitute() {
        $substituteInfo = \App\Substitute::where('user_id', \Auth::id())->get();
        $callsForSubstitute = \App\CallForSubstitute::all();
        return view('searchCallForSubstitute')->with('substituteInfo', $substituteInfo)
                                                ->with('callsForSubstitute', $callsForSubstitute);
    }

    public function getSendMessageCallForSubstitute($id) {
        $callForSubstitute = \App\CallForSubstitute::find($id);
        return view('sendMessageCallForSubstitute')
            ->with('id', $id)
            ->with('callForSubstitute', $callForSubstitute);
    }

    public function postSendMessageCallForSubstitute($id) {
        $call_for_substitute_message = new \App\CallForSubstituteMessage;

        $call_for_substitute_message->user_id = \Auth::id();
        $call_for_substitute_message->call_for_substitute_id = $id;
        $call_for_substitute_message->title = $_POST['title'];
        $call_for_substitute_message->message = $_POST['message'];
        $call_for_substitute_message->read = '0';

        $call_for_substitute_message->save(); 
        return redirect('/confirmation/sendmessage/callforsubstitute/' . $call_for_substitute_message->id);
    }

    public function getShowCallForSubstituteMessages($id) {
        $callForSubstituteMessages = \App\CallForSubstituteMessage::where('call_for_substitute_id', $id)->get();
        return view('showCallForSubstituteMessages')
            ->with('callForSubstituteMessages', $callForSubstituteMessages)
            ->with('id', $id);

    }

    public function getConfirmationSendMessageCallForSubstitute($id) {
        return view('confirmationSendMessageCallForSubstitute');

    }

    public function getDeleteShowCallForSubstituteMessages($id, $callid) {
        \App\CallForSubstituteMessage::find($id)->delete();
        return redirect('/show/callforsubstitutemessages/' . $callid);
    }


    public function getCallForSubstituteMessage($id) {
        $callForSubstituteMessage = \App\CallForSubstituteMessage::find($id);
        $user = \App\User::find($callForSubstituteMessage->user_id);
        echo $callForSubstituteMessage;
        return view('callForSubstituteMessage')
            ->with('callForSubstituteMessage', $callForSubstituteMessage)
            ->with('user', $user);
    }
}
