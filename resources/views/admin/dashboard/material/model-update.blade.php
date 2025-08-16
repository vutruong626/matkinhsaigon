<div class="modal fade text-left" id="update-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document" style="display: block;">
        <form id="submitForm" method="POST" action="{{ route('material.postAddMaterial') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel1">Tạo mới chất liệu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <span>Tên chất liệu:</span>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="position-relative has-icon-left">
                                            <input type="text" class="form-control name" name="name" id="name"
                                                onchange="changeName(this.value)"
                                                placeholder="Tên chất liệu" value="{{  $item->name }}">
                                            <div class="form-control-position">
                                                <i class="feather icon-file-text"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row custom-number-order">
                                    <div class="col-md-3">
                                        <span>Thứ tự:</span>
                                    </div>
                                    <div class="col-md-9 ">
                                        <div class="controls">
                                            <div class="d-flex align-items-center mb-1">
                                                <div class="input-group input-group-lg">
                                                    <input type="number" name="weight" onchange="changeWeight(this.value)" class="touchspin weight" value="{{  $item->weight }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="col-md-12">
                                <button type="submit" class="btn bg-danger mr-1 mb-1 waves-effect waves-light submit-model-update"
                                    data-host="{{ route('material.postUpdateMaterial',  $item->id) }}"
                                    data-id="{{ $item->id }}"
                                    data-name="{{ $item->name }}"
                                    data-weight="{{ $item->weight }}"
                                    data-dismiss="modal">Lưu</button>

                            </div>
                            <!-- <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
                            </div> -->
                        </div>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
</div>
