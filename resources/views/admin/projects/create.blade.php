@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <form action="{{ route('admin.projects.store') }}" method="POST">
                @csrf

                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="m-0">
                            <strong>Create new Project</strong>
                        </h6>
                        <div>
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating {{ $errors->has('title') ? 'is-invalid' : '' }}">
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Project Name" required>
                                    <label for="title">Project Name</label>
                                </div>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating {{ $errors->has('nPartecipants') ? 'is-invalid' : '' }}">
                                    <input type="number" class="form-control @error('nPartecipants') is-invalid @enderror" id="nPartecipants" name="nPartecipants" placeholder="Partecipants" required>
                                    <label for="nPartecipants">Partecipants</label>
                                </div>
                                @error('nPartecipants')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <div class="input-group">
                                    <div class="form-floating {{ $errors->has('budget') ? 'is-invalid' : '' }}">
                                        <input type="text" class="form-control @error('budget') is-invalid @enderror" id="budget" name="budget" placeholder="Budget" aria-label="Dollar amount (with dot and two decimal places)" required>
                                        <label for="budget">Budget</label>
                                    </div>
                                    <span class="input-group-text">$</span>
                                    <span class="input-group-text">0.00</span>
                                </div>
                                @error('budget')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-group">
                                <div class="form-floating {{ $errors->has('description') ? 'is-invalid' : '' }}">
                                    <textarea class="form-control @error('description') is-invalid @enderror"" aria-label="Description" name="description" placeholder="Description" required></textarea>
                                    <label for="description">Description</label>
                                </div>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="form-floating {{ $errors->has('goals') ? 'is-invalid' : '' }}">
                                        <input type="text" class="form-control @error('goals') is-invalid @enderror" id="newGoal" placeholder="Goals">
                                        <label for="newGoal">Goals</label>
                                    </div>
                                    <button class="btn btn-outline-secondary" type="button" id="addGoalButton">Add Goal</button>
                                </div>
                                @error('goals')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <ul class="list-group" id="goalPreviewList">
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
