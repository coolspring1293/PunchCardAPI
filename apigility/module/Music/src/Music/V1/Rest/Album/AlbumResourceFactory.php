<?php
//namespace Music\V1\Rest\Album;
//
//class AlbumResourceFactory
//{
//    public function __invoke($services)
//    {
//        return new AlbumResource();
//    }
//}
//

namespace Music\V1\Rest\Album;

class AlbumResourceFactory
{
    public function __invoke($services)
    {
        $mapper = $services->get('Music\V1\Rest\Album\AlbumMapper');
        return new AlbumResource($mapper);
    }
}