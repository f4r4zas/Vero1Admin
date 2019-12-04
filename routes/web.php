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
//use Auth;
//Check commit

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'uses' => 'uses'], function(){


});



Route::get('/driver-register', 'Registration@index');
Route::get('/driver-register/{id}', 'Registration@index');

Route::post('/driver-register', 'Registration@registrationStep1');
Route::get('/basic-mail', 'Registration@basic_email');


Route::post('/driver-register/2', 'Registration@registrationStep2');
Route::post('/driver-register/3', 'Registration@registrationStep3');

Route::post('password-reset', 'Auth\ResetPasswordController@reset')->name('password-reset');

Route::post('/get_city', 'common_functions\LocationData@USCities');


// Auth::routes();

Route::get('driver-login', [
  'as' => 'driver-login',
  'uses' => 'Auth\LoginController@driverLoginForm'
]);
Route::post('driver-login', [
  'as' => '',
  'uses' => 'Auth\LoginController@authenticateDriver'
]);

Route::get('login', [
  'as' => 'login',
  'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('login', [
  'as' => '',
  'uses' => 'Auth\LoginController@authenticateAdmin'
]);
Route::get('logout', [
  'as' => 'logout',
  'uses' => 'Auth\LoginController@logout'
]);

// Password Reset Routes...
Route::post('password/email', [
  'as' => 'password.email',
  'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
]);
Route::get('password/reset', [
  'as' => 'password.request',
  'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
]);
Route::post('password/reset', [
  'as' => '',
  'uses' => 'Auth\ResetPasswordController@reset'
]);
Route::get('password/reset/{token}', [
  'as' => 'password.reset',
  'uses' => 'Auth\ResetPasswordController@showResetForm'
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/get-pricing', 'Pricing@calculatePricing');

Route::get("/reset-password",'customPasswordReset@sendEmail');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/faq', 'Commons@faq')->name('home');
Route::get('/how-it-works', 'Commons@how')->name('home');
Route::get('/about-us', 'Commons@about');
Route::get('/coverage', 'Commons@coverage');
Route::get('/service', 'Commons@service');
Route::get('/terms', 'Commons@terms');
Route::get('/help', 'Commons@help');
Route::get('/pricing', 'Commons@pricing');
Route::get('/insurace', 'Commons@insurance');
Route::get('/driver-store', 'Commons@driverStore');

Route::get('/privacy', 'Commons@privacy');
Route::get('/career', 'Commons@career');
Route::get('/partner', 'Commons@partner');

Route::get('/user_profile', 'Users@viewProfile');

Route::get('/test', 'Registration@test');


/* ====================================== ADMIN ====================================== */

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){


  // Registration Routes...
  Route::get('register', 'Auth\RegisterController@showRegistrationForm');

  Route::post('register', 'Auth\RegisterController@register');

	Route::get('/', 'admin\Pages@index');

	Route::get('/users', 'admin\Pages@users');

  Route::get('/riders', 'admin\UserDetails@riders');

  Route::get('/drivers', 'admin\UserDetails@drivers');

  Route::get('/details/{id}', 'admin\UserDetails@details');

  Route::get('/driver-details/{id}', 'admin\UserDetails@driverDetails');

  Route::post('/driver-details/{id}', 'admin\UserDetails@approveDriver');

  Route::get('/configs', 'admin\UserDetails@settings');

  Route::post('/configs', 'admin\UserDetails@updateSettings');

  Route::get('/dispute', 'admin\UserDetails@disputes');

  Route::get('/dispute-details/{id}', 'admin\UserDetails@disputeDetails');

  Route::post('/dispute-details/{id}', 'admin\UserDetails@disputeDetails');

	Route::get('/pages', 'admin\Pages@pages')->name("admin.pages");

	Route::get('/createPage', 'admin\Pages@createPage')->name("admin.create");

	Route::post('/insertPage', 'admin\Pages@pageInsert')->name("insert-page");

	Route::post('/removePage', 'admin\Pages@pageRemove')->name("remove-page");

	Route::post('/editPage', 'admin\Pages@pageUpdateView')->name("edit-page");

	Route::post('/updatePage', 'admin\Pages@pageUpdate')->name("update-page");

  Route::get('/rides', 'admin\UserDetails@rides');

  Route::get('/create-promo-codes', 'admin\PromoManagementController@index');

  Route::post('/create-promo-codes', 'admin\PromoManagementController@index');

  Route::get('/promo-codes', 'admin\PromoManagementController@promoList');

  Route::get('/expire-promo/{id}', 'admin\PromoManagementController@expirePromo');

  Route::get('/delete-promo/{id}', 'admin\PromoManagementController@deletePromo');

  Route::get('/edit-promo/{id}', 'admin\PromoManagementController@editPromo');

  Route::post('/edit-promo/{id}', 'admin\PromoManagementController@editPromo');

  Route::get('/purchases', 'admin\RidesController@pickupService');
  
  Route::get('/csv', 'admin\CsvController@index');
  
  Route::get('/process-csv', 'admin\CsvController@process');
  
  Route::post('/process-csv', 'admin\CsvController@processCsv');

});

