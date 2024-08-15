<?php

use App\Models\EventSummit;
use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\Portal\PortalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', static function () {
    return view('website.index');
})->name('index');

Route::get('/exhibition', static function () {
    return view('website.exhibition');
})->name('exhibition');
Route::get('/booking', static function () {
    return view('website.booking');
})->name('booking');
Route::get('/sponsorship', static function () {
    return view('website.sponsorship');
})->name('sponsorship');
Route::get('/speakers', static function () {
    $speakers = Speaker::orderBy('order')->paginate(24);
    return view('website.speakers', compact('speakers'));
})->name('speakers');
Route::get('/about-kiw', static function () {
    return view('website.about-kiw');
})->name('about-kiw');
Route::get('/event-summits', static function () {
    $summits = EventSummit::orderBy('order')->get();
    return view('website.event-summits', compact('summits'));
})->name('event-summits');
Route::get('/who-we-are', static function () {
    return view('website.who-we-are');
})->name('who-we-are');
Route::get('/contact-us', static function () {
    return view('website.contact-us');
})->name('contact-us');
Route::get('/terms-and-conditions', static function () {
    return view('website.toc');
})->name('toc');

Route::get('/programme', [ProgrammeController::class, 'index'])->name('programme');

Route::get('/the-venue', static function () {
    return view('website.venue');
})->name('the-venue');

Route::post('submit-form', static function (Request $request) {
    $validatedData = $request->validate([
        'type' => 'required',
        'first_name' => 'required|max:255',
        'last_name' => 'required|max:255',
        'phone' => 'required|min:9|max:15',
        'email' => 'required|email|max:255',
        'subject' => ['max:255', Rule::requiredIf(fn () => in_array(request()->input('type'), ['contact-us', 'who-we-are']))],
        'organisation' => ['max:255', Rule::requiredIf(fn () => !in_array(request()->input('type'), ['contact-us', 'who-we-are']))],
        'position' => ['max:255', Rule::requiredIf(fn () => !in_array(request()->input('type'), ['contact-us', 'who-we-are']))],
        'nature_of_exhibition' => ['max:255', Rule::requiredIf(fn () => request()->input('type') === 'exhibition')],
        'summit' => ['max:255', Rule::requiredIf(fn () => request()->input('type') === 'speakers')],
        'nature_of_sponsorship' => ['max:255', Rule::requiredIf(fn () => request()->input('type') === 'sponsorship')],
        'message' => ['max:1000', Rule::requiredIf(fn () => in_array(request()->input('type'), ['contact-us', 'who-we-are']))],
    ]);

    $recipient = match ($request->input('type')) {
        'sponsorship' => ['email' => 'ceo@innovationagency.go.ke', 'name' => 'CEO KENIA'],
        'contact-us', 'who-we-are' => ['email' => $validatedData['email'], 'name' => $validatedData['first_name'] .
            ' ' . $validatedData['last_name']],
        default => ['email' => 'kiw@innovationagency.go.ke', 'name' => 'KIW 2023'],
    };

    $subject = match ($request->input('type')) {
        'exhibition', 'the-venue' => 'Expression of Interest in Showcasing My Brand at KIW2023!',
        'sponsorship' => 'KIW2023 Sponsorship request',
        'speakers' => 'Expression of Interest in Engaging at KIW2023',
        default => 'Enquiry in to KIW 2023',
    };
    $validatedData['subject'] = $subject;
    if (
        Mail::send('emails.contact', ['data' => $validatedData], static function ($message) use ($subject, $validatedData, $recipient) {
            $message->to($recipient['email'], $recipient['name'])
                ->subject($subject);
            $message->from($validatedData['email'], 'KIW Website');
        })) {
        if (in_array($request->input('type'), ['exhibition', 'sponsorship'], true)) {
            Mail::send('emails.filler', ['data' => $validatedData], static function ($message) use ($subject, $validatedData, $recipient) {
                $message->to($validatedData['email'], $validatedData['first_name'] . ' ' . $validatedData['last_name'])
                    //$message->to('james@zydii.com', 'James Makau')
                    ->subject($subject);
                $message->from($validatedData['email'], 'KIW 2023: Commonwealth Edition');
            });
        }
        return back()->with('success', 'Your message has been sent!');
    }
    return back()->with('error', 'We could not sent your message message!');


    // Send contact message
})->name('submit-form');
