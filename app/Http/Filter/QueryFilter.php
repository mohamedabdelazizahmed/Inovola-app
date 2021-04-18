<?php
namespace App\Http\Filter;

use Illuminate\Http\Request;
use App\Services\NewsService;


abstract class QueryFilter
{
    protected $request;
    public $newsService;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply(NewsService $newsService)
    {
        // dd($newsService->newsCollection->all());
        $this->newsService = $newsService;
        foreach ($this->filters() as $name => $value) {
            # ['foo' =>'bar' ,'length' =>'desc']
            if (method_exists($this, $name)) {
                # $this->$name($value);
                call_user_func_array([$this, $name], array_filter([$value]));
            }
        }
        // dd($newsService->newsCollection);
        // return $this->paginate($newsService->newsCollection , 9);
        return $newsService->newsCollection;
    }


    public function filters()
    {
        return $this->request->all();
    }


}