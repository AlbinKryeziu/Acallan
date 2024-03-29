<x-app-layout>
    @include('client/assets/header')

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-8 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <br />
                <form class="form-horizontal p-4" method="POST" action="{{ url('/pacient/store/addgift/'.$doctor->id) }}">
                    @csrf
                    <fieldset>
                        <legend style="text-align: center;">@lang('sent_gift')</legend>
                        @if ($message = Session::get('warning'))
                        <div class="alert alert-warning alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif

                        <div class="form-group">
                            <label class="col-md-12 control-label" for="name">@lang('doctor')</label>
                            <div class="col-md-12">
                                <select class="form-control input-md" id="doctor" name="doctorId" disabled>
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="name">@lang('links')</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="links" placeholder="wwww.example.com" />
                                @error('links')
                                <label class="error" style="color: red;">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="name">@lang('description')</label>
                            <div class="col-md-12">
                                <textarea class="form-control" id="" name="description" rows="3"></textarea>
                                @error('description')
                                <label class="error" style="color: red;">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="type">@lang('type_gift')</label>
                            <div class="col-md-12">
                                <select class="form-control input-md" id="type" name="type">
                                    <option value="">Select type of gift</option>
                                    <option value="Gift">Gift</option>
                                    <option value="Physician Sample">Physician Sample</option>
                                    <option value="Scientific Material">Scientific Material</option>
                                </select>
                                @error('type')
                                <label class="error" style="color: red;">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 float-right">
                                <button type="submit" class="btn btn-info float-right">@lang('save')</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
