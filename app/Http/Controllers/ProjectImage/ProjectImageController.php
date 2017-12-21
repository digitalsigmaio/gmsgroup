<?php

namespace App\Http\Controllers\ProjectImage;

use App\Project;
use App\ProjectImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProjectImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Project $project, Request $request)
    {
        $image = new ProjectImage;
        $image->project_id = $project->id;
        $image->save();

        $image->uploadImage($request);

        return redirect()->route('projectImages', compact('project'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, ProjectImage $projectImage)
    {
        return view('editProjectImage', compact(['project', 'projectImage']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project, ProjectImage $projectImage)
    {
        $projectImage->uploadImage($request);

        return redirect()->route('projectImages', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, ProjectImage $projectImage)
    {
        File::delete($projectImage->image);
        $projectImage->delete();



        return redirect()->route('projectImages', compact('project'));
    }
}
