<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/lead", function() {
    $lead = new Lead;
    $leadLastId = $lead->create([
        "name" => Request::get("name"),
        "email" => Request::get("email"),
        "phone" => Request::get("phone"),
        "source" => Request::get("source"),
        "calc" => Request::get("calc"),
        "nar" => Request::get("nar"),
        "vn" => Request::get("vn"),
        "kol" => Request::get("kol"),
        "davl" => Request::get("davl"),
        "dlina" => Request::get("dlina"),
        "dym" => Request::get("dym"),
        "kotel" => Request::get("kotel"),
        "ob" => Request::get("ob"),
        "op1" => Request::get("op1"),
        "op2" => Request::get("op2"),
        "op3" => Request::get("op3"),
        "op4" => Request::get("op4"),
        "op5" => Request::get("op5"),
        "op6" => Request::get("op6"),
        "op7" => Request::get("op7"),
        "op8" => Request::get("op8"),
        "op9" => Request::get("op9"),
        "op10" => Request::get("op10")
    ])->id;

    $email = array(
        "name" => Request::get("name"),
        "email" => Request::get("email"),
        "phone" => Request::get("phone"),
        "source" => Request::get("source"),
        "calc" => Request::get("calc"),
        "nar" => Request::get("nar"),
        "vn" => Request::get("vn"),
        "kol" => Request::get("kol"),
        "davl" => Request::get("davl"),
        "dlina" => Request::get("dlina"),
        "dym" => Request::get("dym"),
        "kotel" => Request::get("kotel"),
        "ob" => Request::get("ob"),
        "op1" => Request::get("op1"),
        "op2" => Request::get("op2"),
        "op3" => Request::get("op3"),
        "op4" => Request::get("op4"),
        "op5" => Request::get("op5"),
        "op6" => Request::get("op6"),
        "op7" => Request::get("op7"),
        "op8" => Request::get("op8"),
        "op9" => Request::get("op9"),
        "op10" => Request::get("op10"),
        "lead_id" => $leadLastId
    );

    Mail::send("email.lead", $email, function ($message) {
        $message->from("genlid.proposals@gmail.com", "genlid.proposals");
        $message->to("nitrolovsky@gmail.com");
        $message->subject("Заявка № " . date ("Y.m.d H:m:s"));
    });

    Mail::send("email.lead", $email, function ($message) {
        $message->from("genlid.proposals@gmail.com", "genlid.proposals");
        $message->to("domshowaltair@gmail.com");
        $message->subject("Заявка № " . date ("Y.m.d H:m:s"));
    });

    return Redirect::to("/thanks");
})

Route::get('/thanks', function () {
    return view('thanks');
});
