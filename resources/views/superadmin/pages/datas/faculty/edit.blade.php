<form action="{{ route('faculty.update' , ['id' => $item->id]) }}" method="post">
    @csrf
    @method('put')

    <div class="modal fade" id="edit_modal{{ $item->id }}">
        <div class="modal-dialog modal-lg" style="max-width: 1200px !important;">

            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Fakultet o`zgartirish</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="col-md-12 ml-auto mr-auto">
                                <div class="form-group">
                                    <label>Uz</label>
                                    <input type="text" class="form-control" value="{{ $item->name_uz }}" name="name_uz"
                                           required>
                                </div>
                            </div>
                            <div class="col-md-12 ml-auto mr-auto">
                                <div class="form-group">
                                    <label>En</label>
                                    <input value="{{ $item->name_en }}" type="text" class="form-control" name="name_en"
                                           required>
                                </div>
                            </div>
                            <div class="col-md-12 ml-auto mr-auto">
                                <div class="form-group">
                                    <label>ru</label>
                                    <input type="text" value="{{ $item->name_ru }}" class="form-control" name="name_ru"
                                           required>
                                </div>
                            </div>
                            @php $high_schools = 'App\HighSchool'::all(); @endphp
                            <div class="col-md-12 ml-auto mr-auto">
                                <div class="form-group">
                                    <label for="">Talim tashkiloti</label>
                                    <select name="high_school_id" style="display: block !important;" id=""
                                            class="form-control">
                                        @foreach($high_schools as $hg)
                                            <option @if($item->high_school_id == $hg->id) selected="true" @endif value="{{$hg->id}}">{{$hg->name_uz}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        @php $edutypes = 'App\Edutype'::all();$type_e = 'App\FacultyTypeEdu'::where('faculty_id' , $item->id)->pluck('type_education_id')->toArray(); @endphp
                        <div class="col-md-3 pt-3">


                            @php $i = 0; @endphp
                            @foreach($edutypes as $t)

                                <div style="display: flex;">
                                    <input @if(in_array($t->id, $type_e)) checked @endif type="checkbox"
                                           style="opacity: 1 !important; position: relative !important; pointer-events: painted;"
                                           class="w-25 float-left" name="edutype[{{ $i }}]" value="{{ $t->id }}">
                                    <h5 style="margin-bottom: 0 !important;">{{ $t->$name_l }}</h5>
                                </div>
                                @php $i++; @endphp

                            @endforeach


                        </div>
                        @php $langtype = 'App\Languagetype'::all(); $type_l = 'App\FacultyTypeLang'::where('faculty_id' , $item->id)->pluck('type_language_id')->toArray(); @endphp
                        <div class="col-md-3 pt-3">


                            @php $i = 0; @endphp
                            @foreach($langtype as $t)

                                <div style="display: flex;">
                                    <input @if(in_array($t->id, $type_l)) checked @endif type="checkbox"
                                           style="opacity: 1 !important; position: relative !important; pointer-events: painted;"
                                           class="w-25 float-left" name="langtype[{{ $i }}]" value="{{ $t->id }}">
                                    <h5 style="margin-bottom: 0 !important;">{{ $t->$name_l }}</h5>
                                </div>
                                @php $i++; @endphp


                            @endforeach


                        </div>

                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Saqlash</button>
                </div>

            </div>
        </div>
    </div>
</form>
