@extends('layout.app')

@section('content')
<div class="row">
    <div class="col-md-12 p-0">

        @if($errors->any())
        <div class="alert alert-success mt-2 text-center">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4>{{$errors->first()}}</h4>
        </div>
            
        @endif

        <form method="POST" action="{{ route('custom.login.submit') }}">
            @csrf

            <div class="col-md-12 border-bottom border-top ">

                <div class="row elements-mid-align">

                    <div class=" col-12 text-center">
                        <input id="email" type="email"
                            class="form-control text-center border-0 @error('email') is-invalid @enderror"
                            placeholder="E-mail address" name="email" value="{{ old('email') }}" required
                            autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="col-12  border-bottom">
                <div class="row elements-mid-align">
                    <div class=" col-12">
                        <input id="password" type="password"
                            class="form-control text-center border-0 @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password" placeholder="Password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                </div>
            </div>


            <div class="form-group row mb-0 mt-4">
                <div class="col-md-12 text-center">
                    <button type="submit" class="my-btn">
                        {{ __('Login') }}
                    </button>

                  
                </div>
            </div>
            <div class="form-group row text-center mt-3">
                <div class="col-md-12 ">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('footer-scripts')
<script>
    $('.logo').hide();

    $(".close-gallery")
        .removeClass("d-none")
        .addClass(" animation-duration2 fadeInDown");

    $(".close-gallery").click(function(e) {

      $(this).removeClass('fadeInDown').addClass('fadeOutUp');
      setTimeout(function() {
        window.location.href = "{{url()->previous() }}";
      });
  });
</script>
@endsection