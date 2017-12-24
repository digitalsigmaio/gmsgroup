<?php

namespace App\Http\Controllers\Project;

use App\Http\Requests\StoreProjectRequest;
use App\Project;
use App\Transformers\ProjectTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projects = Project::all();
        if($request->wantsJson()){
            return  fractal()
                    ->collection($projects)
                    ->parseIncludes(['clients'])
                    ->addMeta([
                        'ar_tagline' => Project::AR_TAGLINE,
                        'en_tagline' => Project::EN_TAGLINE
                    ])
                    ->transformWith(new ProjectTransformer)
                    ->toArray();
        }

        return view('projects', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newProject');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $project = new Project;
        $project->ar_name = $request->ar_name;
        $project->en_name = $request->en_name;
        $project->ar_description = $request->ar_description;
        $project->en_description = $request->en_description;
        $project->save();
        /*
         * Here stands logo upload function
         * */
        $project->uploadLogo($request);



        if($request->wantsJson()){
            return  fractal()
                ->item($project)
                ->transformWith(new ProjectTransformer)
                ->toArray();
        }

        return redirect()->route('projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, Request $request)
    {
        if($request->wantsJson()){
            return  fractal()
                ->item($project)
                ->parseIncludes(['clients'])
                ->transformWith(new ProjectTransformer)
                ->toArray();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('editProject', compact('project'));
    }

    /**
     * Show project gallery
     *
     * @param int $project
     * @return \Illuminate\Http\Response
     */
    public function gallery(Project $project)
    {
        $images = $project->images;
        return view('projectImages', compact(['images', 'project']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $project->ar_name = $request->ar_name;
        $project->en_name = $request->en_name;
        $project->ar_description = $request->ar_description;
        $project->en_description = $request->en_description;
        $project->save();
        /*
         * Here stands logo upload function
         * */
        $project->uploadLogo($request);



        if($request->wantsJson()){
            return  fractal()
                ->item($project)
                ->transformWith(new ProjectTransformer)
                ->toArray();
        }

        return redirect()->route('projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        File::delete($project->logo);
        $project->delete();


        return redirect()->route('projects');
    }
}
