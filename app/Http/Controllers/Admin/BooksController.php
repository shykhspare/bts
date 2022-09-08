<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Book\BulkDestroyBook;
use App\Http\Requests\Admin\Book\DestroyBook;
use App\Http\Requests\Admin\Book\IndexBook;
use App\Http\Requests\Admin\Book\StoreBook;
use App\Http\Requests\Admin\Book\UpdateBook;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
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

class BooksController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexBook $request
     * @return array|Factory|View
     */
    public function index(IndexBook $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Book::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'publisher', 'language', 'orderNo', 'enabled', 'price', 'category_id', 'author_id', 'status', 'online_amount', 'ship_amount'],

            // set columns to searchIn
            ['id', 'title', 'slug', 'description','orderNo', 'publisher', 'language', 'categories.title', 'authors.name', 'online_amount', 'ship_amount'],

            function ($query) use ($request) {
                $query->with(['category']);

                // add this line if you want to search by category attributes
                $query->join('categories', 'categories.id', '=', 'books.category_id');

                if ($request->has('categories')) {
                    $query->whereIn('category_id', $request->get('categories'));
                }

                $query->with(['author']);

                // add this line if you want to search by author attributes
                $query->join('authors', 'authors.id', '=', 'books.author_id');

                if ($request->has('authors')) {
                    $query->whereIn('author_id', $request->get('authors'));
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




        return view('admin.book.index', ['data' => $data, 'categories' => Category::where('enabled', 1)->get(),  'authors' =>  Author::where('enabled', 1)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.book.create');

        return view('admin.book.create', [
            'categories' => Category::where('enabled', 1)->get(),
            'authors' =>  Author::where('enabled', 1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBook $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreBook $request)
    {
        // Sanitize input
        // $sanitized = $request->getSanitized();
        $sanitized = $request->validated();
        $sanitized['category_id'] = $request->getCategoryId();
        $sanitized['author_id'] = $request->getAuthorId();

        // Store the Book
        $book = Book::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/books'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/books');
    }

    /**
     * Display the specified resource.
     *
     * @param Book $book
     * @throws AuthorizationException
     * @return void
     */
    public function show(Book $book)
    {
        $this->authorize('admin.book.show', $book);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Book $book
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Book $book)
    {
        $this->authorize('admin.book.edit', $book);

        $book->load('category');
        $book->load('Author');
        return view('admin.book.edit', [
            'book' => $book,
            'categories' => Category::where('enabled', 1)->get(),
            'authors' =>  Author::where('enabled', 1)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBook $request
     * @param Book $book
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateBook $request, Book $book)
    {
        // Sanitize input
        // $sanitized = $request->getSanitized();
        $sanitized = $request->validated();
        $sanitized['category_id'] = $request->getCategoryId();
        $sanitized['author_id'] = $request->getAuthorId();
        // Update changed values Book
        $book->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/books'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyBook $request
     * @param Book $book
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyBook $request, Book $book)
    {
        $book->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyBook $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyBook $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('books')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                        ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
