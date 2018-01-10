<?php

namespace App\Http\Controllers;

use App\Event;
use App\Pregnancy;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Response;

class CalendarController extends Controller
{

    public function index()
    {
        /*$data = array();

        $id = Event::all()->pluck('id');
        $title = Event::all()->pluck('title');
        $start = Event::all()->pluck('start');
        $end = Event::all()->pluck('end');
        $allDay = Event::all()->pluck('allday');
        $color = Event::all()->pluck('color');
        $constraint = Event::all()->pluck('constraint');
        $count = count($id);
        for($i=0;$i<$count;$i++){
            $data[$i] = array(
                "id"=>$id[$i],
                "title"=>$title[$i],
                "start"=>$start[$i],
                "end"=>$end[$i],
                "allDay"=>$allDay[$i],
                "backgroundColor" => $color[$i],
                "constraint"=>$constraint[$i],
            );
        }
        json_encode($data);
        return $data;*/

        $data = Event::all();
        return Response::json($data);
    }

    public function delete(){
        $id = $_POST['id'];
        Event::destroy($id);
    }


    public function create()
    {
        //Values received from ajax
        $title = $_POST['title'];
        $start = $_POST['start'];
        $color = $_POST['color'];
        $constraint = $_POST['constraint'];
        //$url = $_POST['url'];

        $event=new Event();
        $event->start=$start;
        $event->allDay=false;
        $event->title=$title;
        $event->color = $color;
        $event->constraint = $constraint;
        //$event->url = $url;

        $event->save();
    }

    public function update()
    {
        //Values received from ajax
        $id = $_POST['id'];
        $title = $_POST['title'];
        $start = $_POST['start'];
        $end = $_POST['end'];

        $event=Event::find($id);
        $event->title=$title;
        $event->start=$start;
        if($end=='null'){
            $event->end=null;
        }else{
            $event->end=$end;
        }
        $event->allday = false;

        $event->save();
    }

    public function indexDeliveries()
    {
        $pregnancies = Pregnancy::where('finished', false)->get();
        $data = array();
        foreach ($pregnancies as $pregnancy) {
            $tmp = array(
                'id' => $pregnancy->id,
                'title' => $pregnancy->patient->last_name,
                'start' => $pregnancy->corrected_edd->toDateTimeString(),
                'end' => null,
                'allDay' => true,
                'url' => 'pregnancies/' . $pregnancy->id . '/history/' . $pregnancy->pregnancyHistory->id,
            );
            array_push($data, $tmp);
        }
        json_encode($data);
        return $data;
    }


}
