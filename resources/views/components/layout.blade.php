<!DOCTYPE html>
<header class="bg-white">
  <div class="mx-auto flex h-16 max-w-screen-fit items-center gap-8 px-4 ">

    <div class="flex flex-1 items-center md:justify-between">
      <ul class="flex justify-start gap-6 text-sm">
        <li>
          <a class="text-gray-500 transition hover:text-gray-500/75" href="/home"> Home </a>
        </li>

        <li>
          <a class="text-gray-500 transition hover:text-gray-500/75" href="/about"> About </a>
        </li>
      </ul>

      <div class="self-end gap-4">
        <div class="">
          <a
            class="block rounded-md bg-red-400 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-red-700"
            href="" id="logoutButton"
          >
            Log off
          </a>

          <!-- Log out form -->
          <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>

        </div>

      </div>
    </div>
  </div>
<script>
    document.getElementById('logoutButton').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default link behavior
        
        // Submit the form
        document.getElementById('logoutForm').submit();
    });
</script>
</header>

<body>
    {{ $slot; }}
</body>



{{-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About</title>
</head>
<body>
    <nav>
        <a href="/home">home</a>
        <a href="/about">about</a>
    </nav>
    
    {{ $slot; }}
</body>
</html> --}}