<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Report;
use App\Models\Post;
use App\Models\User;

class ForumController extends Controller
{
    public function index()
    {
        return view('forum/contentpolicy');
    }

    public function showReport()
    {
        $report = Report::select('reportID', 'reportType', 'reportBody', 'username', 'postID', 'datetime', 'status')->orderBy('datetime', 'DESC')->paginate(10);
        return view('forum/managereport', compact('report'));
    }

    public function edit($id)
    {
        $report = Report::where('reportID', $id)->firstorFail();
        return view('forum/managereport', compact('report'));
    }

    public function removeRecord($id)
    {
        $report = Report::where('reportID', $id)->first();

        if ($report != null) {
            $report->delete();
            return redirect('forum/manage/report')->with('success', 'Report record was successfully deleted');
        }

        return redirect()->route('forum/manage/report')->with(['fail' => 'Wrong ID!!']);
    }

    public function removePost($id, $reportID)
    {
        $username = Session::get('username');
        $findPostID = Post::where('id', $id)->first();

        if ($findPostID != null) {
            $findPostID->delete();

            $updateStatus = DB::table('reports')
                ->where('reportID', $reportID)
                ->update(['status' => "SOLVED"]);

            return redirect('forum/manage/report')->with('success', 'Post was successfully deleted');
        }
    }

    public function showReportHistory()
    {
        $report = Report::where('status', 'SOLVED')->orderBy('datetime', 'DESC')->paginate(10);

        return view('forum/reporthistory', compact('report'));
    }
}
