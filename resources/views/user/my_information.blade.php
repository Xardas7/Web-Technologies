<h3 class="text-center mb-50 col-12">My Information</h3>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="row justify-content-center">
    <form class="col-8" action="{{ route('user.update',['id' => $user->id]) }}" method="POST">
    @csrf
    <div class="form-group row justify-content-center p-1">
        <label class="col-2 col-form-label">First Name</label>
        <div class="input-group-icon col-6">
            <div class="icon">
                <i class="fas fa-caret-right"></i>
            </div>
            <input type="text" name="name" placeholder="First Name" onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'First Name'" required class="single-input" value="{{$user->name}}">
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <label class="col-2 col-form-label">Last Name</label>
        <div class="input-group-icon col-6">
            <div class="icon">
                <i class="fas fa-caret-right" aria-hidden="true"></i>
            </div>
            <input type="text" name="surname" placeholder="Last Name" onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Last Name'" required class="single-input" value="{{$user->surname}}">
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <label for="example-date-input" class="col-2 col-form-label">Birthdate</label>
        <div class="input-group-icon col-6">
            <div class="icon">
                <i class="fas fa-birthday-cake" aria-hidden="true"></i>
            </div>
            <input class="form-control" name="birth_date" type="date" value="{{$user->birth_date}}"
                id="example-date-input">
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <label class="col-2 col-form-label">Email</label>
        <div class="input-group-icon col-6">
            <div class="icon">
                <i class="fas fa-envelope" aria-hidden="true"></i>
            </div>
            <input type="email" name="email" placeholder="Email address" onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Email address'" required class="single-input" value="{{$user->email}}">
        </div>
    </div>

    <div class="form-group row justify-content-center">
        <label class="col-2 col-form-label">Sex</label>
        <div class="input-group-icon col-6">
            <div class="icon">
                <i class="fas fa-venus-mars" aria-hidden="true"></i>
            </div>
                <select class="form-control padding" name="sex">
                    <option value="male" {{$user->sex == 'male' ? 'selected' : ''}}>Male
                    </option>
                    <option value="female" {{$user->sex == 'female' ? 'selected' : ''}}>Female
                    </option>
                    <option value="undefined" {{$user->sex == 'undefined' ? 'selected' : ''}}>
                        Undefined</option>
                </select>
        </div>
    </div>



    <div class="text-center mt-30">
        <button class="btn btn-success btn-save" type="submit">Save</button>
    </div>
</form>
</div>
