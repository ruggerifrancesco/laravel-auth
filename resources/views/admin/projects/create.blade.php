@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6>
                        <strong>Create new Project</strong>
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.projects.store') }}" method="POST" class="row g-3">
                      @csrf

                        <div class="col-md-6">
                            <div class="form-floating {{ $errors->has('title') ? 'is-invalid' : '' }}">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Title" required>
                                <label for="title">Title</label>
                            </div>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating {{ $errors->has('goals') ? 'is-invalid' : '' }}">
                                <input type="text" class="form-control @error('goals') is-invalid @enderror" id="goals" name="goals" placeholder="Goals" required>
                                <label for="title">Goals</label>
                            </div>
                            @error('goals')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-group">
                            <div class="form-floating {{ $errors->has('description') ? 'is-invalid' : '' }}">
                                <textarea class="form-control @error('description') is-invalid @enderror"" aria-label="Description" name="description" placeholder="Description" required></textarea>
                                <label for="title">Description</label>
                            </div>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating {{ $errors->has('nPartecipants') ? 'is-invalid' : '' }}">
                                <input type="text" class="form-control @error('nPartecipants') is-invalid @enderror" id="nPartecipants" name="nPartecipants" placeholder="Partecipants" required>
                                <label for="title">Partecipants</label>
                            </div>
                            @error('nPartecipants')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating {{ $errors->has('budget') ? 'is-invalid' : '' }}">
                                <input type="text" class="form-control @error('budget') is-invalid @enderror" id="budget" name="budget" placeholder="Budget" required>
                                <label for="title">Budget</label>
                            </div>
                            @error('budget')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
