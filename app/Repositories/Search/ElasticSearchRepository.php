<?php

namespace CompassHB\Www\Repositories\Search;

use Log;
use SearchIndex;

class ElasticSearchRepository implements SearchRepository
{
    public function search($query)
    {
        $queryArray = [
            'body' => [
                'from' => 0,
                'size' => 10,
                'query' => [
                    'fuzzy_like_this' => [
                        '_all' => [
                            'like_text' => $query,
                            'fuzziness' => 0.3,
                        ],
                    ],
                ],
            ],
        ];

        try {
            $results = SearchIndex::getResults($queryArray);
        } catch (\Exception $e) {
            Log::warning('Connection refused to search provider');

            $results = ['hits' => ['hits' => []]];
        }

        return $results;
    }
}
