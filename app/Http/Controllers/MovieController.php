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

    $movie->name= $request->name;
    $movie->price = $request->price;
    $movie->description= $request->description;
    $movie->save();

    return response()->json($movie);
  }

  // Delete movie
  public function remove($title)
  {
    $movie = Movie::find($title);

    $movie->delete();

    return response()->json('Movie removed successfully');
  }
}
