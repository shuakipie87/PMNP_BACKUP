<!-- Form -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form</h6>
    </div>
    <div class="card-body">

        <form method="POST" class="profile">
            @method('POST')
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1">Name</label>
                <input class="form-control" name="name" id="exampleFormControlInput1" type="text" value="{{ old('name', $query_row->name ?? null) }}" placeholder="Name" />
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1">Email address</label>
                <input class="form-control" name="email" id="exampleFormControlInput1" type="email" value="{{ old('email', $query_row->email ?? null) }}" placeholder="Email" />
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1">Password</label>
                <input class="form-control" name="password" id="exampleFormControlInput1" type="text" value="{{ old('password', '') }}" placeholder="Password" />
            </div>
            <div class="mb-3">
                @php 
                    $gender_value = $query_row->gender ?? 0;
                @endphp
                <label for="exampleFormControlSelect1">Gender</label>
                <select name="gender" class="form-control" id="exampleFormControlSelect1">
                    <option value="1" @selected($gender_value === 1)>Male</option>
                    <option value="2" @selected($gender_value === 2)>Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1">Phone</label>
                <input class="form-control" name="phone" id="exampleFormControlInput1" type="text" value="{{ old('phone', $query_row->phone ?? null) }}" placeholder="Phone" />
            </div>
            <div class="mb-3">
                <label for="exampleFormControlSelect2">Country</label>
                <select class="form-control" id="exampleFormControlSelect2" multiple="">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="mb-3">
                @php
                    $region_id = $query_row->region_id ?? 0;
                @endphp
                <label for="exampleFormControlSelect2">Region</label>
                <select class="form-control" id="exampleFormControlSelect2">
                    @foreach($regions as $region)
                        <option value="{{ $region->id }}" @selected($region_id === $region->id)> {{ $region->name .' - '. $region->sector }} </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1">Address (1)</label>
                <input class="form-control" name="address1" id="exampleFormControlInput1" type="text" value="{{ old('address1', $query_row->address1 ?? null) }}" placeholder="Address 1" />
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1">Address (2)</label>
                <input class="form-control" name="address2" id="exampleFormControlInput1" type="text" value="{{ old('address2', $query_row->address2 ?? null) }}" placeholder=" Address 2" />
            </div>
            <div class="mb-3">
                <!-- Date Range Picker Example-->
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <input type="submit" value="Update" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>