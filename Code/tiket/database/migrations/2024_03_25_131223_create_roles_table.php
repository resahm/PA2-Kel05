<?php

USE Illuminate\DATABASE\Migrations\Migration;
USE Illuminate\DATABASE\SCHEMA\Blueprint;
USE Illuminate\Support\Facades\SCHEMA;

class CreateRolesTable extends Migration
{
    public FUNCTION up()
    {
        SCHEMA::CREATE('roles', FUNCTION (Blueprint $TABLE) {
            $TABLE->id();
            $TABLE->STRING('name')->UNIQUE();
            $TABLE->STRING('guard_name')->DEFAULT('web');
            $TABLE->timestamps();
        });
    }

    public FUNCTION down()
    {
        SCHEMA::dropIfExists('roles');
    }
}

