<div class="d-flex gap-2">

    <!-- Download Template Button -->
    <a href="{{ route('hosts.downloadTemplate') }}" class="btn btn-info btn-sm">
        <i class="fas fa-download"></i> Download Template
    </a>


    <!-- Upload Button (Triggers Hidden Input) -->
    <form action="{{ route('hosts.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" id="fileInput" class="d-none" required>
        <button type="button" class="btn btn-success btn-sm" onclick="document.getElementById('fileInput').click();">
            <i class="fas fa-file-upload"></i> Import Excel
        </button>
    </form>

    <!-- Download Button -->
    <a href="{{ route('hosts.export') }}" class="btn btn-success btn-sm"><i class="fas fa-file-download"></i> Export
        Excel</a>
</div>

<script>
    document.getElementById('fileInput').addEventListener('change', function() {
        this.form.submit(); // Automatically submit when a file is selected
    });
</script>
