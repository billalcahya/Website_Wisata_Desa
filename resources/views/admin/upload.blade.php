<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <!-- Header -->
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Image Gallery</h1>
            <p class="text-gray-600">Upload and manage your images</p>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-8 rounded">
                <div class="flex items-center">
                    <div class="flex-shrink-0 text-green-500">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-green-700">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-8 rounded">
                <div class="flex items-center">
                    <div class="flex-shrink-0 text-red-500">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-700">Error uploading image</h3>
                        <ul class="mt-2 text-sm text-red-700 list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <!-- Upload Card -->
        <div class="bg-white rounded-xl shadow-sm p-6 mb-10 border border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-cloud-upload-alt mr-2 text-blue-500"></i>
                Upload New Image
            </h2>

            <form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- File Input -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Select Image</label>
                    <div class="mt-1 flex items-center">
                        <label for="image-upload" class="cursor-pointer">
                            <span class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                                <i class="fas fa-folder-open mr-2"></i>
                                Choose File
                            </span>
                            <input id="image-upload" name="image" type="file" class="sr-only" required accept="image/*">
                        </label>
                        <span id="file-name" class="ml-4 text-sm text-gray-500">No file selected</span>
                    </div>
                    <p class="text-xs text-gray-500">Supports: JPG, PNG, GIF (Max 5MB)</p>
                </div>

                <!-- Preview -->
                <div id="image-preview" class="hidden">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Preview</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 flex justify-center">
                        <img id="preview-image" src="#" alt="Preview" class="max-h-60 rounded-lg hidden">
                    </div>
                </div>

                <!-- Submit -->
                <div class="pt-2">
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
                        <i class="fas fa-upload mr-2"></i>
                        Upload Image
                    </button>
                </div>
            </form>
        </div>

        <!-- Gallery Section -->
        <div class="mb-6 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                <i class="fas fa-images mr-2 text-blue-500"></i>
                Your Gallery
            </h2>
            <p class="text-sm text-gray-500">{{ $images->count() }} {{ Str::plural('image', $images->count()) }}</p>
        </div>

        <!-- Gallery Grid -->
        @if($images->isEmpty())
            <div class="bg-white rounded-xl shadow-sm p-8 text-center border border-gray-200">
                <i class="fas fa-image text-4xl text-gray-300 mb-4"></i>
                <h3 class="text-lg font-medium text-gray-700">No images yet</h3>
                <p class="text-gray-500 mt-1">Upload your first image using the form above</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($images as $img)
                    <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300 border border-gray-200">
                        <div class="relative pb-[100%] bg-gray-100">
                            <img src="{{ asset('storage/' . $img->filename) }}" alt="Uploaded image" class="absolute h-full w-full object-cover hover:opacity-90 transition-opacity duration-200">
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-start">
                                <div class="truncate">
                                    <p class="text-sm font-medium text-gray-900 truncate">{{ basename($img->filename) }}</p>
                                    <p class="text-xs text-gray-500 mt-1">{{ $img->created_at->format('M d, Y') }}</p>
                                </div>
                      
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script>
        document.getElementById('image-upload').addEventListener('change', function(e) {
            const fileInput = e.target;
            const fileNameDisplay = document.getElementById('file-name');
            const previewContainer = document.getElementById('image-preview');
            const previewImage = document.getElementById('preview-image');

            if (fileInput.files.length > 0) {
                fileNameDisplay.textContent = fileInput.files[0].name;

                if (fileInput.files[0].type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        previewImage.classList.remove('hidden');
                        previewContainer.classList.remove('hidden');
                    }
                    reader.readAsDataURL(fileInput.files[0]);
                }
            } else {
                fileNameDisplay.textContent = 'No file selected';
                previewImage.classList.add('hidden');
                previewContainer.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
