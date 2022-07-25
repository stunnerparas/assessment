<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Redirect;

class EventController extends Controller
{
    
    public function index()
    {

      $events=Event::all()->toArray();
      return view('Admin/Event/index',compact('events'));
      
    }

        public function store(Request $request)
    { 
        //Server side validation of given input 

        $validated = $request->validate([
            'title' => 'required|max:191',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'start_time' => 'date_format:H:i',
            'end_time' => 'date_format:H:i|after:start_time',
            'start_date'      => 'required|date|date_format:Y-m-d|after:yesterday',
            'end_date'        => 'required|date|date_format:Y-m-d',
            'title' => 'required|max:191',
            'description' => 'required|max:2000',

        ]);

      
        $event=$request->file('image');   
        
        if($request->file('image')) //if user have entered image ?
      {
        $extension=$event->getClientOriginalExtension();
        $new_image_name=rand(11111111,99999999).date('ymdhis').".$extension"; 
        $event->move(public_path().'/admin/images/event', $new_image_name); 
        $image_path='/admin/images/event/'.$new_image_name;
      }
      else 
      {
        $image_path=$event;
      }

        $event= new Event;

        $event->date=$request->input('start_date')." to ".$request->input('end_date'); //append user start and end date
        $event->time=$request->input('start_time')." to ".$request->input('end_time'); //append start and end time 
        $event->title=$request->input('title');
        $event->address=$request->input('address');
        $event->image=$image_path;
        $event->description=$request->input('description');

        $event->save();
        return Redirect::back();


    }

    public function show($id)
    {
        $event=Event::all()->where('id','=',$id)->toArray();  //show the specific event

        return view('Admin/Event/edit',compact('event'));
    }

    public function destroy($id){
   
        Event::find($id)->delete($id);
      
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'title' => 'required|max:191',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'start_time' => 'date_format:H:i',
            'end_time' => 'date_format:H:i|after:start_time',
            'start_date'      => 'required|date|date_format:Y-m-d|after:yesterday',
            'end_date'        => 'required|date|date_format:Y-m-d',
            'title' => 'required|max:191',
            'description' => 'required|max:2000',

        ]);

      $event=Event::all()->where('id','=',"$id")->toArray();

      if(!$event)
      {
      return Redirect::back()->withInput()->with('error_message','The id could not be found');
      }

      try
      {
      if($request->file('image')) //if user have entered image then delete old image
      {

      foreach($event as $row)
        {
        $image_path = public_path()."/".$row['image']; // delete old image
        unlink($image_path);
        }

       }
       
      $event=Event::where('id','=',"$id")->first();

         if($request->file('image'))
           {
            $event->date=$request->input('start_date')." to ".$request->input('end_date'); //append user start and end date
            $event->time=$request->input('start_time')." to ".$request->input('end_time'); //append start and end time 
            $event->title=$request->input('title');
            $event->address=$request->input('address');
            $event->image=$image_path;
            $event->description=$request->input('description');

           }


  
        $event->save();
        return Redirect::back();
    }
         catch (\Exception $e) {
         return Redirect::back()->withInput()->with('error_message',$e->getMessage());
         }

    }

}
