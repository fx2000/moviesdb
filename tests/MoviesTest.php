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
   
    $this->get("api/addmovie/TestMovie/2019", []);
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
   * Add duplicate Movie
   * /addmovie/{title}/{releaseYear} [GET]
   */
  public function testShouldNotCreateDuplicateMovie()
  {
   
    $this->get("api/addmovie/TestMovie/2019", []);
    $this->seeStatusCode(400);
  }

  /**
   * Delete Movie
   * /id [DELETE]
   */
  public function testShouldDeleteMovie()
  {
    $this->get("api/removemovie/TestMovie", []);
    $this->seeStatusCode(200);
  }
}
