<div id="mobile-sidebar"
     class="fixed inset-0 bg-black/40 z-40 hidden"
     onclick="this.classList.add('hidden')">

    <div class="absolute left-0 top-0 w-64 h-full bg-white shadow p-4"
         onclick="event.stopPropagation()">

        @include('layout.sidebar')

    </div>
</div>
