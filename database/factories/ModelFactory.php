<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Category::class, static function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'slug' => $faker->unique()->slug,
        'description' => $faker->text(),
        'enabled' => $faker->boolean(),
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Post::class, static function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'slug' => $faker->unique()->slug,
        'perex' => $faker->text(),
        'published_at' => $faker->date(),
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Book::class, static function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'slug' => $faker->unique()->slug,
        'description' => $faker->text(),
        'publisher' => $faker->sentence,
        'language' => $faker->sentence,
        'author' => $faker->sentence,
        'enabled' => $faker->boolean(),
        'price' => $faker->randomFloat,
        'category_id' => $faker->randomNumber(5),
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Setting::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'logo' => $faker->sentence,
        'footerlogo' => $faker->sentence,
        'address' => $faker->text(),
        'email' => $faker->email,
        'phone' => $faker->sentence,
        'facebook' => $faker->sentence,
        'youtube' => $faker->sentence,
        'instagram' => $faker->sentence,
        'twitter' => $faker->sentence,
        'pinterest' => $faker->sentence,
        'footer' => $faker->text(),
        'map' => $faker->text(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Setting::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'logo' => $faker->sentence,
        'footerlogo' => $faker->sentence,
        'address' => $faker->text(),
        'email' => $faker->email,
        'phone' => $faker->sentence,
        'facebook' => $faker->sentence,
        'youtube' => $faker->sentence,
        'instagram' => $faker->sentence,
        'twitter' => $faker->sentence,
        'pinterest' => $faker->sentence,
        'footer' => $faker->text(),
        'copyright' => $faker->text(),
        'map' => $faker->text(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Author::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'slug' => $faker->unique()->slug,
        'description' => $faker->text(),
        'enabled' => $faker->boolean(),
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Section::class, static function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'slug' => $faker->unique()->slug,
        'description' => $faker->text(),
        'language' => $faker->sentence,
        'enabled' => $faker->boolean(),
        'mcqs' => $faker->randomNumber(5),
        'author_id' => $faker->randomNumber(5),
        'category_id' => $faker->randomNumber(5),
        'book_id' => $faker->randomNumber(5),
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Role::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'guard_name' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Unit::class, static function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'slug' => $faker->unique()->slug,
        'description' => $faker->text(),
        'enabled' => $faker->boolean(),
        'mcqs' => $faker->randomNumber(5),
        'order' => $faker->randomNumber(5),
        'section_id' => $faker->randomNumber(5),
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Question::class, static function (Faker\Generator $faker) {
    return [
        'description' => $faker->text(20),
        'answer' => $faker->randomElement(['a', 'b', 'c', 'd']),
        'marks' => 1,
        'order' => 9999,
        'type' => 'MCQS',
        'link' => null,
        'unit_id' => 1,
        'paid' => 1,
        'explanation' => $faker->sentence,
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
// $factory->define(App\Models\Question::class, static function (Faker\Generator $faker) {
//     return [
//         'question' => $faker->text(),
//         'q_attachment' => $faker->sentence,
//         'answer' => $faker->sentence,
//         'a_attachment' => $faker->sentence,
//         'order' => $faker->randomNumber(5),
//         'type' => $faker->sentence,
//         'link' => $faker->sentence,
//         'unit_id' => $faker->randomNumber(5),
//         'marks' => $faker->randomNumber(5),
//         'deleted_at' => null,
//         'created_at' => $faker->dateTime,
//         'updated_at' => $faker->dateTime,
        
        
//     ];
// });
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
// $factory->define(App\Models\Question::class, static function (Faker\Generator $faker) {
//     return [
//         'question' => $faker->text(),
//         'q_attachment' => $faker->sentence,
//         'answer' => $faker->sentence,
//         'a_attachment' => $faker->sentence,
//         'order' => $faker->randomNumber(5),
//         'type' => $faker->sentence,
//         'link' => $faker->sentence,
//         'unit_id' => $faker->randomNumber(5),
//         'deleted_at' => null,
//         'created_at' => $faker->dateTime,
//         'updated_at' => $faker->dateTime,
        
        
//     ];
// });
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Section::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
// $factory->define(App\Models\Question::class, static function (Faker\Generator $faker) {
//     return [
        
        
//     ];
// });
// /** @var  \Illuminate\Database\Eloquent\Factory $factory */
// $factory->define(App\Models\Question::class, static function (Faker\Generator $faker) {
//     return [
//         'description' => $faker->text(),
//         'answer' => $faker->sentence,
//         'marks' => $faker->sentence,
//         'order' => $faker->randomNumber(5),
//         'type' => $faker->sentence,
//         'link' => $faker->sentence,
//         'unit_id' => $faker->randomNumber(5),
//         'deleted_at' => null,
//         'created_at' => $faker->dateTime,
//         'updated_at' => $faker->dateTime,
        
        
//     ];
// });
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Section::class, static function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'slug' => $faker->unique()->slug,
        'description' => $faker->text(),
        'language' => $faker->sentence,
        'enabled' => $faker->boolean(),
        'hassection' => $faker->boolean(),
        'mcqs' => $faker->randomNumber(5),
        'author_id' => $faker->randomNumber(5),
        'category_id' => $faker->randomNumber(5),
        'book_id' => $faker->randomNumber(5),
        'section_id' => $faker->randomNumber(5),
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Comment::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'comment' => $faker->text(),
        'user_id' => $faker->sentence,
        'status' => $faker->sentence,
        'question_id' => $faker->randomNumber(5),
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Orderhd::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\OrderHd::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\OrderHd::class, static function (Faker\Generator $faker) {
    return [
        'session_id' => $faker->sentence,
        'status' => $faker->randomNumber(5),
        'user_id' => $faker->sentence,
        'name' => $faker->firstName,
        'email' => $faker->email,
        'phoneno' => $faker->sentence,
        'address' => $faker->sentence,
        'company' => $faker->sentence,
        'amount' => $faker->randomNumber(5),
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'orderNo' => $faker->sentence,
        'expired_at' => $faker->dateTime,
        'city' => $faker->sentence,
        'state' => $faker->sentence,
        'zip' => $faker->sentence,
        'note' => $faker->text(),
        'paid' => $faker->boolean(),
        'payment_method' => $faker->sentence,
        'transaction_no' => $faker->sentence,
        'transaction_attachment' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Slide::class, static function (Faker\Generator $faker) {
    return [
        'description' => $faker->text(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Test::class, static function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'slug' => $faker->unique()->slug,
        'description' => $faker->text(),
        'language' => $faker->sentence,
        'enabled' => $faker->boolean(),
        'price' => $faker->randomFloat,
        'date' => $faker->date(),
        'announce_date' => $faker->date(),
        'last_date' => $faker->date(),
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
