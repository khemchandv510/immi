<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\enquiries;
use DB;
use App\Helpers\Helper;

class ExportController extends Controller
{
    //
    public function exportCsv(Request $request)
    {
       
       $fileName = 'list.csv';
       // $tasks = DB::table('enquiries')
       // ->where('enquiries.delete_client','1')
       // ->where('enquiries.conversion','2')
       // ->orderBy('enquiries.id','DESC')
       // ->get();
       //$tasks = enquiries::all();


       

// dd($request->id);
    //    dd(array_values($idw));
        $tasks = enquiries::where('delete_client','=','1')
        //  ->where('conversion','=','0')
         ->whereIn('unique_id', $request->id)
         ->OrderBy('id', 'desc')
        
         ->get();
         
            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );
       

        $columns = array('id', 'name', 'contact', 'email', 'dob','address_line1','financial_amount','image','country','state','city','history','gender','id_proof_no','father_name','occupation','alternate_contact','address_line2','district','pincode','course_country','course','agent_name');

        $callback = function() use($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
                $country = isset($task->country)?Helper::getCountry($task->country):"";
                $state =  isset($task->state)?Helper::getState($task->state):"";
                
                $row['id']  = 'IC'.$task->id;
                $row['name']    = $task->name;
                $row['contact']    = $task->contact;
                $row['email']  = $task->email;
                $row['dob']  = $task->dob;
                $row['address_line1']  = $task->address_line1;
                $row['financial_amount']  = $task->efinancial_amount;
                $row['image']  = $task->image;

                $row['country']  = $country ; 

                $row['state']  =   $state;
                $row['city']  = $task->city;
                $row['history']  = $task->history;
                $row['gender']  = $task->gender;
                $row['id_proof_no']  = $task->id_proof_no;
                $row['father_name']  = $task->father_name;
                $row['occupation']  = $task->occupation;
                $row['alternate_contact']  = $task->alternate_contact;
                $row['address_line2']  = $task->address_line2;
                $row['district']  = $task->district;
                $row['pincode']  = $task->pincode;
                $row['course_country']  = $task->course_country;
                $row['course']  = $task->course;
                $row['agent_name']  = $task->agent_name;

                fputcsv($file, array($row['id'], $row['name'],  $row['contact'], $row['email'], $row['dob'], $row['address_line1'], $row['financial_amount'] , $row['image'], $row['country'],$row['state'], $row['city'], $row['history'],$row['gender'],$row['id_proof_no'],$row['father_name'],$row['occupation'], $row['alternate_contact'], $row['address_line2'],$row['district'],$row['pincode'], $row['course_country'], $row['course'],$row['agent_name'] ));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
    
   


    public function export_hot_lead(Request $request){
         $fileName = 'Hot-list.csv';
        $tasks = DB::table('mbbsgo')->where('status','=','1')
          ->whereIn('unique_id', $request->id)
          ->OrderBy('id', 'desc')
          ->get();
          
             $headers = array(
                 "Content-type"        => "text/csv",
                 "Content-Disposition" => "attachment; filename=$fileName",
                 "Pragma"              => "no-cache",
                 "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                 "Expires"             => "0"
             );
        
 
         $columns = array('name', 'number', 'email', 'country','message','date','source');
 
         $callback = function() use($tasks, $columns) {
             $file = fopen('php://output', 'w');
             fputcsv($file, $columns);
 
             foreach ($tasks as $task) {
                 $country = isset($task->country)?Helper::getCountry($task->country):"";
                 $row['name']    = $task->name;
                 $row['number']    = $task->number;
                 $row['email']  = $task->email;
                 $row['country'] = $country;
                 $row['message']    = $task->message;
                 $row['date']  = $task->date;
                 $row['source']  = $task->source;
                 
 
                 fputcsv($file, array( $row['name'],  $row['number'], $row['email'],  $row['country'],  $row['message'],  $row['date'],  $row['source'] ));
             }
 
             fclose($file);
         };
 
         return response()->stream($callback, 200, $headers);
    } 
    
}
