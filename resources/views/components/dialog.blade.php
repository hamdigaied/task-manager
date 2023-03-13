<div>
    <dialog class="dialog">
        <h3 class="mb-4">Are you sure to delete {{ $model }} ?</h3>
        <form class="delete-form" method="POST" action="">
            @csrf
            @method("DELETE")
            <input type="hidden" value="" class="id-to-delete" id="">

            <div class="text-center">
                <button class="btn btn-secondary btn-sm" type="button" id="close-dialog">Close</button>
                <button class="btn btn-danger btn-sm" type="submit" id="delete-element-btn">Delete</button>
            </div>
        </form>
    </dialog>
</div>