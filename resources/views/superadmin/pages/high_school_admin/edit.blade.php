<div class="modal fade" id="edit_modal{{ $item->id }}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Admin o`zgartirish</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form  method="post" action="{{ route('admins.update' , ['id' => $item->id]) }}">
            @csrf
            @method('put')
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Ism</label> <label class="error">@error('first_name')! {{ $message }} @enderror</label>
                  <input type="text" value="{{ $item->first_name }}" class="form-control" name="first_name">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Familiya</label> <label class="error">@error('last_name')! {{ $message }} @enderror</label>
                  <input type="text" value="{{ $item->last_name }}" class="form-control" name="last_name">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Otasining ismi</label> <label class="error">@error('middle_name')! {{ $message }} @enderror</label>
                  <input type="text" value="{{ $item->middle_name }}" class="form-control" name="middle_name">
                </div>
              </div>
               <div class="col-md-4">
                <div class="form-group">
                  <label><i class="fa fa-phone"></i> Telefon raqami</label> <label class="error">@error('email')! {{ $message }} @enderror</label>
                  <input type="text" value="{{ $item->user->email }}" class=" phn form-control" name="email">
                </div>
              </div>


              <div class="col-md-6">
                <div class="form-group">
                  <label>
                    <i class="fa fa-user"></i>
                    Vazifasi
                  </label>
                  <select class="form-control" name="role">
                    <option style="padding: 5px;" value="1">Kuzatuvchi</option>
                    <option style="padding: 5px;" value="2">Tekshiruvchi</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-success">Saqlash</button>
              </div>
            </div>
          </form>
        </div>

        <!-- Modal footer -->
 {{--        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div> --}}

      </div>
    </div>
  </div>
