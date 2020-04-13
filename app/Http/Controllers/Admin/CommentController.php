<?php

namespace App\Http\Controllers\Admin;

use App\ProductComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index(){

        return view('admin.comments.index', [
            "comments" => ProductComment::all()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductComment  $productComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductComment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();

        return redirect()->route('admin.comments.index');
    }
}
