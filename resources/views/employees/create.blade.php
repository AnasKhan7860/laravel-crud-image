<x-layouts.app>
<div class="container">
        <h3 class="mt-5 text-center">Employee Create</h3>
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
                <div class="form-area">
                    <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label>Employee Name</label>
                                <input type="text" class="form-control" name="name"
                                value="{{ old('name')}}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Employee DOB</label>
                                <input type="date" class="form-control" name="date_of_birth"
                                value="{{ old('date_of_birth')}}">
                                @error('date_of_birth')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="phone"
                                value="{{ old('phone')}}">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image"
                                value="{{ old('image')}}">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <input type="submit" class="btn btn-info" value="Register">
                            </div>
                        </div>
                    </form>

                   
                </div>
               
        </div>
    </div>
</x-layouts.app>