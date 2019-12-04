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
   
    $this->get("api/addmovie/Test/2019", []);
    $this->seeStatusCode(200);
    $this->seeJsonStructure([
      'id',
      'title',
      'releaseYear',
      'created_at',
      'updated_at'
    ]);
  }

  /**
   * Delete Movie
   * /id [DELETE]
   */
  public function testShouldDeleteMovie()
  {
    $this->get("api/removemovie/Test", []);
    $this->seeStatusCode(200);
  }
}
