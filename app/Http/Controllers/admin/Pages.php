<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use MongoId;

class Pages extends Controller{

	public function __construct()
    {
       // $this->middleware('auth');
    }

    public function index(){
    	return view("admin.dashboard");
    }

    public function users(){

    	$client = new \MongoDB\Client("mongodb://ec2-54-174-240-101.compute-1.amazonaws.com:27017");
        $collection = $client->vero->users;
        $collectionData = $collection->find();

    	return view("admin.user")->with('users',$collectionData);
    }

    public function pages(){


        $client = new \MongoDB\Client("mongodb://ec2-54-174-240-101.compute-1.amazonaws.com:27017");
        $collection = $client->vero->pages;
        $collectionData = $collection->find();

        return view("admin.pages")->with('pages',$collectionData);

    }

    public function createPage(){

        return view("admin.page_create")->with(array("trac"=>"insert"));
    }

    public function pageInsert(Request $request){

        $client = new \MongoDB\Client("mongodb://ec2-54-174-240-101.compute-1.amazonaws.com:27017");
        $collection = $client->vero->pages;


        $makeSlug =  str_replace(" ", "-", $request->input("page_title"));


        $document = array(
          "page_title" => $request->input("page_title"),
          "page_description" => $request->input("page_description"),
          "page_short_desc" => $request->input("page_short_desc"),
          "page_slug" => $makeSlug,
          "status" => $request->input("status")
        );

        $dublicate = $collection->findOne(array("page_slug"=>$makeSlug));

        if($dublicate){
            return redirect(route("admin.create"))->with('error', ['Dublicate Page!!'])->withInput();
        }else{
            $result = $collection->insertOne($document);
            return redirect(route("admin.pages"))->with('success', ['Page created successfully!!']);
        }

/*        $result = $collection->insertOne($document);  */


    }

    public function pageRemove(Request $request){

        $client = new \MongoDB\Client("mongodb://ec2-54-174-240-101.compute-1.amazonaws.com:27017");
        $collection = $client->vero->pages;

        if($request->input("id")){
             $collection->deleteOne( array( '_id' =>new  \MongoDB\BSON\ObjectId($request->input("id") )) );
             return redirect(route("admin.pages"))->with('success', ['Page removed successfully!!']);
        }else{
             return redirect(route("admin.pages"))->with('error', ['Error!!']);
        }

    }

    public function pageUpdateView(Request $request){

        $client = new \MongoDB\Client("mongodb://ec2-54-174-240-101.compute-1.amazonaws.com:27017");
        $collection = $client->vero->pages;

        $data["trac"] = "update";
        $data["page_slug"] = $request->input("page_slug");

        print_r($data["page_slug"]);

        $update = $collection->findOne(array("page_slug"=>$data['page_slug']));

        $data["data"] = $update;
        if($update){
             return view("admin.page_create")->with($data);
        }else{
             return redirect(route("admin.pages"))->with('error', ['Error invalid page!!']);
        }

    }

    public function pageUpdate(Request $request){

        $client = new \MongoDB\Client("mongodb://ec2-54-174-240-101.compute-1.amazonaws.com:27017");
        $collection = $client->vero->pages;


         $document = array(
          "page_title" => $request->input("page_title"),
          "page_description" => $request->input("page_description"),
          "page_short_desc" => $request->input("page_short_desc"),
          "status" => $request->input("status")
        );

        $page_slug = $request->input("page_slug");

        if($page_slug){
            /*$result = $collection->updateOne(array("_id"=>new \MongoDB\BSON\ObjectId("5bbe540d56c7c72d20000cd7")),array("$set"=>$document ));*/

            $collection->updateOne(array("page_slug"=>$page_slug),array('$set' => $document));

            return redirect(route("admin.pages"))->with('success', ['Page updated successfully!!']);
        }else{

            return redirect(route("admin.pages"))->with('error', ['Error page slug not found!!']);
        }

    }
}


?>
