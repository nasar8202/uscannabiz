<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UspsController extends Controller
{

    public function getUspsShippingRate(Request $request){
        $pounds = $request->get('pounds');
        $ounces = $request->get('ounces');
        $originZip = $request->get('originZip');
        $destZip = $request->get('destZip');
        $width = $request->get('width');
        $length = $request->get('length');
        $height = $request->get('height');

        $result = $this->USPS($pounds, $ounces, $originZip, $destZip, $width, $length, $height);
        echo "<pre>", print_r($result['data']);
    }

    private function USPS($pounds, $ounces, $originZip, $destZip, $width, $length, $height){

        $username = env('USPS_USERNAME');
        $url = "https://secure.shippingapis.com/ShippingAPI.dll";

        try{
            $ch = curl_init();

            // set the target url
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            // parameters to post
            curl_setopt($ch, CURLOPT_POST, 1);

            // You would want to actually build this xml using dimensions
            // and other attributes but this is a bare minimum request as
            // an example.
            $xml_post_string = "API=RateV4&XML=<RateV4Request USERID=\"{$username}\">
               <Revision>2</Revision>
               <Package ID=\"1ST\">
                  <Service>ALL</Service>
                  <ZipOrigination>{$originZip}</ZipOrigination>
                  <ZipDestination>{$destZip}</ZipDestination>
                  <Pounds>{$pounds}</Pounds>
                  <Ounces>{$ounces}</Ounces>
                  <Container />
                  <Width>{$width}</Width>
                  <Length>{$length}</Length>
                  <Height>{$height}</Height>
                  <Machinable>false</Machinable>
               </Package>
            </RateV4Request>";

            curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string);
            curl_setopt($ch, CURLOPT_HEADER, false);

            $response = curl_exec($ch);

            $xml = simplexml_load_string($response, "SimpleXMLElement", LIBXML_NOCDATA);
            $json = json_encode($xml);
            return array(
                'status'=> true,
                'data' => json_decode($json, TRUE)
            );
        }catch (\Exception $ex){
            return array(
              'status' => false,
              'data' => $ex->getMessage()
            );
        }
    }

}
