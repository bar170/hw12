@extends('admin.layouts.admin')

@section('title', 'Добавление компании')

@section('content')
    <div class="col-lg-8">

        <div class="card shadow-sm">
            <div class="card-body p-4">

                <h1 class="fw-bold mb-4">Добавление компании</h1>

                <form method="POST" action="{{ route('admin.companies.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Название компании</label>
                        <input type="text"
                               name="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}"
                               placeholder="Введите название"
                               required>

                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Описание</label>
                        <textarea name="description"
                                  rows="4"
                                  class="form-control @error('description') is-invalid @enderror"
                                  placeholder="Введите описание компании">{{ old('description') }}</textarea>

                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('admin.companies.index') }}" class="btn btn-outline-secondary">Отмена</a>
                        <button class="btn btn-success">Добавить</button>
                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection
