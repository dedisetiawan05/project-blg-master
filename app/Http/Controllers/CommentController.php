<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Post;
use App\Comment;
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
        return view("/");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // Massive delete for checkbox All

    public function destroyall(Request $request)
    {
        if(count(collect($request->checkbox)) > 1){
          $post = Post::whereIn('id',$request->get('checkbox'));
          $post->delete();
        }else{
          //$id = $request->get('id');
          $comment = Comment::find($request->get('checkbox'))->first();
          $comment->delete();
          //DB::delete('delete from comments where id = $id ');
          // $post = post::find($request->get('checkbox'))->first();
          // $post->delete();
        }
        return back();
    }
    public function destroyone($id)
    {
        //DB::table('comments')->where('id',$id)->delete();
         $comment = Comment::find($id);
         $comment->delete();
        return redirect()->back();
    }
}
