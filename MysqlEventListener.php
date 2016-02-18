<?php

namespace App\Listeners;

use App\Events\SomeEvent;
use Illuminate\Queue\Listener;
use Illuminate\Support\Facades\Log;

class MysqlEventListener extends Listener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SomeEvent  $event
     * @return void
     */
    public function handle($sql,$params)
    {
        if (env('APP_ENV', 'production') == 'local') {
            foreach ($params as $index => $param) {
                if ($param instanceof DateTime) {
                    $params[$index] = $param->format('Y-m-d H:i:s');
                }
            }
            $sql = str_replace("?", "'%s'", $sql);
            array_unshift($params, $sql);
            Log::info(call_user_func_array('sprintf', $params));
        }
    }
}
