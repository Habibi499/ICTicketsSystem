


<style type="text/css">
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }

    #login-form {
        background-color: rgb(237, 238, 237);
        padding: 10px;
    }

    .form-outline {
        position: relative;
    }

    .form-outline label {
        position: absolute;
        top: 0;
        left: 10px;
        opacity: 0.5;
        pointer-events: none;
        transition: all 0.3s ease;
    }

    .form-outline input:focus + label,
    .form-outline input:not(:placeholder-shown) + label {
        top: -20px;
        font-size: 12px;
        opacity: 1;
    }
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#056936;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#" title="Powered by Robin Mwaura">ICT-DESK </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<div class="col-md-8">
            <h2 style="color:red"><marquee>System Upgrade Alert---We are upgrading ITickets Incase of any Hitch kindly contact Robinson

               </marquee>
              </h2>
</div>
<section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
            class="img-fluid" alt="Sample image">
        </div>
        
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1" id="login-form">
            <form action="{{ route('login') }}" method="post" id="login-form">
                @csrf
            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
           
          
            </div>
  
            <div class="divider d-flex align-items-center my-4">
              <p class="text-center fw-bold mx-3 mb-0">Login to your Account</p>
            </div>
  
          
            <div class="form-outline mb-4">
              <input type="email" name="email"   class="form-control form-control-lg @error('email') is-invalid @enderror" />
              <label class="form-label" for="EmailAdress">Email address</label>
            </div>
  
          
            <div class="form-outline mb-3">
              <input type="password" name="password"  id="form3Example4" class="form-control form-control-lg  @error('password') is-invalid @enderror"/>
              <label class="form-label" for="Password">Password</label>

              @error('email')
              <span class="error invalid-feedback">
                  {{ $message }}
              </span>
              @enderror
            </div>
  
            <div class="d-flex justify-content-between align-items-center">
             
              <div class="form-check mb-0">
                <input class="form-check-input me-2" type="checkbox" value="" id="RememberMe" />
                <label class="form-check-label" for="form2Example3">
                  Remember me
                </label>
              </div>
              @if (Route::has('password.request'))
              <p class="mb-1">
                  <a href="{{ route('password.request') }}">{{ __('Forgot Your Password ?') }}</a>
              </p>
          @endif
            </div>
           
            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-sm"
                style="padding-left: 2.5rem; padding-right: 2.5rem; background-color:#7ebb2b; color:white;">Login</button>
             <i class="fa fa-arrow-left"></i>
            </div>
  
          </form>
        </div>
      </div>
    </div>
    <div
      class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5" 
      style="background-color: #056936;">
  
      <div class="text-white mb-3 mb-md-0">
        Copyright &copy; <?php echo date("Y"); ?> All rights reserved.  
      </div>
      <div class="text-white mb-3 mb-md-0">
        <a href="#" title="Powered by Robin Mwaura" style="color:white;">&trade; ITickets Version 1.0.0</a>
      </div>

      <div class="text-white mb-3 mb-md-0">
        &reg; R
      </div>
    </div>
  </section>
  
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const formInputs = document.querySelectorAll('.form-outline input');

        formInputs.forEach((input) => {
            input.addEventListener('focus', function () {
                input.parentNode.querySelector('label').style.top = '-20px';
                input.parentNode.querySelector('label').style.fontSize = '12px';
                input.parentNode.querySelector('label').style.opacity = '1';
            });

            input.addEventListener('blur', function () {
                if (!input.value) {
                    input.parentNode.querySelector('label').style.top = '0';
                    input.parentNode.querySelector('label').style.fontSize = '';
                    input.parentNode.querySelector('label').style.opacity = '0.5';
                }
            });
        });
    });
</script>