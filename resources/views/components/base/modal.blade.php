<div class="flex justify-center">
    <div class="fixed antialiased inset-0 bg-slate-950/50 flex justify-center items-center opacity-0 pointer-events-none transition-opacity duration-300 ease-out z-[9999]"
        id="{{ $id }}" aria-hidden="true">
        <div class="bg-white rounded-lg w-10/12 lg:w-8/12 transition-transform duration-300 ease-out scale-100">
            <div class="pt-4 px-4 flex justify-between items-start overflow-auto min-h-[550px]">
                <div class="flex flex-col gap-2 w-full">
                    <div class="flex flex-col">
                        @yield('content-modal')
                    </div>
                </div>
                @include('components.base.button-close-modal')
            </div>
            <div class=" px-4 pb-4 flex  justify-end gap-2">
                @yield('content-tombol-modal')
            </div>
        </div>
    </div>
</div>
