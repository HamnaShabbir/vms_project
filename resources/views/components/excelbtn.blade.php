{{-- <button class="btn btn-sm btn-success p-1">
    <i class="fas fa-file-excel"></i> Excel
</button> --}}



<!-- components/excelButton.blade.php -->
<form action="{{ route('hosts.import') }}" method="POST" enctype="multipart/form-data" class="d-inline">
    @csrf
    <input type="file" name="file" required style="display: none;" id="excelFileInput">
    
    <button type="button" class="btn btn-sm btn-success p-1" onclick="document.getElementById('excelFileInput').click();">
        <i class="fas fa-file-excel"></i> Excel
    </button>
    
    <button type="submit" id="submitExcelForm" style="display: none;"></button>
</form>

<script>
    document.getElementById('excelFileInput').addEventListener('change', function () {
        document.getElementById('submitExcelForm').click();
    });
</script>
