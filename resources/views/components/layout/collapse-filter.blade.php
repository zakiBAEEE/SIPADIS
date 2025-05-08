<div class="flex-col transition-[max-height] duration-300 ease-in-out max-h-0 mt-1" id = "collapseFilterSurat">
    <form action="{{ route('surat.index') }}" method="GET">
        @include('components.form.form-surat-masuk')
        <div class="flex flex-row justify-end mb-5 gap-4">
            <button
                class="inline-flex border font-sans font-medium text-center transition-all duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed data-[shape=pill]:rounded-full data-[width=full]:w-full focus:shadow-none text-sm rounded-md py-1 px-2 shadow-sm hover:shadow bg-red-800 border-red-800 text-slate-50 hover:bg-slate-700 hover:border-slate-700">
                Reset
            </button>
            <button type="submit"
                class="inline-flex border font-sans font-medium text-center transition-all duration-300 ease-in disabled:opacity-50 disabled:shadow-none disabled:cursor-not-allowed data-[shape=pill]:rounded-full data-[width=full]:w-full focus:shadow-none text-sm rounded-md py-1 px-2 shadow-sm hover:shadow bg-slate-800 border-slate-800 text-slate-50 hover:bg-slate-700 hover:border-slate-700">
                Terapkan
            </button>
        </div>
    </form>

</div>
