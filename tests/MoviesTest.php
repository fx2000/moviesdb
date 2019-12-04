<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class MovieTest extends TestCase
{
  /**
   * Add Movie
   * /addmovie/{title}/{releaseYear} [GET]
   */
  public function testShouldCreateMovie()
  {
    $parameters = [
      'title'       => 'Terminator',
      'releaseYear' => '1984'
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
   * Delete Movie
   * /id [DELETE]
   */
  public function testShouldDeleteMovie()
  {
    $this->get("api/removemovie/Terminator", [], []);
    $this->seeStatusCode(200);
    $this->seeJsonStructure([
      'status',
      'message'
    ]);
  }
}
