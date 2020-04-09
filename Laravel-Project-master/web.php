<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', "BaseController@index");

//Musfiq
Route::get('/about-us', "BaseController@about_us");
Route::get('/accounting', "BaseController@course");
Route::get('/finance', "BaseController@course1");

//Hasan Sir
Route::get('/bank', "BankController@index");
Route::post('/bank/report', "BankController@report");

Route::get('/online-exam', "ExamController@index");
Route::post('test/save', "ExamController@exam_avaliable");
Route::post('/online-exam/update', "ExamController@update");
Route::get('/online-exam/view', "ExamController@view");


Route::post('load-question', "ExamController@load_question");


Route::get('/change-password', "ProfileController@change_password");
Route::post('/change-password', "ProfileController@update");

Route::get('/login', "LoginController@index");

Route::post('/login/check', "LoginController@check");
Route::get('/logout', "LoginController@logout");

Route::get('/student/loading', "StudentController@ajaxdata");
Route::post('/student/loading', "StudentController@ajaxdata");

//Batch
Route::get('/batch-management', "BatchController@index");

//Attendence
Route::get('/daily-attendence', "AttendenceController@index");
Route::get('/attendence/teacher', "AttendenceController@load_teacher");
Route::get('/attendence/course', "AttendenceController@load_course");
Route::get('/attendence/student', "AttendenceController@load_student");
Route::post('/daily-attendence', "AttendenceController@store");
Route::get('/daily-attendence/view', "AttendenceController@view");

//Result
Route::get('/exam-result', "ResultController@index");
Route::get('/exam-result/teacher', "ResultController@load_teacher");
Route::get('/exam-result/course', "ResultController@load_course");
Route::get('/exam-result/student', "ResultController@load_student");
Route::post('/exam-result', "ResultController@store");

//Report
Route::get('/exam-report', "ReportController@index");
Route::get('/exam-report/student', "ReportController@load_student");
Route::get('/exam-report/course', "ReportController@load_course");
Route::get('/exam-report/result', "ReportController@load_result");
Route::post('/exam-report', "ReportController@store");

//Department Muzammel
Route::get('/department-management', "DepartmentController@index");
Route::post('/department-management', "DepartmentController@store");
Route::get('/department-management/view', "DepartmentController@view");
Route::get('/department-management/edit/{id}', "DepartmentController@edit");
Route::post('/department-management/update', "DepartmentController@update");
Route::get('/department-management/delete/{id}', "DepartmentController@delete");

//Course
Route::get('/course-management', "CourseController@index");
Route::get('/course-management/new', "CourseController@create");
Route::post('/course-management', "CourseController@store");

//Credit Musfiq
Route::get('/credit-management', "CreditController@index");
Route::post('/credit-management', "CreditController@store");
Route::get('/credit-management/view', "CreditController@view");
Route::get('/credit-management/edit/{id}', "CreditController@edit");
Route::post('/credit-management/update', "CreditController@update");
Route::get('/credit-management/delete/{id}', "CreditController@delete");

//Department
Route::get('/department-management', "DepartmentController@index");
Route::post('/department-management', "DepartmentController@store");

//Student 
Route::get('/student-management', "StudentController@index");
Route::post('/student-management', "StudentController@store");
Route::get('/student-management/view', "StudentController@view");
Route::get('/student-management/edit/{id}', "StudentController@edit");
Route::post('/student-management/update', "StudentController@update");
Route::get('/student-management/delete/{id}', "StudentController@delete");

//profile:
Route::get('/profile-management/profile/{id}', "ProfileController@profile");
Route::get('/profile-management/view', "ProfileController@view");

//Expense Anam
Route::get('/expense-management', "ExpenseController@index");
Route::post('/expense-management', "ExpenseController@store");
Route::get('/expense-management/view', "ExpenseController@view");
Route::get('/expense-management/edit/{id}', "ExpenseController@edit");
Route::post('/expense-management/update', "ExpenseController@update");
Route::get('/expense-management/delete/{id}', "ExpenseController@delete");

//Notice Anam
Route::get('/notice-management', "NoticeController@index");
Route::post('/notice-management', "NoticeController@store");
Route::get('/notice-management/view', "NoticeController@view");
Route::get('/notice-management/edit/{id}', "NoticeController@edit");
Route::post('/notice-management/update', "NoticeController@update");
Route::get('/notice-management/delete/{id}', "NoticeController@delete");
Route::get('/notice/{id}', "PublicController@index");

