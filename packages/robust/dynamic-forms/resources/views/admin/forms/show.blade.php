@extends('core::admin.layouts.default')

@section('content')

    @inject('form_helper', 'Robust\DynamicForms\Helpers\FormHelper')
    @inject('setting_helper', Robust\Core\Helpers\SettingsHelper)
    @set('ui', new $ui)

    <div class="page">

        <div class="container view-page">
            @include("core::admin.partials.messages.info")

            <div class="col-md-3 dynamic-form__list-search left-view">
                <div class="panel-box">
                    <div class="form-group form-material">
                        <h4>Search</h4>
                        <input class="search input-sm form-control" type="text" placeholder="Project name"/>
                    </div>
                    <div>
                        <h4>Forms</h4>
                        @set('forms', $form_helper->getForms())
                        <ul class="list-group collapsible list-unstyled" id="accordian">
                            @foreach($forms as $form)
                                <li class="row list-group-item">
                                    <a class="name" href="{{ route('admin.forms.show', [$form->id]) }}"><i
                                                class="md-chevron-right"
                                                aria-hidden="true"></i>{{ $form->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @set('setting', $setting_helper->get('general-setting'))
            <div class="{{ ($model->theme != '') ? $model->theme : 'default-theme' }}" id="theme_preview">
                <div class="col-md-8 panel-body panel-box dynamic__form-container form__wrapper default-form">

                    <div class="col-md-6 project-info">
                        <h6>Client name : {{ Auth::user()->first_name }}</h6>
                        <h6>Form ID : {{ $model->id }}</h6>
                    </div>

                    <div class="col-md-6 text-right company-info">
                        <h6>{{ (isset($setting['company_name'])) ? $setting['company_name'] : '' }}</h6>
                        <h6>{{ (isset($setting['street_address'])) ? $setting['street_address'] : '' }}</h6>
                        <h6>{{ (isset($setting['phone_number'])) ? 'Tel no : '. $setting['phone_number'] : '' }}</h6>
                    </div>
                    <div class="form__content clearfix">
                        <div class="text-center col-md-12 clearfix form_title"><h2 class="">{{ $model->title }}</h2>
                        </div>
                        <div class="form__field clearfix col-md-12">
                            {!! Shortcode::compile("[dyn-form preview = false]{$model->title}[/dyn-form]")  !!}
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>


@endsection