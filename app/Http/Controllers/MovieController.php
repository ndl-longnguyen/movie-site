<?php

namespace App\Http\Controllers;

use App\Events\FormSubmited;
use App\Http\Requests\PostMovie;
use App\Http\Requests\PostUpdateMovie;
use App\Services\CommentService;
use App\Services\MovieService;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    private $movie;

    private $comment;

    /**
     * Initialize movie object
     */
    public function __construct()
    {
        $this->movie = new MovieService();
        $this->comment = new CommentService();
    }

    /**
     * Show dashboard admin with defautl table movies
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory admins.movies.dashboard-movie
     */
    public function index()
    {
        $movies = $this->movie->getAllMovie(4);
        return view('admins.movies.dashboard-movie', compact('movies'));
    }

    /**
     * Show details of movie
     * @param int $id
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory users.movie-detail
     */
    public function showMovieDetail($id)
    {
        $movie = $this->movie->getDetailMovie($id);
        ($movie->isEmpty()) ? $movie = [] : $movie =  $movie[0];
        return view('users.movie-detail', compact('movie'));
    }

    /**
     * Show home movies
     * @return view && newMovies - hotMovies - movieTrending
     */
    public function showMovieHome()
    {
        $movies = $this->movie->getAllMovie(8);
        $newMovies = $this->movie->getNewMovie();
        $hotMovies = $movieTrending = $this->movie->getTrendingMovie();

        return view('users.movie-home', compact('movies', 'newMovies', 'hotMovies', 'movieTrending'));
    }

    /**
     * show home movie list
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory users.movie-list
     */
    public function showAllMovie()
    {
        $movies = $this->movie->getAllMovie(24);
        return view('users.movie-list', compact('movies'));
    }

    /**
     * Process data from form request to add movie
     * @param Illuminate\Http\Request $request
     * @return newListMovie
     */
    public function addMovie(PostMovie $request)
    {
        $request->validated();

        $fileName = $request->image->getClientOriginalName();
        uploadFile($request->image, 'images');

        $videoName = $request->video->getClientOriginalName();
        uploadFile($request->video, 'videos');

        $data = $request;

        $insertMovie = $this->movie->insertMovie($data, $fileName, $videoName);

        ($insertMovie) ? $smg = __('message.add.success', ['obj' => 'movie']) : $smg = __('message.add.fail', ['obj' => 'movie']);

        return redirect()->route('admin.show-dashboard-movie')->with('smg', $smg);
    }

    /**
     * Process data from user to delete movie
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteMovie($id)
    {
        $deletemovie = $this->movie->deleteMovie($id);
        ($deletemovie) ? $smg = __('message.delete.success', ['obj' => 'movie']) : $smg = __('message.delete.fail', ['obj' => 'movie']);
        return back()->with('smg', $smg);
    }

    /**
     * Show form update with data from user request
     * @param int $id
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse
     */
    public function showUpdateMovie($id = 0)
    {
        $movie = $this->movie->getDetailMovie($id);

        if (empty($movie[0])) {
            return back()->with('smg', __('message.movie.no'));
        }

        $movie = $movie[0];
        session()->put('id_movie', $id);

        return view('admins.movies.update-movie', compact('movie'));
    }

    /**
     * Show form view movie with data from user request
     * @param int $id
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse
     */
    public function viewMovie($id = 0)
    {
        $movie = $this->movie->getDetailMovie($id);

        $comments = $this->comment->getComment($id);
        if (empty($movie[0])) {
            return back()->with('smg', __('message.movie.no'));
        }
        $movie = $movie[0];
        return view('users.movie-view', compact('movie', 'comments'));
    }

    /**
     *Process data from form request to update movie
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateMovie(PostUpdateMovie $request)
    {
        $request->validated();

        $id = session('id_movie');

        $movie = $this->movie->getDetailMovie($id);

        if ($movie) {
            $movie = $movie[0];
        } else {
            return back()->with('smg',  __('message.movie.no'));
        }

        if ($request->image == "") {
            $fileName = $movie->image;
        } else {
            $fileName = $request->image->getClientOriginalName();
            uploadFile($request->image, 'images');
        }

        if ($request->video == "") {
            $videoName = $movie->video;
        } else {
            $videoName = $request->video->getClientOriginalName();
            uploadFile($request->video, 'videos');
        }

        $data = $request;

        $updatetMovie = $this->movie->updateMovie($data, $id, $fileName, $videoName);

        ($updatetMovie) ? $smg = __('message.update.success', ['obj' => 'movie']) : $smg = __('message.update.fail', ['obj' => 'movie']);

        return back()->with('smg', $smg);
    }

    /**
     *Handle realtime views and add to DB
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function handleAddViews(Request $request)
    {
        $id = $request->id;

        $this->movie->addViewsMovie($id);

        event(new FormSubmited($this->movie->getViewsMovie($id)));

        return Response();
    }
}