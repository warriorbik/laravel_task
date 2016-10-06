<?php

namespace App\Http\Controllers;

use App\Http\Models\Country;
use App\Http\Requests\ClientFormRequest;
use Illuminate\Routing\Controller as BaseController;
use CsvHelper;

class ClientController extends BaseController
{
    public function index()
    {
        $model = new Country;
        $countries = $model->all();

        return view('client.index', ['countries' => $countries]);
    }

    public function saveCsv(ClientFormRequest $req)
    {
        $helper = new CsvHelper;
        
        $csv = [];
        $isdob = 0;
        $educationMore = '';
        $posts = \Input::all();
        if (isset($posts) && count($posts) > 0 && !is_null($posts)) {
            foreach ($posts as $key => $post) {
                if ($key != '_token' && $key != 'education_name' && $key != 'education_passedyear' && $key != 'submit') {
                    if ($key == 'year' || $key == 'month' || $key == 'day') {
                        $isdob++;
                        if ($key == 'year') {
                            $dob = $post;
                        } else {
                            $dob .= '-'.$post;
                        }

                        if ($isdob == 3) {
                            array_push($csv, $dob);
                        }
                    } elseif ($key == 'mode_of_contact') {
                        if ($post != 'None') {
                            array_push($csv, $post.':'.$posts[strtolower($post)]);
                        } else {
                            array_push($csv, $post);
                        }
                    } else {
                        array_push($csv, $post);
                    }
                } elseif ($key == 'education_name') {
                    foreach ($posts['education_name'] as $k => $name) {
                        $educationMore .= 'Level:'.$name.', Passed Year:'.$posts['education_passedyear'][$k].'<br/>';
                    }

                    array_push($csv, $educationMore);
                }
            }
            //Writing to Csv file
            $writer = $helper->append(app_path().'/../csv/clients.csv');
            if ($writer->writeLine($csv)) {
                \Log::info('Client Added to Csv file.');
            } else {
                \Log::error('Client Couldnot be added.');

                //return \Redirect::to('/')->with('message', 'Client couldnot be added.Please Retry.');
            }

            $writer->close();

            //return \Redirect::to('/listClients')->with('message', 'Client added successfully.');
        }
    }

    public function showClients()
    {
        $helper = new CsvHelper;
        //Reading From the saved CSV file.
        $reader = $helper->open(app_path().'/../csv/clients.csv');

        return view('client.showCsv', ['reader' => $reader]);
    }
}
