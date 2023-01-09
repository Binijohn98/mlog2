<x-admin-master>


    @section('content')

        <h1>User Profile for : {{$user->name}}</h1>


       <div class="row">

               <div class="col-sm-6">

                       <form method="post" action="{{route('user.profile.update', $user)}}" enctype="multipart/form-data">
                               @csrf
                               @method('PUT')
                               
                               <div class="mb-4">
                                       <img class="img-profile rounded-circle" src="{{$user->avatar}}">
                               </div>
                               
                               <div class="form-group">
                                       <input type="file" name="avatar">
                               </div>


                               
                               <div class="form-group">
                                       <label for="name">Name</label>
                                       <input type="text"
                                              name="name"
                                              class="form-control @error('name') is-invalid @enderror"


                                              id="name"
                                              value="{{$user->name}}"

                                       >

                                       @error('name')
                                       <div class="invalid-feedback">{{$message}}</div>
                                       @enderror
                               </div>


                               <div class="form-group">
                                       <label for="email">Email</label>
                                       <input type="text"
                                              name="email"
                                              class="form-control @error('email') is-invalid @enderror"
                                              id="email"
                                              value="{{$user->email}}"

                                       >

                                       @error('email')
                                       <div class="invalid-feedback">{{$message}}</div>
                                       @enderror
                               </div>

                               <div class="form-group">
                                       <label for="password">Password</label>
                                       <input type="password"
                                              name="password"
                                              class="form-control @error('password') is-invalid @enderror"
                                              id="password"
                                       >

                                       @error('password')
                                       <div class="invalid-feedback">{{$message}}</div>
                                       @enderror
                               </div>


                               <div class="form-group">
                                       <label for="password-confirmation">Confirm Password</label>
                                       <input type="password"
                                              name="password_confirmation"
                                              class="form-control @error('password_confirmation') is-invalid @enderror"
                                              id="password-confirmation"


                                       >

                                       @error('password_confirmation')
                                       <div class="invalid-feedback">{{$message}}</div>
                                       @enderror
                               </div>



                               <button type="submit" class="btn btn-primary">Submit</button>
                       </form>

               </div>

       </div>

       <div class="row">
                <div class="col-sm-12">
                <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Options</th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <td>Assign</td>
                            <td>Remove</td>
                        </tr>

                   </thead>
                        
                        <tbody>
                        @foreach($roles as $role)
                        <tr>
                                        <td><input type="checkbox"
                                        @foreach($user->roles as $user_role)
                                                @if($user_role->slug == $role->slug)
                                                        checked
                                                @endif
                                        @endforeach
                                        ></td>
                                        <td>{{$role->id}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>{{$role->slug}}</td>
                                        <form method="post" action="{{route('user.role.attach',$user)}}">
                                                @method('PUT')
                                                @csrf

                                                <input type="hidden" name="role" value="{{$role->id}}">
                                        <td><button class="btn btn-primary"
                                        @if($user->roles->contains($role))
                                        disabled
                                        @endif
                                        >
                                                
                                        
                                        Assign</button></td>
                                        </form>
                                        
                                        <td>
                                        <form method="post" action="{{route('user.role.detach',$user)}}">
                                                @method('PUT')
                                                @csrf

                                                <input type="hidden" name="role" value="{{$role->id}}">
                                        <td><button class="btn btn-danger"
                                        @if(!$user->roles->contains($role))
                                        disabled
                                        @endif
                                        >Remove</button></td>
                                        </form>
                                        </td>

                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    @endsection
</x-admin-master>