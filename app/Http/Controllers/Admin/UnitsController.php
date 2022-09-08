<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Unit\BulkDestroyUnit;
use App\Http\Requests\Admin\Unit\DestroyUnit;
use App\Http\Requests\Admin\Unit\IndexUnit;
use App\Http\Requests\Admin\Unit\StoreUnit;
use App\Http\Requests\Admin\Unit\UpdateUnit;
use App\Models\Book;
use App\Models\Unit;
use App\Models\Section;
use Brackets\AdminListing\Facades\AdminListing;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class UnitsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexUnit $request
     * @return array|Factory|View
     */
    public function index(IndexUnit $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Unit::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'enabled', 'mcqs', 'order', 'section_id'],

            // set columns to searchIn
            ['id', 'title', 'slug', 'description', 'section_id'],
            function ($query) use ($request) {
                $query->with(['section']);

                // add this line if you want to search by category attributes
                $query->join('sections', 'sections.id', '=', 'units.section_id');

                if ($request->has('sections')) {
                    $query->whereIn('sections.id', $request->get('sections'));
                }
            },

        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.unit.index', ['data' => $data, 'books' => Book::where('enabled', 1)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create(IndexUnit $request)
    {
        $this->authorize('admin.unit.create');
        $data = [];
        if ($request->has('sections')) {
            $section = Section::where('id', $request->sections[0])->first();
            $data = ['section' => $section];
        }
        return view('admin.unit.create', ['sections' => Section::where('enabled', 1)->get(),  'data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUnit $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreUnit $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['section_id'] = $request->getSectionId();
        // Store the Unit
        $unit = Unit::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/units?sections[]=' . $unit->section_id), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/units?sections[]=' . $unit->section_id);
    }

    /**
     * Display the specified resource.
     *
     * @param Unit $unit
     * @throws AuthorizationException
     * @return void
     */
    public function show(Unit $unit)
    {
        $this->authorize('admin.unit.show', $unit);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Unit $unit
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Unit $unit)
    {
        $this->authorize('admin.unit.edit', $unit);

        $unit->load('section');
        return view('admin.unit.edit', [
            'unit' => $unit,
            'sections' => Section::where('enabled', 1)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUnit $request
     * @param Unit $unit
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateUnit $request, Unit $unit)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['section_id'] = $request->getSectionId();
        // Update changed values Unit
        $unit->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/units?sections[]=' . $unit->section_id),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/units?sections[]=' . $unit->section_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyUnit $request
     * @param Unit $unit
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyUnit $request, Unit $unit)
    {
        $unit->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyUnit $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyUnit $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('units')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                        ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
