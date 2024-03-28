<?php

namespace MarJose123\SmsGateway\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use MarJose123\SmsGateway\Http\Requests\MessageStoreRequest;
use MarJose123\SmsGateway\Http\Requests\MessageUpdateRequest;
use MarJose123\SmsGateway\Http\Resources\MessagesCollection;
use MarJose123\SmsGateway\Models\Messages;

class MessageController extends BaseController
{
    public function index(): JsonResponse
    {
        $limit = $request->limit ?? $this->limit;
        $offset = $request->offset ?? $this->offset;

        $resp = $this->viewAll ? new MessagesCollection(Messages::limit($limit)
            ->offset($offset)) : new MessagesCollection(Messages::user()->messages());

        return response()->json($resp);
    }

    public function store(MessageStoreRequest $request): JsonResponse
    {
        $resp = new MessagesCollection(Messages::create($request->validated()));

        return response()->json($resp);
    }

    public function show($id): JsonResponse
    {
        $resp = $this->viewAll ? new MessagesCollection(Messages::findOrFail($id)) : new MessagesCollection(Messages::where([
            ['id', '=', $id],
            ['user', '=', Auth::user()->id],
        ]));

        return response()->json($resp);
    }

    public function update(MessageUpdateRequest $request, $id): JsonResponse
    {
        $resp = new MessagesCollection(Messages::findOrFail($id)->update($request->validated()));

        return response()->json($resp);
    }

    public function destroy($id): JsonResponse
    {
        $resp = new MessagesCollection(Messages::findOrFail($id)->delete());

        return response()->json($resp);
    }
}
