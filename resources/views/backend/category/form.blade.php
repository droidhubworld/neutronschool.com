<div class="card-body">
    <div class="row">
        <div class="col-sm-5">
            <h4 class="card-title mb-0">
                {{ __('labels.backend.access.category.management') }}
                
            </h4>
        </div><!--col-->
    </div><!--row-->

    <hr>

    <div class="row mt-4 mb-4">
        <div class="col">
            <div class="form-group row">
                    {{ Form::label('parent_category', __('validation.attributes.backend.access.category.parent_category'), [ 'class'=>'col-md-2 form-control-label']) }}

                <div class="col-md-10 search-permission" style="min-height: unset;">
                        <!-- {{ Form::select('parent_category', $data, null, ['class' => 'form-control select2']) }} -->
                       
                    <select class="form-control select2" name="parent_category">
                        <option value="0">{{__('validation.attributes.backend.access.category.select_perent_category')}}</option>
                        @foreach ($data as $key => $value)
                            <option value="{{ $key }}"> 
                                {{ $value }} 
                            </option>
                        @endforeach    
                    </select>
                </div>
                <!--col-->
            </div>
            <!--form-group-->

            <div class="form-group row">
                    {{ Form::label('name', __('validation.attributes.backend.access.category.name'), [ 'class'=>'col-md-2 form-control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.category.name'), 'required' => 'required']) }}
                    </div>
                    <!--col-->
                </div><!--form-group-->

        </div><!--col-->
    </div><!--row-->
</div><!--card-body-->