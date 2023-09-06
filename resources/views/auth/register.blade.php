@extends('auth.auth_layout')
@section('content')
    @section('heading')
    Register
@endsection
 <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label>Name<span class="login-danger">*</span></label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>                                <span class="profile-views"><i class="fas fa-user-circle"></i></span>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email <span class="login-danger">*</span></label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <span class="profile-views"><i class="fas fa-envelope"></i></span>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Role <span class="login-danger">*</span></label>
                                <select name="role" class="form-control @error('role') is-invalid @enderror" id="role">
                                    <option value="">__select role__</option>
                                    <option value="student">Student</option>
                                    <option value="librarian">Librarian</option>
                                    <option value="bursar">Bursar</option>
                                    <option value="class_teacher">Class Teacher</option>
                                    <option value="matron_patron">Matron/Patron</option>
                                    <option value="store_keeper">Store Keeper</option>
                                    <option value="academic_master">Academic Master</option>
                                    <option value="head_master">Head Master</option>
                                </select>
                                <span class="profile-views"><i class="fas fa-user"></i></span>
                                @error('role')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>{{ __('Password') }} <span class="login-danger">*</span></label>
                                <input id="password" type="password" class="form-control pass-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <span class="profile-views feather-eye toggle-password"></span>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>{{ __('Confirm Password') }}<span class="login-danger">*</span></label>
                                <input id="password-confirm" type="password" class="form-control pass-confirm" name="password_confirmation" required autocomplete="new-password">
                                <span class="profile-views feather-eye reg-toggle-password"></span>
                            </div>
                            <div class="form-group mb-0">
                                <button class="btn btn-primary btn-block login-button" type="submit">Register</button>
                            </div>
                        </form>

@endsection