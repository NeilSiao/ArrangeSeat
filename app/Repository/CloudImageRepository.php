<?php 
namespace App\Repository;

use App\Models\Room;
use Illuminate\Support\Facades\Auth;



class CloudImageRepository{    

    public function storeImg($image, $apiInfo)
    {
        $image->public_id = $apiInfo['public_id'];
        $image->asset_id = $apiInfo['asset_id'];
        $image->version = $apiInfo['version'];
        $image->version_id = $apiInfo['version_id'];
        $image->signature = $apiInfo['signature'];
        $image->bytes = $apiInfo['bytes'];
        $image->resource_type = $apiInfo['resource_type'];
        $image->created_at = $apiInfo['created_at'];
        $image->tags = implode(',', $apiInfo['tags']);
        $image->etag = $apiInfo['etag'];
        $image->url = $apiInfo['url'];
        $image->secure_url = $apiInfo['secure_url'];
        
    }
}