<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\News;
use Auth;
class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $show_news = DB::table('news')
                    ->join('users','users.id', '=', 'news.user_id')
                    ->select('users.ban_id', 'users.name', 'news.*')
                    ->where('news.trash', Null)
                    ->get();
             return view('admin.press.news_list_admin', compact('show_news'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show_news = News::find($id);

        return view('admin.press.s_news_admin', compact('show_news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $show_news = News::find($id);
        return view('admin.press.edit_news_admin', compact('show_news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'news_title' => 'required|max:1000|min:10',
            'news_details' => 'required|min:100',
        
        ]);

        $news = News::find($id);
         $file = $request->file( 'fetured_image' );
         if($file!=NULL) {
             unlink( $news->fetured_image );
             $name        = time() . '_' . $file->getClientOriginalName();
             $upload_path = 'storage/fetured_image/';
             $file->move( $upload_path, $name );
             $fetured_image = $upload_path . $name;
         }else{
             $fetured_image = $news->fetured_image;
         }

        $file = $request->file( 'others_1' );
         if($file!=NULL) {
             $name        = time() . '_' . $file->getClientOriginalName();
             $upload_path = 'storage/others_file/';
             $file->move( $upload_path, $name );
             $others_1 = $upload_path . $name;
             if ($news->others_1 != Null) {
                 unlink( $news->others_1 );
             }
         }else {
           $others_1 = $news->others_1;
         }

         $file = $request->file( 'others_2' );
         if($file!=NULL) {
             $name        = time() . '_' . $file->getClientOriginalName();
             $upload_path = 'storage/others_file/';
             $file->move( $upload_path, $name );
             $others_2 = $upload_path . $name;
             if ($news->others_2 != Null) {
                 unlink( $news->others_2 );
             }
         }else {
           $others_2 = $news->others_3;
         }

         $file = $request->file( 'others_3' );
         if($file!=NULL) {
             $name        = time() . '_' . $file->getClientOriginalName();
             $upload_path = 'storage/others_file/';
             $file->move( $upload_path, $name );
             $others_3 = $upload_path . $name;
             if ($news->others_3 != Null) {
                 unlink( $news->others_3 );
             }
         }else {
           $others_3 = $news->others_3;
         }


         $file = $request->file( 'others_4' );
         if($file!=NULL) {
             $name        = time() . '_' . $file->getClientOriginalName();
             $upload_path = 'storage/others_file/';
             $file->move( $upload_path, $name );
             $others_4 = $upload_path . $name;
             if ($news->others_4 != Null) {
                 unlink( $news->others_4 );
             }
         }else {
           $others_4 = $news->others_4;
         }


         $file = $request->file( 'others_5' );
         if($file!=NULL) {
             $name        = time() . '_' . $file->getClientOriginalName();
             $upload_path = 'storage/others_file/';
             $file->move( $upload_path, $name );
             $others_5 = $upload_path . $name;
             if ($news->others_5 != Null) {
                 unlink( $news->others_5 );
             }
         }else {
           $others_5 = $news->others_5;
         }


         $file = $request->file( 'others_6' );
         if($file!=NULL) {
             $name        = time() . '_' . $file->getClientOriginalName();
             $upload_path = 'storage/others_file/';
             $file->move( $upload_path, $name );
             $others_6 = $upload_path . $name;
             if ($news->others_6 != Null) {
                 unlink( $news->others_6 );
             }
         }else {
           $others_6 = $news->others_6;
         }








         $news->news_title = $request->news_title;
         $news->news_details =  $request->news_details;
         $news->fetured_image = $fetured_image;
         $news->others_1 = $others_1;
         $news->others_2 = $others_2;
         $news->others_3 = $others_3;
         $news->others_4 = $others_4;
         $news->others_5 = $others_5;
         $news->others_6 = $others_6;

          $news->save();
          return back()->with('message_success', 'News Updated Succesfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeStatusPB($id)
    {
        //$cs = Auth::id();

         $bsv = DB::table('news')
          ->where('id', $id)
          ->update([
            'status' => 1,
            'isPub' => 1,
          ]);


        return back()->with('message_success', 'News Status Updated Succesfully');
    }

    public function changeStatusViolated($id)
    {
        //$cs = Auth::id();

         $bsv = DB::table('news')
          ->where('id', $id)
          ->update([
            'status' => 2,
            
          ]);


        return back()->with('message_success', 'News Status Violated Succesfully');
    }

    public function changeStatusReview($id)
    {
        //$cs = Auth::id();

         $bsv = DB::table('news')
          ->where('id', $id)
          ->update([
            'status' => Null,
            
          ]);


        return back()->with('message_success', 'News Status Review Succesfully');
    }

    public function AdminNewsMovetoTrash($id)
    {
        //$cs = Auth::id();

         $bsv = DB::table('news')
          ->where('id', $id)
          ->update([
            'trash' => 1,
            
          ]);


        return back()->with('message_success', 'The News Moved to Trash Succesfully');
    }
}
