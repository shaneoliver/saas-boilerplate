@extends('admin.base')

@section('admin.content')

<div class="card">
    <div class="card-header">
        {{ __('Update Plan') }}
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.plan.update', $plan) }}">
            @csrf
            @method('PATCH')

            {{-- Begin name --}}
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $plan->name) }}" required autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            {{-- End name --}}

            {{-- Begin description --}}
            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                <div class="col-md-6">
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description', $plan->description) }}" required>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            {{-- End description --}}

            {{-- Begin slug --}}
            <div class="form-group row">
                <label for="slug" class="col-md-4 col-form-label text-md-right">{{ __('Slug') }}</label>

                <div class="col-md-6">
                    <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug', $plan->slug) }}">

                    @error('slug')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            {{-- End slug --}}

            {{-- Begin plan_id --}}
            <div class="form-group row">
                <label for="plan_id" class="col-md-4 col-form-label text-md-right">{{ __('Plan ID') }}</label>

                <div class="col-md-6">
                    <input id="plan_id" type="text" class="form-control @error('plan_id') is-invalid @enderror" name="plan_id" value="{{ old('plan_id', $plan->plan_id) }}" readonly>

                    @error('plan_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            {{-- End plan_id --}}

            {{-- Begin amount --}}
            <div class="form-group row">
                <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>

                <div class="col-md-6">
                    <input id="amount" type="number" min="0" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount', $plan->amount) }}">

                    @error('amount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            {{-- End amount --}}

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update Plan') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card mt-5">
    <div class="card-body">
        <form action="{{ route('admin.plan.destroy', $plan) }}" method="POST">
            @csrf 
            @method('delete')
            <button class="btn btn-danger">
                @if ($plan->trashed())
                    Restore Plan
                @else 
                    Deactivate Plan
                @endif
            </button>
        </form>
    </div>
</div>
    
@endsection
