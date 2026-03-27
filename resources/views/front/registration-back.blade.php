<style>
@media (min-width:1000px) {
  .w-20 {
    width: 22%!important;
}
}
@media (max-width:998px) {
  .w-20 {
    width: 40%!important;
}
}
@media (max-width:650px) {
  .w-20 {
    width: 80%!important;
}
}
.mt-15{
  margin-top: 15%;
}
</style>
@include('front.layouts.header')
<div class="container mt-15 w-20">
<div class="bg-white shadow p-4">
  <h2>Registeration</h2>
  @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('fail'))
    <div class="alert alert-danger">
        {{ session('fail') }}
    </div>
@endif
  <form action="{{route('register')}}" method="post" onsubmit="return validateb11()" name="f4" id="myForm">
    @csrf
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="text" class="form-control" placeholder="Enter email" name="email">
      <span id="email" class="err" style="color:red"></span>
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control"  placeholder="Enter password" name="password">
      <span id="password" class="err" style="color:red"></span>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{url('login')}}" class="btn btn-success">Login</a>
  </form>
</div>
</div>
<script type="text/javascript">
function validateb11() {
    var email = document.f4.email.value;
    var password = document.f4.password.value;

    var emailRegx =
        /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    var status = true;
    $('.err').html('');

    if (email == "") {
        document.getElementById("email").innerHTML =
            " Please enter email";
        status = false;
    }
	else if (emailRegx.test(String(email).toLowerCase()) == false) {
        document.getElementById("email").innerHTML =
            "Please Enter valid email address";
        status = false;
    }
    
    if (password == "") {
        document.getElementById("password").innerHTML =
            " Please Enter Password";
        status = false;
    }
    
    return status;
}
</script>
@include('front.layouts.footer')