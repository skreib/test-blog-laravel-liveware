<div class="my-8 space-y-10">
    @if($saveCommentSuccess)
        <div class="rounded-md bg-green-100 rounded-lg p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">
                        {{ $saveCommentSuccess }}
                    </p>
                </div>
                <div class="ml-auto pl-3">
                    <div class="-mx-1.5 -my-1.5">
                        <button wire:click="$set('saveCommentSuccess', false)" type="button"
                            class=" inline-flex rounded-md p-1.5 text-green-500 hover:bg-green-100
                            transition ease-in-out duration-150"
                            aria-label="Dismiss">
                            <svg class="h-5 w-5" viewPort="0 0 15 15" fill="currentColor"
                                 xmlns="http://www.w3.org/2000/svg">
                                <polygon id="Combined-Shape" points="10 8.58578644 2.92893219 1.51471863 1.51471863 2.92893219 8.58578644 10 1.51471863 17.0710678 2.92893219 18.4852814 10 11.4142136 17.0710678 18.4852814 18.4852814 17.0710678 11.4142136 10 18.4852814 2.92893219 17.0710678 1.51471863 10 8.58578644"></polygon>
                            </svg>

                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <form wire:submit.prevent="publishComment" method="POST" class="w-3/4 my-12">
        @csrf
        <div class="flex">
            <img class="h-10 w-10 rounded-full" src="https://www.pngitem.com/pimgs/m/421-4212341_default-avatar-svg-hd-png-download.png" alt="avatar">
            <div class="ml-4 flex-1">
                <textarea wire:model.defer="comment" name="comment" id="comment" rows="4"
                    placeholder="Type your text here..."
                    class="border rounded-md shadow w-full px-4 py-2"></textarea>
                @error('comment')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-base
                leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500
                focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo
                active:bg-indigo-700 transition ease-in-out duration-150 mt-2 disabled:opacity-50">
                    <span>Post Comment</span>
                </button>
            </div>
        </div>

    </form>

    @foreach ($post->comments->sortDesc() as $comment)
        <div class="flex">
            <img class="h-10 w-10 rounded-full" src="https://www.pngitem.com/pimgs/m/421-4212341_default-avatar-svg-hd-png-download.png" alt="avatar">
            <div class="ml-4">
                <div class="flex items-center">
                    <div class="font-semibold">{{ $comment->user_id == -1 ? 'Guest' : "User: $comment->user_id" }}</div>
                    <div class="text-gray-500 ml-2">{{ $comment->created_at->diffForHumans() }}</div>
                </div>
                <div class="text-gray-700 mt-2">{{ $comment->content }}</div>
            </div>
        </div>
    @endforeach
</div>
