<?php


// Route::group(['middleware' => ['web']], function () {
//     Route::get('autologin', function () {
//         $user = 1;
//         Auth::loginUsingId($user, true);
//         return redirect()->intended('/dashboard');
//     });
// });
route::get('cache', function(){
            Artisan::call('route:clear');
            return 'clearr';

});

// Route::get('lockscreenlogin', function(){
//     dd('test');
// });


Route::group(['middleware' => 'web'], function(){
    
    Route::group(['middleware' => 'App\Http\Middleware\Admin'],
    function(){
    Route::get('new-user',  'EnquiryController@new_user');
    Route::get('enquiry-table/{id?}','TabletEnquiryController@index');



    Route::get('education/dashboard','EducationController@dashboard');


    Route::get('/a', 'ImportsController@index'); // localhost:8000/
    
    Route::post('education/uploadFile', 'ImportsController@uploadile');
    
    Route::post('/uploadFile', 'ImportsController@uploadile');
    
    // Route::get('/deletecanada','ImportsController@deletecanada');
    
    
    Route::post('education/upload-course', 'ImportsController@upload_course');
    Route::post('education/universitylogo', 'ImportsController@universitylogo');
    
    
    Route::get('/','HomeController@index');
    Route::get('index','HomeController@index');
    
    Route::get('/start/contacts', function(){
        return view('start\contacts');
    });
    
    // Route::get('/manage/staff', function(){
    //     return view('managestaff\staff');
    // })
    
    // Route::get('/education/collage-info', function(){
    //     return view('education\collageInfo');
    // });
    
    
    
    
    // Route::get('/ccc-courses', function(){
    //     return view('education\ccc-courses');
    // });
    
    
    
     
    
    Route::post('imm-institute', 'EducationController@imm_search');
    
    Route::post('education/my-institute', 'EducationController@my_ins_search');
    
    Route::get('education/add-institution', 'EducationController@add_institution')->name('education/add-institution'); 
        
    
    Route::get('education/courses/{id}', 'education\AddCourseController@dashboard');
    
    Route::post('add-course', 'education\AddCourseController@add_course');
    
    Route::get('add-course', function(){
        return view('education/add-course');
        });
    
    Route::get('education/update-course/{id}' , 'education\AddCourseController@update_course');
    
    Route::post('education/updatesinglecourse' , 'education\AddCourseController@updatesinglecourse');
   
    
    
    Route::get('education/course-additional-info/{id}', 'education\AddCourseController@course_detail_info');
    
    
    
    Route::get('/education/collage-info/{id}', 'EducationController@collage_info');
    
     
    
    Route::post('add-institution', 'EducationController@insert_institution');
    
    Route::get('education/update-institution/{id}', 'EducationController@update_institution_form');
    
    Route::post('education/update-institution/{id}', 'EducationController@update_institution');
    
    
    Route::get('education/DeleteIntCourses/{id}', 'EducationController@DeleteIntCourses');
    
    // Route::get('education/update_agreement_expiry/{id}','EducationController@update_agreement_expiry_form');
        
    Route::post('education/update-agreement', 'EducationController@update_agreement');
    
    Route::post('education/add-contacts', 'EducationController@add_contact');
    
    Route::post('education/edu-notes','EducationController@edu_notes');
    
    Route::post('education/edu-campus', 'EducationController@edu_campus');
    
    Route::post('education/search-course', 'EducationController@search_course');
    
    
    Route::post('education/tag', 'EducationController@tag');
    
    Route::get('/clients',  'ClientsController@index');
    
    // Route::get('/', function () {
    //     return view('clients', ['name' => 'James']);
    // });
    
    Route::get('add-client', function(){
        return view('add-client');
    });
    
     
    
    Route::post('search-client', 'ClientsController@search_client');
    
    
    Route::get('enquiry/{id?}', 'EnquiryController@index');
    
    
    Route::get('getState', 'EnquiryController@state');
    Route::get('getcity', 'EnquiryController@city');
      
    
    
    Route::get('tabletstate','TabletEnquiryController@state');
    Route::get('tabletcity','TabletEnquiryController@city');
    
    Route::post('enquiry-tablet', 'TabletEnquiryController@insert_date');
    Route::post('enquiry_post', 'EnquiryController@insert_date');
    Route::post('new-user','EnquiryController@add_new_user');
    
    
    
    
    Route::get('enquiry-list/{id}', 'TabletEnquiryController@get_list');


    Route::get('unfollow-list/{id}','NewClientController@unfollowList');

    
    Route::get('enquiry/get-detail/{id}','TabletEnquiryController@get_detail');
    
    
    
    Route::get('search', 'EnquiryController@search')->name('search');
    
    Route::get('get-all-list/{id}','EnquiryController@getalllist');
     
  
    
    Route::get('/home', 'HomeController@index')->name('index');
    
    
    
    
    Route::post('update_status', 'TabletEnquiryController@update_status');
    Route::get('delete', 'TabletEnquiryController@delete_list' );
    
     

// 19-07 start

Route::get('enquiry-delete/{id}','TabletEnquiryController@delete' );

// after enq_form


Route::get('education/enrolments', 'Enrolments@index');

Route::get('client-enrolment/{id}', 'Enrolments@add_enrolment');

Route::post('add-enrolment-detail','Enrolments@add_enrolment_detail');

Route::post('update-enrolment-detail' , 'Enrolments@update_enrolment_detail' );

Route::post('enrolment-note', 'Enrolments@enrolment_note' );

Route::get('generate-invoice','Enrolments@generate_invoice');

Route::post('commition-invoice','Enrolments@commition_invoice');

Route::post('callbacklater', 'TabletEnquiryController@callbacklater' );

Route::get('existing-user','EnquiryController@existing_user');

Route::post('existing-user', 'EnquiryController@existing_user_add');

Route::get('get-notification', 'EnquiryController@get_notification');

Route::post('upload-image',  'TabletEnquiryController@upload_image');


Route::get('/clear-cache', function() {
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    // Artisan::call('route:cache');
    Artisan::call('config:cache');
    return back();
});

Route::get('add-institute-state','EducationController@state');

Route::get('add-institute-city','EducationController@city');

Route::post('upload-document','EducationController@upload_document');

Route::get('education/delete-college/{id}', 'EducationController@delete_college');

// Route::get('get-notification',function(){
//     return 1;
// });


// Route::get('test','SessionController@hr-section/index');

// Route::get('employee-list','SessionController@index');

// Route::post('job-left', 'HrController@job_left');
Route::get('add-employee','AgentController@index')->name('add-employee');
Route::post('create-employee','AgentController@create_agent');

Route::get('existing-agent','AgentController@existing_agent')->name('existing-agent');

Route::get('delete_agent', 'AgentController@delete_agent');

// Route::get('update-agent-profile',  'AgentController@update_agent_profile');

Route::get('update-agent-profile/{id}',  'AgentController@update_agent_profile');

Route::post('update-agent', 'AgentController@update_agent');



Route::get('range-filter', 'EnquiryController@range_filter');

Route::get('education/edit-college/{id}','EducationController@edit_college');

Route::post('edit-colllege', 'EducationController@edit_college_form');

Route::get('delete_contact', 'EducationController@delete_contact');

Route::get('get-all-trash-clients', 'TabletEnquiryController@trash_clients');

Route::get('undo-client', 'TabletEnquiryController@undo_client');

Route::get('permanent-delete-client', 'TabletEnquiryController@permanent_delete_client');

Route::post('asign-client', 'AgentController@asign_client');

Route::get('asign-client-list','AgentController@asign_client_list');

Route::get('attendance', 'HrController@attendance')->name('attendance');

Route::get('make-present','HrController@make_present');

Route::get('make-absent', 'HrController@make_absent');

Route::get('half-day', 'HrController@half_day');

// Route::get('attendance-by-date', 'HrController@attendance_by_date')

Route::post('attendance-by-date','HrController@attendance_by_date');

Route::post('attendance-by-month', 'HrController@attendance_by_month');

Route::get('ip-address','AdminController@index')->name('ip-address');

Route::post('add-ip-address', 'AdminController@add_ip_address');

Route::get('knowledgebase', 'AdminController@add_knowledgebase');

Route::get('profile', 'AgentController@profile');

Route::post('leave-request','AdminController@leave_request');

Route::post('add-knowledgebase', 'AgentController@add_knowledgebase');

Route::post('trace_login', 'AgentController@trace_login');
Route::post('workingstatus', 'AgentController@workingstatus');
Route::get('pause_login', 'AgentController@pause_login');

Route::get('active-ip','AdminController@active_ip');

Route::get('ip-deactive','AdminController@ip_deactive');

Route::get('ip-delete', 'AdminController@ip_delete');

Route::post('add-category-knowledgebase', 'AgentController@add_category_knowledgebase' );

Route::post('import-client', 'ImportsController@import_clients');

Route::post('import-unfollow-client', 'ImportsController@importUnfollowClients');

Route::get('manage-client-dahboard', function(){
    return view('manage-client/manage-client-dahboard');
});

Route::get('time-notification', 'AgentController@time_notification');

// Route::get('knowledgebase', function(){
//     return view('knowledgebase')
// })

Route::post('knowledgebase-heading-search','AgentController@search_heading');

Route::get('payroll','HrController@payroll')->name('payroll');

Route::post('select-employee-payroll','HrController@select_employee_payroll' );

Route::get('callbacklater_old_comment', 'EnquiryController@callbacklater_old_comment' );
 
Route::get('recruitment', 'HrController@recruitment')->name('recruitment');

Route::get('employee-detail/{id}', 'HrController@empoyee_detail');

Route::post('edit_emp_name','HrController@edit_emp_name');

Route::post('edit_emp_designation','HrController@edit_emp_designation');

Route::post('emp_other_detail_edit_form' ,'HrController@emp_other_detail_edit_form');

Route::get('add-priority', 'TabletEnquiryController@add_priority' )->name('add-priority');

// Route::get('priority-list/{id}/{conversion}', 'TabletEnquiryController@get_all_priority');

// Route::get('priority-list', 'TabletEnquiryController@priority_list');

Route::post('search-course','TabletEnquiryController@search_course')->name('coursesearch');

Route::post('progrem-filter','AddCourseController@program_filter')->name('pf');

Route::get('get_university','education\AddCourseController@filter');

Route::get('get_course','education\AddCourseController@get_course');

Route::post('previous_company_edit_form','HrController@previous_company_edit_form');

Route::post('bank_detail_edit_form', 'HrController@bank_detail_edit_form');

Route::get('delete-emp-document', 'HrController@delete_emp_document');

Route::post('add-ducument', 'HrController@add_ducument');

Route::get('eligibility-filter','FilterCourseController@filter_by_eligibility');

Route::get('range-filters/{id?}','FilterCourseController@range_filters');

Route::post('enrol-documents', 'Enrolments@upload_documents');

Route::get('client-document-approved','Enrolments@client_document_approved');

Route::post('enrol-documents-verify', 'Enrolments@aprove_or_cancel');

Route::post('documents-upload-again', 'Enrolments@documents_upload_again');

Route::post('application-sent','Enrolments@application_sent');

Route::get('get-status', 'Enrolments@get_status');

Route::post('bank-loan', 'Enrolments@bank_loan');


// Route::get('sendbasicemail','MailController@basic_email');
// Route::get('sendhtmlemail','MailController@html_email');
// Route::get('bank-loan','Enrolments@bank_loan');

Route::get('disabled_button', 'Enrolments@disabled_submit');

Route::get('get_all_course','FilterCourseController@range_filters_sort_fees');

Route::post('assign-all-client','AgentController@assign_all_client');



Route::get('client-detail-pdf',function(){
    return view('enquiry/client_detail_pdf');
});



Route::post('edit-client-image','EditClientController@edit_client_image');

Route::get('getcourses','FilterCourseController@getcourses');

Route::post('update_activity','EditClientController@update_activity');

Route::get('get_student_detail','FilterCourseController@get_student_detail');

Route::get('get_institutes','FilterCourseController@get_institutes');

Route::post('sort_list_courses','FilterCourseController@sort_list_courses');

Route::get('get_high_edu_toefl','FilterCourseController@get_high_edu_toefl');

Route::get('get_education_by_class','EditClientController@get_education_by_class');

Route::get('chat_to_client', 'EditClientController@chat_to_client');



Route::post('add_comment','Comment@add_comment');


Route::post('education/save-courses','FilterCourseController@save_priority_course');




Route::get('filter-course','FilterCourseController@filter_course');

Route::get('filter-course-section','FilterCourseController@filter_course_section')->name('filter-course-section');

Route::get('filter-course-search','FilterCourseController@filter_course_search')->name('filter_course_search');

Route::get('city-course','FilterCourseController@city_course');

Route::get('university-course','FilterCourseController@university_course');

Route::get('add-university-in-filter','FilterCourseController@add_university_in_filter');

Route::get('get-course-by-college', 'FilterCourseController@get_course_by_college');

Route::get('application','Application@index')->name('application');

Route::get('application/view-application/{id?}','Application@view_application');



Route::get('hide-client-notification','EditClientController@hide_client_notification');

Route::get('complete-profile-preview', function(){
    return view('enquiry/complete-profile-preview');
});


Route::get('get-stream','FilterCourseController@get_stream');

Route::get('get-substream','FilterCourseController@get_substream');

Route::get('get-university','FilterCourseController@get_university');


Route::get('application/application-process/{course_id}/{appid}','Application@application_process');



Route::get('new-client','NewClientController@index');

Route::post('take-followup','NewClientController@take_followup');


Route::get('search-unfollow-client' , 'NewClientController@searchUnfollowClient');

Route::post('assign-unfollow-client', 'NewClientController@assignedUnfollowClient');

Route::get('add-student','StudentController@addStudent')->name('add-student');

Route::get('student-list','StudentController@index')->name('student-list');

Route::get('search-student','StudentController@search');

Route::get('student-dashboard','StudentController@studentdashboard')->name('student-dashboard');

Route::get('export-student','StudentController@exportCsv')->name('export-student');

 Route::get('add-immigration','ImmigrationController@add')->name('add-immigration');

 Route::post('add-immigration-save','ImmigrationController@add_immigration')->name('add-immigration-save');

Route::get('immigration-list','ImmigrationController@index')->name('immigration-list');


Route::get('immigration-list-detail/{id}','ImmigrationController@listDetails');

Route::get('immigration-list-detail-956/{id}','ImmigrationController@pdfgenerate');

Route::get('immigration-detail/{id}','ImmigrationController@immigrationDetails')->name('immigration-details');

Route::get('immigration-process/{id}','ImmigrationController@immigrationProcess')->name('immigration-process');


Route::get('immigration-dashboard','ImmigrationController@dashboard')->name('immigration-dashboard');

Route::get('search-immigration','ImmigrationController@search');

Route::get('export-immigration','ImmigrationController@exportCsv')->name('export-immigration');

Route::get('add-institute','InstituteController@add')->name('add-institute');

Route::post('add-institute-save','InstituteController@add_institute')->name('add-institute-save');

// Route::get('search-filter', 'InstituteController@range_filter');

Route::get('institute-list','InstituteController@index')->name('institute-list');
Route::get('institute-dashboard','InstituteController@institutedashboard')->name('institute-dashboard');
//Route::get('institute/add-institute','InstituteController@index')->name('institute.add-institute');

Route::get('search-institute','InstituteController@search');

Route::get('export-institute','InstituteController@exportCsv')->name('export-institute');

Route::get('add-leads','NewClientController@add_lead')->name('add-leads');
Route::post('add-leads-save','EnquiryController@add_leads')->name('add-leads-save');

//Route::resource('company/add-company','AddCompanyController');
// Route::get('dashboard-leads',function(){
//     return view('dashboard-lead');
// });
Route::get('lead-dashboard','DashboardController@index')->name('lead-dashboard');
//Route::post('send-mail','MailController@attachment_email');

Route::post('send-mail','NewMailController@send')->name('send-mail');
Route::get('export','ExportController@exportCsv')->name('export');
Route::get('get-all-student/{id}','StudentController@getallstudent');

Route::get('search-filter-student', 'StudentController@search_filter');
Route::get('search-filter-institute', 'InstituteController@search_filter');
Route::get('search-filter-immigration', 'ImmigrationController@search_filter');

Route::get('get-all-institute/{id}','InstituteController@getallinstitute');

Route::get('get-all-immigration/{id}','ImmigrationController@getallimmigration');

Route::get('get-all-trash-student', 'StudentController@trash_clients');

Route::get('get-all-trash-institute', 'InstituteController@trash_clients');
Route::get('get-all-trash-immigration', 'ImmigrationController@trash_clients');
// Route::get('basic-mail','MailController@basic_email');
//Route::get('calendar','EnquiryController@calendar')->name('calendar');


Route::get('fullcalender', 'FullCalendarController@index')->name('fullcalender');
Route::post('fullcalenderAjax', 'FullCalendarController@ajax');


Route::get('export-excell','ImportsController@export_excell');

Route::get('edit-lead/{id}','NewClientController@edit_leads');



Route::post('edit-leads-save','NewClientController@edit_leads_save')->name('edit-leads-save');

Route::get('search-assign-client','AgentController@search_assign_client');


Route::post('update-ger-gmat','EditClientController@update_ger_gmat');

Route::post('update-ger-gmat','EditClientController@update_ger_gmat');



Route::post('add-gre-gmat','EditClientController@add_gre_gmat');

Route::get('delete-gre-gmat-score','EditClientController@delete_gre_gmat_score');



Route::get('get-all-students','StudentController@index');



Route::post('delete-country-history','EditClientController@delete_country_history');

Route::post('delete-visa-regected-country','EditClientController@delete_visa_regected_country');



Route::get('update-priority','FilterCourseController@update_priority');

Route::get('application/application-delete/{id}','FilterCourseController@application_delete');



Route::get('delete-documents','EditClientController@delete_documents');


Route::get('view-new-leads','DashboardController@view_new_leads');
    
Route::get('view-students','DashboardController@view_new_leads');

Route::get('emailer','EnquiryController@SendContentToEmailer');    
//   Route::get('emailer', function(){
//         return view('emailer');
//     });

Route::post('send-whatsapp-content','EnquiryController@whatsappSender');
Route::post('send-whatsapp-pdf-download','EnquiryController@whatsappSenderdownload'); 

Route::get('/','DashboardController@index');

Route::get('add-subagent', function (){
    return view('add-subagent');
});

Route::POST('create-sub-agent','AgentController@create_subagent');
Route::get('search-university','EducationController@search_university');

Route::post('send-emailer-content','EnquiryController@sendEmailer');





Route::get('get-quote','QuotationController@index');
Route::POST('send-quote','QuotationController@send_quote');




Route::get('quotation', 'QuotationController@quotation_search');
Route::get('update-quotation', 'QuotationController@get_update_quotation')->name('update-quotation');
Route::post('update-quotation', 'QuotationController@update_quotation')->name('update-quotation');




Route::post('update-payment-status','QuotationController@update_payment_status')->name('update-payment-status');

Route::post('delete-payment-status','QuotationController@delete_payment_status')->name('delete-payment-status');

Route::post('update_amount', 'QuotationController@update_amount')->name('update_amount');

Route::get('quotation-search','QuotationController@quotation_search');






Route::get('hot-lead/{id?}','EnquiryController@hotlead');
Route::get('asign-hot-client/{id?}/{asign_client?}', 'AgentController@assign_hot_lead');
Route::get('export-hot-lead', 'ExportController@export_hot_lead');
Route::get('delete-hot-client/{id?}','EnquiryController@delete_hot_lead');





Route::get('trashed-hot-lead','EnquiryController@trashed_hot_lead');
// Route::get('dead-leads/{id?}','EnquiryController@dead_leads');
Route::get('dead-leads/{id?}', 'EnquiryController@dead_leads');
Route::get('priority-list/{id}/{conversion?}', 'TabletEnquiryController@get_all_priority');

Route::get('undo-hot-lead/{id}', 'TabletEnquiryController@undo_hot_lead');

Route::get('permanent-delete-hot-lead/{id}', 'TabletEnquiryController@permanent_delete_hot_lead');
Route::get('assigned-hot-leads', 'EnquiryController@assigned_hot_leads');









// Route::post('import-hot-leads','ImportsController@import_hot_leads');


Route::post('import-hot-leads','ImportsController@import_hot_leads');
Route::get('task-management','TaskManagement@index');
Route::post('add-task', 'TaskManagement@add_task');
Route::post('update-task-status','TaskManagement@update_task_status');
Route::get('edit-task/{id?}', 'TaskManagement@index');
Route::get('delete-task/{id}', 'TaskManagement@delete_task');




Route::post('update-task-review', 'TaskManagement@update_task_review' );

Route::get('/followup', 'QuotationController@followupquot');

Route::POST('CourseExpiryUpdate','TabletEnquiryController@updateFurtureDate');

Route::POST('BulkDeleteViewList','TabletEnquiryController@BulkDeleteViewList');

// routes for notifications manager  are mentions below
Route::get('Missing-Requirements', 'notificationManager@index');
Route::get('MissignNotes', 'notificationManager@MissignNotes');



Route::post('notificationnotes','notificationManager@Notes');

Route::get('deletedata', 'notificationManager@deletedata');

Route::post('lockscreen', 'HomeController@lockscreen');


});
});
