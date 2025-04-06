@extends($layout)

@section('content')
<div class="container mx-auto max-w-lg p-4 bg-white rounded shadow">
    <h2 class="text-2xl font-semibold mb-4" style="margin-left: 250px;">Edit Event</h2>

    @if ($errors->any())
        <div class="mb-4 text-red-600" style="margin-left: 250px;">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row" style="margin-left: 250px;">
    <form action="{{ route('event.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block font-medium">Event Name</label>
            <input type="text" name="name" id="name" class="w-full border rounded px-3 py-2"
                value="{{ old('name', $event->name) }}" required>
        </div>

        <div class="mb-4">
            <label for="start_date" class="block font-medium">Start Date and Time</label>
            <input type="datetime-local" name="start_date" id="start_date" class="w-full border rounded px-3 py-2"
                value="{{ old('start_date', $event->start_date) }}" required>
        </div>

        <div class="mb-4">
            <label for="end_date" class="block font-medium">End Date and Time</label>
            <input type="datetime-local" name="end_date" id="end_date" class="w-full border rounded px-3 py-2"
                value="{{ old('end_date', $event->end_date) }}">
        </div>

        <div class="mb-4">
            <label for="location" class="block font-medium">Location</label>
            <input type="text" name="location" id="location" class="w-full border rounded px-3 py-2"
                value="{{ old('location', $event->location) }}">
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium">Description</label>
            <textarea name="content" id="description" class="w-full border rounded px-3 py-2"
                rows="4" required>{{ old('content', $event->content) }}</textarea>
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('event.index') }}" class="btn btn-primary">← Back to List</a>
            <br /><br />
            <div class="flex space-x-2">
                <button type="button" onclick="openModal()" class="btn btn-danger">
                    Delete Event
                </button>

                <button type="submit" class="btn btn-success">
                    Update
                </button>
            </div>
        </div>
    </form>
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteModal" 
    class="d-none position-fixed top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center"
    style="background-color: rgba(0, 0, 0, 0.5); z-index: 1050;">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
        <h3 class="text-xl font-semibold mb-4">Confirm Deletion</h3>
        <p class="mb-6">Are you sure you want to delete this event?</p>
        <div class="flex justify-end space-x-2">
            <button onclick="closeModal()" class="btn btn-primary">Cancel</button>
            <form action="{{ route('event.destroy',$event->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    Confirm Delete
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('deleteModal').classList.remove('d-none');
    }

    function closeModal() {
        document.getElementById('deleteModal').classList.add('d-none');
    }
</script>
@endsection


@pushOnce('scripts')
    <!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/d4o8wcfll12h7el62uh71dabqn40ujma0f1wpwtyhcq93yjx/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
        selector: 'textarea#description',
        plugins: 'advlist autolink lists link image charmap print preview fullscreen media table code',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help image',
        height: 300,
        file_picker_types: 'image',
        image_title: true,
        automatic_uploads: true,
        images_upload_handler: function (blobInfo, success, failure) {
        let formData = new FormData();
        formData.append('file', blobInfo.blob());

        fetch('/tinymce-upload-image', {
            method: 'POST',
            headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData
        })
        .then(response => response.json())
        .then(result => success(result.location))
        .catch(() => failure('Image upload failed'));
        },
        file_picker_callback: (cb, value, meta) => {
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');

        input.addEventListener('change', (e) => {
        const file = e.target.files[0];

        const reader = new FileReader();
        reader.addEventListener('load', () => {
            /*
            Note: Now we need to register the blob in TinyMCEs image blob
            registry. In the next release this part hopefully won't be
            necessary, as we are looking to handle it internally.
            */
            const id = 'blobid' + (new Date()).getTime();
            const blobCache =  tinymce.activeEditor.editorUpload.blobCache;
            const base64 = reader.result.split(',')[1];
            const blobInfo = blobCache.create(id, file, base64);
            blobCache.add(blobInfo);

            /* call the callback and populate the Title field with the file name */
            cb(blobInfo.blobUri(), { title: file.name });
        });
        reader.readAsDataURL(file);
        });

        input.click();
    },
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'

    });
    </script>
@endpushOnce
