<?php

namespace App\Services;

use App\Model\Movie;

class MovieService
{

    /**
     * Get list movies
     *
     * @param mixed $page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator listMovie
     */
    public function getAllMovie($page)
    {
        return Movie::paginate($page);
    }

    /**
     * Get list new movies
     *
     *  @return \Illuminate\Support\Collection listNewMovie
     */
    public function getNewMovie()
    {
        return Movie::orderBy('created_at', 'DESC')
            ->limit(8)
            ->get();
    }

    /**
     * Get list trending movies
     *
     *  @return \Illuminate\Support\Collection listTrendingMovie
     */
    public function getTrendingMovie()
    {
        return Movie::orderBy('view', 'DESC')
            ->limit(8)
            ->get();
    }

    /**
     * Get movie detail to id
     *
     * @param mixed $id
     * @return \Illuminate\Support\Collection movieDetail
     */
    public function getDetailMovie($id)
    {
        return Movie::where('id', $id)
            ->get();
    }

    /**
     * Add new movies to db
     *
     * @param mixed $data
     * @param mixed $fileName
     * @param mixed $videoName
     * @return bool
     */
    public function insertMovie($data, $fileName, $videoName)
    {

        $arr = [
            $data['title'],
            $data['director'],
            $data['performer'],
            $data['category'],
            $data['premiere'],
            $data['time'],
            $fileName,
            $videoName,
            date('Y-m-d H:i:s'),
        ];

        return Movie::insertGetId([
            'title' => $arr[0],
            'director' => $arr[1],
            'performer' => $arr[2],
            'category' => $arr[3],
            'premiere' => $arr[4],
            'time' => $arr[5],
            'image' => $arr[6],
            'video' => $arr[7],
            'created_at' => $arr[8]
        ]);
    }

    /**
     * Update movies with new data from users
     *
     * @param mixed $data
     * @param mixed $id
     * @param mixed $fileName
     * @param mixed $videoName
     * @return bool
     */
    public function updateMovie($data, $id, $fileName, $videoName)
    {
        $arr = [
            $data['title'],
            $data['director'],
            $data['performer'],
            $data['category'],
            $data['premiere'],
            $data['time'],
            $fileName,
            $videoName,
            date('Y-m-d H:i:s'),
        ];

        return Movie::where('id', $id)
            ->update([
                'title' => $arr[0],
                'director' => $arr[1],
                'performer' => $arr[2],
                'category' => $arr[3],
                'premiere' => $arr[4],
                'time' => $arr[5],
                'image' => $arr[6],
                'video' => $arr[7],
                'updated_at' => $arr[8]
            ]);
    }

    /**
     * Delete movies to id
     *
     * @param mixed $id
     * @return bool
     */
    public function deleteMovie($id)
    {
        $movie = Movie::find($id);
        if ($movie) {
            $movie->comments()->delete();
        }
        return  $movie->delete();
    }

    /**
     * Get movies when users enter keywords
     *
     * @param mixed $keys
     * @return \Illuminate\Support\Collection listMovie
     */
    public function getMovieSearch($keys)
    {
        return Movie::where('title', 'LIKE', '%' . $keys . '%')
            ->orderBy('view', 'desc')
            ->limit(6)
            ->get();
    }

    /**
     * Increase views when users watch movies
     *
     * @param mixed $id
     * @return bool
     */
    public function addViewsMovie($id)
    {
        return Movie::where('id', $id)
            ->increment('view');
    }

    /**
     * Get movie views by id
     *
     * @param mixed $id
     * @return \Illuminate\Support\Collection views
     */
    public function getViewsMovie($id)
    {
        return Movie::where('id', $id)
            ->get(['view', 'id']);
    }
}