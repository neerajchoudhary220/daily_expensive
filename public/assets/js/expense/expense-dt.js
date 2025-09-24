let expense_dt_tbl=''


function dbTble() {
    
expense_dt_tbl = $("#expense-dt-tbl").DataTable({
    
    serverSide: true,
    stateSave: false,
    pageLength: 10,
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
        $(".expense-delete").on("click",function(){
            const delete_url = $(this).data('delete-url');
            deleteExpense(delete_url);
        })
    },
});

}

function applyFilter(selected_value=null){
    const filter_data = {
        category: selected_value?selected_value:category.val(),
        quick_day:quick_day.val(),
        payment_method:payment_method.val(),
    };
    if(quick_day.val()==='custom_date'){
        filter_data['start_date'] = start_date.val();
        filter_data['end_date']=end_date.val();
    }

    expense_dt_tbl.settings()[0].ajax.data = filter_data;
     expense_dt_tbl.ajax.reload()
     Livewire.dispatch('expense-filter-event',filter_data)
}


//Delete Expense
const deleteExpense = (delete_url) => {
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to delete this.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545', // green
        cancelButtonColor: '#0dcaf0',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: delete_url,
                method: "delete",
                success: function (data) {
                    Swal.fire('Deleted!', data.msg, 'success');
                    expense_dt_tbl.destroy();
                    dbTble();
                }
            });
        }
    });
}


$(document).ready(function(){
    dbTble();
})