<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Reminder;
use App\Task;
class FullCalendarController extends Controller
{
    //
     public function index(Request $request)
    {
        
        
        if($request->ajax()) {
       
             $data = Event::whereDate('start', '>=', $request->start)
                      ->whereDate('end',   '<=', $request->end)
                      ->get(['id', 'title', 'start', 'end']);
  
             return response()->json($data);
        }
  
        return view('fullcalendar');
    }
    
    public function reminder(Request $request)
    {
        
        
        if($request->ajax()) {
       
             $data = Reminder::whereDate('start', '>=', $request->start)
                      ->whereDate('end',   '<=', $request->end)
                      ->get(['id', 'title', 'start', 'end']);
  
             return response()->json($data);
        }
  
        return view('fullcalendar');
    }
    public function task(Request $request)
    {
        
        
        if($request->ajax()) {
       
             $data = Task::whereDate('start', '>=', $request->start)
                      ->whereDate('end',   '<=', $request->end)
                      ->get(['id', 'title', 'start', 'end']);
  
             return response()->json($data);
        }
  
        return view('fullcalendar');
    }
 
    
    public function ajax(Request $request)
    {
        if($request->table == 'Events'){
            switch ($request->type) {
                case 'add':
                    $event = Event::create([
                          'title' => $request->title,
                          'start' => $request->start,
                          'end' => $request->end,
                      ]);
         
                    return response()->json($event);
                    break;
          
                case 'update':
                    $event = Event::find($request->id)->update([
                          'title' => $request->title,
                          'start' => $request->start,
                          'end' => $request->end,
                    ]);
         
                    return response()->json($event);
                      
                    break;
        
          
                case 'delete':
                    $event = Event::find($request->id)->delete();
          
                    return response()->json($event);
                    break;
                     
                default:
                    # code...
                    break;
            }
            
        }
        
        if($request->table == 'Reminders'){
            switch ($request->type) {
                case 'add':
                    $event = Reminder::create([
                          'title' => $request->title,
                          'start' => $request->start,
                          'end' => $request->end,
                      ]);
         
                    return response()->json($event);
                    break;
          
                case 'update':
                    $event = Reminder::find($request->id)->update([
                          'title' => $request->title,
                          'start' => $request->start,
                          'end' => $request->end,
                    ]);
         
                    return response()->json($event);
                      
                    break;
        
          
                case 'delete':
                    $event = Reminder::find($request->id)->delete();
          
                    return response()->json($event);
                    break;
                     
                default:
                    # code...
                    break;
            }
            
        }
        
        if($request->table == 'Tasks'){
            switch ($request->type) {
                case 'add':
                    $event = Task::create([
                          'title' => $request->title,
                          'start' => $request->start,
                          'end' => $request->end,
                      ]);
         
                    return response()->json($event);
                    break;
          
                case 'update':
                    $event = Task::find($request->id)->update([
                          'title' => $request->title,
                          'start' => $request->start,
                          'end' => $request->end,
                    ]);
         
                    return response()->json($event);
                      
                    break;
        
          
                case 'delete':
                    $event = Task::find($request->id)->delete();
          
                    return response()->json($event);
                    break;
                     
                default:
                    # code...
                    break;
            }
            
        }
    }
}





