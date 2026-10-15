{{-- Main navbar --}}
<nav class="container hidden lg:block mx-auto my-8 text-gray-700 font-semibold text-center">
    <ul class="px-4 flex justify-around">
        <li
            class="pb-2 {{ (request()->is('klima-uredaji') || request()->is('klima-uredaji/search')) ? 'text-indigo-700  border-b-4 rounded-b border-indigo-700' : 'hover:text-indigo-700 transition duration-150'}}">
            <a class="pb-3" href="/klima-uredaji">KLIMA UREĐAJI SHOP</a>
        </li>
        <li
            class="pb-2">
            <a class="pb-3" href="#">LINK 1</a>
        </li>
        <li
            class="pb-2">
            <a class="pb-3" href="#">LINK 2</a>
        </li>
        <li
            class="pb-2 ">
            <a class="pb-3" href="#">LINK 3</a>
        </li>
    </ul>
</nav>