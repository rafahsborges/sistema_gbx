<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Notification\BulkDestroyNotification;
use App\Http\Requests\Admin\Notification\DestroyNotification;
use App\Http\Requests\Admin\Notification\IndexNotification;
use App\Http\Requests\Admin\Notification\StoreNotification;
use App\Http\Requests\Admin\Notification\UpdateNotification;
use App\Jobs\SendMailJob;
use App\Mail\NewNotifications;
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
            ['id', 'assunto', 'id_cliente', 'agendar', 'agendamento', 'enviado', 'envio'],

            // set columns to searchIn
            ['id', 'assunto', 'conteudo', 'id_cliente'],

            function ($query) use ($request) {
                if ($request->has('agendados')) {
                    $query->whereIn('agendar', $request->get('agendados'));
                }
                if ($request->has('enviados')) {
                    $query->whereIn('enviado', $request->get('enviados'));
                }
            }
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.notification.index', [
            'data' => $data,
            'clientes' => AdminUser::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     * @throws AuthorizationException
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

        if ($sanitized['agendar']) {
            $sanitized['agendamento'] = Carbon::create($sanitized['agendamento']);
        } else {
            $sanitized['agendamento'] = Carbon::now();
        }

        $emails = [];
        $clientes = [];

        foreach ($sanitized['cliente'] as $cliente) {
            $emails[] = $cliente['email'];
            $clientes[] = $cliente['id'];
        }

        $sanitized['id_cliente'] = json_encode($clientes);

        // Store the Notification
        $notification = Notification::create($sanitized);

        if ($sanitized['agendamento']->isPast()) {
            $notification->enviado = true;
            $notification->envio = Carbon::now();
            $notification->save();

            foreach ($sanitized['cliente'] as $cliente) {
                dispatch(new SendMailJob($cliente['email'], new NewNotifications($cliente, $notification)));
            }
        }

        if ($request->ajax()) {
            return ['redirect' => url('admin/notifications'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/notifications');
    }

    /**
     * Display the specified resource.
     *
     * @param Notification $notification
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function show(Notification $notification)
    {
        $this->authorize('admin.notification.show', $notification);

        $notification = Notification::find($notification->id);

        $notification->cliente = AdminUser::whereIn('id', json_decode($notification->id_cliente))
            ->get();

        return view('admin.notification.show', [
            'notification' => $notification,
            'clientes' => AdminUser::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Notification $notification
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function edit(Notification $notification)
    {
        $this->authorize('admin.notification.edit', $notification);

        $notification = Notification::find($notification->id);

        $notification->cliente = AdminUser::whereIn('id', json_decode($notification->id_cliente))
            ->get();

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

        if ($sanitized['agendar']) {
            $sanitized['agendamento'] = Carbon::create($sanitized['agendamento']);
        } else {
            $sanitized['agendamento'] = Carbon::now();
        }

        if (!$sanitized['enviado']) {
            $sanitized['envio'] = null;
        }

        $emails = [];
        $clientes = [];

        foreach ($sanitized['cliente'] as $cliente) {
            $emails[] = $cliente['email'];
            $clientes[] = $cliente['id'];
        }

        $sanitized['id_cliente'] = json_encode($clientes);

        // Update changed values Notification
        $notification->update($sanitized);

        if ($sanitized['agendamento']->isPast()) {
            $notification->enviado = true;
            $notification->envio = Carbon::now();
            $notification->save();

            foreach ($sanitized['cliente'] as $cliente) {
                dispatch(new SendMailJob($cliente['email'], new NewNotifications($cliente, $notification)));
            }
        }

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
     * @return ResponseFactory|RedirectResponse|Response
     * @throws Exception
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
     * @return Response|bool
     * @throws Exception
     */
    public function bulkDestroy(BulkDestroyNotification $request): Response
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
