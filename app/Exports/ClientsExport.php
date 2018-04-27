<?php
/**
 * Created by PhpStorm.
 * User: it
 * Date: 4/27/18
 * Time: 2:53 PM
 */



namespace App\Exports;
use \App\Client;
use Maatwebsite\Excel\Concerns\FromCollection;


class ClientsExport implements FromCollection
{
        public function collection()
        {
            return Client::all();
        }
}