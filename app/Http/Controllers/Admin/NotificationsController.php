<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Notification\BulkDestroyNotification;
use App\Http\Requests\Admin\Notification\DestroyNotification;
use App\Http\Requests\Admin\Notification\IndexNotification;
use App\Http\Requests\Admin\Notification\StoreNotification;
use App\Http\Requests\Admin\Notification\UpdateNotification;
use App\Models\AdminUser;
use App\Models\Notification;
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

class NotificationsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexNotification $request
     * @return array|Factory|View
     */
    public function index(IndexNotification $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Notification::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'assunto', 'id_cliente', 'agendar', 'agendamento', 'enviado'],

            // set columns to searchIn
            ['id', 'assunto', 'conteudo']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.notification.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.notification.create');

        return view('admin.notification.create', [
            'clientes' => AdminUser::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreNotification $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreNotification $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Notification
        $notification = Notification::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/notifications'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/notifications');
    }

    /**
     * Display the specified resource.
     *
     * @param Notification $notification
     * @throws AuthorizationException
     * @return void
     */
    public function show(Notification $notification)
    {
        $this->authorize('admin.notification.show', $notification);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Notification $notification
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Notification $notification)
    {
        $this->authorize('admin.notification.edit', $notification);


        return view('admin.notification.edit', [
            'notification' => $notification,
            'clientes' => AdminUser::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateNotification $request
     * @param Notification $notification
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateNotification $request, Notification $notification)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Notification
        $notification->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/notifications'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/notifications');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyNotification $request
     * @param Notification $notification
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyNotification $request, Notification $notification)
    {
        $notification->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyNotification $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyNotification $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('notifications')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
