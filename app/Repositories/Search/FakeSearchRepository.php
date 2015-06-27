<?php

namespace CompassHB\Www\Repositories\Search;

class FakeSearchRepository implements SearchRepository
{
    public function search($query)
    {
        $results['hits'] = [];

        return $results;
    }
}
