@extends ('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
        <form action="{{route('register')}}" method="post">
            <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input type="text" name="name" id="name" placeholder="Your name" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">
            </div>

            <div class="mb-4">
                <label for="username" class="sr-only">Username</label>
                <input type="text" name="username" id="username" placeholder="Username" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">
            </div>

            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" id="email" placeholder="Email" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">
            </div>

            <div class="mb-4">
                <label for="password" class="sr-only">P{assword</label>
                <input type="password" name="password" id="password" placeholder="Password" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">
            </div>

            <div class="mb-4">
                <label for="password" class="sr-only">P{assword</label>
                <input type="password" name="password_confirmation" id="password" placeholder="Confirm your password" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">
            </div>


            

        </form>
    </div>
    </div>

    
@endsection