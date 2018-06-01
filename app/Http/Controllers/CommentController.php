<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Post;
class CommentController extends Controller
{
    public function index()
    {
        $data['data'] = DB::table('comments')->paginate(3);
        $data['data'] = DB::table('comments')->get();
        $post = Post::paginate(2);
        if(count($data) < 1)
        {
            return "data kosong";
        }
        else
        {
            return view('admin/comment',$data);
        }
     	// $post = Post::all();
      //   return view('admin/comment')->with('comment',$post);
    } 
    public function store(Request $request)
    {
        // $comment = new Post;
        // $comment->nama = $request->get('name');
        // $comment->comment = $request->get('comment');
        // $comment->post_id = $request->get('post_id');
        // $comment->save();
        // return "succes";
        $nama = $request->get('name');
        $komentar = $request->get('comment');
        $post_id = $request->get('post_id');
        DB::insert('insert into comments(nama, comment,post_id) values (?, ?,?)', [$nama, $komentar,$post_id]);
        return "succes";
    }
}
