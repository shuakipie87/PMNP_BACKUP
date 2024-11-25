
<div class="card-body">
    <form method="POST" class="dashboard">
        @method('POST')
        @csrf

        @php
            // var_dump($query_data);
        @endphp 

        <div class="form-row">
            <div class="col-12">
                Filter Options:
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <input type="text" name="region" class="form-control" placeholder="Region" value="{{ old('region', $query_data['region'] ?? null) }}" />
            </div>
            <div class="col">
                <input type="text" name="province" class="form-control" placeholder="Province" value="{{ old('region', $query_data['province'] ?? null) }}" />
            </div>
            <div class="col">
                <input type="text" name="municipality" class="form-control" placeholder="Municipality" value="{{ old('region', $query_data['municipality'] ?? null) }}" />
            </div>
            <div class="col">
                <input type="text" name="year" class="form-control" placeholder="Year" value="{{ old('region', $query_data['year'] ?? null) }}" />
                <input type="submit" class="form-control"  @style([
                    'display: none'
                ])>
            </div>
            <div class="col">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#assignTaskModal">Add New</button>
            </div>
        </div>
    </form>
    <div class="filter-loaded">
        <span class="loaded-icon"></span>
    </div>
</div>

<!-- Logout Modal-->
@include('admin.tasks.assign-task')