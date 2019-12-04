<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;


class MovieController extends Controller
{
  // Create movie
  public function add(Request $request)
  {
    $movie = new Movie;
    $movie->title= $request->title;
    $movie->releaseYear = $request->releaseYear;
    $movie->save();

    return response()->json($movie);
  }

  // Delete movie
  public function remove($title)
  {
    $movie = Movie::where('title', $title);
    $movie->delete();

    return response('The movie was removed successfully', 200);
  }
}
