<form action="{{ route('area.update' , ['id' => $item->id]) }}" method="post">
  @csrf
  @method('put')
<div class="modal fade" id="edit_modal{{ $item->id }}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tumanni o`zgartirish</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->

        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-8 ml-auto mr-auto">
                <div class="form-group">
                  <label>@lang('petition.Region')</label>
                  @php $regions = 'App\Region'::all(); @endphp
                  <select class="form-control select2" name="region_id">
                    @foreach($regions as $region)
                    <option @if($item->region_id == $region->id) selected @endif value="{{ $region->id }}">{{ $region->$name_l }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-8 ml-auto mr-auto">
                <div class="form-group">
                  <label>Uz</label>
                  <input type="text" class="form-control" name="name_uz" value="{{ $item->name_uz }}" required>
                </div>
              </div>
              <div class="col-md-8 ml-auto mr-auto">
                <div class="form-group">
                  <label>En</label>
                  <input type="text" class="form-control" value="{{ $item->name_en }}" name="name_en" required>
                </div>
              </div>
              <div class="col-md-8 ml-auto mr-auto">
                <div class="form-group">
                  <label>Ru</label>
                  <input type="text" class="form-control" name="name_ru" value="{{ $item->name_ru }}" required>
                </div>
              </div>
              
            </div>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" >Saqlash</button>
        </div>

      </div>
    </div>
  </div>
</form>
