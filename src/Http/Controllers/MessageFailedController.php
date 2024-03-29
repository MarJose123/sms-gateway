<?php

namespace MarJose123\SmsGateway\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MarJose123\SmsGateway\Http\Requests\FailedMessageStoreRequest;
use MarJose123\SmsGateway\Http\Resources\FailedMessageCollection;
use MarJose123\SmsGateway\Models\FailedMessages;
use MarJose123\SmsGateway\Models\Messages;

class MessageFailedController extends BaseController
{
    public function index(): JsonResponse
    {
        $limit = $request->limit ?? $this->limit;
        $offset = $request->offset ?? $this->offset;

        $resp = $this->viewAll ? new FailedMessageCollection(FailedMessages::limit($limit)
            ->offset($offset)) : new FailedMessageCollection(Messages::user()->messages()->failedMessages);

        return response()->json($resp);

    }

    public function store(FailedMessageStoreRequest $request): JsonResponse
    {
        $data = FailedMessages::create($request->validated());
        $resp = new FailedMessageCollection($data);
        Messages::find($data->message)?->increment('retry_count');

        return response()->json($resp);
    }

    public function show($id): JsonResponse
    {
        $resp = $this->viewAll ? new FailedMessageCollection(FailedMessages::findOrFail($id)) : new FailedMessageCollection(FailedMessages::where([
            ['id', '=', $id],
            ['user', '=', Auth::user()->id],
        ]));

        return response()->json($resp);
    }

    public function update(Request $request, $id): JsonResponse
    {
        return response()
            ->json([
                'data' => null,
                'messages' => 'Currently not supported in this version',
                'meta' => [
                    'count' => 0,
                    'self' => $request->fullUrl(),
                ],
            ]);
    }

    public function destroy($id): JsonResponse
    {
        $data = FailedMessages::findOrFail($id);
        Messages::find($data->message)?->decrement('retry_count');
        $resp = new FailedMessageCollection(FailedMessages::findOrFail($id)->delete());

        return response()->json($resp);
    }
}
