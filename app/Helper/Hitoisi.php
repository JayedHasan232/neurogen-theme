<?php
use App\Models\SiteInfo as Info;

if(!function_exists('logo')){

    function logo()
    {
        return asset('storage/' . Info::find(1)->logo);        
    }
}

if(!function_exists('readingTime')){

    function readingTime( $data = '' )
    {
        $totalWords = str_word_count( strip_tags( $data ) );
        $avgRead = 275;
        $timeToRead = $totalWords / $avgRead;
        return round( $timeToRead, 2 );
    }
}