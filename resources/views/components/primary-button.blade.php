<button {{ $attributes->merge(['type' => 'submit', 'class' => 'py-2 px-4 text-center bg-gradient-to-r from-[#442AE2] to-[#6956E7] rounded-xl text-white text-[16px] font-semibold hover:bg-indigo-500']) }}>
    {{ $slot }}
</button>
