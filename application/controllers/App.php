<?php

/*
 * Created by Amah Gift (codedgift)
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data["status"] = "";
        $data["check"] = "";
        $data["display"] = "";

        $this->form_validation->set_rules("bvnNum", "BVN", 'required|trim');

        if ($this->form_validation->run()) {

            $bvn = $this->input->post('bvnNum');
            $key = "FLWSECK-c9096765ea727d998e41ab5902fad61d-X";

            //-------------- API CALL BEGINS -----------------------------------//

            $url = "https://ravesandboxapi.flutterwave.com/v2/kyc/bvn/" . $bvn . "?seckey=" . $key . "";

            // Get cURL resource
            $curl = curl_init();

            // Set some options - we are passing in a useragent too here
            curl_setopt_array($curl, [
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $url
            ]);

            // Send the request & save response to $resp
            $response = curl_exec($curl);

            // Close request to clear up some resources
            curl_close($curl);
            $json = json_decode($response, true);

            // Display Response
            $data["display"] = "<div class='alert alert-success'>You have successfully entered a valid BVN</div>";
            $data['display'] .= "<h3 style=font-weight: bold; margin-top: 2%;>BVN Details</h3>";
            $data["display"] .= "<p><span style='font-weight: bold;'>First Name</span> " . $json["data"]['first_name'] . "</p>";
            $data["display"] .= "<p><span style='font-weight: bold;'>Middle Name</span> " . $json["data"]['middle_name'] . "</p>";
            $data["display"] .= "<p><span style='font-weight: bold;'>Last Name</span> " . $json["data"]['last_name'] . "</p>";
            $data["display"] .= "<p><span style='font-weight: bold;'>Phone Number</span> " . $json["data"]['phone_number'] . "</p>";
            $data["display"] .= "<p><span style='font-weight: bold;'>Date of Birth</span> " . $json["data"]['date_of_birth'] . "</p>";
            $data["display"] .= "<p><span style='font-weight: bold;'>Entrollment Bank</span> " . $json["data"]['enrollment_bank'] . "</p>";
            $data["display"] .= "<p><span style='font-weight: bold;'>Enrollment Branch</span> " . $json["data"]['enrollment_branch'] . "</p>";

            //-------------- API CALL END -------------------------------------//
        }

        $this->load->view('verify_bvn', $data);
    }

    public function waveRide() {
        $data["status"] = "";
        
        if($this->input->post('destination')){
            echo $this->input->post('destination');
        }
       
        $this->load->view("wave_ride", $data);
        
    }
    
    public function ajaxRequest(){
        if($this->input->post('destination')){
            echo "Egbeda to ".$this->input->post('destination')." will cost #2000";
        }
    }

    
}
