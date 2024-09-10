<x-layouts.app>
<nav class="navbar navbar-light bg-light">
   <a href="{{ route('employees.create') }}" class="btn btn-primary">Create</a>
  <div class="text-center">      
       <h3 class="mt-3 text-center">Employee List</h3>
  </div>
  <form action="{{ route('logout') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <button class="btn btn-secondary">Logout</button>
  </form>
</nav>
        <div class="row">
         <div class="col-md-2">
          </div>
            <div class="col-md-10">
             <div class="text-center">
                <marquee>
                    @session('success')
                        {{ $value }}
                    @endsession
                </marquee>
             </div>
                <table class="table mt-5">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Employee Name</th>
                            <th scope="col">DOB</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Action</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employees as $employee)
                            <tr>
                                <td scope="col">{{ $loop->iteration + 10 * ($employees->currentPage() - 1) }}</td>
                                <td scope="col"><img src="{{ Storage::url($employee->image)}}" width="100px" height="50px"/></td>
                                <td scope="col">{{ $employee->name }}</td>
                                <td scope="col">{{ date('d M Y', strtotime($employee->date_of_birth)) }}</td>
                                <td scope="col">{{ $employee->phone }}</td>
                                <td scope="col">
                                    <a href="{{ route('employees.edit', $employee->id) }}">
                                        <button class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                        </button>
                                    </a>
                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                        style ="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td class="text-danger" colspan="5">No employee found!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {{ $employees->links() }}
                </div>

                
            </div>
            </div>
            </div>
</x-layouts.app>