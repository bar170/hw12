@extends('layout.root')

@section('title', $company->name)

@section('body')
<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-sm">
                <div class="card-body p-4">

                    <h1 class="fw-bold mb-3">
                        {{ $company->name }}
                    </h1>

                    <p class="text-muted mb-4">
                        ID компании: <span class="fw-semibold">{{ $company->id }}</span>
                    </p>

                    @if($company->created_at)
                        <p class="small text-muted mb-4">
                            Создана: {{ $company->created_at->format('d.m.Y H:i') }}
                        </p>
                    @endif

                    @if($company->description)
                        <div class="mb-4">
                            <h5 class="fw-bold mb-2">Описание</h5>
                            <p class="text-secondary">
                                {{ $company->description }}
                            </p>
                        </div>
                    @endif

                    <div class="d-flex gap-2 mt-4">
                        <a href="{{ route('companies.index') }}" class="btn btn-outline-secondary">
                            ← Назад к списку
                        </a>

                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning">
                            Редактировать
                        </a>

                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST"
                              onsubmit="return confirm('Удалить компанию?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                                Удалить
                            </button>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
