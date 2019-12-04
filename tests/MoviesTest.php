<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class MovieTest extends TestCase
{
  /**
   * List All Movies
   * / [GET]
   */
  public function testShoulReturnAllMovies()
  {
    $this->get('/api', []);
    $this->seeStatusCode(200);
    $this->seeJsonStructure([
      'data' => [
        '*' => [
          'title',
          'releaseYear',
          'created_at',
          'updated_at',
          'links'
        ]
      ],
      'meta' => [
        '*' => [
          'total',
          'count',
          'per_page',
          'current_page',
          'total_pages'
        ]
      ]
    ]);
  }

  /**
   * Show Movie Details
   * /id [GET]
   */
  public function testShouldReturnMovie()
  {
    $this->get("/api/1", []);
    $this->seeStatusCode(200);
    $this->seeJsonStructure(
      ['data' =>
        [
          'title',
          'releaseYear',
          'created_at',
          'updated_at'
        ]
      ]    
    ); 
  }

  /**
   * Add Movie
   * /addmovie/{title}/{releaseYear} [GET]
   */
  public function testShouldCreateMovie()
  {
    $parameters = [
      'title'       => 'The Shining',
      'releaseYear' => '1980'
    ];
    
    $this->get("api/addmovie/", $parameters, []);
    $this->seeStatusCode(200);
    $this->seeJsonStructure(
      ['data' =>
        [
          'title',
          'releaseYear',
          'created_at',
          'updated_at'
        ]
      ]    
    );
  }

  /**
   * Update Movie
   * /id [PUT]
   */
  public function testShouldUpdateMovie()
  {
    $parameters = [
      'title'       => 'Terminator 2: Judgement Day',
      'releaseYear' => '1991'
    ];

    $this->put("api/1", $parameters, []);
    $this->seeStatusCode(200);
    $this->seeJsonStructure(
      ['data' =>
        [
          'title',
          'releaseYear',
          'created_at',
          'updated_at'
        ]
      ]    
    );
  }

  /**
   * Delete Movie
   * /id [DELETE]
   */
  public function testShouldDeleteMovie()
  {
    $this->delete("api/1", [], []);
    $this->seeStatusCode(410);
    $this->seeJsonStructure([
      'status',
      'message'
    ]);
  }
}
