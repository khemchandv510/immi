<?php

namespace App\Helpers;

use App;
use DB;

class Helper
{
    protected $table = 'enq_id_proof';
    /**
     * * get Hashtag Name From Hashtag ID
     * ***
     * **** */
    

     public  static function get_client_id_proof($enquiry_id){
         
         $get_data = App\enq_id_proof::getdata($enquiry_id);    
         return $get_data;
     }
    
     public static function get_client_financial_detail($enquiry_id){
         $get_data = App\enq_financials::getdata($enquiry_id);
         return $get_data;
     }
     
     public static function get_client_rank_course($enquiry_id){
         $getData = App\sort_list_courses::getData_rank_course($enquiry_id);
         return  $getData;
     }

     public static function get_client_list_course($enquiry_id){
        $getData = App\sort_list_courses::getData_list_course($enquiry_id);
        return $getData ;
     }

     public static function get_id_proof_name(){
        $getData = App\enq_id_proof_type::getdata() ; 
            return $getData;
        }
        public static function get_passport($enquiry_id){
            $getpassport =  App\enq_id_proof::getPassport($enquiry_id);
            return $getpassport;
        }

        public static function upload_documents($enquiry_id, $class){
            $get_upload_document  = App\enrolment_documents::getUploadDocuments($enquiry_id, $class);
            return  $get_upload_document;
        }

        public static function enqEducation($enquiry_id){
            $get_education = App\enq_educations::getEducations($enquiry_id);
                return $get_education;
            }
        
            public static function getAllUploadDocuments($enquiry_id){
                $getUploadDocuments = App\enrolment_documents::getAllEducations($enquiry_id);
                return                 $getUploadDocuments;
            }
 
            public static function getAllCountry(){
            $getAllCountry = App\countries::getAllCountry();
                    return $getAllCountry ;
                }

                public static function getCountry($id){
                    $getCountry = App\countries::getCountry($id);
                    return  $getCountry;
                }

            public static function getAllUniversityName(){
                $getAllUniversity = App\my_institutes::getAllUniversityName();
                return $getAllUniversity;
            }  

            public static function getState($id){
                $getState = App\states::getState($id);
                return $getState;
            }

            public static function getHowFinancialDoc($id){
                
                $getDoc  = App\enq_financial_doc::getDoc($id);
                return $getDoc;
            }

            public static function getUpfollowData(){
                $client  =  App\unfollowdata::getUpfollowData();
                    return $client;
                
            }


            public static function getAllUnfollowData($page){
                $data  = App\unfollowdata::getAllUnfollowData($page);
                return $data;
            }

            public static function getAllStatus(){
                $getStatus = DB::table('enq_status')->get();
                return $getStatus;
            }

            public static function getPurpose(){
                $getPurpose  = DB::table('enq_purposes')->get();
                return $getPurpose;
            }

            public static function getAllEmployee(){
                $getAllUsers  = App\users::getAllEmployee();
                return  $getAllUsers;
            }

            
            public static function getUserById($id){
                $getUserById  = App\users::getUserById($id);
                return  $getUserById;
            }

            public static function getAllUsers(){
                $getAllUsers  = App\users::getAllUsers();
                return $getAllUsers;
            }

            
            public static function getWorkedClientByUser($id){
                $getWorkedClientByUser  = App\enquiries::getWorkedClientByUser($id);
                return  $getWorkedClientByUser;
            }
 
        public static function getAllClientForAdmin($source){
            $getAllClientForAdmin = App\enquiries::getAllClientForAdmin($source);
                return $getAllClientForAdmin;
            
        }   

        public static function recentActivity($id){
            $recentActivity = App\enquiries::recentActivity($id);
                return $recentActivity;
            
        }   
        
        public static function getAllCities(){
            $getAllCities = App\cities::getAllCities();
                return $getAllCities ;
            
        }
        
         public static function getTotalEmployee(){
            $getTotalEmployee = App\users::getTotalEmployee();
                return $getTotalEmployee ;
            
        }

public static function gre_gmat_language_scores($id){
$gre_gmat_language_scores = App\gre_gmat_language_scores::gre_gmat_language_scores($id);
                return $gre_gmat_language_scores;
            
        }

public static function get_all_enq_comments(){
    $get_all_enq_comments  = App\enq_comments::get_all_enq_comments();
    return  $get_all_enq_comments;
}

public static function get_enquiries($id){
$get_enquiries =  App\enquiries::get_enquiries($id);
return   $get_enquiries;
}

public static function get_enq_asign_clients($id){
    $get_enq_asign_clients = App\enq_asign_clients::get_enq_asign_clients($id);
    return $get_enq_asign_clients;
}

}