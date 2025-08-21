$(document).ready(function () {
    $('#result').DataTable({
        orderCellsTop: true,
        dom: '<"row"<"col-sm-6"l><"col-sm-6"f>><"row"<"col-sm-12"B>>rt<"row"<"col-sm-6"i><"col-sm-6"p>>',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],

        columnDefs: [{ orderable: false, }]
    });
});
