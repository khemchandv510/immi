<?php
// Auth::routes();
Route::group(['middleware' => 'web'], function(){
    
// Route::group(['middleware' => 'web'],
// function(){
    
    Route::group(['middleware' => 'App\Http\Middleware\Employee'],
    function(){
        
// Route::get('subagent', function(){
//     dd('test');
// });
// Route::get('/','HomeController@index');

Route::get('lead-dashboard',function(){
return view('dashboard-lead');
});

Route::get('add-leads','NewClientController@add_lead')->name('add-leads');
Route::post('add-leads-save','EnquiryController@add_leads')->name('add-leads-save');

//Route::get('lead-dashboard','DashboardController@index')->name('lead-dashboard');
Route::get('enquiry-list/{id}', 'TabletEnquiryController@get_list');
Route::get('add-student','StudentController@addStudent')->name('add-student');
Route::get('student-list','StudentController@index')->name('student-list');
Route::get('student-dashboard','StudentController@studentdashboard')->name('student-dashboard');
Route::get('education/dashboard','EducationController@dashboard');
Route::get('application','Application@index')->name('application');
Route::get('education/add-institution', 'EducationController@add_institution')->name('education/add-institution'); 
Route::get('filter-course-section','FilterCourseController@filter_course_section')->name('filter-course-section');

// Route::get('add-employee','AgentController@index')->name('add-employee');
// Route::post('create-employee','AgentController@create_agent');
// Route::get('existing-agent','AgentController@existing_agent')->name('existing-agent');

// Route::get('attendance', 'HrController@attendance')->name('attendance');

// Route::get('make-present','HrController@make_present');
// 
// Route::get('make-absent', 'HrController@make_absent');

// Route::get('half-day', 'HrController@half_day');

// Route::post('attendance-by-date','HrController@attendance_by_date');

// Route::post('attendance-by-month', 'HrController@attendance_by_month');

Route::get('employee-detail/{id}', 'HrController@empoyee_detail');

Route::get('update-agent-profile/{id}',  'AgentController@update_agent_profile');

Route::get('/clear-cache', function() {
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    // Artisan::call('route:cache');
    Artisan::call('config:cache');
    return back();
});

Route::get('callbacklater_old_comment', 'EnquiryController@callbacklater_old_comment' );
Route::post('callbacklater', 'TabletEnquiryController@callbacklater' );
Route::get('/','DashboardController@index');
Route::get('search', 'EnquiryController@search');


Route::post('update_status', 'TabletEnquiryController@update_status');
Route::get('time-notification', 'AgentController@time_notification');

Route::get('add-priority', 'TabletEnquiryController@add_priority' )->name('add-priority');

Route::get('priority-list/{id}/{conversion}', 'TabletEnquiryController@get_all_priority');

Route::post('enquiry_post', 'EnquiryController@insert_date');

Route::get('export-excell','ImportsController@export_excell');
Route::get('export','ExportController@exportCsv')->name('export');
Route::get('delete', 'TabletEnquiryController@delete_list' );

Route::post('sort_list_courses','FilterCourseController@sort_list_courses');

Route::get('city-course','FilterCourseController@city_course');
Route::get('filter-course','FilterCourseController@filter_course');
Route::get('add-university-in-filter','FilterCourseController@add_university_in_filter');

Route::get('get-substream','FilterCourseController@get_substream');
Route::get('get-stream','FilterCourseController@get_stream');
Route::get('university-course','FilterCourseController@university_course');

Route::get('enquiry/get-detail/{id}','TabletEnquiryController@get_detail');

Route::post('education/save-courses','FilterCourseController@save_priority_course');

Route::get('application/application-delete/{id}','FilterCourseController@application_delete');

Route::get('application/application-process/{course_id?}','Application@application_process');
Route::get('update-priority','FilterCourseController@update_priority');
Route::post('update_activity','EditClientController@update_activity');

Route::get('education/dashboard','EducationController@dashboard');
Route::get('search-university','EducationController@search_university');
Route::get('/education/collage-info/{id}', 'EducationController@collage_info');

Route::post('take-followup','NewClientController@take_followup');
Route::get('get-all-list/{id}','EnquiryController@getalllist');






Route::get('hot-lead/{id?}','EnquiryController@hotlead');
Route::get('asign-hot-client/{id?}/{asign_client?}', 'AgentController@assign_hot_lead');

Route::get('edit-lead/{id}','NewClientController@edit_leads');
Route::post('edit-leads-save','NewClientController@edit_leads_save')->name('edit-leads-save');







Route::post('import-hot-leads','ImportsController@import_hot_leads');
Route::get('task-management','TaskManagement@index');
Route::post('add-task', 'TaskManagement@add_task');
Route::post('update-task-status','TaskManagement@update_task_status');
Route::get('edit-task/{id?}', 'TaskManagement@index');
Route::get('delete-task/{id}', 'TaskManagement@delete_task');
Route::get('view-new-leads','DashboardController@view_new_leads');
Route::get('view-students','DashboardController@view_new_leads');




    });
// });
});