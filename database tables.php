/*start by creating the necessary database tables. We will create three tables: users, profiles, and articles. */
Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('email')->unique();
    $table->string('phone')->nullable();
    $table->string('password');
    $table->string('role')->default('writer');
    $table->timestamps();
});

Schema::create('profiles', function (Blueprint $table) {
    $table->id();
    $table->string('first_name');
    $table->string('last_name');
    $table->unsignedBigInteger('user_id');
    $table->timestamps();

    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
});

Schema::create('articles', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('post');
    $table->unsignedBigInteger('user_id');
    $table->timestamps();

    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
});
