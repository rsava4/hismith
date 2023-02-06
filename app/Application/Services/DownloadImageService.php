<?php

namespace App\Application\Services;

use Storage;
use Log;

final class DownloadImageService
{    
    /**
     * run Скачивает и сохраняет изображение из элемента фида на диск
     *
     * @param  \SimpleXMLElement $item
     * @return string
     */
    public static function run(\SimpleXMLElement $item):string
    {
        $link = self::getFirstImageUrl($item);
        $image = '';
        if (empty($link)) return $image;

        try{
            $image = 'images/' . basename($link);
            if(!Storage::disk('public')->exists($image)) {
                $remoteImage = file_get_contents($link);
                Storage::disk('public')->put($image, $remoteImage);
            }
        }catch(\Exception $e){
            Log::error($e->getMessage());
        }
        return $image;
    }

    /**
     * getFirstImage Выбирает первое изображение если их несколько
     * 
     * @param  \SimpleXMLElement $item
     * @return string
     */
    private function getFirstImageUrl(\SimpleXMLElement $item):string
    {
        $validMimes = ['image/jpeg', 'image/png', 'image/gif'];
        $image = '';
        if(!$item->enclosure) return $image;
        if(is_array($item->enclosure)){
            foreach($item->enclosure as $media){
                if(in_array($item->enclosure->attributes()->type, $validMimes)){
                    $image = $media->attributes()->url;
                    break;
                }
            }
        }else{
            if(in_array($item->enclosure->attributes()->type, $validMimes)) {
                $image = $item->enclosure->attributes()->url;
            }
        }
        return $image;
    }

}