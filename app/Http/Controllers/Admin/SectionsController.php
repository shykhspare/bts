<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Section\BulkDestroySection;
use App\Http\Requests\Admin\Section\DestroySection;
use App\Http\Requests\Admin\Section\IndexSection;
use App\Http\Requests\Admin\Section\StoreSection;
use App\Http\Requests\Admin\Section\UpdateSection;
use App\Models\Section;
use App\Models\Book;
use App\Models\Unit;
use App\Models\Category;
use App\Models\Author;
use App\Models\Question;
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
// use Illuminate\Support\Facades\Request;
use Illuminate\View\View;
use Illuminate\Http\Request;

class SectionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSection $request
     * @return array|Factory|View
     */
    public function index(IndexSection $request)
    {


        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Section::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'language', 'hassection', 'enabled', 'mcqs', 'author_id', 'category_id', 'book_id', 'section_id'],

            // set columns to searchIn
            ['id', 'title', 'slug', 'description', 'language', 'book_id', 'hassection'],
            function ($query) use ($request) {
                $query->with(['book']);
                $query->with(['sections']);
                $query->with(['section']);

                // add this line if you want to search by category attributes
                $query->join('books', 'books.id', '=', 'sections.book_id');

                if ($request->has('books')) {
                    $query->whereIn('book_id', $request->get('books'));
                }

                if ($request->has('section_id')) {
                    $query->where('section_id', $request->get('section_id'));
                } else {
                    $query->where('hassection', 0);
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

        return view('admin.section.index', ['data' => $data, 'books' => Book::where('enabled', 1)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create(IndexSection $request)
    {
        $data = [];
        $sections = Section::where('enabled', 1)->get();
        if ($request->has('books')) {
            $book = Book::where('id', $request->books[0])->first();
            $data = ['book' => $book, 'enabled' => 1];
            $sections = Section::where('enabled', 1)->where('book_id', $request->books[0])->get();
        }

        $this->authorize('admin.section.create');
        return view('admin.section.create', [
            'books' => Book::where('enabled', 1)->get(),
            'data' => $data,
            'sections' =>   $sections,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSection $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSection $request)
    {



        $sanitized = $request->validated();
        $sanitized['book_id'] = $request->getBookId();
        $sanitized['section_id'] = $request->getSectionId();

        $section = Section::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/sections?books[]=' . $section->book_id), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }
        return redirect('admin/sections?books[]=' . $section->book_id);
    }

    /**
     * Display the specified resource.
     *
     * @param Section $section
     * @throws AuthorizationException
     * @return void
     */
    public function show(Section $section)
    {
        $this->authorize('admin.section.show', $section);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Section $section
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Section $section)
    {
        $this->authorize('admin.section.edit', $section);
        $section->load('Book');
        $section->load('Section');
        return view('admin.section.edit', [
            'section' => $section,
            'books' => Book::where('enabled', 1)->get(),
            'sections' =>  Section::where('enabled', 1)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSection $request
     * @param Section $section
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSection $request, Section $section)
    {
        // Sanitize input
        // $sanitized = $request->getSanitized();
        $sanitized = $request->validated();
        // $sanitized['category_id'] = $request->getCategoryId();
        // $sanitized['author_id'] = $request->getAuthorId();
        $sanitized['book_id'] = $request->getBookId();
        $sanitized['section_id'] = $request->getSectionId();

        // Update changed values Section
        $section->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/sections?books[]=' . $section->book_id),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/sections?books[]=' . $section->book_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySection $request
     * @param Section $section
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySection $request, Section $section)
    {
        $section->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySection $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySection $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('sections')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                        ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }

    public function copyUnit($oldSection_id, $newSectionId)
    {
        $units = Unit::where('section_id', $oldSection_id)->get();

        foreach ($units as $unit) {

            $new_section = $unit->replicate()->toArray();
            unset($new_section['id']);
            $new_section['section_id'] = $newSectionId;
            $new_section['slug'] = $unit->slug . time();
            $new_unit = Unit::create($new_section);
            $this->CopyQuestion($unit->id, $new_unit->id);
        }
    }
    // copyUnitt function
    public function copyUnitt(Request $request)
    {
        $unit_id = $request->new_section_id;
        $section_id = $request->section_id;

        // copy unit to section
        $unit = Unit::where('id', $unit_id)->first();
        $new_unit = $unit->replicate()->toArray();
        unset($new_unit['id']);
        $new_unit['section_id'] = $section_id;
        $new_unit['slug'] = $unit->slug . time();
        $new_unit = Unit::create($new_unit);
        $this->CopyQuestion($unit->id, $new_unit->id);

        // return success message
        return response()->json(['message' => 'success']);
    }


    public function CopyQuestion($oldUnitId, $newUnitId)
    {
        $questions = Question::where("unit_id", $oldUnitId)->get();

        foreach ($questions as $question) {
            $new_section = $question->replicate()->toArray();
            $new_section['unit_id'] = $newUnitId;
            Question::create($new_section);
        }
    }



    // copySection function
    public function copySection(Request $request)
    {
        $book_id = $request->book_id;
        $section_id = $request->section_id;

        $section = Section::where('id', $section_id)->first();
        $new_section = $section->replicate()->toArray();
        unset($new_section['id']);
        $new_section['book_id'] = $book_id;
        $new_section['slug'] = $section->slug . time();
        $newSection = Section::create($new_section);
        $this->copyUnit($section_id, $newSection->id);

        $subSections = Section::where('section_id', $section_id)->get();

        foreach ($subSections as $newsub) {
            $new_section = $newsub->replicate()->toArray();
            unset($new_section['id']);
            $new_section['book_id'] = $book_id;
            $new_section['section_id'] = $newSection->id;
            $new_section['slug'] = $newsub->slug . time();
            $newSection = Section::create($new_section);
            $this->copyUnit($section_id, $newSection->id);
        }


        return response()->json(['status' => 'success', 'message' => 'Section copied successfully']);
    }

    // fetchsections function
    public function fetchsections(Request $request)
    {
        $book_id = $request->book_id;
        $sections = Section::where('book_id', $book_id)->get();
        return response()->json($sections);
    }

}
