<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;


class MovieController extends Controller
{
  // Create movie
  public function add(Request $request)
  {
    // Check if movie already exists
    $duplicateMovie = Movie::where('title', $request->title)->count();
    if ($duplicateMovie) {
      return response('The movie already exists', 400);
    }

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
