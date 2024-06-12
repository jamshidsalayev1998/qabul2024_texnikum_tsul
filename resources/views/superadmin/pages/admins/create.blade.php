<div class="modal fade" id="createModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Admin qo`shish</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="{{ route('admins.store') }}" method="post">
            @csrf
            @method('post')
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Ism</label> <label class="error">@error('first_name')! {{ $message }} @enderror</label>
                  <input type="text" value="{{ old('first_name') }}" class="form-control" name="first_name">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Familiya</label> <label class="error">@error('last_name')! {{ $message }} @enderror</label>
                  <input type="text" value="{{ old('last_name') }}" class="form-control" name="last_name">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Otasining ismi</label> <label class="error">@error('middle_name')! {{ $message }} @enderror</label>
                  <input type="text" value="{{ old('middle_name') }}" class="form-control" name="middle_name">
                </div>
              </div>
               <div class="col-md-4">
                <div class="form-group">
                  <label><i class="fa fa-phone"></i> Telefon raqami</label> <label class="error">@error('email')! {{ $message }} @enderror</label>
                  <input type="text" value="{{ old('email') }}" class=" phn form-control" name="email">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label><i class="fa fa-key"></i> Parol</label> <label class="error">@error('password')! {{ $message }} @enderror</label>
                  <input type="password"  class="form-control" name="password">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label> <i class="fa fa-retweet"></i> Parolni takrorlang</label> <label class="error">@error('password_confirmation')! {{ $message }} @enderror</label>
                  <input type="password"  class="form-control" name="password_confirmation">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>
                    <i class="fa fa-user"></i>
                    Vazifasi
                  </label>
                  <select class="form-control" style="display: block !important;" name="role">
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