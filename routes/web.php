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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::post("/lead", function(Request $request) {

    $lead_last_id = DB::table("leads")->insertGetId([
        "name" => $request->input("name"),
        "email" => $request->input("email"),
        "phone" => $request->input("phone"),
        "source" => $request->server("HTTP_REFERER"),
        "calc" => $request->input("calc"),
        "nar" => $request->input("nar"),
        "vn" => $request->input("vn"),
        "kol" => $request->input("kol"),
        "davl" => $request->input("davl"),
        "dlina" => $request->input("dlina"),
        "dym" => $request->input("dym"),
        "kotel" => $request->input("kotel"),
        "ob" => $request->input("ob"),
        "op1" => $request->input("op1"),
        "op2" => $request->input("op2"),
        "op3" => $request->input("op3"),
        "op4" => $request->input("op4"),
        "op5" => $request->input("op5"),
        "op6" => $request->input("op6"),
        "op7" => $request->input("op7"),
        "op8" => $request->input("op8"),
        "op9" => $request->input("op9"),
        "op10" => $request->input("op10")
    ]);

    $email = array(
        "name" => $request->input("name"),
        "email" => $request->input("email"),
        "phone" => $request->input("phone"),
        "source" => $request->server("HTTP_REFERER"),
        "calc" => $request->input("calc"),
        "nar" => $request->input("nar"),
        "vn" => $request->input("vn"),
        "kol" => $request->input("kol"),
        "davl" => $request->input("davl"),
        "dlina" => $request->input("dlina"),
        "dym" => $request->input("dym"),
        "kotel" => $request->input("kotel"),
        "ob" => $request->input("ob"),
        "op1" => $request->input("op1"),
        "op2" => $request->input("op2"),
        "op3" => $request->input("op3"),
        "op4" => $request->input("op4"),
        "op5" => $request->input("op5"),
        "op6" => $request->input("op6"),
        "op7" => $request->input("op7"),
        "op8" => $request->input("op8"),
        "op9" => $request->input("op9"),
        "op10" => $request->input("op10"),
        "lead_id" => $lead_last_id
    );

    Mail::send("email", $email, function ($message) {
        $message->from("genlid.proposals@gmail.com", "genlid.proposals");
        $message->to("nitrolovsky@gmail.com");
        $message->subject("Заявка № " . date ("Y.m.d H:m:s"));
    });

/*
    Mail::send("email", $email, function ($message) {
        $message->from("genlid.proposals@gmail.com", "genlid.proposals");
        $message->to("domshowaltair@gmail.com");
        $message->subject("Заявка № " . date ("Y.m.d H:m:s"));
    });
*/
    return redirect("/thanks");
});

Route::get('/thanks', function () {
    return view('thanks');
});
