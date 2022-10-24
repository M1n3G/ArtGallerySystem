<head>
  <link rel="stylesheet" type="text/css" href="{{ asset('Css/register.css') }}">
</head>

<div class="container py-5 h-100">
  <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
      <div class="card bg-white text-white" style="border-radius: 1rem;" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <div class="card-body p-5 text-center">

          <div class="md-5 mt-md-4 pb-5">

            <h2 class="fw-bold mb-2 text-uppercase" style="color:black">Sign Up</h2>
            <p class="text-black-50 mb-5">Sign up to collect art by the world’s leading artists</p>

            <div class="form-outline" style="margin-bottom: 45px;">
              <input type="name" id="username" class="form-control form-control-lg" style="height:50px;" />
              <label class="form-label">Username</label>
            </div>
            
            <div class="form-outline" style="margin-bottom: 45px;">
              <input type="email" id="email" class="form-control form-control-lg" style="height:50px;" />
              <label class="form-label">Email</label>
            </div>

            <div class="form-outline" style="margin-bottom: 45px;">
              <input type="password" id="password" class="form-control form-control-lg" style="height:50px;" />
              <label class="form-label">Password</label>
            </div>

            <div class="form-outline" style="margin-bottom: 45px;">
              <input type="password" id="conPassword" class="form-control form-control-lg" style="height:50px;" />
              <label class="form-label">Confirm Password</label>
            </div>
            

            <button class="btn registerBtn btn-dark btn-lg" style="margin-top: 30px;" type="submit">Sign Up</button>

          </div>

          <div>
            <p class="mb-0 text-black">Already have an account? <a href="/login" class="text-black-50 fw-bold">Sign In</a>
            </p>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>