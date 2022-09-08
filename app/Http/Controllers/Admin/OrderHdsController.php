<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OrderHd\BulkDestroyOrderHd;
use App\Http\Requests\Admin\OrderHd\DestroyOrderHd;
use App\Http\Requests\Admin\OrderHd\IndexOrderHd;
use App\Http\Requests\Admin\OrderHd\StoreOrderHd;
use App\Http\Requests\Admin\OrderHd\UpdateOrderHd;
use App\Models\OrderHd;
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

class OrderHdsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexOrderHd $request
     * @return array|Factory|View
     */
    public function index(IndexOrderHd $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(OrderHd::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'session_id', 'status', 'user_id', 'type', 'name', 'email', 'phoneno', 'address', 'company', 'amount', 'orderNo', 'expired_at', 'city', 'state', 'zip', 'paid', 'payment_method', 'transaction_no', 'transaction_attachment'],

            // set columns to searchIn
            ['id', 'session_id', 'status', 'name', 'email', 'phoneno', 'address', 'company', 'orderNo', 'city', 'state', 'zip', 'note', 'payment_method', 'transaction_no', 'transaction_attachment'],

            function ($query) use ($request) {

                if ($request->has('status')) {
                    $query->where('status', $request->get('status'));
                }

                if ($request->has('type')) {
                    $query->where('type', $request->get('type'));
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

        return view('admin.order-hd.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.order-hd.create');

        return view('admin.order-hd.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreOrderHd $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreOrderHd $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the OrderHd
        $orderHd = OrderHd::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/order-hds'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/order-hds');
    }

    /**
     * Display the specified resource.
     *
     * @param OrderHd $orderHd
     * @throws AuthorizationException
     * @return void
     */
    public function show($orderNo)
    {

        $orderhd = OrderHd::where('orderNo', $orderNo)->firstorfail();
        return view('admin.order-hd.show', compact('orderhd'));
        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param OrderHd $orderHd
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(OrderHd $orderHd)
    {
        $this->authorize('admin.order-hd.edit', $orderHd);


        return view('admin.order-hd.edit', [
            'orderHd' => $orderHd,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateOrderHd $request
     * @param OrderHd $orderHd
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateOrderHd $request, OrderHd $orderHd)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values OrderHd
        $orderHd->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/order-hds'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/order-hds');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyOrderHd $request
     * @param OrderHd $orderHd
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyOrderHd $request, OrderHd $orderHd)
    {
        $orderHd->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyOrderHd $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyOrderHd $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('order_hds')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                        ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
