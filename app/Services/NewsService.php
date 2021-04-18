<?php
namespace App\Services;

use ArrayObject;
use App\Models\News;
use App\Http\Filter\NewsFilter;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsService{

    public $newsCollection;
    public function __construct(FileJsonService $fileJsonService) {
        $this->newsCollection = collect($fileJsonService->read())
                                ->values()
                                ->collapse()
                                ->map(function($news){
                                    $news = (object) $news;
                                    return (new News($news))->getItems();
                                    // return $news;
                                });
    }
    public function search(NewsFilter $filter)
    {
        return News::Filter($filter , $this);
    }


            /**
     * Gera a paginação dos itens de um array ou collection.
    *
    * @param array|Collection      $items
    * @param int   $perPage
    * @param int  $page
    * @param array $options
    *
    * @return LengthAwarePaginator
    */
    public function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);
        $newArray = [];
        foreach ($items->all() as $key => $value) {
            $newArray[] = $value;
        }
        $items = collect($newArray);
        
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}