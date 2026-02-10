@extends('admin.layouts.admin')

@section('title', 'Редактирование компании')

@section('content')
    <div class="col-lg-8">

        <div class="card shadow-sm">
            <div class="card-body p-4">

                <h1 class="fw-bold mb-4">
                    Редактирование компании
                </h1>

                {{-- Форма обновления --}}
                <form method="POST" action="{{ route('admin.companies.update', $company) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Id компании</label>
                        <input type="text"
                               name="id"
                               class="form-control @error('id') is-invalid @enderror"
                               value="{{ old('id', $company->id) }}"
                               readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Название компании</label>
                        <input type="text"
                               name="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $company->name) }}"
                               required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Описание</label>
                        <textarea name="description"
                                  rows="4"
                                  class="form-control @error('description') is-invalid @enderror">{{ old('description', $company->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Один ряд, одна форма, все кнопки вместе --}}
                    <div class="d-flex justify-content-between align-items-center flex-wrap">

                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.companies.index') }}" class="btn btn-light">
                                Назад к списку
                            </a>

                            <a href="{{ route('admin.companies.show', $company) }}" class="btn btn-light">
                                Режим просмотра
                            </a>

                            <button type="submit" class="btn btn-success">
                                Сохранить
                            </button>
                        </div>

                        {{-- Кнопка удаления, которая дергает скрытую форму --}}
                        <button type="button"
                                class="btn btn-danger"
                                onclick="if (confirm('Удалить компанию?')) { document.getElementById('delete-company-form').submit(); }">
                            Удалить
                        </button>
                    </div>
                </form>

                {{-- Скрытая форма удаления (отдельная, НЕ вложенная) --}}
                <form id="delete-company-form"
                      action="{{ route('admin.companies.destroy', $company) }}"
                      method="POST" class="d-none">
                    @csrf
                    @method('DELETE')
                </form>

            </div>
        </div>

    </div>
@endsection
