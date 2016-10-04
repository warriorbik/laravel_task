<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Http\Requests\ClientFormRequest;

class ClientController extends BaseController
{
    public function __construct() {
        //date_default_timezone_set('America/Toronto');
     
    }

    public function index()
    {
        $countries =\App\Http\Models\Country::all();
        return view('client.index',['countries'=>$countries]);
    }
    
    public function saveCsv(ClientFormRequest $request)
    {
        $csv= [];
        $isdob = 0;
        $educaion_more ='';
        $posts = \Input::all();
        if (isset($posts) && count($posts) > 0 && !is_null($posts)) {
            //Writing to Csv file
            $writer = \CsvWriter::create(app_path().'/../csv/clients.csv');
            foreach($posts as $key=>$post)
            {
                if($key!='_token' && $key!="education_name"&& $key!="education_passedyear" && $key !="submit")
                {
                    if($key=='year'||$key=='month'||$key=='day')
                    {
                        $isdob ++;
                        if($key=='year')
                            $dob = $post;
                        if($key=='month')
                            $dob .= "-".$post;
                        if($key=='day')
                            $dob .= "-".$post;
                    
                        if($isdob==3)
                        array_push($csv,$dob);   
                    }
                    elseif($key=='mode_of_contact')
                    {
                        if($post=='Phone')
                            array_push($csv,$post.":".$posts['phone']);  
                        elseif($post=='Email')
                            array_push($csv,$post.":".$posts['email']);
                        else
                            array_push($csv,$post);
                    }
                    else
                        array_push($csv,$post);
                }
                elseif($key=='education_name')
                {
                    
                    foreach($posts['education_name'] as $k=>$name)
                    {
                        
                        $educaion_more .= "Level:".$name.", Passed Year:".$posts['education_passedyear'][$k]."<br/>";
                    }
                    
                    array_push($csv,$educaion_more);
                }
                
                
            }
            $writer->writeLine($csv);
              
            $writer->close();
            \Log::info('Client is created successfully.');
            return \Redirect::to('/listClients')->with('message', 'Client added successfully.');   
    
        }
    }
    
    public function showClients()
    {
        //Reading From the saved CSV file.
        $reader = \CsvReader::open(app_path().'/../csv/clients.csv');
        return view('client.showCsv',['reader'=>$reader]);
        
    }
}

?>