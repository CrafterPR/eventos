<?php

namespace App\Http\Controllers;

use App\DataTables\SummitsDataTable;
use App\Helpers\FileManager;
use App\Http\Requests\EventSummitRequest;
use App\Models\EventSummit;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use PhpOffice\PhpSpreadsheet\Helper\Sample;

class SummitController extends Controller
{
    use FileManager;
    /**
     * Display a listing of the resource.
     */
    public function index(SummitsDataTable $dataTable)
    {
        return $dataTable->render('pages.apps.summits.events');
    }

    public function create()
    {
        return view('pages.apps.summits.create');
    }

    /**
     * @throws FileNotFoundException
     */
    public function store(EventSummitRequest $request)
    {
        $safeRequest = $request->safe();

        $path = storage_path('speakers/');

        !is_dir($path) &&
        mkdir($path, 0777, true);

        if ($request->hasFile('profile_photo_url')) {
            $file = $request->file('profile_photo_url');
            $file->storeAs('speakers', $file->getClientOriginalName(), 'public') ;
            $safeRequest->profile_photo_url =  $file->getClientOriginalName();
        }
        if (!$safeRequest->longtitle) {
            $safeRequest->longtitle = $safeRequest->title;
        }

        EventSummit::create($safeRequest->all());

        return redirect()->to(route('summits.events.index'))->with('success', 'Summit event has been created successfully');
    }

    public function edit(EventSummit $event)
    {
        return view('pages.apps.summits.edit', compact('event'));
    }

    public function update(EventSummitRequest $request, EventSummit $event)
    {
        $safeRequest = $request->safe();

        $path = storage_path('speakers/');

        !is_dir($path) &&
        mkdir($path, 0777, true);

        if ($request->hasFile('profile_photo_url')) {
            $file = $request->file('profile_photo_url');
            $file->storeAs('speakers', $file->getClientOriginalName(), 'public') ;
            $safeRequest->profile_photo_url =  $file->getClientOriginalName();
        }

        $event->update($safeRequest->all());

        return redirect()->to(route('summits.events.index'))->with('success', 'Summit event has been created successfully');
    }
}
