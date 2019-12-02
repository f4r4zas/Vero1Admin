<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
    * The name of connection which is used
    *
    * @var string
    */
    protected $connection = "mongodb";

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection($this->connection)
        ->table('user', function(Blueprint $collection){
              $collection->string('name');
              $collection->string('email')->unique();
              $collection->timestamp('email_verified_at')->nullable();
              $collection->string('password');
              $collection->string('api_token', 60)->unique();
              $collection->rememberToken();
              $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection($this->connection)
        ->table('user', function(Blueprint $collection){
            $collection->drop();
        });
    }
}
