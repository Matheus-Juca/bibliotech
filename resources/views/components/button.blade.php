<button {{ $attributes->merge([ 'class' => 'bg-green-600 hover:bg-green-700 text-white font-medium px-5 py-3 rounded-xl
     transition duration-200' ]) }}> {{ $slot }}
     </button>