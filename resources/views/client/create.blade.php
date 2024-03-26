@extends('layouts.master')

@section('title', 'Create Transaction')

@section('content')
    <div class="container">
        <h1>Create Transaction</h1>
        <div class="row">
            <div class="col-md-4">
                <form action="{{ route('client.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="TName" class="control-label">Transaction Name</label>
                        <input type="text" class="form-control" name="TName" id="TName" required
                            value="{{ old('TName') }}" />
                    </div>

                    <div class="form-group">
                        <label for="Revenue" class="control-label">Revenue</label>
                        <input type="number" step="0.01" class="form-control" name="Revenue" id="Revenue" required
                            value="{{ old('Revenue') }}" />
                    </div>

                    <div class="form-group">
                        <label for="Expense" class="control-label">Expense</label>
                        <input type="number" step="0.01" class="form-control" name="Expense" id="Expense" required
                            value="{{ old('Expense') }}" />
                    </div>

                    {{-- <div class="form-group">
                        <label for="Category" class="control-label">Category</label>
                        <select class="form-control" name="Category" id="Category">
                            <option value="Undetermined">Undetermined</option>
                        </select>
                    </div> --}}

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
