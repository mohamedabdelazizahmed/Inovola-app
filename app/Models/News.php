<?php

namespace App\Models;

use App\Http\Filter\QueryFilter;
use App\Services\NewsService;
use App\Services\NewsService as AppNewsService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use DateTime;

class News 
{
    use HasFactory;

    public $items;
    
    public function __construct($items) {
        $this->items = $items;
        $this->dateTime();
        // $this->setRatingNumber($this->items['rating']);
        $this->setRatingNumber($this->items->rating);

    }

    public function rating()
    {
        // dd($this->items["rating"]);
        // // dd($this->items->rating);
        // return  $this->items->rating ;
    }

    public function dateTime()
    {
        // dd($this->items["datetime"]);
        // $date = Carbon::createFromFormat("D, d M y H:i:s O", $this->items["datetime"])->format('d M Y');;
        // $this->items["datetime"] = new Carbon(new DateTime($this->items["datetime"]));
        // dd($this->items->datetime);
        // $this->items->datetime = new DateTime($this->items->datetime);
        $this->items->datetime = Carbon::parse($this->items->datetime);

        // dd($this->items->datetime);

    }

    public function setRatingNumber($value)
    {
        // $this->items['rating_number'] = (int) str_split($value)[0];
        $this->items->rating_number = (int) str_split($value)[0];

    }


    /**
     * Filter a result set.
     */
    // public static function Filter( QueryFilter $filters, NewsService $newsService)
    public static function Filter( QueryFilter $filters, NewsService $newsService)
    {
        return $filters->apply($newsService);
    }

    function __get($property){ 
        //$prodCat->doesn'tExists
        if(isset($this->items->$property)){
            return $this->items->property;
        } 
        throw new \exception('unknown property access');
    }

    public function getItems()
    {
        return $this->items;
    }
}
