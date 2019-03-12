<?php

use DB;


/*for ($i=0; $i < 60*7; $i++) { 
    sleep(7);
    
}*/

DB::table('transport_info')->insert(
    ['name' => "cron", 'number' => 0, "date" => time(), "way" => "cron", "minput" => 0]
);
