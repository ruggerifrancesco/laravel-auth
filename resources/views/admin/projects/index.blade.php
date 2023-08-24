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
                                    <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-success">
                                        View
                                    </a>
                                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <form class="d-inline-block" action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between mt-5">
                <div>
                    {{ $projects->links() }}
                </div>
                <div>
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-success">
                        Create new project
                    </a>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

        </div>
    </div>
</div>
@endsection
