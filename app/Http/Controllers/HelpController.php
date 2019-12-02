<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function vehicleRequirments()
    {
    	return view('help/vehicle_requirements');
    }

    public function driverRequirements()
    {
    	return view('help/driver_requirements');	
    }

    public function licenceRequirements()
    {
    	return view('help/licence_requirements');
    }    

    public function becomeDriver()
    {
    	return view('help/become_driver');
    }

    public function checkApplicationStatus()
    {
    	return view('help/check_application_status');
    }

    public function driverWelcomeKit()
    {
    	return view('help/driver_welcome_kit');	
    }

    public function insuranceRequirement()
    {
    	return view('help/insurance_requirement');
    }

    public function insurancePolicy()
    {
    	return view('help/insurance_policy');	
    }

    public function updateInsurance()
    {
    	return view('help/update_insurance');
    }

    public function photographInsurance()
    {
    	return view('help/photograph_insurance');	
    }

    public function accidentReport()
    {
    	return view('help/accident_report');	
    }

    public function reportDamage()
    {
    	return view('help/report_damage');
    }

    public function overviewRideIssue()
    {
    	return view('help/overview_ride_issue');	
    }

    public function breaksAndLimits()
    {
    	return view('help/breaks_and_limits');
    }

    public function ensurePassengerSafety()
    {
    	return view('help/ensure_passenger_safety');	
    }

    public function driverSafetyInfo()
    {
    	return view('help/driver_safety_info');	
    }

    public function albamaDriverInfo()
    {
    	return view('help/albama_driver_info');		
    }

    public function alaskaDriverInfo()
    {
    	return view('help/alaska_driver_info');
    }

    public function cityStateRequirementsOverview()
    {
    	return view('help/city_state_requirements_overview');
    }

    public function arizonaDriverInfo()
    {
    	return view('help/arizona_driver_info');
    }

    public function arkansasDriverInfo()
    {
    	return view('help/arkansas_driver_info');
    }

    public function californiaDriverInfo()
    {
    	return view('help/california_driver_info');
    }

    public function scheduledPickupDrivers()
    {
    	return view('help/scheduled_pickup_drivers');
    }

    public function lostFoundDrivers()
    {
    	return view('help/lost_found_drivers');	
    }

    public function desitinationModeGuide()
    {
    	return view('help/desitination_mode_guide');	
    }

    public function handleMissedRequestsGuide()
    {
    	return view('help/handle_missed_requests_guide');
    }

    public function hearingDriverFuture()
    {
        return view('help/hearing_driver_future');	
    }

    public function wrongPassengerPickup()
    {
    	return view('help/wrong_passenger_pickup'); 
    }

    public function veroDriverApp()
    {
    	return view('help/vero_driver_app'); 
    }

    public function giveRideGuide()
    {
        return view('help/give_ride_guide');
    }

    public function getRideGuide()
    {
    	return view('help/get_ride_guide');
    }

    public function navigateRide()
    {
    	return view('help/navigate_ride');
    }

    public function changeNavigationSettings()
    {
    	return view('help/change_navigation_settings');
    }

    public function callPassengerGuide()
    {
    	return view('help/call_passenger_guide');
    }

    public function coverageAreas()
    {
    	return view('help/coverage_areas');
    }

    public function cancellingPolicyDrivers()
    {
    	return view('help/cancelling_policy_drivers');
    }

    public function driversPrimeTime()
    {
    	return view('help/drivers_prime_time');
    }

    public function tollForDrivers()
    {
    	return view('help/toll_for_drivers');
    }

    public function usTollsList()
    {
    	return view('help/us_tolls_list');
    }

    public function veroRideType()
    {
    	return view('help/vero_ride_type');
    }

    public function preMatchingSharedRides()
    {
    	return view('help/pre_matching_shared_rides');
    }

    public function becomeVeroXLDriver()
    {
    	return view('help/become_vero_xl_driver');
    }


}
