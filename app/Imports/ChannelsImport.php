<?php

namespace App\Imports;

use App\Models\Channel;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;


class ChannelsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
    
        $channels =  new Channel([
            'week' => $row['week'],
            'channel' => $row['channel'],
            'users' => $row['users'],
            'sessions' => $row['sessions'],
            'pageviews' => $row['pageviews'],
            'avg_order' => $row['ordervalue'],
            'transactions' => $row['transactions'],
            'revenue' => $row['revenue'],
            'bounce_rate' => $row['bouncerate'],
            'exit_rate' => $row['exitrate'],
            'page_value' => $row['pagevalue']
        ]);
       

    }

   
}
