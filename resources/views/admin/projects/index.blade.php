@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card p-3">
                <table class="table table-light m-0">
                    <thead>
                        <tr class="table-info">
                          <th scope="col">ID</th>
                          <th scope="col">Title</th>
                          <th scope="col">Partecipants</th>
                          <th scope="col">Goals</th>
                          <th scope="col">Budget</th>
                          <th scope="col">Project Suspended</th>
                          <th scope="col">Project Completed</th>
                          <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr class="table-secondary">
                                <th scope="row">
                                    {{ $project->id }}
                                </th>
                                <td>
                                    {{ $project->title }}
                                </td>
                                <td>
                                    {{ $project->nPartecipants }}
                                </td>
                                <td>
                                    {{ $project->goals }}
                                </td>
                                <td>
                                    {{ $project->budget }}
                                </td>
                                <td>
                                    {{ $project->isSuspended }}
                                </td>
                                <td>
                                    {{ $project->isCompleted }}
                                </td>
                                <td>
                                    <a href="" class="btn btn-success">
                                        View
                                    </a>
                                    <a href="" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <a href="" class="btn btn-danger">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-5">
                {{ $projects->links() }}
            </div>

        </div>
    </div>
</div>
@endsection
