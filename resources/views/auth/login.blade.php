<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div class="flex items-center justify-center h-screen">
        <div class="p-10 rounded-md border-2 border-gray-200">
            <div class="mx-auto max-w-lg text-center">
                <h1 class="text-2xl font-bold sm:text-3xl">Login</h1>
            </div>

            <form method="POST" action="/login" class="mx-auto mb-0 mt-8 max-w-md space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-medium text-gray-700"> Email </label>

                    <input type="email" id="email" name="email" placeholder="john@rhcp.com" value="{{ old('email') }}"
                        class="mt-1 w-full rounded-md border-2 border-gray-200 shadow-sm sm:text-sm p-2" />
                    
                    @error('email')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-xs font-medium text-gray-700"> Password </label>

                    <input type="password" id="password" name="password" placeholder="Enter your password"
                        class="mt-1 w-full rounded-md border-2 border-gray-200 shadow-sm sm:text-sm p-2" />

                    @error('password')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex items-center justify-center">
                    <button type="submit"
                        class="inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white">
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h2 class="text-center">Login</h2>
                <form>
                    <div class="mb-3">
                        <label for="username" class="form-label">Email</label>
                        <input type="text" class="form-control" id="username" placeholdautocmd BufRead,BufNewFile *.html set ft=html.javascripter="Enter username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter password">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
</body>

</html>
