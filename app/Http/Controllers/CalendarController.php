<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class CalendarController extends Controller
{

    public function index()
    {
        $data = array();

        $id = Event::all()->pluck('id');
        $title = Event::all()->pluck('title');
        $start = Event::all()->pluck('start');
        $end = Event::all()->pluck('end');
        $allDay = Event::all()->pluck('allday');
        $color = Event::all()->pluck('color');
        $count = count($id);
        for($i=0;$i<$count;$i++){
            $data[$i] = array(
                "id"=>$id[$i],
                "title"=>$title[$i],
                "start"=>$start[$i],
                "end"=>$end[$i],
                "allDay"=>$allDay[$i],
                "backgroundColor"=>$color[$i]
            );
        }
        json_encode($data);
        return $data;
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

        $event=new Event();
        $event->start=$start;
        $event->allday=false;
        $event->title=$title;

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
}
