let expense_dt_tbl=''

function dbTble() {
    
expense_dt_tbl = $("#expense-dt-tbl").DataTable({
    
    serverSide: true,
    stateSave: false,
    pageLength: 100,
    responsive: false,
    ajax: {
        url: expense_list_url,
        data: {
            // 'category':$("#categories :selected").val()
        },
    },
    columns: [
        { name: 'idx', data: 'idx', title: "ID" },
        { name: 'name', data: 'name', title: "Name" },
        { name: 'category', data: 'category', title: "Category" },
        { name: 'amount', data: 'amount', title: "Amount" },
        { name: 'payment_mode', data: 'payment_mode', title: "Payment Mode" },
        { name: 'expense_date', data: 'expense_date', title: "Expense Date" },
        { name: 'description', data: 'description', title: "Description" },
        { name: 'action', data: 'action', title: "Action", orderable: false },
    ],
    order: [5, 'desc'],
    createdRow: function (row, data, dataIndex) {
        // Add data-label for each td based on its column title
        $('td', row).each(function (colIndex) {
            var columnTitle = expense_dt_tbl.column(colIndex).header().innerText;
            $(this).attr('data-label', columnTitle);
        });
    },
    drawCallback: function (settings, json) {
        $(".expense-edit").on("click", function () {
            const expense_id = $(this).data('id');
            Livewire.dispatch('edit-expense-event', { 'expense': expense_id });
        });
    },
});


}

function applyFilter(selected_value=null){
    expense_dt_tbl.settings()[0].ajax.data = {
        category: selected_value?selected_value:$("#categories").val(),
        quick_day:$("#quick-date").val()
    };
     expense_dt_tbl.ajax.reload()
}

//Click On Apply Filter
$('#apply-filter-btn').on("click",function(){
  applyFilter();
})

//Click On Reset Button
$("#reset-filter-btn").on("click",function(){
    $("#categories").val("0").trigger("change");
applyFilter();
})


//Select Quick Date

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