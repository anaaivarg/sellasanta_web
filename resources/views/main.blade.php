<x-layouts.layout>
    @auth
        <div class="card bg-base-100 image-full w-96 shadow-sm">
            <figure>
                <img
                    src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                    alt="Shoes" />
            </figure>
            <div class="card-body">
                <h2 class="card-title">Card Title</h2>
                <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
                <div class="card-actions justify-end">
                    <button class="btn btn-primary">Buy Now</button>
                </div>
            </div>
        </div>
    @endauth
    <div
        class="hero h-full "
        style="background-image: url(https://img.daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.webp);"
    >
        <div class="hero-overlay"></div>
        <div class="hero-content text-neutral-content text-center">
            <div class="max-w-md">
                <h1 class="text-5xl font-bold ">Bienvenido</h1>
                <p class="mb-5">
                    Lleva el control escolar
                </p>
                <button class="btn btn-primary">Entrar</button>
            </div>
        </div>
    </div>

</x-layouts.layout>
