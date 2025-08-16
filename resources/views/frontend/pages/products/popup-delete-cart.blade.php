<!-- Modal -->
<div class="modal fade" id="deleteCart-{{$itemCart->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc xoá sản phẩm này không?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        {{ $itemCart->name }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary radius" data-dismiss="modal">Không</button>
        <button type="button" class="btn btn-red24 confirm-delete btn-hover" 
                  data-id="{{ $itemCart->id }}"
                  data-url="{{ route('deleteCart', $itemCart->id) }}">Đồng Ý</button>
      </div>
    </div>
  </div>
</div>