<div class="modal fade" id="new_password{{ $item->id }}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Admin parol almashtirish</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="{{ route('admins.new.password' , ['id' => $item->id]) }}" method="post">
            @csrf
            @method('put')
            <div class="row">
              
              <div class="col-md-6">
                <div class="form-group">
                  <label><i class="fa fa-key"></i> Parol</label> <label class="error">@error('password')! {{ $message }} @enderror</label>
                  <input type="password"  class="form-control" name="password">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label> <i class="fa fa-retweet"></i> Parolni takrorlang</label> <label class="error">@error('password_confirmation')! {{ $message }} @enderror</label>
                  <input type="password"  class="form-control" name="password_confirmation">
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