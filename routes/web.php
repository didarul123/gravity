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

// Route::get('/home', function () {
//     return view('welcome');
// });

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


// Login
Route::get('login', 'Auth\LoginController@showUserLoginForm')->name('login'); 
Route::get('logout', 'Auth\LoginController@logout')->name('logout');


// // Register
// Route::get('signup', 'Auth\RegisterController@registerUser')->name('signup');
// Route::get('register-save-email', 'Auth\RegisterController@saveRegisterUserEmail')->name('save.register.email');
// Route::get('user-register/{email}', 'Auth\RegisterController@registerUserFrom2')->name('user.register.step2'); 

// Route::post('save-register', 'Auth\RegisterController@saveRegisterUser')->name('save.register.user');

//email verfication
Route::get('user-verify/{vcode}/{id}', 'Auth\RegisterController@verifyEmail')->name('verify'); 

//email and mobile checking
Route::post('user-email-check', 'Auth\RegisterController@userEmailCheck')->name('user.email.check');
Route::post('user-mobile-check', 'Auth\RegisterController@userMobileCheck')->name('user.mobile.check');


// Passwords
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

//Message Page
Route::get('success', 'Auth\RegisterController@success')->name('user.success.msg');
Route::get('error', 'Auth\RegisterController@error')->name('user.error.msg');


	//home page 
	Route::get('/','Modules\Home\HomeController@viewHome')->name('home');

	Route::get('/course/{id?}','Modules\Course\CourseController@courseList')->name('course');
	Route::get('/all-course','Modules\Course\CourseController@getAllCourse')->name('all.course');
	Route::get('/course-details/{id}','Modules\Course\CourseController@courseDetails')->name('course.details');
	//Routine
	Route::get('/routine','Modules\Routine\RoutineController@showRoutine')->name('routine');
	Route::get('/contact-us','Modules\Content\ContentController@contactUs')->name('contact.us');
	Route::get('/terms-conditions','Modules\Content\ContentController@termsConditions')->name('terms.conditions');
	Route::get('/privacy-policy','Modules\Content\ContentController@privacyPolicy')->name('privacy.policy');

Route::group(['middleware' => 'auth'], function() {
	//user edit profile
	Route::get('edit-prfile','Modules\Profile\ProfileController@editProfile')->name('edit.profile');
	Route::post('update-profile','Modules\Profile\ProfileController@updateProfile')->name('update.profile');
	Route::post('email-checking','Modules\Profile\ProfileController@emailChecking')->name('email.checking');

	//dashboard
	Route::get('/dashboard','Modules\Dashboard\DashboardController@dashboard')->name('dashboard');

	//course
	//Route::get('/','Modules\Course\CourseController@courseShow')->name('home');

	// Route::get('/course-details/{id}','Modules\Course\CourseController@courseDetails')->name('course.details');
	Route::get('/course-for-class/{id}','Modules\Course\CourseController@showCourseClassWise')->name('course.show.class.wise');
	
	//enroll
	Route::get('/enroll/{id?}','Modules\Enroll\EnrollController@enrollStudent')->name('enroll.student');
	Route::post('/store-enroll','Modules\Enroll\EnrollController@storeEnrollStudent')->name('store.enroll.student');
	Route::get('/store-enroll','Modules\Enroll\EnrollController@storeEnrollStudent')->name('store.enroll.student');
	//My Enroll
	Route::get('/my-enroll','Modules\Enroll\MyEnrollController@myEnroll')->name('my.enroll');
	//payment
	Route::get('/payment','Modules\Payment\PaymentController@payment')->name('payment');
	Route::post('payment','Modules\Payment\PaymentController@payment')->name('payment');
	Route::post('payment-response','Modules\Payment\PaymentController@paymentResponse')->name('payment.response');

	//Exam
	Route::get('select-exam','Modules\Exam\ExamController@selectExam')->name('select.exam');
	Route::get('exam/{id?}','Modules\Exam\ExamController@exam')->name('exam');
	Route::post('next-question','Modules\Exam\ExamController@nextQuestion')->name('next.question');
	Route::get('score-card/{id}','Modules\Exam\ExamController@scoreCard')->name('score.card');


	Route::get('result_page','Modules\Exam\ExamController@result_page')->name('result_page');

	
	Route::post('submit-exam','Modules\Exam\ExamController@submitExam')->name('submit.exam');
	Route::post('select-option','Modules\Exam\ExamController@selectOption')->name('select.option');
	Route::get('merit-list/{id}','Modules\Exam\ExamController@meritList')->name('merit.list');

	//faq
	Route::get('/faq','Modules\Faq\FaqsController@viewFaq')->name('view.faq');


    Route::get('get-subjects/{course_id}','Modules\Exam\ExamController@getsubjects')->name('get-subjects');
    Route::post('filter-exam','Modules\Exam\ExamController@filterExam')->name('filter-exam');
    Route::get('take-exam/{exam_id}','Modules\Exam\ExamController@takeExam')->name('take-exam');
    Route::post('exam-question','Modules\Exam\ExamController@ExamQuestion')->name('exam-question');
	


});