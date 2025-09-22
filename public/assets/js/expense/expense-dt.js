function dbTble() {
    
  expense_dt_tbl = $("#expense-dt-tbl").DataTable({
    serverSide: true,
    stateSave: false,
    pageLength: 100,
    responsive: {
        details: {
            display: $.fn.dataTable.Responsive.display.modal({
                header: function (row) {
                    var data = row.data();
                    return 'Expense Details for ' + data.name;
                }
            }),
            renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                tableClass: 'table'
            })
        }
    },
    ajax: {
        url: expense_list_url,
        data: {},
    },
    columns: [
        { name: 'idx', data: 'idx' },
        { name: 'name', data: 'name' },
        { name: 'category', data: 'category' },
        { name: 'amount', data: 'amount' },
        { name: 'payment_mode', data: 'payment_mode' },
        { name: 'expense_date', data: 'expense_date' },
        { name: 'description', data: 'description' },
        { name: 'action', data: 'action', orderable: false },
    ],
    order: [5, 'desc'],
    drawCallback: function (settings, json) {
        $(".expense-edit").on("click", function () {
            const expense_id = $(this).data('id');
            Livewire.dispatch('edit-expense-event', { 'expense': expense_id });
        });
    },
});

}

// const deleteUser =(delete_url)=>{
//     swal("Hello world!");
//     swal({
//         title: 'Are you sure?',
//         text: "You won't be able to revert this!",
//         icon: 'warning',
//         buttons: true,
//         confirmButtonColor: 'success',
//         cancelButtonColor: '#000',
//         confirmButtonText: 'Yes, delete it!'
//     }).then((result) => {
//         console.log(result);
//         if (result) {
//             $.ajax({
//                 url: delete_url,
//                 method: "delete",
//                 success: function (data) {
//                     swal(`Deleted!`, data.message,`success`);
//                     expense_dt_tbl.destroy()
//                     dbTble()
//                 }
//             });
//         }
//     });
// }

$(document).ready(function(){
    dbTble();
})