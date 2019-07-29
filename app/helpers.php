<?php

//function that fetches the ID of a video on youtube from its link
function getYoutubeID($url)
{
    $parts = parse_url($url);
    if(isset($parts['query'])){
        parse_str($parts['query'], $qs);
        if(isset($qs['v'])){
            return $qs['v'];
        }else if(isset($qs['vi'])){
            return $qs['vi'];
        }
    }
    if(isset($parts['path'])){
        $path = explode('/', trim($parts['path'], '/'));
        return $path[count($path)-1];
    }
    return false;
}

//function to get the thumbnail of medium quality of a video from its ID
if (!function_exists('getYoutubeThumbnail')) {
    function getYoutubeThumbnail($video_id)
    {
        $thumbnail = "http://img.youtube.com/vi/" . $video_id . "/maxresdefault.jpg";
        return $thumbnail;
    }
}

//video link from its ID
if (!function_exists('getYoutubeURL')) {
    function getYoutubeURL($video_id)
    {
        $url = "https://www.youtube.com/watch?v=" . $video_id ;
        return $url;
    }
}



