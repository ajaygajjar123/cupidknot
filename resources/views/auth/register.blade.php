@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <a href="{{ url('auth/google') }}" class="btn  login-with-google-btn" >
                            Sign Up with Google
                        </a>
                        <hr>
                        <div class="row mb-3">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                             <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                                
                            <label for="bod" class="col-md-4 col-form-label text-md-right">{{ __('Birth Of Date') }}</label>
                             <div class="col-md-6">
                                <input class="date form-control @error('bod') is-invalid @enderror" type="date" value="{{ old('bod') }}" id="bod" name="bod" autofocus required> 
                                @error('bod')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="annual_income" class="col-md-4 col-form-label text-md-right">{{ __('Annual Income') }}</label>
                             <div class="col-md-6">
                                <input id="annual_income" type="number" class="form-control @error('annual_income') is-invalid @enderror" name="annual_income" value="{{ old('annual_income') }}" required autocomplete="annual_income" autofocus>

                                @error('annual_income')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                             <div class="col-md-6">
                                <input type="radio" name="gender" id="gender" value="male">Male
                                <input type="radio" name="gender" id="gender" value="male">Female
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="occupation" class="col-md-4 col-form-label text-md-right">{{ __('Occupation') }}</label>
                             <div class="col-md-6">
                            <select class="form-control" name="occupation" id="occupation">
                                <option value="private">Private Job</option>
                                <option value="government">Government job</option>
                                <option value="business">Business</option>
                            </select>
                            @error('occupation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="occupation" class="col-md-4 col-form-label text-md-right">{{ __('Family Type') }}</label>
                             <div class="col-md-6">
                            <select class="form-control" name="family_type" id="family_type">
                                <option value="joint">Joint Family</option>
                                <option value="nuclear">Nuclear Family</option>
                            </select>
                            @error('family_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="occupation" class="col-md-4 col-form-label text-md-right">{{ __('Manglik') }}</label>
                             <div class="col-md-6">
                            <select class="form-control" name="manglik" id="manglik">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                            @error('manglik')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    
    $('.date').datepicker({    
        format: "dd-mm-yyyy" 
    });
  
     
    $(document).ready(function(){

     var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
        removeItemButton: true,
        maxItemCount:3,
        searchResultLimit:5,
        renderChoiceLimit:5
     });


     });
</script>
@endsection