//Administrator Nilu
Route::get('/administrator-management', "AdministratorController@index");
Route::post('/administrator-management', "AdministratorController@store");
Route::get('/administrator-management/view', "AdministratorController@view");
Route::get('/administrator-management/edit/{id}', "AdministratorController@edit");
Route::post('/administrator-management/update', "AdministratorController@update");
Route::get('/administrator-management/delete/{id}', "AdministratorController@delete");


//Subject Shakila
Route::get('/subject-management', "SubjectController@index");
Route::post('/subject-management', "SubjectController@store");
Route::get('/subject-management/view', "SubjectController@view");
Route::get('/subject-management/edit/{id}', "SubjectController@edit");
Route::post('/subject-management/update', "SubjectController@update");
Route::get('/subject-management/delete/{id}', "SubjectController@delete");

//Course Shakila
Route::get('/course-management', "CourseController@index");
Route::post('/course-management', "CourseController@store");
Route::get('/course-management/view', "CourseController@view");
Route::get('/course-management/edit/{id}', "CourseController@edit");
Route::post('/course-management/update', "CourseController@update");
Route::get('/course-management/delete/{id}', "CourseController@delete");

//Designation Farid
Route::get('/designation-management', "DesignationController@index");
Route::post('/designation-management', "DesignationController@dgstore");
Route::get('/designation-management/view', "DesignationController@view");
Route::get('/designation-management/edit/{id}', "DesignationController@edit");
Route::post('/designation-management/update', "DesignationController@update");
Route::get('/designation-management/delete/{id}', "DesignationController@delete");

//Examfees Routes
Route::get('/examfees-management', "ExamfeesController@index");
Route::post('/examfees-management', "ExamfeesController@store");
Route::get('/examfees-management/view', "ExamfeesController@view");
Route::get('/examfees-management/edit/{id}', "ExamfeesController@edit");
Route::post('/examfees-management/update', "ExamfeesController@update");
Route::get('/examfees-management/delete/{id}', "ExamfeesController@delete");

//Teacher Himel
Route::get('/teacher-management', "TeacherController@index");
Route::post('/teacher-management', "TeacherController@store");
Route::get('/teacher-management/view', "TeacherController@view");
Route::get('/teacher-management/edit/{id}', "TeacherController@edit");
Route::post('/teacher-management/update', "TeacherController@update");
Route::get('/teacher-management/delete/{id}', "TeacherController@delete");

//Gallery Alamin
Route::get('/gallery-management', "GalleryController@index");
Route::post('/gallery-management', "GalleryController@store");
Route::get('/gallery-management/view', "GalleryController@view");
Route::get('/gallery-management/edit/{id}', "GalleryController@edit");
Route::post('/gallery-management/update', "GalleryController@update");
Route::get('/gallery-management/delete/{id}', "GalleryController@delete");

//Stuff Alamin
Route::get('/stuff-management', "StuffController@index");
Route::post('/stuff-management', "StuffController@store");
Route::get('/stuff-management/view', "StuffController@view");
Route::get('/stuff-management/edit/{id}', "StuffController@edit");
Route::post('/stuff-management/update', "StuffController@update");
Route::get('/stuff-management/delete/{id}', "StuffController@delete");

//SemesterFees Hawladar
Route::get('/semesterfees-management', "SemesterfeesController@index");
Route::post('/semesterfees-management', "SemesterfeesController@store");
Route::get('/semesterfees-management/view', "SemesterfeesController@view");
Route::get('/semesterfees-management/edit/{id}', "SemesterfeesController@edit");
Route::post('/semesterfees-management/update', "SemesterfeesController@update");
Route::get('/semesterfees-management/delete/{id}', "SemesterfeesController@delete");

//Salary Farid
Route::get('/salary-management', "SalaryController@index");
Route::post('/salary-management', "SalaryController@store");
Route::get('/salary-management/view', "SalaryController@view");
Route::get('/salary-management/edit/{id}', "SalaryController@edit");
Route::post('/salary-management/update', "SalaryController@update");
Route::get('/salary-management/delete/{id}', "SalaryController@delete");

Route::get('/loading/staff-teacher', "SalaryController@loadingdata");




