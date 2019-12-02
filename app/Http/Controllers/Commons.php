<?php

namespace App\Http\Controllers;



class Commons extends Controller
{

   public function faq(){
        return view('faq');
    }

    public function how(){
        return view('how_it_work');
    }

    public function coverage(){
        return view("coverage");
    }

    public function about(){
        return view("about-us");
    }

    public function service(){
        return view("service");
    }

    public function terms(){
        return view("terms");
    }

    public function help(){
        return view("help");
    }

    public function pricing(){
        return view("pricing");
    }

    public function insurance(){
        return view("insurance");
    }

    public function privacy(){
        return view("privacy");
    }

    public function career(){
     return view("careers");   
    }

    public function partner(){
        return view("partner");
    }

    public function driverStore(){
        return view("driver-store");
    }
	
    public function dynamicPages($page){

        $client = new \MongoDB\Client("mongodb://ec2-54-174-240-101.compute-1.amazonaws.com:27017");
        $collection = $client->vero->pages;

        $data["trac"] = "update";
        $data["page_slug"] = $page;

        $update = $collection->findOne(array("page_slug"=>$data['page_slug']));

        if($update){
                return view("template")->with(array("content"=>$update->page_description));
        }else{
            echo "Not found";
        }

    }

}
	?>