/* ================================= Driver ========================================== */

Route::group(['prefix' => 'driver', 'middleware' => 'auth:user_driver'], function(){
  
    Route::get('/', 'driver\DriverController@index');
    
    Route::get('/configs', 'driver\DriverController@configs');
    
    Route::get('/change-password', 'driver\DriverController@changePassword');
    
    Route::post('/change-password', 'driver\DriverController@changePassword');    
    
    Route::get('/stripe', 'driver\DriverController@stripeConnect');    

});

Route::group( ['prefix' => 'help'], function(){

  Route::get('/vehicle-requirements', 'HelpController@vehicleRequirments');

  Route::get('/driver-requirements', 'HelpController@driverRequirements');

  Route::get('/licence-requirements', 'HelpController@licenceRequirements');

  Route::get('/become-driver', 'HelpController@becomeDriver');

  Route::get('/application-status', 'HelpController@checkApplicationStatus');

  Route::get('/driver-welcome-kit', 'HelpController@driverWelcomeKit');

  Route::get('/insurance-requirement', 'HelpController@insuranceRequirement');

  Route::get('/insurance-policy', 'HelpController@insurancePolicy');

  Route::get('/update-insurance', 'HelpController@updateInsurance');

  Route::get('/photograph-insurance', 'HelpController@photographInsurance');

  Route::get('/accident-report', 'HelpController@accidentReport');

  Route::get('/report-damage', 'HelpController@reportDamage');

  Route::get('/overview-ride-issue', 'HelpController@overviewRideIssue');

  Route::get('/breaks-and-limits', 'HelpController@breaksAndLimits');

  Route::get('/ensure-passenger-safety', 'HelpController@ensurePassengerSafety');

  Route::get('/driver-safety-info', 'HelpController@driverSafetyInfo');

  Route::get('/albama-driver-info', 'HelpController@albamaDriverInfo');

  Route::get('/alaska-driver-info', 'HelpController@alaskaDriverInfo');

  Route::get('/city-state-requirements-overview', 'HelpController@cityStateRequirementsOverview');

  Route::get('/arizona-driver-info', 'HelpController@arizonaDriverInfo');

  Route::get('/arkansas-driver-info', 'HelpController@arkansasDriverInfo');

  Route::get('/california-driver-info', 'HelpController@californiaDriverInfo');

  Route::get('/scheduled-pickup-drivers', 'HelpController@scheduledPickupDrivers');

  Route::get('/lost-found-drivers', 'HelpController@lostFoundDrivers');

  Route::get('/desitination-mode-guide', 'HelpController@desitinationModeGuide');

  Route::get('/handle-missed-requests-guide', 'HelpController@handleMissedRequestsGuide');

  Route::get('/hearing-driver-future', 'HelpController@hearingDriverFuture');

  Route::get('/wrong-passenger-pickup', 'HelpController@wrongPassengerPickup');

  Route::get('/vero-driver-app', 'HelpController@veroDriverApp');

  Route::get('/give-ride-guide', 'HelpController@giveRideGuide');

  Route::get('/get-ride-guide', 'HelpController@getRideGuide');

  Route::get('/change-navigation-settings', 'HelpController@changeNavigationSettings');

  Route::get('/call-passenger-guide', 'HelpController@callPassengerGuide');

  Route::get('/coverage-areas', 'HelpController@coverageAreas');

  Route::get('/cancelling-policy-drivers', 'HelpController@cancellingPolicyDrivers');

  Route::get('/drivers-prime-time', 'HelpController@driversPrimeTime');

  Route::get('/toll-for-drivers', 'HelpController@tollForDrivers');

  Route::get('/us-tolls-list', 'HelpController@usTollsList');

  Route::get('/vero-ride-type', 'HelpController@veroRideType');

  Route::get('/pre-matching-shared-rides', 'HelpController@preMatchingSharedRides');

  Route::get('/become-vero-xl-driver', 'HelpController@becomeVeroXLDriver');

});

Route::get('/{page}', 'Commons@dynamicPages');
