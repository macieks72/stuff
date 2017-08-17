<?php

use Illuminate\Support\Facades\DB;

DB::table('testcron')->insert([
	['some_text' => 'ok', 'created' => \Carbon\Carbon::now()]
]);

// wszystkie pola z tabeli
$user = DB::table('users')->get();
// tylko name i email
$users = DB::table('users')->select('name', 'email as user_email')->get();
// pobieranie jednego usera jesli user i pass sie zgadzaja
$user = DB::table('users')->where('username', $username)->where('password', md5($password))->first();

$rows = app('db')->select('SELECT * FROM peoples');
$rows = DB::select('SELECT * FROM peoples');

session()->get('currentUser', null);
session()->put('currentUser', $user);
session()->flush();

