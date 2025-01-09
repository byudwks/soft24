<div>
    <section class="not-format mt-5  border-t border-zinc-400 dark:border-amber-500">
        <div class="flex justify-between items-center mt-3 mb-6">
            <h2 class="text-lg lg:text-2xl font-bold text-zinc-950 dark:text-zinc-50 mt-3">Discussion
                ({{ $total_coment }})</h2>
        </div>

        <form wire:submit.preven="store" class="mb-6">

            <label for="input-group-1" class="block mb-2 text-sm font-medium text-zinc-950 dark:text-zinc-50">Your
                Email</label>
            <div class="relative mb-6">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-zinc-950 dark:text-zinc-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                        <path
                            d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                        <path
                            d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                    </svg>
                </div>
                <input wire:Model.defer="email" type="email" id="input-group-1"
                    class="bg-zinc-50  border-zinc-300 text-zinc-950 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full ps-10 p-2.5  dark:bg-zinc-950 dark:border-zinc-950 dark:placeholder-zinc-400 dark:text-zinc-50 dark:focus:ring-amber-500 dark:focus:border-amber-500"
                    placeholder="youremail@.com" required>
            </div>

            <label for="input-group-1" class="block mb-2 text-sm font-medium text-zinc-950 dark:text-zinc-50">Your
                Name</label>
            <div class="relative mb-6">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-zinc-950 dark:text-zinc-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                    </svg>
                </div>
                <input wire:Model.defer="nama" type="text" id="input-group-1"
                    class="bg-zinc-50  border-zinc-300 text-zinc-950 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full ps-10 p-2.5  dark:bg-zinc-950 dark:border-zinc-950 dark:placeholder-zinc-400 dark:text-zinc-50 dark:focus:ring-amber-500 dark:focus:border-amber-500"
                    placeholder="Your name" required>
            </div>

            <div
                class="py-2 px-4 mb-4 mt-4 bg-zinc-50 rounded-lg rounded-t-lg boder border-zinc-400 dark:bg-zinc-950 dark:border-amber-500">
                <label for="comment" class="sr-only">Your comment</label>
                <textarea wire:Model.defer="komentar" id="comment" rows="6"
                    class="form-control px-0 w-full text-sm text-zinc-950 border-0 focus:ring-0 bg-zinc-50  dark:text-zinc-50 dark:placeholder-zinc-400 dark:bg-zinc-950"
                    placeholder="Write a comment..." required></textarea>
            </div>

            <button type="submit"
                class="inline-flex items-center py-2.5 px-4 text-md font-bold text-center text-zinc-50 bg-amber-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Post comment
            </button>
        </form>

        @foreach ($coment as $komen)
            <article
                class="p-6 mb-2 text-base bg-zinc-50 rounded-lg border-t border-zinc-200 dark:bg-zinc-950 dark:border-zinc-800">
                <footer class="flex justify-between items-center mb-2">
                    <div class="flex items-center">
                        <p class="inline-flex items-center mr-3 font-semibold text-sm text-zinc-950 dark:text-zinc-50">
                            <img class="mr-2 w-6 h-6 rounded-full text-zinc-950 dark:text-zinc-50" src="/img/01.jpg"
                                alt="Michael Gough">{{ $komen->nama }}
                        </p>
                        <p class="text-sm text-zinc-600 dark:text-zinc-300"><time pubdate datetime="2022-02-08"
                                title="February 8th, 2022">{{ $komen->created_at->diffForHumans() }}</time></p>
                    </div>
                </footer>
                <p class=" text-zinc-950 dark:text-zinc-50 pt-4">{{ $komen->komentar }}</p>
                <div class="flex items-center mt-4 mb-2 space-x-4">
                    <button wire:click="SelectReply({{ $komen->id }})" type="button" id="dropdownCommentreplyButton"
                        data-dropdown-toggle="dropdownCommentreplyButton1"
                        class="flex items-center font-medium text-sm text-zinc-600 hover:underline  dark:text-amber-300">
                        <svg class="mr-1.5 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 18">
                            <path
                                d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z" />
                        </svg>
                        Reply
                    </button>
                </div>
            </article>

            @if ($komen->children)
                @foreach ($komen->children as $komen2)
                    <article
                        class="p-6 mb-2 ml-6 lg:ml-12 text-base bg-zinc-50 rounded-lg border-t border-zinc-200 dark:bg-zinc-950 dark:border-zinc-800">
                        <footer class="flex justify-between items-center mb-2">
                            <div class="flex items-center">
                                <p
                                    class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white">
                                    <img class="mr-2 w-6 h-6 rounded-full" src="/img/01.jpg"
                                        alt="Michael Gough">{{ $komen2->nama }}
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                        title="February 8th, 2022">{{ $komen2->created_at->diffForHumans() }}</time></p>
                            </div>
                        </footer>
                        <p class=" text-zinc-950 dark:text-zinc-50 pt-4">{{ $komen2->komentar }}</p>
                        <div class="flex items-center mt-4 mb-2 space-x-4">
                            <button wire:click="SelectReply({{ $komen->id }})" type="button"
                                id="dropdownCommentreplyButton" data-dropdown-toggle="dropdownCommentreplyButton1"
                                class="flex items-center font-medium text-sm text-zinc-600 hover:underline  dark:text-amber-300">
                                <svg class="mr-1.5 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 18">
                                    <path
                                        d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z" />
                                </svg>
                                Reply
                            </button>
                        </div>
                    </article>
                @endforeach
            @endif

            @if (isset($coment_id) && $coment_id == $komen->id)
                <form wire:submit.preven="reply" id="childComments"
                    class="p-6 mb-2 ml-6 lg:ml-12 text-base bg-zinc-50 rounded-lg dark:bg-zinc-950 relative">
                    <button wire:click="hideForm" type="button"
                        class="bg-red-500 text-zinc-50 text-sm p-0.5 rounded absolute top-2 right-2">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    
                    <label for="input-group-1"
                        class="block mb-2 text-sm font-medium text-zinc-950 dark:text-zinc-50">Your Email</label>
                    <div class="relative mb-6">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-zinc-950 dark:text-zinc-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                <path
                                    d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                <path
                                    d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                            </svg>
                        </div>
                        <input wire:Model.defer="email" type="email" id="input-group-1"
                            class="bg-zinc-50 border-zinc-300 text-zinc-950 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full ps-10 p-2.5 dark:bg-zinc-950 dark:border-zinc-600 dark:placeholder-zinc-400 dark:text-zinc-50 dark:focus:ring-amber-500 dark:focus:border-amber-500"
                            placeholder="youremail@.com" required>
                    </div>

                    <label for="input-group-1"
                        class="block mb-2 text-sm font-medium text-zinc-950 dark:text-zinc-50">Your Name</label>
                    <div class="relative mb-6">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-zinc-950 dark:text-zinc-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                            </svg>
                        </div>
                        <input wire:Model.defer="nama" type="text" id="input-group-1"
                            class="bg-zinc-50 border-zinc-300 text-zinc-950 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full ps-10 p-2.5 dark:border-zinc-600 dark:bg-zinc-950 dark:placeholder-zinc-400 dark:text-zinc-50 dark:focus:ring-amber-500 dark:focus:border-amber-500"
                            placeholder="Your name" required>
                    </div>

                    <div
                        class="py-2 px-4 mb-4 mt-4 bg-zinc-50 rounded-lg rounded-t-lg border border-zinc-400 dark:bg-zinc-950 dark:border-amber-500">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea wire:Model.defer="komentar" id="comment" rows="6"
                            class="form-control px-0 w-full text-sm text-zinc-950 border-0 focus:ring-0 bg-zinc-50 dark:text-zinc-50 dark:placeholder-zinc-400 dark:bg-zinc-950"
                            placeholder="Write a comment..." required></textarea>
                    </div>

                    <button type="submit"
                        class="inline-flex items-center py-2.5 px-4 text-md font-bold text-center text-zinc-50 bg-amber-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Post comment
                    </button>
                </form>

            @endif
        @endforeach

    </section>
</div>
