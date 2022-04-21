<?php

namespace App\Http\Controllers;

use App\Services\MovieService;
use Illuminate\Http\Request;

class LiveSearchController extends Controller
{

    protected $movies;

    /**
     * initialization function
     */
    public function __construct()
    {
        $this->movies = new MovieService();
    }

    /**
     * Handle search live
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory|void
     */
    public function HandleLiveSearch(Request $request)
    {
        $domain = url()->to('/');
        if ($request->ajax()) {
            $output = '';
            $movies = $this->movies->getMovieSearch($request->search);
            if ($movies) {
                foreach ($movies as $movie) {
                    $output .= "
                        <div class=\"search-item\">
                            <a href=\" $domain/show/$movie->id\">
                                <img width=\"70\" src=\"$domain/images/$movie->image\" >
                                <span>$movie->title</span>
                            </a>
                        </div>
                    ";
                }
            }
            return Response($output);
        }
    }
}