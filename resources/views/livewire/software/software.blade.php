<div>
    <section class="bg-zinc-50 dark:bg-zinc-950 p-5 mt-4">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-5">
            <p class="font-light text-gray-800 sm:text-xl dark:text-amber-500">Welcome to our website and download your best software for free.</p>
 
            <div class="relative w-100 mt-4">
              
                <form class="flex items-center mx-auto">   
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        @if(request('os'))
                        <input type="hidden" name="os" value="{{request('os')}}">
                        @endif
                        <input  name="search"  type="text" id="simple-search" class="bg-zinc-50 border-amber-500 text-zinc-950 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block dark:bg-zinc-900 dark:text-zinc-100 w-full ps-10 p-2.5" placeholder="Search Software..." required />
                    </div>
                    <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-amber-500 rounded-lg border-amber-700 hover:bg-amber-600 focus:outline-none focus:ring-amber-300 ">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </form>

            </div>


        </div> 

        @if( $Software->count())
        
                @if(request('os'))
                    <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-bold text-zinc-900 dark:text-amber-500">
                        Software for {{ $Software->first()->os->name ?? 'Unknown OS' }}
                    </h2>
                @else
                    <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-bold text-zinc-900 dark:text-amber-500">
                        New Software
                    </h2>
                @endif

        <div class="grid gap-3 lg:grid-cols-6 sm:grid-cols-4 ">

            @foreach ($Software as $post)
            
            <article class="p-6 bg-zinc-100 rounded-lg dark:bg-zinc-800  shadow-md">
                <div class="flex justify-between items-center mb-4  text-zinc-90 ">
                    <a href="?os={{ $post->os->slug }}" class="hover:text-zinc-800">
                        <span class="bg-amber-300 text-primary-800 text-xs font-bold inline-flex items-center px-2.5 py-0.5 rounded uppercase ">
                            {{ $post->os->name }}
                        </span>
                    </a>
                </div>
                <div class="flex items-center space-x-4 sm:max-w-xs md:max-w-md lg:max-w-lg xl:max-w-xl"> 
                    <a href="/detail/{{ $post->slug }}">
                        <img class="rounded-lg w-full h-auto" src="{{ $post->getFirstMediaUrl('icon') }}" alt="{{ $post->getFirstMediaUrl('icon') }}" />
                    </a>
                </div>
                <h3 class="mt-3 mb-1 md:text-sm lg:text-base font-bold tracking-tight text-zinc-900 dark:text-zinc-100"> {{ $post->name  }}</h3>
                <span class="text-xs  text-zinc-900 dark:text-amber-500">{{ $post->created_at->format('j F, Y')}}</span>
            </article>  

                @endforeach
            </div> 

            @else
                <p class = "text-center fs-4 mt-5  text-zinc-900 dark:text-amber-500">Softwere No Found</p>
            @endif

        </div>
        <div class= "d-flex justify-content-center my-5 bg-zinc-0 dark:bg-zinc-950 text-zinc-900 dark:text-amber-500">
            {{ $Software->links() }}
        </div>

    </section>

</div>

