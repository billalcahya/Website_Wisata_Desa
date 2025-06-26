<div class="bg-white p-10 rounded-3xl shadow-lg border border-gray-200">
  <div class="flex flex-col lg:flex-row gap-10">
    <div class="lg:w-1/4">
      @if ($package->image)
        <img src="{{ asset('storage/' . $package->image) }}" alt="{{ $package->title }}"
          class="w-full h-65 object-cover rounded-xl">
      @else
        <div class="w-full h-65 bg-gray-100 rounded-xl flex items-center justify-center text-gray-400 text-3xl font-semibold">
          No Image
        </div>
      @endif
    </div>

    <div class="lg:w-3/4 flex flex-col justify-between">
      <div>
        <h2 class="text-3xl font-extrabold text-gray-800 mb-6">{{ $package->title }}</h2>
        <p class="text-xl text-gray-600 mb-8 leading-relaxed">{{ $package->description }}</p>
      </div>
      <p class="text-right text-emerald-700 text-2xl font-bold">
        Rp. {{ number_format($package->price, 0, ',', '.') }}
      </p>
    </div>
  </div>
</div>
