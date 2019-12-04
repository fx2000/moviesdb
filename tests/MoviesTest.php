<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class MovieTest extends TestCase
{
  /**
   * List all movies
   * / [GET]
   */
  public function testShoulReturnAllMovies()
  {
    $this->get('/', []);
    $this->seeStatusCode(200);
    $this->seeJsonStructure([
      'data' => ['*' =>
        [
          'title',
          'releaseYear',
          'created_at',
          'updated_at',
          'links'
        ]
      ],
      'meta' => ['*' => [
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
   * Show movie details
   * /id [GET]
   */
  public function testShouldReturnMovie()
  {
    $this->get("1", []);
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
   * Add movie
   * /addmovie/{title}/{releaseYear} [GET]
   */
  public function testShouldCreateMovie()
  {
    $parameters = [
      'title'       => 'The Shining',
      'releaseYear' => '1980'
    ];
    
    $this->get("addmovie/", $parameters, []);
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
   * Update movie
   * /id [PUT]
   */
  public function testShouldUpdateMovie()
  {
    $parameters = [
      'title'       => 'Terminator 2: Judgement Day',
      'releaseYear' => '1991'
    ];

    $this->put("1", $parameters, []);
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
   * Delete movie
   * /id [DELETE]
   */
  public function testShouldDeleteMovie()
  {
    $this->delete("1", [], []);
    $this->seeStatusCode(410);
    $this->seeJsonStructure([
      'status',
      'message'
    ]);
  }
}
