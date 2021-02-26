<?php

namespace App\Pagination;

use Illuminate\Pagination\LengthAwarePaginator;

class Paginate
{
    public function __construct(LengthAwarePaginator $paginate)
    {
        return $paginate;
//        return view('pagination' , compact('paginate'));
    }


}