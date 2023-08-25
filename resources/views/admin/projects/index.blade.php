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
                          <th scope="col">Status</th>
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
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#goalsModal">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="goalsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Goals List</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <ul>
                                                        @foreach (json_decode($project->goals) as $goal)
                                                            <li>{{ $goal }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                                <td>
                                    {{ $project->budget }}$
                                </td>
                                <td>
                                    @if ($project->isCompleted)
                                        <span class="badge rounded-pill text-bg-success">Completed</span>
                                    @elseif ($project->isSuspended)
                                        <span class="badge rounded-pill text-bg-warning">Suspended</span>
                                    @else
                                        <span class="badge rounded-pill text-bg-danger">Planning</span>
                                    @endif
                                </td>
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
                    <a href="{{ route('admin.projects.deleted') }}" class="btn btn-success">
                        Deleted items
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
