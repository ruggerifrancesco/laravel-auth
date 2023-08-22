@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <span>ID: {{ $project->id }}</span>
                    <div class="status">
                        @if ($project->isCompleted)
                        <span class="badge rounded-pill text-bg-success">Completed</span>
                        @endif
                        @if ($project->isSuspended)
                            <span class="badge rounded-pill text-bg-warning">Suspended</span>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="text-center">
                        Title: <strong>{{ $project->title }}</strong>
                    </h4>

                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Description Project
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    {{ $project->description }}
                                </p>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Goals
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>
                                    @foreach (json_decode($project->goals) as $goal)
                                        <li>{{ $goal }}</li>
                                    @endforeach
                                </ul>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Miscellaneous
                            </button>
                          </h2>
                          <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    Partecipants: {{ $project->nPartecipants }}
                                </p>
                                <p>
                                    Budget: {{ $project->budget }}$
                                </p>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="card-footer">
                    Buttons 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
