<?php

namespace App\Http\Controllers;

use App\Http\Filter\NewsFilter;
use App\Services\NewsService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public $newsService;
    public function __construct(NewsService $newsService) {
        $this->newsService = $newsService;
    }
    public function index(NewsFilter $filter)
    {
        // $json  = $this->getContent();
        // return collect($json)->values()->collapse();
        $result = $this->newsService->search($filter);
        // dd($result);
        
        return $this->newsService->paginate($result ,3);

    }

}
