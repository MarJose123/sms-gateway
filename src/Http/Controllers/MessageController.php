<?php

namespace MarJose123\SmsGateway\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends BaseController
{
    public function index()
    {
        $limit = $request->limit ?? $this->limit;
        $offset = $request->offset ?? $this->offset;

    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
