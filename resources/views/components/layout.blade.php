<!DOCTYPE html>
<header class="bg-white shadow-md mb-2">
  <div class="mx-auto flex h-16 max-w-screen-fit items-center gap-8 px-4 ">

    <div class="flex flex-1 items-center justify-between">
      <ul class="flex justify-start gap-6">
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
            class="block rounded-md bg-red-400 px-5 py-2.5 font-medium text-white transition hover:bg-red-700"
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
