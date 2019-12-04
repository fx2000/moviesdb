<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;


class MovieController extends Controller
{
  // List all movies
  public function index()
  {
    $movies = Movie::all();

    return response()->json($movies);
  }

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

  // Show movie details
  public function show($title)
  {
    $movie = Movie::find($title);

    return response()->json($movie);
  }

  // Update movie
  public function update(Request $request, $title)
  { 
    $movie= Movie::find($title);
    
    $movie->name = $request->input('title');
    $movie->price = $request->input('releaseYear');
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

    
