<x-app-layout>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{mix('css/bootstraps/userSettings.css')}}">


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container light-style flex-grow-1 container-p-y">

                    <h4 class="font-weight-bold py-3 mb-4">
                        Account settings
                    </h4>
                    <form method="POST" enctype="multipart/form-data" action="{{ route('user.viewUser.update',[app()->getLocale(),$viewUser = Auth::id()]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="card overflow-hidden">
                            <div class="row no-gutters row-bordered row-border-light">
                                <div class="col-md-3 pt-0">
                                    <div class="list-group list-group-flush account-settings-links">
                                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
                                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
                                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Info</a>
                                    </div>
                                </div>

                                <div class="col-md-9">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="account-general">

                                            <div class="card-body media align-items-center">
                                                <img style="width : 200px; height :200px; object-fit:cover" id="blah" src='{{isset($user["profile_photo_path"]) ? asset($user["profile_photo_path"]): "https://bootdey.com/img/Content/avatar/avatar1.png" }}' alt="">
                                                <div class="media-body ml-4">
                                                    <label class="btn btn-outline-primary">
                                                        Upload new photo

                                                        <input id="imgInp" type="file" name="profile_photo_path" class="account-settings-fileinput" />
                                                    </label> &nbsp;
                                                    <button type="button" onclick="myFunction()" class="btn btn-default md-btn-flat">Reset</button>
                                                    @error('profile_photo_path')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <hr class="border-light m-0">

                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input type="hidden" name="id" value='{{$user["id"]}}' />

                                                    @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <label class="form-label">Username</label>

                                                    <input type="text" id="name" name="name" class="form-control mb-1" value='{{$user["name"]}}' placeholder='{{isset($user["name"]) ? $user["name"]: "Please put your nickname" }}' />
                                                </div>
                                                <div class="form-group">
                                                    @error('first_name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" id="first_name" name="first_name" class="form-control mb-1" value='{{$user["first_name"]}}' placeholder='{{isset($user["first_name"]) ? $user["first_name"]: "Please put your first name" }}' />
                                                </div>
                                                <div class="form-group">
                                                    @error('last_name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" id="last_name" name="last_name" class="form-control mb-1" value='{{$user["last_name"]}}' placeholder='{{isset($viewUser["last_name"]) ? $user["last_name"]: "Please put your last name" }}' />
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="account-change-password">
                                            <div class="card-body pb-2">
                                                @csrf
                                                <div class="form-group">
                                                    @error('password')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <label class="form-label">Current password</label>
                                                    <input type="password" id="password" name="password" class="form-control" />
                                                </div>

                                                <div class="form-group">
                                                    @error('new_password')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <label class="form-label">New password</label>
                                                    <input type="password" id="new_password" name="new_password" class="form-control" />
                                                </div>

                                                <div class="form-group">
                                                    @error('confirm_password')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <label class="form-label">Repeat new password</label>
                                                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" />
                                                </div>

                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="account-info">
                                            <div class="card-body pb-2">

                                                <div class="form-group">
                                                    @error('description')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <label class="form-label">Bio</label>
                                                    <textarea class="form-control" name="description" placeholder='{!!isset($user["description"]) ? $user["description"]: "You don`t have description. Please put your description here  " !!}' rows="5">{!!$user["description"]!!}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    @error('born_year')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                    <label class="form-label">Birthday</label>
                                                    <input id="datepicker" width="276" name="born_year" class="form-control mb-1" value='{{$user["born_year"]}}' placeholder='{{isset($user["born_year"]) ? $user["born_year"]: "Please choise your birthday" }}' />
                                                </div>



                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-right mt-3">
                            <input type="submit" class="btn btn-primary" value="Save changes" />&nbsp;
                            <button type="button" class="btn btn-default">Cancel</button>
                        </div>
                    </form>
                </div>
                <script>
                    $('#datepicker').datepicker({
                        uiLibrary: 'bootstrap4',
                        format: 'yyyy-mm-dd'
                    });

                    function myFunction() {

                        document.getElementById('imgInp').value = '';
                        document.getElementById("blah").src = '{{$user["profile_photo_path"]}}';


                    };

                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function(e) {
                                $('#blah').attr('src', e.target.result);
                            }

                            reader.readAsDataURL(input.files[0]); // convert to base64 string
                        }
                    }

                    $("#imgInp").change(function() {
                        readURL(this);
                    });
                </script>
                <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

            </div>
        </div>
    </div>
</x-app-layout>