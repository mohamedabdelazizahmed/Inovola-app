<?php
namespace App\Http\Filter;

class NewsFilter extends QueryFilter{
    function rating($status='asc')
    {
        if($status == 'desc'){

            $this->newsService->newsCollection = $this->newsService->newsCollection->sortByDesc('rating_number');
        }
        if ($status == 'asc') {
            $this->newsService->newsCollection = $this->newsService->newsCollection->sortBy('rating_number');
        }    
    }

    public function date($status='asc')
    {
        if($status == 'desc'){
            $this->newsService->newsCollection = $this->newsService->newsCollection->sortByDesc('datetime');
        }
        if ($status == 'asc') {
            $this->newsService->newsCollection = $this->newsService->newsCollection->sortBy('datetime');
        }
        
    }
}
