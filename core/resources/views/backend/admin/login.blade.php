<title>Admin Login | Invento</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="global-container">
    <div class="card login-form">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-body">
            <h3 class="card-title text-center">Admin Login</h3>
            <div class="card-text">
                <form action="{{ route('admin.login') }}" method="POST">
                @csrf
                <!-- to error: add class "has-danger" -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address or Username</label>
                        <input type="text" name="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control form-control-sm" id="exampleInputPassword1">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>

                    <div class="sign-up">
                        Don't have an account? <a href="{{ route('admin.register') }}">Create One</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    html,body {
        height: 100%;
    }

    .global-container{
        height:100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f5f5f5;
    }

    form{
        padding-top: 10px;
        font-size: 14px;
        margin-top: 30px;
    }

    .card-title{ font-weight:300; }

    .btn{
        font-size: 14px;
        margin-top:20px;
    }


    .login-form{
        width:330px;
        margin:20px;
    }

    .sign-up{
        text-align:center;
        padding:20px 0 0;
    }

    .alert{
        margin-bottom:-30px;
        font-size: 13px;
        margin-top:20px;
    }
</style>

