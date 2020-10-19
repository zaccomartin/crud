<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $projects = Project::with("user")->paginate(10);
        return view("projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = new Project;
        $title = __("Crear proyecto");
        $textButton = __("Crear");
        $route = route("projects.store");
        return view("projects.create", compact("title", "textButton", "route", "project"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required|max:140|unique:projects",
            "description" => "nullable|string|min:10"
        ]);
        Project::create($request->only("name", "description"));
        return redirect(route("projects.index"))
            ->with("message", "Proyecto creado!");
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $update = true;
        $title = __("Editar proyecto");
        $textButton = __("Actualizar");
        $route = route("projects.update", ["project" =>$project]);
        return view("projects.edit", compact("update", "title", "textButton", "route", "project"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->validate($request, [
            "name" => "required|unique:projects,name," . $project->id,
            "description" => "nullable|string|min:10"
        ]);
        $project->fill($request->only("name", "description"))->save();
        return back()->with("success", __("Proyecto actualizado!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return back()->with("success", __("Proyecto eliminado!"));
    }
}
