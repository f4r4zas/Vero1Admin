<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\vero_products_csv;

class CsvController extends Controller
{
    public function index() {
        
        return view('admin.csv.index');
        
    }
    
    public function process() {
        
        return view('admin.csv.process');
        
    }
    
    public function processCsv(Request $request) {
        
        $requestData = $request->all();
        
        if(!empty($requestData)) {
         
            $csvFile = $requestData['q'];
            
            $startLimit = $requestData['start_from'];
            $endLimit = $requestData['start_to'];
            $store_name = $requestData['store'];
            $enteredCat = $requestData['category'];
            
            $csvData = $this->readCsvFile($csvFile, $startLimit, $endLimit, $store_name, $enteredCat);
			
            if(count($csvData) > 0) {
			
				foreach($csvData as $key=>$value) {
				//dd($value);
				vero_products_csv::unguard();
				vero_products_csv::create($value);
				
				}
			}
			
			return redirect('admin/csv');;   
			
        }
        
    }
    
    private function readCsvFile($filename, $startLimit, $endLimit, $store_name, $enteredCat) {
        
       $array = $fields = array(); $i = 0; 
        
       $filePath = base_path()."/csv/".$filename;
       
       $handle = @fopen($filePath, "r");
	   //$fields = ["s.no","main_category","sub_category","sub_third_category","name","color","drawing","price","image_url","description","second_last","last"];
       
        if ($handle) {
            while (($row = fgetcsv($handle)) !== false) {
                if (empty($fields)) {
					//dd($row);
                    //$fields = ["s.no","main_category","sub_category","sub_third_category","name","size","weight","price","image_url","description","second_last","last"];
                    $fields = $row;
					continue;
                }
                foreach ($row as $k=>$value) {
                    
                    if( $i==$startLimit || $i < $endLimit )
                    {
						
                        //$array[$i]['entered_store_name'] = $store_name;
                        //$array[$i]['entered_store_cat'] = $enteredCat;
						
                        $array[$i][$fields[$k]] = $value;
                      //  dd($array[$i][$fields[$k]]);
                    }
                    
                }
                $i++;
            }
            if (!feof($handle)) {
                echo "Error: unexpected fgets() fail\n";
            }
            fclose($handle);
        }
        
        return $array;
    }
}
