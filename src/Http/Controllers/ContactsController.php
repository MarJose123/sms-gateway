<?php

namespace MarJose123\SmsGateway\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MarJose123\SmsGateway\Http\Requests\ContactStoreRequest;
use MarJose123\SmsGateway\Http\Resources\ContactsCollection;
use MarJose123\SmsGateway\Models\Contacts;

class ContactsController extends BaseController
{
    public function index(): JsonResponse
    {
        $limit = $request->limit ?? $this->limit;
        $offset = $request->offset ?? $this->offset;

        $resp = $this->viewAll ? new ContactsCollection(Contacts::limit($limit)
            ->offset($offset)) : new ContactsCollection(Auth::user()->contacts());

        return response()->json($resp);

    }

    public function store(ContactStoreRequest $request): JsonResponse
    {
        $resp = new ContactsCollection(Contacts::create($request->validated()));

        return response()->json($resp);
    }

    public function show($id): JsonResponse
    {
        $resp = $this->viewAll ? new ContactsCollection(Contacts::findOrFail($id)) : new ContactsCollection(Contacts::where([
            ['id', '=', $id],
            ['user', '=', Auth::user()->id],
        ]));

        return response()->json($resp);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $resp = new ContactsCollection(Contacts::findOrFail($id)->update($request->validated()));

        return response()->json($resp);
    }

    public function destroy($id): JsonResponse
    {
        $resp = $this->viewAll ? new ContactsCollection(Contacts::findOrFail($id)->delete()) : new ContactsCollection(Contacts::where([
            ['id', '=', $id],
            ['user', '=', Auth::user()->id],
        ])->delete());

        return response()->json($resp);
    }
}
