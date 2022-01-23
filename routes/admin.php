<?php

Route::group(['namespace' => 'Admin'], function() {

    Route::get('/', 'HomeController@index')->name('admin.dashboard');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');
    Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout');
    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('register', 'Auth\RegisterController@register');

    //Message Page
    Route::get('success', 'Auth\RegisterController@success')->name('admin.success.msg');
    Route::get('error', 'Auth\RegisterController@error')->name('admin.error.msg'); 

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('admin.password.update');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');

    // Verify
    // Route::get('email/resend', 'Auth\VerificationController@resend')->name('admin.verification.resend');
    // Route::get('email/verify', 'Auth\VerificationController@show')->name('admin.verification.notice');
    // Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('admin.verification.verify');

    
    Route::group(['middleware' => 'admin.auth'], function () {
        //Dashboard
        Route::get('/dashboard', 'Modules\Dashboard\DashboardController@dashboard')->name('admin.dashboard');
        Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout');

        //Exam
        Route::get('manage-exam','Modules\Exam\ExamController@manageExam')->name('manage.exam');
        Route::get('create-exam/{id?}','Modules\Exam\ExamController@createExam')->name('create.exam');
        Route::post('store-exam','Modules\Exam\ExamController@createExam')->name('store.exam');
        Route::get('change-exam-status/{id}','Modules\Exam\ExamController@changeStatus')->name('change.exam.status');
        Route::get('delete-exam/{id}','Modules\Exam\ExamController@deleteExam')->name('delete.exam');





        Route::get('add-exam-question/{id}/{ques_id?}','Modules\Exam\ExamController@addExamQuestion')->name('add.question');
        Route::get('edit-exam-question/{id}/{ques_id?}','Modules\Exam\ExamController@editExamQuestion')->name('edit.question');
        Route::post('update-question/{id}','Modules\Exam\ExamController@updateQuestion')->name('update.question');




        Route::post('store-question','Modules\Exam\ExamController@addQuestion')->name('store.question');
        Route::get('view-exam/{id}','Modules\Exam\ExamController@viewExam')->name('view.exam');
        Route::get('delete-question/{id}','Modules\Exam\ExamController@deleteQuestion')->name('delete.question');
        Route::get('view-question/{id}','Modules\Exam\ExamController@viewQuestion')->name('view.question');


        //Profile
        Route::get('edit-admin-profile','Modules\Profile\ProfileController@editProfile')->name('edit.admin.profile');
        Route::post('update-admin-profile','Modules\Profile\ProfileController@editProfile')->name('update.admin.profile');

        //For teacher
        Route::get('manage-teacher','Modules\Teacher\TeacherController@manageTeacher')->name('manage.teacher');
        Route::get('create-teacher/{id?}','Modules\Teacher\TeacherController@createTeacher')->name('create.teacher');
        Route::post('store-teacher','Modules\Teacher\TeacherController@createTeacher')->name('store.teacher');
        Route::get('delete-teacher/{id}','Modules\Teacher\TeacherController@deleteTeacher')->name('delete.teacher');
        Route::get('teacher-details/{id}','Modules\Teacher\TeacherController@viewTeacher')->name('view.teacher');
         Route::post('teacher-email','Modules\Teacher\TeacherController@chkEmailExist')->name('teacher.email');
         Route::get('change-teacher-status/{id}','Modules\Teacher\TeacherController@changeStatus')->name('change.teacher.status');
         Route::get('teacher-verify/{id}','Modules\Teacher\TeacherController@teacherVerify')->name('teacher.verify');

         //For Branch Manager
        Route::get('manage-branch-manager','Modules\BranchManager\BranchManagerController@manageBranchManager')->name('manage.branch.manager');
        Route::get('create-branch-manager/{id?}','Modules\BranchManager\BranchManagerController@createBranchManager')->name('create.branch.manager');
        Route::post('store-branch-manager','Modules\BranchManager\BranchManagerController@createBranchManager')->name('store.branch.manager');
        Route::get('delete-branch-manager/{id}','Modules\BranchManager\BranchManagerController@deleteBranchManager')->name('delete.branch.manager');
        Route::get('branch-manager-details/{id}','Modules\BranchManager\BranchManagerController@viewBranchManager')->name('view.branch.manager');
        Route::get('branch-manager-verify/{id}','Modules\BranchManager\BranchManagerController@branchManagerVerify')->name('branch.manager.verify');

        //for course
        Route::get('manage-course','Modules\Course\CourseController@manageCourse')->name('manage.course');
        Route::get('create-course/{id?}','Modules\Course\CourseController@createCourse')->name('create.course');
        Route::post('store-course','Modules\Course\CourseController@createCourse')->name('store.course');
        Route::get('delete-course/{id?}','Modules\Course\CourseController@deleteCourse')->name('delete.course');
        Route::get('course-details/{id?}','Modules\Course\CourseController@viewCourse')->name('view.course');
        Route::get('assign-teacher/{id?}','Modules\Course\CourseController@assignTeacherCourse')->name('assign.teacher.course');
        
        //for class
        Route::get('manage-class','Modules\Course\ClassController@manageClass')->name('manage.class');
        Route::get('create-class/{id?}','Modules\Course\ClassController@createClass')->name('create.class');
        Route::post('store-class','Modules\Course\ClassController@storeClass')->name('store.class');
        Route::get('edit-class/{id?}','Modules\Course\ClassController@editClass')->name('edit.class');
        Route::post('update-class/{id?}','Modules\Course\ClassController@updateClass')->name('update.class');
        Route::get('delete-class/{id?}','Modules\Course\ClassController@deleteClass')->name('delete.class');

        
        //for subject
        Route::get('manage-subject','Modules\subject\SubjectController@index')->name('manage.subject');
        Route::get('create-subject/{id?}','Modules\subject\SubjectController@create')->name('create.subject');
        Route::post('store-subject','Modules\subject\SubjectController@store')->name('store.subject');
        Route::get('edit-subject/{id?}','Modules\subject\SubjectController@edit')->name('edit.subject');
        Route::post('update-subject/{id?}','Modules\subject\SubjectController@update')->name('update.subject');
        Route::get('delete-subject/{id?}','Modules\subject\SubjectController@destroy')->name('delete.subject');
        

        Route::get('get-class/{course_id}','Modules\subject\SubjectController@getClass')->name('admin/get-class');
        Route::get('get-subject/{course_id}','Modules\Course\ClassController@getsubject')->name('admin/get-subject');





        Route::post('store-course-teacher','Modules\Course\CourseController@storeCourseTeacher')->name('store.course.teacher');
        //view course for teacher
        Route::post('teacher-view-course','Modules\Course\TeacherViewCourse@teacherViewCoursefor')->name('teacher.view.course');
        Route::get('teacher-view-course','Modules\Course\TeacherViewCourse@teacherViewCoursefor')->name('teacher.view.course');

        //for student
        Route::get('manage-student','Modules\Student\StudentController@manageStudent')->name('manage.student');
        Route::get('create-student/{id?}','Modules\Student\StudentController@createStudent')->name('create.student');
        Route::post('store-student','Modules\Student\StudentController@createStudent')->name('store.student');
        Route::get('delete-student/{id}','Modules\Student\StudentController@deleteStudent')->name('delete.student');
        Route::get('student-details/{id}','Modules\Student\StudentController@viewStudent')->name('view.student');

        //for notice board
        Route::get('manage-notice-board','Modules\NoticeBoard\NoticeBoardController@manageNoticeBoard')->name('manage.notice.board');
        Route::get('create-notice-board/{id?}','Modules\NoticeBoard\NoticeBoardController@createNoticeBoard')->name('create.notice.board');
        Route::post('store-notice-board','Modules\NoticeBoard\NoticeBoardController@createNoticeBoard')->name('store.notice.board');
        Route::get('delete-notice-board/{id}','Modules\NoticeBoard\NoticeBoardController@deleteNoticeBoard')->name('delete.notice.board');
        Route::get('notice-board-details/{id}','Modules\NoticeBoard\NoticeBoardController@viewNoticeBoard')->name('view.notice.board');
        Route::post('update-notice-board-title/{id}','Modules\NoticeBoard\NoticeBoardController@update_notice_board_title')->name('update-notice-board-title');

        //for program
        Route::get('manage-program','Modules\Program\ProgramController@manageProgram')->name('manage.program');
        Route::get('create-program/{id?}','Modules\Program\ProgramController@createProgram')->name('create.program');
        Route::post('store-program','Modules\Program\ProgramController@createProgram')->name('store.program');
        Route::get('delete-program/{id}','Modules\Program\ProgramController@deleteProgram')->name('delete.program');
        Route::get('program-details/{id}','Modules\Program\ProgramController@viewProgram')->name('view.program');

        //routine
    Route::get('/routine','Modules\Routine\RoutineController@manageRoutine')->name('manage.routine');
    Route::post('/routine','Modules\Routine\RoutineController@manageRoutine')->name('manage.routine');
    Route::get('/create-routine/{id?}','Modules\Routine\RoutineController@createRoutine')->name('create.routine');
    Route::post('/store-routine','Modules\Routine\RoutineController@createRoutine')->name('store.routine');
    Route::get('/delete-routine/{id?}','Modules\Routine\RoutineController@deleteRoutine')->name('delete.routine');
    
    //Slider
    Route::get('manage-slider','Modules\Slider\SliderController@manageSlider')->name('manage.slider');
    Route::get('create-slider/{id?}','Modules\Slider\SliderController@createSlider')->name('create.slider');
    Route::post('/store-slider','Modules\Slider\SliderController@createSlider')->name('store.slider');
    Route::get('/delete-slider/{id?}','Modules\Slider\SliderController@deleteSlider')->name('delete.slider');    


    //fact
    Route::get('manage-fact','Modules\Fact\FactController@manageFact')->name('manage.fact');
    Route::post('/store-fact/{id}','Modules\Fact\FactController@createSlider')->name('store.fact');


    //testimonial
    Route::get('manage-testimonial','Modules\Testimonial\TestimonialController@manageTestimonial')->name('manage.testimonial');
    Route::get('create-testimonial/{id?}','Modules\Testimonial\TestimonialController@createTestimonial')->name('create.testimonial');
    Route::post('/store-testimonial','Modules\Testimonial\TestimonialController@createTestimonial')->name('store.testimonial');
    Route::get('/delete-testimonial/{id?}','Modules\Testimonial\TestimonialController@deleteTestimonial')->name('delete.testimonial');


        //Attendance
    Route::get('/attendance','Modules\Attendance\AttendanceController@manageAttendance')->name('manage.attendance');
    Route::post('/staore-teacher-attendance','Modules\Attendance\AttendanceController@storeTeacherAttendance')->name('store.teacher.attendance');


    //Faq
    Route::get('manage-faq','Modules\Faq\FaqController@manageFaq')->name('manage.faq');
     Route::get('create-faq/{id?}','Modules\Faq\FaqController@createFaq')->name('create.faq');

     Route::post('store-faq','Modules\Faq\FaqController@createFaq')->name('store.faq');
        Route::get('delete-faq/{id?}','Modules\Faq\FaqController@deleteFaq')->name('delete.faq');

    //Send message
        Route::get('send-message','Modules\Message\MessageController@addMessage')->name('add.message');
        Route::post('send-to-message','Modules\Message\MessageController@sendMessage')->name('send.message');

    //publication
        Route::get('manage-publication','Modules\Publication\PublicationController@managePublication')->name('manage.publication');

         Route::get('create-publication /{id?}','Modules\Publication\PublicationController@createPublication')->name('create.publication');
          Route::post('store-publication','Modules\Publication\PublicationController@createPublication')->name('store.publication');

          Route::get('delete-publication /{id?}','Modules\Publication\PublicationController@deletePublication')->name('delete.publication');

    });
});

