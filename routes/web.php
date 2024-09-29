<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 Route::get('lockscreenlogin', 'lockscreencontroller@index');


 Route::get('/home','HomeController@index')->name('index');
 
 
    
Route::get('payment-success','UpdatePaymentController@index');
Auth::routes();

use App\Http\Controllers\FilterCourseController;

//Auth::routes();

// Route::get('site/live', function(){
//     return Artisan::call('up');
// });
Route::group(['middleware' => 'auth'], function(){
Route::get('/','HomeController@index');
Route::get('/a', 'ImportsController@index'); // localhost:8000/
Route::get('getcity', 'EnquiryController@city');
      
    
    
    Route::get('tabletstate','TabletEnquiryController@state');
    Route::get('tabletcity','TabletEnquiryController@city');
    Route::get('client-detail-pdf',function(){
        return view('enquiry/client_detail_pdf');
    });
    Route::post('edit-client-image','EditClientController@edit_client_image');    



    Route::post('edit-client-image','EditClientController@edit_client_image');

    Route::get('delete-qualification','EditClientController@delete_qualification');

    Route::post('delete-experience-company', 'EditClientController@delete_experience_company');
    
    Route::post('delete-course-enrolment','EditClientController@delete_course_enrolment');
    
    Route::post('delete-student-financial','EditClientController@delete_student_financial');
    
    Route::post('delete-other-id-proof','EditClientController@delete_other_id_proof');
    

    Route::get('delete-parentsibling','EditClientController@delete_parentsibling');

    Route::post('update-payment','EditClientController@update_payment');
    
    Route::post('delete-payment','EditClientController@delete_payment');
    
    // Route::post('update-student-financial', 'EditClientController@update_student_financial');
    
    Route::post('update-student-financial-doc', 'EditClientController@update_student_financial_doc');
    
    Route::post('delete-student-financial-doc','EditClientController@delete_student_financial_doc');
    
    Route::post('update-enrolment-status-documents','Enrolments@update_enrolment_status_documents');

    Route::post('edit-client-detail','EditClientController@edit_client_overview');

    Route::post('edit-client-qualification','EditClientController@edit_client_qualification');
    
    Route::post('update-idproof', 'EditClientController@update_idproof');
    
    Route::post('update-visa-rejected', 'EditClientController@update_visa_rejected');
    
    Route::post('update-student-financial', 'EditClientController@update_student_financial');
    
    Route::post('update-enrolment-course', 'EditClientController@update_enrolment_course');
    
    Route::post('update-score', 'EditClientController@update_score');
    
    Route::post('update-experience', 'EditClientController@update_experience');


    Route::post('edit-client-name','EditClientController@edit_client_name');


    
Route::get('get_experience_company', 'EditClientController@get_experience_company');

Route::get('get_english_score', 'EditClientController@get_english_score');

Route::post('update-parentsibling-father', 'EditClientController@update_parentsibling_father');

Route::post('update-parentsibling-mother', 'EditClientController@update_parentsibling_mother');

Route::post('add-sibling', 'EditClientController@add_sibling');

Route::get('get_sibling', 'EditClientController@get_sibling');



Route::post('update-financial-detail', 'EditClientController@update_financial_detail');

Route::post('edit-other-detail','EditClientController@edit_other_detail');

Route::get('get_other_details' , 'EditClientController@get_other_details');

Route::post('add-update-passport', 'EditClientController@passportFun');


Route::post('request-bank-loan','Enrolments@request_bank_loan');

Route::post('upload-documents', 'EditClientController@upload_documents');

Route::get('remove-uploaded-document','EditClientController@remove_uploaded_document');

Route::get('approve-uploaded-document','EditClientController@approve_uploaded_document');


Route::get('update-uploaded-document','EditClientController@update_uploaded_document');
Route::get('delete-score','EditClientController@delete_score');

Route::post('update-visa-rejected-country','EditClientController@update_visa_rejected_country');

Route::post('communication-student','StudentController@communication_student');

Route::get('get-communication-student','StudentController@get_communication_student');





});

Route::get('/registration','ImmigrationController@registration');
 
 










