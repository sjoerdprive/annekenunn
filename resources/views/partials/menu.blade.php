<div class="menu menu-desktop">


    @include('partials.nav')
</div>

<div x-data="{ open: false }" class="menu menu-mobile">
    <button @click="open = true" :aria-expanded="open" class="hamburger">
        <span class="sr-only">
            Hoofdmenu
        </span>
        <i class="fa-solid fa-bars fa-lg"></i>
    </button>


    <div class="menu-backdrop" x-show="open" x-transition.opacity>
    </div>


    <div @keydown.escape.window="open = false" @click.outside="open = false" x-show="open" class="menu-wrapper"
        x-trap="open" x-transition>
        <div class="close-wrapper">
            <button @click="open = false" :aria-expanded="open" class="close">
                <span class="sr-only">
                    Sluit hoofdmenu
                </span>
                <i class="fa-solid fa-xmark fa-lg"></i>
            </button>
        </div>

        @include('partials.nav')
    </div>


</div>
