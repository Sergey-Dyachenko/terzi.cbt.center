<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use DB;
use App\Client;

class ExcelController extends Controller
{
    //
    public function importExportView(){
        return view('home');
    }

    public function importFile(Request $request){
        if ($request->hasFile('sample_file')){
            $path = $request->file('sample_file')->getRealPath();
            $data = Excel::load($path)->get();

            if ($data->count()){
                foreach ($data as $key => $value){
                    $arr[] = ['id' => $value->id, 'name' => $value->name, 'email' => $value->email,
                        'phone' => $value->phone, 'city' => $value->city, 'company' => $value->company,
                        'comments' => $value->comments, 'created_at' => $value->created_at];
                }
            if (!empty($arr)){
                    DB::table('clients')->insert($arr);
                    dd('Insert Recorded successfully');
            }

            }
        }
       dd('Request data does not have any files to import');

    }

    public function exportFile($type){
        $clients = Client::get()->toArray();

        return Excel::download('clients_doc', function($excel) use ($clients){
            $excel->sheet('Sheet1', function ($sheet) use ($clients)
            {
                $sheet->fromArray($clients);
            });
        })->download($type);
    }



}
