<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectApiController extends Controller
{
    /**
     * Display a listing of the projects.
     */
    public function index(Request $request)
    {
        $query = Project::with(['deliveries', 'schedules', 'users']);

        // Filtering
        if ($request->has('filter.name')) {
            $query->where('name', 'like', '%' . $request->input('filter.name') . '%');
        }
        if ($request->has('filter.status')) {
            $query->where('status', $request->input('filter.status'));
        }

        // Sorting
        if ($request->has('sort')) {
            $sortFields = explode(',', $request->input('sort'));
            foreach ($sortFields as $sortField) {
                $direction = 'asc';
                if (str_starts_with($sortField, '-')) {
                    $direction = 'desc';
                    $sortField = substr($sortField, 1);
                }
                //check if the sortfield is a valid column
                if (in_array($sortField, ['name','status','created_at','updated_at']))
                {
                    $query->orderBy($sortField, $direction);
                }

            }
        }

        // Pagination
        $perPage = $request->input('per_page', 15);
        return response()->json($query->paginate($perPage));
    }

    /**
     * Display the specified project.
     */
    public function show(Project $project)
    {
        return response()->json($project->load(['deliveries', 'schedules', 'users']));
    }

}