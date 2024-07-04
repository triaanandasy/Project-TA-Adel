@extends('auth.layout')
@section('content')

<style>
    .form-filled {
        background-color: red !important;
    }
</style>
    <form action="{{route('login.post')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  oninput="checkFormFilled()">
        </div>
        <div class="mb-4">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1"  oninput="checkFormFilled()">
        </div>
        <button type="submit" class="btn w-100 py-8 fs-4 mb-4 rounded-2" style="background-color: #e26464; color:black">Login</button>
    </form>

    <script>
        function checkFormFilled() {
            const email = document.getElementById('exampleInputEmail1').value;
            const password = document.getElementById('exampleInputPassword1').value;
            const form = document.getElementById('loginForm');

            if (email !== '' && password !== '') {
                form.classList.add('form-filled');
            } else {
                form.classList.remove('form-filled');
            }
        }
    </script>
@endsection
