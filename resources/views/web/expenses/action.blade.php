 <div class="d-flex gap-1 justify-content-end">
     <button class="btn btn-sm btn-warning expense-edit" data-id="{{ $d->id }}">
         <i class="bi bi-pencil"></i>
     </button>
     <button class="btn btn-sm btn-danger expense-delete" data-id="{{ $d->id }}"
         data-delete-url="{{ route('expense.delete', $d->id) }}">
         <i class="bi bi-trash"></i>
     </button>
 </div>
